<?php
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
<div class="table-responsive">
    <table id="reportListGrid" class="table table-bordered">
        <thead>
            <tr>
                <th>STATUS</th>
                <?php
                foreach ($list as $tanggal):
                    echo "<th class='tengah'>" . $tanggal . "</th>";
                endforeach;
                ?>
                <th class="tengah">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataUji = TblUji::model()->getPemakaianBukuUji();
            foreach ($dataUji as $data) {
                ?>
                <tr>
                    <th scope="row"><?php echo $data->nm_uji; ?></th>
                    <?php
                    $jmlCount = 0;
                    foreach ($list as $tanggal):
                        $tglBlnThn = $tanggal . "-" . $tgl;
                        $criteria = TblBuku::model()->criteriaReportUjiPertama($tglBlnThn, $data->id_uji);
                        $count = TblBuku::model()->count($criteria);
                        echo "<td class='tengah'>" . $count . "</td>";
                        $jmlCount += $count;
                    endforeach;
                    ?>
                    <td class="tengah"><?php echo $jmlCount; ?></td>
                </tr>
            <?php } ?>
            <tr class="bg-success">
                <th scope="row">Jumlah</th>
                <?php
                $jmlCount = 0;
                foreach ($list as $tanggal):
                    $tglBlnThn = $tanggal . "-" . $tgl;
                    $jml = TblBuku::model()->criteriaCountBukuUji($tglBlnThn);
                    echo "<td class='tengah'>".$jml."</td>";
                    $jmlCount += $jml;
                endforeach;
                ?>
                <th class="tengah"><?php echo $jmlCount; ?></th>
            </tr>
        </tbody>
    </table>
</div>