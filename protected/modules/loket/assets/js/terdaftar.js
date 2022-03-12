/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    closeDialog();
    $('#tgl_search').datepicker({
//            startDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    }).on('changeDate', prosesSearch);

    $('#ganti_tgl_uji').datepicker({
        startDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    });
});

$(document).on("keypress", '#text_category', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        prosesSearch();
        return false;
    }
});

function prosesSearch() {
    $('#terdaftarListGrid').datagrid('reload');
}

function closeDialog() {
    $('#dlg').dialog('close');
}

function buttonEditTerdaftar(value) {
    $('#dlg_id_retribusi').val(value);
    $('#dlg').dialog('open');
    $('#dlg').dialog('center');
}