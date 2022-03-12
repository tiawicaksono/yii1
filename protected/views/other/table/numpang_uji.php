<?php 
$bulanArray = Yii::app()->params['bulanArray']; 
$year = Yii::app()->params['tahunGrafik']; 
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2"></th>
            <?php for ($tahun = $year; $tahun <= date('Y'); $tahun++){ ?>
            <th colspan="2" class="tengah"><?php echo $tahun; ?></th>
            <?php } ?>
        </tr>
        <tr>
            <?php for ($tahun = $year; $tahun <= date('Y'); $tahun++){ ?>
            <th class="tengah">NUM</th>
            <th class="tengah">NUK</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $noBln = 1;
        foreach ($bulanArray as $month) {
        ?>
        <tr>
            <th scope="row"><?php echo $month; ?></th>
            <?php
            for ($tahun = $year; $tahun <= date('Y'); $tahun++){
            ?>
            <td>
                <?php 
                $dataSum = TblRetribusi::model()->totalUji($noBln, $tahun, 2);
                echo number_format($dataSum);
                ?>
            </td>
            <td>
                <?php
                $dataSum = TblRetribusi::model()->totalUji($noBln, $tahun, 3);
                echo number_format($dataSum);
                ?>
            </td>
            <?php } ?>
        </tr>
        <?php $noBln++; } ?>
    </tbody>
</table>