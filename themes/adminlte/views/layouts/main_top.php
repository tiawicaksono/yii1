<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/icos.ico" type="image/x-icon" />
        <title><?php echo $this->pageTitle; //Yii::app()->params['namaAplikasi']; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php
        $baseThemeUrl = Yii::app()->theme->baseUrl;
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/main_top.css');
        //Bootstrap 3.3.5
        $cs->registerCssFile($baseThemeUrl . '/bootstrap/css/bootstrap.min.css');
        $cs->registerCssFile($baseThemeUrl . '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
        $cs->registerCssFile($baseThemeUrl . '/plugins/iCheck/all.css');
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
//        $cs->registerScriptFile($baseUrl . '/js/jquery.min.js');
        $cs->registerScriptFile($baseThemeUrl . '/plugins/jQuery/jquery-1.9.1.min.js');
        $cs->registerScriptFile($baseThemeUrl . '/jquery-easyui/jquery.easyui.min.js');
        $cs->registerScriptFile($baseThemeUrl . '/jquery-easyui/datagrid-scrollview.js');
        $cs->registerScriptFile($baseThemeUrl . '/plugins/iCheck/icheck.min.js', CClientScript::POS_END);
        //InpuMask
        $cs->registerScriptFile($baseThemeUrl . '/plugins/input-mask/jquery.inputmask.js', CClientScript::POS_END);
        $cs->registerScriptFile($baseThemeUrl . '/plugins/input-mask/jquery.inputmask.date.extensions.js', CClientScript::POS_END);
        $cs->registerScriptFile($baseThemeUrl . '/plugins/input-mask/jquery.inputmask.extensions.js', CClientScript::POS_END);
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

    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <!--<div class="container">-->
                    <div class="navbar-header">
                        <?php // $posisi_cis = Yii::app()->session['posisi_cis']; ?>
                        <!--<span class="navbar-brand"><b><?php // echo $posisi_cis; ?></b></span>-->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/pkb/cis/Pengujian"; ?>">PENGUJIAN</a></li>
                            <?php // if(Yii::app()->session['username'] == 'sidiq'){ ?>
                            <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/pkb/cis/Posisi"; ?>" target="_blank">BANDING KENDARAAN</a></li>
                            <?php // } ?>
                            <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/pkb/cis/Default/formChangePassword"; ?>">UBAH PASSWORD</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="javascript:void(0)">
                                    <img src="<?php echo $baseThemeUrl; ?>/dist/img/L.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo Yii::app()->session['username']; ?></span>
                                </a>
                            </li>
                            <li class="label-danger">
                                <?php echo CHtml::link('<span class="fa fa-power-off"></span> Logout', array('Default/logout')); ?>
                            </li>
                        </ul>
                    </div>
                    <!--</div>-->
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <div class="content-wrapper">
                <?php echo $content; ?>
            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    <b>AdminLTE Version</b> 2.3.0
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2018 <a href="javascript:void(0)"><?php echo Yii::app()->params['namaAplikasi']; ?></a>.</strong> All rights reserved.
            </footer>
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->        
        <div style="display: none;" id="overlay"></div>
        <div style="display: none;" id="popup"></div>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->        

        <script>
            $(function () {
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                  });
            });
        </script>
    </body>
</html>