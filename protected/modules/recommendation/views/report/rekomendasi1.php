<?php
$baseUrl = Yii::app()->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($path . '/css/status_recommendation.css');
$cs->registerScriptFile($path . '/js/recommendation.js', CClientScript::POS_END);
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Status Rekomendasi</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="col-xs-12 col-md-12 no-margin no-padding">
            <form class="form-inline pull-right" style="margin-bottom: 10px;">
                <div class="form-group">
                    <label for="tgl_pengajuan_rekom">Tanggal Pengajuan Rekom : </label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                        <?php echo CHtml::textField('tgl_pengajuan_rekom', date('d-M-y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <!--<input type="button" class="btn btn-primary" onclick="searchPengajuanRekom()" value="search">-->
            </form>
        </div>
        <div class="col-xs-12 col-md-12 no-margin no-padding">
            <?php
            $urlActStatus = $this->createUrl('Default/PilihStatusReportRecommendation');;
            ?>
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li id="step1" class="step <?php echo Yii::app()->session['username'] != 'dian' && Yii::app()->session['username'] != 'irvan' ? "active" : ""; ?>">
                    <a href="javascript:void(0)" onclick="pilih_tahap_rekom('step1', '<?php echo $urlActStatus; ?>')">
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">Kasubag UPTD PKB Surabaya</p>
                    </a>
                </li>
                <li id="step2" class="step">
                    <a href="javascript:void(0)" onclick="pilih_tahap_rekom('step2', '<?php echo $urlActStatus; ?>')">
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Kepala Dinas Perhubungan Surabaya</p>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-xs-12 col-md-12 no-margin no-padding" id="list_status_rekom">
            <?php $this->renderPartial('../report/proses', array('urlAct' => $urlAct, 'step' => $step)); ?>
        </div>

        <div class="col-xs-12 col-md-12 no-margin no-padding">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Keterangan</legend>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_proccess.png">
                            </td>
                            <td class="type-info col-md-11" style="vertical-align: middle;">Masih Proses</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_approve.png">
                            </td>
                            <td class="type-info" style="vertical-align: middle;">Disetujui</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_reject.png">
                            </td>
                            <td class="type-info" style="vertical-align: middle;">Tidak Disetujui</td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>
</div>
