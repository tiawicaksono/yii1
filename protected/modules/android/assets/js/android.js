$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
//    $('.tgl-datepicker').datepicker({
//        format: 'dd-M-yy',
//        daysOfWeekDisabled: [0, 6],
//        autoclose: true
//    });
    $('#FORM_TGL_PENGUJIAN').datepicker({
        startDate: "today",
        format: 'dd-M-yy',
        daysOfWeekDisabled: [0, 6],
        autoclose: true,
    }).change(dateChanged).on('changeDate', dateChanged);
});


function viewImage(idKendaraan,pilihan) {
    $.ajax({
        url: 'android/Default/ViewImage',
        type: 'POST',
        data: {idKendaraan: idKendaraan, pilihan : pilihan},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $("#img1").attr('src', 'data:image/jpeg;base64,' + data.img1);
            $("#img2").attr('src', 'data:image/jpeg;base64,' + data.img2);
        },
        error: function (data) {
            hidelargeloader();
            return false;
        }
    });
}

function dateChanged(ev) {
    var tanggal_pengujian = $("#FORM_TGL_PENGUJIAN").val();
    $.ajax({
        url: 'Pendaftaran/PenjumlahanTanggal',
        type: 'POST',
        data: {tanggal_pengujian: tanggal_pengujian},
        dataType: 'JSON',
        success: function (data) {
            $("#FORM_TGL_MATI_UJI").val(data.tgl_mati_uji);
        },
        error: function (data) {
            return false;
        }
    });
}

function prosesSearchPemeriksaan(pkb) {
    $('#pemeriksaanListGrid' + pkb).datagrid('reload');
}
function prosesSearchRiwayat(pkb, urlact) {
    $('#riwayatListGrid' + pkb).datagrid({
        url: urlact + pkb,
        onBeforeLoad: function (params) {
            params.noUjiKendaraan = $('#noUjiKendaraanRiwayat' + pkb).val();
        },
        onLoadError: function () {
            return false;
        }
    });
}

function changeChoose(id1, id2, pilihan) {
    $("#kotak" + id1).removeClass('bg-gray').addClass('bg-blue');
    $("#kotak" + id2).removeClass('bg-blue').addClass('bg-gray');
    switch (pilihan) {
        case 'pendaftaran':
            $('#formPendaftaran')[0].reset();
            $('#tidak_ada').hide();
            $('#loading_stuk').hide();
            if (id1 == 'Wiyung') {
                $('.jenis_kendaraan_wiyung').show();
                $('.jenis_kendaraan_tandes').hide();
                $('#FORM_PILIH_PKB').val(1);
            } else {
                $('.jenis_kendaraan_wiyung').hide();
                $('.jenis_kendaraan_tandes').show();
                $('#FORM_PILIH_PKB').val(2);
            }
            break;
        case 'pengecekan':
            if (id1 == 'Wiyung') {
                $('#forTab1').load('Default/PemeriksaanWiyung');
                $('#forTab2').load('Default/RiwayatWiyung');
            } else {
                $('#forTab1').load('Default/PemeriksaanTandes');
                $('#forTab2').load('Default/RiwayatTandes');
            }
            break;
    }
}