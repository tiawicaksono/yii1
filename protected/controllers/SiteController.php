<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    //    public function init() {
    //        $this->pageTitle = 'SICTI - Inventory Swap';
    //        $this->defaultAction = 'swapList';
    //    }
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->pageTitle = 'WELCOME';
        if (Yii::app()->user->isGuest) {
            $this->actionLogin();
        } else {
            $this->redirect(array('/retribusi'));
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $this->layout = '/';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
            // $this->redirect(Yii::app()->homeUrl . 'pkb');
        }
        // display the login form
        $this->render('main_login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->returnUrl);
    }

    /**
     * HOME
     * CHANGE PASSWORD
     * Report
     */
    public function actionHome()
    {
        $this->layout = '//layouts/main_android';
        $this->pageTitle = 'DASHBOARD';
        $year = Yii::app()->params['tahunGrafik'];
        ////        $employee = TblEmployee::model()->employeeHome();
        //TOTAL HEADER
        $tgl = date('d-M-y');
        $totalRetribusi = 0;
        $totalKendaraan = 0;
        $totalRetribusiBulan = 0;
        $totalRetribusiTahun = 0;
        $criteriatotalRetribusi = new CDbCriteria();
        $criteriatotalRetribusi->addCondition("tgl_pad = TO_DATE('" . $tgl . "', 'DD-Mon-YY')");
        $dataPad = VLapPad::model()->find($criteriatotalRetribusi);
        if (!empty($dataPad)) {
            $totalRetribusi = $dataPad->total;
        }
        if (!empty($dataPad)) {
            $totalKendaraan = $dataPad->jum_kend;
        }

        $criteriaRetribusiBulan = new CDbCriteria();
        $criteriaRetribusiBulan->select = "SUM(total) AS total";
        $criteriaRetribusiBulan->addCondition("bulan = " . date('n'));
        $criteriaRetribusiBulan->addCondition("tahun = " . date('Y'));
        $dataRetribusiBulan = VLapPad::model()->find($criteriaRetribusiBulan);
        if (!empty($dataRetribusiBulan)) {
            $totalRetribusiBulan = $dataRetribusiBulan->total;
        }

        $criteriaRetribusiTahun = new CDbCriteria();
        $criteriaRetribusiTahun->select = "SUM(total) AS total";
        $criteriaRetribusiTahun->addCondition("tahun = " . date('Y'));
        $dataRetribusiTahun = VLapPad::model()->find($criteriaRetribusiTahun);
        if (!empty($dataRetribusiTahun)) {
            $totalRetribusiTahun = $dataRetribusiTahun->total;
        }
        //        $totalKendaraanU = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'true');
        //        $totalKendaraanBu = TblDaftar::model()->totalKedatanganKendaraan($tgl, 'false');
        ////        $totalKendaraan = $totalKendaraanU + $totalKendaraanBu;

        $mobilBarangU = TblDaftar::model()->totalKendaraan(0, $tgl, 'true');
        $mobilBarangBu = TblDaftar::model()->totalKendaraan(0, $tgl, 'false');
        $mobilPenumpangU = TblDaftar::model()->totalKendaraan(1, $tgl, 'true');
        $mobilPenumpangBu = TblDaftar::model()->totalKendaraan(1, $tgl, 'false');
        $mobilBisU = TblDaftar::model()->totalKendaraan(2, $tgl, 'true');
        $mobilBisBu = TblDaftar::model()->totalKendaraan(2, $tgl, 'false');
        $mobilGandenganU = TblDaftar::model()->totalKendaraan(4, $tgl, 'true') + TblDaftar::model()->totalKendaraan(5, $tgl, 'true');
        $mobilGandenganBu = TblDaftar::model()->totalKendaraan(4, $tgl, 'false') + TblDaftar::model()->totalKendaraan(5, $tgl, 'true');
        //        $totalKendaraan = $mobilBarangU + $mobilBarangBu + $mobilPenumpangU + $mobilPenumpangBu + $mobilBisU + $mobilBisBu;
        //
        //TOTAL KENDARAAN LULUS
        $totalLulusU = TblDaftar::model()->totalKelulusanKendaraan('true', $tgl, 'true');
        $totalLulusBu = TblDaftar::model()->totalKelulusanKendaraan('true', $tgl, 'false');
        //TOTAL KENDARAAN TIDAK LULUS
        $totalTidakLulusU = TblDaftar::model()->totalKelulusanKendaraan('false', $tgl, 'true');
        $totalTidakLulusBu = TblDaftar::model()->totalKelulusanKendaraan('false', $tgl, 'false');

        $this->render('index', array(
            //            'dataEmployee' => $employee,
            'year' => $year,
            'totalRetribusi' => number_format($totalRetribusi),
            'totalRetribusiBulan' => number_format($totalRetribusiBulan),
            'totalRetribusiTahun' => number_format($totalRetribusiTahun),
            'totalKendaraan' => $totalKendaraan,

            'totalLulusU' => $totalLulusU,
            'totalTidakLulusU' => $totalTidakLulusU,
            'totalLulusBu' => $totalLulusBu,
            'totalTidakLulusBu' => $totalTidakLulusBu,

            'mobilBarangU' => $mobilBarangU,
            'mobilBarangBu' => $mobilBarangBu,
            'mobilPenumpangU' => $mobilPenumpangU,
            'mobilPenumpangBu' => $mobilPenumpangBu,
            'mobilBisU' => $mobilBisU,
            'mobilBisBu' => $mobilBisBu,
            'mobilGandenganU' => $mobilGandenganU,
            'mobilGandenganBu' => $mobilGandenganBu,
        ));
    }

    public function actionFormChangePassword()
    {
        $this->pageTitle = 'UBAH PASSWORD';
        $this->render('form_change_password');
    }

    public function actionChangePassword()
    {
        $id = $_POST['employee_id'];
        $new_password = md5(strtolower($_POST['new_password']));
        $sql = "UPDATE tbl_user SET password = '$new_password' WHERE id_user = $id ";
        Yii::app()->db->createCommand($sql)->execute();
    }
}
