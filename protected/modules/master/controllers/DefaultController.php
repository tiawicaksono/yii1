<?php

class DefaultController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        $this->pageTitle = 'MASTER DATA';
        $this->render('index');
    }

    /* =====================================================================
     * PENGUJI
      ===================================================================== */

    public function actionPengujiListGrid() {
        $penguji = strtolower($_POST['penguji']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'nama_penguji';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($penguji)) {
            $criteria->addCondition('lower(nama_penguji) like \'%' . $penguji . '%\'');
        }
        $result = TblNamaPenguji::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_namapenguji" => $p->id_nama_penguji . "|penguji",
                "id_nama_penguji" => $p->id_nama_penguji . "|penguji",
                "nama_penguji" => $p->nama_penguji,
                "nrp" => $p->nrp
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblNamaPenguji::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionGetDetailEditPenguji() {
        $id = $_POST['id'];
        $result = TblNamaPenguji::model()->findByPk($id);
        $data['id'] = $result->id_nama_penguji;
        $data['nama'] = $result->nama_penguji;
        $data['nrp'] = $result->nrp;
        $data['status_penguji'] = $result->status_penguji;
        echo json_encode($data);
    }

    public function actionSavePenguji() {
        $id = $_POST['id_penguji'];
        $nrp = strtoupper($_POST['nrp']);
        $penguji = strtoupper($_POST['penguji']);
        if (empty($id)) {
            $data = new TblNamaPenguji();
        } else {
            $data = TblNamaPenguji::model()->findByPk($id);
        }
        $data->nrp = $nrp;
        $data->nama_penguji = $penguji;
        if (!empty($_POST['ttd'])) {
            $data->status_penguji = true;
        } else {
            $data->status_penguji = false;
        }
        $data->save();
    }

    public function actionDeletePenguji() {
        $id = $_POST['id'];
        $sql = "DELETE FROM tbl_nama_penguji WHERE id_nama_penguji=$id";
        Yii::app()->db->createCommand($sql)->execute();
    }

    /* =====================================================================
     * USER
      ===================================================================== */

    public function actionUserListGrid() {
        $username = strtolower($_POST['user']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'username';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($username)) {
            $criteria->addCondition('lower(username) like \'%' . $username . '%\'');
        }
        $result = TblUser::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_user" => $p->id_user . "|user|" . $p->otoritas,
                "iduser" => $p->id_user . "|user",
                "user_name" => $p->username,
                "itemname" => $p->otoritas
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblUser::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionGetDetailEditUser() {
        $id = $_POST['id'];
        $result = TblUser::model()->findByPk($id);
        $data['id'] = $result->id_user;
        $data['username'] = $result->username;
        $data['password'] = $result->password_;
        $data['itemname'] = $result->otoritas;
        echo json_encode($data);
    }

    public function actionDeleteUser() {
        $id = $_POST['id'];
        $itemname = ucwords($_POST['itemname']);
        $sql = "DELETE FROM authassignment WHERE userid=$id AND itemname='$itemname'";
        Yii::app()->db->createCommand($sql)->execute();

        $auth = Authassignment::model()->findAllByAttributes(array('userid' => $id));
        $count = count($auth);
        if ($count == 0) {
            $sql = "DELETE FROM tbl_user WHERE id_user=$id";
            Yii::app()->db->createCommand($sql)->execute();
        }
    }

    public function actionSaveUser() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hak_akses = $_POST['hak_akses'];
        $otoritas = ucwords($hak_akses);
        $kondisi = $_POST['kondisi'];

        if ($kondisi == 'new') {
            $dtUser = TblUser::model()->findByAttributes(array('username' => $username));
            if (empty($dtUser)) {
                $dataUser = new TblUser();
                $dataUser->username = $username;
                $dataUser->password = md5($password);
                $dataUser->otoritas = $hak_akses;
                $dataUser->password_ = $password;
                if ($hak_akses == 'penguji') {
                    $dataUser->prauji = true;
                    $dataUser->emisi = true;
                    $dataUser->pitlift = true;
                    $dataUser->headlight = true;
                    $dataUser->brake = true;
                    $dataUser->gandengan = true;
                    $dataUser->posisi_cis = 'CIS 1';
                }
                if ($dataUser->save()) {
                    $criteria = new CDbCriteria();
                    $criteria->order = 'id_user DESC';
                    $dtUser = TblUser::model()->find($criteria);
                    $id_user = $dtUser->id_user;
                    $sql = "INSERT INTO authassignment(userid,itemname) VALUES ($id_user,'$otoritas')";
                    Yii::app()->db->createCommand($sql)->execute();
                }
            } else {
                $id_user = $dtUser->id_user;
                $sql = "INSERT INTO authassignment(userid,itemname) VALUES ($id_user,'$otoritas')";
                Yii::app()->db->createCommand($sql)->execute();
            }
        } else {
            $id = $_POST['id_user'];
            $dataUser = TblUser::model()->findByPk($id);
            $dataUser->username = $username;
            $dataUser->password = md5($password);
            $dataUser->password_ = $password;
            $dataUser->save();
        }
    }

    /* =====================================================================
     * NAMA KOMERSIL
      ===================================================================== */

    public function actionKomersilListGrid() {
        $komersil = strtolower($_POST['komersil']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'nm_komersil';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($komersil)) {
            $criteria->addCondition('lower(nm_komersil) like \'%' . $komersil . '%\'');
        }
        $result = TblNmKomersil::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_komersil" => $p->id_nm_komersil . "|komersil",
                "komersil" => $p->nm_komersil
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblNmKomersil::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionGetDetailEditKomersil() {
        $id = $_POST['id'];
        $result = TblNmKomersil::model()->findByPk($id);
        $data['id'] = $result->id_nm_komersil;
        $data['nama'] = $result->nm_komersil;
        echo json_encode($data);
    }

    public function actionSaveKomersil() {
        $kondisi = $_POST['kondisi'];
        $id = $_POST['id_komersil'];
        $komersil = strtoupper($_POST['komersil']);
        if ($kondisi == 'new') {
            $data = new TblNmKomersil();
        } else {
            $data = TblNmKomersil::model()->findByPk($id);
        }
        $data->nm_komersil = $komersil;
        $data->save();
    }

    /* =====================================================================
     * JENIS KAROSERI
      ===================================================================== */

    public function actionKaroseriListGrid() {
        $karoseri = strtolower($_POST['karoseri']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'kar_jenis';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($karoseri)) {
            $criteria->addCondition('lower(kar_jenis) like \'%' . $karoseri . '%\'');
        }
        $result = TblKarJenis::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_karoseri" => $p->id_kar_jenis . "|karoseri",
                "karoseri" => $p->kar_jenis
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblKarJenis::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionGetDetailEditKaroseri() {
        $id = $_POST['id'];
        $result = TblKarJenis::model()->findByPk($id);
        $data['id'] = $result->id_kar_jenis;
        $data['nama'] = $result->kar_jenis;
        echo json_encode($data);
    }

    public function actionSaveKaroseri() {
        $kondisi = $_POST['kondisi'];
        $id = $_POST['id_karoseri'];
        $karoseri = strtoupper($_POST['karoseri']);
        if ($kondisi == 'new') {
            $data = new TblKarJenis();
        } else {
            $data = TblKarJenis::model()->findByPk($id);
        }
        $data->kar_jenis = $karoseri;
        $data->save();
    }

    /* =====================================================================
     * BAHAN UTAMA
      ===================================================================== */

    public function actionBahanListGrid() {
        $bahan = strtolower($_POST['bahan']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'kar_bahan';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($bahan)) {
            $criteria->addCondition('lower(kar_bahan) like \'%' . $bahan . '%\'');
        }
        $result = TblKarBahan::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $dataJson[] = array(
                "id_bahan" => $p->id_kar_bahan . "|bahan",
                "bahan" => $p->kar_bahan
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => TblKarBahan::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionGetDetailEditBahan() {
        $id = $_POST['id'];
        $result = TblKarBahan::model()->findByPk($id);
        $data['id'] = $result->id_kar_bahan;
        $data['nama'] = $result->kar_bahan;
        echo json_encode($data);
    }

    public function actionSaveBahan() {
        $kondisi = $_POST['kondisi'];
        $id = $_POST['id_bahan'];
        $bahan = strtoupper($_POST['bahan']);
        if ($kondisi == 'new') {
            $data = new TblKarBahan();
        } else {
            $data = TblKarBahan::model()->findByPk($id);
        }
        $data->kar_bahan = $bahan;
        $data->save();
    }

}
