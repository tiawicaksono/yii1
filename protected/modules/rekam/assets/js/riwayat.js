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

function prosesSearch(urlAct1, urlAct2) {
    $('#riwayatListGrid').datagrid({
        url: urlAct1,
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
            hidelargeloader();
//            if(data.id_kendaraan == 0){
//                $('#btn-kartu-induk').prop("disabled", true);
//            }else{
//                $('#btn-kartu-induk').prop("disabled", false);
//            }
//            $('#id_kendaraan_riwayat').val(data.id_kendaraan);
            return false;
        }
    });
    
    $('#riwayatTlListGrid').datagrid({
        url: urlAct2,
        onBeforeLoad: function (params) {
            params.selectCategory = $('#select_category :selected').val();
            params.textCategory = $('#text_category').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function (data) {}
    });
    $("#img_depan").attr('src', '');
    $("#img_belakang").attr('src', '');
    $("#img_kiri").attr('src', '');
    $("#img_kanan").attr('src', '');
}