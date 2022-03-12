<?php

class DefaultController extends Controller {

//    public function init() {
//        $this->defaultAction = 'statusRecommendation';
//    }

    /* =====================================================================
     * MUNCULIN KEMBALI
      ===================================================================== */
    
    public function actionMunculinLagi() {
        $this->pageTitle = 'Munculin Kembali';
        $this->render('munculin_kembali');
    }

    public function actionProsesMunculinKembali() {
        $sb = $_POST['sb'];
        $count = count($sb);
        $hari_ini = date('m/d/Y');
        for ($i = 0; $i < $count; $i++):
            $id_kendaran = TblKendaraan::model()->getDataKendaraan($sb[$i])->id_kendaraan;
            //GET ID RETRIBUSI TERAKHIR
            $criteria = new CDbCriteria();
            $criteria->addInCondition('id_kendaraan', array(intval($id_kendaran)));
            $criteria->order = 'tgl_retribusi DESC, id_retribusi DESC';
            $dataRetribusi = TblRetribusi::model()->find($criteria);
            $idRetribusi = $dataRetribusi->id_retribusi;

            //UPDATE TGL RETRIBUSI DAN TGL UJI
            $updateRetribusi = "UPDATE tbl_retribusi SET tgl_retribusi = '" . $hari_ini . "', tgl_uji = '" . $hari_ini . "' WHERE id_retribusi = $idRetribusi";
            Yii::app()->db->createCommand($updateRetribusi)->query();
        endfor;
    }

    /* =====================================================================
     * MANCING
      ===================================================================== */

    public function actionMancing() {
        $this->pageTitle = 'Mancing Numerator';
        $this->render('mancing');
    }

    public function actionProsesMancing() {
        $sb = $_POST['sb'];
        $numerator = $_POST['numerator'];
        $penerima = Yii::app()->session['username'];
        $count = count($sb);
        $hari_ini = date('m/d/Y');
        for ($i = 0; $i < $count; $i++):
            $id_kendaran = TblKendaraan::model()->getDataKendaraan($sb[$i])->id_kendaraan;
            //GET ID RETRIBUSI TERAKHIR
            $criteria = new CDbCriteria();
            $criteria->addInCondition('numerator', array(intval($numerator[$i])));
            $criteria->addCondition("penerima like '$penerima'");
            $criteria->order = 'tgl_retribusi DESC, id_retribusi DESC';
            $dataRetribusi = TblRetribusi::model()->find($criteria);
            $idRetribusi = $dataRetribusi->id_retribusi;

            //UPDATE TGL RETRIBUSI DAN TGL UJI
            $updateRetribusi = "UPDATE tbl_retribusi SET id_kendaraan = $id_kendaran WHERE id_retribusi = $idRetribusi";
            Yii::app()->db->createCommand($updateRetribusi)->query();
        endfor;
    }

    /* =====================================================================
     * RIWAYAT DOUBLE
      ===================================================================== */

    public function actionRiwayatDouble() {
        $this->pageTitle = 'Riwayat Double';
        $this->render('riwayat_double');
    }

    public function actionDeleteDoubleRiwayat() {
        $id_riwayat = $_POST['id_riwayat'];
        $data = TblRiwayat::model()->deleteByPk($id_riwayat);
    }

    public function actionGetListDataRiwayat() {
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
//        $noUjiKendaraan = strtolower('ml 8246');
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tgl_uji';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            if ($selectCategory == 'numerator') {
                $criteria->addCondition("$selectCategory = $textCategory");
            } else {
                $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
            }
        }
        $result = VRiwayat::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_riwayat" => $p->id_riwayat,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "tgl_uji" => date("d F Y", strtotime($p->tgl_uji)),
                "mati_uji" => date("d F Y", strtotime($p->tglmati)),
                "nama_penguji" => $p->nama_penguji,
                "catatan" => $p->catatan,
                "no_chasis" => $p->no_chasis,
                "no_mesin" => $p->no_mesin
            );
        }

        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VRiwayat::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    /* =====================================================================
     * TL Manual
      ===================================================================== */

    public function actionDaftarTlManual() {
        $this->pageTitle = 'X-TL Manual';
        $this->render('form_tl');
    }

    public function actionProsesDaftarTlManual() {
        $sb = $_POST['sb'];
        $tgluji = date('m/d/Y');
        $count = count($sb);
        for ($i = 0; $i < $count; $i++):
            $id_kendaran = TblKendaraan::model()->getDataKendaraan($sb[$i])->id_kendaraan;

            //proses daftar
            $tblDaftar = TblDaftar::model()->findByAttributes(array('id_kendaraan' => $id_kendaran), array(
                'order' => 'id_daftar desc',
                'limit' => 1,
            ));

            $daftar = new TblDaftar();
            $daftar->id_retribusi = $tblDaftar->id_retribusi;
            $daftar->tgl_uji = $tgluji;
            $daftar->id_kendaraan = $id_kendaran;
            $daftar->datang = false;
            $daftar->lulus = false;
            $daftar->save();

            $tblHasilUji = TblHasilUji::model()->findByAttributes(array('id_kendaraan' => $id_kendaran), array(
                'order' => 'id_hasil_uji desc',
                'limit' => 1,
            ));
            $idhasiluji = $tblHasilUji->id_hasil_uji;
            $updateHasilUji = "UPDATE tbl_hasil_uji SET uji_ulang = true, prauji = false, ujimekanis = false where id_hasil_uji = $idhasiluji";
            Yii::app()->db->createCommand($updateHasilUji)->query();
        endfor;
    }

    /* =====================================================================
     * CEK SCAN
      ===================================================================== */

    public function actionCekScan() {
        $this->pageTitle = 'Cek Scan';
        $this->render('cek_scan');
    }

    public function actionGetListRetribusi() {
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tgl_uji';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $criteria->addCondition("img_scan != ''");
        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }
        $result = VRetribusiAll::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_retribusi" => $p->id_retribusi,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "tgl_uji" => date("d F Y", strtotime($p->tgl_uji)),
                "tgl_retribusi" => date("d F Y", strtotime($p->tgl_retribusi))
            );
        }

        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VRetribusiAll::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionViewCekScan() {
        $id_retribusi = $_POST['id_retribusi'];
        $criteria = new CDbCriteria();
        $criteria->addCondition("img_scan != ''");
        $criteria->addInCondition('id_retribusi', array($id_retribusi));
        $criteria->order = 'id_retribusi desc';
        $data = TblRetribusi::model()->find($criteria);
        echo CJSON::encode(
                array(
                    'img1' => $data->img_scan,
                )
        );
    }


}
