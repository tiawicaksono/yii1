<?php
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($path . '/js/buku_uji.js', CClientScript::POS_END);
?>
<style>
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
    #status_penggunaan_page2{
        /*margin-top:7px;*/
    }
    #no_rangka_page2{
        margin-top: 35px;
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
        margin-top: 25px;
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
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kartu Uji</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="easyui-tabs" style="width:100% !important;">
                    <div title="PER TANGGAL" style="padding:10px">
                        <div class="row">
                            <div class="col-lg-10 col-md-12">
                                <div class="col-lg-3 col-md-3 col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                        <?php echo CHtml::textField('tgl_search', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4">
                                    <input type="text" id="text_category" class="text-besar form-control" placeholder="No UJI / NO KENDARAAN">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4">
                                    <select id="choose_proses" class="form-control" onchange="prosesSearch()">
                                        <option value="all">- Semua -</option>
                                        <option value="false" selected="true">Belum Cetak</option>
                                        <option value="true">Sudah Cetak</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <button type="button" class="btn btn-info" onclick="prosesSearch()">
                                        <span class="glyphicon glyphicon-refresh"></span> 
                                        Refresh
                                    </button>
<!--                                    <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-info" onclick="prosesSearch()">
                                            <span class="glyphicon glyphicon-refresh"></span> 
                                            Refresh
                                        </button>
                                        <button class="btn btn-success" type="button" onclick="rekapBuku('<?php // echo $this->createUrl('Bukuuji/RekapBukuUji'); ?>')">
                                            <i class="fa fa-file-excel-o"></i> Rekap Buku Uji
                                        </button>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                            <table id="bukuListGrid" style="height:300px"></table>
                        </div>
                    </div>
                    <div title="PER KENDARAAN" style="padding:10px">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="col-lg-3 col-md-3">
                                    <input type="text" id="text_category_per_kendaraan" class="text-besar form-control" placeholder="No UJI / NO KENDARAAN">
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <button type="button" class="btn btn-info" onclick="prosesSearchPerKendaraan()">
                                        <span class="glyphicon glyphicon-refresh"></span> 
                                        Refresh
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                            <table id="bukuPerKendaraanListGrid" style="height:300px"></table>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 20px; width:100% !important;">
                    <table id="riwayatListGrid" style="height:500px;"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dlg_no_seri" class="easyui-dialog" title="Nomor Seri Buku" style="width: 400px; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Ok',
     iconCls:'icon-ok',
     handler:function(){
     saveCetakBuku();
     }
     },{
     text:'Cancel',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialog();
     }
     }]
     ">
    <form id="form_cetak_buku_uji">
        <input type="hidden" id="dlg_text_id_retribusi" name="dlg_text_id_retribusi">
        <div class="form-group">
            <div class="input-group" style="margin-bottom: 7px;">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-wrench"></i>
                </div>
                <input type="text" name="dlg_text_no_seri" id="dlg_text_no_seri" class="form-control" style="text-transform: uppercase" />
            </div>
        </div>
        <div class="form-group">    
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </div>
                <input type="text" id="ganti_tgl_cetak" name="ganti_tgl_cetak" class="form-control tgl_ori" readonly="readonly">
            </div>
        </div>
    </form>
</div>
<div id="dlg_no_seri_per_kendaraan" class="easyui-dialog" title="Edit Kelulusan" style="width: 400px; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Ok',
     iconCls:'icon-ok',
     handler:function(){
     saveCetakBukuPerKendaraan();
     }
     },{
     text:'Cancel',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialogPerKendaraan();
     }
     }]
     ">
    <form id="form_cetak_buku_uji_per_kendaraan">
        <input type="hidden" id="dlg_text_id_retribusi_per_kendaraan" name="dlg_text_id_retribusi_per_kendaraan">
        <div class="form-group">
            <div class="input-group" style="margin-bottom: 7px;">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-wrench"></i>
                </div>
                <input type="text" name="dlg_text_no_seri_per_kendaraan" id="dlg_text_no_seri_per_kendaraan" class="form-control" style="text-transform: uppercase" />
            </div>
        </div>
        <div class="form-group">    
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </div>
                <input type="text" id="ganti_tgl_cetak_per_kendaraan" name="ganti_tgl_cetak_per_kendaraan" class="form-control tgl_ori" readonly="readonly">
            </div>
        </div>
    </form>
</div>
<div id="dlg_cetak_hasil" class="easyui-dialog" title="Cetak Hasil Uji" style="width: 400px; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     savePrintHasilUji();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
            <?php
            echo CHtml::hiddenField('dialog_lulus_url', '');
            echo CHtml::hiddenField('dialog_lulus_id', '');
            echo CHtml::hiddenField('dialog_id_kendaraan', '');
            ?>
            <select id="choose_penguji" class="form-control">
                <?php
                $penguji = Penguji::model()->findAll();
                foreach ($penguji as $dataPenguji):
                    ?>
                    <option value="<?php echo $dataPenguji->nrp; ?>"><?php echo $dataPenguji->nama; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
            <select id="choose_posisi" class="form-control">
                <option value="3">RUSAK</option>
                <option value="4">HILANG</option>
            </select>
        </div>
    </div>
</div>
<div id="dlg_detail_buku" class="easyui-dialog" title="Cetak Buku Uji" style="width: 900px; height: 600px; padding: 10px;display: none; overflow-x: hidden;"
     data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     buttonBukuUji2();
     }
     },{
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
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Page 1</a></li>
                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Page 2</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Page 3</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <img class="img_buku" src="<?php echo Yii::app()->baseUrl . "/images/scan_buku1.jpg" ?>">
                        <div class="pages">
                            <div class="kolom_kiri">&nbsp;</div>
                            <div class="kolom_kanan">
                                <div id="konten_kanan_page1">
                                    <div id="kota_page1">SAMPANG</div>
                                    <div id="tgl_page1"></div>
                                    <div id="no_uji_page1"></div>
                                    <div id="no_kend_page1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
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
                                <div id="status_penggunaan_page2" class="konten_kanan_page2"></div>
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
                                    <div id="konfigurasi_sumbu_page3"></div>
                                    <div id="jbb_page3"></div>
                                </div>
                            </div>
                            <div class="kolom_kanan">
                                <div id="konten_kanan_page3">
                                    <div id="berat_kosong_sumbu1_page3"></div>
                                    <div id="berat_kosong_sumbu2_page3"></div>
                                    <div id="berat_kosong_sumbu3_page3"></div>
                                    <div id="berat_kosong_sumbu4_page3"></div>
                                    <div id="berat_kosong_jumlah_page3"></div>
                                    <div id="orang_page3"></div>
                                    <div id="barang_page3"></div>
                                    <div id="jbi_page3"></div>
                                    <div id="mst_page3"></div>
                                    <div id="kelas_jalan_terendah_page3"></div>
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
    $('#bukuListGrid').datagrid({
        url: '<?php echo $this->createUrl('Bukuuji/BukuListGrid'); ?>',
        width: '100%',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 50, 100],
        columns: [[
//                {field: 'id_retribusi', title: 'PRINT BUKU', width: 100, halign: 'center', align: 'center', formatter: buttonBukuUji},
                {field: 'id_kendaraan', title: 'RIWAYAT', width: 70, halign: 'center', align: 'center', formatter: buttonRiwayat},
//                {field: 'id_kendaraan', hidden: true},
                {field: 'numerator_hari', title: 'NUMERATOR', width: 100, sortable: true},
                {field: 'no_uji', title: 'NO UJI', width: 90, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'NO KEND', sortable: false},
                {field: 'nama_pemilik', width: 250, title: 'NAMA PEMILIK', sortable: false},
                {field: 'no_seri', width: 120, title: 'SERI BUKU', sortable: true},
                {field: 'tgl_cetak', width: 90, title: 'TGL CETAK', sortable: false},
                {field: 'petugas', title: 'PETUGAS CETAK', width: 120, sortable: true}
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.chooseProses = $('#choose_proses :selected').val();
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
            params.selectDate = $('#tgl_search').val();
        },
        onLoadError: function () {
            hidelargeloader();
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    $('#bukuPerKendaraanListGrid').datagrid({
        url: '',
        width: '100%',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 50, 100],
        columns: [[
//                {field: 'id_retribusi', title: 'PRINT BUKU', width: 100, halign: 'center', align: 'center', formatter: buttonBukuUji},
                {field: 'id_kendaraan', title: 'RIWAYAT', width: 70, halign: 'center', align: 'center', formatter: buttonRiwayat},
//                {field: 'id_kendaraan', hidden: true},
                {field: 'no_uji', title: 'NO UJI', width: 90, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'NO KEND', sortable: false},
                {field: 'nama_pemilik', width: 250, title: 'NAMA PEMILIK', sortable: false},
                {field: 'no_seri', width: 120, title: 'SERI BUKU', sortable: true},
                {field: 'tgl_retribusi', width: 90, title: 'TGL RETRIBUSI', sortable: false},
                {field: 'tgl_cetak', width: 90, title: 'TGL CETAK', sortable: false},
                {field: 'petugas', title: 'PETUGAS', width: 80, sortable: true}
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {

        },
        onLoadError: function () {
            hidelargeloader();
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    $('#riwayatListGrid').datagrid({
        url: '',
        width: '100%',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 20,
        pageList: [20, 50, 100, 250],
        columns: [[
                {field: 'id_hasil_uji', title: 'Print Hasil', width: 70, halign: 'center', align: 'center', formatter: buttonPrintHasilUji},
                {field: 'no_uji', title: 'No Uji', width: 90, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'tempat', width: 120, title: 'Tempat', sortable: false},
                {field: 'tgl_uji', width: 120, title: 'Tgl Uji', sortable: false},
                {field: 'berlaku', width: 90, title: 'Berlaku', sortable: false},
                {field: 'nama_penguji', width: 200, title: 'Nama Penguji', sortable: false},
                {field: 'nrp', width: 120, title: 'NRP', sortable: false},
                {field: 'catatan', width: 150, title: 'Catatan', sortable: false},
            ]],
//        toolbar: "#search",
        onLoadError: function () {
            hidelargeloader();
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    function buttonRiwayat(value) {
        var button = '<button type="button" data-toggle="tooltip" title="Riwayat" class="btn btn-info" onclick="prosesDetailBukuUji(' + value + ')"><span class="glyphicon glyphicon-zoom-in"></span></button>';
        return button;
    }
    function buttonPrintHasilUji(value) {
        var explode = value.split('|');
        var id_hasil_uji = explode[0];
        var nrp = explode[1];
        var id_kendaraan = explode[2];
        var url = '<?php echo $this->createUrl('Bukuuji/cetakl'); ?>';
        var button = '<button type="button" data-toggle="tooltip" title="Hasil Uji" class="btn btn-success" onclick="buttonDialogPosisi(\'' + url + '\', \'' + id_hasil_uji + '\', \'' + nrp + '\', \'' + id_kendaraan + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        return button;
    }
    function buttonBukuUji(value) {
        var explode = value.split('|');
        var id_retribusi = explode[0];
        var no_seri = explode[1];
        var tgl_cetak = explode[2];
        var button = '<button type="button" data-toggle="tooltip" title="Buku Uji" class="btn btn-success" onclick="printBukuUji(' + id_retribusi + ',\'' + no_seri + '\',\'' + tgl_cetak + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        var urlAct = '<?php echo $this->createUrl('Bukuuji/DetailBukuUji'); ?>';
        var buttonview = '<button type="button" data-toggle="tooltip" title="Buku Uji" class="btn btn-warning" onclick="buttonDetailBuku(\'' + urlAct + '\', ' + id_retribusi + ',\'' + value + '\')"><span class="fa fa-book"></span></button>';
        return button + " " + buttonview;
    }
    function buttonBukuUjiPerKendaraan(value) {
        var explode = value.split('|');
        var id_retribusi = explode[0];
        var no_seri = explode[1];
        var tgl_cetak = explode[2];
        var button = '<button type="button" data-toggle="tooltip" title="Buku Uji" class="btn btn-success" onclick="printBukuUjiPerKendaraan(' + id_retribusi + ',\'' + no_seri + '\',\'' + tgl_cetak + '\')"><span class="glyphicon glyphicon-print"></span></button>';
        var urlAct = '<?php echo $this->createUrl('Bukuuji/DetailBukuUji'); ?>';
        var buttonview = '<button type="button" data-toggle="tooltip" title="Buku Uji" class="btn btn-warning" onclick="buttonDetailBuku(\'' + urlAct + '\', ' + id_retribusi + ',\'' + value + '\')"><span class="fa fa-book"></span></button>';
        return button + " " + buttonview;
    }

    function prosesDetailBukuUji(row) {
        $('#riwayatListGrid').datagrid({
            url: '<?php echo $this->createUrl('Bukuuji/RiwayatBukuListGrid'); ?>',
            onBeforeLoad: function (param) {
                showlargeloader();
                param.idKendaraan = row;
            },
            onLoadSuccess: function () {
                hidelargeloader();
            },
            onLoadError: function () {
                hidelargeloader();
                return false;
            },
        });
    }

    function saveCetakBuku() {
        var data = $("#form_cetak_buku_uji").serialize();
        $.ajax({
            url: '<?php echo $this->createUrl('Bukuuji/SaveBukuUji'); ?>',
            type: 'POST',
            data: data,
            dataType: 'JSON',
//            beforeSend: function () {
//                showlargeloader();
//            },
            success: function (data) {
                $('#dlg_no_seri').dialog('close');
                prosesSearch();
                printCetakBuku(data.id_buku);
//                hidelargeloader();
            },
            error: function (data) {
                $('#dlg_no_seri').dialog('close');
                prosesSearch();
//                hidelargeloader();
                return false;
            }
        });
    }

    function saveCetakBukuPerKendaraan() {
        var data = $("#form_cetak_buku_uji_per_kendaraan").serialize();
        $.ajax({
            url: '<?php echo $this->createUrl('Bukuuji/SaveBukuUjiPerKendaraan'); ?>',
            type: 'POST',
            data: data,
            dataType: 'JSON',
//            beforeSend: function () {
//                showlargeloader();
//            },
            success: function (data) {
                $('#dlg_no_seri_per_kendaraan').dialog('close');
                prosesSearchPerKendaraan();
                printCetakBuku(data.id_buku);
//                hidelargeloader();
            },
            error: function (data) {
                $('#dlg_no_seri_per_kendaraan').dialog('close');
                prosesSearchPerKendaraan();
//                hidelargeloader();
                return false;
            }
        });
    }

    function printCetakBuku(id) {
        var url = '<?php echo $this->createUrl('Bukuuji/CetakBukuUji'); ?>';
        var win = window.open(url + "?id=" + id, '_blank');
        win.focus();
    }

    function buttonBukuUji2() {
        var value = $("#text_value_detail_buku").val();
        var explode = value.split('|');
        var id_retribusi = explode[0];
        var no_seri = explode[1];
        var tgl_cetak = explode[2];
        printBukuUji2(id_retribusi, no_seri, tgl_cetak);
    }

    function buttonDialogPosisi(urlAct, id, nrp, id_kendaraan) {
        $('#dialog_lulus_id').val(id);
        $('#cobalah').val(nrp);
        $('#choose_penguji').val(nrp);
        $('#dialog_id_kendaraan').val(id_kendaraan);
        $('#dialog_lulus_url').val(urlAct);
        $('#dlg_cetak_hasil').dialog('open');
    }

    function buttonDetailBuku(urlAct, id, value) {
        $.ajax({
            url: urlAct,
            type: 'POST',
            data: {id: id},
            dataType: 'JSON',
            success: function (data) {
                $("#text_value_detail_buku").val(value);
                $('#dlg_detail_buku').dialog('open');
                //PAGE 1
                $('#tgl_page1').html(data.tanggal_cetak);
                $('#no_uji_page1').html(data.no_uji);
                $('#no_kend_page1').html(data.no_kendaraan);
                //PAGE 2
                //KIRI
                $('#no_uji_page2').html(data.no_uji);
                $('#no_kend_page2').html(data.no_kendaraan);
                $('#nm_pemilik_page2').html(data.nama_pemilik);
                $('#alamat_pemilik_page2').html(data.alamat);
                $('#ktp_page2').html(data.identitas);
                //KANAN
                $('#merk_page2').html(data.merk);
                $('#tipe_page2').html(data.tipe);
                $('#jenis_page2').html(data.nm_komersil);
                $('#isi_silinder_page2').html(data.isi_silinder);
                $('#daya_motor_page2').html(data.daya_motor);
                $('#bahan_bakar_page2').html(data.bahan_bakar);
                $('#tahun_pembuatan_page2').html(data.tahun);
                $('#status_penggunaan_page2').html(data.status_penggunaan);
                $('#no_rangka_page2').html(data.no_chasis);
                $('#no_mesin_page2').html(data.no_mesin);
                $('#no_sertifikasi_page2').html(data.no_regis);
                $('#tgl_sertifikasi_page2').html(data.tgl_sertifikasi);
                $('#petugas_page2').html(data.petugas);
                //PAGE 3
                //KIRI
                $('#ukuran_panjang_page3').html(data.ukuran_panjang);
                $('#ukuran_lebar_page3').html(data.ukuran_lebar);
                $('#ukuran_tinggi_page3').html(data.ukuran_tinggi);
                $('#ukuran_julur_belakang_page3').html(data.bagian_belakang);
                $('#ukuran_julur_depan_page3').html(data.bagian_depan);
                $('#jarak_sumbu12_page3').html(data.jsumbu1);
                $('#q_page3').html(data.ukq);
                $('#dimensi_panjang_page3').html(data.dimpanjang);
                $('#dimensi_lebar_page3').html(data.dimlebar);
                $('#dimensi_tinggi_page3').html(data.dimtinggi);
                $('#bahan_bak_page3').html(data.karoseri_bahan);
                $('#pemakaian_sumbu1_page3').html(data.psumbu1);
                $('#pemakaian_sumbu2_page3').html(data.psumbu2);
                $('#pemakaian_sumbu3_page3').html(data.psumbu3);
                $('#pemakaian_sumbu4_page3').html(data.psumbu4);
                $('#konfigurasi_sumbu_page3').html(data.konsumbu);
                $('#jbb_page3').html(data.kemjbb);
                //KANAN
                $('#berat_kosong_sumbu1_page3').html(data.bsumbu1);
                $('#berat_kosong_sumbu2_page3').html(data.bsumbu2);
                $('#berat_kosong_sumbu3_page3').html(data.bsumbu3);
                $('#berat_kosong_sumbu4_page3').html(data.bsumbu4);
                $('#berat_kosong_jumlah_page3').html(data.jumlah_sumbu);
                $('#orang_page3').html(data.karoseri_duduk);
                $('#barang_page3').html(data.kembarang);
                $('#jbi_page3').html(data.jbi);
                $('#mst_page3').html(data.mst);
                $('#kelas_jalan_terendah_page3').html(data.kls_jln);
            },
            error: function (data) {
                return false;
            }
        });
    }

    function savePrintHasilUji() {
        var posisi = $("#choose_posisi option:selected").val();
//        var pilihan = $("#choose_pilihan option:selected").val();
        var penguji = $("#choose_penguji option:selected").val();
        var id = $('#dialog_lulus_id').val();
        var url = $('#dialog_lulus_url').val();
        var id_kendaraan = $('#dialog_id_kendaraan').val();
        $.ajax({
            url: '<?php echo $this->createUrl('Bukuuji/SaveCetakl'); ?>',
            type: 'POST',
            data: {id: id, posisi: posisi, penguji: penguji},
            success: function (data) {
                $('#dlg_cetak_hasil').dialog('close');
                prosesDetailBukuUji(id_kendaraan);
                //printHasilUji(url, id, posisi, penguji);
            },
            error: function (data) {
                $('#dlg_cetak_hasil').dialog('close');
                return false;
            }
        });
    }

    function printHasilUji(url, id, posisi, penguji) {
        var win = window.open(url + "?id=" + id + "&posisi=" + posisi + "&penguji=" + penguji, '_blank');
        win.focus();
    }

    function rekapBuku(urlAct) {
        var tgl = $('#tgl_search').val();
        window.location.href = urlAct + "?tgl=" + tgl;
        return false;
    }

</script>