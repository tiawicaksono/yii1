<?php

class EditbukuController extends Controller
{

    public function filters()
    {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex()
    {
        $this->pageTitle = 'EDIT BUKU';
        $id_kendaraan = 0;
        if (isset($_POST['textCategory'])) {
            //            $selectCategory = $_POST['selectCategory'];
            $textCategory = strtoupper($_POST['textCategory']);
            $id_kendaran = TblKendaraan::model()->getDataKendaraan($textCategory)->id_kendaraan;
        }

        $data_kendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
        $this->render('index', array('data' => $data_kendaraan));
    }

    public function actionIndex2()
    {
        $this->pageTitle = 'Edit Buku';
        $id_kendaraan = 0;
        if (isset($_POST['textCategory'])) {
            //            $selectCategory = $_POST['selectCategory'];
            $textCategory = strtoupper($_POST['textCategory']);
            $id_kendaran = TblKendaraan::model()->getDataKendaraan($textCategory)->id_kendaraan;
        }

        $data_kendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
        $this->render('index_2', array('data' => $data_kendaraan));
    }

    public function actionProses()
    {
        $idKendaraan = strtoupper($_POST['idKendaraan']);
        $tbl_kendaran = TblKendaraan::model()->findByAttributes(array('id_kendaraan' => $idKendaraan));
        if (empty($tbl_kendaran)) {
            $data['count_kendaraan'] = 0;
        } else {
            $data['count_kendaraan'] = 1;
            $id_kendaran = $tbl_kendaran->id_kendaraan;
            $data_kendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaran));
            $data['nomer_sertifikasi_registrasi'] = $data_kendaraan->no_regis;
            $data['diterbitkan_nomer_sertifikasi_registrasi'] = $data_kendaraan->oleh_regis;
            $data['tgl_nomer_sertifikasi_registrasi'] = date("d/m/Y", strtotime($data_kendaraan->tgl_regis)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->tgl_regis)) : '';
            $data['nomer_sertifikasi_uji'] = $data_kendaraan->no_tipe;
            $data['diterbitkan_nomer_sertifikasi_uji'] = $data_kendaraan->dikeluarkan;
            $data['tgl_nomer_sertifikasi_uji'] = date("d/m/Y", strtotime($data_kendaraan->tgl_terbit)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->tgl_terbit)) : '';
            $data['nomer_sertifikasi_rancang'] = $data_kendaraan->no_rancang;
            $data['diterbitkan_nomer_sertifikasi_rancang'] = $data_kendaraan->oleh_rancang;
            $data['tgl_nomer_sertifikasi_rancang'] = date("d/m/Y", strtotime($data_kendaraan->tgl_rancang)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->tgl_rancang)) : '';
            $data['id_kendaraan'] = $data_kendaraan->id_kendaraan;
            $data['nomer_uji'] = $data_kendaraan->no_uji;
            $data['nomer_kendaraan'] = $data_kendaraan->no_kendaraan;
            $data['identitas'] = $data_kendaraan->identitas;
            $data['nomer_identitas'] = $data_kendaraan->no_identitas;
            $data['nama_pemilik'] = $data_kendaraan->nama_pemilik;
            $data['alamat_pemilik'] = $data_kendaraan->alamat;
            $data['tempat_lahir'] = $data_kendaraan->tmp_lahir;
            $data['tgl_lahir'] = date("m/d/Y", strtotime($data_kendaraan->tgl_lahir)) != '12/30/1899' ? date("d/m/Y", strtotime($data_kendaraan->tgl_lahir)) : '';
            //        echo date("m/d/Y", strtotime($data_kendaraan->tgl_lahir));
            //        exit;
            $data['kelamin'] = $data_kendaraan->kelamin;
            $data['rt'] = $data_kendaraan->rt;
            $data['rw'] = $data_kendaraan->rw;
            $data['kelurahan'] = ucwords(strtolower($data_kendaraan->kelurahan));
            $data['kecamatan'] = ucwords(strtolower($data_kendaraan->kecamatan));
            $data['kota'] = $data_kendaraan->kota;
            $data['propinsi'] = $data_kendaraan->propinsi;
            $data['awal_pemakaian'] = date("d/m/Y", strtotime($data_kendaraan->awal_pakai)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->awal_pakai)) : '';
            $data['tahun'] = $data_kendaraan->tahun;
            $data['nomer_mesin'] = $data_kendaraan->no_mesin;
            $data['nomer_chasis'] = $data_kendaraan->no_chasis;
            $data['jenis_kendaraan'] = $data_kendaraan->id_jns_kend;
            $data['status_kendaraan'] = ($data_kendaraan->umum == 'true') ? 'UMUM' : 'TIDAK UMUM';
            //        $data['merk'] = $data_kendaraan->id_merk;
            $data['merk'] = $data_kendaraan->merk;
            $data['tipe'] = $data_kendaraan->tipe;
            $data['pengimport'] = $data_kendaraan->pengimport;
            $data['isi_silinder'] = $data_kendaraan->isi_silinder;
            $data['daya_motor'] = $data_kendaraan->daya_motor;
            $data['bahan_bakar'] = $data_kendaraan->bahan_bakar;
            $data['ukuran_panjang'] = $data_kendaraan->ukuran_panjang;
            $data['ukuran_lebar'] = $data_kendaraan->ukuran_lebar;
            $data['ukuran_tinggi'] = $data_kendaraan->ukuran_tinggi;
            $data['dimpanjang'] = $data_kendaraan->dimpanjang;
            $data['dimlebar'] = $data_kendaraan->dimlebar;
            $data['dimtinggi'] = $data_kendaraan->dimtinggi;
            //        $data['nm_komersil'] = $data_kendaraan->id_nm_komersil;
            $data['nm_komersil'] = $data_kendaraan->nm_komersil;
            $data['warna_cabin'] = $data_kendaraan->warna;
            $data['warna_bak'] = $data_kendaraan->warna_bak;
            $data['bagian_belakang'] = $data_kendaraan->bagian_belakang;
            $data['bagian_depan'] = $data_kendaraan->bagian_depan;
            $data['bagian_jterendah'] = $data_kendaraan->bagian_jterendah;
            //        $data['karoseri_jenis'] = $data_kendaraan->id_kar_jenis;
            //        $data['karoseri_bahan'] = $data_kendaraan->id_kar_bahan;
            $data['karoseri_jenis'] = $data_kendaraan->karoseri_jenis;
            $data['karoseri_bahan'] = $data_kendaraan->karoseri_bahan;
            $data['karoseri_duduk'] = $data_kendaraan->karoseri_duduk;
            $data['karoseri_berdiri'] = $data_kendaraan->karoseri_berdiri;
            $data['guna_khusus'] = $data_kendaraan->guna_khusus;
            $data['konsumbu'] = $data_kendaraan->konsumbu;
            $data['jsumbu1'] = $data_kendaraan->jsumbu1;
            $data['jsumbu2'] = $data_kendaraan->jsumbu2;
            $data['jsumbu3'] = $data_kendaraan->jsumbu3;
            $data['jsumbu4'] = $data_kendaraan->jsumbu4;
            $data['bsumbu1'] = $data_kendaraan->bsumbu1;
            $data['bsumbu2'] = $data_kendaraan->bsumbu2;
            $data['bsumbu3'] = $data_kendaraan->bsumbu3;
            $data['bsumbu4'] = $data_kendaraan->bsumbu4;
            $data['bsumbu5'] = $data_kendaraan->bsumbu5;
            $data['psumbu1'] = $data_kendaraan->psumbu1;
            $data['psumbu2'] = $data_kendaraan->psumbu2;
            $data['psumbu3'] = $data_kendaraan->psumbu3;
            $data['psumbu4'] = $data_kendaraan->psumbu4;
            $data['psumbu5'] = $data_kendaraan->psumbu5;
            $data['dydukpab1'] = $data_kendaraan->dydukpab1;
            $data['dydukpab2'] = $data_kendaraan->dydukpab2;
            $data['dydukpab3'] = $data_kendaraan->dydukpab3;
            $data['dydukpab4'] = $data_kendaraan->dydukpab4;
            $data['dydukpab5'] = $data_kendaraan->dydukpab5;
            $data['kemjbb'] = $data_kendaraan->kemjbb;
            $data['kemjbkb'] = $data_kendaraan->kemjbkb;
            $data['kemorang'] = $data_kendaraan->kemorang;
            $data['kembarang'] = $data_kendaraan->kembarang;
            $data['kelas_jalan'] = $data_kendaraan->kls_jln;
            $data['ukq'] = $data_kendaraan->ukq;
            $data['ukp'] = $data_kendaraan->ukp;
            $data['ukp2'] = $data_kendaraan->ukp2;
            $data['mst'] = $data_kendaraan->mst;
        }
        echo json_encode($data);
    }

    public function actionProsesSearch()
    {
        $textCategory = strtoupper($_POST['textCategory']);
        $tbl_kendaran = TblKendaraan::model()->getDataKendaraan($textCategory);
        if (empty($tbl_kendaran)) {
            $data['count_kendaraan'] = 0;
        } else {
            $data['count_kendaraan'] = 1;
            $id_kendaran = $tbl_kendaran->id_kendaraan;
            $data_kendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaran));
            $data['nomer_sertifikasi_registrasi'] = $data_kendaraan->no_regis;
            $data['diterbitkan_nomer_sertifikasi_registrasi'] = $data_kendaraan->oleh_regis;
            $data['tgl_nomer_sertifikasi_registrasi'] = date("d/m/Y", strtotime($data_kendaraan->tgl_regis)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->tgl_regis)) : '';
            $data['nomer_sertifikasi_uji'] = $data_kendaraan->no_tipe;
            $data['diterbitkan_nomer_sertifikasi_uji'] = $data_kendaraan->dikeluarkan;
            $data['tgl_nomer_sertifikasi_uji'] = date("d/m/Y", strtotime($data_kendaraan->tgl_terbit)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->tgl_terbit)) : '';
            $data['nomer_sertifikasi_rancang'] = $data_kendaraan->no_rancang;
            $data['diterbitkan_nomer_sertifikasi_rancang'] = $data_kendaraan->oleh_rancang;
            $data['tgl_nomer_sertifikasi_rancang'] = date("d/m/Y", strtotime($data_kendaraan->tgl_rancang)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->tgl_rancang)) : '';
            $data['id_kendaraan'] = $data_kendaraan->id_kendaraan;
            $data['nomer_uji'] = $data_kendaraan->no_uji;
            $data['nomer_kendaraan'] = $data_kendaraan->no_kendaraan;
            $data['identitas'] = $data_kendaraan->identitas;
            $data['nomer_identitas'] = $data_kendaraan->no_identitas;
            $data['nama_pemilik'] = $data_kendaraan->nama_pemilik;
            $data['alamat_pemilik'] = $data_kendaraan->alamat;
            $data['tempat_lahir'] = $data_kendaraan->tmp_lahir;
            $data['tgl_lahir'] = date("m/d/Y", strtotime($data_kendaraan->tgl_lahir)) != '12/30/1899' ? date("d/m/Y", strtotime($data_kendaraan->tgl_lahir)) : '';
            //        echo date("m/d/Y", strtotime($data_kendaraan->tgl_lahir));
            //        exit;
            $data['kelamin'] = $data_kendaraan->kelamin;
            $data['rt'] = $data_kendaraan->rt;
            $data['rw'] = $data_kendaraan->rw;
            //            $data['kota'] = $data_kendaraan->kota;
            //            $data['propinsi'] = $data_kendaraan->propinsi;
            $data['propinsi'] = empty($data_kendaraan->id_provinsi) ? '35' : $data_kendaraan->id_provinsi;
            $data['kota'] = empty($data_kendaraan->id_kota) ? '3527' : $data_kendaraan->id_kota;
            $data['kecamatan'] = $data_kendaraan->id_kecamatan;
            $data['kelurahan'] = $data_kendaraan->id_kelurahan;
            $data['awal_pemakaian'] = date("d/m/Y", strtotime($data_kendaraan->awal_pakai)) != '01/01/1970' ? date("d/m/Y", strtotime($data_kendaraan->awal_pakai)) : '';
            $data['tahun'] = $data_kendaraan->tahun;
            $data['nomer_mesin'] = $data_kendaraan->no_mesin;
            $data['nomer_chasis'] = $data_kendaraan->no_chasis;
            $data['jenis_kendaraan'] = $data_kendaraan->id_jns_kend;
            $data['status_kendaraan'] = ($data_kendaraan->umum == 'true') ? 'UMUM' : 'TIDAK UMUM';
            //        $data['merk'] = $data_kendaraan->id_merk;
            $data['merk'] = $data_kendaraan->merk;
            $data['tipe'] = $data_kendaraan->tipe;
            $data['pengimport'] = $data_kendaraan->pengimport;
            $data['isi_silinder'] = $data_kendaraan->isi_silinder;
            $data['daya_motor'] = $data_kendaraan->daya_motor;
            $data['bahan_bakar'] = $data_kendaraan->bahan_bakar;
            $data['ukuran_panjang'] = $data_kendaraan->ukuran_panjang;
            $data['ukuran_lebar'] = $data_kendaraan->ukuran_lebar;
            $data['ukuran_tinggi'] = $data_kendaraan->ukuran_tinggi;
            $data['dimpanjang'] = $data_kendaraan->dimpanjang;
            $data['dimlebar'] = $data_kendaraan->dimlebar;
            $data['dimtinggi'] = $data_kendaraan->dimtinggi;
            //        $data['nm_komersil'] = $data_kendaraan->id_nm_komersil;
            $data['nm_komersil'] = $data_kendaraan->nm_komersil;
            $data['warna_cabin'] = $data_kendaraan->warna;
            $data['warna_bak'] = $data_kendaraan->warna_bak;
            $data['bagian_belakang'] = $data_kendaraan->bagian_belakang;
            $data['bagian_depan'] = $data_kendaraan->bagian_depan;
            $data['bagian_jterendah'] = $data_kendaraan->bagian_jterendah;
            //        $data['karoseri_jenis'] = $data_kendaraan->id_kar_jenis;
            //        $data['karoseri_bahan'] = $data_kendaraan->id_kar_bahan;
            $data['karoseri_jenis'] = $data_kendaraan->karoseri_jenis;
            $data['karoseri_bahan'] = $data_kendaraan->karoseri_bahan;
            $data['karoseri_duduk'] = $data_kendaraan->karoseri_duduk;
            $data['karoseri_berdiri'] = $data_kendaraan->karoseri_berdiri;
            $data['guna_khusus'] = $data_kendaraan->guna_khusus;
            $data['konsumbu'] = $data_kendaraan->konsumbu;
            $data['jsumbu1'] = $data_kendaraan->jsumbu1;
            $data['jsumbu2'] = $data_kendaraan->jsumbu2;
            $data['jsumbu3'] = $data_kendaraan->jsumbu3;
            $data['jsumbu4'] = $data_kendaraan->jsumbu4;
            $data['bsumbu1'] = $data_kendaraan->bsumbu1;
            $data['bsumbu2'] = $data_kendaraan->bsumbu2;
            $data['bsumbu3'] = $data_kendaraan->bsumbu3;
            $data['bsumbu4'] = $data_kendaraan->bsumbu4;
            $data['bsumbu5'] = $data_kendaraan->bsumbu5;
            $data['psumbu1'] = $data_kendaraan->psumbu1;
            $data['psumbu2'] = $data_kendaraan->psumbu2;
            $data['psumbu3'] = $data_kendaraan->psumbu3;
            $data['psumbu4'] = $data_kendaraan->psumbu4;
            $data['psumbu5'] = $data_kendaraan->psumbu5;
            $data['dydukpab1'] = $data_kendaraan->dydukpab1;
            $data['dydukpab2'] = $data_kendaraan->dydukpab2;
            $data['dydukpab3'] = $data_kendaraan->dydukpab3;
            $data['dydukpab4'] = $data_kendaraan->dydukpab4;
            $data['dydukpab5'] = $data_kendaraan->dydukpab5;
            $data['kemjbb'] = $data_kendaraan->kemjbb;
            $data['kemjbkb'] = $data_kendaraan->kemjbkb;
            $data['kemorang'] = $data_kendaraan->kemorang;
            $data['kembarang'] = $data_kendaraan->kembarang;
            $data['kelas_jalan'] = $data_kendaraan->kls_jln;
            $data['ukq'] = $data_kendaraan->ukq;
            $data['ukp'] = $data_kendaraan->ukp;
            $data['ukp2'] = $data_kendaraan->ukp2;
            $data['mst'] = $data_kendaraan->mst;
        }
        echo json_encode($data);
    }

    public function actionRiwayatListGrid()
    {
        $selectCategory = $_POST['select_category_acuan'];
        $textCategory = strtoupper($_POST['text_category_acuan']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tgl_uji';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;

        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER($selectCategory),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }
        $result = VRiwayat::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_kendaraan" => $p->id_kendaraan,
                "id_hasil_uji" => $p->id_hasil_uji,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "tgl_uji" => date("d F Y", strtotime($p->tgl_uji)),
                "mati_uji" => date("d F Y", strtotime($p->tglmati)),
                "nama_penguji" => $p->nama_penguji,
                "no_chasis" => $p->no_chasis,
                "no_mesin" => $p->no_mesin,
                "merk" => $p->merk,
                "tipe" => $p->tipe
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

    public function actionCekRiwayat()
    {
        $textCategory = strtoupper($_POST['text_category']);
        $selectCategoryAcuan = $_POST['select_category_acuan'];
        $criteria = new CDbCriteria;
        $criteria->addCondition("(replace(LOWER($selectCategoryAcuan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        $count = VRiwayat::model()->count($criteria);
        $id_kendaran = '';
        if ($count == 1) {
            $results = VRiwayat::model()->find($criteria);
            $id_kendaran = $results['id_kendaraan'];
        } else if ($count == 0) {
            $results = VKendaraan::model()->find($criteria);
            $id_kendaran = $results->id_kendaraan;
            $count = 1;
        }
        $data['hasil'] = $count;
        $data['id_kendaraan'] = $id_kendaran;
        echo json_encode($data);
    }

    public function actionSaveForm()
    {
        $nomer_sertifikasi_registrasi = str_replace("'", "`", strtoupper($_POST['nomer_sertifikasi_registrasi']));
        $diterbitkan_nomer_sertifikasi_registrasi = str_replace("'", "`", strtoupper($_POST['diterbitkan_nomer_sertifikasi_registrasi']));
        $tgl_nomer_sertifikasi_registrasi = $_POST['tgl_nomer_sertifikasi_registrasi'];
        if (!empty($tgl_nomer_sertifikasi_registrasi)) {
            $date_nomer_sertifikasi_registrasi = DateTime::createFromFormat('d/m/Y', $tgl_nomer_sertifikasi_registrasi);
            $tgl_nomer_sertifikasi_registrasi = $date_nomer_sertifikasi_registrasi->format('m/d/Y');
        } else {
            $tgl_nomer_sertifikasi_registrasi = '01/01/1970';
        }

        $nomer_sertifikasi_uji = str_replace("'", "`", strtoupper($_POST['nomer_sertifikasi_uji']));
        $diterbitkan_nomer_sertifikasi_uji = str_replace("'", "`", strtoupper($_POST['diterbitkan_nomer_sertifikasi_uji']));
        $tgl_nomer_sertifikasi_uji = $_POST['tgl_nomer_sertifikasi_uji'];
        if (!empty($tgl_nomer_sertifikasi_uji)) {
            $date_nomer_sertifikasi_uji = DateTime::createFromFormat('d/m/Y', $tgl_nomer_sertifikasi_uji);
            $tgl_nomer_sertifikasi_uji = $date_nomer_sertifikasi_uji->format('m/d/Y');
        } else {
            $tgl_nomer_sertifikasi_uji = '01/01/1970';
        }

        $nomer_sertifikasi_rancang = str_replace("'", "`", strtoupper($_POST['nomer_sertifikasi_rancang']));
        $diterbitkan_nomer_sertifikasi_rancang = str_replace("'", "`", strtoupper($_POST['diterbitkan_nomer_sertifikasi_rancang']));
        $tgl_nomer_sertifikasi_rancang = $_POST['tgl_nomer_sertifikasi_rancang'];
        if (!empty($tgl_nomer_sertifikasi_rancang)) {
            $date_nomer_sertifikasi_rancang = DateTime::createFromFormat('d/m/Y', $tgl_nomer_sertifikasi_rancang);
            $tgl_nomer_sertifikasi_rancang = $date_nomer_sertifikasi_rancang->format('m/d/Y');
        } else {
            $tgl_nomer_sertifikasi_rancang = '01/01/1970';
        }

        $idKendaraan = $_POST['id_kendaraan'];
        //        $NO_STUK = strtoupper($_POST['nomer_uji']);
        //        $var_no_uji = str_replace("'", " ", $NO_STUK);
        //        $var_nomor_uji = preg_replace("/([[:alpha:]])([[:digit:]])/", "\\1 \\2", $var_no_uji);
        //        $nomer_uji = preg_replace("/([[:digit:]])([[:alpha:]])/", "\\1 \\2", $var_nomor_uji);
        $nomer_uji = strtoupper($_POST['nomer_uji']);

        $nomer_kendaraan = str_replace("'", "`", strtoupper($_POST['nomer_kendaraan']));
        $identitas = $_POST['identitas'];
        $nomer_identitas = str_replace("'", "`", strtoupper($_POST['nomer_identitas']));
        $nama_pemilik = str_replace("'", "`", strtoupper($_POST['nama_pemilik']));
        $rt = str_replace("'", "`", strtoupper($_POST['rt']));
        $rw = str_replace("'", "`", strtoupper($_POST['rw']));
        $alamat_pemilik = str_replace("'", "`", strtoupper($_POST['alamat_pemilik']));

        $id_provinsi = $_POST['propinsi_select'];
        $id_kota = $_POST['kota_select'];
        $id_kecamatan = $_POST['kecamatan_select'];
        $id_kelurahan = $_POST['kelurahan_select'];
        $propinsi = str_replace("'", "`", MProvinsi::model()->findByAttributes(array('id_provinsi' => $id_provinsi))->nama);
        $kota = str_replace("'", "`", MKota::model()->findByAttributes(array('id_kota' => $id_kota))->nama);
        $kecamatan = str_replace("'", "`", MKecamatan::model()->findByAttributes(array('id_kecamatan' => $id_kecamatan))->nama);
        $kelurahan = str_replace("'", "`", MKelurahan::model()->findByAttributes(array('id_kelurahan' => $id_kelurahan))->nama);

        $tempat_lahir = str_replace("'", "`", strtoupper($_POST['tempat_lahir']));
        $birth_date = $_POST['tgl_lahir'];
        if (!empty($birth_date)) {
            $date_lahir = DateTime::createFromFormat('d/m/Y', $birth_date);
            $tgl_lahir = $date_lahir->format('m/d/Y');
        } else {
            $tgl_lahir = '12/30/1899';
        }
        $kelamin = $_POST['kelamin'];
        $tgl_awal_pemakaian = $_POST['awal_pemakaian'];
        if (!empty($tgl_awal_pemakaian)) {
            $date_awal_pemakaian = DateTime::createFromFormat('d/m/Y', $tgl_awal_pemakaian);
            $awal_pemakaian = $date_awal_pemakaian->format('m/d/Y');
        } else {
            $awal_pemakaian = NULL;
        }
        $tahun = empty($_POST['tahun']) ? '0' : $_POST['tahun'];
        $nomer_mesin = str_replace("'", "`", strtoupper($_POST['nomer_mesin']));
        $nomer_chasis = str_replace("'", "`", strtoupper($_POST['nomer_chasis']));
        $id_jns_kend = intval($_POST['jenis_kendaraan']);
        $jenis_kendaraan = TblJnsKend::model()->findByAttributes(array('id_jns_kend' => $id_jns_kend))->jns_kend;
        $status_kendaraan = $_POST['status_kendaraan'];
        $merk = strtoupper($_POST['merk']);
        $tipe = strtoupper($_POST['tipe']);
        $pengimport = str_replace("'", "`", strtoupper($_POST['pengimport']));
        $isi_silinder = $_POST['isi_silinder'];
        $daya_motor = $_POST['daya_motor'];
        $bahan_bakar = $_POST['bahan_bakar'];
        $panjang_utama = $_POST['panjang_utama'];
        $lebar_utama = $_POST['lebar_utama'];
        $tinggi_utama = $_POST['tinggi_utama'];
        $panjang_muatan = $_POST['panjang_muatan'];
        $lebar_muatan = $_POST['lebar_muatan'];
        $tinggi_muatan = $_POST['tinggi_muatan'];
        $nama_komersil = strtoupper($_POST['nama_komersil']);
        $warna_cabin = str_replace("'", "`", strtoupper($_POST['warna_cabin']));
        $warna_bak = str_replace("'", "`", strtoupper($_POST['warna_bak']));
        $kebelakang = $_POST['kebelakang'];
        $kedepan = $_POST['kedepan'];
        $jarak_terendah = $_POST['jarak_terendah'];
        $karoseri_jenis = $_POST['karoseri_jenis'];
        $karoseri_bahan = strtoupper($_POST['karoseri_bahan']);
        $tempat_duduk = $_POST['tempat_duduk'];
        $berdiri = $_POST['berdiri'];
        $peng_khusus = $_POST['peng_khusus'];
        $konfigurasi_sumbu = $_POST['konfigurasi_sumbu'];
        $jarak_sumbu_1 = $_POST['jarak_sumbu_1'] == '' ? 0 : $_POST['jarak_sumbu_1'];
        $jarak_sumbu_2 = $_POST['jarak_sumbu_2'] == '' ? 0 : $_POST['jarak_sumbu_2'];
        $jarak_sumbu_3 = $_POST['jarak_sumbu_3'] == '' ? 0 : $_POST['jarak_sumbu_3'];
        $jarak_sumbu_4 = $_POST['jarak_sumbu_4'] == '' ? 0 : $_POST['jarak_sumbu_4'];
        $berat_kendaraan_sumbu_1 = $_POST['berat_kendaraan_sumbu_1'];
        $berat_kendaraan_sumbu_2 = $_POST['berat_kendaraan_sumbu_2'];
        $berat_kendaraan_sumbu_3 = $_POST['berat_kendaraan_sumbu_3'];
        $berat_kendaraan_sumbu_4 = $_POST['berat_kendaraan_sumbu_4'];
        $berat_kendaraan_sumbu_5 = $_POST['berat_kendaraan_sumbu_5'];
        $pemakaian_sumbu_ban_1 = strtoupper($_POST['pemakaian_sumbu_ban_1']);
        $pemakaian_sumbu_ban_2 = strtoupper($_POST['pemakaian_sumbu_ban_2']);
        $pemakaian_sumbu_ban_3 = strtoupper($_POST['pemakaian_sumbu_ban_3']);
        $pemakaian_sumbu_ban_4 = strtoupper($_POST['pemakaian_sumbu_ban_4']);
        $pemakaian_sumbu_ban_5 = '';
        $daya_dukung_pabrik_1 = $_POST['daya_dukung_pabrik_1'];
        $daya_dukung_pabrik_2 = $_POST['daya_dukung_pabrik_2'];
        $daya_dukung_pabrik_3 = $_POST['daya_dukung_pabrik_3'];
        $daya_dukung_pabrik_4 = $_POST['daya_dukung_pabrik_4'];
        $daya_dukung_pabrik_5 = $_POST['daya_dukung_pabrik_5'];
        $jbb = empty($_POST['jbb']) ? '0' : $_POST['jbb'];
        $jbkb = $_POST['jbkb'];
        $daya_angkut_orang = $_POST['daya_angkut_orang'];
        $daya_angkut_barang = $_POST['daya_angkut_barang'];
        $kelas_jalan = $_POST['kelas_jalan'];
        //        $kelas_jalan = '';
        $q_r = $_POST['q_r'];
        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $mst = $_POST['mst'];
        $created = '';
        $createdby = '';
        $no_telepon = $_POST['no_telepon'];

        $dataKendaraan = $nomer_uji . '~' . $merk . '~' . $tipe . '~' . $tahun . '~' . $jenis_kendaraan . '~' . $awal_pemakaian . '~' . $nomer_chasis . '~' . $nomer_mesin . '~' . $nama_pemilik . '~' . $identitas . '~' . $nomer_identitas . '~' . $alamat_pemilik . '~' . $nomer_kendaraan . '~' . $created . '~' . $createdby . '~' . $status_kendaraan . '~' . $tempat_lahir . '~' . $tgl_lahir . '~' . $kelamin . '~' . $rt . '~' . $rw . '~' . $kelurahan . '~' . $kecamatan . '~' . $kota . '~' . $propinsi . '~' . $pengimport . '~' . $id_jns_kend . '~' . $no_telepon . '~' . $id_provinsi . '~' . $id_kota . '~' . $id_kecamatan . '~' . $id_kelurahan;
        $dataSertifikasi = $nomer_sertifikasi_registrasi . '~' . $diterbitkan_nomer_sertifikasi_registrasi . '~' . $tgl_nomer_sertifikasi_registrasi . '~' . $nomer_sertifikasi_uji . '~' . $diterbitkan_nomer_sertifikasi_uji . '~' . $tgl_nomer_sertifikasi_uji . '~' . $nomer_sertifikasi_rancang . '~' . $diterbitkan_nomer_sertifikasi_rancang . '~' . $tgl_nomer_sertifikasi_rancang;
        $dataType = $warna_cabin . '~' . $isi_silinder . '~' . $daya_motor . '~' . $bahan_bakar . '~' . $panjang_utama . '~' . $lebar_utama . '~' . $tinggi_utama . '~' . $kebelakang . '~' . $kedepan . '~' . $jarak_terendah . '~' . $karoseri_jenis . '~' . $karoseri_bahan . '~' . $tempat_duduk . '~' . $berdiri . '~' . $jarak_sumbu_1 . '~' . $jarak_sumbu_2 . '~' . $jarak_sumbu_3 . '~' . $jarak_sumbu_4 . '~' . $berat_kendaraan_sumbu_1 . '~' . $berat_kendaraan_sumbu_2 . '~' . $berat_kendaraan_sumbu_3 . '~' . $berat_kendaraan_sumbu_4 . '~' . $berat_kendaraan_sumbu_5 . '~' . $pemakaian_sumbu_ban_1 . '~' . $pemakaian_sumbu_ban_2 . '~' . $pemakaian_sumbu_ban_3 . '~' . $pemakaian_sumbu_ban_4 . '~' . $pemakaian_sumbu_ban_5 . '~' . $panjang_muatan . '~' . $lebar_muatan . '~' . $tinggi_muatan . '~' . $jbb . '~' . $jbkb . '~' . $daya_angkut_orang . '~' . $daya_angkut_barang . '~' . $nama_komersil . '~' . $tipe . '~' . $kelas_jalan . '~' . $p1 . '~' . $q_r . '~' . $p2 . '~' . $konfigurasi_sumbu . '~' . $daya_dukung_pabrik_1 . '~' . $daya_dukung_pabrik_2 . '~' . $daya_dukung_pabrik_3 . '~' . $daya_dukung_pabrik_4 . '~' . $daya_dukung_pabrik_5 . '~' . $warna_bak . '~' . $peng_khusus . '~' . $mst;
        $updateBuku = "Select in_up_data_kendaraan('" . $dataKendaraan . "','" . $dataSertifikasi . "','" . $dataType . "',$idKendaraan)";
        Yii::app()->db->createCommand($updateBuku)->query();
    }

    public function actionSaveBaruForm()
    {
        $nomer_sertifikasi_registrasi = str_replace("'", "`", strtoupper($_POST['nomer_sertifikasi_registrasi_baru']));
        $diterbitkan_nomer_sertifikasi_registrasi = str_replace("'", "`", strtoupper($_POST['diterbitkan_nomer_sertifikasi_registrasi_baru']));
        $tgl_nomer_sertifikasi_registrasi = $_POST['tgl_nomer_sertifikasi_registrasi_baru'];
        if (!empty($tgl_nomer_sertifikasi_registrasi)) {
            $date_nomer_sertifikasi_registrasi = DateTime::createFromFormat('d/m/Y', $tgl_nomer_sertifikasi_registrasi);
            $tgl_nomer_sertifikasi_registrasi = $date_nomer_sertifikasi_registrasi->format('m/d/Y');
        } else {
            $tgl_nomer_sertifikasi_registrasi = '01/01/1970';
        }

        $nomer_sertifikasi_uji = str_replace("'", "`", strtoupper($_POST['nomer_sertifikasi_uji_baru']));
        $diterbitkan_nomer_sertifikasi_uji = str_replace("'", "`", strtoupper($_POST['diterbitkan_nomer_sertifikasi_uji_baru']));
        $tgl_nomer_sertifikasi_uji = $_POST['tgl_nomer_sertifikasi_uji_baru'];
        if (!empty($tgl_nomer_sertifikasi_uji)) {
            $date_nomer_sertifikasi_uji = DateTime::createFromFormat('d/m/Y', $tgl_nomer_sertifikasi_uji);
            $tgl_nomer_sertifikasi_uji = $date_nomer_sertifikasi_uji->format('m/d/Y');
        } else {
            $tgl_nomer_sertifikasi_uji = '01/01/1970';
        }

        $nomer_sertifikasi_rancang = str_replace("'", "`", strtoupper($_POST['nomer_sertifikasi_rancang_baru']));
        $diterbitkan_nomer_sertifikasi_rancang = str_replace("'", "`", strtoupper($_POST['diterbitkan_nomer_sertifikasi_rancang_baru']));
        $tgl_nomer_sertifikasi_rancang = $_POST['tgl_nomer_sertifikasi_rancang_baru'];
        if (!empty($tgl_nomer_sertifikasi_rancang)) {
            $date_nomer_sertifikasi_rancang = DateTime::createFromFormat('d/m/Y', $tgl_nomer_sertifikasi_rancang);
            $tgl_nomer_sertifikasi_rancang = $date_nomer_sertifikasi_rancang->format('m/d/Y');
        } else {
            $tgl_nomer_sertifikasi_rancang = '01/01/1970';
        }

        $idKendaraan = 0;
        $nomer_uji = str_replace("'", "`", strtoupper($_POST['nomer_uji_baru']));
        $nomer_kendaraan = str_replace("'", "`", strtoupper($_POST['nomer_kendaraan_baru']));
        $cek = TblKendaraan::model()->getDataKendaraan($nomer_uji);
        if (!empty($cek)) {
            $idKendaraan = $cek->id_kendaraan;
        }
        $identitas = $_POST['identitas_baru'];
        $nomer_identitas = str_replace("'", "`", strtoupper($_POST['nomer_identitas_baru']));
        $nama_pemilik = str_replace("'", "`", strtoupper($_POST['nama_pemilik_baru']));
        $rt = str_replace("'", "`", strtoupper($_POST['rt_baru']));
        $rw = str_replace("'", "`", strtoupper($_POST['rw_baru']));

        $id_provinsi = $_POST['propinsi_select_baru'];
        $id_kota = $_POST['kota_select_baru'];
        $id_kecamatan = $_POST['kecamatan_select_baru'];
        $id_kelurahan = $_POST['kelurahan_select_baru'];

        $propinsi = MProvinsi::model()->findByAttributes(array('id_provinsi' => $id_provinsi))->nama;
        $kota = MKota::model()->findByAttributes(array('id_kota' => $id_kota))->nama;
        $kecamatan = MKecamatan::model()->findByAttributes(array('id_kecamatan' => $id_kecamatan))->nama;
        $kelurahan = MKelurahan::model()->findByAttributes(array('id_kelurahan' => $id_kelurahan))->nama;

        $alamat_pemilik = str_replace("'", "`", strtoupper($_POST['alamat_pemilik_baru']));
        $tempat_lahir = str_replace("'", "`", strtoupper($_POST['tempat_lahir_baru']));
        $birth_date = $_POST['tgl_lahir_baru'];
        if (!empty($birth_date)) {
            $date_lahir = DateTime::createFromFormat('d/m/Y', $birth_date);
            $tgl_lahir = $date_lahir->format('m/d/Y');
        } else {
            $tgl_lahir = '12/30/1899';
        }
        $kelamin = $_POST['kelamin_baru'];
        $tgl_awal_pemakaian = $_POST['awal_pemakaian_baru'];
        if (!empty($tgl_awal_pemakaian)) {
            $date_awal_pemakaian = DateTime::createFromFormat('d/m/Y', $tgl_awal_pemakaian);
            $awal_pemakaian = $date_awal_pemakaian->format('m/d/Y');
        } else {
            $awal_pemakaian = NULL;
        }
        $tahun = empty($_POST['tahun_baru']) ? '0' : $_POST['tahun_baru'];
        $nomer_mesin = str_replace("'", "`", strtoupper($_POST['nomer_mesin_baru']));
        $nomer_chasis = str_replace("'", "`", strtoupper($_POST['nomer_chasis_baru']));
        $id_jns_kend = intval($_POST['jenis_kendaraan_baru']);
        $jenis_kendaraan = TblJnsKend::model()->findByAttributes(array('id_jns_kend' => $id_jns_kend))->jns_kend;
        $status_kendaraan = $_POST['status_kendaraan_baru'];
        $merk = strtoupper($_POST['merk_baru']);
        $tipe = strtoupper($_POST['tipe_baru']);
        $pengimport = str_replace("'", "`", strtoupper($_POST['pengimport_baru']));
        $isi_silinder = $_POST['isi_silinder_baru'];
        $daya_motor = $_POST['daya_motor_baru'];
        $bahan_bakar = $_POST['bahan_bakar_baru'];
        $panjang_utama = $_POST['panjang_utama_baru'];
        $lebar_utama = $_POST['lebar_utama_baru'];
        $tinggi_utama = $_POST['tinggi_utama_baru'];
        $panjang_muatan = $_POST['panjang_muatan_baru'];
        $lebar_muatan = $_POST['lebar_muatan_baru'];
        $tinggi_muatan = $_POST['tinggi_muatan_baru'];
        $nama_komersil = strtoupper($_POST['nama_komersil_baru']);
        $warna_cabin = str_replace("'", "`", strtoupper($_POST['warna_cabin_baru']));
        $warna_bak = str_replace("'", "`", strtoupper($_POST['warna_bak_baru']));
        $kebelakang = $_POST['kebelakang_baru'];
        $kedepan = $_POST['kedepan_baru'];
        $jarak_terendah = $_POST['jarak_terendah_baru'];
        $karoseri_jenis = strtoupper($_POST['karoseri_jenis_baru']);
        $karoseri_bahan = strtoupper($_POST['karoseri_bahan_baru']);
        $tempat_duduk = $_POST['tempat_duduk_baru'];
        $berdiri = $_POST['berdiri_baru'];
        $peng_khusus = $_POST['peng_khusus_baru'];
        $konfigurasi_sumbu = $_POST['konfigurasi_sumbu_baru'];
        $jarak_sumbu_1 = $_POST['jarak_sumbu_1_baru'] == '' ? 0 : $_POST['jarak_sumbu_1_baru'];
        $jarak_sumbu_2 = $_POST['jarak_sumbu_2_baru'] == '' ? 0 : $_POST['jarak_sumbu_2_baru'];
        $jarak_sumbu_3 = $_POST['jarak_sumbu_3_baru'] == '' ? 0 : $_POST['jarak_sumbu_3_baru'];
        $jarak_sumbu_4 = $_POST['jarak_sumbu_4_baru'] == '' ? 0 : $_POST['jarak_sumbu_4_baru'];
        $berat_kendaraan_sumbu_1 = $_POST['berat_kendaraan_sumbu_1_baru'];
        $berat_kendaraan_sumbu_2 = $_POST['berat_kendaraan_sumbu_2_baru'];
        $berat_kendaraan_sumbu_3 = $_POST['berat_kendaraan_sumbu_3_baru'];
        $berat_kendaraan_sumbu_4 = $_POST['berat_kendaraan_sumbu_4_baru'];
        $berat_kendaraan_sumbu_5 = $_POST['berat_kendaraan_sumbu_5_baru'];
        $pemakaian_sumbu_ban_1 = strtoupper($_POST['pemakaian_sumbu_ban_1_baru']);
        $pemakaian_sumbu_ban_2 = strtoupper($_POST['pemakaian_sumbu_ban_2_baru']);
        $pemakaian_sumbu_ban_3 = strtoupper($_POST['pemakaian_sumbu_ban_3_baru']);
        $pemakaian_sumbu_ban_4 = strtoupper($_POST['pemakaian_sumbu_ban_4_baru']);
        $pemakaian_sumbu_ban_5 = '';
        $daya_dukung_pabrik_1 = $_POST['daya_dukung_pabrik_1_baru'];
        $daya_dukung_pabrik_2 = $_POST['daya_dukung_pabrik_2_baru'];
        $daya_dukung_pabrik_3 = $_POST['daya_dukung_pabrik_3_baru'];
        $daya_dukung_pabrik_4 = $_POST['daya_dukung_pabrik_4_baru'];
        $daya_dukung_pabrik_5 = $_POST['daya_dukung_pabrik_5_baru'];
        $jbb = empty($_POST['jbb_baru']) ? '0' : $_POST['jbb_baru'];
        $jbkb = $_POST['jbkb_baru'];
        $daya_angkut_orang = $_POST['daya_angkut_orang_baru'];
        $daya_angkut_barang = $_POST['daya_angkut_barang_baru'];
        $kelas_jalan = $_POST['kelas_jalan_baru'];
        $q_r = $_POST['q_r_baru'];
        $p1 = $_POST['p1_baru'];
        $p2 = $_POST['p2_baru'];
        $mst = $_POST['mst_baru'];
        $created = '';
        $createdby = '';
        $no_telepon = $_POST['no_telepon_baru'];

        $dataKendaraan = $nomer_uji . '~' . $merk . '~' . $tipe . '~' . $tahun . '~' . $jenis_kendaraan . '~' . $awal_pemakaian . '~' . $nomer_chasis . '~' . $nomer_mesin . '~' . $nama_pemilik . '~' . $identitas . '~' . $nomer_identitas . '~' . $alamat_pemilik . '~' . $nomer_kendaraan . '~' . $created . '~' . $createdby . '~' . $status_kendaraan . '~' . $tempat_lahir . '~' . $tgl_lahir . '~' . $kelamin . '~' . $rt . '~' . $rw . '~' . $kelurahan . '~' . $kecamatan . '~' . $kota . '~' . $propinsi . '~' . $pengimport . '~' . $id_jns_kend . '~' . $no_telepon . '~' . $id_provinsi . '~' . $id_kota . '~' . $id_kecamatan . '~' . $id_kelurahan;
        $dataSertifikasi = $nomer_sertifikasi_registrasi . '~' . $diterbitkan_nomer_sertifikasi_registrasi . '~' . $tgl_nomer_sertifikasi_registrasi . '~' . $nomer_sertifikasi_uji . '~' . $diterbitkan_nomer_sertifikasi_uji . '~' . $tgl_nomer_sertifikasi_uji . '~' . $nomer_sertifikasi_rancang . '~' . $diterbitkan_nomer_sertifikasi_rancang . '~' . $tgl_nomer_sertifikasi_rancang;
        $dataType = $warna_cabin . '~' . $isi_silinder . '~' . $daya_motor . '~' . $bahan_bakar . '~' . $panjang_utama . '~' . $lebar_utama . '~' . $tinggi_utama . '~' . $kebelakang . '~' . $kedepan . '~' . $jarak_terendah . '~' . $karoseri_jenis . '~' . $karoseri_bahan . '~' . $tempat_duduk . '~' . $berdiri . '~' . $jarak_sumbu_1 . '~' . $jarak_sumbu_2 . '~' . $jarak_sumbu_3 . '~' . $jarak_sumbu_4 . '~' . $berat_kendaraan_sumbu_1 . '~' . $berat_kendaraan_sumbu_2 . '~' . $berat_kendaraan_sumbu_3 . '~' . $berat_kendaraan_sumbu_4 . '~' . $berat_kendaraan_sumbu_5 . '~' . $pemakaian_sumbu_ban_1 . '~' . $pemakaian_sumbu_ban_2 . '~' . $pemakaian_sumbu_ban_3 . '~' . $pemakaian_sumbu_ban_4 . '~' . $pemakaian_sumbu_ban_5 . '~' . $panjang_muatan . '~' . $lebar_muatan . '~' . $tinggi_muatan . '~' . $jbb . '~' . $jbkb . '~' . $daya_angkut_orang . '~' . $daya_angkut_barang . '~' . $nama_komersil . '~' . $tipe . '~' . $kelas_jalan . '~' . $p1 . '~' . $q_r . '~' . $p2 . '~' . $konfigurasi_sumbu . '~' . $daya_dukung_pabrik_1 . '~' . $daya_dukung_pabrik_2 . '~' . $daya_dukung_pabrik_3 . '~' . $daya_dukung_pabrik_4 . '~' . $daya_dukung_pabrik_5 . '~' . $warna_bak . '~' . $peng_khusus . '~' . $mst;
        $updateBuku = "Select in_up_data_kendaraan('" . $dataKendaraan . "','" . $dataSertifikasi . "','" . $dataType . "',$idKendaraan)";
        Yii::app()->db->createCommand($updateBuku)->query();
    }

    public function actionDetailBukuUji()
    {
        $idKendaraan = $_POST['id'];
        $data_kend = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $idKendaraan));
        //        $tblBuku = TblBuku::model()->findByAttributes(array('id_retribusi' => $idRetribusi));
        //        if (count($tblBuku) == 0) {
        //            $tgl_cetak = date("d", strtotime($tblBuku->tgl_cetak));
        //            $bulan_cetak = date("n", strtotime($tblBuku->tgl_cetak));
        //            $thn_cetak = date("Y", strtotime($tblBuku->tgl_cetak));
        //        } else {
        //            $tgl_cetak = date("d");
        //            $bulan_cetak = date("n");
        //            $thn_cetak = date("Y");
        //        }
        //        $bln_cetak = Yii::app()->params['bulanArrayInd'][$bulan_cetak - 1];
        //
        //        $result['tanggal_cetak'] = $tgl_cetak . " " . $bln_cetak . " " . $thn_cetak;
        $result['no_uji'] = $data_kend->no_uji;
        $result['no_kendaraan'] = $data_kend->no_kendaraan;
        $result['nama_pemilik'] = $data_kend->nama_pemilik;
        $result['alamat'] = $data_kend->alamat;
        $result['identitas'] = $data_kend->identitas . " - " . $data_kend->no_identitas;
        $result['merk'] = '&nbsp;' . $data_kend->merk;
        $result['tipe'] = '&nbsp;' . $data_kend->tipe;
        $result['nm_komersil'] = '&nbsp;' . $data_kend->nm_komersil;
        $result['isi_silinder'] = '&nbsp;' . $data_kend->isi_silinder;
        $result['daya_motor'] = '&nbsp;' . $data_kend->daya_motor;
        $result['bahan_bakar'] = '&nbsp;' . $data_kend->bahan_bakar;
        $result['tahun'] = '&nbsp;' . $data_kend->tahun;
        $result['no_chasis'] = '&nbsp;' . $data_kend->no_chasis;
        $result['no_mesin'] = '&nbsp;' . $data_kend->no_mesin;
        $result['no_regis'] = '&nbsp;' . $data_kend->no_regis;
        $tgl_sertifikasi = date("d", strtotime($data_kend->tgl_regis));
        $bulan_sertifikasi = date("n", strtotime($data_kend->tgl_regis));
        $thn_sertifikasi = date("Y", strtotime($data_kend->tgl_regis));
        $bln_sertifikasi = Yii::app()->params['bulanArrayInd'][$bulan_sertifikasi - 1];
        $result['tgl_sertifikasi'] = '&nbsp;' . $tgl_sertifikasi . " " . $bln_sertifikasi . " " . $thn_sertifikasi;
        $result['petugas'] = date('d M Y H:i') . " , " . Yii::app()->session['username'];
        $result['ukuran_panjang'] = '&nbsp;' . $data_kend->ukuran_panjang;
        $result['ukuran_lebar'] = '&nbsp;' . $data_kend->ukuran_lebar;
        $result['ukuran_tinggi'] = '&nbsp;' . $data_kend->ukuran_tinggi;
        $result['bagian_belakang'] = '&nbsp;' . $data_kend->bagian_belakang;
        $result['bagian_depan'] = '&nbsp;' . $data_kend->bagian_depan;
        $result['jsumbu1'] = '&nbsp;' . $data_kend->jsumbu1;
        if ($data_kend->ukp != 0) {
            $result['ukq'] = '&nbsp;' . $data_kend->ukq . " / " . $data_kend->ukp;
        } else {
            $result['ukq'] = '&nbsp;' . $data_kend->ukq;
        }

        $result['dimpanjang'] = '&nbsp;' . $data_kend->dimpanjang;
        $result['dimlebar'] = '&nbsp;' . $data_kend->dimlebar;
        $result['dimtinggi'] = '&nbsp;' . $data_kend->dimtinggi;
        $result['karoseri_bahan'] = '&nbsp;' . $data_kend->karoseri_bahan;
        $result['psumbu1'] = '&nbsp;' . $data_kend->psumbu1;
        $result['psumbu2'] = '&nbsp;' . $data_kend->psumbu2;
        $result['kemjbb'] = '&nbsp;' . $data_kend->kemjbb;
        $result['bsumbu1'] = '&nbsp;' . $data_kend->bsumbu1;
        $result['bsumbu2'] = '&nbsp;' . $data_kend->bsumbu2;
        $jumlah_sumbu = intval($data_kend->bsumbu1) + intval($data_kend->bsumbu2);
        $jbi = intval($jumlah_sumbu) + intval($data_kend->kemorang) + intval($data_kend->kembarang);
        $result['jumlah_sumbu'] = '&nbsp;' . $jumlah_sumbu;
        $result['karoseri_duduk'] = '&nbsp;' . $data_kend->karoseri_duduk . " ( " . $data_kend->kemorang . " )";
        $result['kembarang'] = '&nbsp;' . $data_kend->kembarang;
        $result['jbi'] = '&nbsp;' . $jbi;
        $array_1 = array(9, 15, 17, 19, 45); //mikrolet,bus
        $array_2 = array(1, 10, 37, 43, 52, 55, 56); //double cabin
        $id_nm_komersil = $data_kend->id_nm_komersil;
        $jns_kend = $data_kend->jenis;
        if (in_array($id_nm_komersil, $array_1) || $jns_kend == 'M.BIS') {
            //mikrolet,bus
            $mst = floor($data_kend->bsumbu2 + (($data_kend->kembarang + $data_kend->kemorang) * $data_kend->ukq / $data_kend->jsumbu1));
            //            $mst = 123;
        } else if (in_array($id_nm_komersil, $array_2)) {
            //double cabin
            $mst = floor($data_kend->bsumbu2 +
                ($data_kend->kembarang * $data_kend->ukq / $data_kend->jsumbu1) +
                ($data_kend->kemorang * ($data_kend->ukp + ((2 / 5) * $data_kend->ukp2)) / $data_kend->jsumbu1));
            //            $mst = 456;
        } else {
            //mobil barang, taxi
            $mst = floor($data_kend->bsumbu2 +
                ($data_kend->kembarang * $data_kend->ukq / $data_kend->jsumbu1) +
                ($data_kend->kemorang * $data_kend->ukp / $data_kend->jsumbu1));
            //            $mst = 789;
        }
        $result['mst'] = '&nbsp;' . $data_kend->mst;
        echo json_encode($result);
    }

    /*
     * PROVINSI
     * KOTA
     * KECAMATAN
     * KELURAHAN
     */

    public function actionSelectProvinsi()
    {
        $provinsi = $_POST['provinsi'];
        $criteria = new CDbCriteria();
        $criteria->addCondition("id_provinsi = '$provinsi'");
        $criteria->order = 'nama asc';
        $kota = MKota::model()->findAll($criteria);
        $option = '';
        foreach ($kota as $data) :
            $option .= "<option value='$data->id_kota'>$data->nama</pilih>";
        endforeach;

        echo $option;
    }

    public function actionSelectKota()
    {
        $kota = $_POST['kota'];
        $criteria = new CDbCriteria();
        $criteria->addCondition("id_kota = '$kota'");
        $criteria->order = 'nama asc';
        $kecamatan = MKecamatan::model()->findAll($criteria);
        $option = '';
        foreach ($kecamatan as $data) :
            $option .= "<option value='$data->id_kecamatan'>$data->nama</pilih>";
        endforeach;

        echo $option;
    }

    public function actionSelectKecamatan()
    {
        $kecamatan = $_POST['kecamatan'];
        $criteria = new CDbCriteria();
        $criteria->addCondition("id_kecamatan = '$kecamatan'");
        $criteria->order = 'nama asc';
        $kelurahan = MKelurahan::model()->findAll($criteria);
        $option = '';
        foreach ($kelurahan as $data) :
            $option .= "<option value='$data->id_kelurahan'>$data->nama</pilih>";
        endforeach;

        echo $option;
    }
}
