<?php
$baseUrl = Yii::app()->request->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($path . '/css/rollingalat.css');
$cs->registerScriptFile($path . '/js/rollingalat.js', CClientScript::POS_END);
?>
<div class="row">
    <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'FORMINPUT')); ?>
    <section class="col-lg-5 col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">CIS 1</h3>
<!--                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>-->
            </div>
            <div class="box-body" id="table-cis1">
                <?php $this->renderPartial('cis1', array('pengujicis1' => $pengujicis1)); ?>
            </div>
        </div>
    </section>
    <section class="col-lg-2 col-md-12">
        <div class="row center">
            <?php
            $urlActSwitchAll = $this->createUrl('Rollingalat/ProsesSwitchAll');
            $urlActSwitch = $this->createUrl('Rollingalat/ProsesSwitch');
            $urlActRolling = $this->createUrl('Rollingalat/ProsesRolling');
            $urlAct1 = $this->createUrl('Rollingalat/DisplayPengujiCis1');
            $urlAct2 = $this->createUrl('Rollingalat/DisplayPengujiCis2');
            ?>
            <div class="col-lg-12 col-md-2">
                <button type="button" class="btn btn-danger" style="margin-bottom:10px;" onclick="prosesSwitchAll('<?php echo $urlActSwitchAll; ?>', '<?php echo $urlAct1; ?>', '<?php echo $urlAct2; ?>')">
                    &laquo; Switch All &raquo; 
                </button>
            </div>
            <div class="col-lg-12 col-md-2">
                <button type="button" class="btn btn-success" style="margin-bottom:10px;" onclick="prosesSwitch('<?php echo $urlActSwitch; ?>', '<?php echo $urlAct1; ?>', '<?php echo $urlAct2; ?>', 'CIS 2')">
                    Switch to CIS 2 &raquo; 
                </button>
            </div>
            <div class="col-lg-12 col-md-2">
                <button type="button" class="btn btn-warning" style="margin-bottom:10px;" onclick="prosesSwitch('<?php echo $urlActSwitch; ?>', '<?php echo $urlAct1; ?>', '<?php echo $urlAct2; ?>', 'CIS 1')">
                    &laquo; Switch to CIS 1
                </button>
            </div>
            <div class="col-lg-12 col-md-3">
                <button type="button" class="btn btn-primary" style="margin-bottom:10px;" onclick="prosesRolling('<?php echo $urlActRolling; ?>', '<?php echo $urlAct1; ?>', '<?php echo $urlAct2; ?>')">
                    <span class="glyphicon glyphicon-save"></span> Proses Rolling Alat
                </button>
            </div>
            <div class="col-lg-12 col-md-2">
                <button type="button" class="btn btn-info" onclick="refreshRolling('<?php echo $urlAct1; ?>', '<?php echo $urlAct2; ?>')">
                    <span class="glyphicon glyphicon-refresh"></span> Refresh
                </button>
            </div>
        </div>
    </section>
    <section class="col-lg-5 col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">CIS 2</h3>
<!--                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>-->
            </div>
            <div class="box-body" id="table-cis2">
                <?php echo $this->renderPartial('cis2', array('pengujicis2' => $pengujicis2)); ?>
            </div>
        </div>
    </section>
    <?php echo CHtml::endForm(); ?>
</div>
<script>
    $("#checkAllCis1").click(function () {
        $('.checkbox-cis1').not(this).prop('checked', this.checked);
    });
    $("#checkAllCis2").click(function () {
        $('.checkbox-cis2').not(this).prop('checked', this.checked);
    });
</script>