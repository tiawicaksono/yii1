<?php
$path = $this->module->assetsUrl;
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($path . '/js/retribusi.js', CClientScript::POS_END);
$cs->registerCssFile($baseUrl . '/css/bootstrap-select.css');
$cs->registerScriptFile($baseUrl . '/js/bootstrap-select.js', CClientScript::POS_END);
?>
<style>
    .input-group-btn select {
        border-color: #ccc;
        margin-top: 0px;
        margin-bottom: 0px;
        padding-top: 7px;
        padding-bottom: 6px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Form Retribusi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'formPendaftaran')); ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FORM_NIK" class="col-xs-3 control-label">NIK</label>
                        <div class="col-xs-9">
                            <div class="input-group">
                                <?php
                                $userlogin = Yii::app()->session['id_pegawai'];
                                echo CHtml::hiddenField('FORM[USER_LOGIN]', $userlogin, array('class' => 'form-control text-besar'));
                                echo CHtml::textField('FORM[NIK]', '', array('class' => 'form-control text-besar', 'placeholder' => 'NIK and press enter'));
                                echo CHtml::hiddenField('FORM[ID_PASIEN]', 0, array('class' => 'form-control'));
                                ?>
                                <div class="input-group-addon">
                                    <a href="javascript:void(0)" onclick="prosesSearchDetailSb('<?php echo $this->createUrl('Default/DetailNoSb'); ?>', 'sb')"><i class="glyphicon glyphicon-search"></i></a>
                                </div>
                            </div>
                            <span id="loading_stuk" style="display: none"><img src="<?php echo Yii::app()->baseUrl; ?>/images/loading.gif" class="loader"></span>
                            <small id="tidak_ada" style="display: none; color: red;">Data tidak ditemukan</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="FORM_NAMA" class="col-xs-3 control-label">NAMA</label>
                        <div class="col-xs-9">
                            <?php echo CHtml::textField('FORM[NAMA]', '', array('class' => 'form-control text-besar', 'placeholder' => 'NAMA')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FORM_ALAMAT" class="col-xs-3 control-label">Alamat</label>
                        <div class="col-xs-9">
                            <?php echo CHtml::textArea('FORM[ALAMAT]', '', array('class' => 'form-control text-besar', 'rows' => '3', 'placeholder' => 'Alamat')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FORM_DOKTER" class="col-xs-3 control-label">Jenis Kendaraan</label>
                        <div class="col-xs-9">
                            <?php
                            $type_list = CHtml::listData($dokter, 'id', 'nama');
                            echo CHtml::dropDownList('FORM[DOKTER]', '', $type_list, array('class' => 'form-control', 'placeholder' => 'Dokter'));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="FORM_TGL_KONTROL" class="col-xs-3 control-label">Tgl. Kontrol</label>
                        <div class="col-xs-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="FORM[TGL_KONTROL]" id="FORM_TGL_KONTROL" type="text" value="<?php echo date('d/m/Y'); ?>" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </div><!-- /.input group -->
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-12">
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary" onclick="submitForm('<?php echo $this->createUrl('Default/SaveForm'); ?>', 'formPendaftaran')">DAFTAR</button>
                                <button type="button" class="btn btn-danger" onclick="buttonReset('formPendaftaran')">RESET</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                </div>
                <?php echo CHtml::endForm(); ?>

            </div><!-- /.box-body-->
        </div><!-- /.box .box-info-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Validasi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo $this->renderPartial('list_retribusi'); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("keypress", '#FORM_NIK', function(e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearchDetailSb('<?php echo $this->createUrl('Default/DetailNik'); ?>', 'sb');
            return false;
        }
    });
</script>