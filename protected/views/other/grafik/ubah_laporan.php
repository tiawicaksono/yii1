<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Sifat</h3>
                <div class="box-tools pull-right">
                    <!--<span class="label label-danger">8 New Members</span>-->
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('grafik/uji_bar', array('idContainer' => 'containerUbahSifat','idUji' => 6,'year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
    </div>
</div><!-- /.row (main row) -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Rusak</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('grafik/uji_bar', array('idContainer' => 'containerLaporanRusak','idUji' => 9,'year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
    </div>
</div><!-- /.row (main row) -->