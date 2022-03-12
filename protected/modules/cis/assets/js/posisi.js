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

function prosesSearch() {
    $('#pemeriksaanTglListGrid').datagrid('reload');
}

function buttonBanding(value, kategori) {
    $.messager.confirm('Confirm', 'Apakah anda yakin ingin banding ke ' + kategori + '?', function (r) {
        if (r) {
            var urlAct;
            if (kategori == 'prauji') {
                urlAct = 'Posisi/ProsesBandingPrauji';
            } else if (kategori == 'emisi') {
                urlAct = 'Posisi/ProsesBandingEmisi';
            } else if (kategori == 'pitlift') {
                urlAct = 'Posisi/ProsesBandingPitlift';
            } else if (kategori == 'lampu') {
                urlAct = 'Posisi/ProsesBandingLampu';
            } else if (kategori == 'rem') {
                urlAct = 'Posisi/ProsesBandingRem';
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