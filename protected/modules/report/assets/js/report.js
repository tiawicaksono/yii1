$(document).ready(function () {
    $('#tgl_pilih_retribusi').datepicker({
        endDate: "today",
        format: 'dd-M-yy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    }).on('changeDate', showDataRetribusiKendaraanPerTgl);

//    $('#tgl_report_uji_pertama').datepicker({
//        format: 'dd-M-yy',
//        daysOfWeekDisabled: [0, 7],
//        autoclose: true,
//    }).on('changeDate', showTableUjiPertama);

    $('#bln_report_buku_uji').datepicker({
        format: "M-yy",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true,
    }).on('changeDate', showTableBukuUji);

    $('#bln_pilih_retribusi').datepicker({
        format: "M-yy",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true,
    }).on('changeDate', showDataRetribusiKendaraanPerBulan);
});
/**=====================================================================
 * REPORT KENDARAAN UJI PERTAMA
 * REPORT PEMAKAIAN BUKU UJI
 ======================================================================*/
function exportExcelReport(url) {
    window.location.href = url + "?" + $("#REPORT_FORM_SEARCH").serialize();
    return false;
}
function showTableUjiPertama() {
    showlargeloader();
    $("#reportListGrid").datagrid('reload', {
        success: function (data) {
            hidelargeloader();
        }
    });
}
function showTableBukuUji() {
    showlargeloader();
    var tanggal = $('#bln_report_buku_uji').val();
    $('#table_buku_uji').load('TableBukuUji', {
        tanggal: tanggal,
    }, function () {
        hidelargeloader();
    });
    $('#grafik_buku_uji').load('GrafikBukuUji', {
        tanggal: tanggal,
    }, function () {
        hidelargeloader();
    });
}

function showDataRetribusiKendaraanPerBulan() {
    var blnThn = $('#bln_pilih_retribusi').val();
    $.ajax({
        url: 'Retribusi/DataForHeaderBln',
        type: 'POST',
        data: {blnThn: blnThn},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            $('#divTotalRetribusiBln').html(data.totalRetribusi);
            $('#divTotalKendaraanBln').html(data.totalKendaraan);
            $('#data_kendaraan_per_bulan').load('Retribusi/DataKendaraanPerBulan', {
                blnThn: blnThn,
            }, function () {
                hidelargeloader();
            });
        },
        error: function (data) {
            hidelargeloader();
            return false;
        }
    });


}
//======================================================================

function showDataRetribusiKendaraanPerTgl() {
    var tanggal = $('#tgl_pilih_retribusi').val();
    $('.tanggal_pilihan').html(tanggal);

    $.ajax({
        url: 'Retribusi/DataForHeaderTgl',
        type: 'POST',
        data: {tanggal: tanggal},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            $('#divTotalRetribusiTgl').html(data.totalRetribusi);
            $('#divTotalKendaraanTgl').html(data.totalKendaraan);
            $("#pemeriksaanTglListGrid").datagrid('reload');
            $('#data_kendaraan').load('Retribusi/DataKendaraan', {
                tanggal: tanggal,
            }, function () {
                hidelargeloader();
            });
        },
        error: function (data) {
            hidelargeloader();
            return false;
        }
    });
}