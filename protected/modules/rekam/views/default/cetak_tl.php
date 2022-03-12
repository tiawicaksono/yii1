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
        .nama_penguji_underline {
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
    }
</style>
<div class="pages">
    <?php
//    $dataProses = VPrintHasil::model()->findByAttributes(array('id_hasil_uji' => $id));
    $dataHasilUji = TblHasilUji::model()->findByPk($id);
    $dataKendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $dataHasilUji->id_kendaraan));
    $criteriaPenguji = new CDbCriteria();
    $criteriaPenguji->addCondition('nrp like \'%' . $nrp . '%\'');
    $dataPenguji = TblNamaPenguji::model()->find($criteriaPenguji);
    ?>
    <div id="header">
        <img style="position: absolute; margin-left: -120px" src="<?php echo Yii::app()->baseUrl . "/images/kota.png"; ?>" width="60px" />
        <span style="font-weight: bold; font-size: 12pt;">
            PEMERINTAH KABUPATEN SAMPANG<br />
            DINAS PERHUBUNGAN<br />
            PENGUJIAN KENDARAAN BERMOTOR<br />
        </span>
        <div>Jalan Rata Pleyang No. 1A Telp./Fax (0323) 321411 </div>
        <!--<div style="margin-top:10px;">SAMPANG</div>-->
    </div>
    <hr style="border:2px solid black" />
    <center><u>SURAT KETERANGAN TIDAK LULUS UJI KENDARAAN BERMOTOR</u><br />
        <div id="no_surat">
            551.2 / TL-<?php echo strtoupper($dataHasilUji->no_tl); ?> / DISHUB-PKB / <?php echo date('Y'); ?>
        </div>
    </center>
    <p></p>
    <p></p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan PP No. 55 Tahun 2012 tentang kendaraan, Pasal 152. Setelah dilakukan pemeriksaan secara teknis dan administratif maka kendaraan Saudara :<br />
    <table style="margin-left: 40px; margin-top: 20px; margin-bottom: 20px;">
        <tr>
            <td>Nama Pemilik</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->nama_pemilik; ?></td>
        </tr>
        <tr>
            <td>Nomor Uji / Nomor Kendaraan</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->no_uji."&nbsp;&nbsp;/&nbsp;&nbsp;".$dataKendaraan->no_kendaraan; ?></td>
        </tr>
        <tr>
            <td>Merk / Type</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->merk . " / " . $dataKendaraan->tipe; ?></td>
        </tr>
        <tr>
            <td>Jenis Kendaraan</td>
            <td> : </td>
            <td><?php echo $dataKendaraan->jenis; ?></td>
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
    </table>
    Terdapat kekurangan /kerusakan yang harus diperbaiki antara lain : 
    <?php
    $data = VDetailTl::model()->findAllByAttributes(array('id_hasil_uji' => $id));
    $ul = "<ol style='margin-left:20px;'>";
    foreach ($data as $p) {
        $ul .= "<li>" . $p->kelulusan . "</li>";
    }
    $ul .= "</ol>";
    echo $ul;
    ?>
    <?php
    $tglUji = date("m/d/Y", strtotime($dataHasilUji->jdatang));
    $tglMaxBerlaku = date('m/d/Y', strtotime('+7 days', strtotime($tglUji)));
    $explodeTglUji = explode('/', $tglUji);
    $explodeTglBerlaku = explode('/', $tglMaxBerlaku);
    ?>
    <ol type="I" style="margin-top:20px">
        <li>
            Sesuai dengan kesanggupan Saudara / kuasanya, maka kendaraan tersebut akan diuji kembali di tempat yang sama pada tanggal 
            <b><?php echo $explodeTglBerlaku[1] . " " . Yii::app()->params['bulanArrayInd'][$explodeTglBerlaku[0] - 1] . " " . $explodeTglBerlaku[2]; ?></b>
        </li>
        <li>
            Buku Uji/KIR saudara akan diberikan setelah dinyatakan lulus uji dan mendapatkan pengesahan pada pelaksanaan uji ulang.
        </li>
        <li>
            Apabila pada waktu yang telah ditentukan kendaraan tidak datang untuk diuji ulang, maka akan diperlakukan sebagai pemohon / pendaftar baru.
        </li>
    </ol>
    Demikian harap menjadi maklum.
    <div class="clearfix"></div>
    <div style="float:left;">
<!--        <table style="margin-top: 40px; margin-left: 50px;">
            <tr>
                <td>&nbsp;</td>
                <td align="center">
                    &nbsp;<br />
                    Pemilik / Kuasa<br /><br /><br /><br /><br />
                    <b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b><br />
                </td>
            </tr>
        </table>-->
    </div>
    <div style="right:50; position: fixed;">
        <table>
            <tr>
                <td>&nbsp;</td>
                <td align="center">
                    Sampang, <?php echo $hari = date('d') . " " . Yii::app()->params['bulanArrayInd'][date('n') - 1] . " " . date('Y'); ?><br />
                    Penguji<br /><br /><br /><br />
                    <b><span class="nama_penguji_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dataPenguji->nama_penguji; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></b><br />
                    NRP. <?php echo $nrp; ?>
                </td>
            </tr>
        </table>
    </div>
    <!--<div class="clearfix"></div>-->
<!--    <div style="font-weight: bold; margin-top: 20px; font-size: 10pt;">
        JAM PELAYANAN PENGUJIAN KENDARAAN BERMOTOR<br />
        SENIN - KAMIS 08:00 S/D 13:00 WIB<br/>
        JUM'AT 08:00 S/D 11:00 WIB
    </div>-->
</div>
<script type="text/javascript">
    window.print();
    setTimeout(window.close, 0);
</script>