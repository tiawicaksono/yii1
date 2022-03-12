<?php

class UploadController extends Controller {

    public function filters() {
        return array(
            'Rights',
        );
    }

    public function actionIndex() {
        $this->render('upload');
    }

    /* =========================================================================
     * UPLOAD AND DOWNLOAD EXCEL NILAI
      ========================================================================= */

    public function actionReadUpload() {
        $file = $_FILES['myfile']['tmp_name'];
        Yii::import("ext.PHPExcel.PHPExcel", TRUE);
        Yii::import('ext.PHPExcel.PHPExcel.IOFactory', TRUE);

        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load($file);

        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        for ($row = 1; $row <= $highestRow; $row++) {
            echo $tgl_mati = strtotime('m/d/Y',$objWorksheet->getCellByColumnAndRow(75, $row)->getValue());
            //===========VARIABLLE===========
//            $id = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
//            $no_uji = $objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
//            $no_kendaraan = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
//            $alamat_pemilik = str_replace("'", "`", $objWorksheet->getCellByColumnAndRow(4, $row)->getValue());
//            $prov = strtoupper($objWorksheet->getCellByColumnAndRow(5, $row)->getValue());
//            $kota_kab = strtoupper($objWorksheet->getCellByColumnAndRow(6, $row)->getValue());
//            $kecamatan = strtoupper($objWorksheet->getCellByColumnAndRow(7, $row)->getValue());
//            $merk = strtoupper($objWorksheet->getCellByColumnAndRow(8, $row)->getValue());
//            $type = strtoupper($objWorksheet->getCellByColumnAndRow(9, $row)->getValue());
//            $jenis = strtoupper($objWorksheet->getCellByColumnAndRow(10, $row)->getValue());
//            $nm_komersil = strtoupper($objWorksheet->getCellByColumnAndRow(11, $row)->getValue());
//            $silinder = $objWorksheet->getCellByColumnAndRow(12, $row)->getValue();
//            $daya_motor = $objWorksheet->getCellByColumnAndRow(13, $row)->getValue();
//            $bahan_bakar = $objWorksheet->getCellByColumnAndRow(14, $row)->getValue();
//            $tahun = $objWorksheet->getCellByColumnAndRow(15, $row)->getValue();
//            $status = $objWorksheet->getCellByColumnAndRow(16, $row)->getValue();
//            $no_rangka = $objWorksheet->getCellByColumnAndRow(18, $row)->getValue();
//            $no_mesin = $objWorksheet->getCellByColumnAndRow(19, $row)->getValue();
//            $warna_cabin = $objWorksheet->getCellByColumnAndRow(20, $row)->getValue();
//            $warna_bak = $objWorksheet->getCellByColumnAndRow(21, $row)->getValue();
//            $jbb = $objWorksheet->getCellByColumnAndRow(23, $row)->getValue();
//            $panjang = $objWorksheet->getCellByColumnAndRow(24, $row)->getValue();
//            $lebar = $objWorksheet->getCellByColumnAndRow(25, $row)->getValue();
//            $tinggi = $objWorksheet->getCellByColumnAndRow(26, $row)->getValue();
//            $roh = $objWorksheet->getCellByColumnAndRow(27, $row)->getValue();
//            $foh = $objWorksheet->getCellByColumnAndRow(28, $row)->getValue();
//            $jsmb1 = $objWorksheet->getCellByColumnAndRow(29, $row)->getValue();
//            $jsmb2 = $objWorksheet->getCellByColumnAndRow(30, $row)->getValue();
//            $jsmb3 = $objWorksheet->getCellByColumnAndRow(31, $row)->getValue();
//            $panjang_bak = $objWorksheet->getCellByColumnAndRow(32, $row)->getValue();
//            $lebar_bak = $objWorksheet->getCellByColumnAndRow(33, $row)->getValue();
//            $tinggi_bak = $objWorksheet->getCellByColumnAndRow(34, $row)->getValue();
//            $pemakaian_sb1_ban = $objWorksheet->getCellByColumnAndRow(40, $row)->getValue();
//            $pemakaian_sb2_ban = $objWorksheet->getCellByColumnAndRow(41, $row)->getValue();
//            $pemakaian_sb3_ban = $objWorksheet->getCellByColumnAndRow(42, $row)->getValue();
//            $pemakaian_sb4_ban = $objWorksheet->getCellByColumnAndRow(43, $row)->getValue();
//            $konf_sumbu = str_replace('-', '.', $objWorksheet->getCellByColumnAndRow(44, $row)->getValue());
//            $jbkb = $objWorksheet->getCellByColumnAndRow(45, $row)->getValue();
//            $berat_sumbu1 = $objWorksheet->getCellByColumnAndRow(46, $row)->getValue();
//            $berat_sumbu2 = $objWorksheet->getCellByColumnAndRow(47, $row)->getValue();
//            $berat_sumbu3 = $objWorksheet->getCellByColumnAndRow(48, $row)->getValue();
//            $berat_sumbu4 = $objWorksheet->getCellByColumnAndRow(49, $row)->getValue();
//            $duduk = $objWorksheet->getCellByColumnAndRow(55, $row)->getValue();
//            $daya_orang = $duduk*60;
//            $daya_barang = $objWorksheet->getCellByColumnAndRow(63, $row)->getValue();
//            $mst = $objWorksheet->getCellByColumnAndRow(60, $row)->getValue();
//            $kls_jln = $objWorksheet->getCellByColumnAndRow(61, $row)->getValue();
//            $karoseri = $objWorksheet->getCellByColumnAndRow(67,$row)->getValue();
//            $bahan = $objWorksheet->getCellByColumnAndRow(68,$row)->getValue();
//            $berdiri = $objWorksheet->getCellByColumnAndRow(70,$row)->getValue();
//            $p1 = $objWorksheet->getCellByColumnAndRow(71, $row)->getValue();
//            $q = $objWorksheet->getCellByColumnAndRow(72, $row)->getValue();
//            $tgl_mati = strtotime('m/d/Y',$objWorksheet->getCellByColumnAndRow(75, $row)->getValue());
//            $no_sert_reg_uji_tipe = strtoupper($objWorksheet->getCellByColumnAndRow(63, $row)->getValue());
//            $no_sert_uji_tipe = strtoupper($objWorksheet->getCellByColumnAndRow(64, $row)->getValue());
//            $tgl_sert_reg_uji_tipe = strtotime('m/d/Y',strtoupper($objWorksheet->getCellByColumnAndRow(65, $row)->getValue()));
//            $tgl_sert_uji_tipe = strtotime('m/d/Y',strtoupper($objWorksheet->getCellByColumnAndRow(66, $row)->getValue()));
//            
//            //CEK DATA SUDAH ADA ATAU BELUM
//            $data_kendaraan = TblKendaraan::model()->findByAttributes(array('no_uji' => $no_uji));
//            if (count($data_kendaraan) == 0) {
//                $tbl = new TblKendaraan();
//                $tbl->no_uji = $no_uji;
//                $tbl->no_kendaraan = $no_kendaraan;
//                $tbl->nama_pemilik = $nama_pemilik;
//                $tbl->no_identitas = $nik;
//                $tbl->kelamin = $jenis_kelamin;
//                $tbl->tmp_lahir = $tempat_lahir;
//                $tbl->alamat = $alamat;
//                $tbl->jenis = $jns;
//                $tbl->id_jns_kend = $id_jns;
//                $tbl->merk = $merk;
//                $tbl->tipe = $tipe;
//                $tbl->tahun = $thn;
//                $tbl->sifat = $status;
//                $tbl->no_chasis = $no_rangka;
//                $tbl->no_mesin = $no_mesin;
//                $tbl->save();
//            } else {
//                $id_kendaraan = $data_kendaraan->id_kendaraan;
//                $sql = "UPDATE tbl_kendaraan SET no_kendaraan='$no_kendaraan',nama_pemilik='$nama_pemilik',no_identitas='$nik',"
//                        . "kelamin='$jenis_kelamin',tmp_lahir='$tempat_lahir',alamat='$alamat',jenis='$jns',id_jns_kend='$id_jns',merk='$merk',"
//                        . "tipe='$tipe',tahun='$thn',sifat='$status',no_chasis='$no_rangka',no_mesin='$no_mesin' where id_kendaraan=$id_kendaraan";
//                Yii::app()->db->createCommand($sql)->execute();
//
//                $sql = "UPDATE tbl_type SET nm_komersil='$nm_komersil',isi_silinder='$isi_silinder',daya_motor='$daya_motor',bahan_bakar='$bahan_bakar',"
//                        . "ukuran_panjang='$panjang',ukuran_lebar='$lebar',ukuran_tinggi='$tinggi',bagian_belakang='$roh',bagian_depan='$foh',"
//                        . "jsumbu1='$jsmb1',jsumbu2='$jsmb2',jsumbu3='$jsmb3',ukq='$q',ukp='$p1',ukp2='$p2',dimpanjang='$panjang_bak',dimlebar='$lebar_bak',"
//                        . "dimtinggi='$tinggi_bak',karoseri_bahan='$bahan_bak',psumbu1='$pemakaian_sb_ban',konsumbu='$konf_sumbu',kemjbb='$jbb',"
//                        . "bsumbu1='$berat_sumbu1',bsumbu2='$berat_sumbu2',bsumbu3='$berat_sumbu3',bsumbu4='$berat_sumbu4',kemorang='$daya_orang',"
//                        . "kembarang='$daya_barang',mst1='$mst',kls_jln='$kelas_jalan' where id_kendaraan=$id_kendaraan";
//                Yii::app()->db->createCommand($sql)->execute();
//            }
        }
    }

    public function actionReadUpload2() {
        $file = $_FILES['myfile']['tmp_name'];
        Yii::import("ext.PHPExcel.PHPExcel", TRUE);
        Yii::import('ext.PHPExcel.PHPExcel.IOFactory', TRUE);

        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($file);

        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        echo $highestRow;
        exit;
        for ($row = 1; $row <= $highestRow; $row++) {
            echo $nama_penguji = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
            echo $nrp = $objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
//            $tbl = new TblNamaPenguji();
//            $tbl->nama_penguji = $nama_penguji;
//            $tbl->nrp = $nrp;
//            $tbl->status_penguji = false;
//            $tbl->save();
        }
    }
}
