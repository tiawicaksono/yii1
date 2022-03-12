<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($assetsUrl . '/css/check_radio.css');
$cs->registerScriptFile($assetsUrl . '/js/emisi.js', CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl . '/js/jquery.numeric.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row{
        height: 40px !important;
    }
    .datagrid-cell-c3-no_kendaraan {
        font-weight: bold !important;
        font-size: 12pt !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">EMISI - KENDARAAN LIST</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="emisiListGrid"></table>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <center>
                        <button type="button" class="btn btn-info" onclick="prosesSearchEmisi()">
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
                <h3 class="box-title">EMISI</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-lg-12 col-md-12">
<!--                        <div class="col-lg-2 col-md-2">
                        </div>-->
                        <div class="col-lg-2 col-md-2">
                            <input type="hidden" id="no_antrian_emisi" class="form-control" placeholder="NO ANTRIAN" readonly="readonly" style="font-weight: bold;"/>
                            <input type="hidden" id="username_emisi" readonly="readonly" value="<?php echo Yii::app()->session['username']; ?>"/>
                            <input type="hidden" id="id_hasil_uji_emisi" readonly="readonly"/>
                            <input type="hidden" id="tahun_emisi" readonly="readonly"/>
                            <input type="hidden" id="bahan_bakar_emisi" readonly="readonly"/>
                            <input type="hidden" id="posisi_cis_emisi" readonly="readonly" value="<?php echo Yii::app()->session['posisi_cis']; ?>"/>
                            <input type="text" id="no_kendaraan_emisi" class="form-control" placeholder="NO KEND" readonly="readonly" />
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input type="text" id="no_uji_emisi" class="form-control" placeholder="NO UJI" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" onclick="reloadDataEmisi('<?php echo $this->createUrl('Emisi/ReloadData'); ?>')">RELOAD</button>
                                <button type="button" class="btn btn-primary" onclick="prosesEmisi('<?php echo $this->createUrl('Emisi/Proses'); ?>')">PROSES</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <table width="100%">
                        <tr>
                            <td width="107"><b>DIESEL</b></td>
                            <td width="36">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="emdiesel" size="6" maxlength="6"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td width="426" align="left">&nbsp;&nbsp;&nbsp;Tahun &gt;= 2010 (max = 40%), Tahun &lt; 2010 (max = 70%)</td>
                        </tr>
                        <tr>
                            <td width="107"><b>MESIN CO</b></td>
                            <td width="36">
                                <div class="input-group">
                                    <input class="form-control" type="text"id="emco" size="6" maxlength="6"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <td width="426" align="left">&nbsp;&nbsp;&nbsp;Tahun >= 2007 (max = 1.5%), Tahun < 2007 (max = 4.5%)</td>
                        </tr>
                        <tr>
                            <td width="107"><b>MESIN HC</b></td>
                            <td width="36">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="emhc" size="6" maxlength="6"/>
                                    <div class="input-group-addon">ppm</div>
                                </div>
                            </td>
                            <td width="426" align="left">&nbsp;&nbsp;&nbsp;Tahun &gt;= 2007 (max = 200 ppm), Tahun &lt; 2007 (max = 1200 ppm)</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#emisiListGrid').datagrid({
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
//                {field: 'numerator_hari', width: 100, title: 'Numerator'},
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
            getInformationEmisi();
        },
//        onLoadError: function () {
//            return false;
//        },
//        onLoadSuccess: function () {
//        }
    });
</script>