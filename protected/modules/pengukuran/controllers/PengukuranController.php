<?php

class PengukuranController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        $this->pageTitle = 'PENGUKURAN';
        $this->render('index');
    }

    public function actionListGrid() {
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $tgl_search = $_POST['tgl_search'];
        $tanggal = date("Y-m-d", strtotime($tgl_search));
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'numerator';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            if ($selectCategory == 'no_antrian') {
                $criteria->addCondition("$selectCategory = $textCategory");
            } else {
                $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "'),' ',''))");
            }
        }
        $criteria->addCondition("jdatang::date = '$tanggal'");
        $result = VUjiMekanisAll::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
//            $numerator_hari = sprintf('%03d', $p->numerator_hari);
//            $bln = date('n');
//            $bln_romawi = Yii::app()->params['bulanRomawi'][$bln - 1];
            $dataJson[] = array(
                "id_hasil_uji" => $p->id_hasil_uji,
                "no_antrian" => $p->no_antrian,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "jenis" => $p->jns_kend,
                "nama_pemilik" => $p->nama_pemilik,
                "alamat" => $p->alamat,
                "numerator" => $p->numerator,
                "numerator_hari" => $p->numerator_hari
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VUjiMekanisAll::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionDetailPengukuran() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $dataHasilUji = VUjiMekanisAll::model()->findByAttributes(array('id_hasil_uji' => $id_hasil_uji));
        $data['id_daftar'] = $dataHasilUji->id_daftar;
        $data['id_hasil_uji'] = $id_hasil_uji;
        $data['id_kendaraan'] = $dataHasilUji->id_kendaraan;
        $data['id_jns_kend'] = $dataHasilUji->id_jns_kend;
        $data['konsumbu'] = $dataHasilUji->konsumbu;
        $data['tahun'] = $dataHasilUji->tahun;
        $data['bahan_bakar'] = $dataHasilUji->bahan_bakar;
        $data['bsumbu1'] = $dataHasilUji->bsumbu1 == '' ? 0 : $dataHasilUji->bsumbu1;
        $data['bsumbu2'] = $dataHasilUji->bsumbu2 == '' ? 0 : $dataHasilUji->bsumbu2;
        $data['bsumbu3'] = $dataHasilUji->bsumbu3 == '' ? 0 : $dataHasilUji->bsumbu3;
        $data['bsumbu4'] = $dataHasilUji->bsumbu4 == '' ? 0 : $dataHasilUji->bsumbu4;
        $data['ems_diesel'] = $dataHasilUji->ems_diesel;
        $data['ems_mesin_co'] = $dataHasilUji->ems_mesin_co;
        $data['ems_mesin_hc'] = $dataHasilUji->ems_mesin_hc;
        $data['ktlamp_kanan'] = $dataHasilUji->ktlamp_kanan / 1000;
        $data['ktlamp_kiri'] = $dataHasilUji->ktlamp_kiri / 1000;
        $data['dev_kanan'] = $dataHasilUji->dev_kanan;
        $data['dev_kiri'] = $dataHasilUji->dev_kiri;
        $data['selgaya1'] = $dataHasilUji->selgaya1;
        $data['selgaya2'] = $dataHasilUji->selgaya2;
        $data['selgaya3'] = $dataHasilUji->selgaya3;
        $data['selgaya4'] = $dataHasilUji->selgaya4;
        $data['selrem_sb1'] = $dataHasilUji->bsumbu1 != 0 || '' ? floor(($dataHasilUji->selrem_sb1 / $dataHasilUji->bsumbu1) * 100) : 0;
        $data['selrem_sb2'] = $dataHasilUji->bsumbu2 != 0 || '' ? floor(($dataHasilUji->selrem_sb2 / $dataHasilUji->bsumbu2) * 100) : 0;
        $data['selrem_sb3'] = $dataHasilUji->bsumbu3 != 0 || '' ? floor(($dataHasilUji->selrem_sb3 / $dataHasilUji->bsumbu3) * 100) : 0;
        $data['selrem_sb4'] = $dataHasilUji->bsumbu4 != 0 || '' ? floor(($dataHasilUji->selrem_sb4 / $dataHasilUji->bsumbu4) * 100) : 0;
        echo json_encode($data);
    }

    public function actionSaveForm() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $id_kendaraan = $_POST['id_kendaraan'];
        $id_jns_kend = $_POST['id_jns_kend'];
        $id_daftar = $_POST['id_daftar'];
        $username = Yii::app()->session['username'];
        $bsumbu1 = $_POST['b_sumbu_1'];
        $bsumbu2 = $_POST['b_sumbu_2'];
        $bsumbu3 = $_POST['b_sumbu_3'];
        $bsumbu4 = $_POST['b_sumbu_4'];
        $ems_diesel = $_POST['diesel'];
        $ems_mesin_co = $_POST['mesin_co'];
        $ems_mesin_hc = $_POST['mesin_hc'];
        $ktlamp_kanan = $_POST['kuat_kanan'];
        if($ktlamp_kanan > 20){
            $ktlamp_kanan = 20;
        }
        $ktlamp_kiri = $_POST['kuat_kiri'];
        if($ktlamp_kiri > 20){
            $ktlamp_kiri = 20;
        }
        $dev_kanan = $_POST['deviasi_kanan'];
        $dev_kiri = $_POST['deviasi_kiri'];
        $selgaya1 = $_POST['sg_sb_1'];
        $selgaya2 = $_POST['sg_sb_2'];
        $selgaya3 = $_POST['sg_sb_3'];
        $selgaya4 = $_POST['sg_sb_4'];
        $selrem_sb1 = $_POST['sumbu_1'];
        $selrem_sb2 = $_POST['sumbu_2'];
        $selrem_sb3 = $_POST['sumbu_3'];
        $selrem_sb4 = $_POST['sumbu_4'];
        $cis = 'CIS 1';

        if (!in_array($id_jns_kend, array(4, 5))) {
            $variabelSmoke = $ems_diesel . ',' . $ems_mesin_co . ',' . $ems_mesin_hc;
            $sqlSmoke = "select update_cis_smoke('$variabelSmoke',$id_hasil_uji,'$username')";
            Yii::app()->db->createCommand($sqlSmoke)->execute();

            $sqlPitlift = "UPDATE tbl_hasil_uji SET pitlift=true, lulus_pitlift=true WHERE id_hasil_uji = $id_hasil_uji";
            Yii::app()->db->createCommand($sqlPitlift)->execute();

            $variabelLampu = $ktlamp_kanan . ',' . $dev_kanan . ',' . $ktlamp_kiri . ',' . $dev_kiri . ',' . $cis;
            $sqlLampu = "select update_cis_lampu('$variabelLampu',$id_hasil_uji,'$username');";
            Yii::app()->db->createCommand($sqlLampu)->execute();
        }
        $kode1 = '';
        $kode2 = '';
        $kode3 = '';
        $kode4 = '';
        $kode5 = '';
        $variabelBrake = $selrem_sb1 . ',' . $selrem_sb2 . ',' . $selrem_sb3 . ',' . $selrem_sb4 . ','
                . '' . $selgaya1 . ',' . $selgaya2 . ',' . $selgaya3 . ',' . $selgaya4 . ',' . $cis . ',' . $kode1 . ',' . $kode2 . ',' . $kode3 . ',' . $kode4 . ',' . $kode5;
        $sqlBrake = "select update_cis_brake('$variabelBrake',$id_hasil_uji,'$username');";
        Yii::app()->db->createCommand($sqlBrake)->execute();

        $sqlUsername = "UPDATE tbl_proses SET ptgs_smoke='$username',ptgs_pitlift='$username',ptgs_lampu='$username',ptgs_break='$username' WHERE id_daftar = $id_daftar";
        Yii::app()->db->createCommand($sqlUsername)->execute();
        if (in_array($id_jns_kend, array(4, 5))) {
            $sqlHasilUji = "UPDATE tbl_hasil_uji SET ujimekanis = true, smoke=true, lulus_smoke = true, pitlift=true,lulus_pitlift = true,lampu=true,lulus_lampu = true WHERE id_hasil_uji = $id_hasil_uji";
            Yii::app()->db->createCommand($sqlHasilUji)->execute();
        }

        $sqlCis = "UPDATE tbl_hasil_uji SET ujimekanis = true WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($sqlCis)->execute();
    }

    public function actionSaveFormEmisi() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $id_kendaraan = $_POST['id_kendaraan'];
        $id_jns_kend = $_POST['id_jns_kend'];
        $id_daftar = $_POST['id_daftar'];
        $cis = 'MULLER';
        $username = Yii::app()->session['username'];

        $ems_diesel = $_POST['diesel'];
        $ems_mesin_co = $_POST['mesin_co'];
        $ems_mesin_hc = $_POST['mesin_hc'];


        if (!in_array($id_jns_kend, array(4, 5))) {
            $variabelSmoke = $ems_diesel . ',' . $ems_mesin_co . ',' . $ems_mesin_hc;
            $sqlSmoke = "select update_cis_smoke('$variabelSmoke',$id_hasil_uji,'$username')";
            Yii::app()->db->createCommand($sqlSmoke)->execute();
        }

        $sqlUsername = "UPDATE tbl_proses SET ptgs_smoke='$username' WHERE id_daftar = $id_daftar";
        Yii::app()->db->createCommand($sqlUsername)->execute();
        if (in_array($id_jns_kend, array(4, 5))) {
            $sqlHasilUji = "UPDATE tbl_hasil_uji SET smoke=true, lulus_smoke = true WHERE id_hasil_uji = $id_hasil_uji";
            Yii::app()->db->createCommand($sqlHasilUji)->execute();
        }

//        $sqlCis = "UPDATE tbl_hasil_uji SET posisi = '$cis' WHERE id_hasil_uji = $id_hasil_uji";
//        Yii::app()->db->createCommand($sqlCis)->execute();
    }

    public function actionSaveFormLampu() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $id_kendaraan = $_POST['id_kendaraan'];
        $id_jns_kend = $_POST['id_jns_kend'];
        $id_daftar = $_POST['id_daftar'];
        $cis = 'MULLER';
        $username = Yii::app()->session['username'];

        $ktlamp_kanan = $_POST['kuat_kanan'] / 1000;
        $ktlamp_kiri = $_POST['kuat_kiri'] / 1000;
        $dev_kanan = $_POST['deviasi_kanan'];
        $dev_kiri = $_POST['deviasi_kiri'];


        if (!in_array($id_jns_kend, array(4, 5))) {

            $sqlPitlift = "UPDATE tbl_hasil_uji SET pitlift=true, lulus_pitlift=true WHERE id_hasil_uji = $id_hasil_uji";
            Yii::app()->db->createCommand($sqlPitlift)->execute();

            $variabelLampu = $ktlamp_kanan . ',' . $dev_kanan . ',' . $ktlamp_kiri . ',' . $dev_kiri . ',' . $cis;
            $sqlLampu = "select update_cis_lampu('$variabelLampu',$id_hasil_uji,'$username');";
            Yii::app()->db->createCommand($sqlLampu)->execute();
        }

        $sqlUsername = "UPDATE tbl_proses SET ptgs_pitlift='$username',ptgs_lampu='$username' WHERE id_daftar = $id_daftar";
        Yii::app()->db->createCommand($sqlUsername)->execute();
        if (in_array($id_jns_kend, array(4, 5))) {
            $sqlHasilUji = "UPDATE tbl_hasil_uji SET pitlift=true,lulus_pitlift = true, lampu=true,lulus_lampu = true WHERE id_hasil_uji = $id_hasil_uji";
            Yii::app()->db->createCommand($sqlHasilUji)->execute();
        }

//        $sqlCis = "UPDATE tbl_hasil_uji SET posisi = '$cis' WHERE id_hasil_uji = $id_hasil_uji";
//        Yii::app()->db->createCommand($sqlCis)->execute();
    }

    public function actionSaveFormRem() {
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $id_kendaraan = $_POST['id_kendaraan'];
        $id_jns_kend = $_POST['id_jns_kend'];
        $id_daftar = $_POST['id_daftar'];
        $cis = 'MULLER';
        $username = Yii::app()->session['username'];
        $selgaya1 = $_POST['sg_sb_1'];
        $selgaya2 = $_POST['sg_sb_2'];
        $selgaya3 = $_POST['sg_sb_3'];
        $selgaya4 = $_POST['sg_sb_4'];
        $selrem_sb1 = $_POST['sumbu_1'];
        $selrem_sb2 = $_POST['sumbu_2'];
        $selrem_sb3 = $_POST['sumbu_3'];
        $selrem_sb4 = $_POST['sumbu_4'];

        $kode1 = '';
        $kode2 = '';
        $kode3 = '';
        $kode4 = '';
        $kode5 = '';
        $variabelBrake = $selrem_sb1 . ',' . $selrem_sb2 . ',' . $selrem_sb3 . ',' . $selrem_sb4 . ','
                . '' . $selgaya1 . ',' . $selgaya2 . ',' . $selgaya3 . ',' . $selgaya4 . ',' . $cis . ',' . $kode1 . ',' . $kode2 . ',' . $kode3 . ',' . $kode4 . ',' . $kode5;
        $sqlBrake = "select update_cis_brake('$variabelBrake',$id_hasil_uji,'$username');";
        Yii::app()->db->createCommand($sqlBrake)->execute();

        $sqlUsername = "UPDATE tbl_proses SET ptgs_break='$username' WHERE id_daftar = $id_daftar";
        Yii::app()->db->createCommand($sqlUsername)->execute();

        $sqlCis = "UPDATE tbl_hasil_uji SET ujimekanis = true WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($sqlCis)->execute();
    }

    public function actionReloadData() {
        $tahun_kendaraan = $_POST['tahun_kendaraan'];
        $tahun_sekarang = date('Y');
        /*
         * REM
         */
        if (($tahun_sekarang - $tahun_kendaraan) <= 3) {
            $sumbu1 = rand(75, 80);
            $sumbu2 = rand(75, 80);
            $sumbu3 = rand(75, 80);
            $sumbu4 = rand(75, 80);
            $selsumbu1 = rand(2, 3);
            $selsumbu2 = rand(2, 3);
            $selsumbu3 = rand(2, 3);
            $selsumbu4 = rand(2, 3);
        } else {
            $sumbu1 = rand(70, 75);
            $sumbu2 = rand(70, 75);
            $sumbu3 = rand(70, 75);
            $sumbu4 = rand(70, 75);
            $selsumbu1 = rand(3, 4);
            $selsumbu2 = rand(3, 4);
            $selsumbu3 = rand(3, 4);
            $selsumbu4 = rand(3, 4);
        }
        $data['bsb1'] = $sumbu1;
        $data['bsb2'] = $sumbu2;
        $data['bsb3'] = $sumbu3;
        $data['bsb4'] = $sumbu4;
        $data['bsel1'] = $selsumbu1;
        $data['bsel2'] = $selsumbu2;
        $data['bsel3'] = $selsumbu3;
        $data['bsel4'] = $selsumbu4;
        /*
         * LAMPU
         */
        if (($tahun_sekarang - $tahun_kendaraan) <= 5) {
            $lampu_kanan_kiri = rand(30, 35);
            $dev_kanan = $this->random(0.1, 0.34);
            $dev_kiri = $this->random(1, 1.09);
        } else {
            $lampu_kanan_kiri = rand(14, 20);
            $dev_kanan = $this->random(0.1, 0.34);
            $dev_kiri = $this->random(1, 1.09);
        }
        $data['lampu_kanan'] = $lampu_kanan_kiri;
        $data['lampu_kiri'] = $lampu_kanan_kiri;
        $data['dev_kanan'] = $dev_kanan;
        $data['dev_kiri'] = $dev_kiri;
        /*
         * EMISI
         */
        if ($tahun_kendaraan >= 2010) {
            $emdiesel = rand(10, 15);
        } else {
            $emdiesel = rand(16, 25);
        }
        if ($tahun_kendaraan >= 2007) {
            $emco = $this->random(0.5, 1);
            $emhc = rand(50, 100);
        } else {
            $emco = rand(1, 2);
            $emhc = rand(300, 600);
        }
        $data['solar'] = $emdiesel;
        $data['ems_co'] = $emco;
        $data['ems_hc'] = $emhc;

        echo json_encode($data);
    }

    public function countDecimals($x) {
        return strlen(substr(strrchr($x + "", "."), 1));
    }

    public function random($min, $max) {
        $decimals = max($this->countDecimals($min), $this->countDecimals($max));
        $factor = pow(10, $decimals);
        return rand($min * $factor, $max * $factor) / $factor;
    }

}
