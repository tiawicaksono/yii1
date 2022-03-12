<?php
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($assetsUrl . '/js/terdaftar.js', CClientScript::POS_END);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Terdaftar</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-white" type="button" onclick="cetakReport('<?php echo $this->createUrl('Terdaftar/ReportTerdaftarExcel'); ?>')">
                        <i class="fa fa-file-excel-o" style="color: green;"></i> Rekap Terdaftar
                    </button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="col-lg-4 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                <?php echo CHtml::textField('tgl_search', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="input-group">
                                <input type="text" id="text_category" class="text-besar form-control" placeholder="NO UJI/NO KENDARAAN">
                                <div class="input-group-addon" onclick="prosesSearch()" style="cursor: pointer; color: white; background-color: #00c0ef; border-color: #00acd6;">
                                    <span class="glyphicon glyphicon-refresh"></span> 
                                    Refresh
                                </div>
                            </div>
                            <!--<input type="text" id="text_category" class="text-besar form-control" placeholder="NO UJI / NO KENDARAAN">-->
                        </div>
<!--                        <div class="col-lg-4 col-md-4">
                            <button type="button" class="btn btn-info pull-left" onclick="prosesSearch()">
                                <span class="glyphicon glyphicon-refresh"></span> 
                                Refresh
                            </button>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                    <table id="terdaftarListGrid"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dlg" class="easyui-dialog" title="Ganti Tanggal Uji" style="width: 400px; height: auto; padding: 10px;display: none"
     data-options="
     iconCls: 'icon-save',
     autoOpen: false,
     buttons: [{
     text:'Ok',
     iconCls:'icon-ok',
     handler:function(){
     saveEditTerdaftar();
     }
     },{
     text:'Cancel',
     iconCls:'icon-cancel',
     handler:function(){
     closeDialog();
     }
     }]
     ">
    <form id="form_edit">
        <input type="hidden" id="dlg_id_retribusi" name="dlg_id_retribusi">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="glyphicon glyphicon-calendar"></i>
            </div>
            <input type="text" id="ganti_tgl_uji" name="ganti_tgl_uji" class="form-control" readonly="readonly" value="<?php echo date('d-M-Y'); ?>">
        </div>
    </form>
</div>
<script>
    $('#terdaftarListGrid').datagrid({
        url: '<?php echo $this->createUrl('Terdaftar/GetListDataTerdaftar'); ?>',
        width: '100%',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 20,
        pageList: [20, 50, 100],
        columns: [[
                {field: 'id_retribusi', title: '', width: 50, halign: 'center', align: 'center', formatter: buttonEditTgl},
                {field: 'penerima', width: 80, title: 'PETUGAS', sortable: true},
                {field: 'numerator', title: 'NUMERATOR', width: 100, sortable: true},
                {field: 'nm_uji', width: 120, title: 'JNS UJI', sortable: false},
                {field: 'no_uji', title: 'NO UJI', width: 100, sortable: true},
                {field: 'no_kendaraan', width: 100, title: 'NO KEND', sortable: true},
                {field: 'nama_pemilik', width: 220, title: 'NAMA PEMILIK', sortable: false},
                {field: 'nm_komersil', width: 100, title: 'JNS KEND', sortable: false},
                {field: 'bahan_bakar', width: 150, title: 'BAHAN BAKAR', sortable: false},
                {field: 'sifat', width: 150, title: 'SIFAT (U/BU)', sortable: false},
                {field: 'tglmati', width: 120, title: 'TGL MATI DAFTAR', sortable: false},
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.textCategory = $('#text_category').val();
//            params.selectCategory = $('#select_category :selected').val();
            params.selectDate = $('#tgl_search').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    function buttonEditTgl(value) {
        var button = '<button type="button" data-toggle="tooltip" title="Edit Tgl" class="btn btn-info" onclick="buttonEditTerdaftar(' + value + ')"><span class="glyphicon glyphicon-pencil"></span></button>';
        return button;
    }

    function saveEditTerdaftar() {
        var data = $("#form_edit").serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl('Terdaftar/ProsesGantiTglUji'); ?>',
            data: data,
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                closeDialog();
                prosesSearch();
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    }

    function cetakReport(urlAct) {
        var tgl = $('#tgl_search').val();
        window.location.href = urlAct + "?tgl=" + tgl;
        return false;
    }
</script>