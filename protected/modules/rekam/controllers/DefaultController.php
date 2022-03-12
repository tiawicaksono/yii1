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
     * STATUS PROSES UJI
      ===================================================================== */

    public function actionIndex()
    {
        $this->pageTitle = 'REKAM MEDIS';
        $criteria = new CDbCriteria();
        $criteria->addCondition("stok_obat > 0");
        $dataObat = VTransaksiKulak::model()->findAll($criteria);
        $this->render('index', array("dataObat" => $dataObat));
    }

    public function actionListPendaftaran()
    {
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $selectDate = strtoupper($_POST['selectDate']);
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
        $criteria->addCondition("status_pembayaran = 'false'");
        $criteria->addCondition("status_rekam_medis = 'false'");
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

    public function actionProses()
    {
        $id_rekam_medis = $_POST['id_rekam_medis'];
        $id_dokter = $_POST['id_dokter'];
        $variabel = $_POST['variabel'];
        $query = "select proses_rekam_medis('$variabel',$id_rekam_medis,'$id_dokter');";
        Yii::app()->db->createCommand($query)->execute();
    }

    public function actionLoadImage()
    {
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


    public function actionUploadImage()
    {
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

    public function actionReplaceFile()
    {
        $this->renderPartial('replace_file');
    }
}
