<?php
$baseUrl = Yii::app()->request->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->getClientScript();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>IKM</title>
        <meta content="IE=edge" http-equiv="x-ua-compatible">
        <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="yes" name="apple-touch-fullscreen">
        <script>
            function tambah(idQuestion,answerQuestion, urutan) {
                var simpan_array = $('#simpan_array').val();                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->createUrl('Default/Pertanyaan'); ?>',
                    data:{id_question:idQuestion, answer_question:answerQuestion, arr_jawaban: simpan_array, urutan:urutan},
                    dataType: "json",
                    success: function (data) {
                        $('#target-content').html(data.pertanyaan);
                        $('#divTombol').html(data.tombol);
                        $('#simpan_array').val(data.arrJawaban);
                    },
                    error: function () {
                        return false;
                    }
                });
            }
        </script>
        <?php
        $cs->registerCssFile($path . '/css/bootstrap.css');
        $cs->registerCssFile($path . '/css/keyframes.css');
        $cs->registerCssFile($path . '/css/style.css');
        $cs->registerScriptFile($path . '/js/jquery.min.js', CClientScript::POS_BEGIN);
        $cs->registerScriptFile($path . '/js/jquery.smoothState.min.js', CClientScript::POS_BEGIN);
        $cs->registerScriptFile($path . '/js/functions.js', CClientScript::POS_BEGIN);
        ?>
    </head>
    <body style="background-image: url('<?php echo $path; ?>/img/ikm.png'); background-repeat: no-repeat;">
        <input type="hidden" id="simpan_array">
        <div style="background-image: url('<?php echo $path; ?>/img/bg_pertanyaan.png'); background-repeat: no-repeat; height: 230px;  width: 1664px; position: fixed; top:290px; left: 20px;">
            <div id="target-content">
                <input id="question_id" type="hidden" value="<?php echo $dataquestion->question_id; ?>">
                <div style="margin-left: 70px; color: #35344D; font-weight: bold; height: 80px; width: 30px; font-size: 120px; float: left;">
                    1
                </div>
                <div style="font-family: 'Times New Roman'; margin-left: 300px; margin-top: 20px; color: #35344D; font-weight: bold; font-size: 48px; width: 880px;">
                    <?php echo $dataquestion->question; ?>
                </div>
            </div>
        </div>
        <div id="divTombol" class="page animated fadeinright">
            <div class="col-md-4">
                <center>
                    <a href="javascript:void(0)" onClick="tambah('<?php echo $dataquestion->question_id; ?>','A',0)"><img src="<?php echo $path; ?>/img/puas.png" style="width:459px; height:320px;" /></a>
                </center>
            </div>
            <div class="col-md-4">
                <center>
                    <a href="javascript:void(0)" onClick="tambah('<?php echo $dataquestion->question_id; ?>','B',0)"><img src="<?php echo $path; ?>/img/cukup_puas.png" style="width:459px; height:320px;" /></a>
                </center>
            </div>
            <div class="col-md-4">
                <center>
                    <a href="javascript:void(0)" onClick="tambah('<?php echo $dataquestion->question_id; ?>','C',0)"><img src="<?php echo $path; ?>/img/kecewa.png" style="width:459px; height:320px;" /></a>
                </center>
            </div>
        </div>
<!--        <div id="footerbar">
            &nbsp;
        </div>-->
    </body>
</html>