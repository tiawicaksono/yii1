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
        <h3 class="box-title">Pengajuan Buku Uji</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="col-xs-12 col-md-12 no-padding">
            <div class="col-md-6 no-margin no-padding">
                <?php if ($position == 3) { ?>
                    <form class="form-inline" id="form_no_seri">
                        <div class="form-group">
                            <input type="text" class="form-control text-besar" id="kepala_seri" size="2" name="kepala_seri" placeholder="A" style="text-align: center">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_seri_awal"  name="no_seri_awal" placeholder="No Seri Awal(000000)">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="prosesNoSeri('<?php echo $this->createUrl('Bukuuji/Prosesnoseri'); ?>')">Submit</button>
                        <button type="button" class="btn btn-warning" onclick="sendsms('<?php echo $this->createUrl('Bukuuji/SendSms'); ?>')"><span class="glyphicon glyphicon-envelope"></span> Send SMS</button>
                    </form>
                <?php } ?>
            </div>
            <div class="col-md-6 no-margin no-padding">
                <div class="form-inline pull-right" style="margin-bottom: 10px;">
                    <div class="form-group">
                        <label for="search_tgl">Tanggal Pengajuan : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php echo CHtml::textField('tgl_pengajuan', date('d-M-y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($position != 1) { ?>
            <div class="col-xs-12 col-md-12">
                <?php
                $utlActStatus = $this->createUrl('Bukuuji/PilihStatusRecommendation');
                ?>
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li id="step1" class="step <?php echo $position == 3 ? "active" : ""; ?>">
                        <a href="javascript:void(0)" onclick="pilih_tahap_bukuuji('step1', '<?php echo $utlActStatus; ?>')">
                            <h4 class="list-group-item-heading">Step 1</h4>
                            <p class="list-group-item-text">Kasubag UPTD PKB Surabaya</p>
                        </a>
                    </li>
                    <li id="step2" class="step <?php echo $position == 1 ? "active" : ""; ?>">
                        <a href="javascript:void(0)" onclick="pilih_tahap_bukuuji('step2', '<?php echo $utlActStatus; ?>')">
                            <h4 class="list-group-item-heading">Step 2</h4>
                            <p class="list-group-item-text">Kepala Dinas Perhubungan Surabaya</p>
                        </a>
                    </li>
                </ul>
            </div>
        <?php } ?>

        <div class="container-fluid col-xs-12 col-md-12  no-margin no-padding" id="list_buku_uji">
            <?php $this->renderPartial('proses', array('urlAct' => $urlAct, 'step' => $step)); ?>
        </div>

        <?php if ($position != 1) { ?>
            <div class="container-fluid">
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
    function sendsms(urlAct) {
        var value = $('#tgl_pengajuan').val();
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