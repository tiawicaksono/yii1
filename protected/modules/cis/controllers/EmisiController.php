<?php

class EmisiController extends Controller {

    public $layout = '//layouts/main_top';

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

//    public function actionIndex() {
//        $this->pageTitle = 'Emisi';
//        $this->render('index');
//    }

    public function actionReloadData() {
        $tahun_kendaraan = $_POST['tahun_kendaraan'];
        $tahun_sekarang = date('Y');

        if ($tahun_kendaraan >= 2010) {
            $emdiesel = rand(10, 15);
        } else {
            $emdiesel = rand(16, 25);
        }
        if ($tahun_kendaraan >= 2007) {
            $emco = $this->random(0.5, 1);
            $emhc = rand(50, 100);
        } else {
            $emco = $this->random(1, 2);
            $emhc = rand(300, 600);
        }
        $data['solar'] = $emdiesel;
        $data['ems_co'] = $emco;
        $data['ems_hc'] = $emhc;

        echo json_encode($data);
    }

//    public function countDecimals($x) {
//        return strlen(substr(strrchr($x + "", "."), 1));
//    }

    public function random($min, $max, $mul = 10) {
//        $decimals = max($this->countDecimals($min), $this->countDecimals($max));
//        $factor = pow(10, $decimals);
//        return rand($min * $factor, $max * $factor) / $factor;
        return mt_rand($min * $mul, $max * $mul) / $mul;
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
//        $criteria->addCondition("posisi = '$posisi'");
        $result = VCisEmisi::model()->findAll($criteria);
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
                    'total' => VCisEmisi::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionProses() {
        $idhasil = $_POST['id_hasil_uji'];
        $variabel = $_POST['variabel'];
        $posisi = $_POST['cis'];
        $username = $_POST['username'];
        $username = Yii::app()->session['username'];

        $query = "select update_cis_smoke('$variabel',$idhasil,'$username')";
        Yii::app()->db->createCommand($query)->execute();
    }

}
