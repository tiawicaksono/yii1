function prosesValidChecked(urlAct, kondisi) {
    var rows = $('#validasiListGrid').datagrid('getChecked');
    var ids = [];
    for (var i = 0; i < rows.length; i++) {
        ids.push(rows[i].id_retribusi);
    }
    if (rows.length > 0) {
        $.ajax({
            type: 'POST',
            url: urlAct,
            data: {idArray: ids, kondisi: kondisi},
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                $('#validasiListGrid').datagrid('reload');
//            $.messager.alert('Info', 'process is successful ', 'info');
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
//        $.post(urlAct, {idArray: ids, kondisi: kondisi}, function (result) {
//            if (result.success) {
//                $('#validasiListGrid').datagrid('reload');
//            } else {
//                $('#validasiListGrid').datagrid('reload');
//                return false;
//            }
//        });
    } else {
        $.messager.alert('Warning', 'You must select at least one item!', 'error');
        return false;
    }
}

function prosesValid(urlAct, idRetribusi, kondisi) {
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {idRetribusi: idRetribusi, kondisi: kondisi},
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $('#validasiListGrid').datagrid('reload');
//            $.messager.alert('Info', 'process is successful ', 'info');
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}