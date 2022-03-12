<?php

class PraujiController extends Controller {
    
    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }
    
    /* =====================================================================
     * STATUS PROSES UJI
      ===================================================================== */

    public function actionIndex() {
        $this->pageTitle = 'PRAUJI';
        $this->render('index_prauji');
    }

    public function actionListGrid() {
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $tgl_search = $_POST['tgl_search'];
        $tanggal = date("Y-m-d", strtotime($tgl_search));
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'numerator';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            if ($selectCategory == 'numerator') {
                $criteria->addCondition("$selectCategory = $textCategory");
            } else {
                $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ',''))");
            }
        }
        $criteria->addCondition("jdatang::date = '$tanggal'");
        $result = VCisPraujiAll::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
//            $numerator_hari = sprintf('%03d', $p->numerator_hari);
//            $bln = date('n');
//            $bln_romawi = Yii::app()->params['bulanRomawi'][$bln - 1];
            
            $dataJson[] = array(
                "id_kendaraan" => $p->id_kendaraan,
                "id_hasil_uji" => $p->id_hasil_uji,
                "no_antrian" => $p->no_antrian,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "merk" => $p->merk,
                "tipe" => $p->tipe,
                "tahun" => $p->tahun,
                "bahan_bakar" => $p->bahan_bakar,
                "nm_komersil" => $p->nm_komersil,
                "karoseri_bahan" => $p->karoseri_bahan,
                "karoseri_jenis" => $p->karoseri_jenis,
                "karoseri_jenis" => $p->karoseri_jenis,
                "karoseri_jenis" => $p->karoseri_jenis,
                "numerator" => $p->numerator,
                "numerator_hari" => $p->numerator_hari
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
                array(
                    'total' => VCisPraujiAll::model()->count($criteria),
                    'rows' => $dataJson,
                )
        );
        Yii::app()->end();
    }

    public function actionProses() {
        $idhasil = $_POST['idhasil'];
        $variabel = $_POST['variabel'];
        $posisi = $_POST['posisi'];
        $username = $_POST['username'];
        $query = "select update_cis_prauji('$variabel',$idhasil,'$username');";
        Yii::app()->db->createCommand($query)->execute();
    }

    public function actionLoadImage() {
        $id_kendaraan = $_POST['idkendaraan'];
        $query = "select img1,img2 from tbl_hasil_uji where id_kendaraan=$id_kendaraan order by id_hasil_uji desc limit 2";
        $result = Yii::app()->db->createCommand($query)->queryAll();

        foreach ($result as $row) {
            $data[] = array(
                'image1' => $row['img1'],
                'image2' => $row['img2'],
            );
        };

        echo json_encode($data);
    }
    
    public function actionLainListGrid() {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        $criteria->addCondition("kd_lulus like ('UM%')");
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
    
    public function actionUploadImage() {
        $id_hasil_uji_prauji = $_POST['id_hasil_uji_prauji'];
        require_once Yii::app()->basePath . '/extensions/jquery.fileuploader.php';
        // initialize FileUploader
        $dir = Yii::getPathOfAlias('webroot') . '/downloadsfile/';
        $FileUploader = new FileUploader('files', array(
            'uploadDir' => $dir,
            'title' => 'name',
            'extensions' => ['jpg', 'jpeg', 'png'],
            'editor' => array(
                // image maxWidth in pixels {null, Number}
                'maxWidth' => 600,
                // image maxHeight in pixels {null, Number}
                'maxHeight' => 600,
                // crop image {Boolean}
                'crop' => true,
                // image quality after save {Number}
                'quality' => 100
            ),
        ));

        // call to upload the files
        $data = $FileUploader->upload();

        // if uploaded and success
        if ($data['isSuccess'] && count($data['files']) > 0) {
            $uploadedFiles = $data['files'];

            if (empty($uploadedFiles[0]['name'])) {
                $base64_img1 = '';
            } else {
                $img1 = $uploadedFiles[0]['name'];
                //$imagedata1 = file_get_contents($dir.$img1);	

                $image = imagecreatefromjpeg($dir . $img1);
                $image = imagescale($image, 600);
                ob_start();
                imagejpeg($image);
                $contents = ob_get_contents();
                ob_end_clean();
                //$imagedata1 = file_get_contents($contents);

                $base64_img1 = base64_encode($contents);
                unlink($dir . $img1);
            }

            if (empty($uploadedFiles[1]['name'])) {
                $base64_img2 = '';
            } else {
                $img2 = $uploadedFiles[1]['name'];
                //$imagedata2 = file_get_contents($dir.$img2);

                $image = imagecreatefromjpeg($dir . $img2);
                $image = imagescale($image, 600);
                ob_start();
                imagejpeg($image);
                $contents = ob_get_contents();
                ob_end_clean();
                //$imagedata2 = file_get_contents($contents);

                $base64_img2 = base64_encode($contents);
                unlink($dir . $img2);
            }

            if (empty($uploadedFiles[2]['name'])) {
                $base64_img3 = '';
            } else {
                $img3 = $uploadedFiles[2]['name'];
                //$imagedata3 = file_get_contents($dir.$img3);

                $image = imagecreatefromjpeg($dir . $img3);
                $image = imagescale($image, 600);
                ob_start();
                imagejpeg($image);
                $contents = ob_get_contents();
                ob_end_clean();
                //$imagedata3 = file_get_contents($contents);

                $base64_img3 = base64_encode($contents);
                unlink($dir . $img3);
            }

            if (empty($uploadedFiles[3]['name'])) {
                $base64_img4 = '';
            } else {
                $img4 = $uploadedFiles[3]['name'];
                //$imagedata4 = file_get_contents($dir.$img4);

                $image = imagecreatefromjpeg($dir . $img4);
                $image = imagescale($image, 600);
                ob_start();
                imagejpeg($image);
                $contents = ob_get_contents();
                ob_end_clean();
                //$imagedata4 = file_get_contents($contents);

                $base64_img4 = base64_encode($contents);
                unlink($dir . $img4);
            }

            $query = "update tbl_hasil_uji set img_depan = '$base64_img1', img_kanan = '$base64_img2', img_belakang = '$base64_img3', img_kiri = '$base64_img4' where id_hasil_uji = $id_hasil_uji_prauji";
            $result = Yii::app()->db->createCommand($query)->execute();
        }
    }
    
    public function actionReplaceFile() {
        $this->renderPartial('replace_file');
    }

}
