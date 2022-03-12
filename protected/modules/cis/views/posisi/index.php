<?php
$path = $this->module->assetsUrl;
$baseJs = Yii::app()->appComponent->urlJs();
$baseCss = Yii::app()->appComponent->urlCss();
$cs = Yii::app()->clientScript;
$cs->registerCssFile($baseCss . '/bootstrap-select.css');
$cs->registerScriptFile($path . '/js/posisi.js', CClientScript::POS_END);
$cs->registerScriptFile($baseJs . '/bootstrap-select.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row{
        min-height: 40px !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Posisi Kendaraan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-2 col-md-4 no-padding">
                        <input type="text" id="text_category" class="warna_form_control text-besar form-control" placeholder="NO UJI/NO KENDARAAN">
                    </div>
                    <div class="col-lg-1 col-md-1">
                        <button type="button" class="btn btn-info" onclick="prosesSearch()">
                            <span class="glyphicon glyphicon-refresh"></span> Refresh
                        </button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <table id="pemeriksaanTglListGrid"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#pemeriksaanTglListGrid').datagrid({
        url: '<?php echo $this->createUrl('Posisi/PosisiListGrid'); ?>',
        pagination: true,
        singleSelect: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 10,
        pageList: [10, 30, 50],
        columns: [[
                {field: 'numerator', width: 100, title: 'Numerator', sortable: true},
                {field: 'no_kendaraan', width: 105, title: 'No Kendaraan', sortable: false},
                {field: 'no_uji', title: 'No Uji', width: 100, sortable: false},
                {field: 'nama_pemilik', title: 'Nama Pemilik', width: 200, sortable: false},
                {field: 'prauji', width: 80, title: 'Pra Uji', sortable: false, halign: 'center', align: 'center'},
                {field: 'emisi', width: 80, title: 'Emisi', sortable: false, halign: 'center', align: 'center'},
                {field: 'pitlift', width: 80, title: 'Pit Lift', sortable: false, halign: 'center', align: 'center'},
                {field: 'lampu', width: 80, title: 'Lampu', sortable: false, halign: 'center', align: 'center'},
                {field: 'rem', width: 80, title: 'Rem', sortable: false, halign: 'center', align: 'center'},
                {field: 'catatan', width: 600, title: 'Catatan TL', sortable: false}
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.textCategory = $('#text_category').val();
//            params.selectCategory = $('#select_category :selected').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
</script>