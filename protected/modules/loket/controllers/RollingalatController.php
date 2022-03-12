<?php

class RollingalatController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }
    
//    public function init() {
//        $this->defaultAction = 'statusRecommendation';
//    }
    
    public function actionIndex() {
        $this->pageTitle = 'ROLLING ALAT';
        $pengujiCis1 = $this->pengujiCis1();
        $pengujiCis2 = $this->pengujiCis2();
        $this->render('index', array('pengujicis1' => $pengujiCis1,'pengujicis2' => $pengujiCis2));
    }
    
    private function pengujiCis1() {
        $criteriacis = new CDbCriteria();
//        $criteriacis->addInCondition('employee_status',array(1));
        $criteriacis->addCondition("otoritas = 'penguji'");
        $criteriacis->addCondition("posisi_cis = 'CIS 1'");
        $criteriacis->order = 'username ASC';
        $pengujiCis = TblUser::model()->findAll($criteriacis);
        return $pengujiCis;
    }
    
    private function pengujiCis2() {
        $criteriacis = new CDbCriteria();
//        $criteriacis->addInCondition('employee_status',array(1));
        $criteriacis->addCondition("otoritas = 'penguji'");
        $criteriacis->addCondition("posisi_cis = 'CIS 2'");
        $criteriacis->order = 'username ASC';
        $pengujiCis = TblUser::model()->findAll($criteriacis);
        return $pengujiCis;
    }
    
    public function actionDisplayPengujiCis1(){
        $pengujiCis1 = $this->pengujiCis1();
        $this->renderPartial('cis1', array('pengujicis1' => $pengujiCis1));
    }
    
    public function actionDisplayPengujiCis2(){
        $pengujiCis2 = $this->pengujiCis2();
        $this->renderPartial('cis2', array('pengujicis2' => $pengujiCis2));
    }
    
    public function actionProsesRolling() {
        $updates = "UPDATE tbl_user SET pitlift = 'false', brake = 'false', headlight = 'false', prauji = 'false', emisi = 'false' WHERE otoritas = 'penguji'";
        Yii::app()->db->createCommand($updates)->query();
        /*
         * PITLIFT
         */
        if (isset($_POST['pitlift1'])) {
            $pitlift1 = $_POST['pitlift1'];
            foreach (array_keys($pitlift1) as $pl1):
                $update = "UPDATE tbl_user SET pitlift = 'true' WHERE id_user = " . $pl1;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
        if (isset($_POST['pitlift2'])) {$pitlift2 = $_POST['pitlift2'];
            foreach (array_keys($pitlift2) as $pl2):
                $update = "UPDATE tbl_user SET pitlift = 'true' WHERE id_user = " . $pl2;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
        
        /*
         * BRAKE
         */
        if (isset($_POST['brake1'])) {
            $brake1 = $_POST['brake1'];
            foreach (array_keys($brake1) as $brk1):
                $update = "UPDATE tbl_user SET brake = 'true' WHERE id_user = " . $brk1;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
        if (isset($_POST['brake2'])) {
            $brake2 = $_POST['brake2'];
            foreach (array_keys($brake2) as $brk2):
                $update = "UPDATE tbl_user SET brake = 'true' WHERE id_user = " . $brk2;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }

        /*
         * HEADLIGHT
         */
        if (isset($_POST['headlight1'])) {
            $headlight1 = $_POST['headlight1'];
            foreach(array_keys($headlight1) as $lamp1):
                $update = "UPDATE tbl_user SET headlight = 'true' WHERE id_user = " . $lamp1;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
        if (isset($_POST['headlight2'])) {
            $headlight2 = $_POST['headlight2'];
            foreach(array_keys($headlight2) as $lamp2):
                $update = "UPDATE tbl_user SET headlight = 'true' WHERE id_user = " . $lamp2;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
        
        /*
         * PRAUJI
         */
        if (isset($_POST['prauji1'])) {
            $prauji1 = $_POST['prauji1'];
            foreach (array_keys($prauji1) as $pra1):
                $update = "UPDATE tbl_user SET prauji = 'true' WHERE id_user = " . $pra1;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
        if (isset($_POST['prauji2'])) {
            $prauji2 = $_POST['prauji2'];
            foreach (array_keys($prauji2) as $pra2):
                $update = "UPDATE tbl_user SET prauji = 'true' WHERE id_user = " . $pra2;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }

        /*
         * EMISI
         */
        if (isset($_POST['emisi1'])) {
            $emisi1 = $_POST['emisi1'];
            foreach (array_keys($emisi1) as $ems1):
                $update = "UPDATE tbl_user SET emisi = 'true' WHERE id_user = " . $ems1;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
        if (isset($_POST['emisi2'])) {
            $emisi2 = $_POST['emisi2'];
            foreach (array_keys($emisi2) as $ems2):
                $update = "UPDATE tbl_user SET emisi = 'true' WHERE id_user = " . $ems2;
                Yii::app()->db->createCommand($update)->query();
            endforeach;
        }
    }
    
    public function actionProsesSwitch() {
//        print_r($_POST);
        $cis = $_POST['cis'];
        if($cis == 'CIS 1'){
            $checkbox = $_POST['checkbox2'];
        }else{
            $checkbox = $_POST['checkbox1'];
        }
        foreach(array_keys($checkbox) as $check):
            $update = "UPDATE tbl_user SET posisi_cis = '" . $cis . "' WHERE id_user = " . $check;
            Yii::app()->db->createCommand($update)->query();
        endforeach;
    }
    
    public function actionProsesSwitchAll() {
        $update1 = "UPDATE tbl_user SET posisi_cis = 'CIS 3' WHERE id_position = 7 AND posisi_cis = 'CIS 1'";
        Yii::app()->db->createCommand($update1)->query();
        
        $update2 = "UPDATE tbl_user SET posisi_cis = 'CIS 1' WHERE id_position = 7 AND posisi_cis = 'CIS 2'";
        Yii::app()->db->createCommand($update2)->query();
        
        $update3 = "UPDATE tbl_user SET posisi_cis = 'CIS 2' WHERE id_position = 7 AND posisi_cis = 'CIS 3'";
        Yii::app()->db->createCommand($update3)->query();
    }

}
