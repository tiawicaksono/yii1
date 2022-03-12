<?php
$baseUrl = Yii::app()->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($path . '/css/report.css');
$cs->registerScriptFile($path . '/js/report.js', CClientScript::POS_END);
$cs->registerCssFile($path . '/css/daterangepicker.css');
$cs->registerScriptFile($path . '/js/moment.js', CClientScript::POS_BEGIN);
$cs->registerScriptFile($path . '/js/daterangepicker.js', CClientScript::POS_BEGIN);
?>
<div class="row">
    <section class="col-lg-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Kendaraan Uji Pertama</h3>
                <div class="box-tools pull-right">
                    <!--<span class="label label-danger">8 New Members</span>-->
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <!--                            <div class="input-group">
                                                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php // echo CHtml::textField('tgl_report_uji_pertama', $tgl, array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                        </div>-->
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                <input id="tgl_report_uji_pertama" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 no-padding">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" id="btn-batal" class="btn btn-info" onclick="showTableUjiPertama()">
                                    <span class="fa fa-refresh"></span> Refresh
                                </button>
                                <button type="button" id="btn-cetak" class="btn btn-success" onclick="cetak('<?php echo $this->createUrl('Pengujian/ExportExcelUjiPertama'); ?>')">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <table id="reportListGrid"></table>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!--/.box -->
    </section>
</div>
<script>
    $('#reportListGrid').datagrid({
        url: '<?php echo $this->createUrl('Pengujian/UjiPertamaListGrid'); ?>',
        pagination: true,
        singleSelect: false,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 20,
        pageList: [20, 30, 50],
//        frozenColumns: [[
//                {field: 'no_antrian', title: 'No Antrian', width: 65, sortable: false},
//                {field: 'no_kendaraan', width: 85, title: 'No Kendaraan', sortable: false},
//            ]],
        columns: [[
                {field: 'no_kendaraan', title: 'No Kendaraan', width: 100, sortable: false},
                {field: 'no_uji', width: 150, title: 'No Uji', sortable: false},
                {field: 'merk_tahun', width: 150, title: 'Merk / Tahun', sortable: false},
                {field: 'jenis', width: 150, title: 'Jenis', sortable: false},
                {field: 'umum', width: 80, title: 'Umum', align: 'center', sortable: false},
                {field: 'b_umum', width: 80, title: 'B.Umum', align: 'center', sortable: false},
            ]],
        //        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.tanggal = $('#tgl_report_uji_pertama').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    $(document).ready(function () {
        $('#tgl_report_uji_pertama').daterangepicker({
            "locale": {
                "format": "DD/MM/YYYY",
                "daysOfWeekDisabled": [0, 7],
            },
            startDate: new Date(),
            endDate: new Date(),
        }, function (start, end, label) {
//            console.log("New date range selected: ' + start.format('dd-M-yyyy') + ' to ' + end.format('dd-M-yyyy') + ' (predefined range: ' + label + ')");
        });
    });
    function cetak(urlAct) {
        var tgl = $('#tgl_report_uji_pertama').val();
        window.location.href = urlAct + "?tgl=" + tgl;
        return false;
    }
</script>