<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($assetsUrl . '/css/check_radio.css');
$cs->registerScriptFile($assetsUrl . '/js/lampu.js', CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl . '/js/jquery.numeric.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row{
        height: 40px !important;
    }
    .datagrid-cell-c6-no_kendaraan {
        font-weight: bold !important;
        font-size: 12pt !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">LAMPU - KENDARAAN LIST</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="lampuListGrid"></table>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <center>
                        <button type="button" class="btn btn-info" onclick="prosesSearchLampu()">
                            <span class="glyphicon glyphicon-refresh"></span> REFRESH
                        </button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">LAMPU</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-2 col-md-2">
                            <input type="hidden" id="no_antrian_lampu" class="form-control" placeholder="NO ANTRIAN" readonly="readonly" style="font-weight: bold;"/>
                            <input type="hidden" id="username_lampu" readonly="readonly" value="<?php echo Yii::app()->session['username']; ?>"/>
                            <input type="hidden" id="id_hasil_uji_lampu" readonly="readonly"/>
                            <input type="hidden" id="tahun_lampu" readonly="readonly"/>
                            <input type="hidden" id="posisi_cis_lampu" readonly="readonly" value="<?php echo Yii::app()->session['posisi_cis']; ?>"/>
                            <input type="text" id="no_kendaraan_lampu" class="form-control" placeholder="NO KEND" readonly="readonly" />
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input type="text" id="no_uji_lampu" class="form-control" placeholder="NO UJI" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" onclick="reloadDataLampu('<?php echo $this->createUrl('Lampu/ReloadData'); ?>')">RELOAD</button>
                                <button type="button" class="btn btn-primary" onclick="prosesLampu('<?php echo $this->createUrl('Lampu/Proses'); ?>')">PROSES</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <table width="100%">
                        <tr>
                            <td width="10%">&nbsp;</td>
                            <td colspan="2"><b>KUAT PANCAR</b></td>
                            <td colspan="2"><b>DEVIASI</b></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>KANAN</b></td>
                            <td width="20%">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="ktkanan" size="8" maxlength="8"/>
                                    <div class="input-group-addon">cd</div>
                                </div>
                            </td>
                            <td width="20%">&nbsp;&nbsp;&nbsp;Min = 12.000 cd</td>
                            <td width="20%">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="devkanan" size="8" maxlength="8"/>
                                    <div class="input-group-addon">degree</div>
                                </div>
                            </td>
                            <td width="20%">&nbsp;&nbsp;&nbsp;Max = 0.34 degree</td>
                            <td width="30%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>KIRI</b></td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="ktkiri" size="8" maxlength="8"/>
                                    <div class="input-group-addon">cd</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Min = 12.000 cd</td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="devkiri" size="8" maxlength="8"/>
                                    <div class="input-group-addon">degree</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Max = 1.09 degree</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#lampuListGrid').datagrid({
        url: '',
        pagination: true,
        singleSelect: true,
        selectOnCheck: true,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: true,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 10, 20],
        columns: [[
                {field: 'id_hasil_uji', title: '', hidden: true},
//                {field: 'numerator', width: 100, title: 'Numerator', sortable: true},
//                {field: 'numerator_hari', width: 100, title: 'Numerator', sortable: true},
                {field: 'nm_uji', title: 'Jenis Uji', width: 120, sortable: false, align: 'center'},
//                {field: 'no_antrian', width: 100, title: 'No Antrian', sortable: false},
                {field: 'no_kendaraan', width: 100, title: 'No Kendaraan', sortable: false},
                {field: 'no_uji', title: 'No Uji', width: 120, sortable: false},
                {field: 'merk', title: 'Merk', width: 95, sortable: false},
                {field: 'tipe', title: 'Tipe', width: 80, sortable: false},
                {field: 'nm_komersil', title: 'Komersil', width: 130, sortable: false},
                {field: 'karoseri_jenis', title: 'Jenis', width: 120, sortable: false},
                {field: 'tahun', title: 'Tahun', width: 70, sortable: false, align: 'center'},
                {field: 'bahan_bakar', title: 'Bahan Bakar', width: 90, sortable: false},
            ]],
        //        toolbar: "#search",
//        onBeforeLoad: function (params) {
//        },
        onClickRow: function () {
            getInformationLampu();
        },
//        onLoadError: function () {
//            return false;
//        },
//        onLoadSuccess: function () {
//        }
    });
</script>