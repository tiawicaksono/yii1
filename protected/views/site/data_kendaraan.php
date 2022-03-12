<div class="table-responsive">
    <table class="table no-margin no-padding">
        <thead>
            <tr>
                <th rowspan="2" class="tengah">Jenis Kendaraan</th>
                <th style="text-align: center" colspan="2">Jumlah Kendaraan</th>
            </tr>
            <tr>
                <th style="text-align: center">Umum</th>
                <th style="text-align: center">B.Umum</th>
                <th style="text-align: center">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mobil Barang</td>
                <td align="center"><?php echo $mbu = $mobilBarangU; ?></td>
                <td align="center"><?php echo $mbbu = $mobilBarangBu; ?></td>
                <td align="center"><?php echo $mbu+$mbbu; ?></td>
            </tr>
            <tr>
                <td>Mobil Bis</td>
                <td align="center"><?php echo $mbisu = $mobilBisU; ?></td>
                <td align="center"><?php echo $mbisbu = $mobilBisBu; ?></td>
                <td align="center"><?php echo $mbisu+$mbisbu; ?></td>
            </tr>
            <tr>
                <td>Mobil Penumpang</td>
                <td align="center"><?php echo $mpu = $mobilPenumpangU; ?></td>
                <td align="center"><?php echo $mpbu = $mobilPenumpangBu; ?></td>
                <td align="center"><?php echo $mpu+$mpbu; ?></td>
            </tr>
            <tr>
                <td>Mobil Gandengan / Tempelan</td>
                <td align="center"><?php echo $mgu = $mobilGandenganU; ?></td>
                <td align="center"><?php echo $mgbu = $mobilGandenganBu; ?></td>
                <td align="center"><?php echo $mgu+$mgbu; ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Total Kendaraan Terdaftar</th>
                <th style="text-align: center">
                    <?php
                    echo $totalUmum = $mbu + $mbisu + $mpu + $mgu;
                    ?>
                </th>
                <th style="text-align: center">
                    <?php
                    echo $totalBUmum = $mbbu + $mbisbu + $mpbu + $mgbu;
                    ?>
                </th>
                <th style="text-align: center"><?php echo $totalUmum+$totalBUmum; ?></th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Lulus</th>
                <th style="text-align: center"><?php echo $totalLulusU; ?></th>
                <th style="text-align: center"><?php echo $totalLulusBu; ?></th>
                <th style="text-align: center"><?php echo $totalLulusU+$totalLulusBu; ?></th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Tidak Lulus</th>
                <th style="text-align: center"><font color="red"><?php echo $totalTidakLulusU; ?></font></th>
                <th style="text-align: center"><font color="red"><?php echo $totalTidakLulusBu; ?></font></th>
                <th style="text-align: center"><font color="red"><?php echo $totalTidakLulusU+$totalTidakLulusBu; ?></font></th>
            </tr>
        </tfoot>
    </table>
</div>