<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/js/highcharts.js', CClientScript::POS_END);

$blnThn = date("m-Y", strtotime($tgl));
$explodeBlnThn = explode('-', $blnThn);

$month = $explodeBlnThn[0];
$year = $explodeBlnThn[1];

$start_date = "01-" . $month . "-" . $year;
$start_time = strtotime($start_date);
$end_time = strtotime("+1 month", $start_time);

for ($i = $start_time; $i < $end_time; $i+=86400) {
    $list[] = date('j', $i);
}
?>
<script type="text/javascript">
    $(document).ready(function ($) {
        $('#chartPemakaianBukuUji').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    <?php
                    foreach ($list as $tanggal):
                    echo "'".$tanggal."',";           
                    endforeach;
                    ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span>',
                pointFormat: '<table><tr>' +
                        '<td style="color:{series.color};padding:0"><b>{series.name} : </b></td>' +
                        '<td style="padding:0">{point.y:.0f}</td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            credits: {
                enabled: false
            },
            series: [
            <?php
            $dataUji = TblUji::model()->getPemakaianBukuUji();
            foreach ($dataUji as $data) :
            ?>
                {
                    name: '<?php echo $data->nm_uji; ?>',
                    data: [
                    <?php
                    foreach ($list as $tanggal):
                        $tglBlnThn = $tanggal . "-" . $tgl;
                        $criteria = TblBuku::model()->criteriaReportUjiPertama($tglBlnThn, $data->id_uji);
                        $count = TblBuku::model()->count($criteria);
                        echo $count . ', ';
                    endforeach;
                    ?>
                    ]
                },
            <?php endforeach; ?>
            ]
        });
    });
</script>
<div id="chartPemakaianBukuUji" style="min-width: 310px; height: 310px; margin: 0 auto"></div>