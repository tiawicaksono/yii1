<?php

class DefaultController extends Controller {

    public $layout = '/';

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->order = 'question_id asc';
        $data = TblIkmQuestion::model()->find($criteria);
        $criteria->limit = 1;
        $criteria->offset = 1;
        $data2 = TblIkmQuestion::model()->find($criteria);
        $this->render('index', array(
            'dataquestion' => $data,
            'dataquestion2' => $data2
        ));
    }

    public function actionPertanyaan() {
        $path = $this->module->assetsUrl;
        $arrJawaban = $_POST['arr_jawaban'];
        $idQuestion = $_POST['id_question'];
        $answerQuestion = $_POST['answer_question'];
        $urutan = $_POST['urutan'] + 1;
        $concatIdJawaban = $urutan . $answerQuestion;
        $criteria = new CDbCriteria();
        $criteria->order = 'question_id asc';
        $criteria->limit = 1;
        $criteria->offset = $urutan;
        $criteria->addCondition('question_status = 1');
        $data = TblIkmQuestion::model()->find($criteria);

        $criteriaCount = new CDbCriteria();
        $criteriaCount->addCondition('question_status = 1');
        $countData = TblIkmQuestion::model()->count($criteriaCount);

        if (empty($arrJawaban)) {
            $arrayJawaban = array($concatIdJawaban);
        } else {
            $arrayJawaban = array($arrJawaban);
            array_push($arrayJawaban, "$concatIdJawaban");
        }
        $arrdata['arrJawaban'] = $arrayJawaban;

        if ($countData == $urutan) {
            $comma_separated = implode(",", $arrayJawaban);
            $explode_comma_separated = explode(",", $comma_separated);
            $data_new = new TblIkm();
            $data_new->tgl_ikm = date('Y-m-d');
            $data_new->no_kendaraan = '-';
            $data_new->jawaban = $comma_separated;
            $data_new->jawaban1 = substr($explode_comma_separated[0],-1);
            $data_new->jawaban2 = substr($explode_comma_separated[1],-1);
            $data_new->jawaban3 = substr($explode_comma_separated[2],-1);
            $data_new->save();
//            $url = $this->createUrl('/ikm');
//            $arrdata['pertanyaan'] = '<div style="margin-left: 70px; color: #35344D; font-weight: bold; height: 80px; width: 30px; font-size: 120px; float: left;">
//                    &nbsp;</div>
//                    <div style="font-family: Times New Roman; margin-left: 300px; margin-top: 20px; color: #35344D; font-weight: bold; font-size: 48px; width: 880px;">Terimakasih</div>';
//            $arrdata['tombol'] = '<script>
//		setTimeout(function(){ location.href = "'.$url.'"; }, 1000);
//		</script>';
            $arrdata['pertanyaan'] = '<input id="question_id" type="hidden" value="' . 1 . '">
                <div style="margin-left: 70px; color: #35344D; font-weight: bold; height: 80px; width: 30px; font-size: 120px; float: left;">1</div>
                <div style="font-family: Times New Roman; margin-left: 300px; margin-top: 20px; color: #35344D; font-weight: bold; font-size: 48px; width: 880px;">Bagaimana kepuasan anda dalam pelayanan uji</div>';
            $arrdata['tombol'] = '<div class="page animated fadeinright">
                <div class="col-md-4">
                    <center>
                        <a href="javascript:void(0)" onClick="tambah(\'' . 1 . '\',\'A\',' . 1 . ')"><img src="' . $path . '/img/puas.png" style="width:459px; height:320px;" /></a>
                    </center>
                </div>
                <div class="col-md-4">
                    <center>
                        <a href="javascript:void(0)" onClick="tambah(\'' . 1 . '\',\'B\',' . 1 . ')"><img src="' . $path . '/img/cukup_puas.png" style="width:459px; height:320px;" /></a>
                    </center>
                </div>
                <div class="col-md-4">
                    <center>
                        <a href="javascript:void(0)" onClick="tambah(\'' . 1 . '\',\'C\',' . 1 . ')"><img src="' . $path . '/img/kecewa.png" style="width:459px; height:320px;" /></a>
                    </center>
                </div>
            </div>';
        } else {
            $nomer = $urutan+1;
            $arrdata['pertanyaan'] = '<input id="question_id" type="hidden" value="' . $data->question_id . '">
                <div style="margin-left: 70px; color: #35344D; font-weight: bold; height: 80px; width: 30px; font-size: 120px; float: left;">
                '.$nomer.'</div>
                <div style="font-family: Times New Roman; margin-left: 300px; margin-top: 20px; color: #35344D; font-weight: bold; font-size: 48px; width: 880px;">' . $data->question . '</div>';
            $arrdata['tombol'] = '<div class="page animated fadeinright">
                <div class="col-md-4">
                    <center>
                        <a href="javascript:void(0)" onClick="tambah(\'' . $data->question_id . '\',\'A\',' . $urutan . ')"><img src="' . $path . '/img/puas.png" style="width:459px; height:320px;" /></a>
                    </center>
                </div>
                <div class="col-md-4">
                    <center>
                        <a href="javascript:void(0)" onClick="tambah(\'' . $data->question_id . '\',\'B\',' . $urutan . ')"><img src="' . $path . '/img/cukup_puas.png" style="width:459px; height:320px;" /></a>
                    </center>
                </div>
                <div class="col-md-4">
                    <center>
                        <a href="javascript:void(0)" onClick="tambah(\'' . $data->question_id . '\',\'C\',' . $urutan . ')"><img src="' . $path . '/img/kecewa.png" style="width:459px; height:320px;" /></a>
                    </center>
                </div>
            </div>';
        }
        echo CJSON::encode($arrdata);
    }

}
