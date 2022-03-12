<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->actionHome();
    }

    /**
     * Displays the login page
     */
    public function actionFormChangePassword()
    {
        $this->layout = '//layouts/main_top';
        $this->render('form_change_password');
    }

    public function actionChangePassword()
    {
        $id = $_POST['employee_id'];
        $new_password = md5($_POST['new_password']);
        $sql = "UPDATE tbl_user SET password = '$new_password' WHERE id_user = $id ";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function actionLogin()
    {
        $this->layout = '/';
        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                //                $this->redirect(Yii::app()->user->returnUrl);
                // $this->redirect('http://' . $_SERVER['SERVER_NAME'] . '/pkb/cis');
                $this->redirect(Yii::app()->homeUrl . 'cis/');
            }
        }
        $this->render('main_login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl . 'cis/');
    }

    public function actionHome()
    {
        if (Yii::app()->user->isGuest) {
            $this->actionLogin();
        } else {
            $this->redirect(Yii::app()->homeUrl . 'cis/Pengujian');
        }
    }
}
