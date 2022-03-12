$(document).ready(function () {
    $('#dlg_edit_tgl_uji').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
    $('#dlg_add_tgl_uji').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
    closeDialog();
});

$(document).on("keypress", '#text_category', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        prosesSearch();
        return false;
    }
});

function prosesSearch() {
    $('#riwayatListGrid').datagrid({
        url: 'Riwayat/GetListDataRiwayat',
        onBeforeLoad: function (params) {
            params.selectCategory = $('#select_category :selected').val();
            params.textCategory = $('#text_category').val();
            showlargeloader();
        },
        onLoadError: function () {
            hidelargeloader();
            return false;
        },
        onLoadSuccess: function (data) {
            if (data.id_kendaraan == 0) {
                $('#add_riwayat').prop('disabled', true);
                $('#del_kendaraan').prop('disabled', true);
                $('#id_kendaraan').val(0);
            } else {
                $('#add_riwayat').prop('disabled', false);
                $('#del_kendaraan').prop('disabled', false);
                $('#id_kendaraan').val(data.id_kendaraan);
            }
            hidelargeloader();
            return false;
        }
    });
}

function closeDialog() {
    $('#dlgEditRiwayat').dialog('close');
    $('#dlgAddRiwayat').dialog('close');
}

function delRiwayat(urlAct, value) {
    $.messager.confirm('Confirm', 'Apakah anda yakin ingin hapus?', function (r) {
        if (r) {
            $.ajax({
                type: 'POST',
                url: urlAct,
                data: {id_riwayat: value},
                beforeSend: function () {
                    showlargeloader();
                },
                success: function (data) {
                    $('#riwayatListGrid').datagrid('reload');
                    hidelargeloader();
                },
                error: function () {
                    $('#riwayatListGrid').datagrid('reload');
                    hidelargeloader();
                    return false;
                }
            });
        }
    });
}

function addRiwayat() {
    $('#dlgAddRiwayat').dialog('open');
}

function editRiwayat(urlAct, value) {
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {id: value},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $('#dlgEditRiwayat').dialog('open');
            $('#dlg_edit_id_riwayat').val(value);
            $('#dlg_edit_id_hasil_uji').val(data.id_hasil_uji);
            $('#dlg_edit_tempat').val(data.tempat);
            $('#dlg_edit_nrp').val(data.nrp);
            $('#dlg_edit_nrp').selectpicker('refresh');
            $('#dlg_edit_catatan').val(data.catatan);
            $('#dlg_edit_tgl_uji').datepicker('setDate', data.tgl_uji);
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function updateRiwayat() {
    var dlg_edit_id_riwayat = $('#dlg_edit_id_riwayat').val();
    var dlg_edit_id_hasil_uji = $('#dlg_edit_id_hasil_uji').val();
    var dlg_edit_tempat = $('#dlg_edit_tempat').val();
    var dlg_edit_nrp = $('#dlg_edit_nrp').val();
    var dlg_edit_tgl_uji = $('#dlg_edit_tgl_uji').val();
    var dlg_edit_catatan = $('#dlg_edit_catatan').val();
    $.ajax({
        type: 'POST',
        url: 'Riwayat/ProsesUpdateRiwayat',
        data: {id_riwayat: dlg_edit_id_riwayat, id_hasil_uji: dlg_edit_id_hasil_uji, tempat: dlg_edit_tempat, nrp: dlg_edit_nrp, tgl_uji: dlg_edit_tgl_uji, catatan: dlg_edit_catatan},
        beforeSend: function () {
            showlargeloader();
        },
        success: function () {
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

function insertRiwayat() {
    var dlg_add_tempat = $('#dlg_add_tempat').val();
    var dlg_add_nrp = $('#dlg_add_nrp').val();
    var dlg_add_tgl_uji = $('#dlg_add_tgl_uji').val();
    var dlg_add_catatan = $('#dlg_add_catatan').val();
    var id_kendaraan = $('#id_kendaraan').val();
    $.ajax({
        type: 'POST',
        url: 'Riwayat/ProsesInsertRiwayat',
        data: {tempat: dlg_add_tempat, nrp: dlg_add_nrp, tgl_uji: dlg_add_tgl_uji, catatan: dlg_add_catatan, id_kendaraan: id_kendaraan},
        beforeSend: function () {
            showlargeloader();
        },
        success: function () {
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

function delKendaraan() {
    var idKendaraan = $('#id_kendaraan').val();
    $.messager.confirm('Confirm', 'Apakah anda yakin ingin hapus kendaraan?', function (r) {
        if (r) {
            $.ajax({
                type: 'POST',
                url: 'Riwayat/ProsesDeleteKendaraan',
                data: {id_kendaraan: idKendaraan},
                beforeSend: function () {
                    showlargeloader();
                },
                success: function (data) {
                    $('#riwayatListGrid').datagrid('reload');
                    $('#id_kendaraan').val(0);
                    $('#text_category').val('');
                    hidelargeloader();
                },
                error: function () {
                    hidelargeloader();
                    return false;
                }
            });
        }
    });
}