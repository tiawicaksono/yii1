<?php
$baseUrl = Yii::app()->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($path . '/css/report.css');
$cs->registerScriptFile($path . '/js/report.js', CClientScript::POS_END);
$tgl = date('M-y');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Export Pemakaian Buku Uji</h3>
                <div class="box-tools pull-right">
                    <!--<span class="label label-danger">8 New Members</span>-->
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-inline" id="REPORT_FORM_SEARCH">
                            <div class="form-group">
                                <label for="tgl_report">Pilih Bulan : </label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                    <?php echo CHtml::textField('bln_report_buku_uji', $tgl, array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                </div>
                            </div>
                            <!--<button onclick="showTableUjiPertama()" type="button" class="btn btn-primary">Show Data</button>-->
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <table>
                                <tr>
                                    <td class="tengah">
                                        <a href="javascript:void(0)" onclick="exportExcelReport('<?php echo $this->createUrl('Pengujian/ExportExcelBukuUji'); ?>')">
                                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_excel.png">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tengah">export to excel</td>
                                </tr>
                            </table>                     
                        </div>
                    </div>
                </div>

                <div class="content" id="table_buku_uji">
                    <?php $this->renderPartial('table_buku_uji', array('tgl' => $tgl)); ?>
                </div>
            </div><!-- /.box-body -->
        </div><!--/.box -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kendaraan Lulus</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" id="grafik_buku_uji">
                <?php $this->renderPartial('grafik_buku_uji', array('tgl' => $tgl)); ?>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>