<?php

class RemGandenganController extends Controller {

    public $layout = '//layouts/main_top';
    
    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }
    
//    public function actionIndex() {
//        $this->pageTitle = 'Rem';
//        $this->render('index');
//    }
    
    public function actionReloadData() {
        $tahun_kendaraan = $_POST['tahun_kendaraan'];
        $tahun_sekarang = date('Y');
        
        if(($tahun_sekarang - $tahun_kendaraan) <= 5){
            $sumbu1 = rand(75, 80);
            $sumbu2 = rand(75, 80);
            $sumbu3 = rand(75, 80);
            $sumbu4 = rand(75, 80);
            $selsumbu1 = rand(2,3);
            $selsumbu2 = rand(2,3);
            $selsumbu3 = rand(2,3);
            $selsumbu4 = rand(2,3);
        }else{
            $sumbu1 = rand(70, 75);
            $sumbu2 = rand(70, 75);
            $sumbu3 = rand(70, 75);
            $sumbu4 = rand(70, 75);
            $selsumbu1 = rand(3,4);
            $selsumbu2 = rand(3,4);
            $selsumbu3 = rand(3,4);
            $selsumbu4 = rand(3,4);
        }
        $data['bsb1'] = $sumbu1;
        $data['bsb2'] = $sumbu2;
        $data['bsb3'] = $sumbu3;
        $data['bsb4'] = $sumbu4;
        $data['bsel1'] = $selsumbu1;
        $data['bsel2'] = $selsumbu2;
        $data['bsel3'] = $selsumbu3;
        $data['bsel4'] = $selsumbu4;
        
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

    public function actionListGrid() {
        $kategori = $_POST['textCategory'];
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'numerator_hari';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $result = VCisBrakeGandengan::model()->findAll($criteria);
        
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
                "nm_komersil" => $p->nm_komersil,
                "konsumbu" => $p->konsumbu,
                "bsumbu1" => $p->bsumbu1,
                "bsumbu2" => $p->bsumbu2,
                "bsumbu3" => $p->bsumbu3,
                "bsumbu4" => $p->bsumbu4,
                "id_jns_kend" => $p->id_jns_kend,
                "nm_uji" => $p->nm_uji,
                "numerator" => $p->numerator,
                "numerator_hari" => $p->numerator_hari
            );
        }
        header('Content-Type: application/json');
            echo CJSON::encode(
                array(
                    'total' => VCisBrakeGandengan::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }
    
    public function actionProses() {
        $idhasil = $_POST['id_hasil_uji'];
        $variabel = $_POST['variabel'];
        $username = $_POST['username'];
        $kategori_rem = $_POST['kategori_rem'];
        if($kategori_rem == 'gandengan'){
            $sql = "UPDATE tbl_hasil_uji SET smoke=true,lulus_smoke=true,pitlift=true,lulus_pitlift=true,lampu=true,lulus_lampu=true where id_hasil_uji=$idhasil";
            Yii::app()->db->createCommand($sql)->execute();
        }
        $query = "select update_cis_brake('$variabel',$idhasil,'$username');";
        Yii::app()->db->createCommand($query)->execute();
        
    }

}
