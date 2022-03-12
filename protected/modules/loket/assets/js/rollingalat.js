/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function prosesRolling(urlAct,urlAct1,urlAct2) {
    var data = $("#FORMINPUT").serialize();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: data,
//        dataType: "json",
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            prosesRenderCis1(urlAct1);
            prosesRenderCis2(urlAct2);
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function prosesSwitch(urlAct, urlAct1, urlAct2, cis) {
    var data = $("#FORMINPUT").serialize();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: data + "&cis=" + cis,
//        dataType: "json",
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            prosesRenderCis1(urlAct1);
            prosesRenderCis2(urlAct2);
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function prosesRenderCis1(urlAct) {
    $.ajax({
        type: 'POST',
        url: urlAct,
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $('#table-cis1').html(data);
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}
function prosesRenderCis2(urlAct) {
    $.ajax({
        type: 'POST',
        url: urlAct,
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $('#table-cis2').html(data);
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function refreshRolling(urlAct1, urlAct2){
    prosesRenderCis1(urlAct1);
    prosesRenderCis2(urlAct2);
}

function prosesSwitchAll(urlAct, urlAct1, urlAct2) {
    $.ajax({
        type: 'POST',
        url: urlAct,
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            prosesRenderCis1(urlAct1);
            prosesRenderCis2(urlAct2);
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}