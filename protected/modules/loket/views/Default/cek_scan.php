<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Cek Scan Data</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="col-lg-6 col-md-6 no-padding">
                    <div class="col-lg-3 col-md-3 no-padding">
                        <input type="text" id="text_category" class="text-besar form-control">
                    </div>
                    <div class="col-lg-3 col-md-3 no-padding">
                        <select id="select_category" class="form-control">
                            <option selected="selected" value="no_uji">No Uji</option>
                            <option value="no_kendaraan">No Kendaraan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                <table id="retribusiListGrid"></table>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="container">
                <center>
                    <img id="img1" class="thumbnail" width="80%"/>
                </center>
            </div>
        </div>
    </div>
</div>
<script>
    $('#retribusiListGrid').datagrid({
        url: '',
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
        pageList: [10, 30, 50],
        columns: [[
                {field: 'id_retribusi', title: 'Scan', width: 90, halign: 'center', align: 'center', formatter: buttonImg},
                {field: 'no_uji', width: 120, title: 'No Uji', sortable: false},
                {field: 'no_kendaraan', width: 120, title: 'No Kendaraan', sortable: false},
                {field: 'tgl_retribusi', title: 'Tgl Retribusi', width: 150, sortable: false},
                {field: 'tgl_uji', title: 'Tgl Uji', width: 150, sortable: false},
            ]],
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    function buttonImg(value) {
        var button;
        button = '<button type="button" class="btn btn-info" onclick="showImg(' + value + ')"><span class="glyphicon glyphicon-picture"></span></button>';
        return button;
    }

    $(document).on("keypress", '#text_category', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch();
            return false;
        }
    });
    function prosesSearch() {
        $('#retribusiListGrid').datagrid({
            url: '<?php echo $this->createUrl('Default/GetListRetribusi'); ?>',
            onBeforeLoad: function (params) {
                params.selectCategory = $('#select_category :selected').val();
                params.textCategory = $('#text_category').val();
            },
            onLoadError: function () {
                return false;
            },
            onLoadSuccess: function () {
                $("#img1").attr('src', 'data:image/jpeg;base64,');
            }
        });
    }

    function showImg(value) {
        $.ajax({
            url: '<?php echo $this->createUrl('Default/ViewCekScan'); ?>',
            type: 'POST',
            data: {id_retribusi: value},
            dataType: 'JSON',
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                $("#img1").attr('src', 'data:image/jpeg;base64,' + data.img1);
            },
            error: function (data) {
                hidelargeloader();
                return false;
            }
        });
    }
</script>