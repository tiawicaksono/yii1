<script type="text/javascript">
    $(document).ready(function ($) {
        $('#containerKendaraanLls').highcharts({
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
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
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
for ($tahun = $year; $tahun <= date('Y'); $tahun++):
    ?>
                    {
                        name: '<?php echo $tahun; ?>',
                        data: [
    <?php
    for ($bln = 1; $bln <= 12; $bln++):
        $dataSum = TblDaftar::model()->totalKelulusanKendaraanPerBulan('true', $bln, $tahun, '', '');
        echo $dataSum . ', ';
    endfor;
    ?>
                        ]
                    },
<?php endfor; ?>
            ]
        });
    });
</script>
<div id="containerKendaraanLls" style="min-width: 310px; height: 310px; margin: 0 auto"></div>