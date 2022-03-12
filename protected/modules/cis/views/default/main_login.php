<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="manifest" href="<?php echo Yii::app()->baseUrl; ?>/js/manifest.json" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/icos.ico" type="image/x-icon" /> 
        <title><?php echo Yii::app()->params['namaAplikasi']; ?></title>
        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/login/zice.style.css');
        $cs->registerCssFile($baseUrl . '/css/login/icon.css');
        $cs->registerCssFile($baseUrl . '/css/login/tipsy.css');

        $cs->registerScriptFile($baseUrl . '/js/jquery.min.js', CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl . '/js/login/jquery-jrumble.js', CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl . '/js/login/jquery.tipsy.js', CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl . '/js/login/iphone.check.js', CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl . '/js/login/login.js', CClientScript::POS_END);
        ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            html {
                background-image: none;
            }
            label.iPhoneCheckLabelOn span {
                padding-left:0px
            }
            #versionBar {
                background-color:#212121;
                position:fixed;
                width:100%;
                height:35px;
                bottom:0;
                left:0;
                text-align:center;
                line-height:35px;
                z-index:11;
                -webkit-box-shadow: black 0px 10px 10px -10px inset;
                -moz-box-shadow: black 0px 10px 10px -10px inset;
                box-shadow: black 0px 10px 10px -10px inset;
            }
            .copyright{
                text-align:center; font-size:10px; color:#CCC;
            }
            .copyright a{
                color:#A31F1A; text-decoration:none
            }    
        </style>
    </head>
    <body>

        <div id="alertMessage"></div>
        <div id="successLogin"></div>
        <div class="text_success">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/loader_green.gif" alt="ziceAdmin" />
            <span>Please wait</span>
        </div>

        <div id="login">
            <div class="ribbon"></div>
            <div class="inner">
                <div class="logo">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/dishub.png" width="95px" />
                </div>
                <div class="formLogin" style="margin-top:50px">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'formLogin',
                        'htmlOptions' => array(
                            'name' => 'formLogin',
                        ),
                        'enableClientValidation' => true,
                        'enableAjaxValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                            'validateOnChange' => true,
                        ),
                    ));
                    ?>
                    <div class="tip">
                        <?php echo $form->textField($model, 'username', array('id' => 'username', 'title' => 'username', 'autofocus' => true)); ?>
                    </div>
                    <div class="tip">
                        <?php echo $form->passwordField($model, 'password', array('id' => 'password', 'title' => 'password')); ?>
                    </div>
                    <div class="loginButton">
                        <div style="float:right; padding:3px 0; margin-right:-12px;">
                            <div> 
                                <ul class="uibutton-group">
                                    <li>
                                        <input style="padding:5px 10px 5px 10px; cursor: pointer" type="submit" name="submit" id="but_login" value="Login" class="uibutton normal" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="shadow"></div>
        </div>

        <!--Login div-->
        <div class="clear"></div>
        <div id="versionBar">
            <div class="copyright"> 
                &copy; Copyright 2018  All Rights Reserved 
                <span class="tip">
                    <a href="javascript:void(0)"><?php echo Yii::app()->params['namaAplikasi']; ?></a>
                </span> 
            </div>
            <!-- // copyright-->
        </div>
    </body>
</html>