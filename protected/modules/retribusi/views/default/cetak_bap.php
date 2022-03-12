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
            padding: 30px 20px;
            page-break-after: always;
        }
        .center{
            text-align: center;
        }
        #table_luar{
            border-collapse: collapse;
        }

        #table_luar tr td {
            border: 1px solid black;
            padding: 2px;
            font-size: 10pt;
        }
        #table_dalam{
            border-collapse: collapse;
        }

        #table_dalam tr td {
            border: none;
            padding: 2px;
            font-size: 12pt;
            width:100%;
        }
        #header{
            text-align: center;
            font-size: 16pt;
            font-weight: bold;
        }
        #table_pemohon tr td {
            padding: 7px;
            border-bottom: 1px solid #ddd;
        }
        hr.style2 {
            border-top: 3px double #8c8b8b;
        }
        hr.style5 {
            background-color: #fff;
            border-top: 2px dashed #8c8b8b;
        }
        #table_catatan tr td{
            padding: 5px;
        }
    }
</style>
<?php
$data = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
$data_retribusi = TblRetribusi::model()->findByPk($id_retribusi);
$numerator_hari = $data_retribusi->numerator_hari;
?>
<div id="pages">
    <div id="header" style="margin-top:30px; font-size: 20pt;">Formulir Permohonan Uji / Layanan Lainnya</div>
    <div style="position: fixed; right: 30px; font-weight: bold; font-size: 30pt; border: #000 solid; top: 30px; padding: 3px;"><?php echo $numerator_hari; ?></div>
    <hr class="style2">
    <table id="table_pemohon" style="width: 100%; margin-top: 10px; height:70px;">
        <tr>
            <td width='250px' style="font-weight: bold;">NO UJI / NO KENDARAAN</td>
            <td>:</td>
            <td><?php echo $data->no_uji.' / '.$data->no_kendaraan; ?></td>
        </tr>
        <tr>
            <td width='170px' style="font-weight: bold;">NAMA PEMILIK</td>
            <td>:</td>
            <td><?php echo $data->nama_pemilik; ?></td>
        </tr>
        <tr>
            <td width='170px' style="font-weight: bold;">ALAMAT PEMILIK</td>
            <td>:</td>
            <td><?php echo $data->alamat; ?></td>
        </tr>
        <tr>
            <td width='170px' style="font-weight: bold;">JENIS KEND. / STATUS</td>
            <td>:</td>
            <td><?php echo $data->jns_kend.' / '.$data->sifat; ?></td>
        </tr>
        <tr>
            <td width='170px' style="font-weight: bold;">MERK / TYPE / TAHUN</td>
            <td>:</td>
            <td><?php echo $data->merk.' / '.$data->tipe.' / '.$data->tahun; ?></td>
        </tr>
    </table>
    <table width="100%" style="margin-top: 80px;">
        <tr>
            <td valign="top" style="width:450px; display: inline-block;">
                <div style="font-size:14pt; font-weight: bold; border: 1px dotted #8c8b8b; padding: 5px; margin-bottom: 7px;">JENIS LAYANAN</div>
                <div>1. UJI KENDARAAN BERMOTOR BERKALA</div><br/>
                <div>2. UJI KENDARAAN BERMOTOR UJI PERTAMA</div><br/>
                <div>3. UJI KENDARAAN BERMOTOR NUMPANG UJI MASUK</div><br/>
                <div>5. UJI KENDARAAN BERMOTOR MUTASI MASUK</div><br/>
                <div>4. REKOMENDASI NUMPANG UJI KELUAR</div><br/>
                <div>6. REKOMENDASI MUTASI KELUAR</div><br/>
                <div>7. REKOMENDASI KENDARAAN BARU</div><br/>
                <div>8. REKOMENDASI UBAH BENTUK KENDARAAN</div><br/>
                <div>9. REKOMENDASI UBAH SIFAT KENDARAAN</div><br/>
                <div style="font-size:14pt; font-weight: bold; border: 1px dotted #8c8b8b; padding: 5px;">LINGKARI JENIS PELAYANAN DIATAS</div>
            </td>
            <td valign="top" align="center">
                 Ngawi, <?php
                        $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_retribusi));
                        $explodeTgl = explode('/', $tgl);
                        $bulan = Yii::app()->params['bulanArray'][$explodeTgl[1] - 1];
                        echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
                        ?>
                 <br/>
                 PEMILIK / KUASA PEMILIK / PENGURUS
                 <br/><br/><br/><br/><br/><br/>
                 <u>...................................</u>
                 <br/>Telp. Pemilik
            </td>
        </tr>
    </table>
    <table id="table_catatan" width="100%" style="border: dashed #8c8b8b; margin-top: 150px;">
        <tr>
            <td valign="top">CATATAN</td>
            <td valign="top">1.</td>
            <td valign="top">
                APABILA ADA DATA YANG SALAH / DATA SEKARANG SUDAH BERUBAH ( PADA HALAMAN INI SERTA DIBALIKNYA ). 
                TOLONG DICORET DAN DITULISKAN YANG BENAR DISAMPING ATAU DIBAWAH DATA YANG SALAH SERTA DIBERI PARAF / TANDA TANGAN
            </td>
        </tr>
        <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">2.</td>
            <td valign="top">
                SEBAGAI PERSYARATAN KAMI LAMPIRKAN HASIL GESEKAN NO MESIN, NO RANGKA DAN NO UJI SESUAI DATA DIBAWAH INI, 
                SERTA DOKUMEN PERSYARATAN LAINNYA SESUAI PERATURAN BUPATI NO. 78.1 TAHUN 2011.
            </td>
        </tr>
    </table>
</div>
<?php if (in_array($id_uji, array(1,2,4,14))){?>
<div id="pages">
    <div id="header">CATATAN HASIL<br />PEMERIKSAAN KENDARAAN</div>
    <div style="position: fixed; right: 30px; font-weight: bold; font-size: 30pt; border: #000 solid; top: 30px; padding: 3px;"><?php echo $numerator_hari; ?></div>
    <table id="table_luar" style="width: 100%; margin-top: 10px; height:70px;">
        <tr>
            <td width='170px'>No. Mesin</td>
            <td rowspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo $data->no_mesin; ?></td>
        </tr>
    </table>
    <table id="table_luar" style="font-size: 6px; width: 100%; margin-top: 10px; height:70px;">
        <tr>
            <td width='170px'>No. Rangka</td>
            <td rowspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo $data->no_chasis; ?></td>
        </tr>
    </table>
    <table id="table_luar" style="font-size: 6px; width: 100%; margin-top: 10px; height:70px;">
        <tr>
            <td width='170px'>No. Uji</td>
            <td rowspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo $data->no_uji; ?></td>
        </tr>
    </table>
    <table id="table_luar" style="width: 100%; margin-top: 10px; height: 500px;">
        <tr>
            <td align="center" style="height:50px;">
                <span style="font-size: 18pt; font-weight: bold;"><?php echo $data->no_kendaraan; ?></span>
            </td>
            <td align="center" width="30px" style="padding: 0px 10px 0px 10px; font-weight: bold; font-size: 15pt">PEMERIKSA</td>
            <td rowspan="2" width="270px" valign="top">
                <table id="table_dalam">
                    <tr>
                        <td valign="top" style="padding-right:10px;">NO UJI</td>
                        <td valign="top">:</td>
                        <td valign="top" width="100px" style="width:100px; display: inline-block;"><?php echo $data->no_uji; ?></td>
                    </tr>
                    <tr>
                        <td valign="top">JENIS KEND</td>
                        <td valign="top">:</td>
                        <td valign="top"><?php echo $data->nm_komersil; ?></td>
                    </tr>
                    <tr>
                        <td>JBB</td>
                        <td>:</td>
                        <td><?php echo $data->kemjbb; ?></td>
                    </tr>
                    <tr>
                        <td>BERAT S1</td>
                        <td>:</td>
                        <td><?php echo $data->bsumbu1; ?></td>
                    </tr>
                    <tr>
                        <td>BERAT S2</td>
                        <td>:</td>
                        <td><?php echo $data->bsumbu2; ?></td>
                    </tr>
                    <tr>
                        <td>BERAT S3</td>
                        <td>:</td>
                        <td><?php echo empty($data->bsumbu3)?'-':$data->bsumbu3; ?></td>
                    </tr>
                    <tr>
                        <td>BERAT S4</td>
                        <td>:</td>
                        <td><?php echo empty($data->bsumbu4)?'-':$data->bsumbu4; ?></td>
                    </tr>
                    <tr>
                        <td>BERAT KEND.</td>
                        <td>:</td>
                        <td><?php echo $data->bsumbu1; ?></td>
                    </tr>
                    <tr>
                        <td valign="top">DY ANGKUT ORG</td>
                        <td valign="top">:</td>
                        <td valign="top"><?php echo $data->kemorang; ?></td>
                    </tr>
                    <tr>
                        <td valign="top">DY ANGKUT BRG</td>
                        <td valign="top">:</td>
                        <td valign="top"><?php echo $data->kembarang; ?></td>
                    </tr>
                    <tr>
                        <td>JBI</td>
                        <td>:</td>
                        <td>
                            <?php 
                            $jumlah_sumbu = $data->bsumbu1 + $data->bsumbu2 + $data->bsumbu3 + $data->bsumbu4;
                            echo $jumlah_sumbu + $data->kemorang + $data->kembarang; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>MST</td>
                        <td>:</td>
                        <td><?php echo $data->mst; ?></td>
                    </tr>
                    <tr>
                        <td>KELAS JALAN</td>
                        <td>:</td>
                        <td><?php echo $data->kls_jln; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="left" valign="top" style="font-size: 14pt; font-weight: bold; height: 100px; padding: 5px;">
                CATATAN :
            </td>
            <td></td>
            <td align="center" valign="top" style="font-size: 12pt;font-weight: bold; padding: 5px;">
                Ngawi, <?php
                        $tgl = date('d/n/Y', strtotime($data_retribusi->tgl_retribusi));
                        $explodeTgl = explode('/', $tgl);
                        $bulan = Yii::app()->params['bulanArray'][$explodeTgl[1] - 1];
                        echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
                        ?>
                <br/>
                PENGUJI
                <br/>
                <br/>
                <br/>
                <br/>
                <u>...................................</u>
            </td>
        </tr>
    </table>
    <div>
        <table width="100%">
            <tr>
                <td>PERBAIKAN : </td>
                <td align="center" style="font-size: 14pt; font-weight: bold;">
                    LEMBAR UJI ULANG<br/>
                    JAM LAYANAN UJI ULANG<br/>
                    08:00 - 13:00 WIB
                </td>
                <td>
                    <span style="font-size: 24pt; font-weight: bold;"><?php echo $data->no_kendaraan; ?></span><br/>
                    Ngawi, <?php echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2]; ?>
                </td>
                <td>
                    <div style="font-weight: bold; font-size: 30pt; border: #000 solid; padding: 3px; text-align: center;"><?php echo $numerator_hari; ?></div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>
<script type="text/javascript">
    window.print();
    setTimeout(window.close, 0);
</script>