<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($assetsUrl . '/css/check_radio.css');
$cs->registerScriptFile($assetsUrl . '/js/rem.js', CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl . '/js/jquery.numeric.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row{
        height: 40px !important;
    }
    .datagrid-cell-c9-no_kendaraan {
        font-weight: bold !important;
        font-size: 12pt !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">REM - KENDARAAN LIST</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="remListGrid"></table>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <center>
                        <button type="button" class="btn btn-info" onclick="prosesSearchRem()">
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
                <h3 class="box-title">REM</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                        <div class="col-lg-2 col-md-2">
                            <input type="hidden" id="no_antrian_rem" class="form-control" placeholder="NO ANTRIAN" readonly="readonly" style="font-weight: bold;"/>
                            <input type="hidden" value="biasa" readonly="readonly" id="text_category_rem" />
                            <input type="hidden" id="username_rem" readonly="readonly" value="<?php echo Yii::app()->session['username']; ?>"/>
                            <input type="hidden" id="id_hasil_uji_rem" readonly="readonly"/>
                            <input type="hidden" id="tahun_rem" readonly="readonly"/>
                            <input type="hidden" id="posisi_cis_rem" readonly="readonly" value="<?php echo Yii::app()->session['posisi_cis']; ?>"/>
                            <input type="text" id="no_kendaraan_rem" class="form-control" placeholder="NO KEND" readonly="readonly" />
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input type="text" id="no_uji_rem" class="form-control" placeholder="NO UJI" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" onclick="reloadDataRem('<?php echo $this->createUrl('Rem/ReloadData'); ?>')">RELOAD</button>
                                <button type="button" class="btn btn-primary" onclick="prosesRem('<?php echo $this->createUrl('Rem/Proses'); ?>')">PROSES</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <table width="100%">
                        <tr>
                            <td width="10%">&nbsp;</td>
                            <td colspan="2"><b>GAYA REM</b></td>
                            <td colspan="2"><b>SELISIH REM</b></td>
                        </tr>
                        <tr>
                            <td width="30%"><b>SUMBU I</b></td>
                            <td width="20%">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsb1" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td width="10%">&nbsp;&nbsp;&nbsp;Min = 50 %</td>
                            <td width="20%">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsel1" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td width="10%">&nbsp;&nbsp;&nbsp;Max = 8 %</td>
                            <td width="30%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>SUMBU II</b></td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsb2" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Min = 50 %</td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsel2" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Max = 8 %</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>SUMBU III</b></td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsb3" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Min = 50 %</td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsel3" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Max = 8 %</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>SUMBU IV</b></td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsb4" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Min = 50 %</td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="bsel4" size="8" maxlength="8"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;Max = 8 %</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="5">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Berat sumbu I</td>
                            <td>
                                <label>
                                    <input id="um21" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                </label>
                            </td>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Berat sumbu II</td>
                            <td>
                                <label>
                                    <input id="um22" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                </label>
                            </td>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Berat sumbu III</td>
                            <td>
                                <label>
                                    <input id="um23" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                </label>
                            </td>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Berat sumbu IV</td>
                            <td>
                                <label>
                                    <input id="um24" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                </label>
                            </td>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Efisiensi rem parkir kurang dari 17 %</td>
                            <td>
                                <label>
                                    <input id="um33" type="checkbox" class="flat-red"> Ya
                                </label>
                            </td>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#remListGrid').datagrid({
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
                {field: 'id_jns_kend', title: '', hidden: true},
//                {field: 'numerator', width: 100, title: 'Numerator', sortable: true},
//                {field: 'numerator_hari', width: 100, title: 'Numerator', sortable: true},
                {field: 'nm_uji', title: 'Jenis Uji', width: 120, sortable: false, align: 'center'},
//                {field: 'no_antrian', width: 100, title: 'No Antrian', sortable: false},
                {field: 'no_kendaraan', width: 100, title: 'No Kendaraan', sortable: false},
                {field: 'no_uji', title: 'No Uji', width: 120, sortable: false},
                {field: 'merk', title: 'Merk', width: 95, sortable: false},
                {field: 'tipe', title: 'Tipe', width: 80, sortable: false},
                {field: 'nm_komersil', title: 'Komersil', width: 130, sortable: false},
                {field: 'tahun', title: 'Tahun', width: 70, sortable: false, align: 'center'},
                {field: 'konsumbu', title: 'CNF.S', width: 70, sortable: false, align: 'center'},
                {field: 'bsumbu1', title: 'S I', width: 70, sortable: false, align: 'center'},
                {field: 'bsumbu2', title: 'S II', width: 70, sortable: false, align: 'center'},
                {field: 'bsumbu3', title: 'S III', width: 70, sortable: false, align: 'center'},
                {field: 'bsumbu4', title: 'S IV', width: 70, sortable: false, align: 'center'},
            ]],
        //        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.textCategory = $('#text_category_rem').val();
        },
        onClickRow: function () {
            getInformationRem();
        },
//        onLoadError: function () {
//            return false;
//        },
//        onLoadSuccess: function () {
//        }
    });
</script>