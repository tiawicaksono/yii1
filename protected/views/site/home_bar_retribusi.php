<script type="text/javascript">
    $(document).ready(function($) {
        $('#containerRetribusi').highcharts({
            title: {
                text: '',
                //                x: -20
            },
            subtitle: {
                text: '',
                //                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Retribusi'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
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
            //            legend: {
            //                layout: 'vertical',
            //                align: 'right',
            //                verticalAlign: 'middle',
            //                borderWidth: 0
            //            },
            series: [
                <?php
                //            $year = date('Y') - 2;
                for ($tahun = $year; $tahun <= date('Y'); $tahun++) :
                ?> {
                        name: '<?php echo $tahun; ?>',
                        data: [
                            <?php
                            for ($bln = 1; $bln <= 12; $bln++) :
                                $criteria = new CDbCriteria();
                                $criteria->addCondition("tahun =" . $tahun);
                                $criteria->addCondition("bulan =" . $bln);
                                $dataSum = VLapPad::model()->find($criteria);
                                if (empty($dataSum)) {
                                    echo '0,';
                                } else {
                                    echo $dataSum->total . ', ';
                                }
                            endfor;
                            ?>
                        ]
                    },
                <?php endfor; ?>
            ]
        });
    });
</script>
<div id="containerRetribusi" style="min-width: 310px; height: 310px; margin: 0 auto"></div>