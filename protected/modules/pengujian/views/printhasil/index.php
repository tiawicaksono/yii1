<style>
    .datagrid-row {
        min-height: 40px;
        height: 40px;
    }

    #button_save_lulus {
        background: #E53935;
        color: #fff;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Cetak Print Hasil</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-2 col-md-3">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                <?php echo CHtml::textField('tgl_search', date('d-M-Y'), array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input type="text" id="text_category" class="text-besar form-control" placeholder="NO UJI / NO KENDARAAN">
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <select id="choose_kelulusan" class="form-control" onchange="prosesSearch()">
                                <option value="all" selected="true">- Semua L/TL-</option>
                                <option value="true">Lulus</option>
                                <option value="false">Tidak Lulus</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <select id="choose_cetak" class="form-control" onchange="prosesSearch()">
                                <option value="all">- Semua Cetak/Belum-</option>
                                <option value="false" selected="true">Belum Cetak</option>
                                <option value="true">Sudah Cetak</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-info" onclick="prosesSearch()">
                                <span class="glyphicon glyphicon-refresh"></span> Refresh
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12" style="margin-top: 20px">
                        <table id="statusProsesListGrid"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dlg_no_surat" class="easyui-dialog" title="No Surat" style="width: 400px; height: auto; padding: 10px;display: none" data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     cetakTidakLulus();
     }
     }]
     ">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
                <select id="choose_penguji" class="form-control">
                    <?php
                    $penguji = Penguji::model()->findAll();
                    foreach ($penguji as $dataPenguji) :
                    ?>
                        <option value="<?php echo $dataPenguji->nrp; ?>"><?php echo $dataPenguji->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                <?php
                echo CHtml::hiddenField('dialog_url', '');
                echo CHtml::hiddenField('dialog_id', '');
                //            echo CHtml::textField('dialog_no_surat', '', array('class' => 'form-control text-besar'));
                ?>
            </div>
        </div>
    </div>
    <div id="dlg_lulus_sementara" class="easyui-dialog" title="Lulus Sementara" style="width: 400px; height: auto; padding: 10px;display: none" data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     cetakLulusSementara();
     }
     }]
     ">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
                <select id="choose_penguji_sementara" class="form-control">
                    <?php
                    $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                    foreach ($penguji as $dataPenguji) :
                    ?>
                        <option value="<?php echo $dataPenguji->nrp; ?>"><?php echo $dataPenguji->nama_penguji; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                <?php
                echo CHtml::textArea('catatan_lulus_sementara', '', array('class' => 'form-control'));
                echo CHtml::hiddenField('dialog_sementara_url', '');
                echo CHtml::hiddenField('dialog_sementara_id', '');
                ?>
            </div>
        </div>
    </div>
    <div id="dlg_cetak_hasil" class="easyui-dialog" title="Cetak Hasil Uji" style="width: 400px; height: auto; padding: 10px;display: none" data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     buttons: [{
     id: 'button_save_lulus',
     text:'Kartu',
     iconCls:'icon-save',
     handler:function(){
     submitLulus();
     }}]
     ">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
                <select id="choose_lulus_penguji" class="form-control">
                    <?php
                    $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                    foreach ($penguji as $dataPenguji) :
                    ?>
                        <option value="<?php echo $dataPenguji->nrp; ?>">
                            <?php echo $dataPenguji->nama_penguji; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                <?php
                //            echo CHtml::hiddenField('dialog_lulus_url', '');
                echo CHtml::hiddenField('dialog_lulus_id', '');
                ?>
                <select id="choose_posisi" class="form-control">
                    <option value="kiri">Kiri</option>
                    <option value="kanan">Kanan</option>
                </select>
            </div>
        </div>
    </div>
    <div id="dlg_cetak_tl_dimensi" class="easyui-dialog" title="Cetak TL Dimensi" style="width: 400px; height: auto; padding: 10px;display: none" data-options="
     iconCls: 'icon-print',
     autoOpen: false,
     modal: true,
     buttons: [{
     text:'Print',
     iconCls:'icon-print',
     handler:function(){
     cetakTlDimensi();
     }
     }]
     ">
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding" style="margin-bottom: 10px;">
                <?php
                echo CHtml::hiddenField('dialog_tl_dimensi_id', '');
                ?>
                <select id="choose_tl_penguji" class="form-control">
                    <?php
                    $penguji = TblNamaPenguji::model()->findAllByAttributes(array('status_penguji' => true));
                    foreach ($penguji as $dataPenguji) :
                    ?>
                        <option value="<?php echo $dataPenguji->nrp; ?>"><?php echo $dataPenguji->nama_penguji; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <script>
        $('#statusProsesListGrid').datagrid({
            url: '<?php echo $this->createUrl('Printhasil/PrintHasilListGrid'); ?>',
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
            pageSize: 15,
            pageList: [15, 30, 50],
            columns: [
                [
                    <?php if (Yii::app()->user->isRole('Admin')) { ?> {
                            field: 'hasil_uji_id',
                            title: 'Prauji',
                            width: 50,
                            halign: 'center',
                            align: 'center',
                            formatter: bandingPraujiButton
                        },
                        {
                            field: 'id_hasil_uji',
                            title: 'Pengukuran',
                            width: 80,
                            halign: 'center',
                            align: 'center',
                            formatter: bandingPengukuranButton
                        },
                    <?php } ?> {
                        field: 'cetak',
                        width: 80,
                        title: 'CETAK',
                        sortable: false,
                        halign: 'center',
                        align: 'center',
                        formatter: buttonCetak
                    },
                    {
                        field: 'no_kendaraan',
                        width: 90,
                        title: 'No Kendaraan',
                        sortable: false
                    },
                    {
                        field: 'no_uji',
                        title: 'No Uji',
                        width: 100,
                        sortable: false
                    },
                    {
                        field: 'nama_pemilik',
                        title: 'Nama Pemilik',
                        width: 150,
                        sortable: false
                    },
                    {
                        field: 'jenis_kendaraan',
                        title: 'Jenis Kendaraan',
                        width: 200,
                        sortable: false
                    },
                    {
                        field: 'kartu_uji',
                        title: 'Kartu Uji',
                        width: 80,
                        sortable: false
                    },
                    {
                        field: 'prauji',
                        width: 50,
                        title: 'Pra Uji',
                        sortable: false,
                        halign: 'center',
                        align: 'center'
                    },
                    {
                        field: 'emisi',
                        width: 50,
                        title: 'Emisi',
                        sortable: false,
                        halign: 'center',
                        align: 'center'
                    },
                    {
                        field: 'pitlift',
                        width: 50,
                        title: 'Pit Lift',
                        sortable: false,
                        halign: 'center',
                        align: 'center'
                    },
                    {
                        field: 'lampu',
                        width: 50,
                        title: 'Lampu',
                        sortable: false,
                        halign: 'center',
                        align: 'center'
                    },
                    {
                        field: 'rem',
                        width: 50,
                        title: 'Brake',
                        sortable: false,
                        halign: 'center',
                        align: 'center'
                    },
                    {
                        field: 'nm_penguji',
                        width: 150,
                        title: 'Penguji',
                        sortable: false,
                        halign: 'center'
                    },
                    {
                        field: 'catatan',
                        width: 250,
                        title: 'Catatan',
                        sortable: false,
                        halign: 'center'
                    }
                ]
            ],
            onBeforeLoad: function(params) {
                params.tanggal = $('#tgl_search').val();
                params.chooseKelulusan = $('#choose_kelulusan :selected').val();
                params.chooseCetak = $('#choose_cetak :selected').val();
                params.textCategory = $('#text_category').val();
            },
            onLoadError: function() {
                return false;
            },
            onLoadSuccess: function() {}
        });

        $(document).ready(function() {
            $('#dlg_no_surat').dialog('close');
            $('#dlg_cetak_hasil').dialog('close');
            $('#dlg_cetak_tl_dimensi').dialog('close');
            $('#dlg_lulus_sementara').dialog('close');
            $('#tgl_search').datepicker({
                endDate: "today",
                format: 'dd-M-yyyy',
                daysOfWeekDisabled: [0, 6],
                autoclose: true,
            }).on('changeDate', prosesSearch);
        });

        $(document).on("keypress", '#text_category', function(e) {
            var code = e.keyCode || e.which;
            if (code == 13) {
                prosesSearch();
                return false;
            }
        });

        $("#dlg_cetak_hasil").keydown(function(event) {
            if (event.keyCode == 13) {
                $(this).parent()
                    .find("#button_print_lulus").trigger("click");
                return false;
            }
        });

        function bandingPraujiButton(value) {
            var button;
            var urlact = '<?php echo $this->createUrl('Printhasil/ProsesBandingPrauji'); ?>';
            button = '<button type="button" data-toggle="tooltip" title="Banding" class="btn btn-danger" onclick="buttonBanding(' + value + ', \'' + urlact + '\')"><span class="glyphicon glyphicon-random"></span></button>';
            return button;
        }

        function bandingPengukuranButton(value) {
            var button;
            var urlact = '<?php echo $this->createUrl('Printhasil/ProsesBandingPengukuran'); ?>';
            button = '<button type="button" data-toggle="tooltip" title="Banding" class="btn btn-danger" onclick="buttonBanding(' + value + ', \'' + urlact + '\')"><span class="glyphicon glyphicon-random"></span></button>';
            return button;
        }

        function prosesSearch() {
            $('#statusProsesListGrid').datagrid('reload');
        }

        function buttonBanding(value, urlAct) {
            $.messager.confirm('Confirm', 'Apakah anda yakin ingin banding?', function(r) {
                if (r) {
                    $.ajax({
                        type: 'POST',
                        url: urlAct,
                        data: {
                            id_hasil_uji: value
                        },
                        beforeSend: function() {
                            showlargeloader();
                        },
                        success: function(data) {
                            $('#statusProsesListGrid').datagrid('reload');
                            hidelargeloader();
                        },
                        error: function() {
                            $('#statusProsesListGrid').datagrid('reload');
                            hidelargeloader();
                            return false;
                        }
                    });
                }
            });
        }

        function buttonCetak(value) {
            var button;
            var explode = value.split('|');
            var ltl = explode[0];
            var id = explode[1];
            var noSurat = explode[2];
            var url = '';
            if (ltl == 'l') {
                url = '<?php echo $this->createUrl('Printhasil/CetakLulus'); ?>';
                button = '<button class="btn btn-success" type="button" onclick="buttonDialogPosisi(\'' + id + '\')"><span class="glyphicon glyphicon-duplicate"></span></button>';
            } else if (ltl == 'tl') {
                url = '<?php echo $this->createUrl('Printhasil/CetakTidakLulus'); ?>';
                button = '<button class="btn btn-danger" type="button" onclick="buttonDialogNoSurat(\'' + url + '\', \'' + id + '\', \'' + noSurat + '\')"><span class="glyphicon glyphicon-duplicate"></span></button>';
            } else {
                button = "<button class='btn btn-default' type='button' disabled='disabled'><span class='glyphicon glyphicon-duplicate'></span></button>";
            }
            return button;
        }

        // PROSES CETAK LULUS SEMENTARA
        function buttonCetakSementara(value) {
            var button;
            var explode = value.split('|');
            var ltl = explode[0];
            var id = explode[1];
            var url = '';
            if (ltl == 'l') {
                url = '<?php echo $this->createUrl('Printhasil/CetakLulusSementara'); ?>';
                button = '<button class="btn btn-success" type="button" onclick="buttonDialogNoSuratSementara(\'' + url + '\', \'' + id + '\')"><span class="glyphicon glyphicon-duplicate"></span></button>';
            } else {
                button = "<button class='btn btn-default' type='button' disabled='disabled'><span class='glyphicon glyphicon-duplicate'></span></button>";
            }
            return button;
        }

        function buttonDialogNoSuratSementara(urlAct, id) {
            $('#dialog_sementara_id').val(id);
            $('#dialog_sementara_url').val(urlAct);
            $('#dlg_lulus_sementara').dialog('open');
        }

        function cetakLulusSementara() {
            var no_surat = '';
            var penguji = $("#choose_penguji_sementara option:selected").val();
            var catatan = $('#catatan_lulus_sementara').val();
            var id = $('#dialog_sementara_id').val();
            var url = $('#dialog_sementara_url').val();
            $.ajax({
                url: '<?php echo $this->createUrl('Printhasil/SaveCetakLulusSementara'); ?>',
                type: 'POST',
                data: {
                    no_surat: no_surat,
                    penguji: penguji,
                    id: id,
                    catatan: catatan
                },
                success: function(data) {
                    $('#dlg_lulus_sementara').dialog('close');
                    prosesSearch();
                    prosesCetakLulusSementara(url, id, no_surat, penguji);
                },
                error: function(data) {
                    $('#dlg_lulus_sementara').dialog('close');
                    prosesSearch();
                    return false;
                }
            });
        }

        function prosesCetakLulusSementara(url, id, no_surat, penguji) {
            var win = window.open(url + "?id=" + id + "&nosurat=" + no_surat + "&nrp=" + penguji, '_blank');
            win.focus();
        }

        // PROSES CETAK LULUS
        function buttonDialogPosisi(id) {
            $('#dialog_lulus_id').val(id);
            //        $('#dialog_lulus_url').val(urlAct);
            $('#dlg_cetak_hasil').dialog({
                open: function() {
                    $(document).on("keypress", '#button_print_lulus', function(e) {
                        var code = e.keyCode || e.which;
                        if (code == 13) {
                            cetakLulus();
                            return false;
                        }
                    });
                }
            });
            $('#dlg_cetak_hasil').dialog('center');
        }

        function submitLulus() {
            var no_seri_kartu = $("#no_seri_kartu").val();
            var posisi = $("#choose_posisi option:selected").val();
            var penguji = $("#choose_lulus_penguji option:selected").val();
            var id = $('#dialog_lulus_id').val();
            var url = $('#dialog_lulus_url').val();
            $.ajax({
                url: '<?php echo $this->createUrl('Printhasil/SaveCetakLulus'); ?>',
                type: 'POST',
                data: {
                    posisi: posisi,
                    penguji: penguji,
                    id: id,
                    no_seri_kartu: no_seri_kartu
                },
                success: function(data) {
                    $('#dlg_cetak_hasil').dialog('close');
                    prosesSearch();
                },
                error: function(data) {
                    $('#dlg_cetak_hasil').dialog('close');
                    prosesSearch();
                    return false;
                }
            });
        }

        function cetakLulus() {
            var posisi = $("#choose_posisi option:selected").val();
            var penguji = $("#choose_lulus_penguji option:selected").val();
            var id = $('#dialog_lulus_id').val();
            var urlAct = '<?php echo $this->createUrl('Printhasil/SaveCetakLulus'); ?>';
            $.ajax({
                url: urlAct,
                type: 'POST',
                data: {
                    posisi: posisi,
                    penguji: penguji,
                    id: id
                },
                success: function(data) {
                    $('#dlg_cetak_hasil').dialog('close');
                    prosesSearch();
                    prosesCetakLulus(urlAct, id, posisi, penguji);
                },
                error: function(data) {
                    $('#dlg_cetak_hasil').dialog('close');
                    prosesSearch();
                    return false;
                }
            });
        }

        function prosesCetakLulus(urlAct, id, posisi, penguji) {
            var win = window.open(urlAct + "?id=" + id + "&posisi=" + posisi + "&nrp=" + penguji, '_blank');
            win.focus();
        }

        // PROSES CETAK TIDAK LULUS
        function buttonDialogNoSurat(urlAct, id, noSurat) {
            $('#dialog_id').val(id);
            $('#dialog_url').val(urlAct);
            $('#dialog_no_surat').val(noSurat);
            $('#dlg_no_surat').dialog('open');
        }

        function cetakTidakLulus() {
            var no_surat = '';
            var penguji = $("#choose_penguji option:selected").val();
            var id = $('#dialog_id').val();
            var url = $('#dialog_url').val();
            $.ajax({
                url: '<?php echo $this->createUrl('Printhasil/SaveCetakTidakLulus'); ?>',
                type: 'POST',
                data: {
                    penguji: penguji,
                    id: id
                },
                success: function(data) {
                    $('#dlg_no_surat').dialog('close');
                    prosesSearch();
                    prosesCetakTidakLulus(url, id, no_surat, penguji);
                },
                error: function(data) {
                    $('#dlg_no_surat').dialog('close');
                    prosesSearch();
                    return false;
                }
            });
        }

        function prosesCetakTidakLulus(url, id, no_surat, penguji) {
            var win = window.open(url + "?id=" + id + "&nosurat=" + no_surat + "&nrp=" + penguji, '_blank');
            win.focus();
        }
    </script>