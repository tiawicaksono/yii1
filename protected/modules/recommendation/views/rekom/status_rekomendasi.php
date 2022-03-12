<?php
$baseUrl = Yii::app()->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($path . '/css/check_radio.css');
$cs->registerCssFile($path . '/css/status_recommendation.css');
$cs->registerCssFile($baseUrl . '/css/bootstrap-select.css');
$cs->registerScriptFile($baseUrl . '/js/bootstrap-select.js', CClientScript::POS_END);
$cs->registerScriptFile($path . '/js/recommendation.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row {
        height: 45px !important;
    }
</style>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Rekomendasi</h3>
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
            </div>
        </div>
        <div class="col-xs-12 col-md-12" style="margin-top: 20px">
            <table id="rekomListGrid" style="height: 300px"></table>
        </div>

        <?php echo CHtml::beginForm('', 'post', array('id' => 'formRekom')); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                <div class="col-lg-3 col-md-3">
                    <?php
                    echo CHtml::textField('no_uji', '', array('class' => 'form-control text-besar', 'readonly' => true, 'placeholder' => 'NO UJI'));
                    echo CHtml::hiddenField('id_rekom', '', array('class' => 'form-control text-besar', 'readonly' => true));
                    ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php echo CHtml::textField('no_kendaraan', '', array('class' => 'form-control text-besar', 'readonly' => true, 'placeholder' => 'NO KENDARAAN')); ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <button id="button_simpan" type="button" class="btn btn-primary" onclick="submitFormRekom()" disabled="true">SIMPAN</button>
                </div>
            </div>
            <div class="col-xs-12 col-md-12" style="margin-top: 20px">
                <section class="col-md-3">
                    <div class="box box-success">
                        <div class="box-header with-border bg-green">
                            <h3 class="box-title">REKOMENDASI MUTASI KELUAR</h3>
                            <div class="box-tools pull-right">
                                <input name="checkbox_mutke" id="checkbox_mutke" type="checkbox" class="flat-red">
                            </div>
                        </div>
                        <div class="box-body">
                            <label for="nik_baru">NIK Baru</label>
                            <?php echo CHtml::textField('nik_baru', '', array('class' => 'form-control text-besar')) ?>
                            <label for="pemilik_baru">Pemilik Baru</label>
                            <?php echo CHtml::textField('pemilik_baru', '', array('class' => 'form-control text-besar')); ?>
                            <label for="alamat_baru">Alamat Baru</label>
                            <?php echo CHtml::textArea('alamat_baru', '', array('class' => 'form-control text-besar')) ?>
                            <label for="propinsi">Provinsi</label>
                            <?php
                            $criteria_provinsi = new CDbCriteria();
                            $criteria_provinsi->order = 'nama asc';
                            $tbl_provinsi = MProvinsi::model()->findAll($criteria_provinsi);
                            $type_list = CHtml::listData($tbl_provinsi, 'id_provinsi', 'nama');
                            echo CHtml::dropDownList('propinsi_mutke', '', $type_list, array('class' => 'propinsi_mutke form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => "selectProvinsi('mutke')", 'empty' => ''));
                            ?>
                            <label for="kota">Kota</label>
                            <?php
                            $criteria_kota = new CDbCriteria();
                            // $criteria_kota->addCondition("id_provinsi = '11'");
                            $criteria_kota->order = 'nama asc';
                            $tbl_kota = MKota::model()->findAll($criteria_kota);
                            $type_list = CHtml::listData($tbl_kota, 'id_kota', 'nama');
                            echo CHtml::dropDownList('kota_mutke', '', $type_list, array('class' => 'kota_mutke form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => ''));
                            ?>
                        </div>
                    </div>
                </section>
                <section class="col-md-3">
                    <div class="box box-success">
                        <div class="box-header with-border bg-green">
                            <h3 class="box-title">REKOMENDASI NUMPANG KELUAR</h3>
                            <div class="box-tools pull-right">
                                <input name="checkbox_numke" id="checkbox_numke" type="checkbox" class="flat-red">
                            </div>
                        </div>
                        <div class="box-body">
                            <!--<label for="no_surat">No Surat</label>-->
                            <?php // echo CHtml::textField('no_surat_numke', '', array('class' => 'form-control text-besar', 'readonly' => true)); 
                            ?>
                            <label for="propinsi">Dari Provinsi</label>
                            <?php
                            $criteria_provinsi = new CDbCriteria();
                            $criteria_provinsi->order = 'nama asc';
                            $tbl_provinsi = MProvinsi::model()->findAll($criteria_provinsi);
                            $type_list = CHtml::listData($tbl_provinsi, 'id_provinsi', 'nama');
                            echo CHtml::dropDownList('propinsi_numke', '', $type_list, array('class' => 'propinsi_numke form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => "selectProvinsi('numke')", 'empty' => ''));
                            ?>
                            <label for="kota">Dari Kota</label>
                            <?php
                            $criteria_kota = new CDbCriteria();
                            //                                $criteria_kota->addCondition("id_provinsi = '11'");
                            $criteria_kota->order = 'nama asc';
                            $tbl_kota = MKota::model()->findAll($criteria_kota);
                            $type_list = CHtml::listData($tbl_kota, 'id_kota', 'nama');
                            echo CHtml::dropDownList('kota_numke', '', $type_list, array('class' => 'kota_numke form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => ''));
                            ?>
                        </div>
                    </div>
                </section>
                <!-- <section class="col-md-3">
                    <div class="box box-info">
                        <div class="box-header with-border bg-aqua">
                            <h3 class="box-title">REKOMENDASI MUTASI MASUK</h3>
                            <div class="box-tools pull-right">
                                <input name="checkbox_mutmas" id="checkbox_mutmas" type="checkbox" class="flat-red">
                            </div>
                        </div>
                        <div class="box-body">
                            <label for="no_surat">No Surat Rekom</label>
                            <?php echo CHtml::textField('no_surat_rekom', '', array('class' => 'form-control text-besar')); ?>
                            <label for="no_surat">Tanggal Surat Rekom</label>
                            <?php echo CHtml::textField('tgl_surat_rekom', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                            <label for="propinsi">Provinsi</label>
                            <?php
                            $criteria_provinsi = new CDbCriteria();
                            $criteria_provinsi->order = 'nama asc';
                            $tbl_provinsi = MProvinsi::model()->findAll($criteria_provinsi);
                            $type_list = CHtml::listData($tbl_provinsi, 'id_provinsi', 'nama');
                            echo CHtml::dropDownList('propinsi_mutmas', '', $type_list, array('class' => 'propinsi_numke form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => "selectProvinsi('mutmas')", 'empty' => ''));
                            ?>
                            <label for="kota">Kota</label>
                            <?php
                            $criteria_kota = new CDbCriteria();
                            $criteria_kota->addCondition("id_provinsi = '11'");
                            $criteria_kota->order = 'nama asc';
                            $tbl_kota = MKota::model()->findAll($criteria_kota);
                            $type_list = CHtml::listData($tbl_kota, 'id_kota', 'nama');
                            echo CHtml::dropDownList('kota_mutmas', '', $type_list, array('class' => 'kota_numke form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => ''));
                            ?>
                        </div>
                    </div>
                </section> -->
                <section class="col-md-3">
                    <div class="row">
                        <div class="box box-info">
                            <div class="box-header with-border bg-aqua">
                                <h3 class="box-title">REKOMENDASI MODIFIKASI (UBAH BENTUK)</h3>
                                <div class="box-tools pull-right">
                                    <input name="checkbox_ubah_bentuk" id="checkbox_ubah_bentuk" type="checkbox" class="flat-red">
                                </div>
                            </div>
                            <div class="box-body">
                                <!--<label for="no_surat">No Surat</label>-->
                                <?php // echo CHtml::textField('no_surat_ubah_bentuk', '', array('class' => 'form-control text-besar', 'readonly' => true)); 
                                ?>
                                <label for="propinsi">Keterangan</label>
                                <?php echo CHtml::textArea('keterangan_ubah_bentuk', '', array('class' => 'form-control text-besar')); ?>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="box box-info">
                            <div class="box-header with-border bg-aqua">
                                <h3 class="box-title">REKOMENDASI ALIH FUNGSI (UBAH SIFAT)</h3>
                                <div class="box-tools pull-right">
                                    <input name="checkbox_ubah_sifat" id="checkbox_ubah_sifat" type="checkbox" class="flat-red">
                                </div>
                            </div>
                            <div class="box-body">
                                <label for="propinsi">Keterangan</label>
                                <?php echo CHtml::textArea('keterangan_ubah_sifat', '', array('class' => 'form-control text-besar')); ?>
                            </div>
                        </div>
                    </div> -->
                </section>
            </div>
        </div>
        <?php echo CHtml::endForm(); ?>

    </div>
</div>
<div id="dlg_tandatangan" class="easyui-dialog" title="Pilih Approval" style="width: 400px; height: auto; padding: 10px;display: none" data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     printRekom();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
            <?php
            echo CHtml::hiddenField('dialog_id_rekom_kendaraan', '', array('class' => 'form-control text-besar', 'readonly' => true));
            ?>
            <select id="choose_tandatangan" class="form-control">
                <?php
                $tandatangan = Kepaladinas::model()->findAll();
                foreach ($tandatangan as $ttd) :
                ?>
                    <option value="<?php echo $ttd->idx; ?>">
                        <?php echo $ttd->nama; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<script>
    $('#rekomListGrid').datagrid({
        url: '<?php echo $this->createUrl('Rekom/ListGridRekom'); ?>',
        pagination: true,
        singleSelect: true,
        selectOnCheck: true,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 20,
        pageList: [10, 20, 50],
        //        frozenColumns: [[
        //            ]],
        columns: [
            [{
                    field: 'id_kendaraan_rekom_print',
                    title: 'Print',
                    width: 60,
                    halign: 'center',
                    align: 'center',
                    formatter: actionPrintRekom
                },
                {
                    field: 'id_rekom_proses',
                    width: 50,
                    title: 'Proses',
                    align: 'center',
                    sortable: false,
                    formatter: buttonProsesRekom
                },
                {
                    field: 'no_uji',
                    title: 'No Uji',
                    width: 80,
                    sortable: false
                },
                {
                    field: 'no_kendaraan',
                    width: 90,
                    title: 'No Kendaraan',
                    sortable: false
                },
                {
                    field: 'pemilik',
                    width: 180,
                    title: 'Nama Pemilik',
                    sortable: false
                },
                {
                    field: 'alamat',
                    width: 350,
                    title: 'Alamat',
                    sortable: false
                },
                {
                    field: 'keterangan',
                    width: 350,
                    title: 'Keterangan',
                    sortable: false
                }
            ]
        ],
        //        toolbar: "#search",
        onBeforeLoad: function(params) {
            params.tgl_pengajuan_rekom = $('#tgl_search').val();
        },
        onLoadError: function() {
            return false;
        }
    });

    $(document).ready(function() {
        $('#dlg_tandatangan').dialog('close');
    });

    function buttonProsesRekom(value) {
        var button;
        button = '<button type="button" class="btn btn-info" onclick="prosesRekom(\'' + value + '\')"><span class="glyphicon glyphicon-random"></span></button>';
        return button;
    }

    function actionPrintRekom(value) {
        var button = '<button type="button" class="btn btn-success edit-retribusi" onclick="buttonDialogTandatangan(\'' + value + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }

    function buttonDialogTandatangan(value) {
        $('#dialog_id_rekom_kendaraan').val(value);
        $('#dlg_tandatangan').dialog('open');
    }

    function printRekom() {
        $('#dlg_tandatangan').dialog('close');
        var id = $('#dialog_id_rekom_kendaraan').val();
        var explode = id.split('_');
        var id_kendaraan = explode[0];
        var id_rekom = explode[1];
        var id_uji = explode[2];
        var ttd = $('#choose_tandatangan').val();
        var win = window.open("Rekom/PrintRekom?id_kendaraan=" + id_kendaraan + "&id_rekom=" + id_rekom + "&ttd=" + ttd + "&id_uji=" + id_uji, '_blank');
        win.focus();
    }
</script>