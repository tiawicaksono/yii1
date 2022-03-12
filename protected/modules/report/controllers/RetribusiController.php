<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Retribusi
 *
 * @author TIA.WICAKSONO
 */
class RetribusiController extends Controller {

    //put your code here
    public function actionIndex() {
        $this->pageTitle = 'Retribusi dan Kendaraan';
        $tgl = date('d-M-y');
        $bln = date('n');
        $thn = date('Y');
        /* ================KENDARAAN PER HARI================
         * HEADER TOTAL
         * TOTAL KENDARAAN LULUS
         * TOTAL KENDARAAN TIDAK LULUS
         * TOTAL TL&TD
         */
        //HEADER TOTAL
        $totalRetribusi = TblRetribusi::model()->totalRetribusiPerHari($tgl);
        $totalKendaraanU = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'true');
        $totalKendaraanBu = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'false');
//        $totalKendaraan = $totalKendaraanU + $totalKendaraanBu;
        //TOTAL KENDARAAN LULUS
        $totalLulusU = TblDaftar::model()->totalKelulusanKendaraan('true', $tgl, 'true');
        $totalLulusBu = TblDaftar::model()->totalKelulusanKendaraan('true', $tgl, 'false');
        //TOTAL KENDARAAN TIDAK LULUS
        $totalTidakLulusU = TblDaftar::model()->totalKelulusanKendaraan('false', $tgl, 'true');
        $totalTidakLulusBu = TblDaftar::model()->totalKelulusanKendaraan('false', $tgl, 'false');
        //TOTAL TL&TD
        $totalTlTdU = TblDaftar::model()->totalTlTd($tgl, 'true');
        $totalTlTdBu = TblDaftar::model()->totalTlTd($tgl, 'false');
        
        $mobilBarangU = TblDaftar::model()->totalKendaraan(0, $tgl, 'true');
        $mobilBarangBu = TblDaftar::model()->totalKendaraan(0, $tgl, 'false');
        $mobilPenumpangU = TblDaftar::model()->totalKendaraan(1, $tgl, 'true');
        $mobilPenumpangBu = TblDaftar::model()->totalKendaraan(1, $tgl, 'false');
        $mobilBisU = TblDaftar::model()->totalKendaraan(2, $tgl, 'true');
        $mobilBisBu = TblDaftar::model()->totalKendaraan(2, $tgl, 'false');
        $totalKendaraan = $mobilBarangU+$mobilBarangBu+$mobilPenumpangU+$mobilPenumpangBu+$mobilBisU+$mobilBisBu;
        /* ================KENDARAAN PER BULAN================
         * HEADER TOTAL
         * TOTAL KENDARAAN LULUS
         * TOTAL KENDARAAN TIDAK LULUS
         * TOTAL TL&TD
         */
        //HEADER TOTAL
        $totalRetribusiBln = TblRetribusi::model()->totalRetribusiPerBulan($bln, $thn);
        $totalKendaraanUBln = TblDaftar::model()->totalKedatanganKendaraanPerBulan($bln, $thn, 'true');
        $totalKendaraanBuBln = TblDaftar::model()->totalKedatanganKendaraanPerBulan($bln, $thn, 'false');
//        $totalKendaraanBln = $totalKendaraanUBln + $totalKendaraanBuBln;
        
        //TOTAL KENDARAAN LULUS
        $totalLulusUBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('true', $bln, $thn, 'true','');
        $totalLulusBuBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('true', $bln, $thn, 'false','');
        //TOTAL KENDARAAN TIDAK LULUS
        $totalTidakLulusUBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('false', $bln, $thn, 'true','');
        $totalTidakLulusBuBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('false', $bln, $thn, 'false','');
        //TOTAL TL&TD
        $totalTlTdUBln = TblDaftar::model()->totalTlTdPerBulan($bln, $thn, 'true');
        $totalTlTdBuBln = TblDaftar::model()->totalTlTdPerBulan($bln, $thn, 'false');
        
        $mobilBarangUBln = TblDaftar::model()->totalKendaraanPerBulan(0, $bln, $thn, 'true');
        $mobilBarangBuBln = TblDaftar::model()->totalKendaraanPerBulan(0, $bln, $thn, 'false');
        $mobilPenumpangUBln = TblDaftar::model()->totalKendaraanPerBulan(1, $bln, $thn, 'true');
        $mobilPenumpangBuBln = TblDaftar::model()->totalKendaraanPerBulan(1, $bln, $thn, 'false');
        $mobilBisUBln = TblDaftar::model()->totalKendaraanPerBulan(2, $bln, $thn, 'true');
        $mobilBisBuBln = TblDaftar::model()->totalKendaraanPerBulan(2, $bln, $thn, 'false');
        $totalKendaraanBln = $mobilBarangUBln+$mobilBarangBuBln+$mobilPenumpangUBln+$mobilPenumpangBuBln+$mobilBisUBln+$mobilBisBuBln;
        
        $this->render('index', array(
            'totalRetribusiBln' => number_format($totalRetribusiBln['total']),
            'totalKendaraanBln' => $totalKendaraanBln,
            'totalLulusUBln' => $totalLulusUBln,
            'totalTidakLulusUBln' => $totalTidakLulusUBln,
            'totalLulusBuBln' => $totalLulusBuBln,
            'totalTidakLulusBuBln' => $totalTidakLulusBuBln,
            'mobilBarangUBln' => $mobilBarangUBln,
            'mobilBarangBuBln' => $mobilBarangBuBln,
            'mobilPenumpangUBln' => $mobilPenumpangUBln,
            'mobilPenumpangBuBln' => $mobilPenumpangBuBln,
            'mobilBisUBln' => $mobilBisUBln,
            'mobilBisBuBln' => $mobilBisBuBln,
//            'totalTaxiBln' => TblRetribusi::model()->totalTaxiPerBulan($bln, $thn,''),
            'mobilDatangUBln' => $totalKendaraanUBln,
            'mobilDatangBuBln' => $totalKendaraanBuBln,
            'totalTlTdUBln' => $totalTlTdUBln,
            'totalTlTdBuBln' => $totalTlTdBuBln,
                        
            'totalRetribusi' => number_format($totalRetribusi['total']),
            'totalKendaraan' => $totalKendaraan,
            'totalLulusU' => $totalLulusU,
            'totalTidakLulusU' => $totalTidakLulusU,
            'totalLulusBu' => $totalLulusBu,
            'totalTidakLulusBu' => $totalTidakLulusBu,
            'mobilBarangU' => $mobilBarangU,
            'mobilBarangBu' => $mobilBarangBu,
            'mobilPenumpangU' => $mobilPenumpangU,
            'mobilPenumpangBu' => $mobilPenumpangBu,
            'mobilBisU' => $mobilBisU,
            'mobilBisBu' => $mobilBisBu,
//            'totalTaxi' => TblRetribusi::model()->totalTaxi($tgl),
            'mobilDatangU' => $totalKendaraanU,
            'mobilDatangBu' => $totalKendaraanBu,
            'totalTlTdU' => $totalTlTdU,
            'totalTlTdBu' => $totalTlTdBu));
    }

    public function actionDataKendaraan() {
        $tgl = $_POST['tanggal'];
        //TOTAL HEADER HARI INI
        $totalRetribusi = TblRetribusi::model()->totalRetribusiPerHari($tgl);
        $totalKendaraanU = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'true');
        $totalKendaraanBu = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'false');
        $totalKendaraan = $totalKendaraanU + $totalKendaraanBu;
        //TOTAL KENDARAAN LULUS
        $totalLulusU = TblDaftar::model()->totalKelulusanKendaraan('true', $tgl, 'true');
        $totalLulusBu = TblDaftar::model()->totalKelulusanKendaraan('true', $tgl, 'false');
        //TOTAL KENDARAAN TIDAK LULUS
        $totalTidakLulusU = TblDaftar::model()->totalKelulusanKendaraan('false', $tgl, 'true');
        $totalTidakLulusBu = TblDaftar::model()->totalKelulusanKendaraan('false', $tgl, 'false');
        //TL&TD
        $totalTlTdU = TblDaftar::model()->totalTlTd($tgl, 'true');
        $totalTlTdBu = TblDaftar::model()->totalTlTd($tgl, 'false');

        $this->renderPartial('data_kendaraan', array(
            'totalRetribusi' => number_format($totalRetribusi['total']),
            'totalKendaraan' => $totalKendaraan,
            'totalLulusU' => $totalLulusU,
            'totalTidakLulusU' => $totalTidakLulusU,
            'totalLulusBu' => $totalLulusBu,
            'totalTidakLulusBu' => $totalTidakLulusBu,
            'mobilBarangU' => TblDaftar::model()->totalKendaraan(0, $tgl, 'true'),
            'mobilBarangBu' => TblDaftar::model()->totalKendaraan(0, $tgl, 'false'),
            'mobilPenumpangU' => TblDaftar::model()->totalKendaraan(1, $tgl, 'true'),
            'mobilPenumpangBu' => TblDaftar::model()->totalKendaraan(1, $tgl, 'false'),
            'mobilBisU' => TblDaftar::model()->totalKendaraan(2, $tgl, 'true'),
            'mobilBisBu' => TblDaftar::model()->totalKendaraan(2, $tgl, 'false'),
            'mobilDatangU' => $totalKendaraanU,
            'mobilDatangBu' => $totalKendaraanBu,
            'totalTlTdU' => $totalTlTdU,
            'totalTlTdBu' => $totalTlTdBu,
            'totalTaxi' => TblRetribusi::model()->totalTaxi($tgl)));
    }
    
    public function actionDataKendaraanPerBulan() {
        $blnThn = date("n-Y", strtotime($_POST['blnThn']));
        $explodeBlnThn = explode('-', $blnThn);
        $bln = $explodeBlnThn[0];
        $thn = $explodeBlnThn[1];
        //HEADER TOTAL
        $totalRetribusiBln = TblRetribusi::model()->totalRetribusiPerBulan($bln, $thn);
        $totalKendaraanUBln = TblDaftar::model()->totalKedatanganKendaraanPerBulan($bln, $thn, 'true');
        $totalKendaraanBuBln = TblDaftar::model()->totalKedatanganKendaraanPerBulan($bln, $thn, 'false');
        $totalKendaraanBln = $totalKendaraanUBln + $totalKendaraanBuBln;
        
        //TOTAL KENDARAAN LULUS
        $totalLulusUBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('true', $bln, $thn, 'true','');
        $totalLulusBuBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('true', $bln, $thn, 'false','');
        //TOTAL KENDARAAN TIDAK LULUS
        $totalTidakLulusUBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('false', $bln, $thn, 'true','');
        $totalTidakLulusBuBln = TblDaftar::model()->totalKelulusanKendaraanPerBulan('false', $bln, $thn, 'false','');
        //TOTAL TL&TD
        $totalTlTdUBln = TblDaftar::model()->totalTlTdPerBulan($bln, $thn, 'true');
        $totalTlTdBuBln = TblDaftar::model()->totalTlTdPerBulan($bln, $thn, 'false');

        $this->renderPartial('data_kendaraan_per_bln', array(
            'totalRetribusiBln' => number_format($totalRetribusiBln['total']),
            'totalKendaraanBln' => $totalKendaraanBln,
            'totalLulusUBln' => $totalLulusUBln,
            'totalTidakLulusUBln' => $totalTidakLulusUBln,
            'totalLulusBuBln' => $totalLulusBuBln,
            'totalTidakLulusBuBln' => $totalTidakLulusBuBln,
            'mobilBarangUBln' => TblDaftar::model()->totalKendaraanPerBulan(0, $bln, $thn, 'true'),
            'mobilBarangBuBln' => TblDaftar::model()->totalKendaraanPerBulan(0, $bln, $thn, 'false'),
            'mobilPenumpangUBln' => TblDaftar::model()->totalKendaraanPerBulan(1, $bln, $thn, 'true'),
            'mobilPenumpangBuBln' => TblDaftar::model()->totalKendaraanPerBulan(1, $bln, $thn, 'false'),
            'mobilBisUBln' => TblDaftar::model()->totalKendaraanPerBulan(2, $bln, $thn, 'true'),
            'mobilBisBuBln' => TblDaftar::model()->totalKendaraanPerBulan(2, $bln, $thn, 'false'),
            'totalTaxiBln' => TblRetribusi::model()->totalTaxiPerBulan($bln, $thn,''),
            'mobilDatangUBln' => $totalKendaraanUBln,
            'mobilDatangBuBln' => $totalKendaraanBuBln,
            'totalTlTdUBln' => $totalTlTdUBln,
            'totalTlTdBuBln' => $totalTlTdBuBln,));
    }

    public function actionDataForHeaderTgl() {
        $tgl = $_POST['tanggal'];
        $totalRetribusi = TblRetribusi::model()->totalRetribusiPerHari($tgl);
        $data['totalRetribusi'] = number_format($totalRetribusi['total']);
        $totalKendaraanU = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'true');
        $totalKendaraanBu = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'false');
        $totalKendaraan = $totalKendaraanU + $totalKendaraanBu;
        $data['totalKendaraan'] = $totalKendaraan;
        echo json_encode($data);
    }
    
    public function actionDataForHeaderBln() {
        $blnThn = date("n-Y", strtotime($_POST['blnThn']));
        $explodeBlnThn = explode('-', $blnThn);
        $bln = $explodeBlnThn[0];
        $thn = $explodeBlnThn[1];
        
        $totalRetribusi = TblRetribusi::model()->totalRetribusiPerBulan($bln, $thn);
        $data['totalRetribusi'] = number_format($totalRetribusi['total']);
        
        $totalKendaraanUBln = TblDaftar::model()->totalKedatanganKendaraanPerBulan($bln, $thn, 'true');
        $totalKendaraanBuBln = TblDaftar::model()->totalKedatanganKendaraanPerBulan($bln, $thn, 'false');
        $totalKendaraan = $totalKendaraanUBln + $totalKendaraanBuBln;
        $data['totalKendaraan'] = $totalKendaraan;
        echo json_encode($data);
    }

    /*public function actionTableHasilPemeriksaanListGridTgl() {
        $this->renderPartial('hasil_pemeriksaan_tgl');
    }

    public function actionHasilPemeriksaanListGridTgl() {
        $tgl = $_POST['tanggal'];
        $tanggal = date("Y-m-d", strtotime($tgl));
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $criteria->addCondition("jdatang::date = '$tanggal'");
        $result = VVerifikasiTgl::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $jdatang = TblHasilUji::model()->findByAttributes(array('id_hasil_uji' => $p->id_hasil_uji))->jdatang;
            $jselesai = TblHasilUji::model()->findByAttributes(array('id_hasil_uji' => $p->id_hasil_uji))->jselesai;
            $dataJson[] = array(
                "ACTIONS" => $p->no_uji,
                "no_antrian" => $p->no_antrian,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "nama_pemilik" => $p->nama_pemilik,
                "jam_datang" => date("H:i", strtotime($jdatang)),
                "jam_selesai" => date("H:i", strtotime($jselesai)),
                "prauji" => $p->lulus_prauji == "true" ? "Lulus" : "Tidak Lulus",
                "emisi" => $p->lulus_smoke == "true" ? "Lulus" : "Tidak Lulus",
                "pitlift" => $p->lulus_pitlift == "true" ? "Lulus" : "Tidak Lulus",
                "lampu" => $p->lulus_lampu == "true" ? "Lulus" : "Tidak Lulus",
                "rem" => $p->lulus_break == "true" ? "Lulus" : "Tidak Lulus",
                "status" => $p->hasil == "true" ? "Lulus" : "Tidak Lulus"
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VVerifikasiTgl::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }*/

}
