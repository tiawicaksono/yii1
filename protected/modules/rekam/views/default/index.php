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
                            <li><a href="#tab_3" data-toggle="tab"><b>Obat</b></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <table width="100%">
                                    <?php
                                    foreach ($listRekam as $key => $value) {
                                        $pilihan = "checkbox";
                                        if ($value->check_or_text == 2) $pilihan = "text";
                                    ?>
                                        <tr class="rowCheckOrText">
                                            <td width="20%"><?php echo ++$key . ". " . strtoupper($value->name); ?></td>
                                            <td colspan="4" width="80%">
                                                <label>
                                                    <input id="<?php echo strtoupper($value->kode); ?>" type="<?php echo $pilihan; ?>" class="flat-red <?php echo "class_" . $pilihan ?>">
                                                    <?php if ($value->check_or_text != 2) echo "iya"; ?>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
                                <table width="100%" id="obat-obat">
                                    <?php
                                    foreach ($dataObat as $key => $value) {
                                        $key++;
                                    ?>
                                        <tr class="rowObat">
                                            <td><?php echo $key . ". " . $value->nama_obat; ?></td>
                                            <td>
                                                <label>
                                                    <input type="text" class="alwaysInteger valueObat" id="<?php echo $value->id; ?>" value="" />
                                                </label>
                                            </td>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

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
                    width: 200,
                    title: 'NAMA PASIEN',
                    sortable: false
                },
                {
                    field: 'alamat_pasien',
                    title: 'ALAMAT PASIEN',
                    width: 300,
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