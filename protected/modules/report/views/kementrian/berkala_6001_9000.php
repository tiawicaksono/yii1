<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Uji Berkala Berdasarkan U/BU dan JBB</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                        <?php echo CHtml::textField('tgl_search', date('M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="col-lg-3 no-padding">
                    <button type="button" id="btn-cetak" class="btn btn-success" onclick="cetak('<?php echo $this->createUrl('Kementrian/ReportBerkala60019000'); ?>')">
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tgl_search').datepicker({
            format: "M-yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true,
        });
    });
    function cetak(urlAct) {
        var tgl = $('#tgl_search').val();
        window.location.href = urlAct + "?tgl=" + tgl;
        return false;
    }
</script>