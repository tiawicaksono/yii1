<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($baseUrl . '/js/jquery-1.12.0.min.js', CClientScript::POS_BEGIN);
$cs->registerScriptFile($baseUrl . '/js/qrcode/jquery.qrcode.js', CClientScript::POS_BEGIN);
$cs->registerScriptFile($baseUrl . '/js/qrcode/qrcode.js', CClientScript::POS_BEGIN);
?>
<style>
    @page {
        size: A5 landscape;
        margin: 0;
    }

    @media print {
        #pages {
            overflow: hidden;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            padding: 5px 40px 40px 40px;
        }

        .center {
            text-align: center;
        }

        #header {
            font-size: 12pt;
        }

        #numerator {
            margin-top: 91px;
        }

        #div_kendaraan {
            margin-top: 20px;
            margin-left: 200px;
            height: 50px;
        }

        #div_retribusi {
            margin-top: 35px;
            margin-left: 310px;
        }

        #retribusi_total {
            margin-top: 25px;
        }

        #tanggal {
            margin-top: 15px;
            margin-left: 350px;
        }

        #tandes {
            margin-top: 10px;
            margin-left: 355px;
        }

        #pengurus {
            margin-top: 90px;
            margin-left: 10px;
        }

        #petugas {
            margin-left: 120px;
            text-transform: uppercase;
        }
    }
</style>

<div id="pages">
    <div class="center">
        <b>DINAS PERHUBUNGAN<br />
            PENGUJIAN KENDARAAN BERMOTOR<br /></b>
        <span style="font-size:14pt; font-weight: bold;">KABUPATEN SAMPANG</span><br />
        <span style="font-size:9pt; font-weight: bold;">TANDA TERIMA PENDAFTARAN DAN BUKTI PEMBAYARAN RETRIBUSI<br />
            Nomor Retribusi : <?php echo $data_retribusi->numerator; ?></span>
    </div>
    <hr />
    <div class="center">
        <div style="float:left; width: 50%;">
            <table style="font-size: 9pt;">
                <tr>
                    <td valign="top" style="width: 100px">Kode Billing / Virtual Account</td>
                    <td valign="middle">:</td>
                    <td valign="middle"><?php echo $data_retribusi->virtual_account; ?></td>
                </tr>
                <tr>
                    <td valign="top" style="width: 100px">Nama Pemohon</td>
                    <td valign="top">:</td>
                    <td valign="top"><?php echo $data_retribusi->nama_pemilik; ?></td>
                </tr>
                <tr>
                    <td valign="top">Alamat Pemohon</td>
                    <td valign="top">:</td>
                    <td valign="top">
                        <?php
                        $rt = '';
                        $rw = '';
                        $kelurahan = '';
                        $kecamatan = '';
                        $kota = '';
                        $propinsi = '';
                        if (!empty($data_retribusi->rt)) {
                            $rt = ' RT.' . $data_retribusi->rt . ' / ';
                        }
                        if (!empty($data_retribusi->rw)) {
                            $rw = ' RW.' . $data_retribusi->rw . ',';
                        }
                        if (!empty($data_retribusi->kelurahan)) {
                            $kelurahan = ' ' . $data_retribusi->kelurahan . ',';
                        }
                        if (!empty($data_retribusi->kecamatan)) {
                            $kecamatan = ' ' . $data_retribusi->kecamatan . ',';
                        }
                        if (!empty($data_retribusi->kota)) {
                            $kota = ' ' . $data_retribusi->kota . ',';
                        }
                        if (!empty($data_retribusi->propinsi)) {
                            $propinsi = ' ' . $data_retribusi->propinsi . '';
                        }
                        echo $data_retribusi->alamat . $rt . $rw . $kelurahan . $kecamatan . $kota . $propinsi;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td valign="top">No. Uji / No. Kend</td>
                    <td valign="top">:</td>
                    <td valign="top"><?php echo $data_retribusi->no_uji . " / " . $data_retribusi->no_kendaraan; ?></td>
                </tr>
                <tr>
                    <td>Uji</td>
                    <td>:</td>
                    <td>
                        <?php echo $data_retribusi->nm_uji; ?>
                        <?php
                        $bk_masuk = ' ( TIDAK GANTI )';
                        if ($data_retribusi->id_bk_masuk != 1) {
                            $bk_masuk = " ( " . $data_retribusi->bk_masuk . " )";
                        }
                        echo "<b>" . $bk_masuk . "</b>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tgl Retribusi</td>
                    <td>:</td>
                    <td>
                        <?php
                        $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_retribusi));
                        $explodeTgl = explode('/', $tgl);
                        $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
                        echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tgl Uji</td>
                    <td>:</td>
                    <td>
                        <?php
                        $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_uji));
                        $explodeTgl = explode('/', $tgl);
                        $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
                        echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kend</td>
                    <td>:</td>
                    <td><?php echo $data_retribusi->nm_komersil . ' / ' . $data_retribusi->jenis; ?></td>
                </tr>
                <!-- <tr>
                    <td>No. Chasis</td>
                    <td>:</td>
                    <td><?php echo $data_retribusi->no_chasis; ?></td>
                </tr>
                <tr>
                    <td>No. Mesin</td>
                    <td>:</td>
                    <td><?php echo $data_retribusi->no_mesin; ?></td>
                </tr> -->
            </table>
        </div>
        <div style="float:left; width: 50%">
            <center>
                <!--                <table width="100%">
                    <tr>
                        <td style="padding-left: 60px">
                            <img src="<?php // echo Yii::app()->baseUrl . "/images/qris.png" 
                                        ?>" width="130px"/>
                        </td>
                        <td style="width:100px">
                            <img src="<?php // echo Yii::app()->baseUrl . "/images/gpn.png" 
                                        ?>" width="30px"/>
                        </td>
                    </tr>
                </table>-->
                <div id="qrcodeCanvas"></div>
                <br />
                <b>QRIS</b><br />
                <span style="font-size: 10px">QR Code Standar Pembayaran Nasional</span>
            </center>
        </div>
    </div>
    <div class="center" style="margin-top:220px;">
        <hr style="clear: both;" />
    </div>
    <div style="float: left; width: 50%;">
        <div style="margin-top: 5px; margin-bottom: 5px;">
            <b><span style="font-size:9pt">Uraian Pembayaran :</span></b>
        </div>
        <?php
        if (floor($data_retribusi->lm_tlt / 12) != 0) {
            $tlt_retribusi = floor($data_retribusi->lm_tlt / 12);
        } else {
            $tlt_retribusi = 0;
        }
        ?>
        <table style="margin-left: 20px; font-size: 9pt;">
            <tr>
                <td style="width: 200px">Biaya Retribusi</td>
                <td>Rp.</td>
                <td align="right"><?php echo number_format(intval($data_retribusi->b_berkala), 2, ',', '.'); ?></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Biaya Retribusi &ge; 1 Thn</td>
                <td>Rp.</td>
                <td align="right">
                    <?php
                    echo number_format(intval($data_retribusi->b_retribusi_lebih), 2, ',', '.');
                    ?>
                </td>
                <td><?php echo "(" . $tlt_retribusi . " X)"; ?></td>
            </tr>
            <tr>
                <td>Biaya Rekom</td>
                <td>Rp.</td>
                <td align="right"><?php echo number_format(intval($data_retribusi->b_rekom), 2, ',', '.'); ?></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Biaya Denda Telat Uji</td>
                <td>Rp.</td>
                <td align="right">
                    <?php
                    echo number_format($data_retribusi->b_tlt_uji, 2, ',', '.');
                    ?>
                </td>
                <td><?php echo "(" . $data_retribusi->lm_tlt . " bln)"; ?></td>
            </tr>
            <tr>
                <td>Biaya Kartu Uji Ganti/Rusak/Hilang</td>
                <td>Rp.</td>
                <td align="right"><?php echo number_format($data_retribusi->b_buku, 2, ',', '.'); ?></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Biaya Tanda Samping</td>
                <td>Rp.</td>
                <td align="right"><?php echo number_format($data_retribusi->b_plat_uji, 2, ',', '.'); ?></td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border-top: 1px solid #000;">
                <td style="border-top: 1px solid #000;"><b>TOTAL</b></td>
                <td style="border-top: 1px solid #000;">Rp.</td>
                <td style="border-top: 1px solid #000;" align="right"><?php echo number_format($data_retribusi->total, 2, ',', '.'); ?></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
    <div style="float: left; width: 50%; text-align: center; font-size: 9pt;">
        <div style="margin-top: 20px;">
            Sampang,
            <?php
            $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_retribusi));
            $explodeTgl = explode('/', $tgl);
            $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
            echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
            ?>
            <br />
            A.n. Ka. UPT Pengujian Kend. Bermotor
            <br />
            Petugas Pelayanan Pengujian Kend. Bermotor
            <br />
            <br />
            <br />
            <br />
            <br />
            <span style="border-bottom: 1px solid black;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#qrcodeCanvas').qrcode('<?php echo $data_retribusi->qr_value; ?>');
    window.print();
    // setTimeout(window.close, 10);
</script>