$(document).ready(function () {
    $('#tgl_pengajuan_rekom').datepicker({
        format: 'dd-M-yy',
        daysOfWeekDisabled: [0, 6],
        autoclose: true,
    }).on('changeDate', searchPengajuanRekom);
});


function searchPengajuanRekom() {
    $("#rekomMk").datagrid('reload');
    $("#rekomNk").datagrid('reload');
    $("#rekomUs").datagrid('reload');
}

function pilih_tahap_rekom(step, urlAct) {
    $(".step").removeClass('active');
    $("#" + step).addClass('active');
    showlargeloader();
    $('#mutasi_keluar').load(urlAct, {
        step: step,
        pilihan: 'mk'
    }, function () {
        hidelargeloader();
    });
    $('#numpang_keluar').load(urlAct, {
        step: step,
        pilihan: 'nk'
    }, function () {
        hidelargeloader();
    });
    $('#ubah_sifat').load(urlAct, {
        step: step,
        pilihan: 'us'
    }, function () {
        hidelargeloader();
    });
}
