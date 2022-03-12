/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $(".datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

    $('#contentTaxiSchedule').slimScroll({
        height: '400px',
//        railVisible: true,
//        alwaysVisible: true
    });

    $('.tgl_datepicker_datemask').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
    
    $('.tgl_ori').datepicker({
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    });

    $('.tgl_all').datepicker({
        format: 'dd-M-yyyy',
//        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    });

    $('.tgl_max_today').datepicker({
        endDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    });

    $('.tgl_start_today').datepicker({
        startDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    });

    $('[data-toggle="tooltip"]').tooltip();

});

function showlargeloader() {
    $("#overlay").css('display', 'block');
    $("#popup").css('display', 'block');
    $("#popup").fadeIn(500);
}

function hidelargeloader() {
    $("#overlay").fadeOut(500);
    $("#popup").fadeOut(500);
}

//function reloadDiv(idDiv, urlAction){
//    $('#'+idDiv).load(urlAction +  '#'+idDiv);
//}

function toggleFullScreen(elem) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
