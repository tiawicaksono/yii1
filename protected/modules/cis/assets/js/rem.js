$(document).ready(function () {
    $('#bsb1').numeric({decimal: false, negative: false});
    $('#bsb2').numeric({decimal: false, negative: false});
    $('#bsb3').numeric({decimal: false, negative: false});
    $('#bsb4').numeric({decimal: false, negative: false});
    $('#bsel1').numeric({decimal: false, negative: false});
    $('#bsel2').numeric({decimal: false, negative: false});
    $('#bsel3').numeric({decimal: false, negative: false});
    $('#bsel4').numeric({decimal: false, negative: false});
});

function prosesSearchRem() {
//    $('#remListGrid').datagrid('reload');
    $('#remListGrid').datagrid({
        url: 'Rem/ListGrid',
        onBeforeLoad: function (params) {
            params.textCategory = $('#text_category_rem').val();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
}

function getInformationRem() {
    var row = $("#remListGrid").datagrid('getSelected');
    var no_kendaraan = row.no_kendaraan;
    var no_uji = row.no_uji;
    var id_hasil_uji = row.id_hasil_uji;
    var posisi = row.posisi;
    var no_antrian = row.numerator_hari;
    var tipe = row.id_jns_kend;

    var sumbu1 = row.bsumbu1;
    var sumbu2 = row.bsumbu2;
    var sumbu3 = row.bsumbu3;
    var sumbu4 = row.bsumbu4;
    $('#no_kendaraan_rem').val(no_kendaraan);
    $('#posisi_cis_rem').val(posisi);
    $('#no_uji_rem').val(no_uji);
    $('#id_hasil_uji_rem').val(id_hasil_uji);
    $('#no_antrian_rem').val(no_antrian);
    
    $("#bsb1").prop("readonly", false);
    $("#bsb1").css("background-color", "#fff");
    $("#bsel1").prop("readonly", false);
    $("#bsel1").css("background-color", "#fff");
    $("#bsb2").prop("readonly", false);
    $("#bsb2").css("background-color", "#fff");
    $("#bsel2").prop("readonly", false);
    $("#bsel2").css("background-color", "#fff");
    $("#bsb3").prop("readonly", false);
    $("#bsb3").css("background-color", "#fff");
    $("#bsel3").prop("readonly", false);
    $("#bsel3").css("background-color", "#fff");
    $("#bsb4").prop("readonly", false);
    $("#bsb4").css("background-color", "#fff");
    $("#bsel4").prop("readonly", false);
    $("#bsel4").css("background-color", "#fff");
    if (tipe == 5) {
        $("#bsb1").prop("readonly", true);
        $("#bsb1").css("background-color", "#eaeae1");
        $("#bsel1").prop("readonly", true);
        $("#bsel1").css("background-color", "#eaeae1");

        if (sumbu2 == '0' || sumbu2 == '') {
            $("#bsb2").prop("readonly", true);
            $("#bsb2").css("background-color", "#eaeae1");
            $("#bsel2").prop("readonly", true);
            $("#bsel2").css("background-color", "#eaeae1");
        }
        if (sumbu3 == '0' || sumbu3 == '') {
            $("#bsb3").prop("readonly", true);
            $("#bsb3").css("background-color", "#eaeae1");
            $("#bsel3").prop("readonly", true);
            $("#bsel3").css("background-color", "#eaeae1");
        }
        if (sumbu4 == '0' || sumbu4 == '') {
            $("#bsb4").prop("readonly", true);
            $("#bsb4").css("background-color", "#eaeae1");
            $("#bsel4").prop("readonly", true);
            $("#bsel4").css("background-color", "#eaeae1");
        }
    } else {
        $("#bsb1").prop("readonly", false);
        $("#bsb1").css("background-color", "#fff");
        $("#bsel1").prop("readonly", false);
        $("#bsel1").css("background-color", "#fff");

        if (sumbu1 == '0' || sumbu1 == '') {
            $("#bsb1").prop("readonly", true);
            $("#bsb1").css("background-color", "#eaeae1");
            $("#bsel1").prop("readonly", true);
            $("#bsel1").css("background-color", "#eaeae1");
        }
        if (sumbu2 == '0' || sumbu2 == '') {
            $("#bsb2").prop("readonly", true);
            $("#bsb2").css("background-color", "#eaeae1");
            $("#bsel2").prop("readonly", true);
            $("#bsel2").css("background-color", "#eaeae1");
        }
        if (sumbu3 == '0' || sumbu3 == '') {
            $("#bsb3").prop("readonly", true);
            $("#bsb3").css("background-color", "#eaeae1");
            $("#bsel3").prop("readonly", true);
            $("#bsel3").css("background-color", "#eaeae1");
        }
        if (sumbu4 == '0' || sumbu4 == '') {
            $("#bsb4").prop("readonly", true);
            $("#bsb4").css("background-color", "#eaeae1");
            $("#bsel4").prop("readonly", true);
            $("#bsel4").css("background-color", "#eaeae1");
        }
    }
}

function reloadDataRem(urlAct) {
    var tahun_kendaraan = $('#tahun_rem').val();
    var row = $("#remListGrid").datagrid('getSelected');
    var tipe = row.id_jns_kend;
    var sumbu1 = row.bsumbu1;
    var sumbu2 = row.bsumbu2;
    var sumbu3 = row.bsumbu3;
    var sumbu4 = row.bsumbu4;
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {tahun_kendaraan: tahun_kendaraan},
        dataType: "JSON",
        success: function (data) {
            if (tipe == 5) {
                $("#bsb1").prop("readonly", true);
                $("#bsb1").css("background-color", "#eaeae1");
                $("#bsel1").prop("readonly", true);
                $("#bsel1").css("background-color", "#eaeae1");

                if (sumbu2 == '0' || sumbu2 == '') {
                    $("#bsb2").prop("readonly", true);
                    $("#bsb2").css("background-color", "#eaeae1");
                    $("#bsel2").prop("readonly", true);
                    $("#bsel2").css("background-color", "#eaeae1");
                    $('#bsb2').val('');
                    $('#bsel2').val('');
                } else {
                    $('#bsb2').val(data.bsb2);
                    $('#bsel2').val(data.bsel2);
                }
                if (sumbu3 == '0' || sumbu3 == '') {
                    $("#bsb3").prop("readonly", true);
                    $("#bsb3").css("background-color", "#eaeae1");
                    $("#bsel3").prop("readonly", true);
                    $("#bsel3").css("background-color", "#eaeae1");
                    $('#bsb3').val('');
                    $('#bsel3').val('');
                } else {
                    $('#bsb3').val(data.bsb3);
                    $('#bsel3').val(data.bsel3);
                }
                if (sumbu4 == '0' || sumbu4 == '') {
                    $("#bsb4").prop("readonly", true);
                    $("#bsb4").css("background-color", "#eaeae1");
                    $("#bsel4").prop("readonly", true);
                    $("#bsel4").css("background-color", "#eaeae1");
                    $('#bsb4').val('');
                    $('#bsel4').val('');
                } else {
                    $('#bsb4').val(data.bsb4);
                    $('#bsel4').val(data.bsel4);
                }
            } else {
                $("#bsb1").prop("readonly", false);
                $("#bsb1").css("background-color", "#fff");
                $("#bsel1").prop("readonly", false);
                $("#bsel1").css("background-color", "#fff");

                if (sumbu1 == '0' || sumbu1 == '') {
                    $("#bsb1").prop("readonly", true);
                    $("#bsb1").css("background-color", "#eaeae1");
                    $("#bsel1").prop("readonly", true);
                    $("#bsel1").css("background-color", "#eaeae1");
                    $('#bsb1').val('');
                    $('#bsel1').val('');
                } else {
                    $('#bsb1').val(data.bsb1);
                    $('#bsel1').val(data.bsel1);
                }
                if (sumbu2 == '0' || sumbu2 == '') {
                    $("#bsb2").prop("readonly", true);
                    $("#bsb2").css("background-color", "#eaeae1");
                    $("#bsel2").prop("readonly", true);
                    $("#bsel2").css("background-color", "#eaeae1");
                    $('#bsb2').val('');
                    $('#bsel2').val('');
                } else {
                    $('#bsb2').val(data.bsb2);
                    $('#bsel2').val(data.bsel2);
                }
                if (sumbu3 == '0' || sumbu3 == '') {
                    $("#bsb3").prop("readonly", true);
                    $("#bsb3").css("background-color", "#eaeae1");
                    $("#bsel3").prop("readonly", true);
                    $("#bsel3").css("background-color", "#eaeae1");
                    $('#bsb3').val('');
                    $('#bsel3').val('');
                } else {
                    $('#bsb3').val(data.bsb3);
                    $('#bsel3').val(data.bsel3);
                }
                if (sumbu4 == '0' || sumbu4 == '') {
                    $("#bsb4").prop("readonly", true);
                    $("#bsb4").css("background-color", "#eaeae1");
                    $("#bsel4").prop("readonly", true);
                    $("#bsel4").css("background-color", "#eaeae1");
                    $('#bsb4').val('');
                    $('#bsel4').val('');
                } else {
                    $('#bsb4').val(data.bsb4);
                    $('#bsel4').val(data.bsel4);
                }
            }

//            $('#bsb1').val(data.bsb1);
//            $('#bsb2').val(data.bsb2);
//            $('#bsb3').val(data.bsb3);
//            $('#bsb4').val(data.bsb4);
//            $('#bsel1').val(data.bsel1);
//            $('#bsel2').val(data.bsel2);
//            $('#bsel3').val(data.bsel3);
//            $('#bsel4').val(data.bsel4);
        }
    });
}

function prosesRem(urlAct) {
    var id_hasil_uji = $('#id_hasil_uji_rem').val();
    var posisi = $('#posisi_cis_rem').val();
    var username = $('#username_rem').val();
    var kategori_rem = $('#text_category_rem').val();

    if (id_hasil_uji != '') {
        var kirim = '';
        var kode = new Array();
        if ($('#um21').is(':checked')) {
            kode[1] = 'UM21'
        } else {
            kode[1] = ''
        }
        if ($('#um22').is(':checked')) {
            kode[2] = 'UM22'
        } else {
            kode[2] = ''
        }
        if ($('#um23').is(':checked')) {
            kode[2] = 'UM23'
        } else {
            kode[2] = ''
        }
        if ($('#um24').is(':checked')) {
            kode[2] = 'UM24'
        } else {
            kode[2] = ''
        }
        if ($('#um33').is(':checked')) {
            kode[5] = 'UM33'
        } else {
            kode[5] = ''
        }
        //---------------------------------------------------
        kirim = $('#bsb1').val() + ',' + $('#bsb2').val() + ',' + $('#bsb3').val() + ',' + $('#bsb4').val() + ',' +
                $('#bsel1').val() + ',' + $('#bsel2').val() + ',' + $('#bsel3').val() + ',' + $('#bsel4').val();
        kirim = kirim + ',' + kode;
        $.messager.defaults.ok = 'Ya';
        $.messager.defaults.cancel = 'Tidak';
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin memproses kendaraan berikut?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: urlAct,
                    data: {variabel: kirim, id_hasil_uji: id_hasil_uji, cis: posisi, username: username, kategori_rem:kategori_rem},
                    success: function (data) {
                        $('#id_hasil_uji_rem').val('');
                        $('#no_kendaraan_rem').val('');
                        $('#no_uji_rem').val('');
                        $('#tahun_rem').val('');
                        $('#no_antrian_rem').val('');
                        prosesSearchRem();

                        $('#bsb1').val('');
                        $('#bsb2').val('');
                        $('#bsb3').val('');
                        $('#bsb4').val('');
                        $('#bsel1').val('');
                        $('#bsel2').val('');
                        $('#bsel3').val('');
                        $('#bsel4').val('');
                        $("#bsb1").prop("readonly", false);
                        $("#bsb1").css("background-color", "#fff");
                        $("#bsel1").prop("readonly", false);
                        $("#bsel1").css("background-color", "#fff");
                        $("#bsb2").prop("readonly", false);
                        $("#bsb2").css("background-color", "#fff");
                        $("#bsel2").prop("readonly", false);
                        $("#bsel2").css("background-color", "#fff");
                        $("#bsb3").prop("readonly", false);
                        $("#bsb3").css("background-color", "#fff");
                        $("#bsel3").prop("readonly", false);
                        $("#bsel3").css("background-color", "#fff");
                        $("#bsb4").prop("readonly", false);
                        $("#bsb4").css("background-color", "#fff");
                        $("#bsel4").prop("readonly", false);
                        $("#bsel4").css("background-color", "#fff");
                        $("#um21").iCheck('uncheck');
                        $("#um22").iCheck('uncheck');
                        $("#um23").iCheck('uncheck');
                        $("#um24").iCheck('uncheck');
                        $("#um33").iCheck('uncheck');
                    },
                    error: function () {
                        return false;
                    }
                });
            }
        });
    } else {
        alert('Data Kendaraan Belum Dipilih !');
    }
}