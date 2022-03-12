function prosesSearchPitlift() {
//    $('#pitliftListGrid').datagrid('reload');
    $('#pitliftListGrid').datagrid({
        url: 'Pitlift/ListGrid',
        onBeforeLoad: function (params) {
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
}

function getInformationPitlift() {
    var row = $("#pitliftListGrid").datagrid('getSelected');
    var no_kendaraan = row.no_kendaraan;
    var no_uji = row.no_uji;
    var id_hasil_uji = row.id_hasil_uji;
    var posisi = row.posisi;
    var no_antrian = row.numerator_hari;
    $('#no_kendaraan_pitlift').val(no_kendaraan);
    $('#posisi_cis_pitlift').val(posisi);
    $('#no_uji_pitlift').val(no_uji);
    $('#id_hasil_uji_pitlift').val(id_hasil_uji);
    $('#no_antrian_pitlift').val(no_antrian);
}

function reloadDataPitlift(urlAct) {
    var tahun_kendaraan = $('#tahun_pitlift').val();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {tahun_kendaraan: tahun_kendaraan},
        dataType: "JSON",
        success: function (data) {
            $('#kuat_kanan').val(data.lampu_kanan);
            $('#kuat_kiri').val(data.lampu_kiri);
            $('#deviasi_kanan').val(data.dev_kanan);
            $('#deviasi_kiri').val(data.dev_kiri);
        }
    });
}

function prosesPitlift(urlAct) {
    var id_hasil_uji = $('#id_hasil_uji_pitlift').val();
    var posisi = $('#posisi_cis_pitlift').val();
    var username = $('#username_pitlift').val();

    if (id_hasil_uji != '') {
        var kode = new Array();
        var kirim = '';
        if ($('#g1').is(':checked')) {
            kode[1] = 'G01';
        }
        if ($('#g2').is(':checked')) {
            kode[2] = 'G02';
        }
        if ($('#g3').is(':checked')) {
            kode[3] = 'G03';
        }
        if ($('#g4a').is(':checked')) {
            kode[4] = 'G04A';
        }
        if ($('#g4b').is(':checked')) {
            kode[5] = 'G04B';
        }
        
        if ($('#g6a1').is(':checked')) {
            kode[6] = 'G06A1';
        }
        if ($('#g6a2').is(':checked')) {
            kode[7] = 'G06A2';
        }
        if ($('#g6a3').is(':checked')) {
            kode[8] = 'G06A3';
        }
        if ($('#g6a4').is(':checked')) {
            kode[9] = 'G06A4';
        }
        if ($('#g6b1').is(':checked')) {
            kode[10] = 'G06B1';
        }
        if ($('#g6b2').is(':checked')) {
            kode[11] = 'G06B2';
        }
        if ($('#g6b3').is(':checked')) {
            kode[12] = 'G06B3';
        }
        if ($('#g6b4').is(':checked')) {
            kode[13] = 'G06B4';
        }
        
        if ($('#g6c1').is(':checked')) {
            kode[14] = 'G06C1';
        }
        if ($('#g6c2').is(':checked')) {
            kode[15] = 'G06C2';
        }
        if ($('#g6c3').is(':checked')) {
            kode[16] = 'G06C3';
        }
        if ($('#g6c4').is(':checked')) {
            kode[17] = 'G06C4';
        }
        if ($('#g6d1').is(':checked')) {
            kode[18] = 'G06D1';
        }
        if ($('#g6d2').is(':checked')) {
            kode[18] = 'G06D2';
        }
        if ($('#g6d3').is(':checked')) {
            kode[20] = 'G06D3';
        }
        if ($('#g6d4').is(':checked')) {
            kode[21] = 'G06D4';
        }
        
        
        if ($('#g7a1').is(':checked')) {
            kode[22] = 'G07A1';
        }
        if ($('#g7a2').is(':checked')) {
            kode[23] = 'G07A2';
        }
        if ($('#g7a3').is(':checked')) {
            kode[24] = 'G07A3';
        }
        if ($('#g7a4').is(':checked')) {
            kode[25] = 'G07A4';
        }
        if ($('#g7b1').is(':checked')) {
            kode[26] = 'G07B1';
        }
        if ($('#g7b2').is(':checked')) {
            kode[27] = 'G07B2';
        }
        if ($('#g7b3').is(':checked')) {
            kode[28] = 'G07B3';
        }
        if ($('#g7b4').is(':checked')) {
            kode[29] = 'G07B4';
        }
        
        if ($('#g7c1').is(':checked')) {
            kode[30] = 'G07C1';
        }
        if ($('#g7c2').is(':checked')) {
            kode[31] = 'G07C2';
        }
        if ($('#g7c3').is(':checked')) {
            kode[32] = 'G07C3';
        }
        if ($('#g7c4').is(':checked')) {
            kode[33] = 'G07C4';
        }
        if ($('#g7d1').is(':checked')) {
            kode[34] = 'G07D1';
        }
        if ($('#g7d2').is(':checked')) {
            kode[35] = 'G07D2';
        }
        if ($('#g7d3').is(':checked')) {
            kode[36] = 'G07D3';
        }
        if ($('#g7d4').is(':checked')) {
            kode[37] = 'G07D4';
        }
        
        if ($('#g7e1').is(':checked')) {
            kode[38] = 'G07E1';
        }
        if ($('#g7e2').is(':checked')) {
            kode[39] = 'G07E2';
        }
        if ($('#g7e3').is(':checked')) {
            kode[40] = 'G07E3';
        }
        if ($('#g7e4').is(':checked')) {
            kode[41] = 'G07E4';
        }
        if ($('#g7f1').is(':checked')) {
            kode[42] = 'G07F1';
        }
        if ($('#g7f2').is(':checked')) {
            kode[43] = 'G07F2';
        }
        if ($('#g7f3').is(':checked')) {
            kode[44] = 'G07F3';
        }
        if ($('#g7f4').is(':checked')) {
            kode[45] = 'G07F4';
        }
        
        if ($('#g7g1').is(':checked')) {
            kode[46] = 'G07G1';
        }
        if ($('#g7g2').is(':checked')) {
            kode[47] = 'G07G2';
        }
        if ($('#g7g3').is(':checked')) {
            kode[48] = 'G07G3';
        }
        if ($('#g7g4').is(':checked')) {
            kode[49] = 'G07G4';
        }
        if ($('#g7h1').is(':checked')) {
            kode[50] = 'G07H1';
        }
        if ($('#g7h2').is(':checked')) {
            kode[51] = 'G07H2';
        }
        if ($('#g7h3').is(':checked')) {
            kode[52] = 'G07H3';
        }
        if ($('#g7h4').is(':checked')) {
            kode[53] = 'G07H4';
        }
        
        if ($('#g8a1').is(':checked')) {
            kode[54] = 'G08A1';
        }
        if ($('#g8a2').is(':checked')) {
            kode[55] = 'G08A2';
        }
        if ($('#g8a3').is(':checked')) {
            kode[56] = 'G08A3';
        }
        if ($('#g8a4').is(':checked')) {
            kode[57] = 'G08A4';
        }
        if ($('#g8b1').is(':checked')) {
            kode[58] = 'G08B1';
        }
        if ($('#g8b2').is(':checked')) {
            kode[59] = 'G08B2';
        }
        if ($('#g8b3').is(':checked')) {
            kode[60] = 'G08B3';
        }
        if ($('#g8b4').is(':checked')) {
            kode[61] = 'G08B4';
        }
        
        if ($('#g9a1').is(':checked')) {
            kode[62] = 'G09A1';
        }
        if ($('#g9a2').is(':checked')) {
            kode[63] = 'G09A2';
        }
        if ($('#g9a3').is(':checked')) {
            kode[64] = 'G09A3';
        }
        if ($('#g9a4').is(':checked')) {
            kode[65] = 'G09A4';
        }
        if ($('#g9b1').is(':checked')) {
            kode[66] = 'G09B1';
        }
        if ($('#g9b2').is(':checked')) {
            kode[67] = 'G09B2';
        }
        if ($('#g9b3').is(':checked')) {
            kode[68] = 'G09B3';
        }
        if ($('#g9b4').is(':checked')) {
            kode[69] = 'G09B4';
        }
        
        if ($('#g10a1').is(':checked')) {
            kode[70] = 'G10A1';
        }
        if ($('#g10a2').is(':checked')) {
            kode[71] = 'G10A2';
        }
        if ($('#g10a3').is(':checked')) {
            kode[72] = 'G10A3';
        }
        if ($('#g10a4').is(':checked')) {
            kode[73] = 'G10A4';
        }
        if ($('#g10b1').is(':checked')) {
            kode[74] = 'G10B1';
        }
        if ($('#g10b2').is(':checked')) {
            kode[75] = 'G10B2';
        }
        if ($('#g10b3').is(':checked')) {
            kode[76] = 'G10B3';
        }
        if ($('#g10b4').is(':checked')) {
            kode[77] = 'G10B4';
        }
        
        if ($('#g11a1').is(':checked')) {
            kode[78] = 'G11A1';
        }
        if ($('#g11a2').is(':checked')) {
            kode[79] = 'G11A2';
        }
        if ($('#g11a3').is(':checked')) {
            kode[80] = 'G11A3';
        }
        if ($('#g11a4').is(':checked')) {
            kode[81] = 'G11A4';
        }
        if ($('#g11b1').is(':checked')) {
            kode[82] = 'G11B1';
        }
        if ($('#g11b2').is(':checked')) {
            kode[83] = 'G11B2';
        }
        if ($('#g11b3').is(':checked')) {
            kode[84] = 'G11B3';
        }
        if ($('#g11b4').is(':checked')) {
            kode[85] = 'G11B4';
        }
        
        if ($('#g11').is(':checked')) {
            kode[86] = 'G11';
        }
        if ($('#g12').is(':checked')) {
            kode[87] = 'G12';
        }
        if ($('#g13').is(':checked')) {
            kode[88] = 'G13';
        }
        if ($('#g14').is(':checked')) {
            kode[89] = 'G14';
        }
        if ($('#g15').is(':checked')) {
            kode[90] = 'G15';
        }
        if ($('#g17').is(':checked')) {
            kode[91] = 'G17';
        }
        if ($('#g18').is(':checked')) {
            kode[92] = 'G18';
        }
        if ($('#g19').is(':checked')) {
            kode[93] = 'G19';
        }
        if ($('#g20').is(':checked')) {
            kode[94] = 'G20';
        }
        if ($('#g21').is(':checked')) {
            kode[95] = 'G21';
        }
        if ($('#g22a').is(':checked')) {
            kode[96] = 'G22A';
        }
        if ($('#g22b').is(':checked')) {
            kode[97] = 'G22B';
        }
        if ($('#g23').is(':checked')) {
            kode[98] = 'G23';
        }
        if ($('#g24').is(':checked')) {
            kode[99] = 'G24';
        }
        if ($('#g25').is(':checked')) {
            kode[100] = 'G25';
        }
        if ($('#g26').is(':checked')) {
            kode[101] = 'G6';
        }
        if ($('#g27').is(':checked')) {
            kode[102] = 'G27';
        }
        if ($('#g28').is(':checked')) {
            kode[103] = 'G28';
        }
        if ($('#g29').is(':checked')) {
            kode[104] = 'G29';
        }
        if ($('#g30').is(':checked')) {
            kode[105] = 'G30';
        }
        if ($('#g31').is(':checked')) {
            kode[106] = 'G31';
        }
        if ($('#g32').is(':checked')) {
            kode[108] = 'G32';
        }
        if ($('#g33a').is(':checked')) {
            kode[109] = 'G33A';
        }
        if ($('#g33b').is(':checked')) {
            kode[110] = 'G33B';
        }
        if ($('#g33c').is(':checked')) {
            kode[111] = 'G33C';
        }
        if ($('#g33d').is(':checked')) {
            kode[112] = 'G33D';
        }
        if ($('#g34').is(':checked')) {
            kode[113] = 'G34';
        }
        if ($('#g35').is(':checked')) {
            kode[114] = 'G35';
        }
        if ($('#g36').is(':checked')) {
            kode[115] = 'G36';
        }
        if ($('#g37').is(':checked')) {
            kode[116] = 'G37';
        }
        //---------------------------------------------------------------------------
        
//        var rows = $('#pitliftLainListGrid').datagrid('getChecked');
//        var ids = [];
//        for (var i = 0; i < rows.length; i++) {
//            ids.push(rows[i].kd_lulus);
//        }
        
        for (i = 1; i < kode.length; i++) {
            if (kode[i] != null) {
                kirim = kirim + kode[i] + ',';
            }
        }
//        kirim = kirim + ids;
        $.messager.defaults.ok = 'Ya';
        $.messager.defaults.cancel = 'Tidak';
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin memproses kendaraan berikut?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: urlAct,
                    data: {variabel: kirim, id_hasil_uji: id_hasil_uji, cis: posisi, username: username},
                    success: function (data) {
                        $('#id_hasil_uji_pitlift').val('');
                        $('#no_kendaraan_pitlift').val('');
                        $('#no_uji_pitlift').val('');
                        $('#no_antrian_pitlift').val('');
                        
                        $('#g1').iCheck('uncheck');
                        $('#g2').iCheck('uncheck');
                        $('#g3').iCheck('uncheck');
                        $('#g4a').iCheck('uncheck');
                        $('#g4b').iCheck('uncheck');
                        $('#g6a1').iCheck('uncheck');
                        $('#g6a2').iCheck('uncheck');
                        $('#g6a3').iCheck('uncheck');
                        $('#g6a4').iCheck('uncheck');
                        $('#g6b1').iCheck('uncheck');
                        $('#g6b2').iCheck('uncheck');
                        $('#g6b3').iCheck('uncheck');
                        $('#g6b4').iCheck('uncheck');
                        $('#g6c1').iCheck('uncheck');
                        $('#g6c2').iCheck('uncheck');
                        $('#g6c3').iCheck('uncheck');        
                        $('#g6c4').iCheck('uncheck');
                        $('#g6d1').iCheck('uncheck');
                        $('#g6d2').iCheck('uncheck');
                        $('#g6d3').iCheck('uncheck');
                        $('#g6d4').iCheck('uncheck');
                        $('#g7a1').iCheck('uncheck');
                        $('#g7a2').iCheck('uncheck');
                        $('#g7a3').iCheck('uncheck');
                        $('#g7a4').iCheck('uncheck');
                        $('#g7b1').iCheck('uncheck');
                        $('#g7b2').iCheck('uncheck');
                        $('#g7b3').iCheck('uncheck');
                        $('#g7b4').iCheck('uncheck');
                        $('#g7c1').iCheck('uncheck');
                        $('#g7c2').iCheck('uncheck');
                        $('#g7c3').iCheck('uncheck');
                        $('#g7c4').iCheck('uncheck');
                        $('#g7d1').iCheck('uncheck');
                        $('#g7d2').iCheck('uncheck');
                        $('#g7d3').iCheck('uncheck');
                        $('#g7d4').iCheck('uncheck');
                        $('#g7e1').iCheck('uncheck');
                        $('#g7e2').iCheck('uncheck');
                        $('#g7e3').iCheck('uncheck');
                        $('#g7e4').iCheck('uncheck');
                        $('#g7f1').iCheck('uncheck');
                        $('#g7f2').iCheck('uncheck');
                        $('#g7f3').iCheck('uncheck');
                        $('#g7f4').iCheck('uncheck');
                        $('#g7g1').iCheck('uncheck');
                        $('#g7g2').iCheck('uncheck');
                        $('#g7g3').iCheck('uncheck');
                        $('#g7g4').iCheck('uncheck');
                        $('#g7h1').iCheck('uncheck');
                        $('#g7h2').iCheck('uncheck');
                        $('#g7h3').iCheck('uncheck');
                        $('#g7h4').iCheck('uncheck');
                        $('#g8a1').iCheck('uncheck');
                        $('#g8a2').iCheck('uncheck');
                        $('#g8a3').iCheck('uncheck');
                        $('#g8a4').iCheck('uncheck');
                        $('#g8b1').iCheck('uncheck');
                        $('#g8b2').iCheck('uncheck');
                        $('#g8b3').iCheck('uncheck');
                        $('#g8b4').iCheck('uncheck');
                        $('#g9a1').iCheck('uncheck');
                        $('#g9a2').iCheck('uncheck');
                        $('#g9a3').iCheck('uncheck');
                        $('#g9a4').iCheck('uncheck');
                        $('#g9b1').iCheck('uncheck');
                        $('#g9b2').iCheck('uncheck');
                        $('#g9b3').iCheck('uncheck');
                        $('#g9b4').iCheck('uncheck');
                        $('#g10a1').iCheck('uncheck');
                        $('#g10a2').iCheck('uncheck');
                        $('#g10a3').iCheck('uncheck');
                        $('#g10a4').iCheck('uncheck');
                        $('#g10b1').iCheck('uncheck');
                        $('#g10b2').iCheck('uncheck');
                        $('#g10b3').iCheck('uncheck');
                        $('#g10b4').iCheck('uncheck');
                        $('#g11a1').iCheck('uncheck');
                        $('#g11a2').iCheck('uncheck');
                        $('#g11a3').iCheck('uncheck');
                        $('#g11a4').iCheck('uncheck');
                        $('#g11b1').iCheck('uncheck');
                        $('#g11b2').iCheck('uncheck');
                        $('#g11b3').iCheck('uncheck');
                        $('#g11b4').iCheck('uncheck');
                        $('#g11').iCheck('uncheck');
                        $('#g12').iCheck('uncheck');
                        $('#g13').iCheck('uncheck');
                        $('#g14').iCheck('uncheck');
                        $('#g15').iCheck('uncheck');
                        $('#g17').iCheck('uncheck');
                        $('#g18').iCheck('uncheck');
                        $('#g19').iCheck('uncheck');
                        $('#g20').iCheck('uncheck');
                        $('#g21').iCheck('uncheck');
                        $('#g22a').iCheck('uncheck');
                        $('#g22b').iCheck('uncheck');
                        $('#g23').iCheck('uncheck');
                        $('#g24').iCheck('uncheck');
                        $('#g25').iCheck('uncheck');
                        $('#g26').iCheck('uncheck');
                        $('#g27').iCheck('uncheck');
                        $('#g28').iCheck('uncheck');
                        $('#g29').iCheck('uncheck');
                        $('#g30').iCheck('uncheck');
                        $('#g31').iCheck('uncheck');
                        $('#g32').iCheck('uncheck');
                        $('#g33a').iCheck('uncheck');
                        $('#g33b').iCheck('uncheck');
                        $('#g33c').iCheck('uncheck');
                        $('#g33d').iCheck('uncheck');
                        $('#g34').iCheck('uncheck');
                        $('#g35').iCheck('uncheck');
                        $('#g36').iCheck('uncheck');
                        $('#g37').iCheck('uncheck');

                        prosesSearchPitlift();
                        $('#pitliftLainListGrid').datagrid('reload');
                        prosesSearchLampu();
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