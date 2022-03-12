<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Riwayat Double</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!--<font style="color:red">*huruf besar / kecil tidak berpengaruh</font>-->
        <div class="col-lg-12 col-md-12 no-padding">
            <div class="col-lg-6 col-md-6 no-padding">
                <div class="col-lg-3 col-md-3 no-padding">
                    <input type="text" id="text_category" class="text-besar form-control">
                </div>
                <div class="col-lg-3 col-md-3 no-padding">
                    <select id="select_category" class="form-control">
                        <option selected="selected" value="no_uji">No Uji</option>
                        <option value="no_kendaraan">No Kendaraan</option>
                        <option value="numerator">Numerator</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
            <table id="riwayatListGrid"></table>
        </div>
    </div>
</div>
<script>
    $('#riwayatListGrid').datagrid({
        url: '',
        pagination: true,
        singleSelect: false,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 50,
        pageList: [10, 30, 50],
        columns: [[
                {field: 'id_riwayat', title: '', width: 70, halign: 'center', align: 'center', formatter: buttonDeleteRiwayat},
                {field: 'no_uji', title: 'No Uji', width: 90, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'tgl_uji', width: 120, title: 'Tanggal Uji', sortable: false},
//                {field: 'mati_uji', width: 120, title: 'Mati Uji', sortable: false},
                {field: 'nama_penguji', width: 190, title: 'Nama Penguji', sortable: false},
                {field: 'catatan', width: 200, title: 'Catatan', sortable: false},
                {field: 'no_chasis', width: 150, title: 'No Chasis', sortable: false},
                {field: 'no_mesin', width: 100, title: 'No Mesin', sortable: false},
            ]],
//        toolbar: "#search",
//        onBeforeLoad: function (params) {
//            params.noUjiKendaraan = $('#noUjiKendaraan').val();
//            params.categorySearch = $('#categorySearch :selected').val();
//        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    function buttonDeleteRiwayat(value) {
        var button;
        button = '<button type="button" class="btn btn-danger" onclick="delRiwayat(\'' + value + '\')"><span class="glyphicon glyphicon-trash"></span> Del</button>';
        return button;
    }

    $(document).on("keypress", '#text_category', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch();
            return false;
        }
    });

    function prosesSearch() {
        $('#riwayatListGrid').datagrid({
            url: '<?php echo $this->createUrl('Default/GetListDataRiwayat'); ?>',
            onBeforeLoad: function (params) {
                params.selectCategory = $('#select_category :selected').val();
                params.textCategory = $('#text_category').val();
            },
            onLoadError: function () {
                return false;
            }
        });
    }

    function delRiwayat(value) {
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin hapus?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('Default/DeleteDoubleRiwayat'); ?>',
                    data: {id_riwayat: value},
                    beforeSend: function () {
                        showlargeloader();
                    },
                    success: function (data) {
                        $('#riwayatListGrid').datagrid('reload');
                        hidelargeloader();
                    },
                    error: function () {
                        $('#riwayatListGrid').datagrid('reload');
                        hidelargeloader();
                        return false;
                    }
                });
            }
        });
    }
</script>