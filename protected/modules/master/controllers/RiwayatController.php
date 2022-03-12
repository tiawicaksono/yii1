<?php

class RiwayatController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        $this->pageTitle = 'MASTER RIWAYAT';
        $this->render('index');
    }

    public function actionDeleteDoubleRiwayat() {
        $id_riwayat = $_POST['id_riwayat'];
        $data = TblRiwayat::model()->deleteByPk($id_riwayat);
    }
    
    public function actionProsesDeleteKendaraan() {
        $id_kendaraan = $_POST['id_kendaraan'];
        $sqlRiwayat = "DELETE FROM tbl_kendaraan WHERE id_kendaraan = $id_kendaraan";
        Yii::app()->db->createCommand($sqlRiwayat)->execute();
    }

    public function actionGetListDataRiwayat() {
        $textCategory = strtoupper($_POST['textCategory']);
        $criteriaKend = new CDbCriteria();
        $criteriaKend->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        $dataKend = TblKendaraan::model()->find($criteriaKend);
        $idKendaraan = 0;
        if(count($dataKend) != 0){
            $idKendaraan = $dataKend->id_kendaraan;
        }
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tgl_uji';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
        }
        $result = VRiwayat::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_riwayat" => $p->id_riwayat,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "tgl_uji" => date("d F Y", strtotime($p->tgl_uji)),
                "mati_uji" => date("d F Y", strtotime($p->tglmati)),
                "nama_penguji" => $p->nama_penguji,
                "catatan" => $p->catatan,
                "no_chasis" => $p->no_chasis,
                "no_mesin" => $p->no_mesin
            );
        }

        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VRiwayat::model()->count($criteria),
                    'rows' => $dataJson,
                    'id_kendaraan' => $idKendaraan,
                )
        );
        Yii::app()->end();
    }

    public function actionDetailRiwayat() {
        $id = $_POST['id'];
        $result = TblRiwayat::model()->findByPk($id);
        $data['tempat'] = $result->tempat;
        $data['catatan'] = $result->catatan;
        $data['nrp'] = $result->nrp;
        $data['tgl_uji'] = date('d/m/Y', strtotime($result->tgl_uji));
        $hasil_uji = $result->id_hasil_uji;
        if($hasil_uji === null || $hasil_uji == 0 || empty($hasil_uji)){
            $hasil_uji = 0;
        }
        $data['id_hasil_uji'] = $hasil_uji;
        echo json_encode($data);
    } 
    
    public function actionProsesUpdateRiwayat() {
        $id_riwayat = $_POST['id_riwayat'];
        $id_hasil_uji = $_POST['id_hasil_uji'];
        $tempat = strtoupper(POST['tempat']);
        $nrp = $_POST['nrp'];
        $catatan = $_POST['catatan'];
        $date_uji = DateTime::createFromFormat('d/m/Y', $_POST['tgl_uji']);
        $tgl_uji = $date_uji->format('m/d/Y');
        
        $dtPenguji = TblNamaPenguji::model()->findByAttributes(array('nrp' => $nrp));
        $nm_penguji = $dtPenguji->nama_penguji;
        
        $sqlRiwayat = "UPDATE tbl_riwayat SET nrp = '$nrp', nama_penguji = '$nm_penguji', tgl_uji = '$tgl_uji', tempat = '$tempat', catatan = '$catatan' WHERE id_riwayat = $id_riwayat";
        Yii::app()->db->createCommand($sqlRiwayat)->execute();
        
        $sqlHasilUji = "UPDATE tbl_hasil_uji SET nrp = '$nrp', nm_penguji = '$nm_penguji', jdatang = '$tgl_uji' WHERE id_hasil_uji = $id_hasil_uji";
        Yii::app()->db->createCommand($sqlHasilUji)->execute();
    }
    
    public function actionProsesInsertRiwayat() {
        $tempat = strtoupper($_POST['tempat']);
        $nrp = $_POST['nrp'];
        $catatan = $_POST['catatan'];
        $id_kendaraan = $_POST['id_kendaraan'];
        $date_uji = DateTime::createFromFormat('d/m/Y', $_POST['tgl_uji']);
        $tgl_uji = $date_uji->format('m/d/Y');
        
        $dtPenguji = TblNamaPenguji::model()->findByAttributes(array('nrp' => $nrp));
        $nm_penguji = $dtPenguji->nama_penguji;
        
        $sqlRiwayat = "INSERT INTO tbl_riwayat(nrp,nama_penguji,tgl_uji,tempat,catatan,id_kendaraan) VALUES ('$nrp','$nm_penguji','$tgl_uji','$tempat','$catatan',$id_kendaraan)";
        Yii::app()->db->createCommand($sqlRiwayat)->execute();
    }
}
