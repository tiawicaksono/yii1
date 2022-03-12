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
<!--            <tr>
                <td>Mobil Taxi</td>
                <td align="center"><?php // echo $mt = $totalTaxi; ?></td>
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
                <th style="text-align: center"><?php echo $totalUmum+$totalBUmum; ?></th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Kendaraan Datang</th>
                <th style="text-align: center"><?php echo $mobilDatangU; ?></th>
                <th style="text-align: center"><?php echo $mobilDatangBu; ?></th>
                <th style="text-align: center"><?php echo $mobilDatangU+$mobilDatangBu; ?></th>
            </tr>
            <tr style="background-color: #ebebe0">
                <th>Kendaraan Ex-TL/TD</th>
                <th style="text-align: center" id="kendaraanDatang"><?php echo $totalTlTdU; ?></th>
                <th style="text-align: center" id="kendaraanDatang"><?php echo $totalTlTdBu; ?></th>
                <th style="text-align: center" id="kendaraanDatang"><?php echo $totalTlTdU+$totalTlTdBu; ?></th>
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