<html lang="en">

<head>
    <style>
        .pages {
            /*                width: 24cm;
                                height: 28cm;*/
            margin: 0;
            overflow: hidden;
        }

        @page {
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        @media print {
            /* .pages {
                page-break-after: always;
                }*/

            .pages {
                page-break-after: always;
                overflow: hidden;
                /*border: 1px solid black;*/
                padding: 20px;
                /*letter-spacing: 3pt;*/
                /*line-height:3em;*/
                font-style: normal;
                font-variant: normal;
                font-size: 12pt;
            }

            .center {
                text-align: center;
            }

            #header {
                text-align: center;
                letter-spacing: 2px;
                font-size: 10pt;
                padding-left: 90px;
                padding-top: 50px;
            }

            #header2 {
                width: 100%;
            }

            #sebelah_kiri {
                float: left;
                width: 50%;
            }

            #sebelah_kanan {
                float: left;
                width: 50%;
                /*padding-left:100px;*/
            }

            #logo {
                position: absolute;
                margin-left: -120px;
                margin-top: -20px;
            }

            .ttd {
                height: 70px;
            }

            /*                .watermarked {
                                    position: relative;
                                }
                
                                .watermarked:after {
                                    content: "";
                                    display: block;
                                    width: 100%;
                                    height: 100%;
                                    position: absolute;
                                    top: 0px;
                                    left: 0px;
                                    background-image: url("<?php echo Yii::app()->baseUrl . "/images/logo_dishub.png"; ?>");
                                    background-size: 100px 100px;
                                    background-position: 30px 30px;
                                    background-repeat: no-repeat;
                                    opacity: 0.7;
                                }*/
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <!-- <title>Print Mutasi Keluar</title> -->
</head>

<body>
    <div class="pages watermarked">
        <?php
        $path = $this->module->assetsUrl;
        $dataRekom = TblRekom::model()->findByPk($id_rekom);
        $dataKendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
        if ($id_uji == 5) {
            $id_provinsi = $dataRekom->id_provinsi_mutke;
            $id_kota = $dataRekom->id_kota_mutke;
        } else {
            $id_provinsi = $dataRekom->id_provinsi_numke;
            $id_kota = $dataRekom->id_kota_numke;
        }
        $mProv = MProvinsi::model()->findByAttributes(array('id_provinsi' => $id_provinsi));
        $mKota = MKota::model()->findByAttributes(array('id_kota' => $id_kota));
        ?>
        <div id="header">
            <img id="logo" src="<?php echo Yii::app()->baseUrl . "/images/kota.png"; ?>" width="85px" />
            <span style="font-weight: bold; font-size: 18pt; letter-spacing: 4px;">
                PEMERINTAH KABUPATEN SAMPANG<br />
                DINAS PERHUBUNGAN<br />
            </span>
            <div style="margin-top:10px;">Jl. Raya Pliyang No. 1A Sampang<br />Kabupaten Sampang, Jawa Timur 69216</div>
        </div>
        <hr />
        <div id="header2">
            <div id="sebelah_kiri">
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td> : </td>
                        <td>551/<?php echo ($id_uji == 5) ? $dataRekom->no_surat_mutke : $dataRekom->no_surat_numke; ?>/<?php echo ($id_uji == 5) ? 'MK' : 'NUK'; ?>/434.209/<?php echo date('Y'); ?></td>
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        <td> : </td>
                        <td>Biasa</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td> : </td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td> : </td>
                        <td><b><u><?php echo ($id_uji == 5) ? 'Mutasi Kendaraan Keluar Daerah' : 'Numpang Uji Keluar Daerah'; ?></u></b></td>
                    </tr>
                </table>
            </div>
            <div id="sebelah_kanan">
                <table style="margin-left: 120px;">
                    <tr>
                        <td>Sampang,
                            <?php
                            echo date('d') . " " . Yii::app()->params['bulanArrayInd'][date('m') - 1] . " " . date('Y');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Kepada,</td>
                    </tr>
                    <tr>
                        <td>Yth. Kepala Dinas Perhubungan</td>
                    </tr>
                    <tr>
                        <td><?php echo ucwords(strtolower($mKota->nama)); ?></td>
                    </tr>
                    <tr>
                        <td>di,</td>
                    </tr>
                    <tr>
                        <td><b><u><?php echo ucwords(strtolower($mKota->nama)); ?></u></b></td>
                    </tr>
                </table>
            </div>
        </div>
        <p>&nbsp;</p>
        <div style="margin-left: 70px; margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan ini disampaikan bahwa kendaraan bermotor sebagai berikut :</div>
        <table style="margin-left: 70px; margin-bottom: 10px;">
            <tr>
                <td width="200px">Nomor Uji</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->no_uji; ?></td>
            </tr>
            <tr>
                <td>Nomor Kendaraan</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->no_kendaraan; ?></td>
            </tr>
            <tr>
                <td>Nama Pemilik</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->nama_pemilik; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->alamat; ?></td>
            </tr>
            <tr>
                <td>Merk / Type</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->merk . " / " . $dataKendaraan->tipe; ?></td>
            </tr>
            <tr>
                <td>Model</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->karoseri_jenis . " ( " . $dataKendaraan->sifat . " ) "; ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->tahun; ?></td>
            </tr>
            <tr>
                <td>Nomor Rangka / Landasan</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->no_chasis; ?></td>
            </tr>
            <tr>
                <td>Nomor Mesin</td>
                <td> : </td>
                <td><?php echo $dataKendaraan->no_mesin; ?></td>
            </tr>
        </table>
        <?php
        $criteriaVRiwayat = new CDbCriteria();
        $criteriaVRiwayat->order = 'id_riwayat DESC';
        $criteriaVRiwayat->limit = 1;
        $criteriaVRiwayat->addCondition("id_kendaraan = $id_kendaraan");
        $dataRiwayat = VRiwayat::model()->find($criteriaVRiwayat);
        // echo $dataRiwayat->id_kendaraan;
        if (!empty($dataRiwayat)) {
        ?>
            <div style="margin-left: 70px; margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kendaraan tersebut diatas terakhir diuji berkala :</div>
            <table style="margin-left: 70px; margin-bottom: 10px;">
                <tr>
                    <td width="200px">Tempat</td>
                    <td> : </td>
                    <td>SAMPANG</td>
                </tr>
                <tr>
                    <td>Tanggal Berakhir Uji</td>
                    <td> : </td>
                    <td>
                        <?php
                        $tglMatiUji = date("m/d/Y", strtotime($dataRiwayat->tglmati));
                        $explodeTglMati = explode('/', $tglMatiUji);
                        echo $explodeTglMati[1] . " " . Yii::app()->params['bulanArrayInd'][$explodeTglMati[0] - 1] . " " . $explodeTglMati[2];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Nama Penguji</td>
                    <td> : </td>
                    <td><?php echo $dataRiwayat->nama_penguji; ?></td>
                </tr>
                <tr>
                    <td>NRP</td>
                    <td> : </td>
                    <td><?php echo $dataRiwayat->nrp; ?></td>
                </tr>
            </table>
        <?php } else { ?>
            <div style="margin-left: 70px; margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kendaraan tersebut diatas belum pernah uji di SAMPANG</div>
        <?php } ?>


        <?php if ($id_uji == 5) { ?>
            <div style="margin-left: 70px; margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sesuai dengan permohonan pemilik kendaraan tersebut, memenuhi syarat untuk dimutasi
                ke Dinas Perhubungan <?php echo ucwords(strtolower($mKota->nama)) . ", " . ucwords(strtolower($mProv->nama)); ?> dengan pemilik baru : </div>
            <table style="margin-left: 70px; margin-bottom: 10px;">
                <tr>
                    <td width="200px">Nama</td>
                    <td> : </td>
                    <td><?php echo strtoupper($dataRekom->pemilik_baru); ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    <td><?php echo strtoupper($dataRekom->alamat_baru); ?></td>
                </tr>
            </table>
        <?php } else { ?>
            <div style="margin-left: 70px; margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sesuai dengan permohonan pemilik,
                kendaraan tersebut tidak keberatan diuji di Dinas Perhubungan <?php echo ucwords(strtolower($mKota->nama)) . ", " . ucwords(strtolower($mProv->nama)); ?>
                untuk satu kali uji dan hasil pengujiannya segera dikirim ke Dinas Perhubungan Kabupaten Sampang, Jawa Timur</div>
        <?php } ?>
        <div style="margin-left: 70px; margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan kepada saudara, untk mendapatkan penyelesaian lebih lanjut.</div>
        <div style="float:right;">
            <?php
            $dtKadis = Kepaladinas::model()->findByAttributes(array('idx' => $ttd));
            ?>
            <table style="margin-top: 10px; margin-right: 10px;">
                <tr>
                    <td align="center">
                        KEPALA DINAS PERHUBUNGAN
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        KABUPATEN SAMPANG
                    </td>
                </tr>
                <?php
                if ($ttd == 2) {
                ?>
                    <tr>
                        <td align="center">
                            U.b
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            Kepala Bidang Pengujian Kendaraan Bermotor
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td align="center" class="ttd">
                        <!--<img id="ttd" src="<?php // echo Yii::app()->baseUrl . "/images/ttd_kadis.png";  
                                                ?>" width="170px" />-->
                    </td>
                </tr>
                <tr>
                    <td align="center"><b><u><?php echo $dtKadis->nama; ?></u></b></td>
                </tr>
                <tr>
                    <td align="center"><?php echo $dtKadis->pangkat; ?></td>
                </tr>
                <tr>
                    <td align="center">NIP. <?php echo $dtKadis->nip; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
        //            setTimeout(window.close, 0);
    </script>
</body>

</html>