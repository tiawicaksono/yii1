<?php

class DefaultController extends Controller
{

    public function filters()
    {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    /* =====================================================================
     * RETRIBUSI
      ===================================================================== */

    public function actionIndex()
    {
        $this->pageTitle = 'RETRIBUSI';
        $dokter = MPegawai::model()->findAllByAttributes(array('status_pegawai' => 'DOKTER'));
        $this->render('form_retribusi', array(
            'dokter' => $dokter
        ));
    }

    public function actionDetailNik()
    {
        $var_search = strtoupper($_POST['nik']);
        $criteria = new CDbCriteria();
        $criteria->addCondition("replace(LOWER(nik_pasien),' ','') like replace(LOWER('" . $var_search . "'),' ','')");
        $result = MPasien::model()->find($criteria);
        if (!empty($result)) {
            $data = array(
                "nama_pasien" => $result->nama_pasien,
                "nik_pasien" => $result->nik_pasien,
                "alamat_pasien" => $result->alamat_pasien,
                "id_pasien" => $result->id_pasien
            );
        } else {
            $data = array();
        }
        echo json_encode($data);
    }


    public function actionUpdateRetribusi()
    {
        $id_rekam_medis = $_POST['dlg_update_pendaftaran'];
        $data = TblRekamMedis::model()->findByAttributes(array('id_rekam_medis' => $id_rekam_medis));
        $pilih_kategori = $_POST['pilih_kategori'];
        if ($pilih_kategori == 'update_select_tgl_kontrol') {
            $tgl_kontrol = date("m/d/Y", strtotime($_POST['update_tgl_kontrol']));
            $dokter = $data->id_dokter;
        } else {
            $dokter = $_POST['update_dokter'];
            $tgl_kontrol = $data->tanggal_rekam_medis;
        }
        // $data->id_dokter = $dokter;
        // $data->tanggal_rekam_medis = $tgl_kontrol;
        // $data->save();

        $sql = "UPDATE tbl_rekam_medis SET id_dokter=$dokter,tanggal_rekam_medis='$tgl_kontrol' WHERE id_rekam_medis = $id_rekam_medis";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function actionSaveform()
    {
        $form = $_POST['FORM'];
        $petugas = $form['USER_LOGIN'];
        $nik = $form['NIK'];
        $id_pasien = $form['ID_PASIEN'];
        $nama = str_replace("'", "`", strtoupper($form['NAMA']));
        $alamat = str_replace("'", "`", strtoupper($form['ALAMAT']));
        $dokter = $form['DOKTER'];
        $TGL_KONTROL = DateTime::createFromFormat('d/m/Y', $form['TGL_KONTROL']);
        $tgl_kontrol = $TGL_KONTROL->format('Y-m-d');

        if ($id_pasien == 0) {
            // $sql = "INSERT INTO m_pasien VALUES ($nik,$nama,$alamat)";
            // Yii::app()->db->createCommand($sql)->execute();
            $log = new MPasien();
            $log->nik_pasien = $nik;
            $log->nama_pasien = $nama;
            $log->alamat_pasien = $alamat;
            $log->save();

            $id_pasien = $log->id_pasien;
        }

        //JIKA SUDAH TERDAFTAR
        $criteria = new CDbCriteria();
        $criteria->addCondition('id_pasien = ' . $id_pasien);
        $criteria->addCondition("tanggal_rekam_medis =  '$tgl_kontrol'");
        $data = TblRekamMedis::model()->find($criteria);
        if (empty($data)) {
            // echo $dokter . '--' . $id_pasien . '--' . $tgl_kontrol . '--' . $petugas;
            // $log = new TblRekamMedis();
            // $log->id_dokter = $dokter;
            // $log->id_pasien = $id_pasien;
            // $log->tanggal_rekam_medis = $tgl_kontrol;
            // $log->id_pegawai_pedaftaran = $petugas;
            // $log->save();
            $sql = "INSERT INTO tbl_rekam_medis(id_dokter,id_pasien,tanggal_rekam_medis,id_pegawai_pedaftaran) 
            VALUES ($dokter,$id_pasien,'$tgl_kontrol',$petugas)";
            Yii::app()->db->createCommand($sql)->execute();

            $td = 'false';
            $result['ada'] = 'true';
            $result['message'] = "\"" . $nama . '" berhasil didaftarkan';
        } else {
            $result['ada'] = 'false';
            $result['message'] = "\"" . $nama . '" sudah terdaftar hari ini';
        }
        echo json_encode($result);
    }

    public function actionListPendaftaran()
    {
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $selectDate = strtoupper($_POST['selectDate']);
        $validasi = isset($_POST['chooseValidasi']) ? $_POST['chooseValidasi'] : '';
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_rekam_medis';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER($selectCategory),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }
        if (!empty($validasi)) {
            $criteria->addCondition("status_pembayaran = $validasi");
        }
        $criteria->addCondition("tanggal_rekam_medis = TO_DATE('" . $selectDate . "', 'DD-Mon-YY')");
        $result = VPembayaran::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $TGL_KONTROL = DateTime::createFromFormat('Y-m-d', $p->tanggal_rekam_medis);
            $tgl_kontrol = $TGL_KONTROL->format('d F Y');
            $dataJson[] = array(
                "id_rekam_medis" => $p->id_rekam_medis,
                "delete" => $p->id_rekam_medis,
                "update" => $p->id_rekam_medis,
                "id_checkbox" => $p->id_rekam_medis,
                "no_kuitansi" => $p->no_kuitansi,
                "nik_pasien" => $p->nik_pasien,
                "nama_pasien" => $p->nama_pasien,
                "nama_dokter" => $p->nama_dokter,
                "tanggal_rekam_medis" => $tgl_kontrol,
                "nama_petugas_pendaftaran" => $p->nama_petugas_pendaftaran,
                "total_biaya" => "<b>" . number_format($p->biaya_dokter + $p->jumlah_harga_obat, 0, ',', '.') . "</b>"
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
            array(
                'total' => VPembayaran::model()->count($criteria),
                'rows' => $dataJson,
            )
        );
        Yii::app()->end();
    }

    public function actionDeletePendaftaran()
    {
        echo $id = $_POST['id'];
        $model = TblRekamMedis::model()->findByPk($id);
        if ($model)
            $model->delete();
    }

    public function actionGetListSelect()
    {
        $pilih = $_POST['pilih'];
        $option = '';
        $result_dokter = MPegawai::model()->findAllByAttributes(array('status_pegawai' => 'DOKTER'));
        foreach ($result_dokter as $dokter) :
            $option .= "<option value='$dokter->id'>$dokter->nama</pilih>";
        endforeach;
        echo $option;
    }
}
