<?php

class RekomController extends Controller
{

    public function filters()
    {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex()
    {
        $this->pageTitle = 'REKOMENDASI';
        $this->render('status_rekomendasi');
    }

    public function actionListGridRekom()
    {
        $tgl_pengajuan_rekom = $_POST['tgl_pengajuan_rekom'];
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_retribusi';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->addCondition("tgl_rekom = TO_DATE('" . $tgl_pengajuan_rekom . "', 'DD-Mon-YY')");
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $result = TblRekom::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataKendaraan = TblKendaraan::model()->findByAttributes(array('id_kendaraan' => $p->id_kendaraan));
            $dtRetribusi = VValidasi::model()->findByAttributes(array('id_kendaraan' => $p->id_kendaraan, 'tgl_retribusi' => $p->tgl_rekom));

            $dataJson[] = array(
                "id_kendaraan_rekom_print" => $p->id_kendaraan . "_" . $p->id_rekom . "_" . $dtRetribusi->id_uji,
                "id_rekom_proses" => $p->id_rekom,
                "no_uji" => $dataKendaraan->no_uji,
                "no_kendaraan" => $dataKendaraan->no_kendaraan,
                "pemilik" => $dataKendaraan->nama_pemilik,
                "alamat" => $dataKendaraan->alamat,
                "keterangan" => $dtRetribusi->nm_uji
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
            array(
                'total' => TblRekom::model()->count($criteria),
                'rows' => $dataJson,
            )
        );
        Yii::app()->end();
    }

    public function actionPrintRekom($id_kendaraan, $id_rekom, $ttd, $id_uji)
    {
        $this->layout = '//';
        $dtRekom = TblRekom::model()->findByPk($id_rekom);
        $dtRekom->print_rekom = true;
        $dtRekom->save();
        /**
         * GET NO SURAT
         */
        $thn = date('Y');
        $criteria = new CDbCriteria;
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_rekom) =" . $thn);
        $criteria->select = 'max(no_surat_mutke) AS no_surat_mutke, max(no_surat_numke) AS no_surat_numke, max(no_surat) AS no_surat';
        $rowData = TblRekom::model()->find($criteria);
        if ($id_uji == 5 || $id_uji == 3) {
            if ($id_uji == 5) {
                //MUTASI KELUAR
                if (empty($dtRekom->no_surat_mutke) || ($dtRekom->no_surat_mutke == 0)) {
                    $no_surat = $rowData['no_surat_mutke'] + 1;
                } else {
                    $no_surat = $dtRekom->no_surat_mutke;
                }
                $dtRekom->no_surat_mutke = $no_surat;
                $dtRekom->no_surat_numke = 0;
                $dtRekom->no_surat = 0;
                $dtRekom->save();
            } else {
                //NUMPANG KELUAR
                if (empty($dtRekom->no_surat_numke) || ($dtRekom->no_surat_numke == 0)) {
                    $no_surat = $rowData['no_surat_numke'] + 1;
                } else {
                    $no_surat = $dtRekom->no_surat_numke;
                }
                $dtRekom->no_surat_mutke = 0;
                $dtRekom->no_surat_numke = $no_surat;
                $dtRekom->no_surat = 0;
                $dtRekom->save();
            }
            $this->render('print_mutke_numke', array('id_kendaraan' => $id_kendaraan, 'id_rekom' => $id_rekom, 'id_uji' => $id_uji, 'ttd' => $ttd));
        } else {
            //UP, UB, US, MM
            if (empty($dtRekom->no_surat) || ($dtRekom->no_surat == 0)) {
                $no_surat = $rowData['no_surat'] + 1;
            } else {
                $no_surat = $dtRekom->no_surat;
            }
            $dtRekom->no_surat_mutke = 0;
            $dtRekom->no_surat_numke = 0;
            $dtRekom->no_surat = $no_surat;
            $dtRekom->save();
            $this->render('print_rekom', array('id_kendaraan' => $id_kendaraan, 'id_rekom' => $id_rekom, 'ttd' => $ttd, 'id_uji' => $id_uji));
        }
    }

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

    public function actionGetDetailDataRekom()
    {
        $id_rekom = $_POST['id_rekom'];
        $dtRekom = TblRekom::model()->findByPk($id_rekom);
        $dtKendaraan = TblKendaraan::model()->findByAttributes(array('id_kendaraan' => $dtRekom->id_kendaraan));
        $data['id_rekom'] = $id_rekom;
        $data['no_uji'] = $dtKendaraan->no_uji;
        $data['no_kendaraan'] = $dtKendaraan->no_kendaraan;
        //MUTASI KELUAR
        $data['mutasi_keluar'] = $dtRekom->mutke;
        $data['nik_baru'] = $dtRekom->nik_baru;
        $data['pemilik_baru'] = $dtRekom->pemilik_baru;
        $data['alamat_baru'] = $dtRekom->alamat_baru;
        $data['id_provinsi_mutke'] = $dtRekom->id_provinsi_mutke;
        $data['id_kota_mutke'] = $dtRekom->id_kota_mutke;

        //NUMPANG KELUAR;
        $data['numpang_keluar'] = $dtRekom->numke;
        $data['id_provinsi_numke'] = $dtRekom->id_provinsi_numke;
        $data['id_kota_numke'] = $dtRekom->id_kota_numke;

        //MUTASI MASUK
        // $data['mutasi_masuk'] = $dtRekom->mutmasuk;
        // $data['id_provinsi_mutmas'] = $dtRekom->id_provinsi_mutmas;
        // $data['id_kota_mutmas'] = $dtRekom->id_kota_mutmas;
        // if (empty($dtRekom->tgl_rekom_mutmas)) {
        //     $data['tgl_rekom_mutmasuk'] = date("d-M-Y");
        // } else {
        //     $data['tgl_rekom_mutmasuk'] = date("d-M-Y", strtotime($dtRekom->tgl_rekom_mutmas));
        // }
        // $data['no_rekom_mutmasuk'] = $dtRekom->no_rekom_mutmasuk;

        //UBAH SIFAT
        // $data['ubah_sifat'] = $dtRekom->ubhsifat;
        // $data['ket_ubah_sifat'] = $dtRekom->ket_ubah_sifat;

        //UBAH BENTUK
        $data['ubah_bentuk'] = $dtRekom->ubhbentuk;
        $data['ket_ubah_bentuk'] = $dtRekom->ket_ubah_bentuk;

        //UJI PERTAMA
        // $data['uji_pertama'] = $dtRekom->uji_pertama;
        echo json_encode($data);
    }

    public function actionSaveRekom()
    {
        $checkbox_mutke = false;
        $checkbox_mutmas = false;
        $checkbox_numke = false;
        $checkbox_ubah_bentuk = false;
        $checkbox_ubah_sifat = false;

        if (!empty($_POST['checkbox_mutke'])) {
            $checkbox_mutke = true;
        }
        if (!empty($_POST['checkbox_mutmas'])) {
            $checkbox_mutmas = true;
        }
        if (!empty($_POST['checkbox_numke'])) {
            $checkbox_numke = true;
        }
        if (!empty($_POST['checkbox_ubah_bentuk'])) {
            $checkbox_ubah_bentuk = true;
        }
        if (!empty($_POST['checkbox_ubah_sifat'])) {
            $checkbox_ubah_sifat = true;
        }
        $id_rekom = $_POST['id_rekom'];

        //mutasi keluar
        $nik_baru = $_POST['nik_baru'];
        $pemilik_baru = $_POST['pemilik_baru'];
        $alamat_baru = $_POST['alamat_baru'];
        $propinsi_mutke = '';
        $kota_mutke = '';
        if (!empty($_POST['propinsi_mutke'])) {
            $propinsi_mutke = $_POST['propinsi_mutke'];
        }
        if (!empty($_POST['kota_mutke'])) {
            $kota_mutke = $_POST['kota_mutke'];
        }

        //numpang keluar
        $propinsi_numke = '';
        $kota_numke = '';
        if (!empty($_POST['propinsi_numke'])) {
            $propinsi_numke = $_POST['propinsi_numke'];
        }
        if (!empty($_POST['kota_numke'])) {
            $kota_numke = $_POST['kota_numke'];
        }

        //mutasi masuk
        // $no_surat_rekom = $_POST['no_surat_rekom'];
        // $tgl_surat_rekom = $_POST['tgl_surat_rekom'];
        // $propinsi_mutmas = '';
        // $kota_mutmas = '';
        // if (!empty($_POST['propinsi_mutmas'])) {
        //     $propinsi_mutmas = $_POST['propinsi_mutmas'];
        // }
        // if (!empty($_POST['kota_mutmas'])) {
        //     $kota_mutmas = $_POST['kota_mutmas'];
        // }

        //ubah bentuk
        $keterangan_ubah_bentuk = $_POST['keterangan_ubah_bentuk'];

        //ubah sifat
        // $keterangan_ubah_sifat = $_POST['keterangan_ubah_sifat'];

        $update = TblRekom::model()->findByPk($id_rekom);

        //===============================================================

        //mutasi keluar
        $update->nik_baru = $nik_baru;
        $update->pemilik_baru = strtoupper($pemilik_baru);
        $update->alamat_baru = strtoupper($alamat_baru);
        $update->id_provinsi_mutke = $propinsi_mutke;
        $update->id_kota_mutke = $kota_mutke;
        $update->mutke = $checkbox_mutke;
        //mutasi masuk
        // $update->id_provinsi_mutmas = $propinsi_mutmas;
        // $update->id_kota_mutmas = $kota_mutmas;
        // $update->mutmasuk = $checkbox_mutmas;
        // $update->no_rekom_mutmasuk = $no_surat_rekom;
        // $update->tgl_rekom_mutmas = $tgl_surat_rekom;
        //numpang keluar
        $update->id_provinsi_numke = $propinsi_numke;
        $update->id_kota_numke = $kota_numke;
        $update->numke = $checkbox_numke;
        //ubah bentuk
        $update->ket_ubah_bentuk = ucwords(strtolower($keterangan_ubah_bentuk));
        $update->ubhbentuk = $checkbox_ubah_bentuk;
        //ubah sifat
        // $update->ket_ubah_sifat = ucwords(strtolower($keterangan_ubah_sifat));
        // $update->ubhsifat = $checkbox_ubah_sifat;
        //no surat
        //        $update->no_surat_mutke = $no_surat_mutke;
        //        $update->no_surat_numke = $no_surat_numke;
        //        $update->no_surat = $no_surat_lain;
        $update->save();
    }
}
