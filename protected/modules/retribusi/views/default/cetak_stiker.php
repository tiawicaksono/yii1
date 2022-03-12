<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .pages {
                margin:0;
                overflow: hidden;
            }

            @page {
                margin-left:0px;
                margin-right:0px;
                margin-top:0px;
                margin-bottom:0px;
                width: 23cm;
                height: 20cm;
            }
            @media print {
                .pages {
                    page-break-after: always;
                    font-family: Calibri;
                    font-size: 14pt;
                    font-style: normal;
                    font-variant: normal;
                    overflow: hidden;
                }
                /*
                *=====================================
                */
                #stiker{
                    padding-left: 510px;
                    padding-top: 50px;
                    font-size: 27pt;
                    text-transform: uppercase;
                }

                #masa_berlaku{
                    /*margin-top: 130px;*/
                    margin-left: 150px;
                }

                #berat_kosong{
                    margin-top: 10px;
                }

                #panjang_kendaraan{
                    margin-top: 5px;
                }
                .karoseri{
                    margin-top: -17px;
                }
                #daya_angkut{
                    margin-top: 60px;
                }
                #stiker_penguji{
                    margin-top: 100px;
                    margin-left: 120px;
                    font-size: 13pt;
                }
                #qrcodeCanvas1{
                    text-align: center;
                }
                #qrcodeCanvas2{
                    text-align: center;
                }
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="#" type="image/png">
        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile($baseUrl . '/js/jquery-1.12.0.min.js', CClientScript::POS_BEGIN);
        $cs->registerScriptFile($baseUrl . '/js/qrcode/jquery.qrcode.js', CClientScript::POS_BEGIN);
        $cs->registerScriptFile($baseUrl . '/js/qrcode/qrcode.js', CClientScript::POS_BEGIN);
        ?>
        <title>CETAK STIKER</title>

    </head>

    <body>
        <!--<div class="pages">a</div>-->
        <!--        <div class="pages">
                    <div class="kolom_kiri">
                        <div id="konten_kiri">
                            <div class="kolom_hasil_uji">&nbsp;</div>
                            <div class="kolom_keterangan">&nbsp;</div>
                        </div>
                    </div>
                    <div class="kolom_kanan">
                        <div id="konten_kanan">
                            <div class="kolom_hasil_uji">&nbsp;</div>
                            <div class="kolom_keterangan">&nbsp;</div>
                        </div>
                    </div>
                </div>-->
        <div class="pages">
            <div id="stiker">
                <?php
                $data_kend = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
                $data = TblNamaPenguji::model()->findByAttributes(array('nrp' => $penguji));
                $tgl_mati_uji = date("d", strtotime($data_kend->tgl_mati_uji));
                $bulan_mati_uji = date("n", strtotime($data_kend->tgl_mati_uji));
                $thn_mati_uji = date("Y", strtotime($data_kend->tgl_mati_uji));
                $bln_mati_uji = Yii::app()->params['blnArrayInd'][$bulan_mati_uji - 1];
                ?>
                <div id="masa_berlaku"><?php echo $tgl_mati_uji . " " . $bln_mati_uji . " " . $thn_mati_uji; ?></div>
                <div id="berat_kosong"><?php echo $jumlah_sumbu = intval($data_kend->bsumbu1) + intval($data_kend->bsumbu2) + intval($data_kend->bsumbu3) + intval($data_kend->bsumbu4) + intval($data_kend->bsumbu5); ?></div>
                <div id="panjang_kendaraan"><?php echo $data_kend->ukuran_panjang; ?></div>
                <div class="karoseri"><?php echo $data_kend->ukuran_lebar; ?></div>
                <div class="karoseri"><?php echo $data_kend->ukuran_tinggi; ?></div>
                <div class="karoseri"><?php echo $data_kend->kemjbb; ?></div>
                <div class="karoseri"><?php echo $jumlah_sumbu + $data_kend->kemorang + $data_kend->kembarang; ?></div>
                <div class="karoseri"><?php echo $data_kend->mst == "" ? "&nbsp;" : $data_kend->mst; ?></div>
                <div id="daya_angkut">
                    <?php
                    $kg = intval($data_kend->kemorang) / 60;
                    echo $kg . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data_kend->kemorang;
                    ?>
                </div>
                <div class="karoseri"><?php echo $data_kend->kembarang; ?></div>
                <div class="karoseri"><?php echo $data_kend->kls_jln; ?></div>
                <div>DISHUB KAB. NGAWI</div>
                <div id="qrcodeCanvas1" style="position: absolute; float: left; margin-left: -400px; margin-top: 70px;"></div>
                <div style="position: absolute; float: left; margin-left: -400px; margin-top: 30px;">
                    <?php echo $data_kend->no_uji; ?>
                </div>
                <div id="stiker_penguji">
                    <?php echo $data->nama_penguji; ?><br/>
                    <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data->nrp; ?>
                </div>
            </div>
        </div>
        <div class="pages">
            <div id="stiker">
                <div id="masa_berlaku"><?php echo $tgl_mati_uji . " " . $bln_mati_uji . " " . $thn_mati_uji; ?></div>
                <div id="berat_kosong"><?php echo $jumlah_sumbu = intval($data_kend->bsumbu1) + intval($data_kend->bsumbu2) + intval($data_kend->bsumbu3) + intval($data_kend->bsumbu4) + intval($data_kend->bsumbu5); ?></div>
                <div id="panjang_kendaraan"><?php echo $data_kend->ukuran_panjang; ?></div>
                <div class="karoseri"><?php echo $data_kend->ukuran_lebar; ?></div>
                <div class="karoseri"><?php echo $data_kend->ukuran_tinggi; ?></div>
                <div class="karoseri"><?php echo $data_kend->kemjbb; ?></div>
                <div class="karoseri"><?php echo $jumlah_sumbu + $data_kend->kemorang + $data_kend->kembarang; ?></div>
                <div class="karoseri"><?php echo $data_kend->mst == "" ? "&nbsp;" : $data_kend->mst; ?></div>
                <div id="daya_angkut">
                    <?php
                    $kg = intval($data_kend->kemorang) / 60;
                    echo $kg . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data_kend->kemorang;
                    ?>
                </div>
                <div class="karoseri"><?php echo $data_kend->kembarang; ?></div>
                <div class="karoseri"><?php echo $data_kend->kls_jln; ?></div>
                <div>DISHUB KAB.NGAWI</div>
                <div id="qrcodeCanvas2" style="position: absolute; float: left; margin-left: -400px; margin-top: 70px;"></div>
                <div style="position: absolute; float: left; margin-left: -400px; margin-top: 30px;">
                    <?php echo $data_kend->no_uji; ?>
                </div>
                <div id="stiker_penguji">
                    <?php echo $data->nama_penguji; ?><br/>
                    <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data->nrp; ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#qrcodeCanvas1').qrcode({
//                render: "table",
                text: "<?php echo $data_kend->no_uji; ?>"
            });
            $('#qrcodeCanvas2').qrcode({
//                render: "table",
                text: "<?php echo $data_kend->no_uji; ?>"
            });
            window.print();
            setTimeout(window.close, 0);
        </script>

    </body>
</html>