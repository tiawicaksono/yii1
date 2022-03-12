<?php

class ValidasiController extends Controller
{

    public function filters()
    {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex()
    {
        $this->pageTitle = 'VALIDASI';
        $this->render('list_validasi');
    }

    public function actionProsesValidChecked()
    {
        $petugas = Yii::app()->session['id_pegawai'];
        $idArray = $_POST['idArray'];
        $kondisi = $_POST['kondisi'];
        foreach ($idArray as $key => $arrayId) :
            $sql = "UPDATE tbl_rekam_medis SET status_pembayaran = $kondisi, id_pegawai_pembayaran = '$petugas' WHERE id_rekam_medis = $arrayId ";
            Yii::app()->db->createCommand($sql)->execute();
        endforeach;
    }

    public function actionProsesValid()
    {
        $petugas = Yii::app()->session['id_pegawai'];
        $id_rekam_medis = $_POST['id'];
        $kondisi = $_POST['kondisi'];
        $sql = "UPDATE tbl_rekam_medis SET status_pembayaran = $kondisi, id_pegawai_pembayaran = '$petugas' WHERE id_rekam_medis = $id_rekam_medis";
        Yii::app()->db->createCommand($sql)->execute();
    }
    public function actionCetakRetribusi($id)
    {
        $this->layout = '//';
        $data = TblRekamMedis::model()->findByAttributes(array('id_rekam_medis' => $id));
        $this->render('cetak_retribusi', array('id' => $id, 'data' => $data));
    }
}
