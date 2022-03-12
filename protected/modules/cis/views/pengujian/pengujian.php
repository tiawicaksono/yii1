<?php
$id_user = Yii::app()->user->getId();
$tblUser = TblUser::model()->findByPk($id_user);
$bagian_prauji = $tblUser->prauji;
$bagian_emisi = $tblUser->emisi;
$bagian_pitlift = $tblUser->pitlift;
$bagian_rem = $tblUser->brake;
$bagian_lampu = $tblUser->headlight;
$bagian_gandengan = $tblUser->gandengan;
$posisi_cis = Yii::app()->session['posisi_cis'];
?>
<div class="box box-info">
    <div class="box-body">
        <?php if ($bagian_prauji == 'true' || $bagian_emisi == 'true' || $bagian_pitlift == 'true' || $bagian_lampu == 'true' || $bagian_rem == 'true' || $bagian_gandengan == 'true') { ?>
            <div class="easyui-tabs">
                <?php if ($bagian_prauji == 'true') { ?>
                    <div title="PRAUJI" style="padding:10px">
                        <?php $this->renderPartial('index_prauji'); ?>
                    </div>
                <?php } ?>
                <?php if ($bagian_emisi == 'true') { ?>
                    <div title="EMISI" style="padding:10px">
                        <?php $this->renderPartial('index_emisi'); ?>
                    </div>
                <?php } ?>
                <?php if ($bagian_pitlift == 'true') { ?>
                    <div title="PITLIFT" style="padding:10px">
                        <?php $this->renderPartial('index_pitlift'); ?>
                    </div>
                <?php } ?>
                <?php if ($bagian_lampu == 'true') { ?>
                    <div title="LAMPU" style="padding:10px">
                        <?php $this->renderPartial('index_lampu'); ?>
                    </div>
                <?php } ?>
                <?php if ($bagian_rem == 'true') { ?>
                    <div title="REM" style="padding:10px">
                        <?php $this->renderPartial('index_rem'); ?>
                    </div>
                <?php } ?>
                <!--=================================================================================-->
                <?php if ($bagian_gandengan == 'true') { ?>
                    <div title="PRAUJI TEMPELAN" style="padding:10px">
                        <?php $this->renderPartial('index_prauji_gandengan'); ?>
                    </div>
                <?php } ?>
                <?php if ($bagian_gandengan == 'true') { ?>
                    <div title="REM TEMPELAN" style="padding:10px">
                        <?php $this->renderPartial('index_rem_gandengan'); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            Maaf, anda BELUM diset di ROLLING ALAT   
        <?php } ?>
    </div>
</div>