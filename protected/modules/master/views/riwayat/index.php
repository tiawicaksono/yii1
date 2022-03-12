<?php
$baseUrl = Yii::app()->request->baseUrl;
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($path . '/js/master_riwayat.js', CClientScript::POS_END);
$cs->registerCssFile($baseUrl . '/css/bootstrap-select.css');
$cs->registerScriptFile($baseUrl . '/js/bootstrap-select.js', CClientScript::POS_END);
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Master Riwayat</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="col-lg-4 col-md-4">
                    <input type="text" id="text_category" class="text-besar form-control" placeholder="NO UJI/NO KENDARAAN">
                    <input type="hidden" id="id_kendaraan" name="id_kendaraan">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-info" onclick="prosesSearch()">
                            <span class="glyphicon glyphicon-refresh"></span> 
                            Refresh
                        </button>
                        <button type="button" class="btn btn-warning" id="add_riwayat" disabled="true" onclick="addRiwayat()">
                            <span class="glyphicon glyphicon-plus"></span> 
                            Add Riwayat
                        </button>
                        <button type="button" class="btn btn-danger" id="del_kendaraan" disabled="true" onclick="delKendaraan()">
                            <span class="glyphicon glyphicon-trash"></span> 
                            Delete Kendaraan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12" style="margin-top: 20px">
            <table id="riwayatListGrid"></table>
        </div>
    </div>
</div>
<div id="dlgEditRiwayat" class="easyui-dialog" title="Form Edit Riwayat" style="width: 400px; height: 330px; padding: 10px; display: none;"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Ok',
     iconCls:'icon-ok',
     handler:function(){
     updateRiwayat();
     }
     },{
     text:'Cancel',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialog();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?php 
        echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'FORMEDITRIWAYAT'));
        echo CHtml::hiddenField('dlg_edit_id_riwayat', '', array());
        echo CHtml::hiddenField('dlg_edit_id_hasil_uji', '', array());
        ?>
            <div class="form-group">
                <label for="dlg_edit_tgl_uji" class="col-lg-3 col-md-6 control-label">Tgl Uji</label>
                <div class="col-lg-9 col-md-6">
                    <input name="dlg_edit_tgl_uji" id="dlg_edit_tgl_uji" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
            </div>
            <div class="form-group">
                <label for="dlg_edit_nrp" class="col-lg-3 col-md-6 control-label">Penguji</label>
                <div class="col-lg-9 col-md-6">
                    <?php
                    $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                    $type_list = CHtml::listData($penguji, 'nrp', 'nama_penguji');
                    echo CHtml::dropDownList('dlg_edit_nrp', '', $type_list, array('class' => 'form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5'));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="dlg_edit_tempat" class="col-lg-3 col-md-6 control-label">Tempat Uji</label>
                <div class="col-lg-9 col-md-6">
                    <?php echo CHtml::textField('dlg_edit_tempat', '', array('class' => 'form-control')) ?>
                </div>
            </div>
            <div class="form-group">
                <label for="dlg_edit_catatan" class="col-lg-3 col-md-6 control-label">Catatan</label>
                <div class="col-lg-9 col-md-6">
                    <?php echo CHtml::textArea('dlg_edit_catatan', '', array('class' => 'form-control')) ?>
                </div>
            </div>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
<div id="dlgAddRiwayat" class="easyui-dialog" title="Form Add Riwayat" style="width: 400px; height: 330px; padding: 10px; display: none;"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Ok',
     iconCls:'icon-ok',
     handler:function(){
     insertRiwayat();
     }
     },{
     text:'Cancel',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialog();
     }
     }]
     ">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?php 
        echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'FORMADDRIWAYAT'));
        ?>
            <div class="form-group">
                <label for="dlg_add_tgl_uji" class="col-lg-3 col-md-6 control-label">Tgl Uji</label>
                <div class="col-lg-9 col-md-6">
                    <input name="dlg_add_tgl_uji" id="dlg_add_tgl_uji" value="<?php echo date("d/m/Y"); ?>" type="text" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
            </div>
            <div class="form-group">
                <label for="dlg_add_nrp" class="col-lg-3 col-md-6 control-label">Penguji</label>
                <div class="col-lg-9 col-md-6">
                    <?php
                    $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                    $type_list = CHtml::listData($penguji, 'nrp', 'nama_penguji');
                    echo CHtml::dropDownList('dlg_add_nrp', '', $type_list, array('class' => 'form-control selectpicker show-tick', 'data-live-search' => 'true', 'data-size' => '5'));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="dlg_add_tempat" class="col-lg-3 col-md-6 control-label">Tempat Uji</label>
                <div class="col-lg-9 col-md-6">
                    <?php echo CHtml::textField('dlg_add_tempat', 'PAMEKASAN', array('class' => 'form-control text-besar')) ?>
                </div>
            </div>
            <div class="form-group">
                <label for="dlg_add_catatan" class="col-lg-3 col-md-6 control-label">Catatan</label>
                <div class="col-lg-9 col-md-6">
                    <?php echo CHtml::textArea('dlg_add_catatan', '', array('class' => 'form-control')) ?>
                </div>
            </div>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
<script>
    $('#riwayatListGrid').datagrid({
        url: '',
        pagination: true,
        singleSelect: false,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 50,
        pageList: [10, 30, 50],
        columns: [[
                {field: 'id_riwayat', title: '', width: 100, halign: 'center', align: 'center', formatter: buttonEditDeleteRiwayat},
                {field: 'no_uji', title: 'No Uji', width: 90, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'tgl_uji', width: 120, title: 'Tanggal Uji', sortable: false},
//                {field: 'mati_uji', width: 120, title: 'Mati Uji', sortable: false},
                {field: 'nama_penguji', width: 190, title: 'Nama Penguji', sortable: false},
                {field: 'catatan', width: 200, title: 'Catatan', sortable: false},
                {field: 'no_chasis', width: 120, title: 'No Chasis', sortable: false},
                {field: 'no_mesin', width: 150, title: 'No Mesin', sortable: false},
            ]],
//        toolbar: "#search",
//        onBeforeLoad: function (params) {
//            params.noUjiKendaraan = $('#noUjiKendaraan').val();
//            params.categorySearch = $('#categorySearch :selected').val();
//        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    function buttonEditDeleteRiwayat(value) {
        var button;
        var url = '<?php echo $this->createUrl('Riwayat/DeleteDoubleRiwayat'); ?>';
        var urlEdit = '<?php echo $this->createUrl('Riwayat/DetailRiwayat'); ?>';
        button = '<button type="button" class="btn btn-danger" onclick="delRiwayat(\'' + url + '\',' + value + ')"><span class="glyphicon glyphicon-trash"></span></button>';
        button += ' <button type="button" class="btn btn-info" onclick="editRiwayat(\'' + urlEdit + '\',' + value + ')"><span class="glyphicon glyphicon-pencil"></span></button>';
        return button;
    }
</script>