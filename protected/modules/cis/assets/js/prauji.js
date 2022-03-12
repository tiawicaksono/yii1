function prosesSearchPrauji() {
    $('#praujiListGrid').datagrid('reload');
}

function clearSearchPrauji() {
    $('#text_search_prauji').val('');
    prosesSearchPrauji();
}

function getInformationPrauji() {
    var row = $("#praujiListGrid").datagrid('getSelected');
    var no_kendaraan = row.no_kendaraan;
    var no_uji = row.no_uji;
    var id_hasil_uji = row.id_hasil_uji;
    var no_antrian = row.numerator_hari;
    var id_kendaraan = row.id_kendaraan;
    captureCamera(id_hasil_uji);
    $('#no_kendaraan_prauji').val(no_kendaraan);
    $('#no_uji_prauji').val(no_uji);
    $('#id_hasil_uji_prauji').val(id_hasil_uji);
    $('#no_antrian_prauji').val(no_antrian);
}

function captureCamera(id_hasil_uji) {
    $.ajax({
        url: 'Prauji/SaveCapture',
        type: 'POST',
        data: {id_hasil_uji: id_hasil_uji},
        dataType: 'JSON',        
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $("#img_depan").attr('src', 'data:image/jpeg;base64,' + data.img_depan);
            $("#img_belakang").attr('src', 'data:image/jpeg;base64,' + data.img_belakang);
            $("#img_kanan").attr('src', 'data:image/jpeg;base64,' + data.img_kanan);
            $("#img_kiri").attr('src', 'data:image/jpeg;base64,' + data.img_kiri);
        },
        error: function () {
            alert('Gagal Capture');
            hidelargeloader();
            return false;
        }
    });
}

function prosesPrauji(urlAct) {
    var kode = new Array();
    var kirim = '';
    var aktifitas = '';
    var inken = new Array();
    var id_hasil_uji = $('#id_hasil_uji_prauji').val();
    var posisi = $('#posisi_cis_prauji').val();
    var username = $('#username_prauji').val();
    // alert($("#jnsbody").val());
    if (id_hasil_uji != '') {
        // A. IDENTITAS KENDARAAN
        if ($('#a1a').is(':checked')) {
            kode[1] = 'A01A';
        }
        if ($('#a1b').is(':checked')) {
            kode[2] = 'A01B';
        }
        if ($('#a1c').is(':checked')) {
            kode[3] = 'A01C';
        }
        if ($('#a2a').is(':checked')) {
            kode[4] = 'A02A';
        }
        if ($('#a2b').is(':checked')) {
            kode[5] = 'A02B';
        }
        if ($('#a2c').is(':checked')) {
            kode[6] = 'A02C';
        }
        if ($('#a3a').is(':checked')) {
            kode[7] = 'A03A';
        }
        if ($('#a3b').is(':checked')) {
            kode[8] = 'A03B';
        }
        if ($('#a3c').is(':checked')) {
            kode[9] = 'A03C';
        }
        if ($('#a4a').is(':checked')) {
            kode[10] = 'A04A';
        }
        if ($('#a4b').is(':checked')) {
            kode[11] = 'A04B';
        }
        if ($('#a4c').is(':checked')) {
            kode[12] = 'A04C';
        }
// B. SISTEM PENERANGAN
        if ($('#b1a').is(':checked')) {
            kode[13] = 'B01A';
        }
        if ($('#b1b').is(':checked')) {
            kode[14] = 'B01B';
        }
        if ($('#b1c').is(':checked')) {
            kode[15] = 'B01C';
        }
        if ($('#b1d').is(':checked')) {
            kode[16] = 'B01D';
        }
        if ($('#b2a').is(':checked')) {
            kode[17] = 'B02A';
        }
        if ($('#b2b').is(':checked')) {
            kode[18] = 'B02B';
        }
        if ($('#b2c').is(':checked')) {
            kode[19] = 'B02C';
        }
        if ($('#b2d').is(':checked')) {
            kode[20] = 'B02D';
        }
        if ($('#b3a').is(':checked')) {
            kode[21] = 'B03A';
        }
        if ($('#b3b').is(':checked')) {
            kode[22] = 'B03B';
        }
        if ($('#b3c').is(':checked')) {
            kode[23] = 'B03C';
        }
        if ($('#b3d').is(':checked')) {
            kode[24] = 'B03D';
        }
        if ($('#b4a').is(':checked')) {
            kode[25] = 'B04A';
        }
        if ($('#b4b').is(':checked')) {
            kode[26] = 'B04B';
        }
        if ($('#b5a').is(':checked')) {
            kode[27] = 'B05A';
        }
        if ($('#b5b').is(':checked')) {
            kode[28] = 'B05B';
        }
        if ($('#b6a').is(':checked')) {
            kode[29] = 'B06A';
        }
        if ($('#b6b').is(':checked')) {
            kode[30] = 'B06B';
        }
        if ($('#b6c').is(':checked')) {
            kode[31] = 'B06C';
        }
        if ($('#b6d').is(':checked')) {
            kode[32] = 'B06D';
        }
        if ($('#b7').is(':checked')) {
            kode[33] = 'B07';
        }
        if ($('#b8a').is(':checked')) {
            kode[34] = 'B08A';
        }
        if ($('#b8b').is(':checked')) {
            kode[35] = 'B08B';
        }

// C. RUMAH DAN BODY
        if ($('#c1a').is(':checked')) {
            kode[36] = 'C01A';
        }
        if ($('#c1b').is(':checked')) {
            kode[37] = 'C01B';
        }
        if ($('#c2').is(':checked')) {
            kode[38] = 'C02';
        }
        if ($('#c3').is(':checked')) {
            kode[39] = 'C03';
        }
        if ($('#c4').is(':checked')) {
            kode[40] = 'C04';
        }
        if ($('#c5').is(':checked')) {
            kode[41] = 'C05';
        }
        if ($('#c6').is(':checked')) {
            kode[42] = 'C06';
        }
        if ($('#c7a').is(':checked')) {
            kode[43] = 'C07A';
        }
        if ($('#c7b').is(':checked')) {
            kode[44] = 'C07B';
        }
        if ($('#c8a').is(':checked')) {
            kode[45] = 'C08A';
        }
        if ($('#c8b').is(':checked')) {
            kode[46] = 'C08B';
        }
        if ($('#c9').is(':checked')) {
            kode[47] = 'C09';
        }
        if ($('#c10').is(':checked')) {
            kode[48] = 'C10';
        }
        if ($('#c11a').is(':checked')) {
            kode[49] = 'C11A';
        }
        if ($('#c11b').is(':checked')) {
            kode[50] = 'C11B';
        }
        if ($('#c11c').is(':checked')) {
            kode[51] = 'C11C';
        }
        if ($('#c11d').is(':checked')) {
            kode[52] = 'C11D';
        }
        if ($('#c12').is(':checked')) {
            kode[53] = 'C12';
        }
        if ($('#c13').is(':checked')) {
            kode[54] = 'C13';
        }
        if ($('#c14').is(':checked')) {
            kode[55] = 'C14';
        }
        if ($('#c15a').is(':checked')) {
            kode[56] = 'C15A';
        }
        if ($('#c15b').is(':checked')) {
            kode[57] = 'C15B';
        }
        if ($('#c16a1').is(':checked')) {
            kode[58] = 'C16A1';
        }
        if ($('#c16a2').is(':checked')) {
            kode[59] = 'C16A2';
        }
        if ($('#c16a3').is(':checked')) {
            kode[60] = 'C16A3';
        }
        if ($('#c16a4').is(':checked')) {
            kode[61] = 'C16A4';
        }
        if ($('#c16b1').is(':checked')) {
            kode[62] = 'C16B1';
        }
        if ($('#c16b2').is(':checked')) {
            kode[63] = 'C16B2';
        }
        if ($('#c16b3').is(':checked')) {
            kode[64] = 'C16B3';
        }
        if ($('#c16b4').is(':checked')) {
            kode[65] = 'C16B4';
        }
        if ($('#c16c1').is(':checked')) {
            kode[66] = 'C16C1';
        }
        if ($('#c16c2').is(':checked')) {
            kode[67] = 'C16C2';
        }
        if ($('#c16c3').is(':checked')) {
            kode[68] = 'C16C3';
        }
        if ($('#c16c4').is(':checked')) {
            kode[69] = 'C16C4';
        }
// D. Roda - Roda
        if ($('#d1a').is(':checked')) {
            kode[70] = 'D01A';
        }
        if ($('#d1b').is(':checked')) {
            kode[71] = 'D01B';
        }
        if ($('#d1c').is(':checked')) {
            kode[72] = 'D01C';
        }
        if ($('#d1d').is(':checked')) {
            kode[73] = 'D01D';
        }
        if ($('#d1e').is(':checked')) {
            kode[74] = 'D01E';
        }
        if ($('#d1f').is(':checked')) {
            kode[75] = 'D01F';
        }
        if ($('#d1g').is(':checked')) {
            kode[76] = 'D01G';
        }
        if ($('#d1h').is(':checked')) {
            kode[77] = 'D01H';
        }
        if ($('#d2a').is(':checked')) {
            kode[78] = 'D02A';
        }
        if ($('#d2b').is(':checked')) {
            kode[79] = 'D02B';
        }
        if ($('#d2c').is(':checked')) {
            kode[80] = 'D02C';
        }
        if ($('#d2d').is(':checked')) {
            kode[81] = 'D02D';
        }
        if ($('#d2e').is(':checked')) {
            kode[82] = 'D02E';
        }
        if ($('#d2f').is(':checked')) {
            kode[83] = 'D02F';
        }
        if ($('#d2g').is(':checked')) {
            kode[84] = 'D02G';
        }
        if ($('#d2h').is(':checked')) {
            kode[85] = 'D02H';
        }
        if ($('#d3a').is(':checked')) {
            kode[86] = 'D03A';
        }
        if ($('#d3b').is(':checked')) {
            kode[87] = 'D03B';
        }
        if ($('#d3c').is(':checked')) {
            kode[88] = 'D03C';
        }
        if ($('#d3d').is(':checked')) {
            kode[89] = 'D03D';
        }
        if ($('#d3e').is(':checked')) {
            kode[90] = 'D03E';
        }
        if ($('#d3f').is(':checked')) {
            kode[91] = 'D03F';
        }
        if ($('#d3g').is(':checked')) {
            kode[92] = 'D03G';
        }
        if ($('#d3h').is(':checked')) {
            kode[93] = 'D03H';
        }
        if ($('#d4a').is(':checked')) {
            kode[94] = 'D04A';
        }
        if ($('#d4b').is(':checked')) {
            kode[95] = 'D04B';
        }
        if ($('#d4c').is(':checked')) {
            kode[96] = 'D04C';
        }
        if ($('#d4d').is(':checked')) {
            kode[97] = 'D04D';
        }
        if ($('#d4e').is(':checked')) {
            kode[98] = 'D04E';
        }
        if ($('#d4f').is(':checked')) {
            kode[99] = 'D04F';
        }
        if ($('#d4g').is(':checked')) {
            kode[100] = 'D04G';
        }
        if ($('#d4h').is(':checked')) {
            kode[101] = 'D04H';
        }
        if ($('#d5a').is(':checked')) {
            kode[102] = 'D05A';
        }
        if ($('#d5b').is(':checked')) {
            kode[103] = 'D05B';
        }
        if ($('#d5c').is(':checked')) {
            kode[104] = 'D05C';
        }
        if ($('#d5d').is(':checked')) {
            kode[105] = 'D05D';
        }
        if ($('#d5e').is(':checked')) {
            kode[106] = 'D05E';
        }
        if ($('#d5f').is(':checked')) {
            kode[107] = 'D05F';
        }
        if ($('#d5g').is(':checked')) {
            kode[108] = 'D05G';
        }
        if ($('#d5h').is(':checked')) {
            kode[109] = 'D05H';
        }
        if ($('#d6').is(':checked')) {
            kode[110] = 'D06';
        }
// E. Dimensi Kendaraan
        if ($('#e1a').is(':checked')) {
            kode[111] = 'E01A';
        }
        if ($('#e1b').is(':checked')) {
            kode[112] = 'E01B';
        }
        if ($('#e1c').is(':checked')) {
            kode[113] = 'E01C';
        }
        if ($('#e2a').is(':checked')) {
            kode[114] = 'E02A';
        }
        if ($('#e2b').is(':checked')) {
            kode[115] = 'E02B';
        }
        if ($('#e2c').is(':checked')) {
            kode[116] = 'E02C';
        }
        if ($('#e3a').is(':checked')) {
            kode[117] = 'E03A';
        }
        if ($('#e3b').is(':checked')) {
            kode[118] = 'E03B';
        }
        if ($('#e3c').is(':checked')) {
            kode[119] = 'E03C';
        }
        if ($('#e4a').is(':checked')) {
            kode[120] = 'E04A';
        }
        if ($('#e4b').is(':checked')) {
            kode[121] = 'E04B';
        }
        if ($('#e4c').is(':checked')) {
            kode[122] = 'E04C';
        }
        if ($('#e5').is(':checked')) {
            kode[123] = 'E05';
        }
        if ($('#e6').is(':checked')) {
            kode[124] = 'E06';
        }
        if ($('#e7').is(':checked')) {
            kode[125] = 'E07';
        }
        if ($('#e8').is(':checked')) {
            kode[126] = 'E08';
        }
        if ($('#e9').is(':checked')) {
            kode[127] = 'E09';
        }
// F. Peralatan
        if ($('#f1a').is(':checked')) {
            kode[128] = 'F01A';
        }
        if ($('#f1b').is(':checked')) {
            kode[129] = 'F01B';
        }
        if ($('#f1c').is(':checked')) {
            kode[130] = 'F01C';
        }
        if ($('#f1d').is(':checked')) {
            kode[131] = 'F01D';
        }
        if ($('#f2a').is(':checked')) {
            kode[132] = 'F02A';
        }
        if ($('#f2b').is(':checked')) {
            kode[133] = 'F02B';
        }
        if ($('#f2c').is(':checked')) {
            kode[134] = 'F02C';
        }
        if ($('#f2d').is(':checked')) {
            kode[135] = 'F02D';
        }
        if ($('#f3a').is(':checked')) {
            kode[136] = 'F03A';
        }
        if ($('#f3b').is(':checked')) {
            kode[137] = 'F03B';
        }
        if ($('#f3c').is(':checked')) {
            kode[138] = 'F03C';
        }
        if ($('#f3d').is(':checked')) {
            kode[139] = 'F03D';
        }
        if ($('#f4a').is(':checked')) {
            kode[140] = 'F04A';
        }
        if ($('#f4b').is(':checked')) {
            kode[141] = 'F04B';
        }
        if ($('#f5').is(':checked')) {
            kode[142] = 'F05';
        }
        if ($('#f6').is(':checked')) {
            kode[143] = 'F06';
        }
        if ($('#f7').is(':checked')) {
            kode[144] = 'F07';
        }
        if ($('#f8').is(':checked')) {
            kode[145] = 'F08';
        }
        if ($('#f9').is(':checked')) {
            kode[146] = 'F09';
        }
        if ($('#f10').is(':checked')) {
            kode[147] = 'F10';
        }
        if ($('#f11').is(':checked')) {
            kode[148] = 'F11';
        }
        if ($('#f12').is(':checked')) {
            kode[149] = 'F12';
        }
        if ($('#f13').is(':checked')) {
            kode[150] = 'F13';
        }
        if ($('#f14').is(':checked')) {
            kode[151] = 'F14';
        }
        if ($('#f15').is(':checked')) {
            kode[152] = 'F15';
        }
        if ($('#f16').is(':checked')) {
            kode[153] = 'F16';
        }
        if ($('#b9a').is(':checked')) {
            kode[154] = 'B09A';
        }
        if ($('#b9b').is(':checked')) {
            kode[155] = 'B09B';
        }
        if ($('#b10a').is(':checked')) {
            kode[156] = 'B10A';
        }
        if ($('#b10b').is(':checked')) {
            kode[157] = 'B10B';
        }
        if ($('#c17').is(':checked')) {
            kode[158] = 'C17';
        }
        if ($('#c18').is(':checked')) {
            kode[159] = 'C18';
        }
        
//----------------------------------------------------
        if ($('#c19').is(':checked')) {
            kode[160] = 'C19';
        }
        if ($('#d7').is(':checked')) {
            kode[161] = 'D07';
        }
        if ($('#d8').is(':checked')) {
            kode[162] = 'D08';
        }
        if ($('#d5').is(':checked')) {
            kode[163] = 'D05';
        }
//----------------------------------------------------
        inken[1] = 'C01A' + '~' + $('#c1ain').val();
        inken[2] = 'C03' + '~' + $('#c3in').val();
        inken[3] = 'C10' + '~' + $('#jnsbody').val();
        inken[4] = 'C13' + '~' + $('#jnsbahan').val();
        inken[5] = 'E01A' + '~' + $('#e1ain').val();
        inken[6] = 'E01B' + '~' + $('#e1bin').val();
        inken[7] = 'E01C' + '~' + $('#e1cin').val();
        inken[8] = 'E02A' + '~' + $('#e2ain').val();
        inken[9] = 'E02B' + '~' + $('#e2bin').val();
        inken[10] = 'E02C' + '~' + $('#e2cin').val();
        inken[11] = 'E03A' + '~' + $('#e3ain').val();
        inken[12] = 'E03B' + '~' + $('#e3bin').val();
        inken[13] = 'E03C' + '~' + $('#e3cin').val();
        inken[14] = 'E04A' + '~' + $('#e4ain').val();
        inken[15] = 'E04B' + '~' + $('#e4bin').val();
        inken[16] = 'E04C' + '~' + $('#e4cin').val();
        inken[17] = 'E05' + '~' + $('#e5in').val();
        inken[18] = 'E06' + '~' + $('#e6in').val();
        inken[19] = 'E07' + '~' + $('#e7in').val();
        inken[20] = 'E08' + '~' + $('#e8in').val();
        inken[21] = 'E09' + '~' + $('#e9in').val();
        // String yang harus dikirim sebagai variabel inputan					    
        for (i = 1; i < kode.length; i++) {
            if (kode[i] != null) {
                kirim = kirim + kode[i] + ',';
            }
        }
//        var rows = $('#praujiLainListGrid').datagrid('getChecked');
//        var ids = [];
//        for (var i = 0; i < rows.length; i++) {
//            ids.push(rows[i].kd_lulus);
//        }
//        aktifitas = 'Proses prauji dengan ipad dengan id hasil ' + selr + ' kode TL ' + kirim + kdlain;
//        kirim = kirim + ids + '#' + inken;
        kirim = kirim + '#' + inken;
        $.messager.defaults.ok = 'Ya';
        $.messager.defaults.cancel = 'Tidak';
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin memproses kendaraan berikut?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: urlAct,
                    data: {idhasil: id_hasil_uji, variabel: kirim, posisi: posisi, username: username},
                    success: function (data) {
                        $('#id_hasil_uji_prauji').val('');
                        $('#no_kendaraan_prauji').val('');
                        $('#no_uji_prauji').val('');
                        $('#no_antrian_prauji').val('');
                        
                        $("#img_depan").attr('src', 'data:image/jpeg;base64,');
                        $("#img_belakang").attr('src', 'data:image/jpeg;base64,');
                        $("#img_kanan").attr('src', 'data:image/jpeg;base64,');
                        $("#img_kiri").attr('src', 'data:image/jpeg;base64,');
                        
                        $('#a1a').iCheck('uncheck');
                        $('#a1b').iCheck('uncheck');
                        $('#a1c').iCheck('uncheck');
                        $('#a2a').iCheck('uncheck');
                        $('#a2b').iCheck('uncheck');
                        $('#a2c').iCheck('uncheck');
                        $('#a3a').iCheck('uncheck');
                        $('#a3b').iCheck('uncheck');
                        $('#a3c').iCheck('uncheck');
                        $('#a4a').iCheck('uncheck');
                        $('#a4b').iCheck('uncheck');
                        $('#a4c').iCheck('uncheck');

                        // B. SISTEM PENERANGAN
                        $('#b1a').iCheck('uncheck');
                        $('#b1b').iCheck('uncheck');
                        $('#b1c').iCheck('uncheck');
                        $('#b1d').iCheck('uncheck');
                        $('#b2a').iCheck('uncheck');
                        $('#b2b').iCheck('uncheck');
                        $('#b2c').iCheck('uncheck');
                        $('#b2d').iCheck('uncheck');
                        $('#b3a').iCheck('uncheck');
                        $('#b3b').iCheck('uncheck');
                        $('#b3c').iCheck('uncheck');
                        $('#b3d').iCheck('uncheck');
                        $('#b4a').iCheck('uncheck');
                        $('#b4b').iCheck('uncheck');
                        $('#b5a').iCheck('uncheck');
                        $('#b5b').iCheck('uncheck');
                        $('#b6a').iCheck('uncheck');
                        $('#b6b').iCheck('uncheck');
                        $('#b6c').iCheck('uncheck');
                        $('#b6d').iCheck('uncheck');
                        $('#b7').iCheck('uncheck');
                        $('#b8a').iCheck('uncheck');
                        $('#b8b').iCheck('uncheck');

                        // C. RUMAH DAN BODY
                        $('#c1a').iCheck('uncheck');
                        $('#c1b').iCheck('uncheck');
                        $('#c2').iCheck('uncheck');
                        $('#c3').iCheck('uncheck');
                        $('#c4').iCheck('uncheck');
                        $('#c5').iCheck('uncheck');
                        $('#c6').iCheck('uncheck');
                        $('#c7a').iCheck('uncheck');
                        $('#c7b').iCheck('uncheck');
                        $('#c8a').iCheck('uncheck');
                        $('#c8b').iCheck('uncheck');
                        $('#c9').iCheck('uncheck');
                        $('#c10').iCheck('uncheck');
                        $('#c11a').iCheck('uncheck');
                        $('#c11b').iCheck('uncheck');
                        $('#c11c').iCheck('uncheck');
                        $('#c11d').iCheck('uncheck');
                        $('#c12').iCheck('uncheck');
                        $('#c13').iCheck('uncheck');
                        $('#c14').iCheck('uncheck');
                        $('#c15a').iCheck('uncheck');
                        $('#c15b').iCheck('uncheck');
                        $('#c16a1').iCheck('uncheck');
                        $('#c16a2').iCheck('uncheck');
                        $('#c16a3').iCheck('uncheck');
                        $('#c16a4').iCheck('uncheck');
                        $('#c16b1').iCheck('uncheck');
                        $('#c16b2').iCheck('uncheck');
                        $('#c16b3').iCheck('uncheck');
                        $('#c16b4').iCheck('uncheck');
                        $('#c16c1').iCheck('uncheck');
                        $('#c16c2').iCheck('uncheck');
                        $('#c16c3').iCheck('uncheck');
                        $('#c16c4').iCheck('uncheck');
                        $('#c19').iCheck('uncheck');

                        // D. Roda - Roda
                        $('#d1a').iCheck('uncheck');
                        $('#d1b').iCheck('uncheck');
                        $('#d1c').iCheck('uncheck');
                        $('#d1d').iCheck('uncheck');
                        $('#d1e').iCheck('uncheck');
                        $('#d1f').iCheck('uncheck');
                        $('#d1g').iCheck('uncheck');
                        $('#d1h').iCheck('uncheck');
                        $('#d2a').iCheck('uncheck');
                        $('#d2b').iCheck('uncheck');
                        $('#d2c').iCheck('uncheck');
                        $('#d2d').iCheck('uncheck');
                        $('#d2e').iCheck('uncheck');
                        $('#d2f').iCheck('uncheck');
                        $('#d2g').iCheck('uncheck');
                        $('#d2h').iCheck('uncheck');
                        $('#d3a').iCheck('uncheck');
                        $('#d3b').iCheck('uncheck');
                        $('#d3c').iCheck('uncheck');
                        $('#d3d').iCheck('uncheck');
                        $('#d3e').iCheck('uncheck');
                        $('#d3f').iCheck('uncheck');
                        $('#d3g').iCheck('uncheck');
                        $('#d3h').iCheck('uncheck');
                        $('#d4a').iCheck('uncheck');
                        $('#d4b').iCheck('uncheck');
                        $('#d4c').iCheck('uncheck');
                        $('#d4d').iCheck('uncheck');
                        $('#d4e').iCheck('uncheck');
                        $('#d4f').iCheck('uncheck');
                        $('#d4g').iCheck('uncheck');
                        $('#d4h').iCheck('uncheck');
                        $('#d5').iCheck('uncheck');
                        $('#d5a').iCheck('uncheck');
                        $('#d5b').iCheck('uncheck');
                        $('#d5c').iCheck('uncheck');
                        $('#d5d').iCheck('uncheck');
                        $('#d5e').iCheck('uncheck');
                        $('#d5f').iCheck('uncheck');
                        $('#d5g').iCheck('uncheck');
                        $('#d5h').iCheck('uncheck');
                        $('#d6').iCheck('uncheck');
                        $('#d7').iCheck('uncheck');
                        $('#d8').iCheck('uncheck');

                        // E. Dimensi Kendaraan
                        $('#e1a').iCheck('uncheck');
                        $('#e1b').iCheck('uncheck');
                        $('#e1c').iCheck('uncheck');
                        $('#e2a').iCheck('uncheck');
                        $('#e2b').iCheck('uncheck');
                        $('#e2c').iCheck('uncheck');
                        $('#e3a').iCheck('uncheck');
                        $('#e3b').iCheck('uncheck');
                        $('#e3c').iCheck('uncheck');
                        $('#e4a').iCheck('uncheck');
                        $('#e4b').iCheck('uncheck');
                        $('#e4c').iCheck('uncheck');
                        $('#e5').iCheck('uncheck');
                        $('#e6').iCheck('uncheck');
                        $('#e7').iCheck('uncheck');
                        $('#e8').iCheck('uncheck');
                        $('#e9').iCheck('uncheck');

                        // F. Peralatan
                        $('#f1a').iCheck('uncheck');
                        $('#f1b').iCheck('uncheck');
                        $('#f1c').iCheck('uncheck');
                        $('#f1d').iCheck('uncheck');
                        $('#f2a').iCheck('uncheck');
                        $('#f2b').iCheck('uncheck');
                        $('#f2c').iCheck('uncheck');
                        $('#f2d').iCheck('uncheck');
                        $('#f3a').iCheck('uncheck');
                        $('#f3b').iCheck('uncheck');
                        $('#f3c').iCheck('uncheck');
                        $('#f3d').iCheck('uncheck');
                        $('#f4a').iCheck('uncheck');
                        $('#f4b').iCheck('uncheck');
                        $('#f5').iCheck('uncheck');
                        $('#f6').iCheck('uncheck');
                        $('#f7').iCheck('uncheck');
                        $('#f8').iCheck('uncheck');
                        $('#f9').iCheck('uncheck');
                        $('#f10').iCheck('uncheck');
                        $('#f11').iCheck('uncheck');
                        $('#f12').iCheck('uncheck');
                        $('#f13').iCheck('uncheck');
                        $('#f14').iCheck('uncheck');
                        $('#f15').iCheck('uncheck');
                        $('#f16').iCheck('uncheck');
                        $('#b9a').iCheck('uncheck');
                        $('#b9b').iCheck('uncheck');
                        $('#b10a').iCheck('uncheck');
                        $('#b10b').iCheck('uncheck');
                        $('#c17').iCheck('uncheck');
                        $('#c18').iCheck('uncheck');
                        //----------------------------------------------------
                        $('#c1ain').val('');
                        $('#c3in').val('');
                        $('#jnsbody').val('');
                        $('#jnsbahan').val('');
                        $('#e1ain').val('');
                        $('#e1bin').val('');
                        $('#e1cin').val('');
                        $('#e2ain').val('');
                        $('#e2bin').val('');
                        $('#e2cin').val('');
                        $('#e3ain').val('');
                        $('#e3bin').val('');
                        $('#e3cin').val('');
                        $('#e4ain').val('');
                        $('#e4bin').val('');
                        $('#e4cin').val('');
                        $('#e5in').val('');
                        $('#e6in').val('');
                        $('#e7in').val('');
                        $('#e8in').val('');
                        $('#e9in').val('');
                        
                        prosesSearchPrauji();
                        prosesSearchEmisi();
                        $('#praujiLainListGrid').datagrid('reload');
                        
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