<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->getClientScript();
//$cs->registerCssFile($assetsUrl . '/css/styles.css');
$cs->registerCssFile($baseUrl . '/css/bootstrap-select.css');
$cs->registerScriptFile($baseUrl . '/js/bootstrap-select.js', CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl . '/js/edit_buku.js', CClientScript::POS_END);
?>
<style>
    /*=================================*/
    /*
    *FOR IJO-IJO SELECT
    */
    /*=================================*/
    [data-id="nama_komersil"]{
        /*border: solid 1px #59b300 !important;*/
        /*background-color:#73e600 !important;*/
        color: #F00 !important;
        font-weight: bold;
    }
    [data-id="karoseri_jenis"]{
        /*border: solid 1px #59b300 !important;*/
        /*background-color:#73e600 !important;*/
        color: #F00 !important;
        font-weight: bold;
    }
    [data-id="karoseri_bahan"]{
        /*border: solid 1px #59b300 !important;*/
        /*background-color:#73e600 !important;*/
        color: #F00 !important;
        font-weight: bold;
    }
    [data-id="konfigurasi_sumbu"]{
        /*border: solid 1px #59b300 !important;*/
        /*background-color:#73e600 !important;*/
        color: #F00 !important;
        font-weight: bold;
    }
    [data-id="merk"]{
        /*border: solid 1px #59b300 !important;*/
        /*background-color:#73e600 !important;*/
        color: #F00 !important;
        font-weight: bold;
    }
    /*label{font-weight: normal;}*/
    h3{font-weight: bold}
    .img_buku{
        position: absolute;
        display:block;
        width: 100%;
    }
    .pages {
        /*page-break-after: always;*/
        font-family: Calibri;
        font-style: normal;
        font-variant: normal;
        overflow: hidden;
        position: relative;
        z-index: 100;

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
    #konten_kanan_page1{
        width: 100%;
        font-weight: bold;
        font-size: 12pt;
    }
    #kota_page1{
        padding-top: 50px;
        margin-left: 230px;
    }
    #tgl_page1{
        margin-top: 37px;
        margin-left: 230px;
    }
    #no_uji_page1{
        width: 100%;
        margin-top: 300px;
        font-size: 16pt;
        text-align: center;
    }
    #no_kend_page1{
        width: 100%;
        font-size: 10pt;
        text-align: center;
    }
    /*=================================*/
    /*
    *PAGE 2
    */
    /*=================================*/
    #konten_kiri_page2{
        padding-left: 210px;
        padding-top: 190px;
        font-weight: bold;
        font-size: 12pt;
    }
    #no_uji_page2{
    }
    #no_kend_page2{
        margin-top: 25px;
    }
    #nm_pemilik_page2{
        margin-top: 30px;
        height: 20px;
    }
    #alamat_pemilik_page2{
        height:100px;
        margin-top: 35px;
    }
    #ktp_page2{
        margin-top: 45px;
    }
    /*=================================*/
    .konten_kanan_page2{
        padding-left: 250px;
        /*padding-top: 70px;*/
        font-weight: bold;
        font-size: 9pt;
    }
    #merk_page2{
        padding-top: 140px;
    }
    #tipe_page2{
        /*margin-top:5px;*/
    }
    #jenis_page2{
        padding-left: 30px;
        margin-top:20px;
        font-weight: bold;
        font-size: 9pt;
    }
    #daya_motor_page2{
        /*margin-top:5px;*/
    }
    #bahan_bakar_page2{
        /*margin-top:0px;*/
    }
    #tahun_pembuatan_page2{
        /*margin-top:7px;*/
    }
    #no_rangka_page2{
        margin-top: 50px;
    }
    #no_mesin_page2{
        margin-top:15px;
    }
    #no_sertifikasi_page2{
        margin-left:100px;
        margin-top:7px;
        font-weight: bold;
        font-size: 9pt;
    }
    #petugas_page2{
        padding-left: 30px;
        margin-top: 70px;
        font-weight: bold;
        font-size: 9pt;
    }
    /*=================================*/
    /*
    *PAGE 3
    */
    /*=================================*/
    #konten_kiri_page3{
        padding-left: 300px;
        padding-top: 45px;
        font-weight: bold;
        font-size: 9pt;
    }
    #jarak_sumbu12_page3{
        /*margin-top: 10px;*/
    }
    #q_page3{
        margin-top: 20px;
    }
    #dimensi_panjang_page3{
        margin-top: 15px;
    }
    #pemakaian_sumbu1_page3{
        margin-top: 120px;
    }
    #konfigurasi_sumbu_page3{
        margin-top: 30px;
    }
    #jbb_page3{
        margin-top: 10px;
    }
    /*=================================*/
    #konten_kanan_page3{
        padding-left: 250px;
        padding-top: 75px;
        font-weight: bold;
        font-size: 9pt;
    }
    #berat_kosong_sumbu2_page3{
        margin-top: 7px;
    }
    #berat_kosong_jumlah_page3{
        margin-top: 55px;
    }
    #orang_page3{
        margin-top: 39px;
    }
    #barang_page3{
        margin-top: 15px;
    }
    #jbi_page3{
        margin-top: 15px;
    }
    #mst_page3{
        margin-top: 135px;
    }
    #kelas_jalan_terendah_page3{
        margin-top: 35px;
    }
</style>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Data Baru dan Edit Buku</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="easyui-tabs">
            <div title="EDIT KENDARAAN" style="padding:10px">
                <?php $this->renderPartial('index_edit'); ?>
            </div>
            <div title="KENDARAAN BARU" style="padding:10px">
                <?php $this->renderPartial('index_baru'); ?>
            </div>
        </div>
    </div>
</div>
<div id="dlg" class="easyui-dialog" title="Data Riwayat" style="width: 50%; height: 380px; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Close',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialogRiwayat();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
        <table id="riwayatListGrid"></table>
    </div>
</div>
<div id="dlg_detail_buku" class="easyui-dialog" title="Cetak Buku Uji" style="width: 900px; height: 600px; padding: 10px;display: none; overflow-x: hidden;"
     data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Close',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialogDetailBuku();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
            <input type="hidden" id="text_value_detail_buku" />
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_2" data-toggle="tab" >Page 2</a></li>
                    <li><a href="#tab_3" data-toggle="tab" aria-expanded="true">Page 3</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_2">
                        <img class="img_buku" src="<?php echo Yii::app()->baseUrl . "/images/scan_buku2.jpg" ?>">
                        <div class="pages">
                            <div class="kolom_kiri">
                                <div id="konten_kiri_page2">
                                    <div id="no_uji_page2"></div>
                                    <div id="no_kend_page2"></div>
                                    <div id="nm_pemilik_page2"></div>
                                    <div id="alamat_pemilik_page2"></div>
                                    <div id="ktp_page2"></div>
                                </div>
                            </div>
                            <div class="kolom_kanan">
                                <!--<div id="konten_kanan_page2">-->
                                <div id="merk_page2" class="konten_kanan_page2"></div>
                                <div id="tipe_page2" class="konten_kanan_page2"></div>
                                <div id="jenis_page2"></div>
                                <div id="isi_silinder_page2" class="konten_kanan_page2"></div>
                                <div id="daya_motor_page2" class="konten_kanan_page2"></div>
                                <div id="bahan_bakar_page2" class="konten_kanan_page2"></div>
                                <div id="tahun_pembuatan_page2" class="konten_kanan_page2"></div>
                                <div id="no_rangka_page2" class="konten_kanan_page2"></div>
                                <div id="no_mesin_page2" class="konten_kanan_page2"></div>
                                <div id="no_sertifikasi_page2">></div>
                                <div id="tgl_sertifikasi_page2" class="konten_kanan_page2"></div>
                                <div id="petugas_page2"></div>
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <img class="img_buku" src="<?php echo Yii::app()->baseUrl . "/images/scan_buku3.jpg" ?>">
                        <div class="pages">
                            <div class="kolom_kiri">
                                <div id="konten_kiri_page3">
                                    <div id="ukuran_panjang_page3"></div>
                                    <div id="ukuran_lebar_page3"></div>
                                    <div id="ukuran_tinggi_page3"></div>
                                    <div id="ukuran_julur_belakang_page3"></div>
                                    <div id="ukuran_julur_depan_page3"></div>
                                    <div id="jarak_sumbu12_page3"></div>
                                    <div id="q_page3"></div>
                                    <div id="dimensi_panjang_page3"></div>
                                    <div id="dimensi_lebar_page3"></div>
                                    <div id="dimensi_tinggi_page3"></div>
                                    <div id="bahan_bak_page3"></div>
                                    <div id="pemakaian_sumbu1_page3"></div>
                                    <div id="pemakaian_sumbu2_page3"></div>
                                    <div id="konfigurasi_sumbu_page3">1.1</div>
                                    <div id="jbb_page3"></div>
                                </div>
                            </div>
                            <div class="kolom_kanan">
                                <div id="konten_kanan_page3">
                                    <div id="berat_kosong_sumbu1_page3"></div>
                                    <div id="berat_kosong_sumbu2_page3"></div>
                                    <div id="berat_kosong_jumlah_page3"></div>
                                    <div id="orang_page3"></div>
                                    <div id="barang_page3"></div>
                                    <div id="jbi_page3"></div>
                                    <div id="mst_page3"></div>
                                    <div id="kelas_jalan_terendah_page3">III</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("keypress", '#text_category', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch('<?php echo $this->createUrl('Editbuku/ProsesSearch'); ?>');
            return false;
        }
    });
    $(document).on("keypress", '#text_category_acuan', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            cekRiwayat('<?php echo $this->createUrl('Editbuku/CekRiwayat'); ?>', '<?php echo $this->createUrl('Editbuku/RiwayatListGrid'); ?>', '<?php echo $this->createUrl('Editbuku/Proses'); ?>', 'acuan');
            return false;
        }
    });

</script>