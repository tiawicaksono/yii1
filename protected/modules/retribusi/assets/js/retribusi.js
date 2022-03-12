$(document).ready(function () {
    $('#FORM_TGL_PENGUJIAN').datepicker({
        startDate: "today",
        format: 'dd/mm/yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    });
    $('#FORM_TGL_MATI_UJI').datepicker({
        format: 'dd/mm/yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    });
    $('#FORM_NO_STUK').focus();
    $('#FORM_JBB').numeric({decimal: false, negative: false});
});

function dateChanged() {
    var tanggal_pengujian = $("#FORM_TGL_PENGUJIAN").val();
    $.ajax({
        url: 'retribusi/PenjumlahanTanggal',
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

function showHideDikuasakan() {
    var dikuasakan = $('#FORM_DIKUASAKAN option:selected').val();
    if (dikuasakan == 'true') {
        $('fieldset').show();
    } else {
        $('fieldset').hide();
    }
}

$('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
})

function selectPengurus(value) {
    if (value == '') {
        $('#div_nama_baru').show();
    } else {
        $('#div_nama_baru').hide();
    }
    $.ajax({
        url: 'retribusi/Default/DetailPengurus',
        type: 'POST',
        data: {id_pengurus: value},
        dataType: 'JSON',
        success: function (data) {
            $("#FORM_NO_KTP_DIKUASAKAN").val(data.no_ktp);
            $("#FORM_ALAMAT_DIKUASAKAN").val(data.alamat);
        },
        error: function (data) {
            return false;
        }
    });
}

//====REKOM dan PENDAFTARAN====
function prosesSearchDetailSb(urlAct, pilihan) {
    var no_sb;
    if(pilihan == 'sb'){
        no_sb = $("#FORM_NO_STUK").val();
    }else if(pilihan == 'no_kend'){
        no_sb = $("#FORM_NO_KENDARAAN").val();
    }else if(pilihan == 'no_mesin'){
        no_sb = $("#FORM_NO_MESIN").val();
    }else if(pilihan == 'no_chasis'){
        no_sb = $("#FORM_NO_CHASIS").val();
    }
//    var pilihan = $("#FORM_PILIH_PKB").val();
    $.ajax({
        url: urlAct,
        type: 'POST',
        data: {no_sb: no_sb, pilihan: pilihan},
        dataType: 'JSON',
        beforeSend: function () {
            $('#loading_stuk').show();
            $('#tidak_ada').hide();
        },
        success: function (data) {
            $('#loading_stuk').hide();
            if (data != 0) {
                $("#FORM_NO_STUK").val(data.no_uji);
                $("#FORM_ID_KENDARAAN").val(data.id_kendaraan);
                $("#FORM_JENIS_KENDARAAN").val(data.id_jns_kend);
                $("#FORM_NO_KENDARAAN").val(data.no_kendaraan);
                $("#FORM_NAMA_PEMILIK").val(data.nama_pemilik);
                $("#FORM_ALAMAT").val(data.alamat);
                $("#FORM_NO_KTP").val(data.no_identitas);
                $("#FORM_NO_TELP").val(data.no_telp);
                $("#FORM_NO_MESIN").val(data.no_mesin);
                $("#FORM_NO_CHASIS").val(data.no_chasis);
                $("#FORM_JBB").val(data.jbb);
                $("#pilih_jenis_pengenal").val(data.identitas);
                $('#FORM_TGL_MATI_UJI').datepicker('setDate', data.tgl_mati);
                $("#FORM_ID_KEND").val(data.id_kend);
            } else {
                $('#tidak_ada').show();
                $("#FORM_ID_KENDARAAN").val(0);
                $("#FORM_JENIS_KENDARAAN").val('');
                $("#FORM_ID_JENIS_KENDARAAN").val('');
                $("#FORM_NO_KENDARAAN").val('');
                $("#FORM_NAMA_PEMILIK").val('');
                $("#FORM_ALAMAT").val('');
                $("#FORM_NO_KTP").val('');
                $("#FORM_NO_TELP").val('');
                $("#FORM_NO_MESIN").val('');
                $("#FORM_NO_CHASIS").val('');
                $("#pilih_jenis_pengenal").val('KTP');
                $("#FORM_ID_KEND").val(0);
                $("#FORM_JBB").val(0);
            }
        },
        error: function (data) {
            $('#tidak_ada').hide();
            $('#loading_stuk').hide();
            return false;
        }
    });
}

function pilihKategori(urlAct) {
    var pilih = $('#pilih_kategori option:selected').val();
    if (pilih == '0') {
        $('#div_ganti_tgl_uji').hide();
        $('#kategori').hide();
    } else {
        if (pilih == 'tgluji') {
            $('#div_ganti_tgl_uji').show();
            $('#div_ganti_tgl_mati').hide();
            $('#kategori').hide();
            $('#div_replace').hide();
            $('#div_jbb').hide();
        } else if (pilih == 'denda') {
            $('#div_ganti_tgl_uji').hide();
            $('#div_ganti_tgl_mati').show();
            $('#kategori').hide();
            $('#div_replace').hide();
            $('#div_jbb').hide();
        } else if (pilih == 'replace') {
            $('#div_ganti_tgl_uji').hide();
            $('#div_ganti_tgl_mati').hide();
            $('#kategori').hide();
            $('#div_replace').show();
            $('#div_jbb').hide();
        } else if (pilih == 'jbb') {
            $('#div_ganti_tgl_uji').hide();
            $('#div_ganti_tgl_mati').hide();
            $('#kategori').hide();
            $('#div_replace').hide();
            $('#div_jbb').show();
        } else {
            $('#div_ganti_tgl_uji').hide();
            $('#div_ganti_tgl_mati').hide();
            $('#kategori').show();
            $('#div_replace').hide();
            $('#div_jbb').hide();
            $.ajax({
                url: urlAct,
                type: 'POST',
                data: {pilih: pilih},
                success: function (msg) {
                    $("#kategori").html(msg);
                },
            });
        }
    }
}
function submitForm(urlAct, idForm) {
    var no_sb = $("#FORM_ID_KENDARAAN").val();
    var jenis_uji = $("#FORM_JENIS_PENGUJIAN").val();
    if (jenis_uji != 14) {
        if (no_sb != '') {
            prosesSubmit(urlAct, idForm);
        } else {
            $.messager.alert('Warning', 'No Uji tidak dikenali', 'error');
            return false;
        }
    } else {
        prosesSubmit(urlAct, idForm);
    }
}

function prosesSubmit(urlAct, idForm) {
    var jenis_pengujian = $('#FORM_JENIS_PENGUJIAN option:selected').val();
//    var ganti_buku = $('#FORM_BUKU_UJI option:selected').val();
    $.ajax({
        url: urlAct,
        type: 'POST',
        data: $("#" + idForm).serialize(),
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            if (data.ada == 'true') {
                $("#" + idForm)[0].reset();
                $("#" + idForm).trigger("reset");
                $('fieldset').hide();
                $('#FORM_JENIS_PENGUJIAN').val(jenis_pengujian);                
                $('#FORM_BUKU_UJI1').iCheck('check');
                $('#FORM_BUKU_UJI1').iCheck('update');

                $('#FORM_BUKU_UJI2').iCheck('uncheck');
                $('#FORM_BUKU_UJI2').iCheck('update');

                $('#FORM_BUKU_UJI3').iCheck('uncheck');
                $('#FORM_BUKU_UJI3').iCheck('update');

                $('#FORM_BUKU_UJI4').iCheck('uncheck');
                $('#FORM_BUKU_UJI4').iCheck('update');
//                var ganti_buku = data.buku_uji;
//                if (ganti_buku == 1) {
//                    $('#FORM_BUKU_UJI_GANTI').iCheck('uncheck');
//                    $('#FORM_BUKU_UJI_GANTI').iCheck('update');
//
//                    $('#FORM_BUKU_UJI_TIDAK').iCheck('check');
//                    $('#FORM_BUKU_UJI_TIDAK').iCheck('update');
//                    
//                    $('#FORM_BUKU_UJI_RUSAK').iCheck('uncheck');
//                    $('#FORM_BUKU_UJI_RUSAK').iCheck('update');
//                    
//                    $('#FORM_BUKU_UJI_HILANG').iCheck('uncheck');
//                    $('#FORM_BUKU_UJI_HILANG').iCheck('update');
//                } else {
//                    $('#FORM_BUKU_UJI_GANTI').iCheck('check');
//                    $('#FORM_BUKU_UJI_GANTI').iCheck('update');
//
//                    $('#FORM_BUKU_UJI_TIDAK').iCheck('uncheck');
//                    $('#FORM_BUKU_UJI_TIDAK').iCheck('update');
//                    
//                    $('#FORM_BUKU_UJI_RUSAK').iCheck('uncheck');
//                    $('#FORM_BUKU_UJI_RUSAK').iCheck('update');
//                    
//                    $('#FORM_BUKU_UJI_HILANG').iCheck('uncheck');
//                    $('#FORM_BUKU_UJI_HILANG').iCheck('update');
//                }
                $('#FORM_DIKUASAKAN').val('true');
                $('fieldset').show();
                $('#FORM_BARU').val('');
                $('#FORM_NAMA_DIKUASAKAN').val(data.id_pengurus);
                $('#FORM_NAMA_DIKUASAKAN').selectpicker('refresh');
                $('#div_nama_baru').hide();
                $('#FORM_NO_KTP_DIKUASAKAN').val(data.no_ktp_dikuasakan);
                $('#FORM_ALAMAT_DIKUASAKAN').val(data.alamat_dikuasakan);
                $('#FORM_TGL_PENGUJIAN').datepicker('setDate', data.tgluji);
                $('#FORM_TGL_MATI_UJI').datepicker('setDate', data.tglmati);
                $('#FORM_ID_KENDARAAN').val('0');
                $('#FORM_NO_STUK').focus();
                $('#validasiListGrid').datagrid('reload');
            }else{
                $.messager.alert('Info', data.message, 'info');
            }
            return false;
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function buttonReset(idForm) {
    $('#FORM_ID_KENDARAAN').val(0);
    $("#" + idForm)[0].reset();
    $("#" + idForm).trigger("reset");
}