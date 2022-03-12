<style>
    @page {
        margin-left:0px;
        margin-right:0px;
        margin-top:0px;
        margin-bottom:0px;
    }
    @media print {
        #pages {
            overflow: hidden;
            font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
            padding: 20px 10px 10px 10px;
        }
        .center{
            text-align: center;
        }
        /*=======================================================*/
        .table_border{
            font-size:10pt;
            vertical-align: top;
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
        .font12{
            font-size: 12pt;
        }
        .font11{
            font-size: 11pt;
        }
        .underline {
            padding-bottom: 5px;
            border-bottom: 1px solid black;
            line-height: 35px;
        }
    }
</style>

<div id="pages">
    <?php
    $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_retribusi));
    $explodeTgl = explode('/', $tgl);
    $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
//    echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
    ?>
    <table width="100%" class="table_border">
        <tr>
            <td width="34%" align="center" class="table_border">
                <!--PEMERINTAH KABUPATEN KOTAWARINGIN TIMUR-->
                <table>
                    <tr>
                        <td><img src="<?php echo Yii::app()->baseUrl; ?>/images/kota.png" width="40px" /></td>
                        <td style="font-size: 10.5pt; padding-left: 2px;">PEMERINTAH KABUPATEN KOTAWARINGIN TIMUR</td>
                    </tr>
                </table>
            </td>
            <td width="43%" align="center" class="table_border"><b style="font-size: 14pt">SURAT KETETAPAN RETRIBUSI<br />(SKR - DAERAH)</b></td>
            <td width="23%" align="center" class="table_border" style="font-size: 12pt">NOMOR. <?php echo $data_retribusi->numerator; ?></td>
        </tr>
        <tr>
            <td colspan="3" align="center" class="table_border">
                <table>
                    <tr>
                        <td width="100px">MASA</td>
                        <td width="10px">:</td>
                        <td> <?php echo $bulan; ?></td>
                    </tr>
                    <tr>
                        <td width="100px">TAHUN</td>
                        <td width="10px">:</td>
                        <td> <?php echo $explodeTgl[2]; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center" style="padding:10px;">
                <table>
                    <tr>
                        <td width="200px">NAMA</td>
                        <td width="10px">:</td>
                        <td><?php echo strtoupper($data_retribusi->nama_pemilik); ?></td>
                    </tr>
                    <tr>
                        <td>ALAMAT</td>
                        <td>:</td>
                        <td><?php echo strtoupper($data_retribusi->alamat); ?></td>
                    </tr>
                    <tr>
                        <td>IDENTITAS</td>
                        <td>:</td>
                        <td><?php echo empty($data_retribusi->no_identitas)?'-':strtoupper($data_retribusi->no_identitas); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="table_border font12" align="center"><b>KODE REKENING</b></td>
            <td class="table_border font12" align="center"><b>URAIAN RETRIBUSI DAERAH</b></td>
            <td class="table_border font12" align="center"><b>JUMLAH (RP)</b></td>
        </tr>
        <tr>
            <td class="table_border font12" rowspan="6" align="center"><b>4.1.2.01</b></td>
            <td class="table_border font12">
                <div style="padding: 10px">RET.PENGUJIAN KEND. BERMOTOR</div>
                <div style="padding: 10px">
                    <?php echo $data_retribusi->jns_kend.' - '.$data_retribusi->nm_komersil; ?><br />
                    <?php echo $data_retribusi->no_uji.' - '.$data_retribusi->no_kendaraan; ?>
                </div>
            </td>
            <td rowspan="2">&nbsp;</td>
        </tr>
        <tr></tr>
        <tr>
            <td class="table_border font12">RETRIBUSI JBB <?php echo $data_retribusi->kemjbb; ?>KG</td>
            <td class="table_border font12">Rp.<?php echo number_format($data_retribusi->b_berkala, 0, ',', '.'); ?>,00</td>
        </tr>
        <tr>
            <td class="table_border font12">UJI PERTAMA (optional)</td>
            <td class="table_border font12">Rp.<?php echo number_format($data_retribusi->b_pertama, 0, ',', '.'); ?>,00</td>
        </tr>
        <tr>
            <td class="table_border font12">BIAYA BUKU (optional)</td>
            <td class="table_border font12">Rp.<?php echo number_format($data_retribusi->b_buku, 0, ',', '.'); ?>,00</td>
        </tr>
        
        <tr>
            <td class="table_border font12">
                DENDA
            </td>
            <td class="table_border font12">Rp.<?php echo number_format($data_retribusi->b_tlt_uji, 0, ',', '.'); ?>,00</td>
        </tr>
        <tr style="height: 20px font12">
            <td class="table_border font12" colspan="2" align="right">
                Jumlah Keselurahan
            </td>
            <td class="table_border font12">Rp.<?php echo number_format($data_retribusi->total, 0, ',', '.'); ?>,-</td>
        </tr>
        <tr>
            <td colspan="3" class="font12" style="padding: 10px;">
                <div>
                    Terbilang : <?php echo ucwords(strtolower(Yii::app()->appComponent->konversiUang($data_retribusi->total))) . " Rupiah"; ?>
                </div>
                <div>
                    <ol type="1">
                        <li>Harap penyetoran dilakukan pada Bank / Bendahara penerima Dinas Perhubungan Kab. Kotawaringin Timur</li>
                        <li>
                            Apabila SKRD ini tidak atau kurang dibayar lewat waktu paling lama 30 hari setelah SKRD diterima atau tanggal jatuh tempo, 
                            maka akan dikenakan sanksi administrasi berupa bungan sebesar 2% per bulan
                        </li>
                    </ol>
                </div>
                <div style="margin-top: 20px; float: right; margin-right:20px;  text-align: center;">
                    <div>Sampit, <?php echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2]; ?></div>
                    <div>A.n. KEPALA DINAS PERHUBUNGAN</div>
                    <div>KABUPATEN KOTAWARINGIN TIMUR</div>
                    <div>Kasubbag. TU. UPTD PKB</div>
                    <div>
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/ttd_kasubag.png" width="200px" />
                    </div>
                    <div><span class="underline">&nbsp;&nbsp;&nbsp;NANANG SETIAWAN, S.E.&nbsp;&nbsp;&nbsp;</span></div>
                    <div>NIP. 19791118.200604.1.017</div>
                </div>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    window.print();
    setTimeout(window.close, 0);
</script>