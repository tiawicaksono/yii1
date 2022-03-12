/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("keypress", '#text_category', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        prosesSearch();
        return false;
    }
});

$(document).ready(function () {
    closeDialog();
    $('#tgl_search').datepicker({
        endDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    }).on('changeDate', prosesSearch);
});

function closeDialog() {
    $('#dlg_cetak_hasil').dialog('close');
    $('#dlg_lulus_sementara').dialog('close');
}

function prosesSearch() {
    $('#pemeriksaanTglListGrid').datagrid('reload');
}

function buttonBanding(value, kategori) {
    $.messager.confirm('Confirm', 'Apakah anda yakin ingin banding ke ' + kategori + '?', function (r) {
        if (r) {
            var urlAct;
            if (kategori == 'prauji') {
                urlAct = 'Verifikasi/ProsesBandingPrauji';
            } else if (kategori == 'emisi') {
                urlAct = 'Verifikasi/ProsesBandingEmisi';
            } else if (kategori == 'pitlift') {
                urlAct = 'Verifikasi/ProsesBandingPitlift';
            } else if (kategori == 'lampu') {
                urlAct = 'Verifikasi/ProsesBandingLampu';
            } else if (kategori == 'rem') {
                urlAct = 'Verifikasi/ProsesBandingRem';
            }
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

function buttonDialogPosisi(urlAct, id, penguji) {
    $('#dialog_lulus_id').val(id);
    $('#dialog_lulus_url').val(urlAct);
    $('#dlg_cetak_hasil').dialog('open');
}

function cetakLulus() {
    var posisi = $("#choose_posisi option:selected").val();
    var penguji = $("#choose_lulus_penguji option:selected").val();
    var id = $('#dialog_lulus_id').val();
    var url = $('#dialog_lulus_url').val();
    $('#dlg_cetak_hasil').dialog('close');
    prosesSearch();
    var win = window.open(url + "?id=" + id + "&posisi=" + posisi + "&nrp=" + penguji, '_blank');
    win.focus();
}