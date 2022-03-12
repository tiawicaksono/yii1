<!--<div class="row" style="padding: 0px 15px 0px 0px">-->
<?php // echo CHtml::hiddenField('tgl_search', date('d-M-y'), array('readonly' => 'readonly', 'class' => 'form-control')); 
?>
<style>
    .datagrid-cell-c1-total {
        font-weight: bold;
        color: red;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="col-lg-3 col-md-3">
            <div class="input-group">
                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                <?php echo CHtml::textField('tgl_search', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="input-group">
                <span class="input-group-btn">
                    <select class="btn" id="select_category">
                        <option value="nik_pasien" selected="selected">NIK</option>
                        <option value="nama_pasien">NAMA</option>
                    </select>
                </span>
                <?php echo CHtml::textField('text_category', '', array('class' => 'form-control text-besar')); ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-5">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-info" onclick="prosesSearch()">
                    <span class="glyphicon glyphicon-refresh"></span> Refresh
                </button>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12" style="margin-top: 20px;">
    <table id="validasiListGrid" style="height:500px"></table>
</div>
<div id="dlg" class="easyui-dialog" title="Edit Retribusi" style="width: 400px; height: 200px; padding: 10px;display: none" data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     modal:true,
     buttons: [{
     text:'Ok',
     iconCls:'icon-ok',
     handler:function(){
     saveEditRetribusi();
     }
     },{
     text:'Cancel',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialog();
     }
     }]
     ">
    <form id="form_edit">
        <input type="hidden" id="dlg_update_pendaftaran" name="dlg_update_pendaftaran">
        <div class="form-group">
            <select id="pilih_kategori" class="form-control" name="pilih_kategori" onchange="pilihKategori('<?php echo $this->createUrl('Default/GetListSelect'); ?>')">
                <option value="0">-PILIH-</option>
                <option value="update_select_tgl_kontrol">TANGGAL KONTROL</option>
                <option value="update_select_dokter">DOKTER</option>
            </select>
        </div>
        <div class="form-group">
            <div class="input-group" id="div_update_tgl_kontrol" style="display: none">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </div>
                <input type="text" id="update_tgl_kontrol" name="update_tgl_kontrol" class="form-control" readonly="readonly" value="<?php echo date('d-M-Y'); ?>">
            </div>
            <select class="form-control" id="update_dokter" name="update_dokter" style="display: none;"></select>
        </div>
    </form>
</div>

<script>
    $('#validasiListGrid').datagrid({
        url: '<?php echo $this->createUrl('Default/ListPendaftaran'); ?>',
        width: '100%',
        //        view: scrollview,
        rownumbers: true,
        singleSelect: false,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 200,
        pageList: [50, 100, 200],
        columns: [
            [{
                    field: 'checkbox',
                    align: 'center',
                    checkbox: true
                },
                {
                    field: 'id',
                    hidden: true
                },
                {
                    field: 'ACTIONS',
                    title: 'KUITANSI',
                    width: 60,
                    halign: 'center',
                    align: 'center',
                    formatter: actionPrintKwitansi
                },
                //                {field: 'bap', title: 'Permohonan', width: 60, halign: 'center', align: 'center', formatter: actionPrintBap},
                //                {field: 'gesekan', title: 'Stiker', width: 60, halign: 'center', align: 'center', formatter: actionPrintGesekan},
                {
                    field: 'update',
                    title: 'EDIT',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatAction
                },
                {
                    field: 'delete',
                    title: 'Delete',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatDelete
                },
                //                {field: 'numerator', title: 'NUMERATOR', width: 100, sortable: true},
                {
                    field: 'no_kuitansi',
                    title: 'NO_KUITANSI',
                    width: 150,
                    sortable: true,
                    align: 'center'
                },
                {
                    field: 'nama_pasien',
                    width: 120,
                    title: 'NAMA PASIEN',
                    sortable: false
                },
                {
                    field: 'alamat_pasien',
                    title: 'ALAMAT PASIEN',
                    width: 200,
                    sortable: false
                },
                {
                    field: 'nama_dokter',
                    width: 200,
                    title: 'NAMA DOKTER',
                    sortable: false
                },
                {
                    field: 'tanggal_rekam_medis',
                    width: 110,
                    title: 'TANGGAL KONTROL',
                    sortable: false
                }, {
                    field: 'nama_petugas_pendaftaran',
                    width: 120,
                    title: 'PETUGAS PENDAFTARAN',
                    sortable: false
                }
            ]
        ],
        //        toolbar: "#search",
        onBeforeLoad: function(params) {
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
            params.selectDate = $('#tgl_search').val();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });

    function formatAction(value) {
        var button = '<button type="button" class="btn btn-info edit-retribusi" onclick="buttonEditTerdaftar(\'' + value + '\')"><span class="glyphicon glyphicon-pencil"></span></button>';
        return button;
    }

    function formatDelete(value) {
        var button = '<button type="button" class="btn btn-danger delete-retribusi" onclick="buttonDeleteTerdaftar(\'' + value + '\')"><span class="glyphicon glyphicon-trash"></span></button>';
        return button;
    }

    function actionPrintKwitansi(value) {
        var button = '<button type="button" class="btn btn-success edit-retribusi" onclick="cetakKwitansi(\'' + value + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }

    //    function prosesChangeValidasi() {
    //        var chooseValidasi = $('#choose_validasi :selected').val();
    //        if(chooseValidasi == 'true'){
    //            
    //        }else{
    //            
    //        }
    //    }

    function cetakKwitansi(id) {
        var url = '<?php echo $this->createUrl('Default/CetakRetribusi'); ?>';
        var win = window.open(url + "?id=" + id, '_blank');
        win.focus();
    }


    function buttonEditTerdaftar(value) {
        $('#pilih_kategori').val('0');
        $('#div_update_tgl_kontrol').hide();
        $('#update_dokter').hide();
        $('#dlg_update_pendaftaran').val(value);
        $('#dlg').dialog('open');
        $('#dlg').dialog('center');
    }

    function closeDialog() {
        $('#dlg').dialog('close');
    }

    function prosesSearch() {
        $('#validasiListGrid').datagrid('reload');
    }

    function saveEditRetribusi() {
        var data = $("#form_edit").serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl('Default/UpdateRetribusi'); ?>',
            data: data,
            beforeSend: function() {
                showlargeloader();
            },
            success: function(data) {
                hidelargeloader();
                closeDialog();
                prosesSearch();
            },
            error: function() {
                hidelargeloader();
                return false;
            }
        });
    }

    $(document).on("keypress", '#text_category', function(e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch();
            return false;
        }
    });

    $(document).ready(function() {
        closeDialog();
        $('#tgl_search').datepicker({
            format: 'dd-M-yyyy',
            daysOfWeekDisabled: [0, 7],
            autoclose: true,
        }).on('changeDate', prosesSearch);
        $('#update_tgl_kontrol').datepicker({
            startDate: "today",
            format: 'dd-M-yyyy',
            daysOfWeekDisabled: [0, 7],
            autoclose: true,
        });
    });

    function buttonDeleteTerdaftar(value) {
        $.messager.confirm('Delete Retribusi', 'Apakah anda yakin ingin delete?', function(r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('Default/DeletePendaftaran'); ?>',
                    data: {
                        id: value
                    },
                    success: function(data) {
                        $('#validasiListGrid').datagrid('reload');
                    },
                    error: function() {
                        return false;
                    }
                });
            }
        });
    }
</script>