<div class="row">
    <section class="col-lg-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Total Lulus / Tidak Lulus</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('table/kelulusan', array('year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
    </section>
    <section class="col-lg-8">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kendaraan Lulus</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('grafik/kelulusan_bar_lls', array('year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Kendaraan Tidak Lulus</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('grafik/kelulusan_bar_tl', array('year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
    </section>
</div>