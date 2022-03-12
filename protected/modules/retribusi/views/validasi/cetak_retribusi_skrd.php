<style>
    @page {
        margin-left:0px;
        margin-right:0px;
        margin-top:0px;
        margin-bottom:0px;
    }
    @media print {
        #pages_kuitansi {
            overflow: hidden;
            font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
            padding: 0px 10px 10px 10px;
            font-size: 12pt;
            margin-left: 40px;
            page-break-after: always;
        }
        
        .center{
            text-align: center;
        }
        /*=======================================================*/
        #atas{
            margin-left: 200px;
        }
        #total_biaya {
            margin-left: 25px;
            margin-top: 130px;
        }
        #total_biaya_terbilang {
            height: 40px;
            width: 400px;
        }
        #nama_pemiilik {
            margin-top: 10px;
        }
        #alamat_pemiilik {
            margin-top: 5px;
        }
        #sebagai_pembayaran {
            margin-top: 5px;
            width: 400px;
            height: 40px;
        }
        /*=======================================================*/
        #bawah{
            margin-left: 50px;
            height: 80px;
            margin-top: 30px;
        }
        #bawah table tr td{
            font-size:10pt;
            vertical-align: top;
        }
        /*=======================================================*/
        #tgl_diterima{
            margin-top: 3px;
            margin-left: 180px;
        }
        #ttd{
            margin-top: 70px;
            margin-left: 50px;
        }
        #ttd table tr td{
            font-size:10pt;
            vertical-align: top;
        }
        /*=======================================================*/
        /*CSS SKRD*/
        /*=======================================================*/
        #pages_skrd {
            overflow: hidden;
            font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
            padding: 20px 10px 10px 10px;
            page-break-after: always;
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

<div id="pages_kuitansi">
    <div id="atas">
        <div id="total_biaya"><?php echo number_format($data_retribusi->total, 0, ',', '.'); ?></div>
        <div id="total_biaya_terbilang"><?php echo ucwords(strtolower(Yii::app()->appComponent->konversiUang($data_retribusi->total))) . " Rupiah"; ?></div>
        <div id="nama_pemiilik"><?php echo strtoupper($data_retribusi->nama_pemilik); ?></div>
        <div id="alamat_pemiilik"><?php echo strtoupper($data_retribusi->alamat); ?></div>
        <div id="sebagai_pembayaran">
            RETRIBUSI PENGUJIAN KENDARAAN BERMOTOR <br />
            <?php echo strtoupper($data_retribusi->no_uji." / ".$data_retribusi->no_kendaraan); ?>
        </div>
    </div>
    <div id="bawah">
        <table>
            <tr>
                <td width="70px" align="left">4.1.2.01</td>
                <td width="350px">
                    <span style="font-size: 10pt; height: 20px;"><?php echo strtoupper($data_retribusi->nm_komersil." / ".$data_retribusi->jns_kend." / JBB ".$data_retribusi->kemjbb." Kg"); ?></span>
                    <table>
                        <tr>
                            <td>Biaya Uji</td>
                            <td>: <?php echo number_format($data_retribusi->b_berkala, 0, ',', '.'); ?></td>
                            <td width="50px">&nbsp;</td>
                            <td>Biaya Buku</td>
                            <td>: <?php echo number_format($data_retribusi->b_buku, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Uji Pertama</td>
                            <td>: <?php echo number_format($data_retribusi->b_pertama, 0, ',', '.'); ?></td>
                            <td>&nbsp;</td>
                            <td>Denda</td>
                            <td>: <?php echo number_format($data_retribusi->b_tlt_uji, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Biaya Lulus Uji</td>
                            <td>: <?php echo number_format($data_retribusi->b_tanda_lulus_uji, 0, ',', '.'); ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td align="right" width="100px">
                    Rp.<?php echo number_format($data_retribusi->total, 0, ',', '.'); ?>,-
                </td>
            </tr>
        </table>
    </div>
    <div id="tgl_diterima">
        <?php
        $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_retribusi));
        $explodeTgl = explode('/', $tgl);
        $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
        echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
        ?>
    </div>
    <div id="ttd">
        <table>
            <tr>
                <td valign="top" width="300px">
                    ISNANIAH <br/>
                    <span style="margin-left: 20px">19690901.199103.2.008</span>
                </td>
                <td valign="top" width="300px" style="padding-left: 80px;">
                    <?php echo strtoupper($data_retribusi->nama_pemilik); ?><br/>
                </td>
            </tr>
        </table>
    </div>
</div>

<div id="pages_skrd">
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