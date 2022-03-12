<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BlokirController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }
    
    public function actionIndex() {
        $this->pageTitle = 'Blokir';
        $this->render('blokir');
    }

    public function actionProsesUnBlokir() {
        $id_kendaraan = $_POST['id_kendaraan'];
        $dtKend = TblKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
        $nm_pemilik = explode('-', $dtKend->nama_pemilik);
        $nama_pemilik = $nm_pemilik[1];
        $update = "UPDATE tbl_kendaraan SET nama_pemilik = '$nama_pemilik', blokir='false', keterangan_blokir='' WHERE id_kendaraan = $id_kendaraan";
        Yii::app()->db->createCommand($update)->query();
    }

    public function actionGetListDataBlokir() {
//        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tgl_blokir';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;
        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $criteria->addCondition("blokir = 'true'");
        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }
        $result = TblKendaraan::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_kendaraan" => $p->id_kendaraan,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "nama_pemilik" => $p->nama_pemilik,
                "tgl_blokir" => $p->tgl_blokir==NULL?'':date("d F Y", strtotime($p->tgl_blokir)),
                "keterangan" => $p->keterangan_blokir
            );
        }

        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblKendaraan::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

}
