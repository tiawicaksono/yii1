<div class="col-lg-12 no-padding">
    <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'FORMINPUTBARU')); ?>
    <div class="col-md-12" style="margin-bottom: 10px">
        <button type="button" class="btn btn-primary pull-right" onclick="submitBaruForm('<?php echo $this->createUrl('Editbuku/SaveBaruForm'); ?>')">SIMPAN</button>
    </div>
    <section class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border bg-aqua">
                <h3 class="box-title">SERTIFIKASI</h3>
                <div class="box-tools pull-right">
                    <button class="btn bg-aqua-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <label for="nomer_sertifikasi_registrasi_baru">Nomor Sertifikat Registrasi Uji Tipe Kendaraan</label>
                    <?php echo CHtml::textField('nomer_sertifikasi_registrasi_baru', '', array('class' => 'form-control text-besar')); ?>
                    <div class="col-md-7 no-margin no-padding">
                        <label for="diterbitkan_nomer_sertifikasi_registrasi_baru">Diterbitkan Oleh</label>
                        <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_registrasi_baru', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                    <div class="col-md-1 no-margin no-padding"></div>
                    <div class="col-md-4 no-margin no-padding">
                        <label for="tgl_nomer_sertifikasi_registrasi_baru">Tanggal</label>
                        <input name="tgl_nomer_sertifikasi_registrasi_baru" id="tgl_nomer_sertifikasi_registrasi_baru" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                    <label for="nomer_sertifikasi_uji_baru">Nomor Sertifikat Uji Tipe Kendaraan</label>
                    <?php echo CHtml::textField('nomer_sertifikasi_uji_baru', '', array('class' => 'form-control text-besar')) ?>
                    <div class="col-md-7 no-margin no-padding">
                        <label for="diterbitkan_nomer_sertifikasi_uji_baru">Diterbitkan Oleh</label>
                        <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_uji_baru', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                    <div class="col-md-1 no-margin no-padding"></div>
                    <div class="col-md-4 no-margin no-padding">
                        <label for="tgl_nomer_sertifikasi_uji_baru">Tanggal</label>
                        <input name="tgl_nomer_sertifikasi_uji_baru" id="tgl_nomer_sertifikasi_uji" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                    <label for="nomer_sertifikasi_rancang_baru">Nomor Sertifikat Rancang Bangun</label>
                    <?php echo CHtml::textField('nomer_sertifikasi_rancang_baru', '', array('class' => 'form-control text-besar')) ?>
                    <div class="col-md-7 no-margin no-padding">
                        <label for="diterbitkan_nomer_sertifikasi_rancang_baru">Diterbitkan Oleh</label>
                        <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_rancang_baru', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                    <div class="col-md-1 no-margin no-padding"></div>
                    <div class="col-md-4 no-margin no-padding">
                        <label for="tgl_nomer_sertifikasi_rancang_baru">Tanggal</label>
                        <input name="tgl_nomer_sertifikasi_rancang_baru" id="tgl_nomer_sertifikasi_rancang" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        <?php // echo CHtml::textField('tgl_nomer_sertifikasi_rancang', '', array('class' => 'form-control tgl_all', 'readonly' => true)) 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SERTIFIKASI-->
    <section class="col-md-8">
        <div class="box box-danger">
            <div class="box-header with-border bg-red">
                <h3 class="box-title">DATA KENDARAAN</h3>
                <div class="box-tools pull-right">
                    <button class="btn bg-red-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-4">
                    <div class="col-md-12 no-margin no-padding">
                        <label for="nomer_uji_baru">Nomor Uji</label>
                        <?php
                        echo CHtml::textField('nomer_uji_baru', '', array('class' => 'form-control wajib-isi text-besar', 'required' => 'true'));
                        ?>
                    </div>
                    <label for="nomer_kendaraan_baru">Nomor Kendaraan</label>
                    <?php echo CHtml::textField('nomer_kendaraan_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                    <div class="col-md-4 no-margin no-padding">
                        <label for="identitas_baru">Identitas</label>
                        <?php
                        echo CHtml::dropDownList('identitas_baru', '', array(
                            ' ' => '',
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
                        <label for="nomer_identitas_baru">Nomor</label>
                        <?php echo CHtml::textField('nomer_identitas_baru', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                    <label for="nama_pemilik_baru">Nama Pemilik</label>
                    <?php echo CHtml::textField('nama_pemilik_baru', '', array('class' => 'form-control text-besar')) ?>

                    <label for="tempat_lahir_baru">Tempat Lahir</label>
                    <?php echo CHtml::textField('tempat_lahir_baru', '', array('class' => 'form-control text-besar')) ?>
                    <div class="col-md-7 no-margin no-padding">
                        <label for="tgl_lahir_baru">Tgl Lahir</label>
                        <input name="tgl_lahir_baru" id="tgl_lahir_baru" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                    <div class="col-md-1 no-margin no-padding"></div>
                    <div class="col-md-4 no-margin no-padding">
                        <label for="kelamin_baru">Kelamin</label>
                        <?php
                        echo CHtml::dropDownList('kelamin_baru', '', array(
                            '' => '',
                            'LAKI - LAKI' => 'L',
                            'PEREMPUAN' => 'P',
                        ), array('class' => 'form-control'));
                        ?>
                    </div>
                    <label for="no_telepon_baru">No Telepon</label>
                    <?php echo CHtml::textField('no_telepon_baru', '', array('class' => 'form-control text-besar')) ?>
                </div>
                <div class="col-md-4">
                    <label for="alamat_pemilik_baru">Alamat Pemilik</label>
                    <?php echo CHtml::textArea('alamat_pemilik_baru', '', array('class' => 'form-control text-besar')) ?>
                    <div class="col-md-5 no-margin no-padding">
                        <label for="rt_baru">RT</label>
                        <?php echo CHtml::textField('rt_baru', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                    <div class="col-md-1 no-margin no-padding"></div>
                    <div class="col-md-6 no-margin no-padding">
                        <label for="rw_baru">RW</label>
                        <?php echo CHtml::textField('rw_baru', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                    <label for="propinsi_baru">Provinsi</label>
                    <?php // echo CHtml::textField('propinsi_baru', 'JAWA TIMUR', array('class' => 'form-control text-besar', 'onkeyup' => 'cekPropinsiBaru()')); 
                    ?>
                    <?php
                    $criteria_provinsi = new CDbCriteria();
                    $criteria_provinsi->order = 'nama asc';
                    $tbl_provinsi = MProvinsi::model()->findAll($criteria_provinsi);
                    $type_list = CHtml::listData($tbl_provinsi, 'id_provinsi', 'nama');
                    echo CHtml::dropDownList('propinsi_select_baru', '35', $type_list, array('class' => 'propinsi_select_baru form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => 'selectProvinsiBaru()'));
                    ?>
                    <label for="kota_baru">Kota/Kab</label>
                    <?php // echo CHtml::textField('kota_baru', 'SAMPANG', array('class' => 'form-control text-besar', 'onkeyup' => 'cekKecamatanBaru()')); 
                    ?>
                    <?php
                    $criteria_kota = new CDbCriteria();
                    $criteria_kota->addCondition("id_provinsi = '35'");
                    $criteria_kota->order = 'nama asc';
                    $tbl_kota = MKota::model()->findAll($criteria_kota);
                    $type_list = CHtml::listData($tbl_kota, 'id_kota', 'nama');
                    echo CHtml::dropDownList('kota_select_baru', '3527', $type_list, array('class' => 'kota_select_baru form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => 'selectKotaBaru()'));
                    ?>
                    <label for="kecamatan_text_baru">Kecamatan</label>
                    <?php
                    //                    $criteria_nm_kecamatan = new CDbCriteria();
                    //                    $criteria_nm_kecamatan->order = 'nm_kecamatan asc';
                    //                    $tbl_nm_kecamatan = TblKecamatan::model()->findAll($criteria_nm_kecamatan);
                    //                    $type_list = CHtml::listData($tbl_nm_kecamatan, 'nm_kecamatan', 'nm_kecamatan');
                    //                    echo CHtml::dropDownList('kecamatan_select_baru', '', $type_list, array('class' => 'kecamatan_select_baru form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => '', 'onchange' => 'selectKecamatanBaru()'));
                    ?>
                    <?php // echo CHtml::textField('kecamatan_text_baru', '', array('class' => 'form-control text-besar kecamatan_text_baru', 'style' => 'display:none')) 
                    ?>
                    <?php
                    $criteria_kecamatan = new CDbCriteria();
                    $criteria_kecamatan->addCondition("id_kota = '3527'");
                    $criteria_kecamatan->order = 'nama asc';
                    $tbl_kecamatan = MKecamatan::model()->findAll($criteria_kecamatan);
                    $type_list = CHtml::listData($tbl_kecamatan, 'id_kecamatan', 'nama');
                    echo CHtml::dropDownList('kecamatan_select_baru', '3527010', $type_list, array('class' => 'kecamatan_select_baru form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => 'selectKecamatanBaru()'));
                    ?>
                    <label for="kelurahan_text_baru">Kelurahan/Desa</label>
                    <?php // echo CHtml::dropDownList('kelurahan_select_baru', '', array(''), array('class' => 'kelurahan_select_baru form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => '')); 
                    ?>
                    <?php // echo CHtml::textField('kelurahan_text_baru', '', array('class' => 'form-control text-besar kelurahan_text_baru', 'style' => 'display:none')); 
                    ?>
                    <?php
                    $criteria_kelurahan = new CDbCriteria();
                    $criteria_kelurahan->addCondition("id_kecamatan = '3527010'");
                    $criteria_kelurahan->order = 'nama asc';
                    $tbl_kelurahan = MKelurahan::model()->findAll($criteria_kelurahan);
                    $type_list = CHtml::listData($tbl_kelurahan, 'id_kelurahan', 'nama');
                    echo CHtml::dropDownList('kelurahan_select_baru', '3527010001', $type_list, array('class' => 'kelurahan_select_baru form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                    ?>

                </div>
                <div class="col-md-4">
                    <div class="col-md-7 no-margin no-padding">
                        <label for="awal_pemakaian_baru">Awal Pemakaian</label>
                        <input name="awal_pemakaian_baru" id="awal_pemakaian" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                    <div class="col-md-1 no-margin no-padding"></div>
                    <div class="col-md-4 no-margin no-padding">
                        <label for="tahun_baru">Tahun</label>
                        <?php echo CHtml::textField('tahun_baru', '', array('class' => 'form-control text-besar wajib-isi', 'maxlength' => 4, 'size' => 4)) ?>
                    </div>
                    <label for="nomer_mesin_baru">Nomor Mesin</label>
                    <?php echo CHtml::textField('nomer_mesin_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                    <label for="nomer_chasis_baru">Nomor Chasis</label>
                    <?php echo CHtml::textField('nomer_chasis_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                    <div class="col-md-5 no-margin no-padding">
                        <label for="jenis_kendaraan_baru">Jenis</label>
                        <?php
                        $tbl_jns = TblJnsKend::model()->findAll();
                        $type_list = CHtml::listData($tbl_jns, 'id_jns_kend', 'jns_kend');
                        echo CHtml::dropDownList('jenis_kendaraan_baru', '', $type_list, array('class' => 'form-control wajib-isi'));
                        ?>
                    </div>
                    <div class="col-md-1 no-margin no-padding"></div>
                    <div class="col-md-6 no-margin no-padding">
                        <label for="status_kendaraan_baru">Status</label>
                        <?php
                        echo CHtml::dropDownList('status_kendaraan_baru', '', array(
                            'UMUM' => 'UMUM',
                            'TIDAK UMUM' => 'TIDAK UMUM'
                        ), array('class' => 'form-control wajib-isi'));
                        ?>
                    </div>
                    <label for="merk_baru">Merk</label>
                    <?php
                    $criteria_merk = new CDbCriteria();
                    $criteria_merk->order = 'merk asc';
                    $tbl_merk = TblMerk::model()->findAll($criteria_merk);
                    $type_list = CHtml::listData($tbl_merk, 'merk', 'merk');
                    echo CHtml::dropDownList('merk_baru', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                    ?>
                    <label for="tipe_baru">Tipe</label>
                    <?php echo CHtml::textField('tipe_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                    <label for="pengimport_baru">Pengimport / Pabrik</label>
                    <?php echo CHtml::textField('pengimport_baru', '', array('class' => 'form-control text-besar')) ?>
                </div>
            </div>
        </div>
    </section>
    <!--DATA KENDARAAN-->
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
                    <div class="box-body">
                        <label for="isi_silinder_baru">Isi Silinder</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('isi_silinder_baru', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                            <span class="input-group-addon">(cc)</span>
                        </div>
                        <label for="daya_motor_baru">Daya Motor</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('daya_motor_baru', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                            <span class="input-group-addon">PS/KW</span>
                        </div>
                        <label for="bahan_bakar_baru">Bahan Bakar</label>
                        <?php
                        echo CHtml::dropDownList('bahan_bakar_baru', '', array(
                            '-' => '-',
                            'BENSIN' => 'BENSIN',
                            'SOLAR' => 'SOLAR',
                            'GAS' => 'GAS',
                        ), array('class' => 'form-control wajib-isi'));
                        ?>
                    </div>
                </div>
            </div>
            <!--DATA MESIN-->
            <div class="col-md-12 no-padding">
                <div class="box box-info">
                    <div class="box-header with-border bg-aqua">
                        <h3 class="box-title">DIMENSI UTAMA</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-aqua-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <label for="panjang_utama_baru">Panjang</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('panjang_utama_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                        <label for="lebar_utama_baru">Lebar</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('lebar_utama_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                        <label for="tinggi_utama_baru">Tinggi</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('tinggi_utama_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--DIMENSI UTAMA-->
            <div class="col-md-12 no-padding">
                <div class="box box-info">
                    <div class="box-header with-border bg-aqua">
                        <h3 class="box-title">DIMENSI BAK MUATAN</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-aqua-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <label for="panjang_muatan_baru">Panjang</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('panjang_muatan_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                        <label for="lebar_muatan_baru">Lebar</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('lebar_muatan_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                        <label for="tinggi_muatan_baru">Tinggi</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('tinggi_muatan_baru', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--DIMENSI BAK MUATAN-->
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
                    <div class="box-body">
                        <label for="nama_komersil_baru">Nama Komersil</label>
                        <?php
                        $criteria_nm_komersil = new CDbCriteria();
                        $criteria_nm_komersil->order = 'nm_komersil asc';
                        $tbl_nm_komersil = TblNmKomersil::model()->findAll($criteria_nm_komersil);
                        $type_list = CHtml::listData($tbl_nm_komersil, 'nm_komersil', 'nm_komersil');
                        echo CHtml::dropDownList('nama_komersil_baru', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                        ?>
                        <?php // echo CHtml::textField('nama_komersil_baru', '', array('class' => 'form-control text-besar')) 
                        ?>
                        <div class="col-md-6 no-margin no-padding">
                            <label for="warna_cabin_baru">Warna Cabin</label>
                            <?php echo CHtml::textField('warna_cabin_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="warna_bak_baru">Warna Bak</label>
                            <?php echo CHtml::textField('warna_bak_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--URAIAN-->
            <div class="col-md-12 no-padding">
                <div class="box box-warning">
                    <div class="box-header with-border bg-yellow">
                        <h3 class="box-title">BAGIAN MENJULUR</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-yellow-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <label for="kebelakang_baru">Ke Belakang (ROH)</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('kebelakang_baru', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                        <label for="kedepan_baru">Ke Depan (FOH)</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('kedepan_baru', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                        <label for="jarak_terendah_baru">Jarak Terendah</label>
                        <div class="input-group">
                            <?php echo CHtml::textField('jarak_terendah_baru', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--END BAGIAN YANG MENGGANJUR-->
            <div class="col-md-12 no-padding">
                <div class="box box-warning">
                    <div class="box-header with-border bg-yellow">
                        <h3 class="box-title">KAROSERI</h3>
                        <div class="box-tools pull-right">
                            <button class="btn bg-yellow-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <!--<label for="nama_karoseri_baru">Nama Karoseri</label>-->
                        <?php
                        //                        $criteria_kar_jenis = new CDbCriteria();
                        //                        $criteria_kar_jenis->order = 'nm_karoseri asc';
                        //                        $tbl_kar_jenis = TblNmKaroseri::model()->findAll($criteria_kar_jenis);
                        //                        $type_list = CHtml::listData($tbl_kar_jenis, 'nm_karoseri', 'nm_karoseri');
                        //                        echo CHtml::dropDownList('nama_karoseri_baru', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                        ?>
                        <label for="karoseri_jenis_baru">Jenis</label>
                        <?php
                        $criteria_kar_jenis = new CDbCriteria();
                        $criteria_kar_jenis->order = 'kar_jenis asc';
                        $tbl_kar_jenis = TblKarJenis::model()->findAll($criteria_kar_jenis);
                        $type_list = CHtml::listData($tbl_kar_jenis, 'kar_jenis', 'kar_jenis');
                        echo CHtml::dropDownList('karoseri_jenis_baru', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                        ?>
                        <?php // echo CHtml::textField('karoseri_jenis_baru', '', array('class' => 'form-control text-besar')) 
                        ?>
                        <label for="karoseri_bahan_baru">Bahan Utama</label>
                        <?php
                        $criteria_kar_bahan = new CDbCriteria();
                        $criteria_kar_bahan->order = 'kar_bahan asc';
                        $tbl_kar_bahan = TblKarBahan::model()->findAll($criteria_kar_bahan);
                        $type_list = CHtml::listData($tbl_kar_bahan, 'kar_bahan', 'kar_bahan');
                        echo CHtml::dropDownList('karoseri_bahan_baru', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                        ?>
                        <?php // echo CHtml::textField('karoseri_bahan_baru', '', array('class' => 'form-control text-besar')) 
                        ?>
                        <div class="col-md-6 no-margin no-padding">
                            <label for="tempat_duduk_baru">Duduk</label>
                            <?php echo CHtml::textField('tempat_duduk_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="berdiri_baru">Berdiri</label>
                            <?php echo CHtml::textField('berdiri_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <label for="peng_khusus_baru">Peng. Khusus</label>
                        <?php echo CHtml::textField('peng_khusus_baru', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                </div>
            </div>
            <!--END RUMAH-RUMAH(KAROSERI)-->
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
                <div class="box-body">
                    <div class="col-md-4 no-margin no-padding">
                        <label for="konfigurasi_sumbu_baru">Konfigurasi Sumbu</label>
                        <?php
                        $criteria = new CDbCriteria();
                        $criteria->order = 'konfigurasi_sumbu asc';
                        $tbl_konf_sumbu = TblKonfigurasiSumbu::model()->findAll($criteria);
                        $type_list = CHtml::listData($tbl_konf_sumbu, 'konfigurasi_sumbu', 'konfigurasi_sumbu');
                        echo CHtml::dropDownList('konfigurasi_sumbu_baru', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                        ?>
                    </div>
                    <div class="col-md-8 no-margin no-padding">&nbsp;</div>
                    <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                    <!--JARAK SUMBU-->
                    <div class="col-md-3 no-margin no-padding">
                        <label for="jarak_sumbu_1_baru">Jarak Sumbu</label>
                        <div class="input-group">
                            <span class="input-group-addon">I-II</span>
                            <?php echo CHtml::textField('jarak_sumbu_1_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <label for="jarak_sumbu_2_baru">&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-addon">II-III</span>
                            <?php echo CHtml::textField('jarak_sumbu_2_baru', 0, array('class' => 'form-control text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <label for="jarak_sumbu_3_baru">&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-addon">III-IV</span>
                            <?php echo CHtml::textField('jarak_sumbu_3_baru', 0, array('class' => 'form-control text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <label for="jarak_sumbu_4_baru">&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-addon">IV-V</span>
                            <?php echo CHtml::textField('jarak_sumbu_4_baru', 0, array('class' => 'form-control text-besar')) ?>
                            <span class="input-group-addon">(mm)</span>
                        </div>
                    </div>
                    <!--END JARAK SUMBU-->
                    <div class="col-md-12 no-margin no-padding">&nbsp;</div>

                    <div class="col-md-12 no-margin no-padding"><b>Berat Kendaraan Sumbu</b></div>
                    <!--BERAT KENDARAAN SUMBU-->
                    <div class="col-md-3 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-1</span>
                            <?php echo CHtml::textField('berat_kendaraan_sumbu_1_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(kg)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-2</span>
                            <?php echo CHtml::textField('berat_kendaraan_sumbu_2_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                            <span class="input-group-addon">(kg)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-3</span>
                            <?php echo CHtml::textField('berat_kendaraan_sumbu_3_baru', 0, array('class' => 'form-control text-besar')) ?>
                            <span class="input-group-addon">(kg)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">&nbsp;</div>
                    <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                    <div class="col-md-3 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-4</span>
                            <?php echo CHtml::textField('berat_kendaraan_sumbu_4_baru', 0, array('class' => 'form-control text-besar')) ?>
                            <span class="input-group-addon">(kg)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-5</span>
                            <?php echo CHtml::textField('berat_kendaraan_sumbu_5_baru', 0, array('class' => 'form-control text-besar')) ?>
                            <span class="input-group-addon">(kg)</span>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">&nbsp;</div>
                    <div class="col-md-3 no-margin no-padding">&nbsp;</div>
                    <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                    <!--END BERAT KENDARAAN SUMBU-->

                    <!--PEMAKAIAN SUMBU BAN-->
                    <div class="col-md-3 no-margin no-padding">
                        <label for="pemakaian_sumbu_ban_1_baru">Pemakaian Sumbu Ban</label>
                        <div class="input-group">
                            <span class="input-group-addon">Ke-1</span>
                            <?php echo CHtml::textField('pemakaian_sumbu_ban_1_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <label for="pemakaian_sumbu_ban_2_baru">&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-addon">Ke-2</span>
                            <?php echo CHtml::textField('pemakaian_sumbu_ban_2_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <label for="pemakaian_sumbu_ban_3_baru">&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-addon">Ke-3</span>
                            <?php echo CHtml::textField('pemakaian_sumbu_ban_3_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-3 no-margin no-padding">
                        <label for="pemakaian_sumbu_ban_4_baru">&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-addon">Ke-4</span>
                            <?php echo CHtml::textField('pemakaian_sumbu_ban_4_baru', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                    <!--END PEMAKAIAN SUMBU BAN-->

                    <!--DAYA DUKUNG SESUAI PABRIK-->
                    <div class="col-md-12 no-margin no-padding"><b>Daya dukung sesuai pabrik</b></div>
                    <div class="col-md-2 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-1</span>
                            <?php echo CHtml::textField('daya_dukung_pabrik_1_baru', 0, array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-2 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-2</span>
                            <?php echo CHtml::textField('daya_dukung_pabrik_2_baru', 0, array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-2 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-3</span>
                            <?php echo CHtml::textField('daya_dukung_pabrik_3_baru', 0, array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-2 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-4</span>
                            <?php echo CHtml::textField('daya_dukung_pabrik_4_baru', 0, array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-2 no-margin no-padding">
                        <div class="input-group">
                            <span class="input-group-addon">Ke-5</span>
                            <?php echo CHtml::textField('daya_dukung_pabrik_5_baru', 0, array('class' => 'form-control text-besar')) ?>
                        </div>
                    </div>
                    <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                    <!--END DAYA DUKUNG SESUAI PABRIK-->
                </div>
            </div>
        </div>
        <!--URAIAN SUMBU-->
        <div class="col-md-12 no-padding">
            <div class="box box-success">
                <div class="box-header with-border bg-green">
                    <h3 class="box-title">KEMAMPUAN KENDARAAN</h3>
                    <div class="box-tools pull-right">
                        <button class="btn bg-green-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12 no-margin no-padding">
                        <!--JUMLAH BERAT YANG DIPEROLEH-->
                        <div class="col-md-4 no-margin no-padding">
                            <label for="1"><b>- Jumlah Berat yang Diperoleh</b></label><br />
                            <label for="jbb_baru">JBB</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('jbb_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(Kg)</span>
                            </div>
                            <label for="jbkb_baru">JBKB</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('jbkb_baru', 0, array('class' => 'form-control text-besar')) ?>
                                <span class="input-group-addon">(Kg)</span>
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="1"><b>- Daya Angkut</b></label><br />
                            <label for="daya_angkut_orang_baru">Orang</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('daya_angkut_orang_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(Kg)</span>
                            </div>
                            <label for="daya_angkut_barang_baru">Barang</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('daya_angkut_barang_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(Kg)</span>
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="1"><b>&nbsp;</b></label><br />
                            <label for="kelas_jalan_baru">Kelas Jalan</label>
                            <select name="kelas_jalan_baru" id="kelas_jalan_baru" class="form-control wajib-isi">
                                <?php
                                $tbl_kelas_jalan = TblKelasJalan::model()->findAll();
                                foreach ($tbl_kelas_jalan as $data_kelas_jalan) {
                                ?>
                                    <option value="<?php echo $data_kelas_jalan->kelas_jalan; ?>"><?php echo $data_kelas_jalan->kelas_jalan; ?></option>
                                <?php } ?>
                            </select>
                            <label for="mst_baru">MST</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('mst_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(Kg)</span>
                            </div>
                        </div>
                        <!--JUMLAH BERAT YANG DIPEROLEH-->
                    </div>
                    <br />
                    <div class="col-md-12 no-margin no-padding">
                        <!--UKURAN-->
                        <div class="col-md-4 no-margin no-padding">
                            <label for="q_r_baru"><b>- Ukuran</b></label>
                            <div class="input-group">
                                <span class="input-group-addon">q/r</span>
                                <?php echo CHtml::textField('q_r_baru', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="p1_baru">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">p1</span>
                                <?php echo CHtml::textField('p1_baru', 0, array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="p2_baru">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">p2</span>
                                <?php echo CHtml::textField('p2_baru', 0, array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <!--END UKURAN-->
                    </div>
                </div>
            </div>
        </div>
        <!--KEMAMPUAN KENDARAAN-->
        <div class="col-md-12 no-padding">
            <button type="button" class="btn btn-primary pull-right" onclick="submitBaruForm('<?php echo $this->createUrl('Editbuku/SaveBaruForm'); ?>')">SIMPAN</button>
        </div>
    </section>
    <?php echo CHtml::endForm(); ?>
</div>