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
                <td align="center"><?php echo $mbu = $mobilBarangUBln; ?></td>
                <td align="center"><?php echo $mbbu = $mobilBarangBuBln; ?></td>
                <td align="center"><?php echo $mbu+$mbbu; ?></td>
            </tr>
            <tr>
                <td>Mobil Bis</td>
                <td align="center"><?php echo $mbisu = $mobilBisUBln; ?></td>
                <td align="center"><?php echo $mbisbu = $mobilBisBuBln; ?></td>
                <td align="center"><?php echo $mbisu+$mbisbu; ?></td>
            </tr>
            <tr>
                <td>Mobil Penumpang</td>
                <td align="center"><?php echo $mpu = $mobilPenumpangUBln; ?></td>
                <td align="center"><?php echo $mpbu = $mobilPenumpangBuBln; ?></td>
                <td align="center"><?php echo $mpu+$mpbu; ?></td>
            </tr>
<!--            <tr>
                <td>Mobil Taxi</td>
                <td align="center"><?php // echo $mt = $totalTaxiBln; ?></td>
                <td align="center">0</td>
                <td align="center"><?php // echo $mt; ?></td>
            </tr>-->
        </tbody>
        <tfoot>
            <tr>
                <th>Total Kendaraan Terdaftar</th>
                <th style="text-align: center">
                    <?php
                    echo $totalUmum = $mbu + $mbisu + $mpu;
                    ?>
                </th>
                <th style="text-align: center">
                    <?php
                    echo $totalBUmum = $mbbu + $mbisbu + $mpbu;
                    ?>
                </th>
                <th style="text-align: center">
                    <?php
                    echo $totalUmum+$totalBUmum;
                    ?>
                </th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Kendaraan Datang</th>
                <th style="text-align: center"><?php echo $mdu = $mobilDatangUBln; ?></th>
                <th style="text-align: center"><?php echo $mdbu = $mobilDatangBuBln; ?></th>
                <th style="text-align: center"><?php echo $mdu+$mdbu; ?></th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Kendaraan Ex-TL/TD</th>
                <th style="text-align: center" id="kendaraanDatang"><?php echo $ttu = $totalTlTdUBln; ?></th>
                <th style="text-align: center" id="kendaraanDatang"><?php echo $ttbu = $totalTlTdBuBln; ?></th>
                <th style="text-align: center" id="kendaraanDatang"><?php echo $ttu+$ttbu; ?></th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Lulus</th>
                <th style="text-align: center"><?php echo $tlub = $totalLulusUBln; ?></th>
                <th style="text-align: center"><?php echo $tlbub = $totalLulusBuBln; ?></th>
                <th style="text-align: center"><?php echo $tlub+$tlbub; ?></th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Tidak Lulus</th>
                <th style="text-align: center"><font color="red"><?php echo $ttlub = $totalTidakLulusUBln; ?></font></th>
                <th style="text-align: center"><font color="red"><?php echo $ttlbub = $totalTidakLulusBuBln; ?></font></th>
                <th style="text-align: center"><font color="red"><?php echo $ttlub+$ttlbub; ?></font></th>
            </tr>
        </tfoot>
    </table>
</div>