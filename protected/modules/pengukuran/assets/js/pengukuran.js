/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('#tgl_search').datepicker({
        endDate: "today",
        format: 'dd-M-yyyy',
        daysOfWeekDisabled: [0, 7],
        autoclose: true,
    }).on('changeDate', prosesSearch);

});

$(document).on("keypress", '#text_category', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        prosesSearch();
        return false;
    }
});

function prosesSearch() {
    $('#pengukuranListGrid').datagrid('reload');
}

function buttonEditPengukuran() {
    var row = $("#pengukuranListGrid").datagrid('getSelected');
    var id_hasil_uji = row.id_hasil_uji;
    $.ajax({
        type: 'POST',
        url: 'Pengukuran/DetailPengukuran',
        data: {id_hasil_uji: id_hasil_uji},
        dataType: "JSON",
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $('#cisEmisi').val(data.cis);
            $('#cisLampu').val(data.cis);
            $('#cisRem').val(data.cis);
            $('#cis').val(data.cis);
            $('#id_hasil_uji').val(data.id_hasil_uji);
            $('#id_kendaraan').val(data.id_kendaraan);
            $('#id_daftar').val(data.id_daftar);
            $('#id_jns_kend').val(data.id_jns_kend);
            $('#ks').val(data.konsumbu);
            $('#tahun').val(data.tahun);
            if (data.bahan_bakar == 'SOLAR') {
//                if (data.bahan_bakar(/ /g,"") == 'SOLAR') {
                $('#diesel').val(data.ems_diesel);
                $('#mesin_co').val(0);
                $('#mesin_hc').val(0);
                $('#diesel').prop('readonly', false);
                $('#mesin_co').prop('readonly', true);
                $('#mesin_hc').prop('readonly', true);
                
                $('#kuat_kanan').prop('readonly', false);
                $('#kuat_kiri').prop('readonly', false);
                $('#deviasi_kanan').prop('readonly', false);
                $('#deviasi_kiri').prop('readonly', false);
            } else if (data.bahan_bakar == 'BENSIN') {
                $('#diesel').val(0);
                $('#mesin_co').val(data.ems_mesin_co);
                $('#mesin_hc').val(data.ems_mesin_hc);
                $('#diesel').prop('readonly', true);
                $('#mesin_co').prop('readonly', false);
                $('#mesin_hc').prop('readonly', false);
                
                $('#kuat_kanan').prop('readonly', false);
                $('#kuat_kiri').prop('readonly', false);
                $('#deviasi_kanan').prop('readonly', false);
                $('#deviasi_kiri').prop('readonly', false);
            } else {
                $('#diesel').prop('readonly', true);
                $('#mesin_co').prop('readonly', true);
                $('#mesin_hc').prop('readonly', true);
                
                $('#kuat_kanan').prop('readonly', true);
                $('#kuat_kiri').prop('readonly', true);
                $('#deviasi_kanan').prop('readonly', true);
                $('#deviasi_kiri').prop('readonly', true);
            }
            $('#bahan_bakar').val(data.bahan_bakar);
            $('#b_sumbu_1').val(data.bsumbu1);
            $('#b_sumbu_2').val(data.bsumbu2);
            $('#b_sumbu_3').val(data.bsumbu3);
            $('#b_sumbu_4').val(data.bsumbu4);
            $('#diesel').val(data.ems_diesel);
            $('#mesin_co').val(data.ems_mesin_co);
            $('#mesin_hc').val(data.ems_mesin_hc);
            $('#kuat_kanan').val(data.ktlamp_kanan);
            $('#kuat_kiri').val(data.ktlamp_kiri);
            $('#deviasi_kanan').val(data.dev_kanan);
            $('#deviasi_kiri').val(data.dev_kiri);
            $('#sumbu_1').val(data.selrem_sb1);
            $('#sumbu_2').val(data.selrem_sb2);
            $('#sumbu_3').val(data.selrem_sb3);
            $('#sumbu_4').val(data.selrem_sb4);
            $('#sg_sb_1').val(data.selgaya1);
            $('#sg_sb_2').val(data.selgaya2);
            $('#sg_sb_3').val(data.selgaya3);
            $('#sg_sb_4').val(data.selgaya4);
            $('.button_simpan').prop('disabled', false);
            $('.button_reload').prop('disabled', false);
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function submitForm(urlAct) {
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
            $("#FORMINPUT")[0].reset();
            $("#FORMINPUT").trigger("reset");
            $('#button_simpan').prop('disabled', true);
            prosesSearch();
//            $.messager.alert('Info', 'process is successful ', 'info');
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function submitFormEmisi(urlAct) {
    var id_hasil_uji = $('#id_hasil_uji').val();
    var id_kendaraan = $('#id_kendaraan').val();
    var id_jns_kend = $('#id_jns_kend').val();
    var id_daftar = $('#id_daftar').val();
    var cis = $('#cisEmisi :selected').val();
    
    var diesel = $('#diesel').val();
    var mesin_co = $('#mesin_co').val();
    var mesin_hc = $('#mesin_hc').val();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {diesel:diesel, mesin_co:mesin_co, mesin_hc:mesin_hc, id_hasil_uji:id_hasil_uji, id_kendaraan:id_kendaraan, id_jns_kend:id_jns_kend, id_daftar:id_daftar, cis:cis},
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function submitFormLampu(urlAct) {
    var id_hasil_uji = $('#id_hasil_uji').val();
    var id_kendaraan = $('#id_kendaraan').val();
    var id_jns_kend = $('#id_jns_kend').val();
    var id_daftar = $('#id_daftar').val();
    var cis = $('#cisLampu :selected').val();
    
    var kuat_kanan = $('#kuat_kanan').val();
    var kuat_kiri = $('#kuat_kiri').val();
    var deviasi_kanan = $('#deviasi_kanan').val();
    var deviasi_kiri = $('#deviasi_kiri').val();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {kuat_kanan:kuat_kanan, kuat_kiri:kuat_kiri, deviasi_kanan:deviasi_kanan, deviasi_kiri:deviasi_kiri, id_hasil_uji:id_hasil_uji, id_kendaraan:id_kendaraan, id_jns_kend:id_jns_kend, id_daftar:id_daftar, cis:cis},
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function submitFormRem(urlAct) {
    var id_hasil_uji = $('#id_hasil_uji').val();
    var id_kendaraan = $('#id_kendaraan').val();
    var id_jns_kend = $('#id_jns_kend').val();
    var id_daftar = $('#id_daftar').val();
    var cis = $('#cisRem :selected').val();
    
    var sumbu_1 = $('#sumbu_1').val();
    var sumbu_2 = $('#sumbu_2').val();
    var sumbu_3 = $('#sumbu_3').val();
    var sumbu_4 = $('#sumbu_4').val();
    var sg_sb_1 = $('#sg_sb_1').val();
    var sg_sb_2 = $('#sg_sb_2').val();
    var sg_sb_3 = $('#sg_sb_3').val();
    var sg_sb_4 = $('#sg_sb_4').val();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {sumbu_1:sumbu_1, sumbu_2:sumbu_2, sumbu_3:sumbu_3, sumbu_4:sumbu_4, sg_sb_1:sg_sb_1, sg_sb_2:sg_sb_2, sg_sb_3:sg_sb_3, sg_sb_4:sg_sb_4, id_hasil_uji:id_hasil_uji, id_kendaraan:id_kendaraan, id_jns_kend:id_jns_kend, id_daftar:id_daftar, cis:cis},
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function reloadData(urlAct) {
    var tahun_kendaraan = $('#tahun').val();
    var bahan_bakar = $('#bahan_bakar').val();
    var b_sumbu_1 = $('#b_sumbu_1').val();
    var b_sumbu_2 = $('#b_sumbu_2').val();
    var b_sumbu_3 = $('#b_sumbu_3').val();
    var b_sumbu_4 = $('#b_sumbu_4').val();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {tahun_kendaraan: tahun_kendaraan},
        dataType: "JSON",
        success: function (data) {
            
            $('#sumbu_2').val(data.bsb2);
            $('#sumbu_3').val(data.bsb3);
            $('#sumbu_4').val(data.bsb4);
            
            $('#sg_sb_2').val(data.bsel2);
            $('#sg_sb_3').val(data.bsel3);
            $('#sg_sb_4').val(data.bsel4);
            $('#kuat_kanan').val(data.lampu_kanan);
            $('#kuat_kiri').val(data.lampu_kiri);
            $('#deviasi_kanan').val(data.dev_kanan);
            $('#deviasi_kiri').val(data.dev_kiri);
            
            if(b_sumbu_1 != '0'){
                $('#sumbu_1').val(data.bsb1);
                $('#sg_sb_1').val(data.bsel1);
            }else{
                $('#sumbu_1').val(0);
                $('#sg_sb_1').val(0);
            }
            if(b_sumbu_2 != '0'){
                $('#sumbu_2').val(data.bsb2);
                $('#sg_sb_2').val(data.bsel2);
            }else{
                $('#sumbu_2').val(0);
                $('#sg_sb_2').val(0);
            }
            if(b_sumbu_3 != '0' || b_sumbu_3 == ''){
                $('#sumbu_3').val(data.bsb3);
                $('#sg_sb_3').val(data.bsel3);
            }else{
                $('#sumbu_3').val(0);
                $('#sg_sb_3').val(0);
            }
            if(b_sumbu_4 != '0' || b_sumbu_4 == ''){
                $('#sumbu_4').val(data.bsb4);
                $('#sg_sb_4').val(data.bsel4);
            }else{
                $('#sumbu_4').val(0);
                $('#sg_sb_4').val(0);
            }
            if(bahan_bakar == 'SOLAR'){
                $('#diesel').val(data.solar);
                $('#diesel').focus();
                $('#mesin_co').val(0);
                $('#mesin_hc').val(0);
                $('#diesel').prop('readonly', false);
                $('#mesin_co').prop('readonly', true);
                $('#mesin_hc').prop('readonly', true);
                
                $('#kuat_kanan').prop('readonly', false);
                $('#kuat_kiri').prop('readonly', false);
                $('#deviasi_kanan').prop('readonly', false);
                $('#deviasi_kiri').prop('readonly', false);
            }else if(bahan_bakar == 'BENSIN'){
                $('#diesel').val(0);
                $('#mesin_co').val(data.ems_co);
                $('#mesin_hc').val(data.ems_hc);
                $('#mesin_co').focus();
                $('#diesel').prop('readonly', true);
                $('#mesin_co').prop('readonly', false);
                $('#mesin_hc').prop('readonly', false);
                
                $('#kuat_kanan').prop('readonly', false);
                $('#kuat_kiri').prop('readonly', false);
                $('#deviasi_kanan').prop('readonly', false);
                $('#deviasi_kiri').prop('readonly', false);
            }else{
                $('#diesel').prop('readonly', true);
                $('#mesin_co').prop('readonly', true);
                $('#mesin_hc').prop('readonly', true);
                $('#diesel').val('');
                $('#mesin_co').val('');
                $('#mesin_hc').val('');
                
                $('#kuat_kanan').prop('readonly', true);
                $('#kuat_kiri').prop('readonly', true);
                $('#deviasi_kanan').prop('readonly', true);
                $('#deviasi_kiri').prop('readonly', true);
                $('#kuat_kanan').val('');
                $('#kuat_kiri').val('');
                $('#deviasi_kanan').val('');
                $('#deviasi_kiri').val('');
            }
        }
    });
}