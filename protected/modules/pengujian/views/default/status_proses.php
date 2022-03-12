<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Status Proses Uji</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="col-lg-8 col-md-8 no-padding">
                        <div class="col-lg-12 col-md-12 no-padding">&nbsp;</div>
                        <div class="col-lg-3 col-md-3 no-padding">
                            <input type="text" id="text_category" class="text-besar form-control">
                        </div>
                        <div class="col-lg-3 col-md-3 no-padding">
                            <select id="select_category" class="form-control">
                                <option selected="selected" value="no_uji">No Uji</option>
                                <option value="no_kendaraan">No Kendaraan</option>
                                <option value="numerator">Numerator</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <select id="choose_proses" class="form-control" onchange="prosesSearch()">
                                <option value="CIS 1" selected="true">CIS 1</option>
                                <option value="CIS 2">CIS 2</option>
                            </select>
                        </div>
                        <div class="col-lg-1 col-md-1 no-padding">
                            <button type="button" class="btn btn-info" onclick="prosesSearch()">
                                <span class="glyphicon glyphicon-refresh"></span> Refresh
                            </button>
                        </div>
                        <div class="col-lg-2 col-md-2 no-padding"></div>
                    </div>
                    <div class="col-lg-4 col-md-4 no-padding">
                        <div class="col-lg-12 col-md-12 no-padding"><b>Keterangan :</b></div>
                        <?php
                        $ok = Yii::app()->baseUrl . "/images/icon_approve.png";
                        $reject = Yii::app()->baseUrl . "/images/icon_reject.png";
                        $proses = Yii::app()->baseUrl . "/images/icon_proccess.png";
                        ?>
                        <div class="col-lg-3 col-md-3 no-padding"><img src='<?php echo $ok; ?>'> = Lulus</div>
                        <div class="col-lg-4 col-md-4 no-padding"><img src='<?php echo $reject; ?>'> = Tidak Lulus</div>
                        <div class="col-lg-3 col-md-3 no-padding"><img src='<?php echo $proses; ?>'> = Proses</div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="statusProsesListGrid"></table>
                </div>
            </div>
        </div>
    </div>
</div>

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
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 15,
        pageList: [15, 30, 50],
//        frozenColumns: [[
//            ]],
        columns: [[
                {field: 'hasil_uji_id', title: '', width: 50, halign: 'center', align: 'center', formatter: bandingButton},
                {field: 'no_antrian', title: 'No Antrian', width: 75, sortable: false},
                {field: 'no_kendaraan', width: 105, title: 'No Kendaraan', sortable: false},
                {field: 'no_uji', title: 'No Uji', width: 100, sortable: false},
                {field: 'ptgs_prauji', width: 100, title: 'Ptgs Pra Uji', sortable: false},
                {field: 'prauji', width: 60, title: 'Pra Uji', sortable: false, halign: 'center', align: 'center'},
                {field: 'ptgs_prauji', width: 100, title: 'Ptgs Emisi', sortable: false},
                {field: 'emisi', width: 60, title: 'Emisi', sortable: false, halign: 'center', align: 'center'},
                {field: 'ptgs_pitlift', width: 100, title: 'Ptgs PL', sortable: false},
                {field: 'pitlift', width: 60, title: 'Pit Lift', sortable: false, halign: 'center', align: 'center'},
                {field: 'ptgs_lampu', width: 100, title: 'Ptgs Lampu', sortable: false},
                {field: 'lampu', width: 60, title: 'Lampu', sortable: false, halign: 'center', align: 'center'},
                {field: 'ptgs_break', width: 100, title: 'Ptgs Rem', sortable: false},
                {field: 'rem', width: 60, title: 'Brake', sortable: false, halign: 'center', align: 'center'},
//                {field: 'status', width: 80, title: 'status', sortable: false},
            ]],
//        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.chooseProses = $('#choose_proses :selected').val();
            params.textCategory = $('#text_category').val();
            params.selectCategory = $('#select_category :selected').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    function bandingButton(value) {
        var button;
        var urlact = '<?php echo $this->createUrl('/loket/Ujiulang/ProsesUjiUlang'); ?>';
        button = '<button type="button" data-toggle="tooltip" title="Banding" class="btn btn-danger" onclick="buttonBanding(' + value + ', \'' + urlact + '\')"><span class="glyphicon glyphicon-random"></span></button>';
        return button;
    }

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

    function buttonBanding(value, urlAct) {
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin banding?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: urlAct,
                    data: {id_hasil_uji: value},
                    beforeSend: function () {
                        showlargeloader();
                    },
                    success: function (data) {
                        $('#pemeriksaanTglListGrid').datagrid('reload');
                        hidelargeloader();
                    },
                    error: function () {
                        $('#pemeriksaanTglListGrid').datagrid('reload');
                        hidelargeloader();
                        return false;
                    }
                });
            }
        });
    }
</script>