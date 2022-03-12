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
            padding: 0px 10px 10px 10px;
            font-size: 7pt;
            margin-left: 40px;
            page-break-after: always;
            letter-spacing: 4px;
        }
        .center{
            text-align: center;
        }
        #table_retribusi{
            border-collapse: collapse;
        }

        #table_retribusi tr td {
            border: 1px solid black;
            padding: 2px;
        }
    }
</style>
<?php
foreach ($idArray as $id_retribusi):
    $data_retribusi = VValidasi::model()->findByAttributes(array('id_retribusi' => $id_retribusi));
    ?>
    <div id="pages">
        <div style="text-align:center;
             white-space:nowrap;
             transform-origin:50% 50%;
             transform: rotate(270deg); font-size: 22pt; font-weight: bold; position: fixed; top: 180px; left: 0px;">SKRD</div>
        <div style="text-align:center;
             white-space:nowrap;
             transform-origin:50% 50%;
             transform: rotate(270deg); font-size: 22pt; font-weight: bold; position: fixed; top: 400px; left: -30px;">KWITANSI</div>
        <table width="99%" style="font-size: 7pt;">
            <tr>
                <td>
                    <div style="float:left; width: 10px;"><img src="<?php echo Yii::app()->baseUrl; ?>/images/ngawi.png" width='30px' /></div>
                    <div style="margin-left: 40px;">
                        PEMERINTAHAN KABUPATEN NGAWI<br />
                        DINAS PERHUBUNGAN<br />
                        Jl. Suryo No. 37, Telp.(0351)745543 / fax.(0351)746486
                    </div>
                </td>
                <td align="center" valign='top'>
                    SURAT KETERAGAN<br/>
                    RETRIBUSI DAERAH
                </td>
                <td align="center" valign='top'>
                    NO. KOHIR<br/>
                    <?php
                    $numerator_hari = sprintf('%03d', $data_retribusi->numerator_hari);
                    $bln = date('n');
                    $bln_romawi = Yii::app()->params['bulanRomawi'][$bln - 1];
                    ?>
                    <span style="font-size: 12pt; font-weight: bold;"><?php echo $numerator_hari . ' / ' . $bln_romawi . '.' . date('y'); ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="3"><hr /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table style="font-size: 7pt;">
                        <tr>
                            <td valign="top">Nama</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo $data_retribusi->nama_pemilik; ?></td>
                        </tr>
                        <tr>
                            <td valign="top">Alamat</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo $data_retribusi->alamat; ?></td>
                        </tr>
                    </table> 
                </td>
                <td align="center" width="100px">
                    <span style="font-size: 12pt; font-weight: bold;"><?php echo $data_retribusi->no_kendaraan; ?></span><br/>
                    <span style="font-size: 10pt"><?php echo $data_retribusi->no_uji; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table id="table_retribusi" style="font-size: 7pt;" width="100%">
                        <tr>
                            <td colspan="5" valign="middle">KODE REKENING : 4.1.201.07</td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_uji_kecil)) {
                                $jmlKecil = 0;
                                $bKecil = 0;
                            } else {
                                $jmlKecil = 1;
                                $bKecil = $data_retribusi->b_uji_kecil;
                            }
                            ?>
                            <td valign="middle">Retribusi : JBB < 3.500 Kg</td>
                            <td valign="middle" align="right">Rp. 50.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jmlKecil; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($bKecil, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_uji_besar)) {
                                $jmlBesar = 0;
                                $bBesar = 0;
                            } else {
                                $jmlBesar = 1;
                                $bBesar = $data_retribusi->b_uji_besar;
                            }
                            ?>
                            <td valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; > 3.500 Kg</td>
                            <td valign="middle" align="right">Rp. 65.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jmlBesar; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($bBesar, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_denda_kecil)) {
                                $jmlKecil = 0;
                                $bKecil = 0;
                            } else {
                                $jmlKecil = 1;
                                $bKecil = $data_retribusi->b_denda_kecil;
                            }
                            ?>
                            <td valign="middle">Denda&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: JBB < 3.500 Kg</td>
                            <td valign="middle" align="right">Rp. 10.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jmlKecil; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($bKecil, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_denda_besar)) {
                                $jmlBesar = 0;
                                $bBesar = 0;
                            } else {
                                $jmlBesar = 1;
                                $bBesar = $data_retribusi->b_denda_besar;
                            }
                            ?>
                            <td valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; > 3.500 Kg</td>
                            <td valign="middle" align="right">Rp. 15.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jmlBesar; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($bBesar, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_rekom_mutasi)) {
                                $jml = 0;
                                $biaya = 0;
                            } else {
                                $jml = 1;
                                $biaya = $data_retribusi->b_rekom_mutasi;
                            }
                            ?>
                            <td valign="middle">Rekom Mutasi</td>
                            <td valign="middle" align="right">Rp. 10.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jml; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($biaya, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_rekom_nu)) {
                                $jml = 0;
                                $biaya = 0;
                            } else {
                                $jml = 1;
                                $biaya = $data_retribusi->b_rekom_nu;
                            }
                            ?>
                            <td valign="middle">Rekom Numpang Uji</td>
                            <td valign="middle" align="right">Rp. 10.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jml; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($biaya, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_rekom_ubah)) {
                                $jml = 0;
                                $biaya = 0;
                            } else {
                                $jml = 1;
                                $biaya = $data_retribusi->b_rekom_ubah;
                            }
                            ?>
                            <td valign="middle">Rekom Ubah Sifat / Bentuk / Baru</td>
                            <td valign="middle" align="right">Rp. 10.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jml; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($biaya, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_buku_hilang)) {
                                $jml = 0;
                                $biaya = 0;
                            } else {
                                $jml = 1;
                                $biaya = $data_retribusi->b_buku_hilang;
                            }
                            ?>
                            <td valign="middle">Buku Hilang</td>
                            <td valign="middle" align="right">Rp. 100.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jml; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($biaya, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <?php
                            if (empty($data_retribusi->b_buku_rusak)) {
                                $jml = 0;
                                $biaya = 0;
                            } else {
                                $jml = 1;
                                $biaya = $data_retribusi->b_buku_rusak;
                            }
                            ?>
                            <td valign="middle">Buku Rusak</td>
                            <td valign="middle" align="right">Rp. 25.000</td>
                            <td valign="middle" align="center" width="30px"><?php echo $jml; ?></td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><?php echo number_format($biaya, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td valign="middle" colspan="3">Jumlah Ketetapan Pokok Retribusi + Denda</td>
                            <td valign="middle" width="10px">Rp.</td>
                            <td valign="middle" align="right"><span style="font-size: 12pt; font-weight: bold;"><?php echo number_format($data_retribusi->total, 0, ',', '.'); ?></span></td>
                        </tr>
                    </table>
                </td>
                <td valign="top" align="left">
                    <table style="font-size: 7pt;" width="100%">
                        <tr>
                            <td width="60px;">Ditetapkan di</td>
                            <td> : </td>
                            <td>Ngawi</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td> : </td>
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
                            <td colspan="3" align="center">A.n KEPALA DINAS PERHUBUNGAN</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">KEPALA BIDANG ANGKUTAN</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                                AGUS PRAMUDIYANTO, S.E.<br/>
                                19610816 199012002
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4"><hr /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table style="font-size: 9pt;" width="100%">
                        <tr>
                            <td valign="middle" width="200px">BUKTI PENGAMBILAN PLAT UJI</td>
                            <td valign="middle" align="left">*</td>
                        </tr>
                        <tr>
                            <td valign="middle">BUKTI PENGAMBILAN BUKU UJI</td>
                            <td valign="middle" align="left">*</td>
                        </tr>
                    </table>
                </td>
                <td valign='top' rowspan="2">
                    <table style="font-size: 7pt;" width="100%">
                        <tr>
                            <td width="10px">No. Register</td>
                            <td> : </td>
                            <td><?php echo sprintf('%04d', $data_retribusi->numerator); ?></td>
                        </tr>
                        <tr>
                            <td>No. Kwitansi</td>
                            <td> : </td>
                            <td>
                                <span style="font-size:12pt; font-weight: bold;"><?php echo $numerator_hari . ' / ' . $bln_romawi . '.' . date('y'); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                                <?php
                                $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_retribusi));
                                $explodeTgl = explode('/', $tgl);
                                $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
                                echo 'Ngawi, ' . $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">BENDAHARA PENERIMAAN</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">PEMBANTU</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                                RENING DYAH N.<br/>
                                19850609 200901 2 001
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="margin-bottom: 5px;">SUDAH TERIMA BIAYA RETRIBUSI <span style="font-weight: bold;"><?php echo $data_retribusi->nm_uji; ?></span></div>
                    <div style="margin-bottom: 5px;">DARI : <span style="font-weight: bold;"><?php echo $data_retribusi->nama_pemilik; ?></span></div>
                    <div style="margin-bottom: 5px; padding-left: 30px"><span style="font-weight: bold;"><?php echo $data_retribusi->alamat; ?></span></div>
                    <div style="margin-bottom: 5px;">TOTAL PEMBAYARAN : <span style="font-weight: bold;">Rp.<?php echo number_format($data_retribusi->total, 0, ',', '.'); ?>,00</span></div>
                    <div style="margin-bottom: 5px;">TERBILANG : <span style="font-weight: bold; font-size: 12pt"><?php echo ucwords(strtolower(Yii::app()->appComponent->konversiUang($data_retribusi->total))) . " Rupiah"; ?></span></div>
                </td>
            </tr>
        </table>
    </div>
<?php endforeach; ?>
<script type="text/javascript">
    window.print();
    setTimeout(window.close, 0);
</script>