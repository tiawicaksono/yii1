<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportController
 *
 * @author TIA.WICAKSONO
 */
class DefaultController extends Controller {

    //put your code here
    public $layout = '//layouts/main_android';
    public function actionIndex() {
        $this->pageTitle = 'Status Proses';
        $this->render('cis');
    }
    
    
    public function actionStatusProsesListGrid() {
        $ok = Yii::app()->baseUrl . "/images/icon_approve.png";
        $reject = Yii::app()->baseUrl . "/images/icon_reject.png";
        $proses = Yii::app()->baseUrl . "/images/icon_proccess.png";

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'numerator_hari';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $criteria->addCondition('prauji=true AND smoke=true AND pitlift=true AND lampu=true AND break=true');
        $result = VStatusProses::model()->findAll($criteria);
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
                "no_antrian" => $p->no_antrian,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "ptgs_prauji" => $p->ptgs_prauji,
                "ptgs_smoke" => $p->ptgs_smoke,
                "ptgs_pitlift" => $p->ptgs_pitlift,
                "ptgs_lampu" => $p->ptgs_lampu,
                "ptgs_break" => $p->ptgs_break,
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
                    'total' => VStatusProses::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }
}
