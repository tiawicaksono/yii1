<style>
    .pages {
        /*                width: 24cm;
                        height: 28cm;*/
        margin:0;
        overflow: hidden;
    }

    @page {
        margin-left:0px;
        margin-right:0px;
        margin-top:0px;
        margin-bottom:0px;
    }
    @media print {
        /* .pages {
        page-break-after: always;
        }*/
        .underline {
            padding-bottom: 5px;
            border-bottom: 1px solid black;
            line-height: 35px;
        }

        .pages {
            page-break-after: always;
            overflow: hidden;
            /*border: 1px solid black;*/
            padding: 40px;
            /*letter-spacing: 3pt;*/
            /*line-height:3em;*/
            font-style: normal;
            font-variant: normal;
        }
        .center{
            text-align: center;
        }
        #header{
            text-align: center;
            letter-spacing: 2px;
            font-size: 10pt;
            padding-left: 120px;
            margin-bottom: 10px;
        }
        .clearfix:after { 
            content: "."; 
            visibility: hidden; 
            display: block; 
            height: 0; 
            clear: both;
        }
        #no_surat{
            margin-bottom: 20px;
        }
    }
</style>
<div class="pages">
    <?php
    $dataHasilUji = VPrintHasil::model()->findByAttributes(array('id_hasil_uji' => $id));
//    $dataHasilUji = TblHasilUji::model()->findByPk($id);
    $dataKendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $dataHasilUji->id_kendaraan));
    $criteriaPenguji = new CDbCriteria();
    $criteriaPenguji->addCondition('nrp like \'%' . $nrp . '%\'');
    $dataPenguji = TblNamaPenguji::model()->find($criteriaPenguji);
    ?>
    <div id="header">
        <img style="position: absolute; margin-left: -120px" src="<?php echo Yii::app()->baseUrl . "/images/kota.png"; ?>" width="60px" />
        <span style="font-weight: bold; font-size: 12pt;">
            PEMERINTAH KABUPATEN KOTAWARINGIN TIMUR<br />
            DINAS PERHUBUNGAN<br />
            UPTD PENGUJIAN KENDARAAN BERMOTOR<br />
        </span>
        <div>Jalan Jenderal Sudirman KM. 5,5 Sampit </div>
        <div style="margin-top:10px;">KOTAWARINGIN TIMUR</div>
    </div>
    <hr style="border:2px solid black" />
    <center><span class="underline">SURAT KETERANGAN UJI KENDARAAN BERMOTOR</span><br />
        <div id="no_surat">
            551.2 /&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ DISHUB-PKB / <?php echo date('Y'); ?>
        </div>
    </center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATA KENDARAAN : <br />
    <table style="margin-left: 40px; margin-top: 20px; margin-bottom: 20px;">
        <tr>
            <td width="300px">Nomor Uji</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->no_uji; ?></td>
        </tr>
        <tr>
            <td>Nomor Kendaraan</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->no_kendaraan; ?></td>
        </tr>
        <tr>
            <td>Merk / Type</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->merk . " / " . $dataKendaraan->tipe; ?></td>
        </tr>
        <tr>
            <td>Jenis Kendaraan</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->jenis . " / " . $dataKendaraan->nm_komersil; ?></td>
        </tr>
        <tr>
            <td>Nomor Rangka</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->no_chasis; ?></td>
        </tr>
        <tr>
            <td>Nomor Mesin</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->no_mesin; ?></td>
        </tr>
        <tr>
            <td>Tahun Pembuatan / Isi Silinder</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->tahun . " / " . $dataKendaraan->isi_silinder. " CC"; ?></td>
        </tr>
        <tr>
            <td>Nama Pemilik</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->nama_pemilik; ?></td>
        </tr>        
        <tr>
            <td>Alamat Pemilik</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->alamat; ?></td>
        </tr>  
    </table>
    <p></p>
    <p></p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MASA BERLAKU UJI DARI TANGGAL : 
    <?php 
//        echo date('d', strtotime('last day of december this year')) . " " . Yii::app()->params['bulanArrayInd'][date('n', strtotime('last day of december this year')) - 1] . " " . date('Y'); 
    $tgl_mati_uji = date("d", strtotime($dataHasilUji->tgl_mati_uji));
    $bulan_mati_uji = date("n", strtotime($dataHasilUji->tgl_mati_uji));
    $thn_mati_uji = date("Y", strtotime($dataHasilUji->tgl_mati_uji));
    $bln_mati_uji = Yii::app()->params['bulanArrayInd'][$bulan_mati_uji - 1];
    echo "<b>".date('d')." ".Yii::app()->params['bulanArrayInd'][date('n') - 1]." ".date('Y')." S/D ".
            $tgl_mati_uji . " " . $bln_mati_uji . " " . $thn_mati_uji."</b>";
    ?>
    <br />
    <table style="margin-left: 40px; margin-top: 20px; margin-bottom: 20px;">
        <tr>
            <td width="300px">Jumlah Berat yang Diperbolehkan (JBB)</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->kemjbb." Kg"; ?></td>
        </tr>
        <tr>
            <td>Berat Kendaraan</td>
            <td> : </td>
            <td><?php echo $jumlahBeratKendaraan = $dataKendaraan->bsumbu1 + $dataKendaraan->bsumbu2 + $dataKendaraan->bsumbu3 + $dataKendaraan->bsumbu4." Kg"; ?></td>
        </tr>
        <tr>
            <td>Daya Angkut Orang</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->kemorang . " Orang" ?></td>
        </tr>
        <tr>
            <td>Daya Angkut Barang</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->kembarang . " Kg"; ?></td>
        </tr>
        <tr>
            <td>Jumlah Berat yang Diijinkan (JBI)</td>
            <td> : </td>
            <td><?php echo $jumlahBeratKendaraan + $dataKendaraan->kemorang + $dataKendaraan->kembarang; ?></td>
        </tr>
        <tr>
            <td>Muatan Sumbu Terberat (MST)</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->mst; ?></td>
        </tr>
        <tr>
            <td>Pemakaian Sumbu Ban</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>ke-I</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->psumbu1; ?></td>
        </tr>        
        <tr>
            <td>ke-II</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->psumbu2; ?></td>
        </tr>        
    </table>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surat keterangan ini berlaku sampai tanggal 
    <p></p>
    <p></p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CATATAN : 
    <div style="margin-left: 40px; margin-right: 10px;">
        <?php echo $dataHasilUji->catatan; ?>
    </div>
    <div class="clearfix" style="margin-bottom: 50px;"></div>
    <div style="float:left;">&nbsp;</div>
    <div style="right:50; position: fixed;">
        <table>
            <tr>
                <td>&nbsp;</td>
                <td align="center">
                    Sampit, <?php echo $hari = date('d') . " " . Yii::app()->params['bulanArrayInd'][date('n') - 1] . " " . date('Y'); ?><br />
                    Penguji<br /><br /><br /><br />
                    <b><span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dataPenguji->nama_penguji; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></b><br />
                    NRP. <?php echo $nrp; ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<script type="text/javascript">
    window.print();
    setTimeout(window.close, 0);
</script>