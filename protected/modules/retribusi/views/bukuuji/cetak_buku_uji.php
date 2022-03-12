<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile($baseUrl . '/js/jquery-1.12.0.min.js', CClientScript::POS_BEGIN);
        $cs->registerScriptFile($baseUrl . '/js/qrcode/jquery.qrcode.buku.js', CClientScript::POS_BEGIN);
        $cs->registerScriptFile($baseUrl . '/js/qrcode/qrcode.js', CClientScript::POS_BEGIN);
        ?>
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
            }
            @media print {
                .pages {
                    page-break-after: always;
                    font-family: Calibri;
                    font-style: normal;
                    font-variant: normal;
                    overflow: hidden;
                }
                .kolom_kiri{
                    float: left;
                    width: 50%;
                    max-width: 50%;
                    height: 100%;
                    margin: 0px;
                    padding:0px;
                    display: inline-block;
                    /*border: 1px solid #000;*/
                }
                .kolom_kanan{
                    float: left;
                    width: 50%;
                    max-width: 50%;
                    height: 100%;
                    margin: 0px;
                    padding:0px;
                    display: inline-block;
                    /*border: 1px solid #000;*/
                }
                /*=================================*/
                /*
                *PAGE 1
                */
                /*=================================*/
                #no_urut_kendaraan{
                    width: 100%;
                    font-weight: bold;
                    font-size: 16pt;
                    margin-top: 380px;
                }
                #konten_kanan_page1{
                    width: 100%;
                    font-weight: bold;
                    font-size: 12pt;
                }
                #kota_page1{
                    padding-top: 30px;
                    margin-left: 170px;
                }
                #tgl_page1{
                    margin-top: 30px;
                    margin-left: 170px;
                }
                #perhubungan{
                    margin-top: 50px;
                    margin-left: 170px;
                }
                #kadis{
                    font-size: 14pt;
                    margin-left: 80px;
                    margin-top: 80px;
                    position: relative;
                }
                #jabatan_kadis{
                    font-weight: normal;
                    font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
                    font-size: 10pt;
                    margin-left: 110px;
                }
                #nip_kadis{
                    font-weight: normal;
                    font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
                    font-size: 10pt;
                    margin-left: 100px;
                }
                #no_uji_page1{
                    width: 100%;
                    margin-top: 2px;
                    font-size: 18pt;
                    text-align: center;
                }
                #no_kend_page1{
                    width: 100%;
                    font-size: 10pt;
                    text-align: center;
                }
                #qrcodeCanvas{
                    text-align: center;
                }
/*                #no_uji_page1{
                    width: 100%;
                    margin-top: 130px;
                    font-size: 16pt;
                    text-align: center;
                }
                #no_kend_page1{
                    width: 100%;
                    font-size: 10pt;
                    text-align: center;
                }
                #qrcodeCanvas{
                    text-align: center;
                }*/
                
                /*=================================*/
                /*
                *PAGE 2
                */
                /*=================================*/
                #konten_kiri_page2{
                    padding-left: 170px;
                    padding-top: 135px;
                    font-weight: bold;
                    font-size: 12pt;
                }
                .konten_kanan_page2{
                    padding-left: 190px;
                    /*padding-top: 70px;*/
                    font-weight: bold;
                    font-size: 10pt;
                }
                
                #no_uji_page2{
					 font-size: 16pt;
                }
                #no_kend_page2{
                    margin-top: 18px;
					 font-size: 16pt;
                }
                #nm_pemilik_page2{
                    margin-top: 20px;
                    height: 20px;
                }
                #alamat_pemilik_page2{
                    height:100px;
                    margin-top: 20px;
                }
                #ktp_page2{
                    margin-top: 20px;
                }
               
                /*=================================*/
                #merk_page2{
                    padding-top: 95px;
                }
                #tipe_page2{
                    margin-top:5px;
                    height:20px;
                }
                #jenis_page2{
                    padding-left: 15px;
                    margin-top:10px;
                    font-weight: bold;
                    font-size: 9pt;
                }
                #isi_silinder_page2{
                    margin-top:-10px;
                }
                #daya_motor_page2{
                    margin-top:3px;
                }
                #bahan_bakar_page2{
                    margin-top:3px;
                }
                #tahun_pembuatan_page2{
                    margin-top:3px;
                }
                #status_penggunaan_page2{
                    margin-top:12px;
                }
                #no_rangka_page2{
                    margin-top: 30px;
                }
                #no_mesin_page2{
                    margin-top:10px;
                }
                #no_sertifikasi_page2{
                    margin-left:100px;
                    margin-top:7px;
                    font-weight: bold;
                    font-size: 9pt;
                    height: 10px;
                }
                #tgl_sertifikasi_page2{
                    height: 30px;
                    margin-top: 7px;
                }
                #petugas_page2{
                    padding-left: 15px;
                    margin-top: 15px;
                    font-weight: bold;
                    font-size: 9pt;
                }
                /*=================================*/
                /*
                *PAGE 3
                */
                /*=================================*/
                #konten_kiri_page3{
                    padding-left: 220px;
                    padding-top: 38px;
                    font-weight: bold;
                    font-size: 8pt;
                }
                #konten_kanan_page3{
                    padding-left: 185px;
                    padding-top: 60px;
                    font-weight: bold;
                    font-size: 8pt;
                }
                #ukuran_lebar_page3{
                    margin-top: -3px;
                }
                #ukuran_tinggi_page3{
                    margin-top: -3px;
                }
                #ukuran_julur_belakang_page3{
                    margin-top: -3px;
                }
                #ukuran_julur_depan_page3{
                    margin-top: -3px;
                }
                #jarak_sumbu12_page3{
                    margin-top: 3px;
                }
                #q_page3{
                    /*margin-top: 20px;*/
                }
                #q_page33{
                    /*margin-top: 20px;*/
                    margin-left: -90px;
                }
                #dimensi_panjang_page3{
                    margin-top: 3px;
                }
                #bahan_bak_page3{
                    margin-left: -20px;
                }
                #pemakaian_sumbu1_page3{
                    margin-top: 100px;
                }
                #pemakaian_sumbu2_page3{
                    margin-top: -3px;
                }
                #pemakaian_sumbu3_page3{
                    margin-top: -3px;
                }
                #pemakaian_sumbu4_page3{
                    margin-top: -3px;
                }
                #konfigurasi_sumbu_page3{
                    margin-top: 7px;
                }
                #jbb_page3{
                    margin-top: 10px;
                }
                #jbkb_page3{
                    margin-top: 5px;
                }
                /*=================================*/
                #berat_kosong_sumbu2_page3{
                    margin-top: 5px;
                }
                #berat_kosong_sumbu3_page3{
                    margin-top: 5px;
                }
                #berat_kosong_sumbu4_page3{
                    margin-top: 5px;
                }
                #berat_kosong_jumlah_page3{
                    margin-top: 10px;
                }
                #orang_page3{
                    margin-top: 20px;
                }
                #barang_page3{
                    margin-top: 15px;
                }
                #jbi_page3{
                    margin-top: 15px;
                }
                #mst_page3{
                    margin-top: 105px;
                }
                #kelas_jalan_terendah_page3{
                    margin-top: 30px;
                }
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="#" type="image/png">
        <title>Print Kartu Uji</title>

    </head>

    <body>
        <!--<div class="pages">a</div>-->
        <div class="pages">
            <?php
            $dataBuku = VGantibuku::model()->findByAttributes(array('id_buku' => $id_buku));
            $data_kend = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $dataBuku->id_kendaraan));
            ?>
            <div class="kolom_kiri">&nbsp;</div>
            <div class="kolom_kanan">
                <div id="konten_kanan_page1">
                    <div id="kota_page1">SAMPANG</div>
                    <div id="tgl_page1">
                        <?php
                        $tgl_cetak = date("d", strtotime($dataBuku->tgl_cetak));
                        $bulan_cetak = date("n", strtotime($dataBuku->tgl_cetak));
                        $thn_cetak = date("Y", strtotime($dataBuku->tgl_cetak));
                        $bln_cetak = Yii::app()->params['bulanArrayInd'][$bulan_cetak - 1];
                        echo $tgl_cetak . " " . $bln_cetak . " " . $thn_cetak;
                        ?>
                    </div>
                    <div id="perhubungan">PERHUBUNGAN KAB.SAMPANG</div>
                    <div id="kadis">Drs. AJI WALUYO, M.si</div>
                    <div id="jabatan_kadis">Pembina Utama Muda</div>
                    <div id="nip_kadis">19630401 198303 1 006</div>
                    <div id="no_uji_page1"><?php echo $dataBuku->no_uji; ?></div>
                    <div id="no_kend_page1"><?php echo $dataBuku->no_kendaraan; ?></div>
                    <div id="qrcodeCanvas"></div>
                </div>
            </div>
        </div>
        <div class="pages">
            <div class="kolom_kiri">
                <div id="konten_kiri_page2">
                    <div id="no_uji_page2"><?php echo $data_kend->no_uji; ?></div>
                    <div id="no_kend_page2"><?php echo ($data_kend->no_kendaraan == '')?'-':$data_kend->no_kendaraan; ?></div>
                    <div id="nm_pemilik_page2"><?php echo $data_kend->nama_pemilik; ?></div>
                    <div id="alamat_pemilik_page2"><?php echo $data_kend->alamat.' <br/><br/>DESA '.$data_kend->kelurahan.' <br/><br/>KEC. '.$data_kend->kecamatan; ?></div>
                    <div id="ktp_page2"><?php echo $data_kend->identitas . " - " . $data_kend->no_identitas; ?></div>
               </div>
            </div>
          <div class="kolom_kanan">
                <!--<div id="konten_kanan_page2">-->
                <div id="merk_page2" class="konten_kanan_page2"><?php echo ($data_kend->merk == '')?'-':$data_kend->merk; ?></div>
                <div id="tipe_page2" class="konten_kanan_page2"><?php echo ($data_kend->tipe == '')?'-':$data_kend->tipe; ?></div>
                <div id="jenis_page2"><?php echo $data_kend->nm_komersil.'<br />'.$data_kend->jenis; ?></div>
                <div id="isi_silinder_page2" class="konten_kanan_page2"><?php echo ($data_kend->isi_silinder == '' || $data_kend->isi_silinder == '0')?'-':$data_kend->isi_silinder; ?></div>
                <div id="daya_motor_page2" class="konten_kanan_page2"><?php echo ($data_kend->daya_motor == '' || $data_kend->daya_motor == '0')?'-':$data_kend->daya_motor; ?></div>
                <div id="bahan_bakar_page2" class="konten_kanan_page2"><?php echo ($data_kend->bahan_bakar == '')?'-':$data_kend->bahan_bakar; ?></div>
                <div id="tahun_pembuatan_page2" class="konten_kanan_page2"><?php echo $data_kend->tahun; ?></div>
                <div id="status_penggunaan_page2" class="konten_kanan_page2">&nbsp;<?php // echo ($data_kend->umum=='true')?'UMUM':'TIDAK UMUM'; ?></div>
                <div id="no_rangka_page2" class="konten_kanan_page2"><?php echo ($data_kend->no_chasis == '')?'-':$data_kend->no_chasis; ?></div>
                <div id="no_mesin_page2" class="konten_kanan_page2"><?php echo ($data_kend->no_mesin == '')?'-':$data_kend->no_mesin; ?></div>
                <div id="no_sertifikasi_page2"><?php echo ($data_kend->no_regis == '')?'-':$data_kend->no_regis; ?></div>
                <div id="tgl_sertifikasi_page2" class="konten_kanan_page2">
                    <?php
                    if(date("d/m/Y", strtotime($data_kend->tgl_regis))!='01/01/1970'){
                        $tgl_sertifikasi = date("d", strtotime($data_kend->tgl_regis));
                        $bulan_sertifikasi = date("n", strtotime($data_kend->tgl_regis));
                        $thn_sertifikasi = date("Y", strtotime($data_kend->tgl_regis));
                        $bln_sertifikasi = Yii::app()->params['bulanArrayInd'][$bulan_sertifikasi - 1];
                        echo $tgl_sertifikasi . " " . $bln_sertifikasi . " " . $thn_sertifikasi;
                    }else{
                        echo " ";
                    }
                    ?>
                </div>
                <div id="petugas_page2"><?php echo date('d M Y H:i') . " , " . Yii::app()->session['username']; ?></div>
                <!--</div>-->
           </div>
            
        </div>
        <div class="pages" style="font-family: Verdana;">
            <div class="kolom_kiri">
                <div id="konten_kiri_page3">
                    <div id="ukuran_panjang_page3"><?php echo $data_kend->ukuran_panjang; ?></div>
                    <div id="ukuran_lebar_page3"><?php echo $data_kend->ukuran_lebar; ?></div>
                    <div id="ukuran_tinggi_page3"><?php echo $data_kend->ukuran_tinggi; ?></div>
                    <div id="ukuran_julur_belakang_page3"><?php echo $data_kend->bagian_belakang; ?></div>
                    <div id="ukuran_julur_depan_page3"><?php echo $data_kend->bagian_depan; ?></div>
                    <div id="jarak_sumbu12_page3"><?php echo (!empty($data_kend->jsumbu1)?$data_kend->jsumbu1:'0'); ?></div>
                    <div id="jarak_sumbu23_page3"><?php echo (!empty($data_kend->jsumbu2)?$data_kend->jsumbu2:'0'); ?></div>
                    <div id="jarak_sumbu34_page3"><?php echo (!empty($data_kend->jsumbu3)?$data_kend->jsumbu3:'0'); ?></div>
                    <?php
                    if($data_kend->ukp == 0){
                    ?>
                    <div id="q_page3"><?php echo (!empty($data_kend->ukq)?$data_kend->ukq:'-'); ?></div>
                    <?php }else{ ?>
                    <div id="q_page33">/ p <span style="margin-left:70px"><?php echo (!empty($data_kend->ukq)?$data_kend->ukq:'-')." / ".(!empty($data_kend->ukp)?$data_kend->ukp:'-'); ?></span></div>
                    <?php } ?>
                    <div id="dimensi_panjang_page3"><?php echo (!empty($data_kend->dimpanjang)?$data_kend->dimpanjang:'-'); ?></div>
                    <div id="dimensi_lebar_page3"><?php echo (!empty($data_kend->dimlebar)?$data_kend->dimlebar:'-'); ?></div>
                    <div id="dimensi_tinggi_page3"><?php echo (!empty($data_kend->dimtinggi)?$data_kend->dimtinggi:'-'); ?></div>
                    <div id="bahan_bak_page3"><?php echo $data_kend->karoseri_bahan; ?></div>
                    <div id="pemakaian_sumbu1_page3"><?php echo (!empty($data_kend->psumbu1)?$data_kend->psumbu1:'-'); ?></div>
                    <div id="pemakaian_sumbu2_page3"><?php echo (!empty($data_kend->psumbu2)?$data_kend->psumbu2:'-'); ?></div>
                    <div id="pemakaian_sumbu3_page3"><?php echo (!empty($data_kend->psumbu3)?$data_kend->psumbu3:'-'); ?></div>
                    <div id="pemakaian_sumbu4_page3"><?php echo (!empty($data_kend->psumbu4)?$data_kend->psumbu4:'-'); ?></div>
                    <div id="konfigurasi_sumbu_page3"><?php echo $data_kend->konsumbu; ?></div>
                    <div id="jbb_page3"><?php echo $data_kend->kemjbb; ?></div>
                    <div id="jbkb_page3"><?php echo $data_kend->kemjbkb; ?></div>
                </div>
            </div>
            <div class="kolom_kanan">
                <div id="konten_kanan_page3">
                    <div id="berat_kosong_sumbu1_page3"><?php echo (!empty($data_kend->bsumbu1)?$data_kend->bsumbu1:'-'); ?></div>
                    <div id="berat_kosong_sumbu2_page3"><?php echo (!empty($data_kend->bsumbu2)?$data_kend->bsumbu2:'-'); ?></div>
                    <div id="berat_kosong_sumbu3_page3"><?php echo (!empty($data_kend->bsumbu3)?$data_kend->bsumbu3:'-'); ?></div>
                    <div id="berat_kosong_sumbu4_page3"><?php echo (!empty($data_kend->bsumbu4)?$data_kend->bsumbu4:'-'); ?></div>
                    <div id="berat_kosong_jumlah_page3"><?php echo $jumlah_sumbu = $data_kend->bsumbu1 + $data_kend->bsumbu2 + $data_kend->bsumbu3 + $data_kend->bsumbu4; ?></div>
                    <div id="orang_page3"><?php echo $data_kend->karoseri_duduk . " ( " . $data_kend->kemorang . " )"; ?></div>
                    <div id="barang_page3"><?php echo (!empty($data_kend->kembarang)?$data_kend->kembarang:'-'); ?></div>
                    <div id="jbi_page3"><?php echo $jumlah_sumbu + $data_kend->kemorang + $data_kend->kembarang; ?></div>
                    <div id="mst_page3">
                        <?php
                        echo $data_kend->mst;
                        /*$array_1 = array(9, 15, 17, 19, 45); //mikrolet,bus
                        $array_2 = array(1, 10, 37, 43, 52, 55, 56); //double cabin
                        $id_nm_komersil = $data_kend->id_nm_komersil;
                        if (in_array($id_nm_komersil, $array_1)) {
                            //mikrolet,bus
                            echo floor($data_kend->bsumbu2 + (($data_kend->kembarang + $data_kend->kemorang) * $data_kend->ukq / $data_kend->jsumbu1) );
                        } else if (in_array($id_nm_komersil, $array_2)) {
                            //double cabin
                            echo floor($data_kend->bsumbu2 +
                                    ($data_kend->kembarang * $data_kend->ukq / $data_kend->jsumbu1) +
                                    ($data_kend->kemorang * ($data_kend->ukp + ((2 / 5) * $data_kend->ukp2)) / $data_kend->jsumbu1));
                        } else {
                            //mobil barang, taxi
                            echo floor($data_kend->bsumbu2 +
                                    ($data_kend->kembarang * $data_kend->ukq / $data_kend->jsumbu1) +
                                    ($data_kend->kemorang * $data_kend->ukp / $data_kend->jsumbu1));
                        }*/
                        ?>
                    </div>
                    <div id="kelas_jalan_terendah_page3"><?php echo $data_kend->kls_jln; ?></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#qrcodeCanvas').qrcode('<?php echo base64_encode($dataBuku->no_uji); ?>');
            window.print();
            setTimeout(window.close, 0);
        </script>

    </body>
</html>