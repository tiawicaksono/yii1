<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->pageTitle; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/ico.ico" type="image/x-icon" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    $baseThemeUrl = Yii::app()->theme->baseUrl;
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($baseUrl . '/css/main.css');
    //Bootstrap 3.3.5
    $cs->registerCssFile($baseThemeUrl . '/bootstrap/css/bootstrap.min.css');
    $cs->registerCssFile($baseThemeUrl . '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
    //Font Awesome
    $cs->registerCssFile($baseThemeUrl . '/bootstrap/css/font-awesome.min.css');
    //Ionicons
    $cs->registerCssFile($baseThemeUrl . '/bootstrap/css/ionicons.min.css');
    $cs->registerCssFile($baseThemeUrl . '/bootstrap/css/bootstrap-datepicker.min.css');
    //Theme style
    $cs->registerCssFile($baseThemeUrl . '/dist/css/AdminLTE.min.css');
    /* AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. */
    $cs->registerCssFile($baseThemeUrl . '/dist/css/skins/skin-blue.min.css');
    //jQuery Easyui
    $cs->registerCssFile($baseThemeUrl . '/jquery-easyui/themes/gray/easyui.css');
    $cs->registerCssFile($baseThemeUrl . '/jquery-easyui/themes/icon.css');
    //jQuery Easyui
    $cs->registerScriptFile($baseUrl . '/js/jquery.min.js');
    $cs->registerScriptFile($baseThemeUrl . '/plugins/jQuery/jquery-1.9.1.min.js');
    $cs->registerScriptFile($baseThemeUrl . '/jquery-easyui/jquery.easyui.min.js');
    //Bootstrap 3.3.5
    $cs->registerScriptFile($baseThemeUrl . '/bootstrap/js/bootstrap.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseThemeUrl . '/bootstrap/js/bootstrap-datepicker.js', CClientScript::POS_END);
    //Bootstrap WYSIHTML5
    $cs->registerScriptFile($baseThemeUrl . '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js', CClientScript::POS_END);
    //SlimScroll
    $cs->registerScriptFile($baseThemeUrl . '/plugins/slimScroll/jquery.slimscroll.min.js', CClientScript::POS_END);
    //FastClick
    $cs->registerScriptFile($baseThemeUrl . '/plugins/fastclick/fastclick.min.js', CClientScript::POS_END);
    //AdminLTE App
    $cs->registerScriptFile($baseThemeUrl . '/dist/js/app.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/main.js', CClientScript::POS_END);
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!--        <div class="wrapper">
                    <div class="content-wrapper">-->
    <?php echo $content; ?>
    <!--            </div>
                </div>-->
    <div style="display: none;" id="overlay"></div>
    <div style="display: none;" id="popup"></div>
</body>

</html>