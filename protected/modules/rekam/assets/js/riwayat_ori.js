/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    closeDialogKendaraan();
    closeDialogPengujian();
});

function closeDialogKendaraan() {
    $('#dlg').dialog('close');
}
function closeDialogPengujian() {
    $('#dlg_detail_pengujian').dialog('close');
}

function viewImage(idHasilUji, urlAct) {
    $.ajax({
        url: urlAct,
        type: 'POST',
        data: {idHasilUji: idHasilUji},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $("#img_depan").attr('src', 'data:image/jpeg;base64,' + data.img_depan);
            $("#img_belakang").attr('src', 'data:image/jpeg;base64,' + data.img_belakang);
            $("#img_kiri").attr('src', 'data:image/jpeg;base64,' + data.img_kiri);
            $("#img_kanan").attr('src', 'data:image/jpeg;base64,' + data.img_kanan);
        },
        error: function (data) {
            hidelargeloader();
            return false;
        }
    });
}

function viewKendaraan(value, urlAct) {
//    var value = $('#id_kendaraan_riwayat').val();
    $.ajax({
        url: urlAct,
        type: 'POST',
        data: {id_kendaraan: value},
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $('#dlg').dialog('open');
            $('#dlg').dialog('center');
            $('#div_kendaraan').html(data);
        },
        error: function (data) {
            hidelargeloader();
            return false;
        }
    });
}

function prosesSearch(urlAct) {
	$("#img_depan").attr('src', 'data:image/jpeg;base64,');
	$("#img_belakang").attr('src', 'data:image/jpeg;base64,');
	$("#img_kiri").attr('src', 'data:image/jpeg;base64,');
	$("#img_kanan").attr('src', 'data:image/jpeg;base64,');
    $('#riwayatListGrid').datagrid({
        url: urlAct,
        onBeforeLoad: function (params) {
            params.selectCategory = $('#select_category :selected').val();
            params.textCategory = $('#text_category').val();
            showlargeloader();
        },
        onLoadError: function () {
            hidelargeloader();
            return false;
        },
        onLoadSuccess: function () {
            hidelargeloader();
            return false;
        }
    });
}