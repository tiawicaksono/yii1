<?php
$path = $this->module->assetsUrl;
$baseJs = Yii::app()->appComponent->urlJs();
$baseCss = Yii::app()->appComponent->urlCss();
$cs = Yii::app()->clientScript;
$cs->registerCssFile($baseCss . '/bootstrap-select.css');
$cs->registerScriptFile($path . '/js/verifikasi.js', CClientScript::POS_END);
$cs->registerScriptFile($baseJs . '/bootstrap-select.js', CClientScript::POS_END);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Verifikasi</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        - Report -
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="javascript:void(0)" onclick="cetakReport('<?php echo $this->createUrl('verifikasi/ReportKelulusanExcel'); ?>')"><i class="fa fa-file-excel-o" style="color: green;"></i> Excel</a></li>
                        <li><a href="javascript:void(0)" onclick="cetakReport('<?php echo $this->createUrl('verifikasi/ReportKelulusanPdf'); ?>')"><i class="fa fa-file-pdf-o" style="color: red;"></i> PDF</a></li>
                    </ul>
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
                        <div class="col-lg-3 col-md-3">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <select class="btn" id="select_category">
                                        <option value="nomor_antrian">No Antrian</option>
                                        <option value="no_kend_uji" selected="selected">No. Uji / Kend</option>
                                    </select>
                                </span>
                                <?php echo CHtml::textField('text_category', '', array('class' => 'form-control text-besar')); ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <select id="choose_proses" class="form-control" onchange="prosesSearch()">
                                <option value="all" selected="true">- Semua -</option>
                                <option value="true">Lulus</option>
                                <option value="false">Tidak Lulus</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-info" onclick="prosesSearch()">
                                <span class="glyphicon glyphicon-refresh"></span> 
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <table id="pemeriksaanTglListGrid"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dlg_cetak_hasil" class="easyui-dialog" title="Cetak Hasil Uji" style="width: 400px; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     cetakLulus();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
            <select id="choose_lulus_penguji" class="form-control">
                <?php
                $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                foreach ($penguji as $dataPenguji):
                    ?>
                    <option value="<?php echo $dataPenguji->nrp; ?>"><?php echo $dataPenguji->nama_penguji; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
            <?php
            echo CHtml::hiddenField('dialog_lulus_url', '');
            echo CHtml::hiddenField('dialog_lulus_id', '');
//            echo CHtml::hiddenField('choose_lulus_penguji_ori', '');
            ?>
            <select id="choose_posisi" class="form-control">
                <option value="kiri">Kiri</option>
                <option value="kanan">Kanan</option>
            </select>
        </div>
    </div>
</div>
<div id="dlg_lulus_sementara" class="easyui-dialog" title="Lulus Sementara" style="width: 400px; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     cetakLulusSementara();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
            <select id="choose_penguji_sementara" class="form-control">
                <?php
                $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                foreach ($penguji as $dataPenguji):
                    ?>
                    <option value="<?php echo $dataPenguji->nrp; ?>"><?php echo $dataPenguji->nama_penguji; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
            <?php
            echo CHtml::textArea('catatan_lulus_sementara', '', array('class' => 'form-control'));
            echo CHtml::hiddenField('dialog_sementara_url', '');
            echo CHtml::hiddenField('dialog_sementara_id', '');
            ?>
        </div>
    </div>
</div>
<script>
    $('#pemeriksaanTglListGrid').datagrid({
        url: '<?php echo $this->createUrl('Verifikasi/VerifikasiListGrid'); ?>',
        width:'100%',
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
        pageSize: 20,
        pageList: [20, 30, 50],
        columns: [[
//                {field: 'hasil_uji_id', title: 'Prauji', width: 50, halign: 'center', align: 'center', formatter: bandingPraujiButton},
//                {field: 'hasilUjiId', title: 'Pengukuran', width: 80, halign: 'center', align: 'center', formatter: bandingPengukuranButton},
                {field: 'cetak', width: 50, title: 'Cetak', sortable: false, halign: 'center', align: 'center', formatter: buttonCetak},
                {field: 'cetakSementara', title: 'Sementara', width: 80, halign: 'center', align: 'center', formatter: buttonCetakSementara},
                {field: 'numerator', width: 90, title: 'Numerator', sortable: true},
                {field: 'no_kendaraan', width: 105, title: 'No Kendaraan', sortable: true},
                {field: 'no_uji', title: 'No Uji', width: 100, sortable: true},
                {field: 'penguji', width: 180, title: 'Penguji', sortable: false, halign: 'center'},
//                {field: 'ptgs_prauji', width: 80, title: 'Ptgs Pra Uji', sortable: false},
                {field: 'prauji', width: 80, title: 'Pra Uji', sortable: false, halign: 'center', align: 'center'},
//                {field: 'ptgs_smoke', width: 80, title: 'Ptgs Emisi', sortable: false},
                {field: 'emisi', width: 80, title: 'Emisi', sortable: false, halign: 'center', align: 'center'},
//                {field: 'ptgs_pitlift', width: 80, title: 'Ptgs Pit Lift', sortable: false},
                {field: 'pitlift', width: 80, title: 'Pit Lift', sortable: false, halign: 'center', align: 'center'},
//                {field: 'ptgs_lampu', width: 80, title: 'Ptgs Lampu', sortable: false},
                {field: 'lampu', width: 80, title: 'Lampu', sortable: false, halign: 'center', align: 'center'},
//                {field: 'ptgs_break', width: 80, title: 'Ptgs Rem', sortable: false},
                {field: 'rem', width: 80, title: 'Break', sortable: false, halign: 'center', align: 'center'},
//                {field: 'bsumbu1', title: 'S I', width: 70, sortable: false, align: 'center'},
//                {field: 'bsumbu2', title: 'S II', width: 70, sortable: false, align: 'center'},
//                {field: 'bsumbu3', title: 'S III', width: 70, sortable: false, align: 'center'},
//                {field: 'bsumbu4', title: 'S IV', width: 70, sortable: false, align: 'center'},
//                {field: 'status', width: 80, title: 'status', sortable: false},
                {field: 'catatan', width: 600, title: 'Catatan TL', sortable: false}
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.tanggal = $('#tgl_search').val();
            params.chooseProses = $('#choose_proses :selected').val();
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
    function buttonCetak(value) {
        var button;
        var explode = value.split('|');
        var ltl = explode[0];
        var id = explode[1];
        var noSurat = explode[2];
        var penguji = explode[3];
        var url = '';
        if (ltl == 'l') {
            url = '<?php echo $this->createUrl('verifikasi/cetakl'); ?>';
            button = '<button class="btn btn-success" type="button" onclick="buttonDialogPosisi(\'' + url + '\', \'' + id + '\', \'' + penguji + '\')"><span class="glyphicon glyphicon-duplicate"></span></button>';
        } else if (ltl == 'tl') {
            url = '<?php echo $this->createUrl('verifikasi/cetaktl'); ?>';
            button = '<button class="btn btn-danger" type="button" onclick="buttonDialogNoSurat(\'' + url + '\', \'' + id + '\', \'' + noSurat + '\', \'' + penguji + '\')"><span class="glyphicon glyphicon-duplicate"></span></button>';
        }
        return button;
    }
    
    function deselecAll() {
        $('#list_kelulusan').selectpicker('deselectAll');
    }

    function cetakReport(urlAct) {
        var tgl = $('#tgl_search').val();
        window.location.href = urlAct + "?tgl=" + tgl;
        return false;
    }
    
    // PROSES CETAK LULUS SEMENTARA
    function buttonCetakSementara(value) {
        var button;
        var explode = value.split('|');
        var ltl = explode[0];
        var id = explode[1];
        var url = '';
        if (ltl == 'l') {
            url = '<?php echo $this->createUrl('Verifikasi/CetakLulusSementara'); ?>';
            button = '<button class="btn btn-success" type="button" onclick="buttonDialogNoSuratSementara(\'' + url + '\', \'' + id + '\')"><span class="glyphicon glyphicon-duplicate"></span></button>';
        } else {
            button = "<button class='btn btn-default' type='button' disabled='disabled'><span class='glyphicon glyphicon-duplicate'></span></button>";
        }
        return button;
    }
    
    function buttonDialogNoSuratSementara(urlAct, id) {
        $('#dialog_sementara_id').val(id);
        $('#dialog_sementara_url').val(urlAct);
        $('#dlg_lulus_sementara').dialog('open');
    }
    
    function cetakLulusSementara() {
        var no_surat = '';
        var penguji = $("#choose_penguji_sementara option:selected").val();
        var catatan = $('#catatan_lulus_sementara').val();
        var id = $('#dialog_sementara_id').val();
        var url = $('#dialog_sementara_url').val();
        $.ajax({
            url: '<?php echo $this->createUrl('Verifikasi/SaveCetakLulusSementara'); ?>',
            type: 'POST',
            data: {no_surat:no_surat, penguji:penguji, id:id, catatan:catatan},
            success: function (data) {
                $('#dlg_lulus_sementara').dialog('close');
                prosesSearch();
                prosesCetakLulusSementara(url,id,no_surat,penguji);
            },
            error: function (data) {
                $('#dlg_lulus_sementara').dialog('close');
                prosesSearch();
                return false;
            }
        });
    }
    
    function prosesCetakLulusSementara(url,id,no_surat,penguji) {
        var win = window.open(url + "?id=" + id + "&nosurat=" + no_surat + "&nrp=" + penguji, '_blank');
        win.focus();
    }
</script>