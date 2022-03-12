<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Cetak Report Rekomendasi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php echo CHtml::textField('search_bulan', date('M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 no-padding">
                        <button type="button" id="bulan" class="btn btn-success" onclick="cetak('<?php echo $this->createUrl('Rekomendasi/Rekap'); ?>',this.id,'bulan')">
                            <i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;Export Per Bulan
                        </button>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 20px; ">
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php echo CHtml::textField('search_tahun', date('Y'), array('class' => 'form-control', 'maxlength' => 4)); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 no-padding">
                        <button type="button" id="tahun" class="btn btn-success" onclick="cetak('<?php echo $this->createUrl('Rekomendasi/Rekap'); ?>',this.id,'tahun')">
                            <i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;Export Per Tahun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#search_bulan').datepicker({
            format: "M-yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true,
        });
    });

    function cetak(urlAct, id, pilihan) {
        var tgl = $('#search_' + id).val();
        window.location.href = urlAct + "?tgl=" + tgl + "&pilihan=" + pilihan;
        return false;
    }
</script>