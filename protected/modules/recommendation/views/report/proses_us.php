<input type="hidden" id="valRekomUs" value="us">
<table id="rekomUs"></table>
<script>
    $('#rekomUs').datagrid({
        url: '<?php echo $this->createUrl($urlAct); ?>',
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
        pageSize: 20,
        pageList: [10, 20, 50],
        frozenColumns: [[
                {field: 'id_rekom', hidden: true},
                {field: 'status', width: 50, title: 'Status', sortable: false, formatter: statusImage},
            ]],
        columns: [[
                {field: 'no_uji', title: 'No Uji', width: 80, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'pemilik', width: 180, title: 'Nama Pemilik', sortable: false},
//                {field: 'alamat', width: 110, title: 'Alamat', align: 'center', sortable: false},
                {field: 'no_surat', width: 110, title: 'No Surat', align: 'center', sortable: false},
                {field: 'keterangan', width: 350, title: 'Keterangan', sortable: false},
//                {field: 'kota', width: 80, title: 'Kota', sortable: false},
//                {field: 'propinsi', width: 80, title: 'Propinsi', sortable: false}
                <?php if ($step == 1) { ?>
                    {field: 'report', width: 50, title: '', sortable: false, formatter: statusReport},
                <?php } ?>
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.rekom = $('#valRekomUs').val();
            params.tgl_pengajuan_rekom = $('#tgl_pengajuan_rekom').val();
        },
        onLoadError: function () {
            return false;
        },
//        onLoadSuccess: function () {
//        }
    });
    function statusImage(value) {
        var button = '';
        switch (value) {
            case 0:
                button = '<img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_proccess.png">';
                break;
            case 1:
                button = '<img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_approve.png">';
                break;
            case 2:
                button = '<img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_reject.png">';
                break;
        }
        return button;
    }
    function statusReport(value) {
        var button = '';
        var data = value.split('_');
        if(data[0] == 1){
            button = '<a href="<?php echo $this->createUrl('Report/DownloadLaporan'); ?>/'+data[1]+'"><img src="<?php echo Yii::app()->baseUrl; ?>/images/icon_doc.png"></a>';
        }else{
            button = '';
        }
        return button;
    }
</script>