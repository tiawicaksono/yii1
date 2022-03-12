<?php
$baseUrl = Yii::app()->request->baseUrl;
$baseJs = Yii::app()->appComponent->urlJs();
$baseCss = Yii::app()->appComponent->urlCss();
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($assetsUrl . '/css/check_radio.css');
$cs->registerScriptFile($assetsUrl . '/js/rekam.js', CClientScript::POS_END);
// $cs->registerCssFile($baseCss . '/jquery.fileuploader.css');
// $cs->registerScriptFile($baseJs . '/jquery.fileuploader.js', CClientScript::POS_END);
// $cs->registerScriptFile($baseJs . '/jquery.fileuploader.min.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row {
        height: 40px !important;
    }

    .datagrid-cell-c1-no_kendaraan {
        font-weight: bold !important;
        font-size: 12pt !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">DAFTAR PASIEN</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="col-lg-2 col-md-3">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php echo CHtml::textField('tgl_search', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <select class="btn" id="select_category">
                                    <option value="nik_pasien" selected="selected">NIK</option>
                                    <option value="nama_pasien">NAMA</option>
                                </select>
                            </span>
                            <?php echo CHtml::textField('text_category', '', array('class' => 'form-control text-besar')); ?>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1">
                        <button type="button" class="btn btn-info" onclick="prosesSearch()">
                            <span class="glyphicon glyphicon-refresh"></span> Refresh
                        </button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="validasiListGrid" style="max-height:300px"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">REKAM MEDIS</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <!-- <div class="col-lg-12 col-md-12">
                        <div class="col-lg-6 col-md-6">
                            <form id="formUpload" class="form-horizontal" name="formUpload" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_hasil_uji_prauji" id="id_hasil_uji_prauji" readonly="readonly" />
                                <span id="replace_file"><input type="file" name="files" id="file"></span>
                            </form>
                        </div>
                    </div> -->
                    <div class="col-lg-8 col-md-8">
                        <div class="col-lg-3 col-md-3">
                            <input type="hidden" id="id_rekam_medis" class="form-control" readonly="readonly" />
                            <input type="hidden" id="id_dokter" class="form-control" readonly="readonly" value="<?php echo Yii::app()->session['id_pegawai']; ?>" />
                            <input type="text" id="nik_pasien" class="form-control" placeholder="NIK PASIEN" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input type="text" id="nama_pasien" class="form-control" placeholder="NAMA PASIEN" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <button type="button" class="btn btn-primary" onclick="clickSubmit('<?php echo $this->createUrl('Proses'); ?>')">PROSES</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab"><b>Kondisi Tubuh</b></a></li>
                            <li><a href="#tab_2" data-toggle="tab"><b>Organ Paru-Paru</b></a></li>
                            <li><a href="#tab_3" data-toggle="tab"><b>Organ Jantung</b></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <table width="100%">
                                    <tr>
                                        <td width="20%">1. Batuk</td>
                                        <td colspan="4" width="80%">
                                            <label>
                                                <input id="A1" type="checkbox" class="flat-red"> Iya
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. Pilek</td>
                                        <td colspan="4">
                                            <label>
                                                <input id="A2" type="checkbox" class="flat-red"> Iya
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3. Tekanan Darah Tinggi</td>
                                        <td colspan="4"><input type="text" id="A3" /></td>
                                    </tr>
                                    <tr>
                                        <td>4. Tekanan Gula Darah</td>
                                        <td colspan="4"><input type="text" id="A4" /></td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <table width="100%">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="2" align="center" bgcolor="#CCFFFF"><b>DEKAT</b></td>
                                        <td colspan="2" align="center" bgcolor="#66FFFF"><b>JAUH</b></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">1. Lampu utama tidak menyala</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b1b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b1a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b1d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b1c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="2" align="center" bgcolor="#CCFFFF"><b>DEPAN</b></td>
                                        <td colspan="2" align="center" bgcolor="#66FFFF"><b>BELAKANG</b></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">2. Lampu posisi tidak menyala</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b2b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b2a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b2d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b2c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">3. Lampu penunjuk arah tidak menyala</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b3b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b3a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b3d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b3c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4. Lampu rem tidak menyala</td>
                                        <td colspan="2" bgcolor="#CCFFFF">&nbsp;</td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b4b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b4a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5. Lampu mundur tidak menyala</td>
                                        <td colspan="2" bgcolor="#CCFFFF"></td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b5b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b5a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6. Lampu tambahan lainnya</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="b6b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="b6a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b6d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b6c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7. Lampu Nomor Kendaraan </td>
                                        <td>
                                            <label>
                                                <input id="b7" type="checkbox" class="flat-red"> Tidak Menyala
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>8. Posisi / dudukan lampu utama tidak sesuai</td>
                                        <td>
                                            <label>
                                                <input id="b8a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="b8b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>9. Alat Pemantul Cahaya (Reflektor) Tidak Ada</td>
                                        <td>
                                            <label>
                                                <input id="b9a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="b9b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>10. Alat Pemantul Cahaya (Reflektor) Rusak</td>
                                        <td>
                                            <label>
                                                <input id="b10a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="b10b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <table width="100%">
                                    <tr>
                                        <td>1. Bumper</td>
                                        <td>
                                            <label>
                                                <input id="c1a" type="checkbox" class="flat-red"> &gt; 50 cm
                                            </label>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="c1ain" size="8" maxlength="8" />
                                                <div class="input-group-addon">cm</div>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <label>
                                                <input id="c1b" type="checkbox" class="flat-red"> Konstruksi membahayakan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. Kondisi bak/cabin</td>
                                        <td>
                                            <label>
                                                <input id="c2" type="checkbox" class="flat-red"> keropos
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>3. Jumlah tempat duduk tidak sesuai dengan STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="c3" type="checkbox" class="flat-red"> Ya
                                            </label>
                                        </td>
                                        <td colspan="2"><input class="form-control" type="text" id="c3in" size="8" maxlength="8" /></td>
                                    </tr>
                                    <tr>
                                        <td>4. Kondisi bak muatan/cabin</td>
                                        <td>
                                            <label>
                                                <input id="c4" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>5. Pintu - pintu</td>
                                        <td>
                                            <label>
                                                <input id="c5" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>6. Tutup bak</td>
                                        <td>
                                            <label>
                                                <input id="c6" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>7. Kondisi kaca retak</td>
                                        <td>
                                            <label>
                                                <input id="c7a" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c7b" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>8. Kaca samping retak</td>
                                        <td>
                                            <label>
                                                <input id="c8a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c8b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>9. Tutup tangki bahan bakar</td>
                                        <td>
                                            <label>
                                                <input id="c9" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>10. Jenis rumah atau bak</td>
                                        <td>
                                            <label>
                                                <input id="c10" type="checkbox" class="flat-red"> Tidak Sesuai STUK/SRUT
                                            </label>
                                        </td>
                                        <td colspan="3">
                                            <select size="1" class="form-control" id="jnsbody">
                                                <option value="">Pilih Item</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11. Perisai kolong</td>
                                        <td colspan="2" align="center" bgcolor="#CCFFFF"><b>RUSAK</b></td>
                                        <td colspan="2" align="center" bgcolor="#66FFFF"><b>TIDAK ADA</b></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="c11b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="c11a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="c11d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="c11c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12. Cabin/bak diubah</td>
                                        <td colspan="2">
                                            <label>
                                                <input id="c12" type="checkbox" class="flat-red"> Tidak sesuai type kendaraan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>13. Bahan Bak</td>
                                        <td>
                                            <label>
                                                <input id="c13" type="checkbox" class="flat-red"> Tidak Sesuai STUK/SRUT
                                            </label>
                                        </td>
                                        <td colspan="3">
                                            <select size="1" class="form-control ui-state-default" id="jnsbahan">
                                                <option value="">Pilih Item</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14. Hidrolis dump</td>
                                        <td>
                                            <label>
                                                <input id="c14" type="checkbox" class="flat-red"> Tidak Berfungsi
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>15. Kaca pintu</td>
                                        <td>
                                            <label>
                                                <input id="c15a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c15b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>16. Pemasangan kaca film</td>
                                        <td colspan="4">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>- Pemasangan kaca film lebih dari 1/3 luas</td>
                                        <td>
                                            <label>
                                                <input id="c16a1" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id=c16a2" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16a3" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16a4" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Ketebalan lebih dari 40%</td>
                                        <td>
                                            <label>
                                                <input id="c16b1" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16b2" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16b3" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16b4" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Ketebalan lebih dari 30% untuk pemasangan penuh</td>
                                        <td>
                                            <label>
                                                <input id="c16c1" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16c2" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16c3" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16c4" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>17. Kondisi body</td>
                                        <td>
                                            <label>
                                                <input id="c17" type="checkbox" class="flat-red"> Keropos
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>18. Pintu - pintu</td>
                                        <td>
                                            <label>
                                                <input id="c18" type="checkbox" class="flat-red"> Keropos
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>19. Kondisi Kursi</td>
                                        <td>
                                            <label>
                                                <input id="c19" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#validasiListGrid').datagrid({
        url: '<?php echo $this->createUrl('Default/ListPendaftaran'); ?>',
        width: '100%',
        //        view: scrollview,
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
        pageSize: 200,
        pageList: [50, 100, 200],
        columns: [
            [{
                    field: 'id_rekam_medis',
                    hidden: true
                },
                {
                    field: 'nik_pasien',
                    width: 120,
                    title: 'NIK PASIEN',
                    sortable: false
                },
                {
                    field: 'nama_pasien',
                    width: 120,
                    title: 'NAMA PASIEN',
                    sortable: false
                },
                {
                    field: 'alamat_pasien',
                    title: 'ALAMAT PASIEN',
                    width: 200,
                    sortable: false
                }
            ]
        ],
        onBeforeLoad: function(params) {
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
            params.selectDate = $('#tgl_search').val();
        },
        onClickRow: function() {
            getInformationPasien();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });
</script>