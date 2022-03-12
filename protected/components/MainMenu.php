<?php

Yii::import('zii.widgets.CPortlet');

class MainMenu extends CPortlet
{

    public function init()
    {
        parent::init();
    }

    protected function renderContent()
    {
        $menu = MMenu::model()->getMenu();
        $this->render('mainMenu', array('menu' => $menu));
    }
}
