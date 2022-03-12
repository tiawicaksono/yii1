<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VerifikasiController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        $this->pageTitle = 'VERIFIKASI';
        $this->render('verifikasi');
    }

    public function actionVerifikasiListGrid() {
        $ok = Yii::app()->baseUrl . "/images/icon_approve.png";
        $reject = Yii::app()->baseUrl . "/images/icon_reject.png";
        $proses = Yii::app()->baseUrl . "/images/icon_proccess.png";
        $tgl = $_POST['tanggal'];
        $hasil = $_POST['chooseProses'];
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $tanggal = date("Y-m-d", strtotime($tgl));
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'nomor_antrian';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'DESC';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            if ($selectCategory == 'nomor_antrian') {
                $criteria->addCondition("$selectCategory = $textCategory");
            } else {
                $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "'),' ',''))");
//                $criteria->addCondition("(replace(LOWER($selectCategory),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
            }
        }
        if ($hasil != 'all') {
            $criteria->addCondition("hasil = $hasil");
        }
        $criteria->addCondition("jdatang::date = '$tanggal'");
        $result = VVerifikasi::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataKend = TblKendaraan::model()->findByAttributes(array('id_kendaraan' => $p->id_kendaraan));
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
            
            if($p->hasil == "true"){
                $ltl = 'l';
            }else{
                $ltl = 'tl';
            }
            $penguji = $p->nrp;
            $noSurat = '';

//            $numerator_hari = sprintf('%03d', $p->numerator_hari);
//            $bln = date('n');
//            $bln_romawi = Yii::app()->params['bulanRomawi'][$bln - 1];
            
            $dataJson[] = array(
                "cetak" => $ltl . "|" . $p->id_hasil_uji . "|" . $noSurat . "|" . $penguji,
                "cetakSementara" => $ltl . "|" . $p->id_hasil_uji . "|" . $noSurat. "|" . $penguji,
                "id_kendaraan" => $p->id_kendaraan,
                "kendaraan_id" => $p->id_kendaraan,
//                "hasil_uji_id" => $p->id_hasil_uji,
//                "hasilUjiId" => $p->id_hasil_uji,
                "id_hasil_uji" => $id_hasil_uji,
                "no_antrian" => $p->no_antrian,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "penguji" => $p->nm_penguji,
//                "ptgs_prauji" => $p->ptgs_prauji,
//                "ptgs_smoke" => $p->ptgs_smoke,
//                "ptgs_pitlift" => $p->ptgs_pitlift,
//                "ptgs_lampu" => $p->ptgs_lampu,
//                "ptgs_break" => $p->ptgs_break,
//                "prauji" => $img_prauji,
//                "emisi" => $img_smoke,
//                "pitlift" => $img_pitlift,
//                "lampu" => $img_lampu,
//                "rem" => $img_brake,
                "prauji" => $img_prauji."<br />".$p->ptgs_prauji,
                "emisi" => $img_smoke."<br />".$p->ptgs_smoke,
                "pitlift" => $img_pitlift."<br />".$p->ptgs_pitlift,
                "lampu" => $img_lampu."<br />".$p->ptgs_lampu,
                "rem" => $img_brake."<br />".$p->ptgs_break,
                "status" => $p->hasil == "true" ? "<img src='$ok'>" : "<img src='$reject'>",
                "bsumbu1" => $p->bsumbu1,
                "bsumbu2" => $p->bsumbu2,
                "bsumbu3" => $p->bsumbu3,
                "bsumbu4" => $p->bsumbu4,
                "numerator" => $p->numerator,
                "catatan" => $this->catatan($id_hasil_uji)
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VVerifikasi::model()->count($criteria),
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

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl != 'PRAUJI'";
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

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl != 'PRAUJI' AND input_tl != 'EMISI'";
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

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND (input_tl = 'LAMPU' OR input_tl = 'REM')";
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

        $delete = "DELETE FROM tbl_list_kelulusan WHERE id_hasil_uji = $id_hasil_uji AND input_tl = 'REM'";
        Yii::app()->db->createCommand($delete)->execute();
    }
    
    public function actionCetakl($id, $posisi, $nrp) {
        $this->layout = '//';
//        Yii::app()->session->add('ses_nrp', $nrp);
        //PENGUJI
        $tblPenguji = TblNamaPenguji::model()->findByAttributes(array('nrp' => $nrp));
        $tblHasilUji = TblHasilUji::model()->findByAttributes(array('id_hasil_uji' => $id));
        $tblDaftar = TblDaftar::model()->findByAttributes(array('id_daftar' => $tblHasilUji->id_daftar));
        $nm_penguji = $tblPenguji['nama_penguji'];
        $jabatan = $tblPenguji['jabatan'];
        $jam_selesai = $tblDaftar->tgl_uji." ".date('g:i:s');
        $tgl_uji = date("Y-m-d", strtotime($tblHasilUji->jdatang));
        
        $sql = "UPDATE tbl_hasil_uji SET nm_penguji='$nm_penguji', jabatan = '$jabatan', jselesai = '$jam_selesai', cetak = 'true', nrp = '$nrp'  WHERE id_hasil_uji = $id";
        Yii::app()->db->createCommand($sql)->query();
//            $today = date('Y-m-d');
//            ==============
//            CARA 1
//            ==============
        $tgl_mati_uji = date('n/j/Y', strtotime('+6 month', strtotime($tgl_uji)));
//            ==============
//            CARA 2
//            ==============
//            $tambah_tanggal = mktime(0,0,0,date('m')+6);
//            $tgl_mati_uji = date('n/j/Y',$tambah_tanggal);
//            ==============
//            CARA 3
//            ==============
//            $date = date_create($today);
//            date_add($date, date_interval_create_from_date_string('6 months'));
//            $tgl_mati_uji = date_format($date, 'n/j/Y');
        $sql_mati_uji = "UPDATE tbl_kendaraan SET tgl_mati_uji = '$tgl_mati_uji' where id_kendaraan = $tblHasilUji->id_kendaraan";
        Yii::app()->db->createCommand($sql_mati_uji)->query();
        $sql_daftar = "UPDATE tbl_daftar SET lulus = 'true' where id_daftar = $tblHasilUji->id_daftar";
        Yii::app()->db->createCommand($sql_daftar)->query();
        /*
         * CREATE RIWAYAT
         */
        $cekRiwayat = TblRiwayat::model()->findByAttributes(array('id_hasil_uji' => $id));
        if(count($cekRiwayat) > 0){
            $sql_riwayat = "UPDATE tbl_riwayat SET nama_penguji='$nm_penguji', nrp = '$nrp'  WHERE id_hasil_uji = $id";
            Yii::app()->db->createCommand($sql_riwayat)->query();
        }else{
            $modelRiwayat = new TblRiwayat();
            $modelRiwayat->tgl_uji = date("m/d/Y", strtotime($tblHasilUji->jdatang));
            $modelRiwayat->tempat = 'NGAWI';
            $modelRiwayat->catatan = '';
            $modelRiwayat->nama_penguji = $nm_penguji;
            $modelRiwayat->id_hasil_uji = $id;
            $modelRiwayat->id_kendaraan = $tblHasilUji->id_kendaraan;
            $modelRiwayat->nrp = $nrp;
            $modelRiwayat->stts_kirim = 0;
            $modelRiwayat->save();
        }

        $this->render('cetak_l', array('id' => $id, 'nrp' => $nrp, 'posisi' => $posisi));
    }

    public function actionSaveCetakLulusSementara() {
        $id = $_POST['id'];
        $nosurat = $_POST['no_surat'];
        $nrp = $_POST['penguji'];
        $catatan = $_POST['catatan'];
        Yii::app()->session->add('ses_nrp', $nrp);
        //PENGUJI
        $tblPenguji = TblNamaPenguji::model()->findByAttributes(array('nrp' => $nrp));
        $nm_penguji = $tblPenguji['nama_penguji'];
        $jabatan = $tblPenguji['jabatan'];
        $jam_selesai = date('m/d/Y g:i:s A');

        $tblHasilUji = TblHasilUji::model()->findByAttributes(array('id_hasil_uji' => $id));
        $sql = "UPDATE tbl_hasil_uji SET nm_penguji='$nm_penguji', jabatan = '$jabatan', jselesai = '$jam_selesai', cetak = 'true', nrp = '$nrp',catatan='$catatan'  WHERE id_hasil_uji = $id";
        Yii::app()->db->createCommand($sql)->query();
        $today = date('Y-m-d');
        $tgl_mati_uji = date('n/j/Y', strtotime('+6 month', strtotime($today)));
        $sql_mati_uji = "UPDATE tbl_kendaraan SET tgl_mati_uji = '$tgl_mati_uji' where id_kendaraan = $tblHasilUji->id_kendaraan";
        Yii::app()->db->createCommand($sql_mati_uji)->query();
        $sql_daftar = "UPDATE tbl_daftar SET lulus = 'true' where id_daftar = $tblHasilUji->id_daftar";
        Yii::app()->db->createCommand($sql_daftar)->query();
        /*
         * CREATE RIWAYAT
         */
        $cekRiwayat = TblRiwayat::model()->findByAttributes(array('id_hasil_uji' => $id));
        if (count($cekRiwayat) > 0) {
            $sql_riwayat = "UPDATE tbl_riwayat SET nama_penguji='$nm_penguji', nrp = '$nrp'  WHERE id_hasil_uji = $id";
            Yii::app()->db->createCommand($sql_riwayat)->query();
        } else {
            $modelRiwayat = new TblRiwayat();
            $modelRiwayat->tgl_uji = date("m/d/Y");
            $modelRiwayat->tempat = 'SAMPIT';
            $modelRiwayat->catatan = '';
            $modelRiwayat->nama_penguji = $nm_penguji;
            $modelRiwayat->id_hasil_uji = $id;
            $modelRiwayat->id_kendaraan = $tblHasilUji->id_kendaraan;
            $modelRiwayat->nrp = $nrp;
            $modelRiwayat->stts_kirim = 0;
            $modelRiwayat->save();
        }
    }
    
    public function actionCetakLulusSementara($id, $nosurat, $nrp) {
        $this->layout = '//';
        $this->render('cetak_l_sementara', array('id' => $id, 'nosurat' => $nosurat, 'nrp' => $nrp));
    }
}
