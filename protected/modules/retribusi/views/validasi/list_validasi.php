<?php
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
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
                                        <option value="no_uji_kend" selected="selected">No. Uji / Kend</option>
                                        <option value="numerator">Numerator</option>
                                    </select>
                                </span>
                                <?php echo CHtml::textField('text_category', '', array('class' => 'form-control text-besar')); ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <select id="choose_validasi" class="form-control" onchange="prosesSearch()">
                                <!--<option value="all">- Semua -</option>-->
                                <option value="false">Belum Bayar</option>
                                <option value="true" selected="true">Sudah Bayar</option>
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
        <input type="hidden" id="dlg_idret_tglmati" name="dlg_idret_tglmati">
        <div class="form-group">
            <select id="pilih_kategori" class="form-control" name="pilih_kategori" onchange="pilihKategori('<?php echo $this->createUrl('Default/GetListSelect'); ?>')">
                <option value="0">-PILIH-</option>
                <option value="tgluji">TANGGAL UJI</option>
                <option value="jenis_uji">JENIS UJI</option>
                <option value="buku">KARTU UJI</option>
                <option value="denda">MATI UJI / DENDA</option>
                <!--<option value="replace">REPLACE</option>-->
                <option value="jbb">JBB</option>
            </select>
        </div>
        <div class="form-group">
            <div id="div_jbb" style="display: none">
                <input type="text" id="ganti_jbb" name="ganti_jbb" class="form-control" style="text-transform: uppercase;" placeholder="JBB">
            </div>
            <div id="div_replace" style="display: none">
                <input type="text" id="ganti_replace" name="ganti_replace" class="form-control" style="text-transform: uppercase;" placeholder="no uji / no kendaraan">
            </div>
            <div class="input-group" id="div_ganti_tgl_uji" style="display: none">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </div>
                <input type="text" id="ganti_tgl_uji" name="ganti_tgl_uji" class="form-control" readonly="readonly" value="<?php echo date('d-M-y'); ?>">
            </div>
            <div class="input-group" id="div_ganti_tgl_mati" style="display: none">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </div>
                <input type="text" id="ganti_tgl_mati" name="ganti_tgl_mati" class="form-control" readonly="readonly" value="<?php echo date('d-M-y'); ?>">
            </div>
            <select class="form-control" id="kategori" name="kategori" style="display: none;"></select>
        </div>
    </form>
</div>
<div id="dlgKalkulator" class="easyui-dialog" title="Total" style="width: 500px; height: 400px; padding: 10px;display: none" data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Close',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialog();
     }
     }]
     ">
    <table id="calculatorListGrid" style="height:200px"></table>
    <hr />
    <span style="font-weight: bold; font-size: 20pt;">Total :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp.<span id="totalcalculator"></span>,00</span>
</div>
<script>
    $('#validasiListGrid').datagrid({
        url: '<?php echo $this->createUrl('Validasi/ValidasiListGrid'); ?>',
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
        pageSize: 20,
        pageList: [20, 50, 100, 250],
        columns: [
            [{
                    field: 'CHECKED',
                    align: 'center',
                    checkbox: true
                },
                {
                    field: 'kwitansi',
                    title: 'KUITANSI',
                    width: 60,
                    halign: 'center',
                    align: 'center',
                    formatter: actionPrintKuitansi
                },
                //                {field: 'skrd', title: 'SKRD', width: 60, halign: 'center', align: 'center', formatter: actionPrintSkrd},
                {
                    field: 'idret_tglmati',
                    title: 'EDIT',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: actionEdit
                },
                {
                    field: 'ACTIONS',
                    title: 'VALID',
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
                {
                    field: 'id_retribusi',
                    hidden: true
                },
                //                {field: 'penerima', width: 70, title: 'PETUGAS', sortable: false, align: 'left'},
                //                {field: 'numerator', title: 'NUMERATOR', width: 90, sortable: true},
                {
                    field: 'numerator_hari',
                    title: 'NUMERATOR',
                    width: 100,
                    sortable: true,
                    align: 'center'
                },
                {
                    field: 'uji',
                    width: 110,
                    title: 'JNS UJI',
                    sortable: false
                },
                {
                    field: 'no_uji',
                    title: 'NO UJI',
                    width: 90,
                    sortable: false
                },
                {
                    field: 'no_kendaraan',
                    width: 90,
                    title: 'NO KEND',
                    sortable: false
                },
                {
                    field: 'nama_pemilik',
                    width: 180,
                    title: 'NAMA PEMILIK',
                    sortable: false
                },
                {
                    field: 'b_berkala',
                    width: 100,
                    title: 'B.RETRIBUSI',
                    sortable: false,
                    align: 'right'
                },
                {
                    field: 'b_retribusi_lebih',
                    width: 100,
                    title: 'B.RETRIBUSI &ge; 1 Thn',
                    sortable: false,
                    align: 'right'
                },
                {
                    field: 'b_rekom',
                    width: 100,
                    title: 'B.REKOM',
                    sortable: false,
                    align: 'right'
                },
                {
                    field: 'b_buku',
                    width: 150,
                    title: 'KARTU HILANG/RUSAK',
                    sortable: false,
                    align: 'right'
                },
                {
                    field: 'b_tlt_uji',
                    width: 100,
                    title: 'B.TELAT',
                    sortable: false,
                    align: 'right'
                },
                {
                    field: 'b_plat_uji',
                    width: 100,
                    title: 'B.TANDA SAMPING',
                    sortable: false,
                    align: 'right'
                },
                {
                    field: 'total',
                    width: 100,
                    title: 'TOTAL',
                    sortable: false,
                    align: 'right'
                },
            ]
        ],
        //        toolbar: "#search",
        onBeforeLoad: function(params) {
            params.chooseValidasi = $('#choose_validasi :selected').val();
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

    function formatDelete(value) {
        var button = '<button type="button" class="btn btn-danger delete-retribusi" onclick="buttonDeleteTerdaftar(\'' + value + '\')"><span class="glyphicon glyphicon-trash"></span></button>';
        return button;
    }

    function buttonDeleteTerdaftar(value) {
        $.messager.confirm('Delete Retribusi', 'Apakah anda yakin ingin delete?', function(r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('Validasi/DeleteRetribusi'); ?>',
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

    function buttonEditTerdaftar(value) {
        $('#pilih_kategori').val('0');
        $('#div_ganti_tgl_uji').hide();
        $('#div_ganti_tgl_mati').hide();
        $('#kategori').hide();
        $('#div_replace').hide();
        $('#ganti_replace').val('');
        $('#div_jbb').hide();
        $('#ganti_jbb').val('');

        $('#dlg_idret_tglmati').val(value);
        $('#dlg').dialog('open');
        $('#dlg').dialog('center');
    }

    //======================CETAK KWITANSI======================
    function actionPrintKuitansiSkrd(value) {
        var button = '<button type="button" class="btn btn-warning edit-retribusi" onclick="cetakKuitansiSkrd(\'' + value + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }

    function cetakKuitansiSkrd(id) {
        var url = '<?php echo $this->createUrl('Validasi/CetakKuitansiSkrd'); ?>';
        var win = window.open(url + "?id=" + id, '_blank');
        win.focus();
    }

    function actionPrintKuitansi(value) {
        var button = '<button type="button" class="btn btn-success edit-retribusi" onclick="cetakRetribusi(\'' + value + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }

    function cetakRetribusi(id) {
        var url = '<?php echo $this->createUrl('Validasi/CetakRetribusi'); ?>';
        var win = window.open(url + "?id=" + id, '_blank');
        win.focus();
    }

    function actionPrintSkrd(value) {
        var button = '<button type="button" class="btn btn-success edit-retribusi" onclick="cetakSkrd(\'' + value + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }

    function cetakSkrd(id) {
        var url = '<?php echo $this->createUrl('Validasi/CetakSkrd'); ?>';
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
        $('#ganti_tgl_uji').datepicker({
            startDate: "today",
            format: 'dd-M-yy',
            daysOfWeekDisabled: [0, 7],
            autoclose: true,
        });
        $('#ganti_tgl_mati').datepicker({
            format: 'dd-M-yy',
            daysOfWeekDisabled: [0, 7],
            autoclose: true,
        });
        closeDialog();
    });

    function pilihKategori(urlAct) {
        var pilih = $('#pilih_kategori option:selected').val();
        if (pilih == '0') {
            $('#div_ganti_tgl_uji').hide();
            $('#kategori').hide();
        } else {
            if (pilih == 'tgluji') {
                $('#div_ganti_tgl_uji').show();
                $('#div_ganti_tgl_mati').hide();
                $('#kategori').hide();
                $('#div_replace').hide();
                $('#div_jbb').hide();
            } else if (pilih == 'denda') {
                $('#div_ganti_tgl_uji').hide();
                $('#div_ganti_tgl_mati').show();
                $('#kategori').hide();
                $('#div_replace').hide();
                $('#div_jbb').hide();
            } else if (pilih == 'replace') {
                $('#div_ganti_tgl_uji').hide();
                $('#div_ganti_tgl_mati').hide();
                $('#kategori').hide();
                $('#div_replace').show();
                $('#div_jbb').hide();
            } else if (pilih == 'jbb') {
                $('#div_ganti_tgl_uji').hide();
                $('#div_ganti_tgl_mati').hide();
                $('#kategori').hide();
                $('#div_replace').hide();
                $('#div_jbb').show();
            } else {
                $('#div_ganti_tgl_uji').hide();
                $('#div_ganti_tgl_mati').hide();
                $('#kategori').show();
                $('#div_replace').hide();
                $('#div_jbb').hide();
                $.ajax({
                    url: urlAct,
                    type: 'POST',
                    data: {
                        pilih: pilih
                    },
                    success: function(msg) {
                        $("#kategori").html(msg);
                    },
                });
            }
        }
    }

    function saveEditRetribusi() {
        var data = $("#form_edit").serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl('Validasi/UpdateRetribusi'); ?>',
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

    function closeDialog() {
        $('#dlg').dialog('close');
        $('#dlgKalkulator').dialog('close');
    }

    function buttonCalculatorChecked() {
        var rows = $('#validasiListGrid').datagrid('getChecked');
        var ids = [];
        for (var i = 0; i < rows.length; i++) {
            ids.push(rows[i].id_retribusi);
        }
        if (rows.length > 0) {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->createUrl('Validasi/getListCalculator'); ?>',
                data: {
                    idArray: ids
                },
                dataType: 'JSON',
                beforeSend: function() {
                    showlargeloader();
                },
                success: function(data) {
                    hidelargeloader();
                    $('#dlgKalkulator').dialog('open');
                    $('#dlgKalkulator').dialog('center');
                    $('#calculatorListGrid').datagrid({
                        data: data,
                        width: '100%',
                        singleSelect: false,
                        pagination: false,
                        selectOnCheck: false,
                        checkOnSelect: true,
                        collapsible: true,
                        striped: true,
                        loadMsg: 'Loading...',
                        nowrap: false,
                        pageNumber: 1,
                        pageSize: 200,
                        pageList: [200],
                        showPageInfo: false,
                        columns: [
                            [{
                                    field: 'numerator',
                                    title: 'Numerator',
                                    width: 80,
                                    sortable: true
                                },
                                {
                                    field: 'no_uji',
                                    title: 'No Uji',
                                    width: 120,
                                    sortable: false
                                },
                                {
                                    field: 'total',
                                    width: 80,
                                    title: 'Total',
                                    sortable: false,
                                    align: 'right'
                                },
                            ]
                        ],
                        onBeforeLoad: function(params) {},
                        onLoadError: function() {
                            return false;
                        },
                        onLoadSuccess: function() {}
                    });
                    $('#totalcalculator').html(data.totalcalculator);
                },
                error: function() {
                    hidelargeloader();
                    return false;
                }
            });
        } else {
            $.messager.alert('Warning', 'You must select at least one item!', 'error');
            return false;
        }
    }

    function buttonPrintSkrdChecked(urlAct) {
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
</script>