<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Uji Ulang</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="col-lg-4 col-md-4">
                            <div class="input-group">
                                <input type="text" id="text_category" class="text-besar form-control" placeholder="NO UJI/NO KENDARAAN">
                                <div class="input-group-addon" onclick="prosesSearch()" style="cursor: pointer; color: white; background-color: #00c0ef; border-color: #00acd6;">
                                    <span class="glyphicon glyphicon-refresh"></span> 
                                    Refresh
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px;">
                    <table id="ujiUlangListGrid"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#ujiUlangListGrid').datagrid({
        url: '',
        width: '100%',
        pagination: true,
        singleSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: false,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5],
        columns: [[
                {field: 'id_hasil_uji', title: 'Proses', width: 80, halign: 'center', align: 'center', formatter: formatAction},
//                {field: 'no_antrian', title: 'No Antrian', width: 80, sortable: false},
                {field: 'no_uji', title: 'No Uji', width: 90, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'nama_pemilik', width: 150, title: 'Nama Pemilik', sortable: false},
                {field: 'tgl_uji', width: 120, title: 'Tanggal Uji', sortable: false},
                {field: 'nm_penguji', width: 220, title: 'Nama Penguji', sortable: false},
                {field: 'catatan', width: 450, title: 'Catatan TL', sortable: false},
            ]],
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
        $('#ujiUlangListGrid').datagrid({
            url: '<?php echo $this->createUrl('Ujiulang/GetListDataUjiUlang'); ?>',
            onBeforeLoad: function (params) {
//                params.selectCategory = $('#select_category :selected').val();
                params.textCategory = $('#text_category').val();
                showlargeloader();
            },
            onLoadError: function () {
                hidelargeloader();
                return false;
            },
            onLoadSuccess: function () {
                hidelargeloader();
                return false;
            }
        });
    }

    function formatAction(value) {
        var button;
        button = '<button type="button" class="btn btn-info" onclick="proses(\'' + value + '\')"><span class="glyphicon glyphicon-random"></span></button>';
        return button;
    }

    function proses(value) {
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl('Ujiulang/CekProsesUjiUlang'); ?>',
            data: {id_hasil_uji: value},
            dataType: 'JSON',
//            beforeSend: function () {
//                showlargeloader();
//            },
            success: function (data) {
                $.messager.defaults = {ok: 'Ya', cancel: 'Tidak'};
                if (data.terdaftar == 0) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $this->createUrl('Ujiulang/ProsesUjiUlang'); ?>',
                        data: {id_hasil_uji: value},
                        beforeSend: function () {
                            showlargeloader();
                        },
                        success: function (data) {
                            $('#ujiUlangListGrid').datagrid('reload');
                            hidelargeloader();
                        },
                        error: function () {
                            hidelargeloader();
                            return false;
                        }
                    });
                } else {
                    $.messager.confirm('Attention', data.message + '. <br />Apakah anda ingin tetap mengijinkan kendaraan ini untuk melakukan uji?', function (r) {
                        if (r) {
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $this->createUrl('Ujiulang/ProsesUjiUlang'); ?>',
                                data: {id_hasil_uji: value},
                                beforeSend: function () {
                                    showlargeloader();
                                },
                                success: function (data) {
                                    $('#ujiUlangListGrid').datagrid('reload');
                                    hidelargeloader();
                                },
                                error: function () {
                                    hidelargeloader();
                                    return false;
                                }
                            });
                        }
                    });
                }
            },
            error: function () {
                $('#ujiUlangListGrid').datagrid('reload');
//                hidelargeloader();
                return false;
            }
        });
    }
</script>