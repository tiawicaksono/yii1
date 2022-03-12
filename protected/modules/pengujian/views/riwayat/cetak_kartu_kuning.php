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
            padding: 20px;
            /*letter-spacing: 3pt;*/
            /*line-height:3em;*/
            font-style: normal;
            font-variant: normal;
        }
        .center{
            text-align: center;
        }
        .center_bawah{
            text-align: center;
            vertical-align: bottom;
        }
        .center_top{
            text-align: center;
            vertical-align: top;
        }
        .bold{
            font-weight: bold;
        }
        .border_none{
            border: none !important;
        }
        .letter_spacing{
            letter-spacing: 2px;
        }
        .font_6{
            font-size: 6pt !important;
        }
        .font_8{
            font-size: 8pt !important;
        }
        .font_9{
            font-size: 9pt !important;
        }
        .font_10{
            font-size: 10pt !important;
        }
        .font_12{
            font-size: 12pt !important;
        }
        .font_14{
            font-size: 14pt !important;
        }
        .font_18{
            font-size: 18pt !important;
        }
        .font_24{
            font-size: 24pt !important;
        }
        .clearfix:after { 
            content: "."; 
            visibility: hidden; 
            display: block; 
            height: 0; 
            clear: both;
        }
        #table_luar{
            border-collapse: collapse;
            /*width: 100%;*/
        }

        #table_luar tr td {
            border: 1px solid black;
            padding: 2px;
            font-size: 11pt;
            vertical-align: central;
            height: 20px;
        }
        .table_dalam{
            border-collapse: collapse;
        }

        .table_dalam tr td {
            border: none !important;
            padding: 5px;
            vertical-align: central;
        }
    }
</style>
<div class="pages">
    <?php
    $dataKendaraan = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
    ?>
    <table id="table_luar">
        <!--1-->
        <tr>
            <!--<td colspan="6" class="border_none">&nbsp;</td>-->
            <td colspan="8" class="center bold border_none letter_spacing font_18">
                <?php
                $no_uji = $dataKendaraan->no_uji; 
//                $arr_no_uji = str_split(strrev($no_uji));
                $arr_no_uji = str_split($no_uji);
                foreach ($arr_no_uji as $arr):
                    if($arr==' '){
                        echo "<div style='border:1px #000 solid; padding: 5px; float: left;'>&nbsp;&nbsp;</div>";
                    }else{
                        echo "<div style='border:1px #000 solid; padding: 5px; float: left;'>$arr</div>";
                    }
                endforeach;
                ?>
            </td>
        </tr>
        <tr>
            <!--<td colspan="6" class="border_none">&nbsp;</td>-->
            <td colspan="8" class="center bold border_none letter_spacing font_18">&nbsp;</td>
        </tr>
        <!--2-->
        <tr>
            <td colspan="6" class="center bold letter_spacing font_12" style="width:800px !important;">URAIAN TENTANG KENDARAAN</td>
            <td colspan="2" class="center bold letter_spacing font_12">KEISTIMEWAAN</td>
        </tr>
        <!--3-->
        <tr>
            <td colspan="6">
                <table class="table_dalam">
                    <!--1-->
                    <tr>
                        <td>1.</td>
                        <td style="width: 190px">Merek Pabrik</td>
                        <td class="center">:</td>
                        <td style="width: 220px"><?php echo $dataKendaraan->merk; ?></td>
                        <td>10.</td>
                        <td colspan="4">Rumah - rumah (karoseri)</td>
                    </tr>
                    <!--2-->
                    <tr>
                        <td>2.</td>
                        <td>Tipe</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->tipe; ?></td>
                        <td>&nbsp;</td>
                        <td style="width:15px;">a.</td>
                        <td style="width:170px;">Jenis</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->jenis." / ".$dataKendaraan->karoseri_jenis; ?></td>
                    </tr>
                    <!--3-->
                    <tr>
                        <td>3.</td>
                        <td>Tahun Pembuatan</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->tahun; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->nm_komersil; ?></td>
                    </tr>
                    <!--4-->
                    <tr>
                        <td>4.</td>
                        <td>Pemakaian Pertama</td>
                        <td class="center">:</td>
                        <td>
                            <?php 
                            if(empty($dataKendaraan->awal_pakai)) {
                                echo '-';
                            }else{
                                echo '+';
//                                $tgl_pakai = DateTime::createFromFormat('Y-m-d', $dataKendaraan->awal_pakai);
//                                $tgl = $tgl_pakai->format('d/n/Y');
//                                $explodeTgl = explode('/', $tgl);
//                                $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
//                                echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
                            }
                            ?>
                        </td>
                        <td></td>
                        <td>b.</td>
                        <td>Bahan</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->karoseri_bahan; ?></td>
                    </tr>
                    <!--5-->
                    <tr>
                        <td>5.</td>
                        <td>Nomor Landasan / Rangka</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->no_chasis; ?></td>
                        <td></td>
                        <td>c.</td>
                        <td>Banyak Tempat Duduk</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->karoseri_duduk; ?></td>
                    </tr>
                    <!--6-->
                    <tr>
                        <td>6.</td>
                        <td>Nomor Mesin</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->no_mesin; ?></td>
                        <td></td>
                        <td>d.</td>
                        <td>Banyak Tempat Berdiri</td>
                        <td class="center">:</td>
                        <td><?php echo empty($dataKendaraan->karoseri_berdiri)?'-':$dataKendaraan->karoseri_berdiri; ?></td>
                    </tr>
                    <!--7-->
                    <tr>
                        <td>7.</td>
                        <td>Panjang Total</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->dimpanjang; ?></td>
                        <td></td>
                        <td>e.</td>
                        <td colspan="3">Keterangan Lain</td>
                    </tr>
                    <!--8-->
                    <tr>
                        <td>8.</td>
                        <td>Lebar Total</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->dimlebar; ?></td>
                        <td></td>
                        <td></td>
                        <td>p1 / p2</td>
                        <td class="center">:</td>
                        <td>
                            <?php 
                            echo empty($dataKendaraan->ukp)||($dataKendaraan->ukp == '-')?'.....':$dataKendaraan->ukp;
                            echo " / ";
                            echo empty($dataKendaraan->ukp2)||($dataKendaraan->ukp2 == '-')?'.....':$dataKendaraan->ukp2; 
                            ?>
                        </td>
                    </tr>
                    <!--9-->
                    <tr>
                        <td>9.</td>
                        <td>Tinggi Total</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->dimtinggi; ?></td>
                        <td></td>
                        <td></td>
                        <td>q/r</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->ukq; ?></td>
                    </tr>
                </table>
            </td>
            <td colspan="2" rowspan="11" valign="top" style="width:100px;">
                <table class="table_dalam">
                    <!--1-->
                    <tr>
                        <td>a.</td>
                        <td colspan="3">Warna</td>
                    </tr>
                    <!--2-->
                    <tr>
                        <td>b.</td>
                        <td colspan="3">Bagian yang menganjur</td>
                    </tr>
                    <!--3-->
                    <tr>
                        <td></td>
                        <td style="width:180px">- Kebelakan (ROH)</td>
                        <td class="center">:</td>
                        <td style="width:100px"><?php echo $dataKendaraan->bagian_belakang; ?></td>
                    </tr>
                    <!--4-->
                    <tr>
                        <td></td>
                        <td>- Kedepan (FOH)</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->bagian_depan; ?></td>
                    </tr>
                    <!--5-->
                    <tr>
                        <td>c.</td>
                        <td>Jarak Terendah</td>
                        <td class="center">:</td>
                        <td><?php echo empty($dataKendaraan->bagian_jterendah)?'.....':$dataKendaraan->bagian_jterendah; ?> mm</td>
                    </tr>
                    <!--6-->
                    <tr>
                        <td></td>
                        <td>(Group clearence)</td>
                        <td class="center"></td>
                        <td></td>
                    </tr>
                    <!--7-->
                    <tr>
                        <td>d.</td>
                        <td>Konfigurasi Sumbu</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->konsumbu; ?></td>
                    </tr>
                    <!--8-->
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <!--9-->
                    <tr>
                        <td></td>
                        <td colspan="3">DATA DIMENSI/MOTOR</td>
                    </tr>
                    <!--10-->
                    <tr>
                        <td>e.</td>
                        <td>Isi Silinder (cc)</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->isi_silinder; ?></td>
                    </tr>
                    <!--11-->
                    <tr>
                        <td>f.</td>
                        <td>Daya Motor (KW/HP/PS)</td>
                        <td class="center">:</td>
                        <td><?php echo empty($dataKendaraan->daya_motor)?'.....':$dataKendaraan->daya_motor; ?></td>
                    </tr>
                    <!--12-->
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <!--13-->
                    <tr>
                        <td></td>
                        <td colspan="3">DIMENSI BAK</td>
                    </tr>
                    <!--14-->
                    <tr>
                        <td>g.</td>
                        <td>Panjang</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->ukuran_panjang; ?></td>
                    </tr>
                    <!--15-->
                    <tr>
                        <td>h.</td>
                        <td>Lebar</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->ukuran_lebar; ?></td>
                    </tr>
                    <!--16-->
                    <tr>
                        <td>i.</td>
                        <td>Tinggi</td>
                        <td class="center">:</td>
                        <td><?php echo $dataKendaraan->ukuran_tinggi; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--4-->
        <tr>
            <td colspan="5" class="center font_8">
                BERAT, DAYA ANGKUT, KELAS JALAN YANG PALING RENDAH, UKURAN BAN YANG PALING RINGAN (KECIL)
            </td>
            <td class="center bold letter_spacing font_12">KEISTIMEWAAN</td>
        </tr>
        <!--5-->
        <tr>
            <td class="center" colspan="2">0</td>
            <td class="center" style="width:100px;">1</td>
            <td class="center" style="width:70px;">2</td>
            <td class="center" style="width:70px;">3</td>
            <td rowspan="7">
                <table class="table_dalam">
                    <!--1-->
                    <tr>
                        <td>a.</td>
                        <td colspan="3">Nomor Sertifikasi Uji Tipe</td>
                    </tr>
                    <!--2-->
                    <tr>
                        <td></td>
                        <td colspan="3"><?php echo empty($dataKendaraan->no_tipe)?'.........':$dataKendaraan->no_tipe; ?></td>
                    </tr>
                    <!--3-->
                    <tr>
                        <td></td>
                        <td colspan="3" class="font_8">(Nomor pengesahan Rancang Bangun dari Ditjen Hubdat)</td>
                    </tr>
                    <!--4-->
                    <tr>
                        <td></td>
                        <td>Tanggal Diterbitkan</td>
                        <td class="center">:</td>
                        <td>
                            <?php 
                            if(empty($dataKendaraan->no_tipe)){
                                echo '.........';
                            }else{
                                $tgl_regis = DateTime::createFromFormat('Y-m-d', $dataKendaraan->tgl_regis);
                                $tgl_regis = $tgl_regis->format('d/n/Y');
                                $explodeTgl = explode('/', $tgl_regis);
                                $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
                                echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
//                                $dataKendaraan->tgl_regis; 
                            }
                            ?>
                        </td>
                    </tr>
                    <!--5-->
                    <tr>
                        <td>b.</td>
                        <td colspan="3">Nomor Sertifikasi Registrasi</td>
                    </tr>
                    <!--6-->
                    <tr>
                        <td></td>
                        <td colspan="3"><?php echo empty($dataKendaraan->no_regis)?'.........':$dataKendaraan->no_regis; ?></td>
                    </tr>
                    <!--7-->
                    <tr>
                        <td></td>
                        <td colspan="3" class="font_8">(Surat keterangan hasil pemeriksaan mutu)</td>
                    </tr>
                    <!--8-->
                    <tr>
                        <td></td>
                        <td>Diterbitkan Oleh</td>
                        <td class="center">:</td>
                        <td><?php echo empty($dataKendaraan->no_regis)?'.........':$dataKendaraan->oleh_regis; ?></td>
                    </tr>
                    <!--9-->
                    <tr>
                        <td></td>
                        <td>Tanggal Diterbitkan</td>
                        <td class="center">:</td>
                        <td>
                            <?php 
                            if(empty($dataKendaraan->no_tipe)){
                                echo '.........';
                            }else{
                                $tgl_regis = DateTime::createFromFormat('Y-m-d', $dataKendaraan->tgl_regis);
                                $tgl_regis = $tgl_regis->format('d/n/Y');
                                $explodeTgl = explode('/', $tgl_regis);
                                $bulan = Yii::app()->params['bulanArrayInd'][$explodeTgl[1] - 1];
                                echo $explodeTgl[0] . " " . $bulan . " " . $explodeTgl[2];
//                                $dataKendaraan->tgl_regis; 
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--6-->
        <tr>
            <td style="width:17px !important;">
                <table class="table_dalam">
                    <tr>
                        <td class="center">a.</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table_dalam">
                    <tr>
                        <td>JBB</td>
                        <td>............................................</td>
                        <td>Kg</td>
                    </tr>
                    <tr>
                        <td>JBKB</td>
                        <td>............................................</td>
                        <td>Kg</td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table_dalam" style="width:100%">
                    <tr>
                        <td align="right"><?php echo $dataKendaraan->kemjbb; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><?php echo $dataKendaraan->kemjbkb; ?></td>
                    </tr>
                </table>
            </td>
            <td></td>
            <td></td>
        </tr>
        <!--7-->
        <tr>
            <td class="center" style="border-bottom: none !important;">b.</td>
            <td style="border-bottom: none !important; width:230px;">Berat kendaraan sumbu ke-1 ......... Kg</td>
            <td align="right"><?php echo $bsb1 = $dataKendaraan->bsumbu1; ?></td>
            <td></td>
            <td></td>
        </tr>
        <!--8-->
        <tr>
            <td class="center" style="border-bottom: none !important; border-top: none !important;">c.</td>
            <td style="border-bottom: none !important; border-top: none !important;">Berat kendaraan sumbu ke-2 ......... Kg</td>
            <td align="right"><?php echo $bsb2 = $dataKendaraan->bsumbu2; ?></td>
            <td></td>
            <td></td>
        </tr>
        <!--9-->
        <tr>
            <td class="center" style="border-bottom: none !important; border-top: none !important;">d.</td>
            <td style="border-bottom: none !important; border-top: none !important;">Berat kendaraan sumbu ke-3 ......... Kg</td>
            <td align="right"><?php echo $bsb3 = $dataKendaraan->bsumbu3; ?></td>
            <td></td>
            <td></td>
        </tr>
        <!--10-->
        <tr>
            <td class="center" style="border-bottom: none !important; border-top: none !important;">e.</td>
            <td style="border-bottom: none !important; border-top: none !important;">Berat kendaraan sumbu ke-4 ......... Kg</td>
            <td align="right"><?php echo $bsb4 = $dataKendaraan->bsumbu4; ?></td>
            <td></td>
            <td></td>
        </tr>
        <!--11-->
        <tr>
            <td class="center" style="border-top: none !important;">f.</td>
            <td style="border-top: none !important;">Berat kendaraan sumbu ke-5 ......... Kg</td>
            <td align="right"><?php echo $bsb5 = $dataKendaraan->bsumbu5; ?></td>
            <td></td>
            <td></td>
        </tr>
        <!--12-->
        <tr>
            <td class="center">g.</td>
            <td style="padding-left:140px !important;">Jumlah ..... Kg</td>
            <td align="right">
                <?php echo $total_bsb = intval($bsb1)+intval($bsb2)+intval($bsb3)+intval($bsb4)+intval($bsb5); ?>
            </td>
            <td></td>
            <td></td>
            <td class="center bold letter_spacing font_12">PENGGUNAAN KENDARAAN KHUSUS</td>
        </tr>
        <!--13-->
        <tr>
            <td style="border-bottom: none !important" class="center">h.</td>
            <td style="border-bottom: none !important">Daya Angkut Orang ...................... Kg</td>
            <td align="right"><?php echo $orang = $dataKendaraan->kemorang; ?></td>
            <td></td>
            <td></td>
            <td rowspan="5">
                <table class="table_dalam">
                    <tr>
                        <td>a.</td>
                        <td>Jenis Barang Khusus diijinkan diangkut</td>
                    </tr>
                    <tr>
                        <td colspan="2">...........</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>Jenis Penggunaan Khusus yang diijinkan</td>
                    </tr>
                    <tr>
                        <td colspan="2">...........</td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--14-->
        <tr>
            <td style="border-top: none !important" class="center">i.</td>
            <td style="border-top: none !important">Daya Angkut Barang ..................... Kg</td>
            <td align="right"><?php echo $barang = $dataKendaraan->kembarang; ?></td>
            <td></td>
            <td></td>
            <td rowspan="2" colspan="2" class="center bold letter_spacing font_10">PENGIRIMAN KARTU</td>
        </tr>
        <!--15-->
        <tr>
            <td class="center">j.</td>
            <td>Jumlah berat yang diijinkan .......... Kg</td>
            <td align="right"><?php echo $total_bsb+intval($orang)+intval($barang); ?></td>
            <td></td>
            <td></td>
        </tr>
        <!--16-->
        <tr>
            <td style="border-bottom: none !important" class="center">k.</td>
            <td style="border-bottom: none !important">Muatan sumbu yang paling berat .. Kg</td>
            <td align="right"><?php echo $dataKendaraan->mst; ?></td>
            <td></td>
            <td></td>
            <td rowspan="2" class="center" style="width:140px !important;">TANGGAL</td>
            <td rowspan="2" class="center" style="width:140px !important;">KE</td>
        </tr>
        <!--17-->
        <tr>
            <td style="border-top: none !important" class="center">l.</td>
            <td style="border-top: none !important">Kelas jalan terendah</td>
            <td align="center"><?php echo $dataKendaraan->kls_jln; ?></td>
            <td></td>
            <td></td>
        </tr>
        <!--18-->
        <tr>
            <td style="border-bottom: none !important" class="center">m.</td>
            <td style="border-bottom: none !important">Pemakaian sumbu ke-1</td>
            <td><?php echo $dataKendaraan->psumbu1; ?></td>
            <td></td>
            <td></td>
            <td rowspan="5">
                <table class="table_dalam">
                    <!--1-->
                    <tr>
                        <td colspan="5">JARAK SUMBU</td>
                    </tr>
                    <!--2-->
                    <tr>
                        <td>a.</td>
                        <td style="width:150px;">Jarak Sumbu I-II</td>
                        <td class="center">:</td>
                        <td style="width:50px;"><?php echo empty($dataKendaraan->jsumbu1)?'.....':$dataKendaraan->jsumbu1; ?></td>
                        <td>mm</td>
                    </tr>
                    <!--3-->
                    <tr>
                        <td>b.</td>
                        <td>Jarak Sumbu II-III</td>
                        <td class="center">:</td>
                        <td><?php echo empty($dataKendaraan->jsumbu2)?'.....':$dataKendaraan->jsumbu2; ?></td>
                        <td>mm</td>
                    </tr>
                    <!--4-->
                    <tr>
                        <td>c.</td>
                        <td>Jarak Sumbu III-IV</td>
                        <td class="center">:</td>
                        <td><?php echo empty($dataKendaraan->jsumbu3)?'.....':$dataKendaraan->jsumbu3; ?></td>
                        <td>mm</td>
                    </tr>
                    <!--5-->
                    <tr>
                        <td>d.</td>
                        <td>Jarak Sumbu IV-V</td>
                        <td class="center">:</td>
                        <td><?php echo empty($dataKendaraan->jsumbu4)?'.....':$dataKendaraan->jsumbu4; ?></td>
                        <td>mm</td>
                    </tr>
                </table>
            </td>
            <td></td>
            <td></td>
        </tr>
        <!--19-->
        <tr>
            <td style="border-bottom: none !important; border-top: none !important;" class="center">n.</td>
            <td style="border-bottom: none !important; border-top: none !important;">Pemakaian sumbu ke-2</td>
            <td><?php echo $dataKendaraan->psumbu2; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <!--20-->
        <tr>
            <td style="border-bottom: none !important; border-top: none !important;" class="center">o.</td>
            <td style="border-bottom: none !important; border-top: none !important;">Pemakaian sumbu ke-3</td>
            <td><?php echo $dataKendaraan->psumbu3; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <!--21-->
        <tr>
            <td style="border-bottom: none !important; border-top: none !important;" class="center">p.</td>
            <td style="border-bottom: none !important; border-top: none !important;">Pemakaian sumbu ke-4</td>
            <td><?php echo $dataKendaraan->psumbu4; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <!--22-->
        <tr>
            <td style="border-top: none !important;" class="center">q.</td>
            <td style="border-top: none !important;">Pemakaian sumbu ke-5</td>
            <td><?php echo $dataKendaraan->psumbu5; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
<div class="pages" style="margin-top:20px;">
    <table id="table_luar">
        <tr>
            <td colspan="26" class="center bold border_none letter_spacing font_18">
                <?php
                $no_uji = $dataKendaraan->no_uji; 
//                $arr_no_uji = str_split(strrev($no_uji));
                $arr_no_uji = str_split($no_uji);
                foreach ($arr_no_uji as $arr):
                    if($arr==' '){
                        echo "<div style='border:1px #000 solid; padding: 5px; float: left;'>&nbsp;&nbsp;</div>";
                    }else{
                        echo "<div style='border:1px #000 solid; padding: 5px; float: left;'>$arr</div>";
                    }
                endforeach;
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="26" class="center bold border_none letter_spacing font_18">&nbsp;</td>
        </tr>
        <tr>
            <td class="center_top font_9" style="border-bottom: none;">1</td>
            <td class="center_top font_9" style="border-bottom: none;">2</td>
            <td class="center_top font_9" style="border-bottom: none;">3</td>
            <td class="center_top font_9" style="border-bottom: none;">4</td>
            <td class="center_top font_9" style="border-bottom: none;">5</td>
            <td class="center_top font_9">6<br/>8-15</td>
            <td class="center_top font_9">7<br/>16-20</td>
            <td class="center_top font_9">8<br/>21-25</td>
            <td class="center_top font_9">9<br/>26-30</td>
            <td class="center_top font_9">10<br/>31-35</td>
            <td class="center_top font_9">11<br/>36-40</td>
            <td class="center_top font_9">12<br/>&GT;40</td>
            <td class="center_top font_9" style="border-bottom: none;">13</td>
            <td class="center_top font_9" style="border-bottom: none;">14</td>
            <td class="center_top font_9" style="border-bottom: none;">15</td>
            <td class="center_top font_9" style="border-bottom: none;">16</td>
            <td class="center_top font_9" style="border-bottom: none;">17</td>
            <td class="center_top font_9" style="border-bottom: none;">18</td>
            <td class="center_top font_9" style="border-bottom: none;">19</td>
            <td class="center_top font_9" style="border-bottom: none;">20</td>
            <td class="center_top font_9" style="border-bottom: none;">21</td>
            <td class="center_top font_9" style="border-bottom: none;">22</td>
            <td class="center_top font_9" style="border-bottom: none;">23</td>
            <td class="center_top font_9" style="border-bottom: none;">24</td>
            <td class="center_top font_9" style="border-bottom: none;">25</td>
            <td class="center_top font_9" style="border-bottom: none;">26</td>
        </tr>
        <tr>
            <td class="center_bawah font_9" style="height:50px; width:33px; border-top: none;">Bensin<br />Solar</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">Minyak<br/>mentah</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">Minyak<br/>tanah<br/>atau<br/>Campur</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">Gas<br/>Arang<br/>Kayu</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">lain-lain</td>
            <td class="center_bawah font_9" style="width:33px;">0 - 500 Kg</td>
            <td class="center_bawah font_9" style="width:33px;">501 - 1000 Kg</td>
            <td class="center_bawah font_9" style="width:33px;">1001 - 1500 Kg</td>
            <td class="center_bawah font_9" style="width:33px;">1501 - 2000 Kg</td>
            <td class="center_bawah font_9" style="width:33px;">2001 - 2500 Kg</td>
            <td class="center_bawah font_9" style="width:33px;">2500 - 3000 Kg</td>
            <td class="center_bawah font_9" style="width:33px;">3500 Kg</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">3501 - 4000 Kg</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">lebih dari 4000 Kg</td>
            <td style="border-top: none;">&nbsp;</td>
            <td style="border-top: none;">&nbsp;</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">0 dan 1 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">2 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">3 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">4 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">5 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">6 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">7 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">8 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">9 Tahun</td>
            <td class="center_bawah font_9" style="width:33px; border-top: none;">lebih dari 9 Tahun</td>
        </tr>
        <tr>
            <td colspan="5" class="center font_9">Bahan bakar mesin : <?php echo $dataKendaraan->bahan_bakar; ?></td>
            <td colspan="9" class="center font_9">Daya angkut : orang atau barang <?php echo $dataKendaraan->bahan_bakar; ?></td>
            <td class="center font_9">Umum</td>
            <td class="center font_9">Tidak Umum</td>
            <td colspan="10" class="center font_9">Umur</td>
        </tr>
        <tr>
            <td colspan="5" class="center font_9">Jenis : <?php echo $dataKendaraan->karoseri_jenis; ?></td>
            <td colspan="21" class="center font_9">
                Buku pemeriksaan diberikan di : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Pada tanggal : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Tahun :
            </td>
        </tr>
        <tr>
            <td colspan="4" class="center bold font_12">Tgl Terbit</td>
            <td colspan="3" class="center bold font_12">No. Kendaraan</td>
            <td colspan="8" class="center bold font_12">Nama Pemilik</td>
            <td colspan="11" class="center bold font_12">Alamat Pemilik</td>
        </tr>
        <tr>
            <td colspan="4" class="center font_12" style="height:40px;"><?php echo date('d')." ".Yii::app()->params['bulanArrayInd'][date('n') - 1]." ".date('Y');?></td>
            <td colspan="3" class="center font_12"><?php echo $dataKendaraan->no_kendaraan; ?></td>
            <td colspan="8" class="center font_12"><?php echo $dataKendaraan->nama_pemilik; ?></td>
            <td colspan="11" class="center font_12"><?php echo $dataKendaraan->alamat; ?></td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">Tempat dan Tanggal Uji Kendaraan</td>
            <td colspan="3" class="center">Tanggal Tak Berlaku Lagi Tanda Uji</td>
            <td colspan="11" class="center font_12">CATATAN</td>
            <td colspan="8" class="center font_12">Tanda Tangan Juru Periksa / Penguji</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center" style="height:40px;">&nbsp;</td>
            <td colspan="3" class="center">&nbsp;</td>
            <td colspan="11" class="center font_12">&nbsp;</td>
            <td colspan="8" class="center font_12">&nbsp;</td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    window.print();
    setTimeout(window.close, 0);
</script>