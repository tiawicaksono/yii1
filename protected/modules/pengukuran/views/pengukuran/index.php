<?php
$path = $this->module->assetsUrl;
$baseJs = Yii::app()->appComponent->urlJs();
$baseCss = Yii::app()->appComponent->urlCss();
$cs = Yii::app()->clientScript;
$cs->registerCssFile($baseCss . '/bootstrap-select.css');
$cs->registerScriptFile($path . '/js/pengukuran.js', CClientScript::POS_END);
$cs->registerScriptFile($baseJs . '/bootstrap-select.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row{
        height: 40px !important;
    }
    .datagrid-cell-c1-no_kendaraan {
        font-weight: bold !important;
        font-size: 12pt !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Pengukuran</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="col-lg-3 col-md-3">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                <?php echo CHtml::textField('tgl_search', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <select class="btn" id="select_category">
                                        <option selected="selected" value="no_kend_uji">No Uji / Kend.</option>
                                        <option value="numerator">Numerator</option>
                                    </select>
                                </span>
                                <?php echo CHtml::textField('text_category', '', array('class' => 'form-control text-besar')); ?>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <button type="button" class="btn btn-info" onclick="prosesSearch()">
<!--                                <span class="glyphicon glyphicon-refresh"></span> -->
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <table id="pengukuranListGrid"></table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Nilai Pengukuran</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'FORMINPUT')); ?>
                <section class="col-md-12">
                    <div class="box box-danger">
                        <div class="box-header with-border bg-red">
                            <h3 class="box-title">INFORMASI KENDARAAN</h3>
                        </div>
                        <div  class="box-body">
                            <div class="col-md-6">
                                <div class="col-md-4 no-margin no-padding">
                                    <label for="ks">KS</label>
                                    <div class="input-group">
                                        <?php
                                        echo CHtml::hiddenField('id_daftar', '', array('class' => 'form-control'));
                                        echo CHtml::hiddenField('id_hasil_uji', '', array('class' => 'form-control'));
                                        echo CHtml::hiddenField('id_kendaraan', '', array('class' => 'form-control'));
                                        echo CHtml::hiddenField('id_jns_kend', '', array('class' => 'form-control'));
//                                        echo CHtml::hiddenField('cis', '', array('class' => 'form-control'));
                                        echo CHtml::textField('ks', '', array('class' => 'form-control', 'readonly' => 'readonly'));
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4 no-margin no-padding">
                                    <label for="tahun">Tahun</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('tahun', '', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                                    </div>
                                </div>
                                <div class="col-md-4 no-margin no-padding">
                                    <label for="bahan_bakar">Bhn Bakar</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('bahan_bakar', '', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="b_sumbu_1">B.Sumbu 1</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('b_sumbu_1', '', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                                    </div>
                                </div>
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="b_sumbu_2">B.Sumbu 2</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('b_sumbu_2', '', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                                    </div>
                                </div>
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="b_sumbu_3">B.Sumbu 3</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('b_sumbu_3', '', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                                    </div>
                                </div>
                                <div class="col-md-3 no-margin no-padding">
                                    <label for="b_sumbu_4">B.Sumbu 4</label>
                                    <div class="input-group">
                                        <?php echo CHtml::textField('b_sumbu_4', '', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-md-3">
                    <div class="box box-info">
                        <div class="box-header with-border bg-aqua">
                            <h3 class="box-title">EMISI</h3>
                        </div>
                        <div  class="box-body">
                            <div class="col-md-4 no-margin no-padding">
                                <label for="diesel">DIESEL</label>
                            </div>
                            <div class="col-md-8 no-margin no-padding">
                                <div class="input-group">
                                    <?php echo CHtml::textField('diesel', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>

                            <div class="col-md-4 no-margin no-padding">
                                <label for="mesin_co">MESIN CO</label>
                            </div>
                            <div class="col-md-8 no-margin no-padding">
                                <div class="input-group">
                                    <?php echo CHtml::textField('mesin_co', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>

                            <div class="col-md-4 no-margin no-padding">
                                <label for="mesin_hc">MESIN HC</label>
                            </div>
                            <div class="col-md-8 no-margin no-padding">
                                <div class="input-group">
                                    <?php echo CHtml::textField('mesin_hc', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">ppm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border bg-aqua">
                            <h3 class="box-title">SISTEM PENERANGAN</h3>
                        </div>
                        <div  class="box-body">
                            <div class="col-md-3 no-margin no-padding">
                                &nbsp;
                            </div>
                            <div class="col-md-9 no-margin no-padding">
                                <div class="col-md-6 no-margin no-padding">
                                    <label>KUAT</label>
                                </div>
                                <div class="col-md-6 no-margin no-padding">
                                    <label>DEVIASI</label>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label>KANAN</label>
                            </div>
                            <div class="col-md-9 no-margin no-padding">
                                <div class="col-md-6 no-margin no-padding">
                                    <div class="input-group">
                                        <?php echo CHtml::textField('kuat_kanan', '', array('class' => 'form-control')); ?>
                                        <span class="input-group-addon">cd</span>
                                    </div>
                                </div>
                                <div class="col-md-6 no-margin no-padding">
                                    <div class="input-group">
                                        <?php echo CHtml::textField('deviasi_kanan', '', array('class' => 'form-control')); ?>
                                        <span class="input-group-addon">&deg;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label>KIRI</label>
                            </div>
                            <div class="col-md-9 no-margin no-padding">
                                <div class="col-md-6 no-margin no-padding">
                                    <div class="input-group">
                                        <?php echo CHtml::textField('kuat_kiri', '', array('class' => 'form-control')); ?>
                                        <span class="input-group-addon">cd</span>
                                    </div>
                                </div>
                                <div class="col-md-6 no-margin no-padding">
                                    <div class="input-group">
                                        <?php echo CHtml::textField('deviasi_kiri', '', array('class' => 'form-control')); ?>
                                        <span class="input-group-addon">&deg;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-md-5">
                    <div class="box box-info">
                        <div class="box-header with-border bg-aqua">
                            <h3 class="box-title">SISTEM PENGEREMAN</h3>
                        </div>
                        <div  class="box-body">
                            <div class="col-md-3 no-margin no-padding">
                                <label for="sumbu_1">SUMBU 1</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sumbu_1', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="sumbu_2">SUMBU 2</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sumbu_2', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="sumbu_3">SUMBU 3</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sumbu_3', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="sumbu_4">SUMBU 4</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sumbu_4', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>

                            <div class="col-md-3 no-margin no-padding">
                                <label for="sg_sb_1">SG SB 1</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sg_sb_1', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="sg_sb_2">SG SB 2</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sg_sb_2', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="sg_sb_3">SG SB 3</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sg_sb_3', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="col-md-3 no-margin no-padding">
                                <label for="sg_sb_4">SG SB 4</label>
                                <div class="input-group">
                                    <?php echo CHtml::textField('sg_sb_4', '', array('class' => 'form-control')); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>                
                <div class="col-md-12 no-padding" style="margin-bottom: 10px">
                    <div class="col-md-12">
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <button id="button_reload" type="button" disabled="true" class="btn btn-info button_reload" onclick="reloadData('<?php echo $this->createUrl('ReloadData'); ?>')">RELOAD DATA</button>
                            <button id="button_simpan" type="button" disabled="true" class="btn btn-primary button_simpan" onclick="submitForm('<?php echo $this->createUrl('SaveForm'); ?>')">SIMPAN</button>
                        </div>
                    </div>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
        </div>
    </div>
    
</div>

<script>
    $('#pengukuranListGrid').datagrid({
        url: '<?php echo $this->createUrl('Pengukuran/ListGrid'); ?>',
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
        pageSize: 5,
        pageList: [5, 10, 20],
        columns: [[
                {field: 'id_hasil_uji', title: '', hidden: true},
                {field: 'no_kendaraan', width: 105, title: 'NO. KEND', sortable: false},
                {field: 'no_uji', title: 'NO. UJI', width: 100, sortable: false},
                {field: 'jenis', title: 'JENIS', width: 130, sortable: false},
                {field: 'nama_pemilik', title: 'NAMA PEMILIK', width: 250, sortable: false},
                {field: 'alamat', title: 'ALAMAT', width: 400, sortable: false},
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.tgl_search = $('#tgl_search').val();
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        },
        onClickRow: function () {
            buttonEditPengukuran();
        },
    });

</script>