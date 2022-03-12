<?php
$path = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($path . '/js/riwayat.js', CClientScript::POS_END);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Riwayat Kendaraan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-4 col-md-6">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <select class="btn" id="select_category">
                                        <option value="no_uji" selected="selected">No Uji / No Kend</option>
                                        <option value="no_chasis">No Chasis</option>
                                        <option value="no_mesin">No Mesin</option>
                                    </select>
                                </span>
                                <?php echo CHtml::textField('text_category', '', array('class' => 'form-control text-besar')); ?>
                                <div class="input-group-addon" onclick="prosesSearch('<?php echo $this->createUrl('Riwayat/RiwayatListGrid'); ?>')" style="cursor: pointer; color: white; background-color: #00c0ef; border-color: #00acd6;">
                                    <span class="glyphicon glyphicon-refresh"></span> 
                                    Refresh
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <table id="riwayatListGrid"></table>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 10px;">
                    <div class="col-lg-3 col-xs-6">
                        <img class="img-thumbnail" id="img_depan">
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <img class="img-thumbnail" id="img_belakang">
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <img class="img-thumbnail" id="img_kiri">
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <img class="img-thumbnail" id="img_kanan">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dlg" class="easyui-dialog" title=" DETAIL KENDARAAN" style="width: 90%; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Close',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialogKendaraan();
     }
     }]
     ">
    <div id="div_kendaraan"></div>
</div>
<div id="dlg_detail_pengujian" class="easyui-dialog" title=" DETAIL PENGUJIAN" style="width: 90%; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Close',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialogPengujian();
     }
     }]
     ">
    <div id="div_detail_pengujian"></div>
</div>
<script>
    $('#riwayatListGrid').datagrid({
        url: '',
        width: '100%',
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
//                {field: 'id_kendaraan', title: 'Detail', width: 50, halign: 'center', align: 'center', formatter: buttonDetail},
                {field: 'kartu_kuning', title: 'Kartu Kuning', width: 80, halign: 'center', align: 'center', formatter: buttonKartuKuning},
//                {field: 'id_kendaraan', title: 'Detail', width: 50, halign: 'center', align: 'center', formatter: buttonDetail},
                {field: 'id_hasil_uji', title: 'Foto', width: 50, halign: 'center', align: 'center', formatter: buttonImage},
//                {field: 'hasil_uji_id', title: 'Pemeriksaan', width: 80, halign: 'center', align: 'center', formatter: buttonPenguji},
                {field: 'no_uji', title: 'No Uji', width: 90, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'tgl_uji', width: 120, title: 'Tanggal Uji', sortable: false},
                {field: 'mati_uji', width: 120, title: 'Mati Uji', sortable: false},
                {field: 'nama_penguji', width: 150, title: 'Nama Penguji', sortable: false},
                {field: 'catatan', width: 150, title: 'Catatan', sortable: false},
                {field: 'no_chasis', width: 150, title: 'No Chasis', sortable: false},
                {field: 'no_mesin', width: 100, title: 'No Mesin', sortable: false},
            ]],
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    function buttonDetail(value) {
        var urlAct = '<?php echo $this->createUrl('Riwayat/DetailKendaraan'); ?>';
        var button = '<button type="button" class="btn btn-info" onclick="viewKendaraan(' + value + ', \'' + urlAct + '\')"><span class="glyphicon glyphicon-zoom-in"></span></button>';
        return button;
    }

    function buttonImage(value) {
        var urlAct = '<?php echo $this->createUrl('Riwayat/ViewImage'); ?>';
        var button = '<button type="button" class="btn btn-primary" onclick="viewImage(' + value + ', \'' + urlAct + '\')"><span class="glyphicon glyphicon-picture"></span></button>';
        return button;
    }

    function buttonPenguji(value) {
        var urlAct = '<?php echo $this->createUrl('Riwayat/ReportRiwayatPemeriksaan'); ?>';
        var button = '<button type="button" class="btn btn-success" onclick="viewDetailPengujian(' + value + ', \'' + urlAct + '\')"><span class="glyphicon glyphicon-duplicate"></span></button>';
        return button;
    }

    $(document).on("keypress", '#text_category', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch('<?php echo $this->createUrl('Riwayat/RiwayatListGrid'); ?>');
            return false;
        }
    });

    function viewDetailPengujian(val, urlAct) {
        window.location.href = urlAct + "?id_hasil_uji=" + val;
        return false;
    }
    
    function buttonKartuKuning(value) {
        var button = '<button type="button" class="btn btn-warning" onclick="cetakKartuKuning(' + value + ')"><span class="fa fa-book"></span></button>';
        return button;
    }

    function cetakKartuKuning(id) {
        var urlAct = '<?php echo $this->createUrl('Riwayat/CetakKartuKuning'); ?>';
        var win = window.open(urlAct + "?id_kendaraan=" + id, '_blank');
        win.focus();
    }
</script>