<div class="row">
    <div class="col-lg-12">
        <!--<div class="col-lg-10 no-padding">-->
        <div class="col-lg-2 col-md-3">
            <input type="text" id="text_category" class="text-besar form-control atas_search" placeholder="No Uji / No Kendaraan">
        </div>
        <div class="col-lg-1 col-md-1"><span style="margin-top:70px">acuan dari: </span></div>
        <div class="col-lg-3 col-md-5">
            <div class="input-group">
                <span class="input-group-btn">
                    <select class="btn" id="select_category_acuan" disabled="true">
                        <option value="no_uji">No Uji</option>
                        <option value="no_kendaraan">No Kendaraan</option>
                        <option selected="selected" value="no_chasis">No Chasis</option>
                        <option value="no_mesin">No Mesin</option>
                        <option value="tipe">Tipe</option>
                        <option value="merk">Merk</option>
                        <option value="pengimport">Karoseri</option>
                        <option value="nama_pemilik">Pemilik</option>
                    </select>
                </span>
                <?php echo CHtml::textField('text_category_acuan', '', array('class' => 'form-control text-besar', 'disabled' => true)); ?>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <button id="detail_buku" type="button" class="btn btn-info" disabled="disabled" onclick="buttonDetailBuku()"><span class="glyphicon glyphicon-duplicate"></span> Lihat Buku</button>
        </div>
        <!--</div>-->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'FORMINPUT')); ?>
        <div class="col-md-12" style="margin-bottom: 10px">
            <button type="button" disabled="true" class="btn btn-primary button_simpan pull-right" onclick="submitForm('<?php echo $this->createUrl('Editbuku/SaveForm'); ?>')">SIMPAN</button>
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
                        <label for="nomer_sertifikasi_registrasi">Nomor Sertifikat Registrasi Uji Tipe Kendaraan</label>
                        <?php echo CHtml::textField('nomer_sertifikasi_registrasi', '', array('class' => 'form-control text-besar')); ?>
                        <div class="col-md-7 no-margin no-padding">
                            <label for="diterbitkan_nomer_sertifikasi_registrasi">Diterbitkan Oleh</label>
                            <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_registrasi', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="tgl_nomer_sertifikasi_registrasi">Tanggal</label>
                            <input name="tgl_nomer_sertifikasi_registrasi" id="tgl_nomer_sertifikasi_registrasi" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            <?php // echo CHtml::textField('tgl_nomer_sertifikasi_registrasi', '', array('class' => 'form-control tgl_all', 'readonly' => true)) 
                            ?>
                        </div>
                        <label for="nomer_sertifikasi_uji">Nomor Sertifikat Uji Tipe Kendaraan</label>
                        <?php echo CHtml::textField('nomer_sertifikasi_uji', '', array('class' => 'form-control text-besar')) ?>
                        <div class="col-md-7 no-margin no-padding">
                            <label for="diterbitkan_nomer_sertifikasi_uji">Diterbitkan Oleh</label>
                            <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_uji', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="tgl_nomer_sertifikasi_uji">Tanggal</label>
                            <input name="tgl_nomer_sertifikasi_uji" id="tgl_nomer_sertifikasi_uji" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            <?php // echo CHtml::textField('tgl_nomer_sertifikasi_uji', '', array('class' => 'form-control tgl_all', 'readonly' => true)) 
                            ?>
                        </div>
                        <label for="nomer_sertifikasi_rancang">Nomor Sertifikat Rancang Bangun</label>
                        <?php echo CHtml::textField('nomer_sertifikasi_rancang', '', array('class' => 'form-control text-besar')) ?>
                        <div class="col-md-7 no-margin no-padding">
                            <label for="diterbitkan_nomer_sertifikasi_rancang">Diterbitkan Oleh</label>
                            <?php echo CHtml::textField('diterbitkan_nomer_sertifikasi_rancang', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="tgl_nomer_sertifikasi_rancang">Tanggal</label>
                            <input name="tgl_nomer_sertifikasi_rancang" id="tgl_nomer_sertifikasi_rancang" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
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
                            <label for="nomer_uji">Nomor Uji</label>
                            <?php
                            echo CHtml::hiddenField('id_kendaraan', '', array('class' => 'form-control text-besar'));
                            echo CHtml::textField('nomer_uji', '', array('class' => 'form-control wajib-isi text-besar', 'required' => 'true'));
                            ?>
                        </div>
                        <label for="nomer_kendaraan">Nomor Kendaraan</label>
                        <?php echo CHtml::textField('nomer_kendaraan', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="identitas">Identitas</label>
                            <?php
                            echo CHtml::dropDownList('identitas', '', array(
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
                            <label for="nomer_identitas">Nomor</label>
                            <?php echo CHtml::textField('nomer_identitas', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <?php echo CHtml::textField('nama_pemilik', '', array('class' => 'form-control text-besar')) ?>
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <?php echo CHtml::textField('tempat_lahir', '', array('class' => 'form-control text-besar')) ?>
                        <div class="col-md-7 no-margin no-padding">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input name="tgl_lahir" id="tgl_lahir" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            <?php // echo CHtml::textField('tgl_lahir', '', array('class' => 'form-control tgl_all', 'readonly' => true)) 
                            ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="kelamin">Kelamin</label>
                            <?php
                            echo CHtml::dropDownList('kelamin', '', array(
                                '' => '',
                                'LAKI - LAKI' => 'L',
                                'PEREMPUAN' => 'P',
                            ), array('class' => 'form-control'));
                            ?>
                        </div>
                        <label for="no_telepon">No Telepon</label>
                        <?php echo CHtml::textField('no_telepon', '', array('class' => 'form-control text-besar')) ?>
                    </div>
                    <div class="col-md-4">
                        <label for="alamat_pemilik">Alamat Pemilik</label>
                        <?php echo CHtml::textArea('alamat_pemilik', '', array('class' => 'form-control text-besar')) ?>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="rt">RT</label>
                            <?php echo CHtml::textField('rt', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-6 no-margin no-padding">
                            <label for="rw">RW</label>
                            <?php echo CHtml::textField('rw', '', array('class' => 'form-control text-besar')) ?>
                        </div>
                        <label for="propinsi">Provinsi</label>
                        <?php // echo CHtml::textField('propinsi', 'JAWA TIMUR', array('class' => 'form-control text-besar', 'onkeyup' => 'cekPropinsi()')); 
                        ?>
                        <?php
                        $criteria_provinsi = new CDbCriteria();
                        $criteria_provinsi->order = 'nama asc';
                        $tbl_provinsi = MProvinsi::model()->findAll($criteria_provinsi);
                        $type_list = CHtml::listData($tbl_provinsi, 'id_provinsi', 'nama');
                        echo CHtml::dropDownList('propinsi_select', '35', $type_list, array('class' => 'propinsi_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => 'selectProvinsi()'));
                        ?>
                        <label for="kota">Kota/Kab</label>
                        <?php // echo CHtml::textField('kota', 'SAMPANG', array('class' => 'form-control', 'onkeyup' => 'cekKecamatan()')); 
                        ?>
                        <?php
                        $criteria_kota = new CDbCriteria();
                        $criteria_kota->addCondition("id_provinsi = '35'");
                        $criteria_kota->order = 'nama asc';
                        $tbl_kota = MKota::model()->findAll($criteria_kota);
                        $type_list = CHtml::listData($tbl_kota, 'id_kota', 'nama');
                        echo CHtml::dropDownList('kota_select', '3527', $type_list, array('class' => 'kota_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => 'selectKota()'));
                        ?>
                        <label for="kecamatan">Kecamatan</label>
                        <?php
                        //                        $criteria_nm_kecamatan = new CDbCriteria();
                        //                        $criteria_nm_kecamatan->order = 'nm_kecamatan asc';
                        //                        $tbl_nm_kecamatan = TblKecamatan::model()->findAll($criteria_nm_kecamatan);
                        //                        $type_list = CHtml::listData($tbl_nm_kecamatan, 'nm_kecamatan', 'nm_kecamatan');
                        //                        echo CHtml::dropDownList('kecamatan_select', '', $type_list, array('class' => 'kecamatan_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => '', 'onchange' => 'selectKecamatan()'));
                        ?>
                        <?php
                        $criteria_kecamatan = new CDbCriteria();
                        $criteria_kecamatan->addCondition("id_kota = '3527'");
                        $criteria_kecamatan->order = 'nama asc';
                        $tbl_kecamatan = MKecamatan::model()->findAll($criteria_kecamatan);
                        $type_list = CHtml::listData($tbl_kecamatan, 'id_kecamatan', 'nama');
                        echo CHtml::dropDownList('kecamatan_select', '3527010', $type_list, array('class' => 'kecamatan_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => 'selectKecamatan()', 'empty' => ''));
                        ?>
                        <?php // echo CHtml::textField('kecamatan_text', '', array('class' => 'form-control text-besar kecamatan_text', 'style' => 'display:none')) 
                        ?>
                        <label for="kelurahan">Kelurahan/Desa</label>
                        <?php // echo CHtml::dropDownList('kelurahan_select', '', array(''), array('class' => 'kelurahan_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => '')); 
                        ?>
                        <?php // echo CHtml::textField('kelurahan_text', '', array('class' => 'form-control text-besar kelurahan_text', 'style' => 'display:none')); 
                        ?>
                        <?php
                        $criteria_kelurahan = new CDbCriteria();
                        $criteria_kelurahan->addCondition("id_kecamatan = '3527010'");
                        $criteria_kelurahan->order = 'nama asc';
                        $tbl_kelurahan = MKelurahan::model()->findAll($criteria_kelurahan);
                        $type_list = CHtml::listData($tbl_kelurahan, 'id_kelurahan', 'nama');
                        echo CHtml::dropDownList('kelurahan_select', '3527010001', $type_list, array('class' => 'kelurahan_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'empty' => ''));
                        //                        echo CHtml::textField('kelurahan_text', '', array('class' => 'form-control text-besar kelurahan_text', 'style' => 'display:none')); 
                        ?>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-7 no-margin no-padding">
                            <label for="awal_pemakaian">Awal Pemakaian</label>
                            <input name="awal_pemakaian" id="awal_pemakaian" type="text" class="form-control datemask tgl_datepicker_datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            <?php // echo CHtml::textField('awal_pemakaian', '', array('class' => 'form-control tgl_all', 'readonly' => true)) 
                            ?>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="tahun">Tahun</label>
                            <?php echo CHtml::textField('tahun', '', array('class' => 'form-control text-besar wajib-isi', 'maxlength' => 4, 'size' => 4)) ?>
                        </div>
                        <label for="nomer_mesin">Nomor Mesin</label>
                        <?php echo CHtml::textField('nomer_mesin', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                        <label for="nomer_chasis">Nomor Chasis</label>
                        <?php echo CHtml::textField('nomer_chasis', '', array('class' => 'form-control wajib-isi text-besar')) ?>
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
                                'TIDAK UMUM' => 'TIDAK UMUM'
                            ), array('class' => 'form-control wajib-isi'));
                            ?>
                        </div>
                        <label for="merk">Merk</label>
                        <?php
                        $criteria_merk = new CDbCriteria();
                        $criteria_merk->order = 'merk asc';
                        $tbl_merk = TblMerk::model()->findAll($criteria_merk);
                        $type_list = CHtml::listData($tbl_merk, 'merk', 'merk');
                        echo CHtml::dropDownList('merk', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                        ?>
                        <label for="tipe">Tipe</label>
                        <?php echo CHtml::textField('tipe', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                        <label for="pengimport">Pengimport / Pabrik</label>
                        <?php echo CHtml::textField('pengimport', '', array('class' => 'form-control text-besar')) ?>
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
                            <label for="isi_silinder">Isi Silinder</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('isi_silinder', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                                <span class="input-group-addon">(cc)</span>
                            </div>
                            <label for="daya_motor">Daya Motor</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('daya_motor', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                                <span class="input-group-addon">PS/KW</span>
                            </div>
                            <label for="bahan_bakar">Bahan Bakar</label>
                            <?php // echo CHtml::textField('bahan_bakar', 'SOLAR', array('class' => 'form-control text-besar')) 
                            ?>
                            <?php
                            echo CHtml::dropDownList('bahan_bakar', '', array(
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
                            <label for="panjang_muatan">Panjang</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('panjang_muatan', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(mm)</span>
                            </div>
                            <label for="lebar_muatan">Lebar</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('lebar_muatan', '', array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(mm)</span>
                            </div>
                            <label for="tinggi_muatan">Tinggi</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('tinggi_muatan', '', array('class' => 'form-control wajib-isi text-besar')) ?>
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
                            <label for="nama_komersil">Nama Komersil</label>
                            <?php
                            $criteria_nm_komersil = new CDbCriteria();
                            $criteria_nm_komersil->order = 'nm_komersil asc';
                            $tbl_nm_komersil = TblNmKomersil::model()->findAll($criteria_nm_komersil);
                            $type_list = CHtml::listData($tbl_nm_komersil, 'nm_komersil', 'nm_komersil');
                            echo CHtml::dropDownList('nama_komersil', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                            ?>
                            <?php // echo CHtml::textField('nama_komersil', '', array('class' => 'form-control text-besar')) 
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
                            <label for="kebelakang">Ke Belakang (ROH)</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('kebelakang', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                                <span class="input-group-addon">(mm)</span>
                            </div>
                            <label for="kedepan">Ke Depan (FOH)</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('kedepan', '', array('class' => 'wajib-isi form-control text-besar')) ?>
                                <span class="input-group-addon">(mm)</span>
                            </div>
                            <label for="jarak_terendah">Jarak Terendah</label>
                            <div class="input-group">
                                <?php echo CHtml::textField('jarak_terendah', '', array('class' => 'wajib-isi form-control text-besar')) ?>
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
                            <!--<label for="nama_karoseri">Nama Karoseri</label>-->
                            <?php
                            //                            $criteria_kar_jenis = new CDbCriteria();
                            //                            $criteria_kar_jenis->order = 'nm_karoseri asc';
                            //                            $tbl_kar_jenis = TblNmKaroseri::model()->findAll($criteria_kar_jenis);
                            //                            $type_list = CHtml::listData($tbl_kar_jenis, 'nm_karoseri', 'nm_karoseri');
                            //                            echo CHtml::dropDownList('nama_karoseri', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                            ?>
                            <label for="karoseri_jenis">Jenis</label>
                            <?php
                            $criteria_kar_jenis = new CDbCriteria();
                            $criteria_kar_jenis->order = 'kar_jenis asc';
                            $tbl_kar_jenis = TblKarJenis::model()->findAll($criteria_kar_jenis);
                            $type_list = CHtml::listData($tbl_kar_jenis, 'kar_jenis', 'kar_jenis');
                            echo CHtml::dropDownList('karoseri_jenis', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                            ?>
                            <?php // echo CHtml::textField('karoseri_jenis', '', array('class' => 'form-control text-besar')) 
                            ?>
                            <label for="karoseri_bahan">Bahan Utama</label>
                            <?php
                            $criteria_kar_bahan = new CDbCriteria();
                            $criteria_kar_bahan->order = 'kar_bahan asc';
                            $tbl_kar_bahan = TblKarBahan::model()->findAll($criteria_kar_bahan);
                            $type_list = CHtml::listData($tbl_kar_bahan, 'kar_bahan', 'kar_bahan');
                            echo CHtml::dropDownList('karoseri_bahan', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                            ?>
                            <?php // echo CHtml::textField('karoseri_bahan', '', array('class' => 'form-control text-besar')) 
                            ?>
                            <div class="col-md-6 no-margin no-padding">
                                <label for="tempat_duduk">Duduk</label>
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
                            <label for="konfigurasi_sumbu">Konfigurasi Sumbu</label>
                            <?php
                            $criteria = new CDbCriteria();
                            $criteria->order = 'konfigurasi_sumbu asc';
                            $tbl_konf_sumbu = TblKonfigurasiSumbu::model()->findAll($criteria);
                            $type_list = CHtml::listData($tbl_konf_sumbu, 'konfigurasi_sumbu', 'konfigurasi_sumbu');
                            echo CHtml::dropDownList('konfigurasi_sumbu', '', $type_list, array('class' => 'form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                            ?>
                        </div>
                        <div class="col-md-8 no-margin no-padding">&nbsp;</div>
                        <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                        <!--JARAK SUMBU-->
                        <div class="col-md-3 no-margin no-padding">
                            <label for="jarak_sumbu_1">Jarak Sumbu</label>
                            <div class="input-group">
                                <span class="input-group-addon">I-II</span>
                                <?php echo CHtml::textField('jarak_sumbu_1', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(mm)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="jarak_sumbu_2">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">II-III</span>
                                <?php echo CHtml::textField('jarak_sumbu_2', 0, array('class' => 'form-control text-besar')) ?>
                                <span class="input-group-addon">(mm)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="jarak_sumbu_3">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">III-IV</span>
                                <?php echo CHtml::textField('jarak_sumbu_3', 0, array('class' => 'form-control text-besar')) ?>
                                <span class="input-group-addon">(mm)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="jarak_sumbu_4">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">IV-V</span>
                                <?php echo CHtml::textField('jarak_sumbu_4', 0, array('class' => 'form-control text-besar')) ?>
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
                                <?php echo CHtml::textField('berat_kendaraan_sumbu_1', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(kg)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-2</span>
                                <?php echo CHtml::textField('berat_kendaraan_sumbu_2', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                <span class="input-group-addon">(kg)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-3</span>
                                <?php echo CHtml::textField('berat_kendaraan_sumbu_3', 0, array('class' => 'form-control text-besar')) ?>
                                <span class="input-group-addon">(kg)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">&nbsp;</div>
                        <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                        <div class="col-md-3 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-4</span>
                                <?php echo CHtml::textField('berat_kendaraan_sumbu_4', 0, array('class' => 'form-control text-besar')) ?>
                                <span class="input-group-addon">(kg)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-5</span>
                                <?php echo CHtml::textField('berat_kendaraan_sumbu_5', 0, array('class' => 'form-control text-besar')) ?>
                                <span class="input-group-addon">(kg)</span>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">&nbsp;</div>
                        <div class="col-md-3 no-margin no-padding">&nbsp;</div>
                        <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                        <!--END BERAT KENDARAAN SUMBU-->

                        <!--PEMAKAIAN SUMBU BAN-->
                        <div class="col-md-3 no-margin no-padding">
                            <label for="pemakaian_sumbu_ban_1">Pemakaian Sumbu Ban</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-1</span>
                                <?php echo CHtml::textField('pemakaian_sumbu_ban_1', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="pemakaian_sumbu_ban_2">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-2</span>
                                <?php echo CHtml::textField('pemakaian_sumbu_ban_2', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="pemakaian_sumbu_ban_3">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-3</span>
                                <?php echo CHtml::textField('pemakaian_sumbu_ban_3', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-3 no-margin no-padding">
                            <label for="pemakaian_sumbu_ban_4">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-4</span>
                                <?php echo CHtml::textField('pemakaian_sumbu_ban_4', '', array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-12 no-margin no-padding">&nbsp;</div>
                        <!--END PEMAKAIAN SUMBU BAN-->

                        <!--DAYA DUKUNG SESUAI PABRIK-->
                        <div class="col-md-12 no-margin no-padding"><b>Daya dukung sesuai pabrik</b></div>
                        <div class="col-md-2 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-1</span>
                                <?php echo CHtml::textField('daya_dukung_pabrik_1', 0, array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-2 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-2</span>
                                <?php echo CHtml::textField('daya_dukung_pabrik_2', 0, array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-2 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-3</span>
                                <?php echo CHtml::textField('daya_dukung_pabrik_3', 0, array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-2 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-4</span>
                                <?php echo CHtml::textField('daya_dukung_pabrik_4', 0, array('class' => 'form-control text-besar')) ?>
                            </div>
                        </div>
                        <div class="col-md-2 no-margin no-padding">
                            <div class="input-group">
                                <span class="input-group-addon">Ke-5</span>
                                <?php echo CHtml::textField('daya_dukung_pabrik_5', 0, array('class' => 'form-control text-besar')) ?>
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
                                <label for="jbb">JBB</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('jbb', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                                <label for="jbkb">JBKB</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('jbkb', 0, array('class' => 'form-control text-besar')) ?>
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="1"><b>- Daya Angkut</b></label><br />
                                <label for="daya_angkut_orang">Orang</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('daya_angkut_orang', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                                <label for="daya_angkut_barang">Barang</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('daya_angkut_barang', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="1"><b>&nbsp;</b></label><br />
                                <label for="kelas_jalan">Kelas Jalan</label>
                                <select name="kelas_jalan" id="kelas_jalan" class="form-control wajib-isi">
                                    <?php
                                    $tbl_kelas_jalan = TblKelasJalan::model()->findAll();
                                    foreach ($tbl_kelas_jalan as $data_kelas_jalan) {
                                    ?>
                                        <option value="<?php echo $data_kelas_jalan->kelas_jalan; ?>"><?php echo $data_kelas_jalan->kelas_jalan; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="mst">MST</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('mst', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
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
                                    <?php echo CHtml::textField('q_r', 0, array('class' => 'form-control wajib-isi text-besar')) ?>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="p1">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">p1</span>
                                    <?php echo CHtml::textField('p1', 0, array('class' => 'form-control text-besar')) ?>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="p2">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">p2</span>
                                    <?php echo CHtml::textField('p2', 0, array('class' => 'form-control text-besar')) ?>
                                </div>
                            </div>
                            <!--END UKURAN-->
                        </div>
                    </div>
                </div>
            </div>
            <!--KEMAMPUAN KENDARAAN-->
            <div class="col-md-12 no-padding">
                <button type="button" disabled="true" class="btn btn-primary button_simpan pull-right" onclick="submitForm('<?php echo $this->createUrl('Editbuku/SaveForm'); ?>')">SIMPAN</button>
            </div>
        </section>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>