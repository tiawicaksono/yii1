<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HasilController extends Controller {

    public function actionIndex() {
        $this->layout = '//layouts/main_android';
        $this->render('hasil');
    }

    public function actionHasilListGrid() {
        $ok = Yii::app()->baseUrl . "/images/icon_approve.png";
        $reject = Yii::app()->baseUrl . "/images/icon_reject.png";
        $proses = Yii::app()->baseUrl . "/images/icon_proccess.png";
//        $selectCategory = $_POST['selectCategory'];
//        $textCategory = strtoupper($_POST['textCategory']);        

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'numerator_hari';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'ASC';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;

        $result = VStatusProsesNow::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            //prauji
            if ($p->prauji == "true") {
                if ($p->lulus_prauji == "true")
                    $img_prauji = "<img src='$ok'><br/>LULUS";
                else
                    $img_prauji = "<img src='$reject'><br/>TIDAK LULUS";
            }else {
                $img_prauji = "<img src='$proses'><br/>PROSES";
            }
            //smoke
            if ($p->smoke == "true") {
                if ($p->lulus_smoke == "true")
                    $img_smoke = "<img src='$ok'><br/>LULUS";
                else
                    $img_smoke = "<img src='$reject'><br/>TIDAK LULUS";
            }else {
                $img_smoke = "<img src='$proses'><br/>PROSES";
            }
            //pitlift
            if ($p->pitlift == "true") {
                if ($p->lulus_pitlift == "true")
                    $img_pitlift = "<img src='$ok'><br/>LULUS";
                else
                    $img_pitlift = "<img src='$reject'><br/>TIDAK LULUS";
            }else {
                $img_pitlift = "<img src='$proses'><br/>PROSES";
            }
            //lampu
            if ($p->lampu == "true") {
                if ($p->lulus_lampu == "true")
                    $img_lampu = "<img src='$ok'><br/>LULUS";
                else
                    $img_lampu = "<img src='$reject'><br/>TIDAK LULUS";
            }else {
                $img_lampu = "<img src='$proses'><br/>PROSES";
            }
            //rem
            if ($p->break == "true") {
                if ($p->lulus_break == "true")
                    $img_break = "<img src='$ok'><br/>LULUS";
                else
                    $img_break = "<img src='$reject'><br/>TIDAK LULUS";
            }else {
                $img_break = "<img src='$proses'><br/>PROSES";
            }
            $dataJson[] = array(
                "no_antrian" => $p->numerator_hari,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "nm_komersil" => $p->nm_komersil,
                "nama_pemilik" => $p->nama_pemilik,
                "prauji" => $img_prauji,
                "emisi" => $img_smoke,
                "pitlift" => $img_pitlift,
                "lampu" => $img_lampu,
                "rem" => $img_break
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VStatusProsesNow::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

}
