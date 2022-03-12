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
                        <option value="no_uji_kend" selected="selected">No. Uji / Kend</option>
                        <option value="numerator">Numerator</option>
                    </select>
                </span>
                <?php echo CHtml::textField('text_category', '', array('class' => 'form-control text-besar')); ?>
            </div>
        </div>
        <!--        <div class="col-lg-2 col-md-3">
            <select id="choose_validasi" class="form-control" onchange="prosesSearch()">
                <option value="all">- Semua -</option>
                <option value="false" selected="true">Belum Bayar</option>
                <option value="true">Sudah Bayar</option>
            </select>
        </div>-->
        <div class="col-lg-3 col-md-5">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-info" onclick="prosesSearch()">
                    <span class="glyphicon glyphicon-refresh"></span> Refresh
                </button>
                <button type="button" class="btn btn-soundcloud" onclick="buttonCalculatorChecked()">
                    <span class="fa fa-calculator"></span> Calculator
                </button>
                <!--                <button type="button" class="btn btn-success" onclick="buttonPrintChecked('<?php // echo $this->createUrl('Default/CetakCheckedRetribusi'); 
                                                                                                                ?>')">
                    <span class="glyphicon glyphicon-print"></span> Print Selected
                </button>-->
            </div>
        </div>
    </div>
</div>
<!--<div class="col-lg-12 col-md-12" style="padding: 10px;">
    <span style="color: red;" class="pull-left">*Retribusi Kendaraan untuk hari ini <?php // echo date('d F Y');      
                                                                                    ?></span>
</div>-->
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
<div id="dlg_penguji" class="easyui-dialog" title="Cetak Stiker" style="width: 400px; height: auto; padding: 10px;display: none" data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     printCetakStiker();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
            <?php
            echo CHtml::hiddenField('dialog_url', '');
            echo CHtml::hiddenField('dialog_id', '');
            ?>
            <select id="dialog_penguji" class="form-control">
                <?php
                $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                foreach ($penguji as $dataPenguji) :
                ?>
                    <option value="<?php echo $dataPenguji->nrp; ?>">
                        <?php echo $dataPenguji->nama_penguji; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
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
        url: '<?php echo $this->createUrl('Default/ValidasiListGridPetugas'); ?>',
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
                    field: 'idret_tglmati',
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
                    field: 'numerator_hari',
                    title: 'NUMERATOR',
                    width: 100,
                    sortable: true,
                    align: 'center'
                },
                {
                    field: 'uji',
                    width: 120,
                    title: 'JNS UJI',
                    sortable: false
                },
                {
                    field: 'no_uji',
                    title: 'NO UJI',
                    width: 100,
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
                    width: 220,
                    title: 'NAMA PEMILIK',
                    sortable: false
                },
                {
                    field: 'tgl_uji',
                    width: 90,
                    title: 'TGL UJI',
                    sortable: false
                },
                {
                    field: 'jns',
                    width: 120,
                    title: 'JNS KEND',
                    sortable: false
                },
                //                {field: 'buku', title: 'GNT BUKU', width: 70, halign: 'center', align: 'center'},
                {
                    field: 'total',
                    width: 100,
                    title: 'TOTAL BIAYA',
                    sortable: false,
                    align: 'right'
                }
            ]
        ],
        //        toolbar: "#search",
        onBeforeLoad: function(params) {
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
            //            params.chooseValidasi = $('#choose_validasi :selected').val();
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

    function actionPrintBap(value) {
        var button = '<button type="button" class="btn btn-success edit-retribusi" onclick="cetakBap(\'' + value + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }

    function cetakBap(value) {
        var explode = value.split('_');
        var id_retribusi = explode[0];
        var id_kendaraan = explode[1];
        var id_uji = explode[2];
        var url = '<?php echo $this->createUrl('Default/CetakBap'); ?>';
        var win = window.open(url + "?id_retribusi=" + id_retribusi + "&id_kendaraan=" + id_kendaraan + "&id_uji=" + id_uji, '_blank');
        win.focus();
    }

    function actionPrintGesekan(value) {
        var explode = value.split('_');
        var id_kendaraan = explode[0];
        var id_uji = explode[1];
        var id_retribusi = explode[2];
        if ((id_uji == 1) || (id_uji == 2) || (id_uji == 4) || (id_uji == 14)) {
            var button = '<button type="button" class="btn btn-success edit-retribusi" onclick="cetakGesekan(\'' + id_kendaraan + '\',' + id_retribusi + ')"><span class="glyphicon glyphicon-print"></span></button>';
        } else {
            var button = '<button type="button" disabled="disabled" class="btn btn-default"><span class="fa fa-sticky-note-o"></span></button>';
        }
        return button;
    }

    function cetakGesekan(id_kendaraan, id_retribusi) {
        var url = '<?php echo $this->createUrl('Default/CetakGesekan'); ?>';
        var win = window.open(url + "?id_kendaraan=" + id_kendaraan + '&id_retribusi=' + id_retribusi, '_blank');
        win.focus();
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

    function buttonPrintChecked(urlAct) {
        var rows = $('#validasiListGrid').datagrid('getChecked');
        var ids = [];
        for (var i = 0; i < rows.length; i++) {
            ids.push(rows[i].id);
        }
        if (rows.length > 0) {
            var win = window.open(urlAct + "?idArray=" + ids, '_blank');
            win.focus();
        } else {
            $.messager.alert('Warning', 'You must select at least one item!', 'error');
            return false;
        }
    }

    function closeDialog() {
        $('#dlg').dialog('close');
        $('#dlg_penguji').dialog('close');
        $('#dlgKalkulator').dialog('close');
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
        $('#tgl_search').datepicker({
            format: 'dd-M-yyyy',
            daysOfWeekDisabled: [0, 7],
            autoclose: true,
        }).on('changeDate', prosesSearch);
    });

    function buttonDialogPenguji(id) {
        var urlAct = '<?php echo $this->createUrl('Default/CetakStiker'); ?>';
        $('#dialog_id').val(id);
        $('#dialog_url').val(urlAct);
        $('#dlg_penguji').dialog('open');
        $('#dlg_penguji').dialog('center');

    }

    function printCetakStiker() {
        var id = $('#dialog_id').val();
        var url = $('#dialog_url').val();
        var penguji = $('#dialog_penguji :selected').val();
        closeDialog();
        var win = window.open(url + "?id=" + id + "&penguji=" + penguji, '_blank');
        win.focus();
    }

    function buttonDeleteTerdaftar(value) {
        $.messager.confirm('Delete Retribusi', 'Apakah anda yakin ingin delete?', function(r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('Default/DeleteRetribusi'); ?>',
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

    function buttonCalculatorChecked() {
        var rows = $('#validasiListGrid').datagrid('getChecked');
        var ids = [];
        for (var i = 0; i < rows.length; i++) {
            ids.push(rows[i].id);
        }
        if (rows.length > 0) {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->createUrl('Default/getListCalculator'); ?>',
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
</script>