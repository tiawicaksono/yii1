<html lang="en">
    <head>
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
                .center{
                    text-align: center;
                }
                #header{
                    text-align: center;
                    letter-spacing: 2px;
                    font-size: 10pt;
                    padding-left: 90px;
                    margin-bottom: 20px;
                }
                #header2{
                    width: 100%;
                }
                #sebelah_kiri{
                    float: left;
                    width: 50%;
                }
                #sebelah_kanan{
                    float: left;
                    width: 50%;
                    /*padding-left:100px;*/ 
                }
                #logo_kab_situbondo{
                    position: absolute; 
                    margin-left: -120px;
                }
                .ttd{
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
        <title>Print Rekom</title>
    </head>

    <body>
        <div class="pages watermarked">
            <?php
            $path = $this->module->assetsUrl;
            $dataRekom = TblRekom::model()->findByPk($id_rekom);
            $dataKendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
            ?>
            <div id="header">
                <img id="logo_kab_situbondo" src="<?php echo Yii::app()->baseUrl . "/images/logo.png"; ?>" width="120px" />
                <span style="font-weight: bold; font-size: 18pt; letter-spacing: 4px;">
                    PEMERINTAH KABUPATEN PAMEKASAN<br />
                    DINAS PERHUBUNGAN<br />
                </span>
                <div style="margin-top:10px;">Jl. Bonorogo No.88 Telp. (0324) 326130, 322440 Fax. (0324) 322516 <br />PAMEKASAN 69323<br /></div>
            </div>
            <hr />
            <center><u>SURAT KETERANGAN REKOMENDASI TEKNIS KENDARAAN BERMOTOR</u><br />
                <div id="no_surat">551.23/<?php echo $dataRekom->no_surat; ?>/432.313/<?php echo date('Y'); ?></div>
            </center>
            <p></p>
            <p></p>
            <div style="margin-left: 25px;">
                Setelah diteliti dengan memperhatikan : 
            </div>
            <div>
                <ol>
                    <?php
                    if ($dataRekom->uji_pertama == true) {
                        ?>
                        <li>
                            &nbsp;&nbsp;Permohonan pendaftaran kendaraan
                        </li>
                    <?php } ?>
                    <?php
                    if ($dataRekom->mutmasuk == true) {
                        ?>
                        <li>
                            &nbsp;&nbsp;Permohonan pemilik mutasi masuk kendaraan bermotor <?php echo ucwords(strtolower($dataKendaraan->nm_komersil)); ?>
                        </li>
                        <li>
                            &nbsp;&nbsp;Surat Mutasi Uji Kendaraan Dinas Perhubungan Pemerintah 
                            <?php
                            $id_provinsi_mutmas = $dataRekom->id_provinsi_mutmas;
                            $id_kota_mutmas = $dataRekom->id_kota_mutmas;
                            $mProv = MProvinsi::model()->findByAttributes(array('id_provinsi' => $id_provinsi_mutmas));
                            $mKota = MKota::model()->findByAttributes(array('id_kota' => $id_kota_mutmas));
                            echo ucwords(strtolower($mKota->nama)) . ", " . ucwords(strtolower($mProv->nama));
                            ?>
                            Nomor : <?php echo $dataRekom->no_rekom_mutmasuk; ?>, 
                            Tanggal : 
                            <?php
                            $tgl_no_rekom_mutmasuk = date("d", strtotime($dataRekom->tgl_rekom_mutmas));
                            $bulan_no_rekom_mutmasuk = date("n", strtotime($dataRekom->tgl_rekom_mutmas));
                            $thn_no_rekom_mutmasuk = date("Y", strtotime($dataRekom->tgl_rekom_mutmas));
                            $bln_no_rekom_mutmasuk = Yii::app()->params['bulanArrayInd'][$bulan_no_rekom_mutmasuk - 1];
                            echo $tgl_no_rekom_mutmasuk . " " . $bln_no_rekom_mutmasuk . " " . $thn_no_rekom_mutmasuk;
                            ?>
                        </li>
                    <?php } ?>

                    <?php
                    if ($dataRekom->ubhsifat == true) {
                        ?>
                        <li>
                            &nbsp;&nbsp;Permohonan pemilik ubah sifat kendaraan bermotor dari <?php echo ucwords(strtolower($dataRekom->ket_ubah_sifat)); ?>
                        </li>
                    <?php } ?>
                    <?php
                    if ($dataRekom->ubhbentuk == true) {
                        ?>
                        <li>
                            &nbsp;&nbsp;Permohonan pemilik ubah bentuk kendaraan bermotor dari <?php echo ucwords(strtolower($dataRekom->ket_ubah_bentuk)); ?>
                        </li>
                    <?php } ?>

                    <?php
                    $tgl_no_srut = date("d", strtotime($dataKendaraan->tgl_regis));
                    $bulan_no_srut = date("n", strtotime($dataKendaraan->tgl_regis));
                    $thn_no_srut = date("Y", strtotime($dataKendaraan->tgl_regis));
                    $bln_no_srut = Yii::app()->params['bulanArrayInd'][$bulan_no_srut - 1];

                    $tgl_no_faktur = date("d", strtotime($dataKendaraan->tgl_tipe));
                    $bulan_no_faktur = date("n", strtotime($dataKendaraan->tgl_tipe));
                    $thn_no_faktur = date("Y", strtotime($dataKendaraan->tgl_tipe));
                    $bln_no_faktur = Yii::app()->params['bulanArrayInd'][$bulan_no_faktur - 1];

                    $tgl_no_rancang = date("d", strtotime($dataKendaraan->tgl_rancang));
                    $bulan_no_rancang = date("n", strtotime($dataKendaraan->tgl_rancang));
                    $thn_no_rancang = date("Y", strtotime($dataKendaraan->tgl_rancang));
                    $bln_no_rancang = Yii::app()->params['bulanArrayInd'][$bulan_no_rancang - 1];
                    ?>

                    <?php
                    if ($dataRekom->ubhbentuk == true || $dataRekom->uji_pertama == true) {
                        ?>
                        <?php if(!empty($dataKendaraan->no_regis)){ ?>
                            <li>
                                &nbsp;&nbsp;Sertifikat registrasi uji tipe <?php echo ucwords(strtolower($dataKendaraan->oleh_regis)); ?> 
                                <?php
                                if (!empty($dataKendaraan->no_regis)) {
                                    ?>
                                    Nomor : <?php echo $dataKendaraan->no_regis; ?>, 
                                    Tanggal : <?php echo $tgl_no_srut . " " . $bln_no_srut . " " . $thn_no_srut; ?> 
                                <?php } ?>
                            </li>
                        <?php } ?>
                        <?php
                        if ($dataRekom->uji_pertama == true) {
                            ?>
                            <?php if(!empty($dataKendaraan->no_tipe)){ ?>
                                <li>
                                    &nbsp;&nbsp;Faktur <?php echo ucwords(strtolower($dataKendaraan->nama_pemilik)); ?> 
                                    <?php
                                    if (!empty($dataKendaraan->no_tipe)) {
                                        ?>
                                        Nomor : <?php echo $dataKendaraan->no_tipe; ?>, 
                                        Tanggal : <?php echo $tgl_no_faktur . " " . $bln_no_faktur . " " . $thn_no_faktur; ?> 
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if(!empty($dataKendaraan->no_rancang)){ ?>
                            <li>
                                &nbsp;&nbsp;Surat keterangan hasil pemeriksaan spesifikasi Teknis Kendaraan Bermotor 
                                <?php
                                if (!empty($dataKendaraan->no_rancang)) {
                                    ?>
                                    Nomor : <?php echo $dataKendaraan->no_rancang; ?>, 
                                    Tanggal : <?php echo $tgl_no_rancang . " " . $bln_no_rancang . " " . $thn_no_rancang; ?> 
                                <?php } ?>
                            </li>
                        <?php } ?>
                    <?php } ?>

                </ol>
            </div>
            <div style="margin-left: 25px;">
                Kendaraan di bawah ini memenuhi syarat untuk didaftarkan dan atau diujikan dengan spesifikasi 
            </div>
            <table style="margin-left: 25px; margin-top: 10px; margin-bottom: 10px;">
                <tr>
                    <td>1.</td>
                    <td width="200px">No. Uji / No. Kendaraan</td>
                    <td> : </td>
                    <td>
                        <?php
                        if ($id_uji != 9) {
                            echo $dataKendaraan->no_uji . ' / ' . $dataKendaraan->no_kendaraan;
                        } else {
                            echo "BARU";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Nama Pemilik</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->nama_pemilik; ?></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Alamat Pemilik</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->alamat; ?></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Jenis Kendaraan</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->jenis; ?></td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Nomor Rangka / Landasan</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->no_chasis; ?></td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Nomor Mesin</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->no_mesin; ?></td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Bahan Bakar</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->bahan_bakar; ?></td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Merk / Tipe / Tahun</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->merk . " / " . $dataKendaraan->tipe . " / " . $dataKendaraan->tahun; ?></td>
                </tr>
                <tr>
                    <td>9.</td>
                    <td>Nama Pembuat/Perakit/Pengimpor</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->pengimport == "" ? "-" : $dataKendaraan->pengimport; ?></td>
                </tr>
                <tr>
                    <td valign='top'>10.</td>
                    <td valign='top'>Dimensi Utama</td>
                    <td valign='top'> : </td>
                    <td valign='top'>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>a. Panjang Total</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->ukuran_panjang; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                        <tr>
                                            <td>b. Lebar Total</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->ukuran_lebar; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                        <tr>
                                            <td>c. Tinggi Total</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->ukuran_tinggi; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td colspan="4">d. Bagian yang mengganjur</td>
                                        </tr>
                                        <tr>
                                            <td>- Ke Depan</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->bagian_depan; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                        <tr>
                                            <td>- Ke Belakang</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->bagian_belakang; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign='top'>11.</td>
                    <td valign='top'>Jarak Sumbu</td>
                    <td valign='top'> : </td>
                    <td valign='top'>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>a. S1 - S2</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->jsumbu1; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                        <tr>
                                            <td>b. S2 - S3</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->jsumbu2 == "" ? "-" : $dataKendaraan->jsumbu2; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>c. S3 - S4</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->jsumbu3 == "" ? "-" : $dataKendaraan->jsumbu3; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                        <tr>
                                            <td>d. S4 - S5</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->jsumbu4 == "" ? "-" : $dataKendaraan->jsumbu4; ?> </td>
                                            <td> mm</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>12.</td>
                    <td>Isi Silinder / Daya Motor</td>
                    <td> : </td>
                    <td>
                        <?php
                        echo $dataKendaraan->isi_silinder . " cc / ";
                        echo $dataKendaraan->daya_motor == '' ? '-' : $dataKendaraan->daya_motor;
                        echo " ps/kw";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>13.</td>
                    <td>Konfigurasi Sumbu</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->konsumbu; ?></td>
                </tr>
                <tr>
                    <td valign='top'>14.</td>
                    <td valign='top'>Kemampuan kendaraan menurut pabrik</td>
                    <td valign='top'> : </td>
                    <td valign='top'>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>a. Sb 1</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->bsumbu1 == "" ? "-" : $dataKendaraan->bsumbu1; ?> </td>
                                            <td> Kg</td>
                                        </tr>
                                        <tr>
                                            <td>b. Sb 2</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->bsumbu2 == "" ? "-" : $dataKendaraan->bsumbu2; ?> </td>
                                            <td> Kg</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>c. Sb 3</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->bsumbu3 == "" ? "-" : $dataKendaraan->bsumbu3; ?> </td>
                                            <td> Kg</td>
                                        </tr>
                                        <tr>
                                            <td>d. Sb 4</td>
                                            <td> : </td>
                                            <td> <?php echo $dataKendaraan->bsumbu4 == "" ? "-" : $dataKendaraan->bsumbu4; ?> </td>
                                            <td> Kg</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>15.</td>
                    <td>JBB</td>
                    <td> : </td>
                    <td><?php echo $dataKendaraan->kemjbb . " Kg"; ?></td>
                </tr>
                <tr>
                    <td>16.</td>
                    <td>Memenuhi Syarat Sebagai</td>
                    <td> : </td>
                    <td><b><?php echo strtoupper($dataKendaraan->nm_komersil); ?></b></td>
                </tr>
                <tr>
                    <td>17.</td>
                    <td>Status Pengguna</td>
                    <td> : </td>
                    <td><b><?php echo strtoupper($dataKendaraan->sifat); ?></b></td>
                </tr>
                <tr>
                    <td>18.</td>
                    <td>Bahan Utama Rumah-rumah</td>
                    <td> : </td>
                    <td><b><?php echo strtoupper($dataKendaraan->karoseri_bahan); ?></b></td>
                </tr>
                <tr>
                    <td>19.</td>
                    <td>Jenis Rumah-rumah</td>
                    <td> : </td>
                    <td><b><?php echo strtoupper($dataKendaraan->karoseri_jenis); ?></b></td>
                </tr>
            </table>

            <div style="margin-left: 25px; margin-bottom: 10px;">Demikian surat keterangan ini untuk digunakan sebagaimana mestinya.</div>
            <div style="float:left;">
                <table style="margin-top: 10px; margin-right: 10px;">
                    <tr>
                        <td>
                            <b>KETERANGAN: </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Surat Rekomendasi ini berlaku selama tidak ada
                        </td>
                    </tr>
                    <tr>
                        <td>
                            pengajuan perubahan spesifikasi teknik kendaraan
                        </td>
                    </tr>
                </table>
            </div>
            <div style="float:right;">
                <?php
                $dtKadis = TblKepalaDinas::model()->findByAttributes(array('id_kepala_dinas' => $ttd));
                ?>
                <table style="margin-top: 10px; margin-right: 10px;">
                    <tr>
                        <td align="center">
                            Pamekasan, <?php echo date('d') . " " . Yii::app()->params['bulanArrayInd'][date('n') - 1] . " " . date('Y'); ?><br />
                            KEPALA DINAS PERHUBUNGAN
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            KABUPATEN PAMEKASAN
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
                            <!--<img id="ttd" src="<?php // echo Yii::app()->baseUrl . "/images/ttd_kadis.png";   ?>" width="170px" />-->
                        </td>
                    </tr>
                    <tr><td align="center"><b><u><?php echo $dtKadis->nama; ?></u></b></td></tr>
                    <tr><td align="center"><?php echo $dtKadis->pangkat; ?></td></tr>
                    <tr><td align="center">NIP. <?php echo $dtKadis->nip; ?></td></tr>
                </table>
            </div>
        </div>
        <script type="text/javascript">
            window.print();
//            setTimeout(window.close, 0);
        </script>
    </body>
</html>