<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of terminal
 *
 * @author TIA.WICAKSONO
 */
class DefaultController extends Controller {
    /* =====================================================================
     * BARCODE DALOPS
      ===================================================================== */

    public function actionDetailPersyaratan() {
        $this->layout = '//';
        $kategori = strtoupper($_POST['kategori']);
//        $kategori = strtoupper('MUK');
        $criteria = new CDbCriteria();
        $criteria->addCondition("category_code = '$kategori'");
        $result = VPersyaratan::model()->findAll($criteria);
        $data = array();
        foreach ($result as $p) {
            $data[] = array(
                "keterangan" => $p->persyaratan,
            );
        }
        echo json_encode($data);
    }

    public function actionDetailKendaraan() {
        $this->layout = '//';
        $no_uji = strtoupper($_POST['noUji']);
        $criteria = new CDbCriteria();
        $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $no_uji . "%'),' ','')) or (replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $no_uji . "%'),' ',''))");
        $result = VKendaraan::model()->find($criteria);

        if (count($result) != 0) {
            $data['id_kendaraan'] = $result->id_kendaraan;
            $data['no_uji'] = $result->no_uji;
            $data['no_kendaraan'] = $result->no_kendaraan;
            $data['merk'] = $result->merk;
            $data['tipe'] = $result->tipe;
            $data['no_chasis'] = $result->no_chasis;
            $data['no_mesin'] = $result->no_mesin;
            $data['pemilik'] = $result->nama_pemilik;
            $data['jns_kend'] = $result->karoseri_jenis;
            $data['mati_uji'] = date("d F Y", strtotime($result->tgl_mati_uji));
            $data['panjang'] = $result->ukuran_panjang . " mm";
            $data['lebar'] = $result->ukuran_lebar . " mm";
            $data['tinggi'] = $result->ukuran_tinggi . " mm";
            $data['dimpanjang'] = $result->dimpanjang . " mm";
            $data['dimlebar'] = $result->dimlebar . " mm";
            $data['dimtinggi'] = $result->dimtinggi . " mm";
            $data['jbb'] = $result->kemjbb . " Kg";
            $data['orang'] = $result->karoseri_duduk . " Orang, " . $result->kemorang . " Kg";
            $data['barang'] = $result->kembarang . " Kg";
            if (strtotime($result->tgl_mati_uji) < strtotime(date('m/d/Y'))) {
                $data['kondisi'] = 'mati';
            } else {
                $data['kondisi'] = 'hidup';
            }
            $data['success'] = true;
        } else {
            $data['id_kendaraan'] = 0;
            $data['no_uji'] = '-';
            $data['no_kendaraan'] = '-';
            $data['merk'] = '-';
            $data['tipe'] = '-';
            $data['no_chasis'] = '-';
            $data['no_mesin'] = '-';
            $data['pemilik'] = '-';
            $data['jns_kend'] = '-';
            $data['mati_uji'] = '-';
            $data['panjang'] = '-';
            $data['lebar'] = '-';
            $data['tinggi'] = '-';
            $data['dimpanjang'] = '-';
            $data['dimlebar'] = '-';
            $data['dimtinggi'] = '-';
            $data['jbb'] = '-';
            $data['orang'] = '-';
            $data['barang'] = '-';
            $data['success'] = false;
        }

        echo json_encode($data);
    }
    
    public function actionTotalListKendaraan() {
        $sql_tandes = "select 
        (select jml_kuota from tbl_kuota) as total,
        (select count(*) from tbl_daftar where tgl_uji=current_date) as jml,
        (select count(*) from tbl_daftar where tgl_uji=current_date and id_jns=0) as brg,
        (select count(*) from tbl_daftar where tgl_uji=current_date and datang='true') as dtg,
        (select count(*) from tbl_daftar where tgl_uji=current_date and datang='false') as td,
        (select count(*) from tbl_daftar where tgl_uji=current_date and datang='true' and lulus='true') as lls,
        (select count(*) from tbl_daftar a left join tbl_hasil_uji b ON a.id_daftar=b.id_daftar where a.tgl_uji=current_date and a.datang='true' and a.lulus='false' and b.cetak='true') as tdklls,
        (select count(*) from tbl_daftar where tgl_uji=current_date and datang='true')-((select count(*) from tbl_daftar where tgl_uji=current_date and datang='true' and lulus='true') + (select count(*) from tbl_daftar a left join tbl_hasil_uji b ON a.id_daftar=b.id_daftar where a.tgl_uji=current_date and a.datang='true' and a.lulus='false' and b.cetak='true')) as blmprs,
        (select count(*) from tbl_daftar where tgl_uji=current_date and id_jns=1) as pnp,
        (select count(*) from tbl_daftar where tgl_uji=current_date and id_jns=2) as bis,
        (select count(*) from tbl_daftar where tgl_uji=current_date and id_jns=3) as khs,
        (select count(*) from tbl_daftar where tgl_uji=current_date and id_jns=4) as gdn,
        (select count(*) from tbl_daftar where tgl_uji=current_date and id_jns=5) as tmp";
        $row_tandes = Yii::app()->db->createCommand($sql_tandes)->queryRow();

        $data['mobil_barang_tandes'] = $row_tandes['brg'];
        $data['mobil_bis_tandes'] = $row_tandes['bis'];
        $data['mobil_penumpang_tandes'] = $row_tandes['pnp'];
        $data['mobil_khusus_tandes'] = $row_tandes['khs'];
        $data['mobil_gandengan_tandes'] = $row_tandes['gdn'];
        $data['mobil_tempelan_tandes'] = $row_tandes['tmp'];
        $data['jumlah_tandes'] = $row_tandes['jml'];
        $data['mobil_datang_tandes'] = $row_tandes['dtg'];
        $data['mobil_tidak_datang_tandes'] = $row_tandes['td'];
        $data['lulus_uji_tandes'] = $row_tandes['lls'];
        $data['tidak_lulus_uji_tandes'] = $row_tandes['tdklls'];
        echo json_encode($data);
    }

    public function actionHasilUji() {
        $this->layout = '//';
        $no_uji = strtoupper($_POST['noUji']);
        $criteria = new CDbCriteria();
        $criteria->order = 'tgl_uji DESC';
        $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $no_uji . "%'),' ','')) or (replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $no_uji . "%'),' ',''))");
        $result = VStatusProses::model()->find($criteria);
        if (count($result) != 0) {
            //prauji
            if ($result->prauji == "true") {
                $prauji = 1;
                if ($result->lulus_prauji == "true")
                    $hasil_prauji = "LULUS";
                else
                    $hasil_prauji = "TIDAK LULUS";
            }else {
                $prauji = 0;
                $hasil_prauji = "PROSES";
            }
            //smoke
            if ($result->smoke == "true") {
                $smoke = 1;
                if ($result->lulus_smoke == "true")
                    $hasil_emisi = "LULUS";
                else
                    $hasil_emisi = "TIDAK LULUS";
            }else {
                $smoke = 0;
                $hasil_emisi = "PROSES";
            }
            //pitlift
            if ($result->pitlift == "true") {
                $pitlift = 1;
                if ($result->lulus_pitlift == "true")
                    $hasil_pitlift = "LULUS";
                else
                    $hasil_pitlift = "TIDAK LULUS";
            }else {
                $pitlift = 0;
                $hasil_pitlift = "PROSES";
            }
            //lampu
            if ($result->lampu == "true") {
                $lampu = 1;
                if ($result->lulus_lampu == "true")
                    $hasil_lampu = "LULUS";
                else
                    $hasil_lampu = "TIDAK LULUS";
            }else {
                $lampu = 0;
                $hasil_lampu = "PROSES";
            }
            //rem
            if ($result->break == "true") {
                $brake = 1;
                if ($result->lulus_break == "true")
                    $hasil_break = "LULUS";
                else
                    $hasil_break = "TIDAK LULUS";
            }else {
                $brake = 0;
                $hasil_break = "PROSES";
            }

            if ($prauji == 1 && $smoke == 1 && $pitlift == 1 && $lampu == 1 && $brake == 1) {
                if ($result->hasil == "true")
                    $ltl = 'LULUS';
                else
                    $ltl = 'TIDAK LULUS';
            }else {
                $ltl = 'PROSES';
            }

            $dataTl = VDetailTl::model()->findAllByAttributes(array('id_hasil_uji' => $result->id_hasil_uji));
            $keterangan = '';
            $no = 1;
            foreach ($dataTl as $p) {
                $keterangan .= $no . ". " . $p->kelulusan . "\n";
                $no++;
            }
            $data['no_uji'] = $result->no_uji;
            $data['no_kendaraan'] = $result->no_kendaraan;
            $data['pemilik'] = $result->nama_pemilik;
            $data['hasil_tgl_terakhir_uji'] = date("d F Y", strtotime($result->jdatang));
            $data['hasil_tgl_mati_uji'] = date("d F Y", strtotime($result->tgl_mati_uji));
            $data['hasil_prauji'] = $hasil_prauji;
            $data['hasil_emisi'] = $hasil_emisi;
            $data['hasil_pitlift'] = $hasil_pitlift;
            $data['hasil_lampu'] = $hasil_lampu;
            $data['hasil_break'] = $hasil_break;
            $data['ltl'] = $ltl;
            $data['keterangan'] = $keterangan;
            if (strtotime($result->tgl_mati_uji) < strtotime(date('m/d/Y'))) {
                $data['kondisi'] = 'mati';
            } else {
                $data['kondisi'] = 'hidup';
            }
        } else {
            $data['no_uji'] = '-';
            $data['no_kendaraan'] = "-";
            $data['pemilik'] = "-";
            $data['hasil_tgl_terakhir_uji'] = "-";
            $data['hasil_tgl_mati_uji'] = "-";
            $data['hasil_prauji'] = "-";
            $data['hasil_emisi'] = "-";
            $data['hasil_pitlift'] = "-";
            $data['hasil_lampu'] = "-";
            $data['hasil_break'] = "-";
            $data['ltl'] = "-";
            $data['keterangan'] = "-";
            $data['kondisi'] = 'mati';
        }
        echo json_encode($data);
    }

    public function actionStatusRekom() {
        $this->layout = '//';
        $no_uji = strtoupper($_POST['noUji']);
        $criteria = new CDbCriteria();
        $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $no_uji . "%'),' ','')) or (replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $no_uji . "%'),' ',''))");
        $result = VRekomAndroid::model()->find($criteria);
        if (count($result) != 0) {
            $data['no_uji'] = $result->no_uji;
            $data['no_kendaraan'] = $result->no_kendaraan;
            $data['tgl_rekom'] = date("d F Y", strtotime($result->tgl_retribusi));
            if ($result->mutke == true) {
                $rekom = "Mutasi Keluar";
            } elseif ($result->numke == true) {
                $rekom = "Numpang Keluar";
            } elseif ($result->ubhsifat == true) {
                $rekom = "Ubah Sifat";
            } else {
                $rekom = "-";
            }
            $data['rekom'] = $rekom;

            $criteriaRekomStatus = new CDbCriteria();
            $criteriaRekomStatus->addInCondition('id_rekom', array($result->id_rekom));
            $dataCriteriaRekomStatus = TblRekomStatus::model()->find($criteriaRekomStatus);
            if (count($dataCriteriaRekomStatus) == 0) {
                $kasubag = 0;
                $kaupt = 0;
                $kadis = 0;
                $tglKasubag = '-';
                $tglKaupt = '-';
                $tglKadis = '-';
            } else {
                $kasubag = $dataCriteriaRekomStatus->approve1;
                $kaupt = $dataCriteriaRekomStatus->approve2;
                $kadis = $dataCriteriaRekomStatus->approve3;
                $tglKasubag = date("d F Y", strtotime($dataCriteriaRekomStatus->tgl_approve1));
                $tglKaupt = date("d F Y", strtotime($dataCriteriaRekomStatus->tgl_approve2));
                $tglKadis = date("d F Y", strtotime($dataCriteriaRekomStatus->tgl_approve3));
            }
            $data['kasubag'] = $kasubag;
            $data['kaupt'] = $kaupt;
            $data['kadis'] = $kadis;
            $data['tglKasubag'] = $tglKasubag;
            $data['tglKaupt'] = $tglKaupt;
            $data['tglKadis'] = $tglKadis;
            $data['lokasiRekom'] = "UPTD PKB Wiyung Surabaya";
        } else {
            $data['no_uji'] = '-';
            $data['no_kendaraan'] = '-';
            $data['tgl_rekom'] = '-';
            $data['rekom'] = '-';
            $data['kasubag'] = 0;
            $data['kaupt'] = 0;
            $data['kadis'] = 0;
            $data['tglKasubag'] = '-';
            $data['tglKaupt'] = '-';
            $data['tglKadis'] = '-';
            $data['lokasiRekom'] = "UPTD PKB Wiyung Tandes";
        }

        echo json_encode($data);
    }

    public function actionListRiwayatKendaraan() {
        $this->layout = '//';
        $no_uji = strtoupper($_POST['noUji']);
        $criteria = new CDbCriteria();
        $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $no_uji . "%'),' ','')) or (replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $no_uji . "%'),' ',''))");
        $result = VRiwayat::model()->findAll($criteria);
        $data = array();
        foreach ($result as $p) {
            $nm_uji = 'BERKALA';
            if($p->jenis_uji == 'MK'){
                $nm_uji = 'MUTASI KELUAR';
            }else if($p->jenis_uji == 'NK'){
                $nm_uji = 'NUMPANG UJI KELUAR';
            }
            $data[] = array(
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "tgl_uji" => date("d F Y", strtotime($p->tgl_uji)),
                "tglmati" => date("d F Y", strtotime($p->tglmati)),
                "merk" => $p->merk,
                "tipe" => $p->tipe,
                "no_chasis" => $p->no_chasis,
                "no_mesin" => $p->no_mesin,
                "nama_penguji" => $p->nama_penguji,
                "nrp" => $p->nrp,
                "nm_uji" => $nm_uji,
            );
        }
        echo json_encode($data);
    }

    public function actionSaveRetribusi() {
        $idKendaraan = $_POST['idKendaraan'];
        $tgl_uji = DateTime::createFromFormat('d/m/Y', $_POST['tglUji']);
        $tglUji = $tgl_uji->format('m/d/Y');
        $tglRetribusi = date('m/d/Y');
        
        //BIAYA UJI
        $dtBiaya = TblBiaya::model()->find();
        
        $criteria = new CDbCriteria();
        $criteria->addCondition("id_kendaraan = '$idKendaraan'");
        $criteria->addCondition("tgl_uji = '$tglUji'");
        $criteria->addCondition("status_bayar_faspay = false");
        $data = TblRetribusi::model()->find($criteria);
        $result['va1']='0';
        $result['va2']='0';
        if(count($data) != 0){
            $result['cek']='1';
            $result['va1']=$data->virtual_account1;
            $result['va2']=$data->virtual_account2;
            $b_admin = $data->b_daftar;
            $b_lulus_uji = $data->b_berkala;
            $b_tlt_daftar = $data->b_tlt_daftar;
            $b_tlt_uji = $data->b_tlt_uji;
            $b_plat_uji = $data->b_plat_uji;
            $b_tanda_samping = $data->b_tnd_samping;
            $total = $b_lulus_uji+$b_admin+$b_tlt_daftar+$b_tlt_uji+$b_plat_uji+$b_tanda_samping;
            $result['b_lulus_uji']="Rp. ".number_format($b_lulus_uji, 0, ',', '.').",-";
            $result['b_admin']="Rp. ".number_format($b_admin, 0, ',', '.').",-";
            $result['b_tlt_daftar']="Rp. ".number_format($b_tlt_daftar, 0, ',', '.').",-";
            $result['b_tlt_uji']="Rp. ".number_format($b_tlt_uji, 0, ',', '.').",-";
            $result['b_plat_uji']="Rp. ".number_format($b_plat_uji, 0, ',', '.').",-";
            $result['b_tanda_samping']="Rp. ".number_format($b_tanda_samping, 0, ',', '.').",-";
            $result['total_bayar']="Rp. ".number_format($total, 0, ',', '.').",-";
        }else{
            $result['cek']='0';
//            $new = new TblRetribusi();
//            $new->id_kendaraan = $idKendaraan;
//            $new->tgl_retribusi = $tglRetribusi;
//            $new->tgl_uji = $tglUji;
//            $new->validasi = false;
//            $new->status_bayar_faspay = false;
//            $new->id_uji = 1;
            $rand = mt_rand(100000, 999999);
            $va1 = '898575212'.$rand;
            $va2 = '883080212'.$rand;
            $b_berkala = $dtBiaya->b_penetapan_lulus_uji;
            $b_daftar = $dtBiaya->b_admin;
            $b_plat_uji = $dtBiaya->b_plat_uji;
            $b_tanda_samping = $dtBiaya->b_tnd_samping;
//            $new->save();
            $insert = "INSERT INTO tbl_retribusi(id_kendaraan,tgl_retribusi,tgl_uji,validasi,status_bayar_faspay,id_uji,virtual_account1,virtual_account2,b_berkala,b_daftar,b_tlt_daftar,b_tlt_uji,b_plat_uji,b_tnd_samping) "
                    . "VALUES ($idKendaraan,'$tglRetribusi','$tglUji',false,false,1,'$va1','$va2',$b_berkala,$b_daftar,0,0,$b_plat_uji,$b_tanda_samping)";
            Yii::app()->db->createCommand($insert)->execute();
            $criteria = new CDbCriteria();
            $criteria->addCondition("id_kendaraan = '$idKendaraan'");
            $criteria->addCondition("tgl_uji = '$tglUji'");
            $data = TblRetribusi::model()->find($criteria);
//            
            $result['va1']=$data->virtual_account1;
            $result['va2']=$data->virtual_account2;
            $b_admin = $data->b_daftar;
            $b_lulus_uji = $data->b_berkala;
            $b_tlt_daftar = $data->b_tlt_daftar;
            $b_tlt_uji = $data->b_tlt_uji;
            $b_plat_uji = $data->b_plat_uji;
            $b_tanda_samping = $data->b_tnd_samping;
            $total = $b_lulus_uji+$b_admin+$b_tlt_daftar+$b_tlt_uji+$b_plat_uji+$b_tanda_samping;
            $result['b_lulus_uji']="Rp. ".number_format($b_lulus_uji, 0, ',', '.').",-";
            $result['b_admin']="Rp. ".number_format($b_admin, 0, ',', '.').",-";
            $result['b_tlt_daftar']="Rp. ".number_format($b_tlt_daftar, 0, ',', '.').",-";
            $result['b_tlt_uji']="Rp. ".number_format($b_tlt_uji, 0, ',', '.').",-";
            $result['b_plat_uji']="Rp. ".number_format($b_plat_uji, 0, ',', '.').",-";
            $result['b_tanda_samping']="Rp. ".number_format($b_tanda_samping, 0, ',', '.').",-";
            $result['total_bayar']="Rp. ".number_format($total, 0, ',', '.').",-";
        }
        echo json_encode($result);
    }
}
