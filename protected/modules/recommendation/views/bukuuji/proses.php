<?php
if (Yii::app()->session['position_id'] == $step) {
    $urlActApproved = $this->createUrl('Bukuuji/ApproveRejectRekom');
    ?>
    <p>
        <button id="btnDeletePayment" class="btn btn-success" type="button" onclick="approveRejectBukuuji('<?php echo $urlActApproved; ?>', '1')">
            <i class="glyphicon glyphicon-ok"></i> Approved
        </button>
        <button id="btnDeletePayment" class="btn btn-danger" type="button" onclick="approveRejectBukuuji('<?php echo $urlActApproved; ?>', '2')">
            <i class="glyphicon glyphicon-remove"></i> Rejected
        </button>
    </p>
<?php } ?>
<table id="rekomBukuUji"></table>
<script>
    $('#rekomBukuUji').datagrid({
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
                {field: 'CHECKED', align: 'center', checkbox: <?php
if (Yii::app()->session['position_id'] == $step) {
    echo "true";
} else {
    echo "false";
}
?>, width: 20},
                {field: 'status', width: 50, title: 'Status', align: 'center', sortable: false, formatter: statusImage},
                {field: 'id_req', hidden: true},
            ]],
        columns: [[
                {field: 'no_seri_awal', title: 'No Seri Awal', width: 120, sortable: false},
                {field: 'no_seri_akhir', width: 120, title: 'No Seri Akhir', sortable: false},
                {field: 'jumlah', width: 120, title: 'Jumlah', sortable: false},
                {field: 'tgl_pengajuan', width: 120, title: 'Tanggal Pengajuan', sortable: false},
                {field: 'tgl_approve', width: 120, title: 'Tanggal Approve', sortable: false}
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.tgl_pengajuan = $('#tgl_pengajuan').val();
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