<table id="pemeriksaanListGrid"></table>
<script>
    $('#pemeriksaanListGrid').datagrid({
        url: '<?php echo $this->createUrl('Other/GetListHasilPemeriksaan'); ?>',
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
        pageSize: 20,
        pageList: [10, 30, 50],
        frozenColumns: [[
//                {field: 'ACTIONS', title: 'Foto', width: 50, halign: 'center', align: 'center', formatter: formatAction},
                {field: 'no_antrian', title: 'No Antrian', width: 65, sortable: false},
                {field: 'no_kendaraan', width: 85, title: 'No Kendaraan', sortable: false},
            ]],
        columns: [[
                {field: 'no_uji', title: 'No Uji', width: 80, sortable: false},
                {field: 'nama_pemilik', width: 170, title: 'Nama Pemilik', sortable: false},
                {field: 'jam_datang', width: 90, title: 'Jam Proses Uji', align: 'center', sortable: false},
                {field: 'jam_selesai', width: 90, title: 'Jam Selesai Uji', align: 'center', sortable: false},
                {field: 'prauji', width: 80, title: 'Pra Uji', sortable: false},
                {field: 'emisi', width: 80, title: 'Emisi', sortable: false},
                {field: 'pitlift', width: 80, title: 'Pit Lift', sortable: false},
                {field: 'lampu', width: 80, title: 'Lampu', sortable: false},
                {field: 'rem', width: 80, title: 'Rem', sortable: false},
                {field: 'status', width: 80, title: 'status', sortable: false},
            ]],
//        toolbar: "#search",
//        onBeforeLoad: function (params) {
//            params.noUjiKendaraan = $('#noUjiKendaraanPemeriksaan').val();
//        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
//    $(document).on("keypress", '#noUjiKendaraanPemeriksaan', function (e) {
//        var code = e.keyCode || e.which;
//        if (code == 13) {
//            prosesSearchPemeriksaan();
//            return false;
//        }
//    });
//    function formatAction(value) {
//        var button;
//        button = '<a title="Detail" class="easyui-tooltip" onclick="viewImage(\'' + value + '\')" style="cursor:pointer"><i class="glyphicon glyphicon-picture"></i></a> ';
//        return button;
//    }
</script>