<?php

Yii::import('zii.widgets.CPortlet');

class MainMenuEdit extends CPortlet {

    public function init() {
        parent::init();
    }

    protected function renderContent() {
        $menu = TblMenu::model()->getMenu();
        $this->render('mainMenuEdit', array('menu' => $menu));
    }

}
