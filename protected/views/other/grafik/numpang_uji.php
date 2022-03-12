<div class="row">
    <section class="col-lg-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Total Numpang Uji</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('table/numpang_uji', array('year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
    </section>
    <section class="col-lg-8">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Numpang Uji Masuk</h3>
                <div class="box-tools pull-right">
                    <!--<span class="label label-danger">8 New Members</span>-->
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('grafik/uji_bar', array('idContainer' => 'containerNumpangMasuk', 'idUji' => 2, 'year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Numpang Uji Keluar</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $this->renderPartial('grafik/uji_bar', array('idContainer' => 'containerNumpangKeluar', 'idUji' => 3, 'year' => $year)); ?>
            </div><!-- /.box-body -->
        </div>
    </section>
</div><!-- /.row (main row) -->