<?php
$baseUrl = Yii::app()->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($path . '/css/status_recommendation.css');
$cs->registerScriptFile($path . '/js/recommendation.js', CClientScript::POS_END);
$position = Yii::app()->session['position_id'];
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Status Rekomendasi</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="col-xs-12 col-md-12 no-margin no-padding">
            <div class="col-md-6 no-margin no-padding">
                <?php if ($position == 3) { ?>
                    <button type="button" class="btn btn-warning" onclick="sendsms('<?php echo $this->createUrl('Default/SendSms'); ?>')"><span class="glyphicon glyphicon-envelope"></span> Send SMS</button>
                <?php } ?>
            </div>
            <div class="col-md-6 no-margin no-padding">
                <form class="form-inline pull-right" style="margin-bottom: 10px;">
                    <div class="form-group">
                        <label for="search_tgl">Tanggal Pengajuan Rekom : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php echo CHtml::textField('tgl_pengajuan_rekom', date('d-M-y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <!--<input type="button" class="btn btn-primary" onclick="searchPengajuanRekom()" value="search">-->
                </form>
            </div>
        </div>
        <?php if ($position != 1) { ?>
            <div class="col-xs-12 col-md-12 no-margin no-padding">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li id="step1" class="step <?php echo $position == 3 ? "active" : ""; ?>">
                        <a href="javascript:void(0)" onclick="pilih_tahap_rekom('step1', '<?php echo $this->createUrl('Default/PilihStatusRecommendation'); ?>')"
                        <?php
//                    echo $position == 3 || $position == 2 || $position == 1 ? 'onclick="pilih_tahap_rekom(\'step1\',\'' . $this->createUrl('Default/PilihStatusRecommendation') . '\')"' : "";
                        ?>>
                            <h4 class="list-group-item-heading">Step 1</h4>
                            <p class="list-group-item-text">UPTD PKB Surabaya</p>
                        </a>
                    </li>
                    <li id="step2" class="step <?php echo $position == 2 ? "active" : ""; ?>">
                        <a href="javascript:void(0)" onclick="pilih_tahap_rekom('step2', '<?php echo $this->createUrl('Default/PilihStatusRecommendation'); ?>')" 
                           <?php // echo $position == 2 || $position == 1 ? 'onclick="pilih_tahap_rekom(\'step2\',\'' . $this->createUrl('Default/PilihStatusRecommendation') . '\')"' : ""; ?>>
                            <h4 class="list-group-item-heading">Step 2</h4>
                            <p class="list-group-item-text">Kepala Dinas Perhubungan Surabaya</p>
                        </a>
                    </li>
                </ul>
            </div>
        <?php } ?>

        <div class="col-xs-12 col-md-12 no-margin no-padding" id="list_status_rekom">
            <!--<div id="proses_1">-->
            <?php $this->renderPartial('proses', array('urlAct' => $urlAct, 'step' => $step)); ?>
            <!--</div>-->
        </div>

        <?php if ($position != 1) { ?>
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
        <?php } ?>
    </div>
</div>

<script>
    $(document).ready(function () {
<?php
$criteria = new CDbCriteria();
$criteria->addCondition('confirm_kadis = false');
$criteria->addCondition('confirm_kupt = true');
//$criteria->addCondition("tgl_approve2 != now()::date");
$data = TblRekom::model()->count($criteria);
if ($position == 1) {
    if ($data > 0) {
        ?>
                notifikasi();
        <?php
    }
}
?>
    });

    function notifikasi() {
        $.messager.defaults.ok = 'Yes';
        $.messager.defaults.cancel = 'No';
        $.messager.confirm('Confirm', 'Terdapat beberapa rekom pada hari lain, Apakah anda ingin approve sekalian?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('Default/ApproveAllDate'); ?>',
                    beforeSend: function () {
                        showlargeloader();
                    },
                    success: function (data) {
                        hidelargeloader();
                        searchPengajuanRekom();
                    },
                    error: function () {
                        hidelargeloader();
                        return false;
                    }
                });
            }
        });
    }
    function sendsms(urlAct) {
        var value = $('#tgl_pengajuan_rekom').val();
        $.ajax({
            url: urlAct,
            type: 'POST',
            data: {tgl: value},
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
            },
            error: function (data) {
                hidelargeloader();
                return false;
            }
        });
    }
</script>