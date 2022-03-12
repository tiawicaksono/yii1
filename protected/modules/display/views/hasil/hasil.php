<?php
$path = $this->module->assetsUrl;
$baseJs = Yii::app()->appComponent->urlJs();
$baseCss = Yii::app()->appComponent->urlCss();
$cs = Yii::app()->clientScript;
$cs->registerCssFile($baseCss . '/bootstrap-select.css');
$cs->registerScriptFile($path . '/js/hasil.js', CClientScript::POS_END);
$cs->registerScriptFile($baseJs . '/bootstrap-select.js', CClientScript::POS_END);
?>
<style>    
    .datagrid-header{
	font-size: 12pt;
    }    
    .datagrid-td-rownumber{
        display: none !important;
    }
    .datagrid-header-rownumber{
        display: none !important;
    }
    .datagrid-row{
        height: 40px !important; 
        font-weight: bold;
    }
    .datagrid-cell{   
        text-align: center;	
        font-size: 12pt;
    }
    .box-header{
        text-align: center;
    } 
    .datagrid-htable{
        height: 40px;
        background-color: rgb;
    }
    .datagrid-header .datagrid-cell{
        font-weight: bold;
        font-size:40pt !important;
        color:blue;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info with-border bg-blue">
            <div class="box-header with-border center bg-blue">                
                <span class="box-title bold" style="font-size:20pt">PENGUJIAN KENDARAAN BERMOTOR KAB. SAMPANG</span>
            </div><!-- /.box-header -->
            <input type="hidden" id="choose_proses" value="cetak">            
            <table id="pemeriksaanTglListGrid"></table>                                          
        </div>
    </div>
</div>
<script type="text/javascript">               
    $('#pemeriksaanTglListGrid').datagrid({
        url: '<?php echo $this->createUrl('Hasil/HasilListGrid'); ?>',
        width:'100%',
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
        pageSize: 50,
        pageList: [50, 100],        
        columns: [[
                {field: 'no_antrian', title:'NO ANTRIAN', width: '120', sortable: false},
                {field: 'no_kendaraan', width: '150', title: 'NO KENDARAAN', sortable: false},
                {field: 'no_uji', title: 'NO UJI', width: '150', sortable: false},
                {field: 'nm_komersil', title: 'JENIS KEND.', width: '200', sortable: false},
                {field: 'nama_pemilik', title: 'NAMA PEMILIK', width: '200', sortable: false},
               {field: 'prauji', width: 80, title: 'PRAUJI', sortable: false, halign: 'center', align: 'center'},
              {field: 'emisi', width: 80, title: 'EMISI', sortable: false, halign: 'center', align: 'center'},
               {field: 'pitlift', width: 80, title: 'PITLIFT', sortable: false, halign: 'center', align: 'center'},
               {field: 'lampu', width: 80, title: 'LAMPU', sortable: false, halign: 'center', align: 'center'},
                {field: 'rem', width: 80, title: 'REM', sortable: false, halign: 'center', align: 'center'},
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.chooseProses = $('#choose_proses').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
    $(document).ready(function(){
        window.setInterval(function () {
            prosesSearch(); 
        }, 60000);
    });
    
    function prosesSearch() {
        $('#pemeriksaanTglListGrid').datagrid('reload');
    }    
</script>