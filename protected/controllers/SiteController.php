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
