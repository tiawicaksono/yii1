<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PosisiController extends Controller {

    public function filters() {
        return array(
            'Rights',
        );
    }
    
    public function actionIndex() {
        $this->pageTitle = 'BANDING & POSISI';
        $this->layout = '//layouts/main_top';
        $this->render('index');
    }

    public function actionPosisiListGrid() {
        $ok = Yii::app()->baseUrl . "/images/icon_approve.png";
        $reject = Yii::app()->baseUrl . "/images/icon_reject.png";
        $proses = Yii::app()->baseUrl . "/images/icon_proccess.png";
        $textCategory = strtoupper($_POST['textCategory']);

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_retribusi';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "'),' ',''))");
//                $criteria->addCondition("(replace(LOWER($selectCategory),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }
        $result = VStatusProses::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $id_hasil_uji = $p->id_hasil_uji;
            //PRAUJI
            if ($p->prauji == FALSE) {
//                $a = '1';
                $img_prauji = "<img src='$proses'>";
            } else {
//                $a = '2';
                if ($p->lulus_prauji == "true") {
                    $img_prauji = '<img src="' . $ok . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'prauji\')" style="cursor:pointer">';
                } else {
                    $img_prauji = '<img src="' . $reject . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'prauji\')" style="cursor:pointer">';
                }
            }
            //EMISI
            if ($p->smoke == FALSE) {
                $img_smoke = "<img src='$proses'>";
            } else {
                if ($p->lulus_smoke == "true") {
                    $img_smoke = '<img src="' . $ok . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'emisi\')" style="cursor:pointer">';
                } else {
                    $img_smoke = '<img src="' . $reject . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'emisi\')" style="cursor:pointer">';
                }
            }
            //PITLIFT
            if ($p->pitlift == FALSE) {
                $img_pitlift = "<img src='$proses'>";
            } else {
                if ($p->lulus_pitlift == "true") {
                    $img_pitlift = '<img src="' . $ok . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'pitlift\')" style="cursor:pointer">';
                } else {
                    $img_pitlift = '<img src="' . $reject . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'pitlift\')" style="cursor:pointer">';
                }
            }
            //LAMPU
            if ($p->lampu == FALSE) {
                $img_lampu = "<img src='$proses'>";
            } else {
                if ($p->lulus_lampu == "true") {
                    $img_lampu = '<img src="' . $ok . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'lampu\')" style="cursor:pointer">';
                } else {
                    $img_lampu = '<img src="' . $reject . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'lampu\')" style="cursor:pointer">';
                }
            }
            //BRAKE
            if ($p->break == FALSE) {
                $img_brake = "<img src='$proses'>";
            } else {
                if ($p->lulus_break == "true") {
                    $img_brake = '<img src="' . $ok . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'rem\')" style="cursor:pointer">';
                } else {
                    $img_brake = '<img src="' . $reject . '" onclick="buttonBanding(' . $id_hasil_uji . ', \'rem\')" style="cursor:pointer">';
                }
            }

            $dataJson[] = array(
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "nama_pemilik" => $p->nama_pemilik,
                "prauji" => $img_prauji,
                "emisi" => $img_smoke,
                "pitlift" => $img_pitlift,
                "lampu" => $img_lampu,
                "rem" => $img_brake,
                "catatan" => $this->catatan($id_hasil_uji),
                "numerator" => $p->numerator
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

    private function catatan($id_hasil_uji) {
        $data = VDetailTl::model()->findAllByAttributes(array('id_hasil_uji' => $id_hasil_uji));
        $ul = "<ul>";
        foreach ($data as $p) {
            $ul .= "<li>" . $p->kelulusan . "</li>";
        }
        $ul .= "</ul>";
        return $ul;
    }

    /*
     * PROSES BANDING
     */

    public function actionProsesBandingPrauji() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $hari_ini = date('m/d/Y');

        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        //JIKA TGL UJI ULANG == HARI INI
        $updateHasilUji = "UPDATE tbl_hasil_uji SET prauji=FALSE, lulus_prauji=FALSE, lulus_ujimekanis=FALSE, ujimekanis=FALSE, cetak=FALSE, 
        break=FALSE, lulus_break=FALSE, 
        lampu=FALSE, lulus_lampu=FALSE, 
        pitlift=FALSE, lulus_pitlift=FALSE, 
        smoke=FALSE, lulus_smoke=FALSE 
        WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($updateHasilUji)->execute();

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($delete)->execute();
    }

    public function actionProsesBandingEmisi() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $hari_ini = date('m/d/Y');

        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        //JIKA TGL UJI ULANG == HARI INI
        $updateHasilUji = "UPDATE tbl_hasil_uji SET ujimekanis=FALSE, lulus_ujimekanis=FALSE, cetak=FALSE, 
        break=FALSE, lulus_break=FALSE,  
        lampu=FALSE, lulus_lampu=FALSE, 
        pitlift=FALSE, lulus_pitlift=FALSE, 
        smoke=FALSE, lulus_smoke=FALSE 
        WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($updateHasilUji)->execute();

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl != 'Prauji'";
        Yii::app()->db->createCommand($delete)->execute();
    }

    public function actionProsesBandingPitlift() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $hari_ini = date('m/d/Y');

        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        //JIKA TGL UJI ULANG == HARI INI
        $updateHasilUji = "UPDATE tbl_hasil_uji SET ujimekanis=FALSE, lulus_ujimekanis=FALSE, cetak=FALSE, 
        break=FALSE, lulus_break=FALSE,  
        lampu=FALSE, lulus_lampu=FALSE, 
        pitlift=FALSE, lulus_pitlift=FALSE 
        WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($updateHasilUji)->execute();

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl != 'Prauji' AND input_tl != 'Emisi'";
        Yii::app()->db->createCommand($delete)->execute();
    }

    public function actionProsesBandingLampu() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $hari_ini = date('m/d/Y');

        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        //JIKA TGL UJI ULANG == HARI INI
        $updateHasilUji = "UPDATE tbl_hasil_uji SET ujimekanis=FALSE, lulus_ujimekanis=FALSE, cetak=FALSE, 
        break=FALSE, lulus_break=FALSE,  
        lampu=FALSE, lulus_lampu=FALSE 
        WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($updateHasilUji)->execute();

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl = 'Lampu' AND input_tl = 'Break'";
        Yii::app()->db->createCommand($delete)->execute();
    }

    public function actionProsesBandingRem() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $hari_ini = date('m/d/Y');

        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        //JIKA TGL UJI ULANG == HARI INI
        $updateHasilUji = "UPDATE tbl_hasil_uji SET ujimekanis=FALSE, lulus_ujimekanis=FALSE, cetak=FALSE, 
        break=FALSE, lulus_break=FALSE  
        WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($updateHasilUji)->execute();

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl = 'Break'";
        Yii::app()->db->createCommand($delete)->execute();
    }
}
