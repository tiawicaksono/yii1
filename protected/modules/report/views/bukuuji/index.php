<?php
$baseUrl = Yii::app()->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($path . '/css/daterangepicker.css');
$cs->registerScriptFile($path . '/js/moment.js', CClientScript::POS_BEGIN);
$cs->registerScriptFile($path . '/js/daterangepicker.js', CClientScript::POS_BEGIN);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Rekaitulasi Pemakaian Kartu Uji</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                        <input id="tgl_search" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-lg-3 no-padding">
                    <button type="button" id="btn-cetak" class="btn btn-success" onclick="cetak('<?php echo $this->createUrl('Bukuuji/Rekap'); ?>')">
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tgl_search').daterangepicker({
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
        var tgl = $('#tgl_search').val();
        window.location.href = urlAct + "?tgl=" + tgl;
        return false;
    }
</script>