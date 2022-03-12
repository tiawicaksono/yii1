<div class="col-md-12 no-margin no-padding">
    <div class="col-md-12">
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
                        <label for="1">Nomor Sertifikat Registrasi Uji Tipe Kendaraan</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_regis; ?>">
                        <div class="col-md-7 no-margin no-padding">
                            <label for="2">Diterbitkan Oleh</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->oleh_regis; ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="3">Tanggal Diterbitkan</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo date("d-M-Y", strtotime($data->tgl_regis)); ?>">
                        </div>
                        <label for="1">Nomor Sertifikat Uji Tipe Kendaraan</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_tipe; ?>">
                        <div class="col-md-7 no-margin no-padding">
                            <label for="2">Diterbitkan Oleh</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->oleh_tipe; ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="3">Tanggal Diterbitkan</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo date("d-M-Y", strtotime($data->tgl_tipe)); ?>">
                        </div>
                        <label for="1">Nomor Sertifikat Rancang Bangun</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_rancang; ?>">
                        <div class="col-md-7 no-margin no-padding">
                            <label for="2">Diterbitkan Oleh</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->oleh_rancang; ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="3">Tanggal Diterbitkan</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo date("d-M-Y", strtotime($data->tgl_rancang)); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        <label for="1">Nomor Uji</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_uji; ?>">
                        <label for="1">Nomor Kendaraan</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_kendaraan; ?>">
                        <div class="col-md-4 no-margin no-padding">
                            <label for="3">Identitas</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->identitas; ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-7 no-margin no-padding">
                            <label for="2">Nomor</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_identitas; ?>">
                        </div>
                        <label for="1">Nama Pemilik</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->nama_pemilik; ?>">
                        <label for="1">Alamat Pemilik</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->alamat; ?>">
                        <label for="1">Tempat Lahir</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->tmp_lahir; ?>">
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-7 no-margin no-padding">
                            <label for="2">Tanggal Lahir</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo date("d-M-Y", strtotime($data->tgl_lahir)); ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="3">Kelamin</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->kelamin; ?>">
                        </div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="2">RT</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->rt; ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-6 no-margin no-padding">
                            <label for="3">RW</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->rw; ?>">
                        </div>
                        <label for="3">Kelurahan</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->kelurahan; ?>">
                        <label for="3">Kecamatan</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->kecamatan; ?>">
                        <label for="3">Kota</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->kota; ?>">
                        <label for="3">Propinsi</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->propinsi; ?>">
                    </div>
                    <div class="col-md-4 no-padding">
                        <div class="col-md-7 no-margin no-padding">
                            <label for="2">Awal Pemakaian</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo date("d-M-Y", strtotime($data->awal_pakai)); ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-4 no-margin no-padding">
                            <label for="3">Tahun</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->tahun; ?>">
                        </div>
                        <label for="3">Nomor Mesin</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_mesin; ?>">
                        <label for="3">Nomor Chasis</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->no_chasis; ?>">
                        <div class="col-md-5 no-margin no-padding">
                            <label for="2">Jenis</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->jenis; ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-6 no-margin no-padding">
                            <label for="3">Status</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->umum; ?>">
                        </div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="2">Merk</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->merk; ?>">
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-6 no-margin no-padding">
                            <label for="3">Tipe</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->tipe; ?>">
                        </div>
                        <label for="3">Pengimport / Pabrik</label>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $data->pengimport; ?>">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-12">
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
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->isi_silinder; ?>">
                                <span class="input-group-addon">(cc)</span>    
                            </div>
                            <label for="daya_motor">Daya Motor</label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->daya_motor; ?>">
                                <span class="input-group-addon">PS/KW</span>    
                            </div>
                            <label for="bahan_bakar">Bahan Bakar</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->bahan_bakar; ?>">
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
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->ukuran_panjang; ?>">
                                <span class="input-group-addon">(mm)</span>    
                            </div>
                            <label for="lebar_utama">Lebar</label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->ukuran_lebar; ?>">
                                <span class="input-group-addon">(mm)</span>    
                            </div>
                            <label for="tinggi_utama">Tinggi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->ukuran_tinggi; ?>">
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
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->dimpanjang; ?>">
                                <span class="input-group-addon">(mm)</span>    
                            </div>
                            <label for="lebar_muatan">Lebar</label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->dimlebar; ?>">
                                <span class="input-group-addon">(mm)</span>    
                            </div>
                            <label for="tinggi_muatan">Tinggi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->dimtinggi; ?>">
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
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->nm_komersil; ?>">
                            <div class="col-md-6 no-margin no-padding">
                                <label for="warna_cabin">Warna Cabin</label>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->warna; ?>">
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="warna_bak">Warna Bak</label>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->warna_bak; ?>">
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
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->bagian_belakang; ?>">
                                <span class="input-group-addon">(mm)</span>
                            </div>
                            <label for="kedepan">Ke Depan (FOH)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->bagian_depan; ?>">
                                <span class="input-group-addon">(mm)</span>
                            </div>
                            <label for="jarak_terendah">Jarak Terendah</label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->bagian_jterendah; ?>">
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
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->karoseri_jenis; ?>">
                            <label for="karoseri_bahan">Bahan Utama</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->karoseri_bahan; ?>">
                            <div class="col-md-6 no-margin no-padding">
                                <label for="tempat_duduk">T.Duduk</label>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->karoseri_duduk; ?>">
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-5 no-margin no-padding">
                                <label for="berdiri">Berdiri</label>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->karoseri_berdiri; ?>">
                            </div>
                            <label for="peng_khusus">Peng. Khusus</label>
                            <input type="text" class="form-control" readonly="true" value="<?php echo $data->guna_khusus; ?>">
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
                            <input type="text" class="form-control" readonly="true" value="1.1">
                        </div>
                        <div class="col-md-9 no-margin no-padding">&nbsp;</div>
                        <!--JARAK SUMBU-->
                        <div class="col-md-6 no-margin no-padding">
                            <label for="jarak_sumbu_1">Jarak Sumbu</label>
                            <div class="input-group">
                                <span class="input-group-addon">1. I-II</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->jsumbu1; ?>">
                                <span class="input-group-addon">(mm)</span>
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="jarak_sumbu_2">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">2. II-III</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->jsumbu2; ?>">
                                <span class="input-group-addon">(mm)</span>
                            </div>
                        </div>
                        <!--END JARAK SUMBU-->

                        <!--BERAT KENDARAAN SUMBU-->
                        <div class="col-md-6 no-margin no-padding">
                            <label for="berat_kendaraan_sumbu_1">Berat Kendaraan Sumbu</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-1</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->bsumbu1; ?>">
                                <span class="input-group-addon">(kg)</span>
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="berat_kendaraan_sumbu_2">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-2</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->bsumbu2; ?>">
                                <span class="input-group-addon">(kg)</span>
                            </div>
                        </div>
                        <!--END BERAT KENDARAAN SUMBU-->

                        <!--PEMAKAIAN SUMBU BAN-->
                        <div class="col-md-6 no-margin no-padding">
                            <label for="pemakaian_sumbu_ban_1">Pemakaian Sumbu Ban</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-1</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->psumbu1; ?>">
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="pemakaian_sumbu_ban_2">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-2</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->psumbu2; ?>">
                            </div>
                        </div>
                        <!--END PEMAKAIAN SUMBU BAN-->

                        <!--DAYA DUKUNG SESUAI PABRIK-->
                        <div class="col-md-6 no-margin no-padding">
                            <label for="daya_dukung_pabrik_1">Daya dukung sesuai pabrik</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-1</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->dydukpab1; ?>">
                            </div>
                        </div>
                        <div class="col-md-1 no-margin no-padding"></div>
                        <div class="col-md-5 no-margin no-padding">
                            <label for="daya_dukung_pabrik_2">&nbsp;</label>
                            <div class="input-group">
                                <span class="input-group-addon">Ke-2</span>
                                <input type="text" class="form-control" readonly="true" value="<?php echo $data->dydukpab2; ?>">
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
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $data->kemjbb; ?>">
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                                <label for="jbkb">JBKB</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $data->kemjbkb; ?>">
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="1"><b>- Daya Angkut</b></label><br />
                                <label for="daya_angkut_orang">Orang</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $data->kemorang; ?>">
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                                <label for="daya_angkut_barang">Barang</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $data->kembarang; ?>">
                                    <span class="input-group-addon">(Kg)</span>
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="1"><b>&nbsp;</b></label><br />
                                <label for="kelas_jalan">Kelas Jalan</label>
                                <input type="text" class="form-control" readonly="true" value="III">
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
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $data->ukq; ?>">
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="p1">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">p1</span>
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $data->ukp; ?>">
                                </div>
                            </div>
                            <div class="col-md-1 no-margin no-padding"></div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="p2">&nbsp;</label>
                                <div class="input-group">
                                    <span class="input-group-addon">p2</span>
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $data->ukp2; ?>">
                                </div>
                            </div>
                            <!--END UKURAN-->
                        </div>
                    </div>
                </div>
            </div><!--KEMAMPUAN KENDARAAN-->
        </section>
    </div>    
</div>