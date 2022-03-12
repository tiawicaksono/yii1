/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).on("keypress", '#penguji_search', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        reloadListGrid('penguji');
        return false;
    }
});
$(document).on("keypress", '#user_search', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        reloadListGrid('user');
        return false;
    }
});
$(document).on("keypress", '#komersil_search', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        reloadListGrid('komersil');
        return false;
    }
});
$(document).on("keypress", '#karoseri_search', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        reloadListGrid('karoseri');
        return false;
    }
});
$(document).on("keypress", '#bahan_search', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        reloadListGrid('bahan');
        return false;
    }
});

function buttonDelete(id, itemname, urlAct) {
    $.messager.confirm('Delete Retribusi', 'Apakah anda yakin ingin delete?', function (r) {
        if (r) {
            $.ajax({
                type: 'POST',
                url: urlAct,
                data: {id: id, itemname: itemname},
                success: function (data) {
                    $('#userListGrid').datagrid('reload');
                },
                error: function () {
                    return false;
                }
            });
        }
    });
}

function buttonDeletePenguji(id, urlAct) {
    $.messager.confirm('Delete Retribusi', 'Apakah anda yakin ingin delete?', function (r) {
        if (r) {
            $.ajax({
                type: 'POST',
                url: urlAct,
                data: {id: id},
                success: function (data) {
                    $('#pengujiListGrid').datagrid('reload');
                },
                error: function () {
                    return false;
                }
            });
        }
    });
}


function buttonEdit(id, pilihan, urlAct) {
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {id: id},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            if (pilihan == 'user') {
                $('#id_user').val(data.id);
                $('#username').val(data.username);
				$('#password').val(data.password);
                $('#hak_akses').val(data.itemname);
            } else {
                if (pilihan == 'penguji') {
                    $('#nrp').val(data.nrp);
					if(data.status_penguji == true){
						$('#ttd').iCheck('check');
					}else{
						$('#ttd').iCheck('uncheck');
					}
                }
                $('#id_' + pilihan).val(data.id);
                $('#' + pilihan).val(data.nama);
            }
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function save(pilihan, urlAct, kondisi) {
    if (!$('#' + pilihan).val()) {
        $.messager.alert('Warning', 'Sorry, data can not be empty', 'error');
        return false;
    } else {
        var data = $("#forminput" + pilihan).serialize();
        $.ajax({
            type: 'POST',
            url: urlAct,
            data: data + '&kondisi=' + kondisi,
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
				$('#ttd').iCheck('uncheck');
                hidelargeloader();
                reloadListGrid(pilihan);
                $("#forminput" + pilihan)[0].reset();
                $("#forminput" + pilihan).trigger("reset");
                $('#id_' + pilihan).val('');
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    }
}

function saveUser(urlAct,kondisi) {
    if (!$('#username').val()) {
        $.messager.alert('Warning', 'Sorry, username can not be empty', 'error');
        return false;
    } else {
        var data = $("#forminputuser").serialize();
        $.ajax({
            type: 'POST',
            url: urlAct,
            data: data + '&kondisi=' + kondisi,
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                $('#userListGrid').datagrid('reload');
                $("#forminputuser")[0].reset();
                $("#forminputuser").trigger("reset");
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    }
}

function reloadListGrid(pilihan) {
    $('#' + pilihan + 'ListGrid').datagrid('reload');
}