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
    /*label{font-weight: normal;}*/
    h3{font-weight: bold}
</style>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Data</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="col-lg-12 no-padding">
            <div class="col-lg-8 no-padding">
                <div class="col-lg-3 col-md-3">
                    <input type="text" id="text_category" class="text-besar form-control atas_search" placeholder="No Uji / No Kendaraan">
                </div>
                <div class="col-lg-1 col-md-1 no-padding"><span style="margin-top:70px">acuan data dari: </span></div>
                <div class="col-lg-3 col-md-3 no-padding">
                    <input type="text" disabled="true" id="text_category_acuan" class="text-besar form-control">
                </div>
                <div class="col-lg-3 col-md-3 no-padding">
                    <select id="select_category_acuan" class="form-control" disabled="true">
                        <option value="no_uji">No Uji</option>
                        <option value="no_kendaraan">No Kendaraan</option>
                        <option selected="selected" value="no_chasis">No Chasis</option>
                        <option value="no_mesin">No Mesin</option>
                        <option value="pengimport">Karoseri</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2">
                    <button id="detail_buku" type="button" class="btn btn-info" disabled="disabled" onclick="detailBuku()"><span class="glyphicon glyphicon-duplicate"></span> Lihat Buku</button>
                </div>
            </div>
        </div>
        <div class="col-lg-12 no-padding">
            <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'FORMINPUT')); ?>
            <div class="col-md-12" style="margin-bottom: 10px">
                <button type="button" disabled="true" class="btn btn-primary pull-right button_simpan" onclick="submitForm('<?php echo $this->createUrl('Editbuku/SaveForm'); ?>')">SIMPAN</button>
            </div>
            <section class="col-md-4">
                <div class="box box-info">
                    <div class="box-header with-border bg-aqua">
                        <h3 class="box-title">SERTIFIKASI</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-aqua-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div  class="box-body">
                        <div class="col-md-12">
                            <label for="nomer_sertifikasi_registrasi">Nomor Sertifikat Registrasi Uji Tipe Kendaraan</label>
                            <?php echo CHtml::textField('nomer_sertifikasi_registrasi', '', array('class' => 'form-control text-besar')); ?>
                            <div class="col-md-7 no-margin no-padding">
                                <label for="diterbitkan_nomer_sertifikasi_registrasi">Diterbitkan Oleh</label>
                                <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_registrasi', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-4 no-margin no-padding">
                                <label for="tgl_nomer_sertifikasi_registrasi">Tgl Diterbitkan</label>
                                <input name="tgl_nomer_sertifikasi_registrasi" id="tgl_nomer_sertifikasi_registrasi" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                <?php // echo CHtml::textField('tgl_nomer_sertifikasi_registrasi', '', array('class' => 'form-control tgl_all', 'readonly' => true)) ?>
                            </div>
                            <label for="nomer_sertifikasi_uji">Nomor Sertifikat Uji Tipe Kendaraan</label>
                            <?php echo CHtml::textField('nomer_sertifikasi_uji', '', array('class' => 'form-control text-besar')) ?>
                            <div class="col-md-7 no-margin no-padding">
                                <label for="diterbitkan_nomer_sertifikasi_uji">Diterbitkan Oleh</label>
                                <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_uji', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-4 no-margin no-padding">
                                <label for="tgl_nomer_sertifikasi_uji">Tgl Diterbitkan</label>
                                <input name="tgl_nomer_sertifikasi_uji" id="tgl_nomer_sertifikasi_uji" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                <?php // echo CHtml::textField('tgl_nomer_sertifikasi_uji', '', array('class' => 'form-control tgl_all', 'readonly' => true)) ?>
                            </div>
                            <label for="nomer_sertifikasi_rancang">Nomor Sertifikat Rancang Bangun</label>
                            <?php echo CHtml::textField('nomer_sertifikasi_rancang', '', array('class' => 'form-control text-besar')) ?>
                            <div class="col-md-7 no-margin no-padding">
                                <label for="diterbitkan_nomer_sertifikasi_rancang">Diterbitkan Oleh</label>
                                <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_rancang', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-4 no-margin no-padding">
                                <label for="tgl_nomer_sertifikasi_rancang">Tgl Diterbitkan</label>
                                <input name="tgl_nomer_sertifikasi_rancang" id="tgl_nomer_sertifikasi_rancang" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                <?php // echo CHtml::textField('tgl_nomer_sertifikasi_rancang', '', array('class' => 'form-control tgl_all', 'readonly' => true)) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--SERTIFIKASI-->
            <section class="col-md-8">
                <div class="box box-danger">
                    <div class="box-header with-border bg-red">
                        <h3 class="box-title">DATA KENDARAAN</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-red-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div  class="box-body">
                        <div class="col-md-4">
                            <label for="nomer_uji">Nomor Uji</label>
                            <?php 
                            echo CHtml::hiddenField('id_kendaraan', '', array('class' => 'form-control text-besar'));
                            echo CHtml::textField('nomer_uji', '', array('class' => 'form-control wajib-isi text-besar', 'required' => 'true')); 
                            ?>
                            <label for="nomer_kendaraan">Nomor Kendaraan</label>
                            <?php echo CHtml::textField('nomer_kendaraan', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            <div class="col-md-4 no-margin no-padding">
                                <label for="identitas">Identitas</label>
                                <?php
                                echo CHtml::dropDownList('identitas', '', array(
                                    'KTP' => 'KTP',
                                    'SIM' => 'SIM',
                                    'SIUP' => 'SIUP',
                                    'PASPOR' => 'PASPOR',
                                    'LAIN-LAIN' => 'LAIN-LAIN',
                                        ), array('class' => 'form-control'));
                                ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-7 no-margin no-padding">
                                <label for="nomer_identitas">Nomor</label>
                                <?php echo CHtml::textField('nomer_identitas', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                            <label for="nama_pemilik">Nama Pemilik</label>
                            <?php echo CHtml::textField('nama_pemilik', '', array('class' => 'form-control text-besar')) ?>
                            <label for="alamat_pemilik">Alamat Pemilik</label>
                            <?php echo CHtml::textField('alamat_pemilik', '', array('class' => 'form-control text-besar')) ?>
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <?php echo CHtml::textField('tempat_lahir', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-7 no-margin no-padding">
                                <label for="tgl_lahir">Tgl Lahir</label>
                                <input name="tgl_lahir" id="tgl_lahir" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                <?php // echo CHtml::textField('tgl_lahir', '', array('class' => 'form-control tgl_all', 'readonly' => true)) ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-4 no-margin no-padding">
                                <label for="kelamin">Kelamin</label>
                                <?php
                                echo CHtml::dropDownList('kelamin', '', array(
                                    '' => '',
                                    'LAKI-LAKI' => 'L',
                                    'PEREMPUAN' => 'P',
                                        ), array('class' => 'form-control'));
                                ?>
                            </div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="rt">RT</label>
                                <?php echo CHtml::textField('rt', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-6 no-margin no-padding">
                                <label for="rw">RW</label>
                                <?php echo CHtml::textField('rw', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                            <label for="kelurahan">Kelurahan</label>
                            <?php echo CHtml::textField('kelurahan', '', array('class' => 'form-control text-besar')) ?>
                            <label for="kecamatan">Kecamatan</label>
                            <?php echo CHtml::textField('kecamatan', '', array('class' => 'form-control text-besar')) ?>
                            <label for="kota">Kota</label>
                            <?php echo CHtml::textField('kota', 'SURABAYA', array('class' => 'form-control text-besar', 'readonly' => 'readonly')) ?>
                            <label for="propinsi">Propinsi</label>
                            <?php echo CHtml::textField('propinsi', 'JAWA TIMUR', array('class' => 'form-control text-besar', 'readonly' => 'readonly')) ?>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-7 no-margin no-padding">
                                <label for="awal_pemakaian">Awal Pemakaian</label>
                                <input name="awal_pemakaian" id="awal_pemakaian" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                <?php // echo CHtml::textField('awal_pemakaian', '', array('class' => 'form-control tgl_all', 'readonly' => true)) ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-4 no-margin no-padding">
                                <label for="tahun">Tahun</label>
                                <?php echo CHtml::textField('tahun', '', array('class' => 'form-control text-besar', 'maxlength' => 4, 'size' => 4)) ?>
                            </div>
                            <label for="nomer_mesin">Nomor Mesin</label>
                            <?php echo CHtml::textField('nomer_mesin', '', array('class' => 'form-control text-besar')) ?>
                            <label for="nomer_chasis">Nomor Chasis</label>
                            <?php echo CHtml::textField('nomer_chasis', '', array('class' => 'form-control text-besar')) ?>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="jenis_kendaraan">Jenis</label>
                                <?php
                                $tbl_jns = TblJnsKend::model()->findAll();
                                $type_list = CHtml::listData($tbl_jns, 'id_jns_kend', 'jns_kend');
                                echo CHtml::dropDownList('jenis_kendaraan', '', $type_list, array('class' => 'form-control wajib-isi'));
                                ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-6 no-margin no-padding">
                                <label for="status_kendaraan">Status</label>
                                <?php
                                echo CHtml::dropDownList('status_kendaraan', '', array(
                                    'UMUM' => 'UMUM',
                                    'TIDAK UMUM' => 'TIDAK UMUM',
                                        ), array('class' => 'form-control wajib-isi'));
                                ?>
                            </div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="merk">Merk</label>
                                <?php
                                $criteria_merk = new CDbCriteria();
                                $criteria_merk->order = 'merk asc';
                                $tbl_merk = TblMerk::model()->findAll($criteria_merk);
                                $type_list = CHtml::listData($tbl_merk, 'id_merk', 'merk');
                                echo CHtml::dropDownList('merk', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                                ?>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-6 no-margin no-padding">
                                <label for="tipe">Tipe</label>
                                <?php echo CHtml::textField('tipe', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            </div>
                            <label for="pengimport">Pengimport / Pabrik</label>
                            <?php echo CHtml::textField('pengimport', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                </div>
            </section><!--DATA KENDARAAN-->
            <h2>SPESIFIKASI</h2>
            <section class="col-lg-5 col-md-5 no-padding">
                <section class="col-lg-6 col-md-6">
                    <div class="col-md-12 no-padding">
                        <div class="box box-info">
                            <div class="box-header with-border bg-aqua">
                                <h3 class="box-title">DATA MESIN</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn bg-aqua-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div  class="box-body">
                                <label for="isi_silinder">Isi Silinder</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('isi_silinder', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(cc)</span>    
                                </div>
                                <label for="daya_motor">Daya Motor</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('daya_motor', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">PS/KW</span>    
                                </div>
                                <label for="bahan_bakar">Bahan Bakar</label>
                                <?php
                                echo CHtml::dropDownList('bahan_bakar', '', array(
                                    'BENSIN' => 'BENSIN',
                                    'SOLAR' => 'SOLAR',
                                    'GAS' => 'GAS',
                                        ), array('class' => 'form-control wajib-isi'));
                                ?>
                            </div>
                        </div>
                    </div><!--DATA MESIN-->
                    <div class="col-md-12 no-padding">
                        <div class="box box-info">
                            <div class="box-header with-border bg-aqua">
                                <h3 class="box-title">DIMENSI UTAMA</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn bg-aqua-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div  class="box-body">
                                <label for="panjang_utama">Panjang</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('panjang_utama', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>    
                                </div>
                                <label for="lebar_utama">Lebar</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('lebar_utama', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>    
                                </div>
                                <label for="tinggi_utama">Tinggi</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('tinggi_utama', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>    
                                </div>
                            </div>
                        </div>
                    </div><!--DIMENSI UTAMA-->
                    <div class="col-md-12 no-padding">
                        <div class="box box-info">
                            <div class="box-header with-border bg-aqua">
                                <h3 class="box-title">DIMENSI BAK MUATAN</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn bg-aqua-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div  class="box-body">
                                <label for="panjang_muatan">Panjang</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('panjang_muatan', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>    
                                </div>
                                <label for="lebar_muatan">Lebar</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('lebar_muatan', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>    
                                </div>
                                <label for="tinggi_muatan">Tinggi</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('tinggi_muatan', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>    
                                </div>
                            </div>
                        </div>
                    </div><!--DIMENSI BAK MUATAN-->
                </section>
                <section class="col-lg-6 col-md-6">
                    <div class="col-md-12 no-padding">
                        <div class="box box-warning">
                            <div class="box-header with-border bg-yellow">
                                <h3 class="box-title">URAIAN</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn bg-yellow-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div  class="box-body">
                                <label for="nama_komersil">Nama Komersil</label>
                                <?php
                                $criteria_nm_komersil = new CDbCriteria();
                                $criteria_nm_komersil->order = 'nama_komersil asc';
                                $tbl_nm_komersil = TblNamaKomersil::model()->findAll($criteria_nm_komersil);
                                $type_list = CHtml::listData($tbl_nm_komersil, 'id_nama_komersil', 'nama_komersil');
                                echo CHtml::dropDownList('nama_komersil', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                                ?>
                                <div class="col-md-6 no-margin no-padding">
                                    <label for="warna_cabin">Warna Cabin</label>
                                    <?php echo CHtml::textField('warna_cabin', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                                <div class="col-md-1 no-margin no-padding"></div>
                                <div class="col-md-5 no-margin no-padding">
                                    <label for="warna_bak">Warna Bak</label>
                                    <?php echo CHtml::textField('warna_bak', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                            </div>
                        </div>
                    </div><!--URAIAN-->
                    <div class="col-md-12 no-padding">
                        <div class="box box-warning">
                            <div class="box-header with-border bg-yellow">
                                <h3 class="box-title">BAGIAN MENJULUR</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn bg-yellow-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div  class="box-body">
                                <label for="kebelakang">Ke Belakang (ROH)</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('kebelakang', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>
                                </div>
                                <label for="kedepan">Ke Depan (FOH)</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('kedepan', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>
                                </div>
                                <label for="jarak_terendah">Jarak Terendah</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('jarak_terendah', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>
                                </div>
                            </div>
                        </div>
                    </div><!--END BAGIAN YANG MENGGANJUR-->
                    <div class="col-md-12 no-padding">
                        <div class="box box-warning">
                            <div class="box-header with-border bg-yellow">
                                <h3 class="box-title">KAROSERI</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn bg-yellow-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div  class="box-body">
                                <label for="karoseri_jenis">Jenis</label>
                                <?php
                                $criteria_kar_jenis = new CDbCriteria();
                                $criteria_kar_jenis->order = 'kar_jenis asc';
                                $tbl_kar_jenis = TblKarJenis::model()->findAll($criteria_kar_jenis);
                                $type_list = CHtml::listData($tbl_kar_jenis, 'id_kar_jenis', 'kar_jenis');
                                echo CHtml::dropDownList('karoseri_jenis', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                                ?>
                                <label for="karoseri_bahan">Bahan Utama</label>
                                <?php
                                $criteria_kar_bahan = new CDbCriteria();
                                $criteria_kar_bahan->order = 'kar_bahan asc';
                                $tbl_kar_bahan = TblKarBahan::model()->findAll($criteria_kar_bahan);
                                $type_list = CHtml::listData($tbl_kar_bahan, 'id_kar_bahan', 'kar_bahan');
                                echo CHtml::dropDownList('karoseri_bahan', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                                ?>
                                <div class="col-md-6 no-margin no-padding">
                                    <label for="tempat_duduk">Tempat Duduk</label>
                                    <?php echo CHtml::textField('tempat_duduk', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                                <div class="col-md-1 no-margin no-padding"></div>
                                <div class="col-md-5 no-margin no-padding">
                                    <label for="berdiri">Berdiri</label>
                                    <?php echo CHtml::textField('berdiri', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                                <label for="peng_khusus">Peng. Khusus</label>
                                <?php echo CHtml::textField('peng_khusus', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                    </div><!--END RUMAH-RUMAH(KAROSERI)-->
                </section>
            </section>
            <section class="col-lg-7 col-md-7">
                <div class="col-md-12 no-padding">
                    <div class="box box-success">
                        <div class="box-header with-border bg-green">
                            <h3 class="box-title">URAIAN SUMBU</h3>
                            <div class="box-tools pull-right">
                                <button class="btn bg-green-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div  class="box-body">
                            <div class="col-md-4 no-margin no-padding">
                                <label for="konfigurasi_sumbu">Konfigurasi Sumbu</label>
                                <?php echo CHtml::textField('konfigurasi_sumbu', '1.1', array('class' => 'form-control wajib-isi text-besar', 'readonly' => 'readonly')) ?>
                            </div>
                            <div class="col-md-9 no-margin no-padding">&nbsp;</div>
                            <!--JARAK SUMBU-->
                            <div class="col-md-6 no-margin no-padding">
                                <label for="jarak_sumbu_1">Jarak Sumbu</label>
                                <div class="input-group">
                                    <span class="input-group-addon">1. I-II</span>
                                    <?php echo CHtml::textField('jarak_sumbu_1', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="jarak_sumbu_2">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">2. II-III</span>
                                    <?php echo CHtml::textField('jarak_sumbu_2', '', array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(mm)</span>
                                </div>
                            </div>
                            <!--END JARAK SUMBU-->

                            <!--BERAT KENDARAAN SUMBU-->
                            <div class="col-md-6 no-margin no-padding">
                                <label for="berat_kendaraan_sumbu_1">Berat Kendaraan Sumbu</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Ke-1</span>
                                    <?php echo CHtml::textField('berat_kendaraan_sumbu_1', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(kg)</span>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="berat_kendaraan_sumbu_2">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Ke-2</span>
                                    <?php echo CHtml::textField('berat_kendaraan_sumbu_2', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(kg)</span>
                                </div>
                            </div>
                            <!--END BERAT KENDARAAN SUMBU-->

                            <!--PEMAKAIAN SUMBU BAN-->
                            <div class="col-md-6 no-margin no-padding">
                                <label for="pemakaian_sumbu_ban_1">Pemakaian Sumbu Ban</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Ke-1</span>
                                    <?php echo CHtml::textField('pemakaian_sumbu_ban_1', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="pemakaian_sumbu_ban_2">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Ke-2</span>
                                    <?php echo CHtml::textField('pemakaian_sumbu_ban_2', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                            </div>
                            <!--END PEMAKAIAN SUMBU BAN-->

                            <!--DAYA DUKUNG SESUAI PABRIK-->
                            <div class="col-md-6 no-margin no-padding">
                                <label for="daya_dukung_pabrik_1">Daya dukung sesuai pabrik</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Ke-1</span>
                                    <?php echo CHtml::textField('daya_dukung_pabrik_1', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="daya_dukung_pabrik_2">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Ke-2</span>
                                    <?php echo CHtml::textField('daya_dukung_pabrik_2', '', array('class' => 'form-control text-besar')) ?>
                                </div>
                            </div>
                            <!--END DAYA DUKUNG SESUAI PABRIK-->
                        </div>
                    </div>
                </div><!--URAIAN SUMBU-->
                <div class="col-md-12 no-padding">
                    <div class="box box-success">
                        <div class="box-header with-border bg-green">
                            <h3 class="box-title">KEMAMPUAN KENDARAAN</h3>
                            <div class="box-tools pull-right">
                                <button class="btn bg-green-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div  class="box-body">
                            <div class="col-md-12 no-margin no-padding">
                                <!--JUMLAH BERAT YANG DIPEROLEH-->
                                <div class="col-md-4 no-margin no-padding">
                                    <label for="1"><b>- Jumlah Berat yang Diperoleh</b></label><br />
                                    <label for="jbb">JBB</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('jbb', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                        <span class="input-group-addon">(Kg)</span>
                                    </div>
                                    <label for="jbkb">JBKB</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('jbkb', '', array('class' => 'form-control text-besar')) ?>
                                        <span class="input-group-addon">(Kg)</span>
                                    </div>
                                </div>
                                <div class="col-md-1 no-margin no-padding"></div>
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="1"><b>- Daya Angkut</b></label><br />
                                    <label for="daya_angkut_orang">Orang</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('daya_angkut_orang', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                        <span class="input-group-addon">(Kg)</span>
                                    </div>
                                    <label for="daya_angkut_barang">Barang</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('daya_angkut_barang', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                        <span class="input-group-addon">(Kg)</span>
                                    </div>
                                </div>
                                <div class="col-md-1 no-margin no-padding"></div>
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="1"><b>&nbsp;</b></label><br />
                                    <label for="kelas_jalan">Kelas Jalan</label>
                                    <?php echo CHtml::textField('kelas_jalan', 'III', array('class' => 'form-control wajib-isi text-besar', 'readonly' => 'readonly')) ?>
                                </div>
                                <!--JUMLAH BERAT YANG DIPEROLEH-->
                            </div>
                            <br />
                            <div class="col-md-12 no-margin no-padding">
                                <!--UKURAN-->
                                <div class="col-md-4 no-margin no-padding">
                                    <label for="q_r"><b>- Ukuran</b></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">q/r</span>
                                        <?php echo CHtml::textField('q_r', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                    </div>
                                </div>
                                <div class="col-md-1 no-margin no-padding"></div>
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="p1">&nbsp;</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">p1</span>
                                        <?php echo CHtml::textField('p1', '', array('class' => 'form-control text-besar')) ?>
                                    </div>
                                </div>
                                <div class="col-md-1 no-margin no-padding"></div>
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="p2">&nbsp;</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">p2</span>
                                        <?php echo CHtml::textField('p2', '', array('class' => 'form-control text-besar')) ?>
                                    </div>
                                </div>
                                <!--END UKURAN-->
                            </div>
                        </div>
                    </div>
                </div><!--KEMAMPUAN KENDARAAN-->
                <div class="col-md-12 no-padding">
                    <button type="button" disabled="true" class="btn btn-primary pull-right button_simpan" onclick="submitForm('<?php echo $this->createUrl('Editbuku/SaveForm'); ?>')">SIMPAN</button>
                </div>
            </section>
            <?php echo CHtml::endForm(); ?>
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
<div id="detail-buku" class="easyui-dialog" title="Detail Buku" style="width: 50%; height: 380px; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Close',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialogDetailBuku();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
        <img src="<?php echo Yii::app()->baseUrl;?>/images/loading.gif" />
        <br />
        <img src="<?php echo Yii::app()->baseUrl;?>/images/loading.gif" />
    </div>
</div>
<script>
    $(document).on("keypress", '#text_category', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch('<?php echo $this->createUrl('Editbuku/Proses'); ?>', 'ori');
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
    
    function detailBuku() {
        $('#detail-buku').dialog('open');
        $('#detail-buku').dialog('center');
    }
</script>