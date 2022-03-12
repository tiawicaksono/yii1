<?php
$baseUrl = Yii::app()->request->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->getClientScript();
//$cs->registerCssFile($path . '/css/styles.css');
$cs->registerScriptFile($baseUrl . '/js/jquery.min.js', CClientScript::POS_BEGIN);
//$cs->registerScriptFile($baseUrl . '/js/jquery-1.12.0.min.js', CClientScript::POS_BEGIN);
$cs->registerScriptFile($baseUrl . '/js/jquery.table.addrow.1.0.js', CClientScript::POS_END);
$cs->registerScriptFile($path . '/js/loket.js', CClientScript::POS_END);
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Mancing</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'FORMINPUT',
            'enableAjaxValidation' => false,
            'htmlOptions' => array(
//                'class' => 'form-horizontal',
                'role' => 'form'
            )
        ));
        ?>
        <font style="color:red">*huruf besar / kecil tidak berpengaruh</font>
        <table class="table">
            <thead>
                <tr>
                    <th>SB / No Kendaraan</th>
                    <th>Numerator</th>
                    <th>
                        <a href="javascript:void(0)" class="btn btn-default addRow pull-right">
                            <i class="glyphicon glyphicon-plus"></i> Add Row
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo CHtml::textField('sb[]', '', array('class' => 'span3 text-besar')); ?>
                    </td>
                    <td>
                        <?php echo CHtml::textField('numerator[]', '', array('class' => 'span3', 'placeholder' => '...')); ?>
                    </td>
                    <td>
                        <button class="delRow btn btn-mini btn-danger" type="button" style="float:right;">
                            <span class="icon-white glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <span class="pull-right">
            <?php
            $urlActForm = $this->createUrl('Default/ProsesMancing');
            echo CHtml::Button('Submit', array('onclick' => "submitForm('$urlActForm')", 'class' => 'btn btn-primary'));
            ?>
        </span>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".addRow").btnAddRow();
        $(".delRow").btnDelRow();
    });
</script>