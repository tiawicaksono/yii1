<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UjiulangController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        $this->pageTitle = 'UJI ULANG';
        $this->render('uji_ulang');
    }

    public function actionCekProsesUjiUlang() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $hari_ini = date('m/d/Y');
        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        $id_kendaraan = $dataHasilUji->id_kendaraan;
        /*
         * CEK DI TEMP TL
         */
//        $sqlTempTl = TblTempTl::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
//        if (count($sqlTempTl) == 0) {
//            $tgl_batas_tl = date("d F Y", strtotime('+7 days', strtotime($dataHasilUji['jdatang'])));
//        } else {
//            $tgl_batas_tl = date("d F Y", strtotime($sqlTempTl['tgl_batas_tl']));
//        }
//        $tglBatasTl = date("m/d/Y", strtotime($tgl_batas_tl));
//
//        $result['ada'] = 0;
//        $result['terdaftar'] = 0;
//        $result['message'] = '';
//        if (strtotime($hari_ini) > strtotime($tglBatasTl)) {
//            $result['ada'] = 1;
//            $result['message'] = "Kendaraan TL sudah melebihi tanggal " . $tgl_batas_tl;
//        } else {
//CEK SUDAH TERDAFTAR TL BELUM
        $criteria = new CDbCriteria();
        $criteria->addCondition("id_uji = 21");
        $criteria->addCondition("id_kendaraan = $id_kendaraan");
        $criteria->addCondition("tgl_uji = '$hari_ini'");
        $dataTerdaftar = VDatang::model()->find($criteria);

        if (!empty($dataTerdaftar)) {
            $result['terdaftar'] = 1;
            $result['message'] = "Kendaraan SUDAH TERDAFTAR UJI ULANG hari ini";
        } else {
            $result['terdaftar'] = 0;
            $result['message'] = "Kendaraan BERHASIL TERDAFTAR UJI ULANG";
        }
//        }

        echo json_encode($result);
    }

    public function actionProsesUjiUlang() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $hari_ini = date('m/d/Y');
        $tanggal = date("Y-m-d");
        $hari_ini_jam = date('m/d/Y h:i:s');

        $dataHasilUji = TblHasilUji::model()->findByPk($id_hasil_uji);
        $dataDaftar = TblDaftar::model()->findByPk($dataHasilUji->id_daftar);
        $id_kendaraan = $dataDaftar->id_kendaraan;
        $tgl_uji = date("m/d/Y", strtotime($dataDaftar->tgl_uji));

        if (strtotime($hari_ini) != strtotime($tgl_uji)) {
//=======================JIKA TGL UJI != TGL UJI ULANG HARI INI=======================
            $criteria_hasil_uji = new CDbCriteria();
            $criteria_hasil_uji->addCondition("id_uji = 21");
            $criteria_hasil_uji->addCondition("id_kendaraan = $id_kendaraan");
            $criteria_hasil_uji->addCondition("jdatang::date = '$tanggal'");
            $criteria_hasil_uji->addCondition("prauji = 'false'");
            $criteria_hasil_uji->addCondition("ujimekanis = 'false'");
            $data_hasil_uji = TblHasilUji::model()->find($criteria_hasil_uji);
            if (empty($data_hasil_uji)) {
                $daftar = new TblDaftar();
                $daftar->id_retribusi = $dataDaftar->id_retribusi;
                $daftar->tgl_uji = $hari_ini;
                $daftar->id_kendaraan = $dataDaftar->id_kendaraan;
                $daftar->no_berkas = $dataDaftar->no_berkas;
                $daftar->datang = true;
                $daftar->lulus = false;
                $daftar->ktp = $dataDaftar->ktp;
                $daftar->fcstnk = $dataDaftar->fcstnk;
                $daftar->dom_usaha = $dataDaftar->dom_usaha;
                $daftar->fcbukuji = $dataDaftar->fcbukuji;
                $daftar->fctrayek = $dataDaftar->fctrayek;
                $daftar->id_jns = $dataDaftar->id_jns;
                $daftar->id_uji = 21;
                $daftar->save();

                $criteria = new CDbCriteria();
                $criteria->order = 'id_daftar DESC';
                $criteria->addCondition("id_retribusi = $dataDaftar->id_retribusi");
                $adat = TblDaftar::model()->find($criteria);

                $insertHasilUji = "insert into tbl_hasil_uji (id_daftar,jdatang,id_kendaraan,no_antrian,id_uji) values 
                ($adat->id_daftar,'$hari_ini_jam',$id_kendaraan,0,21)";
                Yii::app()->db->createCommand($insertHasilUji)->execute();
//                $tbl_proses = "UPDATE tbl_proses set id_daftar=" . $id_daftar . " where id_retribusi=" . $dataDaftar->id_retribusi;
//                Yii::app()->db->createCommand($tbl_proses)->execute();
            }
        } else {
//=======================JIKA TGL UJI == TGL UJI ULANG HARI INI=======================
            $updateHasilUji = "UPDATE tbl_hasil_uji SET prauji = false, lulus_prauji = false, lampu = false, break = false, smoke = false, pitlift = false, ujimekanis = false, lulus_ujimekanis = false, cetak = false, uji_ulang = true where id_hasil_uji = $id_hasil_uji";
            Yii::app()->db->createCommand($updateHasilUji)->query();

            $tbl_hasil_uji = TblHasilUji::model()->findByAttributes(array('id_hasil_uji' => $id_hasil_uji));
            $tbl_daftar = TblDaftar::model()->findByAttributes(array('id_daftar' => $tbl_hasil_uji->id_daftar));
            $tbl_proses = "UPDATE tbl_proses set id_daftar=" . $tbl_daftar->id_daftar . " where id_retribusi=" . $tbl_daftar->id_retribusi;
            Yii::app()->db->createCommand($tbl_proses)->query();

            $deleteTl = "DELETE FROM tbl_list_kelulusan where id_hasil_uji = $id_hasil_uji";
            Yii::app()->db->createCommand($deleteTl)->query();
        }
    }

    public function actionGetListDataUjiUlang() {
//        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tgl_uji';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->addCondition('lulus = false');
        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }
        $result = VNotLulus::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_hasil_uji" => $p->id_hasil_uji,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "tgl_uji" => date("d F Y", strtotime($p->tgl_uji)),
                "nama_pemilik" => $p->nama_pemilik,
                "nm_penguji" => $p->nm_penguji,
                "no_antrian" => $p->no_antrian,
                "catatan" => $this->catatan($p->id_hasil_uji)
            );
        }

        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => count($result),
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

}
