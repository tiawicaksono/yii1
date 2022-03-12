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

function prosesSearch(urlAct) {
    $('#terdaftarListGrid').datagrid({
        url: urlAct,
        onBeforeLoad: function (params) {            
            params.textCategory = $('#text_category').val();
            showlargeloader();
        },
        onLoadError: function () {
            hidelargeloader();
            return false;
        },
        onLoadSuccess: function (data) {                       
            $('#id_kendaraan').val(data.id_kendaraan);
            hidelargeloader();
            return false;
        }
    });
    
}

