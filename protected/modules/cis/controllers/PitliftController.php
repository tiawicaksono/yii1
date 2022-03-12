<?php

class PitliftController extends Controller {

    public $layout = '//layouts/main_top';

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionListGrid() {
        $posisi = Yii::app()->session['posisi_cis'];
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'numerator';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $result = VCisPitlift::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_hasil_uji" => $p->id_hasil_uji,
                "no_antrian" => $p->no_antrian,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "merk" => $p->merk,
                "tipe" => $p->tipe,
                "tahun" => $p->tahun,
                "bahan_bakar" => $p->bahan_bakar,
                "nm_komersil" => $p->nm_komersil,
                "karoseri_jenis" => $p->karoseri_jenis,
                "nm_uji" => $p->nm_uji,
                "numerator" => $p->numerator,
                "numerator_hari" => $p->numerator_hari
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VCisPitlift::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionProses() {
        $idhasil = $_POST['id_hasil_uji'];
        $variabel = $_POST['variabel'];
        $username = $_POST['username'];
        
        $query = "select update_cis_pitlift('$variabel',$idhasil,'$username');";
        Yii::app()->db->createCommand($query)->execute();
    }
    
    public function actionLainListGrid() {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $criteria->addCondition("kd_lulus like ('LAIN%')");
        $result = TblKelulusan::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "kd_lulus" => $p->kd_lulus,
                "kelulusan" => $p->kelulusan,
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblKelulusan::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

}
