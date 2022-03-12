<?php
if (Yii::app()->session['position_id'] == $step) {
    $urlActApproved = $this->createUrl('Default/ApproveRejectRekom');
    ?>
    <p>
        <button id="btnDeletePayment" class="btn btn-success" type="button" onclick="approveRejectRekom('<?php echo $urlActApproved; ?>', '1', 'rekomNk')">
            <i class="glyphicon glyphicon-ok"></i> Approved
        </button>
        <button id="btnDeletePayment" class="btn btn-danger" type="button" onclick="approveRejectRekom('<?php echo $urlActApproved; ?>', '2', 'rekomNk')">
            <i class="glyphicon glyphicon-remove"></i> Rejected
        </button>
    </p>
<?php } ?>
<input type="hidden" id="valRekomNk" value="nk">
<table id="rekomNk"></table>
<script>
    $('#rekomNk').datagrid({
        url: '<?php echo $this->createUrl($urlAct); ?>',
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
        pageList: [10, 20, 50],
        frozenColumns: [[
                {field: 'CHECKED', align: 'center', checkbox: <?php if (Yii::app()->session['position_id'] == $step) {
    echo "true";
} else {
    echo "false";
} ?>, width: 20},
                {field: 'id_rekom', hidden: true},
                {field: 'status', width: 50, title: 'Status', sortable: false, formatter: statusImage},
            ]],
        columns: [[
                {field: 'no_uji', title: 'No Uji', width: 80, sortable: false},
                {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
                {field: 'pemilik', width: 180, title: 'Nama Pemilik', sortable: false},
                {field: 'alamat', width: 350, title: 'Alamat', align: 'left', sortable: false},
                {field: 'no_surat', width: 110, title: 'No Surat', align: 'center', sortable: false},
                {field: 'kota', width: 120, title: 'Kota', sortable: false},
                {field: 'propinsi', width: 120, title: 'Propinsi', sortable: false},
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.rekom = $('#valRekomNk').val();
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
</script>