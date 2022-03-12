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

$(document).on("keypress", '#text_category_per_kendaraan', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        prosesSearchPerKendaraan();
        return false;
    }
});

$(document).ready(function () {
    closeDialog();
    closeDialogPerKendaraan();
    closeDialogDetailBuku();
    $('#dlg_cetak_hasil').dialog('close');
    $('#tgl_search').datepicker({
        endDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    }).on('changeDate', prosesSearch);
});

function closeDialog() {
    $('#dlg_no_seri').dialog('close');
}
function closeDialogPerKendaraan() {
    $('#dlg_no_seri_per_kendaraan').dialog('close');
}
function closeDialogDetailBuku() {
    $('#dlg_detail_buku').dialog('close');
}

function prosesSearch() {
    $('#bukuListGrid').datagrid('reload');
}

function prosesSearchPerKendaraan() {
    $('#bukuPerKendaraanListGrid').datagrid({
        url: 'Bukuuji/BukuPerKendaraanlistgrid',
        onBeforeLoad: function (params) {
            params.textCategory = $('#text_category_per_kendaraan').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
}

function printBukuUji(id_retribusi, no_seri, tgl_cetak) {
    $('#dlg_text_id_retribusi').val(id_retribusi);
    $('#dlg_text_no_seri').val(no_seri);
    $('#ganti_tgl_cetak').datepicker('setDate',tgl_cetak);
    $('#dlg_no_seri').dialog('open');
    $('#dlg_no_seri').dialog('center');
}

function printBukuUjiPerKendaraan(id_retribusi, no_seri, tgl_cetak) {
    $('#dlg_text_id_retribusi_per_kendaraan').val(id_retribusi);
    $('#dlg_text_no_seri_per_kendaraan').val(no_seri);
    $('#ganti_tgl_cetak_per_kendaraan').datepicker('setDate',tgl_cetak);
    $('#dlg_no_seri_per_kendaraan').dialog('open');
    $('#dlg_no_seri_per_kendaraan').dialog('center');
}

function printBukuUji2(id_retribusi, no_seri, tgl_cetak) {
    $('#dlg_text_id_retribusi').val(id_retribusi);
    $('#dlg_text_no_seri').val(no_seri);
    $('#ganti_tgl_cetak').datepicker('setDate',tgl_cetak);
    $('#dlg_no_seri').dialog('open');
    $('#dlg_no_seri').dialog('center');
}