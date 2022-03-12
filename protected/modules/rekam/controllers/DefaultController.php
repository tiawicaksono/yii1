<?php

class DefaultController extends Controller {

    /* =====================================================================
     * STATUS PROSES UJI
      ===================================================================== */

    public function actionStatusProses() {
        $this->pageTitle = 'Status Proses';
        $this->render('status_proses');
    }

    public function actionStatusProsesListGrid() {
        $ok = Yii::app()->baseUrl . "/images/icon_approve.png";
        $reject = Yii::app()->baseUrl . "/images/icon_reject.png";
        $proses = Yii::app()->baseUrl . "/images/icon_proccess.png";
        $cis = $_POST['chooseProses'];
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            if ($selectCategory == 'numerator') {
                $criteria->addCondition("$selectCategory = $textCategory");
            } else {
                $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
            }
        }
        $criteria->addCondition("posisi like '$cis'");
        $result = VStatusProses::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            //prauji
            if ($p->prauji == "true") {
                if ($p->lulus_prauji == "true")
                    $img_prauji = "<img src='$ok'>";
                else
                    $img_prauji = "<img src='$reject'>";
            }else {
                $img_prauji = "<img src='$proses'>";
            }
            //smoke
            if ($p->smoke == "true") {
                if ($p->lulus_smoke == "true")
                    $img_smoke = "<img src='$ok'>";
                else
                    $img_smoke = "<img src='$reject'>";
            }else {
                $img_smoke = "<img src='$proses'>";
            }
            //pitlift
            if ($p->pitlift == "true") {
                if ($p->lulus_pitlift == "true")
                    $img_pitlift = "<img src='$ok'>";
                else
                    $img_pitlift = "<img src='$reject'>";
            }else {
                $img_pitlift = "<img src='$proses'>";
            }
            //lampu
            if ($p->lampu == "true") {
                if ($p->lulus_lampu == "true")
                    $img_lampu = "<img src='$ok'>";
                else
                    $img_lampu = "<img src='$reject'>";
            }else {
                $img_lampu = "<img src='$proses'>";
            }
            //rem
            if ($p->break == "true") {
                if ($p->lulus_break == "true")
                    $img_break = "<img src='$ok'>";
                else
                    $img_break = "<img src='$reject'>";
            }else {
                $img_break = "<img src='$proses'>";
            }
            $dataJson[] = array(
                "id_hasil_uji" => $p->id_hasil_uji,
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

    
    public function actionProsesBandingPrauji() {
        $id_hasil_uji = $_POST['id_hasil_uji'];

        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        $updateHasilUji = "UPDATE tbl_hasil_uji SET prauji=FALSE, lulus_prauji=FALSE, lulus_ujimekanis=FALSE, ujimekanis=FALSE, cetak=FALSE, 
        break=FALSE, lulus_break=FALSE, 
        lampu=FALSE, lulus_lampu=FALSE, 
        pitlift=FALSE, lulus_pitlift=FALSE, 
        smoke=FALSE, lulus_smoke=FALSE 
        WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($updateHasilUji)->query();

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($delete)->query();
        $sql_daftar = "UPDATE tbl_daftar SET lulus = 'false' where id_daftar = $dataHasilUji->id_daftar";
        Yii::app()->db->createCommand($sql_daftar)->query();
        $delete = "DELETE FROM tbl_riwayat WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($delete)->execute();
    }
    
    public function actionProsesBandingPengukuran() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        
        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        $updateHasilUji = "UPDATE tbl_hasil_uji SET ujimekanis=FALSE, lulus_ujimekanis=FALSE, cetak=FALSE, 
        break=FALSE, lulus_break=FALSE,  
        lampu=FALSE, lulus_lampu=FALSE, 
        pitlift=FALSE, lulus_pitlift=FALSE, 
        smoke=FALSE, lulus_smoke=FALSE 
        WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($updateHasilUji)->execute();

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl != 'Prauji'";
        Yii::app()->db->createCommand($delete)->execute();
        $sql_daftar = "UPDATE tbl_daftar SET lulus = 'false' where id_daftar = $dataHasilUji->id_daftar";
        Yii::app()->db->createCommand($sql_daftar)->query();
        $delete = "DELETE FROM tbl_riwayat WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($delete)->execute();
    }
}
