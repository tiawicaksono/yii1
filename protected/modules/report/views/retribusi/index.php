<?php
$baseUrl = Yii::app()->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
//$cs->registerCssFile($path . '/css/report.css');
$cs->registerScriptFile($path . '/js/report.js', CClientScript::POS_END);
?>
<div class="row">
    <section class="col-lg-6 connectedSortable ui-sortable">
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 id="divTotalRetribusiTgl"><?php echo $totalRetribusi ?></h3>
                        <p>Retribusi/<span class="tanggal_pilihan"><?php echo date('d M Y'); ?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3 id="divTotalKendaraanTgl"><?php echo $totalKendaraan; ?></h3>
                        <p>Kendaraan/<span class="tanggal_pilihan"><?php echo date('d M Y'); ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-body">
                <form class="form-inline pull-right" style="margin-bottom: 10px;">
                    <div class="form-group">
                        <label for="tgl_pilih_retribusi">Pilih Tanggal : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php echo CHtml::textField('tgl_pilih_retribusi', date('d-M-y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!--/.box -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kendaraan Tanggal <span class="tanggal_pilihan"><?php echo date('d M Y'); ?></span></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" id="data_kendaraan">
                <?php
                $this->renderPartial('data_kendaraan', array(
                    'totalLulusU' => $totalLulusU,
                    'totalTidakLulusU' => $totalTidakLulusU,
                    'totalLulusBu' => $totalLulusBu,
                    'totalTidakLulusBu' => $totalTidakLulusBu,
                    'mobilBarangU' => $mobilBarangU,
                    'mobilPenumpangU' => $mobilPenumpangU,
                    'mobilBisU' => $mobilBisU,
                    'mobilBarangBu' => $mobilBarangBu,
                    'mobilPenumpangBu' => $mobilPenumpangBu,
                    'mobilBisBu' => $mobilBisBu,
//                    'totalTaxi' => $totalTaxi,
                    'mobilDatangU' => $mobilDatangU,
                    'mobilDatangBu' => $mobilDatangBu,
                    'totalTlTdU' => $totalTlTdU,
                    'totalTlTdBu' => $totalTlTdBu));
                ?>
            </div><!-- /.box-body -->
        </div><!--/.box -->

<!--        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pengujian Tanggal <span class="tanggal_pilihan"><?php // echo date('d M Y'); ?></span></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding" id="hasilPemeriksaanTgl">
                <?php
//                $this->renderPartial('hasil_pemeriksaan_tgl');
                ?>
            </div>
        </div>-->
    </section><!-- ./col -->
    
    <section class="col-lg-6">
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 id="divTotalRetribusiBln"><?php echo $totalRetribusiBln ?></h3>
                        <p>Retribusi/bulan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 id="divTotalKendaraanBln"><?php echo $totalKendaraanBln; ?></h3>
                        <p>Kendaraan/bulan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-success">
            <div class="box-body">
                <form class="form-inline pull-right" style="margin-bottom: 10px;">
                    <div class="form-group">
                        <label for="bln_pilih_retribusi">Pilih Bulan : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <?php echo CHtml::textField('bln_pilih_retribusi', date('M-y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!--/.box -->

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kendaraan Per Bulan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" id="data_kendaraan_per_bulan">
                <?php
                $this->renderPartial('data_kendaraan_per_bln', array(
                    'totalLulusUBln' => $totalLulusUBln,
                    'totalTidakLulusUBln' => $totalTidakLulusUBln,
                    'totalLulusBuBln' => $totalLulusBuBln,
                    'totalTidakLulusBuBln' => $totalTidakLulusBuBln,
                    'mobilBarangUBln' => $mobilBarangUBln,
                    'mobilPenumpangUBln' => $mobilPenumpangUBln,
                    'mobilBisUBln' => $mobilBisUBln,
                    'mobilBarangBuBln' => $mobilBarangBuBln,
                    'mobilPenumpangBuBln' => $mobilPenumpangBuBln,
                    'mobilBisBuBln' => $mobilBisBuBln,
//                    'totalTaxiBln' => $totalTaxiBln,
                    'mobilDatangUBln' => $mobilDatangUBln,
                    'mobilDatangBuBln' => $mobilDatangBuBln,
                    'totalTlTdUBln' => $totalTlTdUBln,
                    'totalTlTdBuBln' => $totalTlTdBuBln));
                ?>
            </div><!-- /.box-body -->
        </div><!--/.box -->
    </section><!-- ./col -->
</div>