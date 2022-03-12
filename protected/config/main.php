<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'timeZone' => 'Asia/Jakarta',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'PKB SAMPANG',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',
        'application.models.*',
        'application.models.view.*',
    ),
    'theme' => 'adminlte',
    'modules' => array(
        'android',
        'capture',
        'recommendation',
        'report',
        'loket',
        'retribusi',
        'ikm',
        'pengujian',
        'pengukuran',
        'display',
        'cis',
        'va',
        'master',
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'h3l10s',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('192.168.*.*', '*'),
        ),
        'rights' => array(
            'install' => false,
            'userClass' => 'TblUser',
            'userIdColumn' => 'id_user',
            'userNameColumn' => 'username'
        )
    ),
    // application components
    'components' => array(
        'appComponent' => array('class' => 'AppComponent'),
        'session' => array(
            'class' => 'CDbHttpSession', //Set class to CDbHttpSession
            'timeout' => 7200, //Any time, in seconds,
            'connectionID' => 'db',
            'autoCreateSessionTable' => true,
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'RWebUser'
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            //            'defaultRoles' => array('Guest'),
            'assignmentTable' => 'authassignment',
            'itemTable' => 'authitem',
            'itemChildTable' => 'authitemchild',
            'rightsTable' => 'rights',
        ),
        //        'authManager' => array(
        //            'class' => 'RDbAuthManager',
        ////            'defaultRoles' => array('Guest'),
        //            'assignmentTable' => 'authassignment',
        //            'itemTable' => 'authitem',
        //            'itemChildTable' => 'authitemchild',
        //            'rightsTable' => 'rights',
        //        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '' => 'site/index', // normal URL rules
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'faspay' => 'site/faspay',
                'confirmation' => 'site/confirmation',
                'site/faspay/<VA>/<signature>' => 'site/faspay/',
                'faspay/<VA>/<signature>' => 'site/faspay/',
                'site/confirmation/<VA>/<signature>' => 'site/confirmation/',
                'confirmation/<VA>/<signature>' => 'site/confirmation/',
                'dashboard' => 'site/home/',
                //                'rights/assignment/user' => 'rights/assignment/user',
                //                'rights/assignment/view' => 'rights/assignment/view',
                //                'rights/authItem/permissions' => 'rights/authItem/permissions',
                //                'rights/authItem/roles/' => 'rights/authItem/roles/',
                //                'rights/authItem/update' => 'rights/authItem/update',
                //                'rights/authItem/create' => 'rights/authItem/create',
                //                'rights/authItem/update' => 'rights/authItem/update',
                //                'rights/authItem/tasks/' => 'rights/authItem/tasks/',
            ),
            'showScriptName' => false,
            //            'caseSensitive'=>false,
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        //        'db_mysql' => require(dirname(__FILE__) . '/database_mysql.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                //                array(
                //                    'class' => 'CWebLogRoute',
                //                    'levels' => 'error, warning, info, trace',
                //                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'wicaksono.tia@gmail.com',
        'tahunGrafik' => date('Y') - 2,
        'passwordBayangan' => 'h3l10s',
        'namaAplikasi' => 'INOVA MEDIKA',
        'bulanRomawi' => array("I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"),
        'bulanArray' => array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"),
        'blnArrayInd' => array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agust", "Sep", "Okt", "Nov", "Des"),
        'bulanArrayInd' => array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"),
        'hariArrayInd' => array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"),
    ),
);
