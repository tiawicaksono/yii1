<?php
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($path . '/js/tahunan.js', CClientScript::POS_END);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Report KBWU</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                <?php echo CHtml::textField('thn_search', date('Y'), array('class' => 'form-control', 'maxlength' => 4)); ?>
                            </div>
                        </div>
                        <div class="col-lg-3 no-padding">
                            <button type="button" id="btn-cetak" class="btn btn-success" onclick="cetak('<?php echo $this->createUrl('Kementrian/ReportKbwu'); ?>')">
                                <!--<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak-->
                                <i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;Export Excel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>