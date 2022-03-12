<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Blokir</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="col-lg-6 col-md-6 no-padding">
                        <div class="col-lg-5 col-md-5">
                            <input type="text" id="text_category" class="text-besar form-control" placeholder="SEARCH NO UJI/NO KENDARAAN">
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <button type="button" class="btn btn-warning" onclick="dialogUnBlokirButton()">
                                UNBLOKIR <span class="glyphicon glyphicon-random"></span>
                            </button>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <button type="button" class="btn btn-info" onclick="dialogUnBlokirButton()">
                                BLOKIR <span class="glyphicon glyphicon-random"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="blokirListGrid"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#blokirListGrid').datagrid({
        url: '<?php echo $this->createUrl('Blokir/GetListDataBlokir'); ?>',
        pagination: true,
        singleSelect: true,
            selectOnCheck: false,
            checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
            striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 10,
        pageList: [10, 30, 50],
        columns: [[
                {field: 'id_kendaraan', title: 'Un-Blok', width: 50, halign: 'center', align: 'center', formatter: unblokirButton},
                {field: 'no_uji', title: 'No Uji', width: 120, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'nama_pemilik', width: 250, title: 'Nama Pemilik', sortable: false},
                {field: 'tgl_blokir', width: 120, title: 'Tanggal Blokir', sortable: false},
                {field: 'keterangan', width: 450, title: 'Keterangan Blokir', sortable: false}
            ]],
        onBeforeLoad: function (params) {
            params.textCategory = $('#text_category').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
    $(document).on("keypress", '#text_category', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch();
            return false;
        }
    });


    function prosesSearch() {
        $('#blokirListGrid').datagrid({
            url: '<?php echo $this->createUrl('Blokir/GetListDataBlokir'); ?>',
            onBeforeLoad: function (params) {
//                params.selectCategory = $('#select_category :selected').val();
                params.textCategory = $('#text_category').val();
            },
            onLoadError: function () {
                return false;
            }
        });
    }

    function unblokirButton(value) {
        var button;
        var urlact = '<?php echo $this->createUrl('Blokir/ProsesUnBlokir'); ?>';
        button = '<button type="button" class="btn btn-warning" onclick="prosesUnBlokirButton(' + value + ', \'' + urlact + '\')"><span class="glyphicon glyphicon-random"></span></button>';
        return button;
    }

    function prosesUnBlokirButton(value, urlAct) {
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin un-blokir?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: urlAct,
                    data: {id_kendaraan: value},
                    beforeSend: function () {
                        showlargeloader();
                    },
                    success: function (data) {
                        $('#blokirListGrid').datagrid('reload');
                        hidelargeloader();
                    },
                    error: function () {
                        $('#blokirListGrid').datagrid('reload');
                        hidelargeloader();
                        return false;
                    }
                });
            }
        }
        );
    }
</script>