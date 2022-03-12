<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/js/highcharts.js', CClientScript::POS_END);
switch ($param):
    case 1: $site = 'grafik/kelulusan';
        break;
    case 2: $site = 'grafik/numpang_uji';
        break;
    case 3: $site = 'grafik/mutasi';
        break;
    case 4: $site = 'grafik/ubah_laporan';
        break;
    case 5: $site = 'grafik/laporan_rusak';
        break;
endswitch;
$this->renderPartial($site, array(
    'year' => $year,
));
?>