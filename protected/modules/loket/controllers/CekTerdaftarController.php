<?php

class CekTerdaftarController extends Controller
{
	public function filters() {
            return array(
            'Rights', // perform access control for CRUD operations
            );
        }

        public function actionIndex() {
            $this->pageTitle = 'CEK TERDAFTAR';        
            $this->render('cekterdaftar');
	}

	public function actionGetListDataTerdaftar() {
//        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
//        $selectDate = strtoupper($_POST['selectDate']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_daftar';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'DESC';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','')
	    OR replace(LOWER(nama_pemilik),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }        
        $result = VDaftar::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $tgl_retribusi = (!empty($p->tgl_retribusi)) ? date('d/m/Y', strtotime($p->tgl_retribusi)) : date('d/m/Y');
            $tgl_uji = (!empty($p->tgl_uji)) ? date('d/m/Y', strtotime($p->tgl_uji)) : date ('d/m/Y');
            if (($cetak = $p->cetak == true)&&($p->datang=true)){
                if ($lulus = $p->lulus == true){
                    $lulus = "LULUS";
                } else {
                    $lulus = "TIDAK LULUS";
                }
            }elseif ($p->datang==true){
                    $lulus = "BELUM UJI";
            }else{
                    $lulus = "TIDAK DATANG";
            }
            
            $dataJson[] = array(
                "tgl_retribusi" => $tgl_retribusi,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "nama_pemilik" => $p->nama_pemilik,
                "no_chasis" => $p->no_chasis,
                "no_mesin" => $p->no_mesin,
                "nm_uji" => $p->nm_uji,
                "jns_kend" => $p->jns_kend,
                "tgl_uji" => $tgl_uji,
                "status" => $p->status,
                "lulus" => $lulus,                
            );
        }

        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VDaftar::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }
}