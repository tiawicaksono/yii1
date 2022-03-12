<?php
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($path . '/js/retribusi.js', CClientScript::POS_END);
$cs->registerScriptFile($path . '/js/validasi.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row {
        min-height: 40px;
        height: 43px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Pembayaran Retribusi</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-white" type="button" onclick="cetak('<?php echo $this->createUrl('Validasi/RekapValidasi'); ?>')">
                        <i class="fa fa-file-excel-o" style="color: green;"></i> Rekap Retribusi
                    </button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-2 col-md-3">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                <?php echo CHtml::textField('tgl_search', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
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
                        <div class="col-lg-2 col-md-3">
                            <select id="choose_validasi" class="form-control" onchange="prosesSearch()">
                                <!--<option value="all">- Semua -</option>-->
                                <option value="false" selected="true">Belum Bayar</option>
                                <option value="true">Sudah Bayar</option>
                            </select>
                        </div>
                        <?php // if ((Yii::app()->user->id == '34') || (Yii::app()->user->isRole('Admin'))) { 
                        ?>
                        <div class="col-lg-4 col-md-8">
                            <div class="btn-group" role="group" aria-label="...">
                                <!--                                    <button type="button" class="btn btn-success" onclick="buttonPrintChecked('<?php // echo $this->createUrl('Validasi/CetakCheckedRetribusi'); 
                                                                                                                                                    ?>')">
                                        <span class="glyphicon glyphicon-print"></span> Print
                                    </button>-->
                                <button type="button" id="btn-valid" class="btn btn-primary" onclick="prosesValidChecked('<?php echo $this->createUrl('Validasi/ProsesValidChecked'); ?>', 'true')">Membayar</button>
                                <button type="button" id="btn-batal" class="btn btn-danger" onclick="prosesValidChecked('<?php echo $this->createUrl('Validasi/ProsesValidChecked'); ?>', 'false')" disabled="true">Batal Bayar</button>
                                <!--                                    <button type="button" id="btn-batal" class="btn btn-success" onclick="buttonPrintSkrdChecked('<?php // echo $this->createUrl('Validasi/CetakCheckedSkrd'); 
                                                                                                                                                                        ?>')">
                                        <span class="fa fa-print"></span> SKRD
                                    </button>-->
                                <button type="button" id="btn-batal" class="btn btn-info" onclick="prosesSearch()">
                                    <span class="fa fa-refresh"></span> Refresh
                                </button>
                                <button type="button" class="btn btn-soundcloud" onclick="buttonCalculatorChecked()">
                                    <span class="fa fa-calculator"></span> Calc
                                </button>
                            </div>
                        </div>
                        <?php // } 
                        ?>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <table id="validasiListGrid"></table>
                </div>
            </div>
        </div>
    </div>
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
                    field: 'id_checkbox',
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
                    title: 'VALID',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: buttonValid
                },
                {
                    field: 'delete',
                    title: 'DELETE',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: buttonDelete
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
                },
                {
                    field: 'total_biaya',
                    width: 100,
                    title: 'TOTAL BIAYA',
                    sortable: false
                },
                {
                    field: 'keterangan_obat',
                    width: 200,
                    title: 'keterangan_obat',
                    sortable: false
                }
            ]
        ],
        //        toolbar: "#search",
        onBeforeLoad: function(params) {
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
            params.selectDate = $('#tgl_search').val();
            params.chooseValidasi = $('#choose_validasi :selected').val();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });

    function buttonValid(value) {
        var button;
        var urlact = '<?php echo $this->createUrl('Validasi/ProsesValid'); ?>';
        var chooseValidasi = $('#choose_validasi :selected').val();
        if (chooseValidasi == 'false') {
            button = '<button type="button" data-toggle="tooltip" title="Valid" class="btn btn-primary" onclick="prosesValid(\'' + urlact + '\', ' + value + ', \'true\')"><span class="glyphicon glyphicon-random"></span></button>';
        } else {
            button = '<button type="button" data-toggle="tooltip" title="Batal" class="btn btn-danger" onclick="prosesValid(\'' + urlact + '\', ' + value + ', \'false\')"><span class="glyphicon glyphicon-random"></span></button>';
        }
        return button;
    }

    function actionEdit(value) {
        var button = '<button type="button" class="btn btn-info edit-retribusi" onclick="buttonEditTerdaftar(\'' + value + '\')"><span class="glyphicon glyphicon-pencil"></span></button>';
        return button;
    }

    function buttonDelete(value) {
        var button = '<button type="button" class="btn btn-danger delete-retribusi" onclick="buttonDeleteTerdaftar(\'' + value + '\')"><span class="glyphicon glyphicon-trash"></span></button>';
        return button;
    }
    //======================CETAK KWITANSI======================
    function actionPrintKwitansi(value) {
        var button = '<button type="button" class="btn btn-success edit-retribusi" onclick="cetakKwitansi(\'' + value + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }

    function cetakRetribusi(id) {
        var url = '<?php echo $this->createUrl('Validasi/CetakRetribusi'); ?>';
        var win = window.open(url + "?id=" + id, '_blank');
        win.focus();
    }

    //============================================================
    function buttonPrintChecked(urlAct) {
        var rows = $('#validasiListGrid').datagrid('getChecked');
        var ids = [];
        for (var i = 0; i < rows.length; i++) {
            ids.push(rows[i].id_retribusi);
        }
        if (rows.length > 0) {
            var win = window.open(urlAct + "?idArray=" + ids, '_blank');
            win.focus();
        } else {
            $.messager.alert('Warning', 'You must select at least one item!', 'error');
            return false;
        }
    }
    //=============================================================
    function prosesSearch() {
        var chooseValidasi = $('#choose_validasi :selected').val();
        if (chooseValidasi == 'true') {
            $("#btn-batal").prop("disabled", false);
            $("#btn-valid").prop("disabled", true);
        } else {
            $("#btn-valid").prop("disabled", false);
            $("#btn-batal").prop("disabled", true);
        }
        $('#validasiListGrid').datagrid('reload');
    }

    $(document).on("keypress", '#text_category', function(e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch();
            return false;
        }
    });

    function cetak(urlAct) {
        var tgl = $('#tgl_search').val();
        window.location.href = urlAct + "?tgl=" + tgl;
        return false;
    }

    $(document).ready(function() {
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
</script>