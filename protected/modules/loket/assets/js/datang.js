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
    $('#tgl_search').datepicker({
        endDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    }).on('changeDate', prosesSearch);
});

function prosesSearch() {
    $('#datangListGrid').datagrid('reload');
}

function prosesSearchKedatangan(val) {
    if (val == 'true') {
        $('#buttonDatangkan').hide();
        $('#buttonBelumDatangkan').show();
    } else {
        $('#buttonDatangkan').show();
        $('#buttonBelumDatangkan').hide();
    }
    prosesSearch();
}

function saveDatang(value) {
    $.ajax({
        type: 'POST',
        url: 'Kedatangan/ProsesDatang',
        data: {id: value},
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            prosesSearch();
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function saveBelumDatang(id_daftar) {
    $.ajax({
        type: 'POST',
        url: 'Kedatangan/ProsesBelumDatang',
        data: {id: id_daftar},
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            prosesSearch();
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function saveDatangChecked() {
    var rows = $('#datangListGrid').datagrid('getChecked');
    var ids = [];
    for (var i = 0; i < rows.length; i++) {
        ids.push(rows[i].id_campuran);
    }
    if (rows.length > 0) {
        $.ajax({
            type: 'POST',
            url: 'Kedatangan/ProsesDatangChecked',
            data: {idArray: ids},
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                prosesSearch();
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    } else {
        $.messager.alert('Warning', 'You must select at least one item!', 'error');
        return false;
    }
}

function buttonDialogDatangChecked() {
    var rows = $('#datangListGrid').datagrid('getChecked');
    var ids = [];
    for (var i = 0; i < rows.length; i++) {
        ids.push(rows[i].id_campuran);
    }
    if (rows.length > 0) {
        $('#idChecked').val(ids);
        $('#dlgChecked').dialog('open');
        $('#dlgChecked').dialog('center');
    } else {
        $.messager.alert('Warning', 'You must select at least one item!', 'error');
        return false;
    }
}

function buttonBelumDatangChecked() {
    var rows = $('#datangListGrid').datagrid('getChecked');
    var ids = [];
    for (var i = 0; i < rows.length; i++) {
        ids.push(rows[i].id_campuran);
    }
    if (rows.length > 0) {
        $.ajax({
            type: 'POST',
            url: 'Kedatangan/ProsesBelumDatangChecked',
            data: {idChecked: ids},
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                prosesSearch();
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    } else {
        $.messager.alert('Warning', 'You must select at least one item!', 'error');
        return false;
    }
}
