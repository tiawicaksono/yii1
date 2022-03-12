<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl . '/css/bootstrap-select.css');
$cs->registerScriptFile($baseUrl . '/js/bootstrap-select.js', CClientScript::POS_END);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Kendaraan Per Kecamatan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="kecamatan">Kecamatan</label>
                        <?php
                        $criteria_kecamatan = new CDbCriteria();
                        $criteria_kecamatan->addCondition("id_kota = '3527'");
                        $criteria_kecamatan->order = 'nama asc';
                        $tbl_kecamatan = MKecamatan::model()->findAll($criteria_kecamatan);
                        $type_list = CHtml::listData($tbl_kecamatan, 'id_kecamatan', 'nama');
                        echo CHtml::dropDownList('kecamatan_select', '', $type_list, array('class' => 'kecamatan_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5', 'onchange' => 'selectKecamatan()', 'empty' => 'ALL'));
                        ?>
                        <label for="kelurahan">Kelurahan/Desa</label>
                        <?php
                        echo CHtml::dropDownList('kelurahan_select', '', array('' => 'ALL'), array('class' => 'kelurahan_select form-control selectpicker show-tick wajib-isi', 'data-live-search' => 'true', 'data-size' => '5'));
                        ?>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-3">
                        <button type="button" id="btn-cetak" class="btn btn-success" onclick="cetak('<?php echo $this->createUrl('KendaraanKecamatan/Rekap'); ?>')">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function cetak(urlAct) {
        var kecamatan = $('#kecamatan_select :selected').val();
        var kelurahan = $('#kelurahan_select :selected').val();
        window.location.href = urlAct + "?kecamatan=" + kecamatan + "&kelurahan=" + kelurahan;
        return false;
    }

    function selectKecamatan() {
        var kecamatan = $('#kecamatan_select :selected').val();
        $.ajax({
            url: 'KendaraanKecamatan/SelectKecamatan',
            type: 'POST',
            data: {kecamatan: kecamatan},
            success: function (msg) {
                $("#kelurahan_select").html(msg).selectpicker('refresh');
            },
        });
    }

</script>