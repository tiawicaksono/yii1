<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author TIA.WICAKSONO
 */
class BukuujiController extends Controller {

    //put your code here
    public function actionIndex() {
        $this->pageTitle = 'Buku Uji';
        if (Yii::app()->session['position_id'] == 3) {
            $step = 3;
            $urlAct = 'Bukuuji/ListGridBukuUjiKasubag';
        } else {
            $step = 1;
            $urlAct = 'Bukuuji/ListGridBukuUjiKaDis';
        }
        $this->render('index', array('urlAct' => $urlAct, 'step' => $step));
    }

    public function actionPilihStatusRecommendation() {
        $step = $_POST['step'];
        if ($step == 'step1') {
            $step_no = 3;
            $urlAct = 'Bukuuji/ListGridBukuUjiKasubag';
        } else {
            $step_no = 1;
            $urlAct = 'Bukuuji/ListGridBukuUjiKaDis';
        }
        $this->renderPartial('proses', array('urlAct' => $urlAct, 'step' => $step_no));
    }

//    ============================================================================

    public function actionListGridBukuUjiKasubag() {
        $tgl_pengajuan = $_POST['tgl_pengajuan'];
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 1;
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->addCondition("tgl_pengajuan = TO_DATE('" . $tgl_pengajuan . "', 'DD-Mon-YY')");
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $result = TblReqBukuuji::model()->findAll($criteria);

        $dataJson = array();
        foreach ($result as $p) {
            $dataJson[] = array(
                "id_req" => $p->id_req,
                "no_seri_awal" => $p->no_seri_awal,
                "no_seri_akhir" => $p->no_seri_akhir,
                "jumlah" => $p->jumlah,
                "tgl_pengajuan" => empty($p->tgl_pengajuan) ? '-' : date("d F Y", strtotime($p->tgl_pengajuan)),
                "tgl_approve" => empty($p->tgl_approve) ? '-' : date("d F Y", strtotime($p->tgl_approve)),
                "status" => $p->status_pengajuan
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblReqBukuuji::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionListGridBukuUjiKaDis() {
        $tgl_pengajuan = $_POST['tgl_pengajuan'];
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 1;
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $criteria->addCondition("tgl_pengajuan = TO_DATE('" . $tgl_pengajuan . "', 'DD-Mon-YY')");
        $criteria->addCondition('status_pengajuan = 1');
        $result = TblReqBukuuji::model()->findAll($criteria);

        $dataJson = array();
        foreach ($result as $p) {
            $dataJson[] = array(
                "id_req" => $p->id_req,
                "no_seri_awal" => $p->no_seri_awal,
                "no_seri_akhir" => $p->no_seri_akhir,
                "jumlah" => $p->jumlah,
                "tgl_pengajuan" => empty($p->tgl_pengajuan) ? '-' : date("d F Y", strtotime($p->tgl_pengajuan)),
                "tgl_approve" => empty($p->tgl_approve) ? '-' : date("d F Y", strtotime($p->tgl_approve)),
                "status" => $p->status_approval
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblReqBukuuji::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

//    ============================================================================

    public function actionProsesnoseri() {
        $kepala_seri = strtoupper($_POST['kepala_seri']);
        $seri_awal = $_POST['no_seri_awal'];
        $jumlah = $_POST['jumlah'];
        $seri_akhir = intval($seri_awal) + intval($jumlah)-1;
        $buku = new TblReqBukuuji();
        $buku->no_seri_awal = $kepala_seri . $seri_awal;
        $buku->no_seri_akhir = $kepala_seri . $seri_akhir;
        $buku->jumlah = $jumlah;
        $buku->tgl_pengajuan = date('m/d/Y');
        $buku->tgl_approve = NULL;
        $buku->status_pengajuan = 1;
        $buku->status_approval = 0;
        $buku->save();
    }

//    ============================================================================

    public function actionApproveRejectRekom() {
        $pilihan = $_POST['pilihan'];
        $idAll = $_POST['id'];
        $tgl = date('m/d/Y');
        if (count($idAll) > 0) {
            foreach ($idAll as $id) {
                if (Yii::app()->session['position_id'] == 1) {
                    $update = "UPDATE tbl_req_bukuuji SET status_approval = " . $pilihan . ", tgl_approve = '" . $tgl . "' WHERE id_req = " . $id;
                } else {
                    $update = "UPDATE tbl_req_bukuuji SET status_pengajuan = " . $pilihan . " WHERE id_req = " . $id;
                }
                Yii::app()->db->createCommand($update)->query();
            }
            $status = TRUE;
        } else {
            $status = FALSE;
        }
        echo json_encode(array('success' => $status));
    }

    public function actionSendSms() {
        $tgl = $_POST['tgl'];
        $formatTgl = date("d/m/Y", strtotime($tgl));
        $criteria = new CDbCriteria();
        $criteria->addInCondition('status_pengajuan', array(1));
        $criteria->addInCondition('status_approval', array(0));
        $criteria->addCondition("tgl_pengajuan = TO_DATE('" . $tgl . "', 'DD-Mon-YY')");
        $buku_uji = TblReqBukuuji::model()->find($criteria);
        $jml_buku_uji = $buku_uji['jumlah'];
        //$nomerb = '+6285755124535';
	//$nomera = '+6281931056701';
	$nomera = '+6281330391999';
        $nomerb = '+6282233633329';
        $text_sms = "[BUKU UJI TANDES]
Mohon approve melalui http://36.67.46.113/pkbsurabaya/
Terimakasih
=================
Tanggal = " . $formatTgl . "
Buku uji = " . $jml_buku_uji . "
=================";

        $jmlSMS = ceil(strlen($text_sms) / 153);
        $pecah = str_split($text_sms, 151);

        $queryId = "SHOW TABLE STATUS LIKE 'outbox'";
        $hasilId = Yii::app()->db_sms->createCommand($queryId);
        $dataId = $hasilId->queryRow();
        $newID = $dataId['Auto_increment'];

        for ($i = 1; $i <= $jmlSMS; $i++) {
            $udh = "050003A7" . sprintf("%02s", $jmlSMS) . sprintf("%02s", $i);
            $msg = $pecah[$i - 1];
            if ($i == 1) {
                $sql = "INSERT INTO outbox(DestinationNumber,UDH,TextDecoded,ID,Multipart,CreatorID) VALUES ('$nomera','$udh','$msg',$newID,'true','Gammu')";
                Yii::app()->db_sms->createCommand($sql)->query();
            } else {
                $sqlMultipart = "INSERT INTO outbox_multipart(UDH,TextDecoded,ID,SequencePosition) VALUES ('$udh','$msg',$newID,'$i')";
                Yii::app()->db_sms->createCommand($sqlMultipart)->query();
            }
        }
        
        $queryId = "SHOW TABLE STATUS LIKE 'outbox'";
        $hasilId = Yii::app()->db_sms->createCommand($queryId);
        $dataId = $hasilId->queryRow();
        $newID = $dataId['Auto_increment'];
        for ($i = 1; $i <= $jmlSMS; $i++) {
            $udh = "050003A7" . sprintf("%02s", $jmlSMS) . sprintf("%02s", $i);
            $msg = $pecah[$i - 1];
            if ($i == 1) {
                $sql = "INSERT INTO outbox(DestinationNumber,UDH,TextDecoded,ID,Multipart,CreatorID) VALUES ('$nomerb','$udh','$msg',$newID,'true','Gammu')";
                Yii::app()->db_sms->createCommand($sql)->query();
            } else {
                $sqlMultipart = "INSERT INTO outbox_multipart(UDH,TextDecoded,ID,SequencePosition) VALUES ('$udh','$msg',$newID,'$i')";
                Yii::app()->db_sms->createCommand($sqlMultipart)->query();
            }
        }
    }

}
