<style>
    .datagrid-cell{
        padding: 10px;
    }
    .datagrid-cell-c1-no_kendaraan {
        font-weight: bold;
        font-size: 22px
    }
</style>
<input type="hidden" id="choose_proses" value="CIS 2">
<table id="statusProsesListGrid"></table>

<script>
    $('#statusProsesListGrid').datagrid({
        url: '<?php echo $this->createUrl('Default/StatusProsesListGrid'); ?>',
        pagination: true,
        singleSelect: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
//        loadMsg: 'Loading...',
        loadMsg: false,
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 10,
        pageList: [10, 30, 50],
//        frozenColumns: [[
//            ]],
        columns: [[
                {field: 'no_uji', title: 'No Uji', width: 100, sortable: false},
                {field: 'no_kendaraan', width: 150, title: 'NO KENDARAAN', sortable: false},
                {field: 'prauji', width: 140, title: 'PRA UJI', sortable: false, halign: 'center', align: 'center'},
                {field: 'emisi', width: 140, title: 'EMISI', sortable: false, halign: 'center', align: 'center'},
                {field: 'pitlift', width: 140, title: 'PIT LIFT', sortable: false, halign: 'center', align: 'center'},
                {field: 'lampu', width: 140, title: 'LAMPU', sortable: false, halign: 'center', align: 'center'},
                {field: 'rem', width: 140, title: 'REM', sortable: false, halign: 'center', align: 'center'},
//                {field: 'status', width: 80, title: 'status', sortable: false},
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

    function prosesSearch() {
        $('#statusProsesListGrid').datagrid('reload');
    }

    $(document).on("keypress", '#text_category', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch();
            return false;
        }
    });
    
    $(document).ready(function () {
        //30 detik
        setInterval(function () {
            prosesSearch();
        }, 1000);
    });
</script>