/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    closeDialogRiwayat();
    closeDialogDetailBuku();
    $('#tahun').numeric({decimal: false, negative: false});
    $('#panjang_utama').numeric({decimal: false, negative: false});
    $('#lebar_utama').numeric({decimal: false, negative: false});
    $('#tinggi_utama').numeric({decimal: false, negative: false});
    $('#panjang_muatan').numeric({decimal: false, negative: false});
    $('#lebar_muatan').numeric({decimal: false, negative: false});
    $('#tinggi_muatan').numeric({decimal: false, negative: false});
    $('#tempat_duduk').numeric({decimal: false, negative: false});
    $('#berdiri').numeric({decimal: false, negative: false});
    $('#kebelakang').numeric({decimal: false, negative: false});
    $('#kedepan').numeric({decimal: false, negative: false});
    $('#jarak_terendah').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_1').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_2').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_3').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_4').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_1').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_2').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_3').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_4').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_5').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_1').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_2').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_3').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_4').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_5').numeric({decimal: false, negative: false});
    $('#jbb').numeric({decimal: false, negative: false});
    $('#daya_angkut_orang').numeric({decimal: false, negative: false});
    $('#jbkb').numeric({decimal: false, negative: false});
    $('#daya_angkut_barang').numeric({decimal: false, negative: false});
    $('#mst').numeric({decimal: false, negative: false});
    $('#q_r').numeric({decimal: false, negative: false});
    $('#p1').numeric({decimal: false, negative: false});
    $('#p2').numeric({decimal: false, negative: false});
    //=============================================================================
    $('#tahun_baru').numeric({decimal: false, negative: false});
    $('#panjang_utama_baru').numeric({decimal: false, negative: false});
    $('#lebar_utama_baru').numeric({decimal: false, negative: false});
    $('#tinggi_utama_baru').numeric({decimal: false, negative: false});
    $('#panjang_muatan_baru').numeric({decimal: false, negative: false});
    $('#lebar_muatan_baru').numeric({decimal: false, negative: false});
    $('#tinggi_muatan_baru').numeric({decimal: false, negative: false});
    $('#tempat_duduk_baru').numeric({decimal: false, negative: false});
    $('#berdiri_baru').numeric({decimal: false, negative: false});
    $('#kebelakang_baru').numeric({decimal: false, negative: false});
    $('#kedepan_baru').numeric({decimal: false, negative: false});
    $('#jarak_terendah_baru').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_1_baru').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_2_baru').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_3_baru').numeric({decimal: false, negative: false});
    $('#jarak_sumbu_4_baru').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_1_baru').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_2_baru').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_3_baru').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_4_baru').numeric({decimal: false, negative: false});
    $('#berat_kendaraan_sumbu_5_baru').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_1_baru').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_2_baru').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_3_baru').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_4_baru').numeric({decimal: false, negative: false});
    $('#daya_dukung_pabrik_5_baru').numeric({decimal: false, negative: false});
    $('#jbb_baru').numeric({decimal: false, negative: false});
    $('#daya_angkut_orang_baru').numeric({decimal: false, negative: false});
    $('#jbkb_baru').numeric({decimal: false, negative: false});
    $('#daya_angkut_barang_baru').numeric({decimal: false, negative: false});
    $('#mst_baru').numeric({decimal: false, negative: false});
    $('#q_r_baru').numeric({decimal: false, negative: false});
    $('#p1_baru').numeric({decimal: false, negative: false});
    $('#p2_baru').numeric({decimal: false, negative: false});
    //=============================================================================
});

function closeDialogRiwayat() {
    $('#dlg').dialog('close');
}

function closeDialogDetailBuku() {
    $('#dlg_detail_buku').dialog('close');
}

function cekPropinsi() {
    var propinsi = $("#propinsi").val();
    if (propinsi.toUpperCase() != 'JAWA TIMUR') {
        $("#kota").val('');
        $(".kecamatan_text").show();
        $(".kecamatan_select").hide();
        $(".kelurahan_text").show();
        $(".kelurahan_select").hide();
    } else {
        $("#kota").val('SAMPANG');
        $(".kecamatan_text").hide();
        $(".kecamatan_select").show();
        $(".kelurahan_text").hide();
        $(".kelurahan_select").show();
    }
}

function cekPropinsiBaru() {
    var propinsi = $("#propinsi_baru").val();
    if (propinsi.toUpperCase() != 'JAWA TIMUR') {
        $("#kota_baru").val('');
        $(".kecamatan_text_baru").show();
        $(".kecamatan_select_baru").hide();
        $(".kelurahan_text_baru").show();
        $(".kelurahan_select_baru").hide();
    } else {
        $("#kota_baru").val('SAMPANG');
        $(".kecamatan_text_baru").hide();
        $(".kecamatan_select_baru").show();
        $(".kelurahan_text_baru").hide();
        $(".kelurahan_select_baru").show();
    }
}

function cekKecamatan() {
    var kota = $("#kota").val();
    if (kota.toUpperCase() != 'SAMPANG') {
        $(".kecamatan_text").show();
        $(".kecamatan_select").hide();
        $(".kelurahan_text").show();
        $(".kelurahan_select").hide();
    } else {
        $(".kecamatan_text").hide();
        $(".kecamatan_select").show();
        $(".kelurahan_text").hide();
        $(".kelurahan_select").show();
    }
}

function cekKecamatanBaru() {
    var kota = $("#kota_baru").val();
    if (kota.toUpperCase() != 'SAMPANG') {
        $(".kecamatan_text_baru").show();
        $(".kecamatan_select_baru").hide();
        $(".kelurahan_text_baru").show();
        $(".kelurahan_select_baru").hide();
    } else {
        $(".kecamatan_text_baru").hide();
        $(".kecamatan_select_baru").show();
        $(".kelurahan_text_baru").hide();
        $(".kelurahan_select_baru").show();
    }
}

function prosesSearch(urlAct) {
    var text_category = $('#text_category').val();
    if (text_category != "") {
        $.ajax({
            type: 'POST',
            url: urlAct,
            data: {textCategory: text_category},
            dataType: 'JSON',
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                if (data.count_kendaraan == 0) {
                    $.messager.alert('Warning', 'Data kendaraan tidak ditemukan', 'error');
                } else {
                    $('#text_category_acuan').removeAttr('disabled');
                    $('#select_category_acuan').removeAttr('disabled');
                    $('.button_simpan').removeAttr('disabled');
                    $('#detail_buku').removeAttr('disabled');

                    $('#nomer_sertifikasi_registrasi').val(data.nomer_sertifikasi_registrasi);
                    $('#diterbitkan_nomer_sertifikasi_registrasi').val(data.diterbitkan_nomer_sertifikasi_registrasi);
                    $('#tgl_nomer_sertifikasi_registrasi').datepicker('setDate', data.tgl_nomer_sertifikasi_registrasi);
//                $('#tgl_nomer_sertifikasi_registrasi').val(data.tgl_nomer_sertifikasi_registrasi);
                    $('#nomer_sertifikasi_uji').val(data.nomer_sertifikasi_uji);
                    $('#diterbitkan_nomer_sertifikasi_uji').val(data.diterbitkan_nomer_sertifikasi_uji);
                    $('#tgl_nomer_sertifikasi_uji').datepicker('setDate', data.tgl_nomer_sertifikasi_uji);
//                $('#tgl_nomer_sertifikasi_uji').val(data.tgl_nomer_sertifikasi_uji);
                    $('#nomer_sertifikasi_rancang').val(data.nomer_sertifikasi_rancang);
                    $('#diterbitkan_nomer_sertifikasi_rancang').val(data.diterbitkan_nomer_sertifikasi_rancang);
                    $('#tgl_nomer_sertifikasi_rancang').datepicker('setDate', data.tgl_nomer_sertifikasi_rancang);
//                $('#tgl_nomer_sertifikasi_rancang').val(data.tgl_nomer_sertifikasi_rancang);
                    $('#id_kendaraan').val(data.id_kendaraan);
                    $('#nomer_uji').val(data.nomer_uji);
                    $('#nomer_kendaraan').val(data.nomer_kendaraan);
                    $('#identitas').val(data.identitas);
                    $('#nomer_identitas').val(data.nomer_identitas);
                    $('#nama_pemilik').val(data.nama_pemilik);
                    $('#alamat_pemilik').val(data.alamat_pemilik);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tgl_lahir').datepicker('setDate', data.tgl_lahir);
//                $('#tgl_lahir').val(data.tgl_lahir);
                    $('#kelamin').val(data.kelamin);
                    $('#rt').val(data.rt);
                    $('#rw').val(data.rw);
                    
                    $('#propinsi_select').val(data.propinsi);
                    $("#propinsi_select").selectpicker('refresh');
                    setSelectProvinsi(data.kota, data.kecamatan, data.kelurahan);
                    
//                    $('#propinsi').val(data.propinsi);
//                    $('#kota').val(data.kota);

//                    var dataKota = data.kota;
//                    var dataKecamatan = data.kecamatan;
//                    if (dataKota == 'SAMPANG') {
//                        $(".kecamatan_text").hide();
//                        $(".kecamatan_select").show();
//                        $(".kelurahan_text").hide();
//                        $(".kelurahan_select").show();
//                        $('.kecamatan_select').val(data.kecamatan);
//                        $('.kecamatan_select').selectpicker('refresh');
//                        selectKelurahanFromKecamatan(data.kelurahan);
//                    } else {
//                        $('.kecamatan_text').val(data.kecamatan);
//                        $(".kecamatan_text").show();
//                        $(".kecamatan_select").hide();
//                        $(".kelurahan_text").show();
//                        $(".kelurahan_select").hide();
//                        $(".kelurahan_text").val(data.kelurahan);
//                    }


                    $('#awal_pemakaian').datepicker('setDate', data.awal_pemakaian);
                    $('#tahun').val(data.tahun);
                    $('#nomer_mesin').val(data.nomer_mesin);
                    $('#nomer_chasis').val(data.nomer_chasis);
                    $('#jenis_kendaraan').val(data.jenis_kendaraan);
                    $('#status_kendaraan').val(data.status_kendaraan);
                    $('#merk').val(data.merk);
                    $('#merk').selectpicker('refresh');
                    $('#tipe').val(data.tipe);
                    $('#pengimport').val(data.pengimport);
                    $('#isi_silinder').val(data.isi_silinder);
                    $('#daya_motor').val(data.daya_motor);
                    $('#bahan_bakar').val(data.bahan_bakar);
                    $('#panjang_utama').val(data.ukuran_panjang);
                    $('#lebar_utama').val(data.ukuran_lebar);
                    $('#tinggi_utama').val(data.ukuran_tinggi);
                    $('#panjang_muatan').val(data.dimpanjang);
                    $('#lebar_muatan').val(data.dimlebar);
                    $('#tinggi_muatan').val(data.dimtinggi);
                    $('#nama_komersil').val(data.nm_komersil);
                    $('#nama_komersil').selectpicker('refresh');
                    $('#warna_cabin').val(data.warna_cabin);
                    $('#warna_bak').val(data.warna_bak);
                    $('#kebelakang').val(data.bagian_belakang);
                    $('#kedepan').val(data.bagian_depan);
                    $('#jarak_terendah').val(data.bagian_jterendah);
                    $('#karoseri_jenis').val(data.karoseri_jenis);
                    $('#karoseri_jenis').selectpicker('refresh');
                    $('#karoseri_bahan').val(data.karoseri_bahan);
                    $('#karoseri_bahan').selectpicker('refresh');
                    $('#tempat_duduk').val(data.karoseri_duduk);
                    $('#berdiri').val(data.karoseri_berdiri);
                    $('#peng_khusus').val(data.guna_khusus);
                    $('#konfigurasi_sumbu').val(data.konsumbu);
                    $('#konfigurasi_sumbu').selectpicker('refresh');
                    $('#jarak_sumbu_1').val(data.jsumbu1);
                    $('#jarak_sumbu_2').val(data.jsumbu2);
                    $('#jarak_sumbu_3').val(data.jsumbu3);
                    $('#jarak_sumbu_4').val(data.jsumbu4);
                    $('#berat_kendaraan_sumbu_1').val(data.bsumbu1);
                    $('#berat_kendaraan_sumbu_2').val(data.bsumbu2);
                    $('#berat_kendaraan_sumbu_3').val(data.bsumbu3);
                    $('#berat_kendaraan_sumbu_4').val(data.bsumbu4);
                    $('#berat_kendaraan_sumbu_5').val(data.bsumbu5);
                    $('#pemakaian_sumbu_ban_1').val(data.psumbu1);
                    $('#pemakaian_sumbu_ban_2').val(data.psumbu2);
                    $('#pemakaian_sumbu_ban_3').val(data.psumbu3);
                    $('#pemakaian_sumbu_ban_4').val(data.psumbu4);
                    $('#pemakaian_sumbu_ban_5').val(data.psumbu5);
                    $('#daya_dukung_pabrik_1').val(data.dydukpab1);
                    $('#daya_dukung_pabrik_2').val(data.dydukpab2);
                    $('#daya_dukung_pabrik_3').val(data.dydukpab3);
                    $('#daya_dukung_pabrik_4').val(data.dydukpab4);
                    $('#daya_dukung_pabrik_5').val(data.dydukpab5);
                    $('#jbb').val(data.kemjbb);
                    $('#jbkb').val(data.kemjbkb);
                    $('#daya_angkut_orang').val(data.kemorang);
                    $('#daya_angkut_barang').val(data.kembarang);
                    $('#kelas_jalan').val(data.kelas_jalan);
                    $('#kelas_jalan').selectpicker('refresh');
                    $('#q_r').val(data.ukq);
                    $('#p1').val(data.ukp);
                    $('#p2').val(data.ukp2);
                    $('#mst').val(data.mst);
                }
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    }
}

function cekRiwayat(urlActCekRiwayat, urlAct, urlActProses, pilihan) {
    var text_category = $('#text_category_acuan').val();
    var select_category_acuan = $('#select_category_acuan :selected').val();
    $.ajax({
        type: 'POST',
        url: urlActCekRiwayat,
        data: {text_category: text_category, select_category_acuan: select_category_acuan},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
//            console.log(data.hasil);
            if (data.hasil > 1) {
                prosesSearchRiwayat(urlAct, urlActProses, pilihan, text_category);
            } else if (data.hasil == 1) {
                viewKendaraan(data.id_kendaraan, urlActProses, pilihan);
            } else {
                $.messager.alert('Info', 'Data is not found', 'info');
            }
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function prosesSearchRiwayat(urlAct, urlActProses, pilihan, text_category_acuan) {
//    var text_category_acuan = $('#text_category_acuan').val();
    if (text_category_acuan != '') {
        $('#dlg').dialog('open');
        $('#dlg').dialog('center');
        $('#riwayatListGrid').datagrid({
            url: urlAct,
            singleSelect: true,
            selectOnCheck: false,
            checkOnSelect: true,
            pagination: true,
            collapsible: true,
            minimizable: true,
            resizable: true,
            rownumbers: true,
            striped: true,
            loadMsg: 'Loading...',
            method: 'POST',
            nowrap: false,
            pageNumber: 1,
            pageSize: 5,
            pageList: [5, 10, 20],
            columns: [[
                    {field: 'id_kendaraan', title: '', width: 50, halign: 'center', align: 'center', formatter: buttonSelectAcuan},
                    {field: 'no_uji', title: 'No Uji', width: 90, sortable: false},
                    {field: 'no_kendaraan', width: 90, title: 'No Kendaraan', sortable: false},
//                    {field: 'tgl_uji', width: 120, title: 'Tanggal Uji', sortable: false},
//                    {field: 'mati_uji', width: 120, title: 'Mati Uji', sortable: false},
//                    {field: 'nama_penguji', width: 150, title: 'Nama Penguji', sortable: false},
                    {field: 'no_chasis', width: 150, title: 'No Chasis', sortable: false},
                    {field: 'no_mesin', width: 100, title: 'No Mesin', sortable: false},
                    {field: 'merk', width: 100, title: 'Merk', sortable: false},
                    {field: 'tipe', width: 100, title: 'Tipe', sortable: false},
                ]],
            onBeforeLoad: function (params) {
                params.text_category_acuan = $('#text_category_acuan').val();
                params.select_category_acuan = $('#select_category_acuan :selected').val();
            },
            onLoadError: function () {
                return false;
            },
            onLoadSuccess: function () {
            }
        });
        function buttonSelectAcuan(value) {
            var button = '<button type="button" class="btn btn-info" onclick="viewKendaraan(' + value + ', \'' + urlActProses + '\', \'' + pilihan + '\')"><span class="glyphicon glyphicon-zoom-in"></span></button>';
            return button;
        }
    }
}

function viewKendaraan(value, urlAct, pilihan) {
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {idKendaraan: value, pilihan: pilihan},
        dataType: 'JSON',
        beforeSend: function () {
            showlargeloader();
        },
        success: function (data) {
            hidelargeloader();
            $('#nomer_sertifikasi_registrasi').val(data.nomer_sertifikasi_registrasi);
            $('#diterbitkan_nomer_sertifikasi_registrasi').val(data.diterbitkan_nomer_sertifikasi_registrasi);
            $('#tgl_nomer_sertifikasi_registrasi').datepicker('setDate', data.tgl_nomer_sertifikasi_registrasi);
            $('#nomer_sertifikasi_uji').val(data.nomer_sertifikasi_uji);
            $('#diterbitkan_nomer_sertifikasi_uji').val(data.diterbitkan_nomer_sertifikasi_uji);
            $('#tgl_nomer_sertifikasi_uji').datepicker('setDate', data.tgl_nomer_sertifikasi_uji);
            $('#nomer_sertifikasi_rancang').val(data.nomer_sertifikasi_rancang);
            $('#diterbitkan_nomer_sertifikasi_rancang').val(data.diterbitkan_nomer_sertifikasi_rancang);
            $('#tgl_nomer_sertifikasi_rancang').datepicker('setDate', data.tgl_nomer_sertifikasi_rancang);
            $('#identitas').val(data.identitas);
            $('#nomer_identitas').val(data.nomer_identitas);
            $('#awal_pemakaian').datepicker('setDate', data.awal_pemakaian);
            $('#tahun').val(data.tahun);
            $('#jenis_kendaraan').val(data.jenis_kendaraan);
            $('#status_kendaraan').val(data.status_kendaraan);
            $('#merk').val(data.merk);
            $('#merk').selectpicker('refresh');
            $('#tipe').val(data.tipe);
            $('#pengimport').val(data.pengimport);
            $('#isi_silinder').val(data.isi_silinder);
            $('#daya_motor').val(data.daya_motor);
            $('#bahan_bakar').val(data.bahan_bakar);
            $('#panjang_utama').val(data.ukuran_panjang);
            $('#lebar_utama').val(data.ukuran_lebar);
            $('#tinggi_utama').val(data.ukuran_tinggi);
            $('#panjang_muatan').val(data.dimpanjang);
            $('#lebar_muatan').val(data.dimlebar);
            $('#tinggi_muatan').val(data.dimtinggi);
            $('#nama_komersil').val(data.nm_komersil);
            $('#nama_komersil').selectpicker('refresh');
            $('#warna_cabin').val(data.warna_cabin);
            $('#warna_bak').val(data.warna_bak);
            $('#kebelakang').val(data.bagian_belakang);
            $('#kedepan').val(data.bagian_depan);
            $('#jarak_terendah').val(data.bagian_jterendah);
            $('#karoseri_jenis').val(data.karoseri_jenis);
            $('#karoseri_jenis').selectpicker('refresh');
            $('#karoseri_bahan').val(data.karoseri_bahan);
            $('#karoseri_bahan').selectpicker('refresh');
            $('#tempat_duduk').val(data.karoseri_duduk);
            $('#berdiri').val(data.karoseri_berdiri);
            $('#peng_khusus').val(data.guna_khusus);
            $('#konfigurasi_sumbu').val(data.konsumbu);
            $('#konfigurasi_sumbu').selectpicker('refresh');
            $('#jarak_sumbu_1').val(data.jsumbu1);
            $('#jarak_sumbu_2').val(data.jsumbu2);
            $('#jarak_sumbu_3').val(data.jsumbu3);
            $('#jarak_sumbu_4').val(data.jsumbu4);
            $('#berat_kendaraan_sumbu_1').val(data.bsumbu1);
            $('#berat_kendaraan_sumbu_2').val(data.bsumbu2);
            $('#berat_kendaraan_sumbu_3').val(data.bsumbu3);
            $('#berat_kendaraan_sumbu_4').val(data.bsumbu4);
            $('#berat_kendaraan_sumbu_5').val(data.bsumbu5);
            $('#pemakaian_sumbu_ban_1').val(data.psumbu1);
            $('#pemakaian_sumbu_ban_2').val(data.psumbu2);
            $('#pemakaian_sumbu_ban_3').val(data.psumbu3);
            $('#pemakaian_sumbu_ban_4').val(data.psumbu4);
            $('#pemakaian_sumbu_ban_5').val(data.psumbu5);
            $('#daya_dukung_pabrik_1').val(data.dydukpab1);
            $('#daya_dukung_pabrik_2').val(data.dydukpab2);
            $('#daya_dukung_pabrik_3').val(data.dydukpab3);
            $('#daya_dukung_pabrik_4').val(data.dydukpab4);
            $('#daya_dukung_pabrik_5').val(data.dydukpab5);
            $('#jbb').val(data.kemjbb);
            $('#jbkb').val(data.kemjbkb);
            $('#daya_angkut_orang').val(data.kemorang);
            $('#daya_angkut_barang').val(data.kembarang);
            $('#q_r').val(data.ukq);
            $('#p1').val(data.ukp);
            $('#p2').val(data.ukp2);
            $('#mst').val(data.mst);
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
//            $.messager.alert('Info', 'process is successful ', 'info');
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}

function submitBaruForm(urlAct) {
    if ($('#nomer_uji_baru').val() == '') {
        $.messager.alert('Warning', 'No Uji mohon diisi', 'error');
    } else {
        var data = $("#FORMINPUTBARU").serialize();
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
                $("#FORMINPUTBARU")[0].reset();
                $("#FORMINPUTBARU").trigger("reset");
//            $.messager.alert('Info', 'process is successful ', 'info');
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    }

}

function buttonDetailBuku() {
    var id = $('#id_kendaraan').val();
    $.ajax({
        url: 'Editbuku/DetailBukuUji',
        type: 'POST',
        data: {id: id},
        dataType: 'JSON',
        success: function (data) {
            $('#dlg_detail_buku').dialog('open');
            //PAGE 1
            $('#tgl_page1').html(data.tanggal_cetak);
            $('#no_uji_page1').html(data.no_uji);
            $('#no_kend_page1').html(data.no_kendaraan);
            //PAGE 2
            //KIRI
            $('#no_uji_page2').html(data.no_uji);
            $('#no_kend_page2').html(data.no_kendaraan);
            $('#nm_pemilik_page2').html(data.nama_pemilik);
            $('#alamat_pemilik_page2').html(data.alamat);
            $('#ktp_page2').html(data.identitas);
            //KANAN
            $('#merk_page2').html(data.merk);
            $('#tipe_page2').html(data.tipe);
            $('#jenis_page2').html(data.nm_komersil);
            $('#isi_silinder_page2').html(data.isi_silinder);
            $('#daya_motor_page2').html(data.daya_motor);
            $('#bahan_bakar_page2').html(data.bahan_bakar);
            $('#tahun_pembuatan_page2').html(data.tahun);
            $('#no_rangka_page2').html(data.no_chasis);
            $('#no_mesin_page2').html(data.no_mesin);
            $('#no_sertifikasi_page2').html(data.no_regis);
            $('#tgl_sertifikasi_page2').html(data.tgl_sertifikasi);
            $('#petugas_page2').html(data.petugas);
            //PAGE 3
            //KIRI
            $('#ukuran_panjang_page3').html(data.ukuran_panjang);
            $('#ukuran_lebar_page3').html(data.ukuran_lebar);
            $('#ukuran_tinggi_page3').html(data.ukuran_tinggi);
            $('#ukuran_julur_belakang_page3').html(data.bagian_belakang);
            $('#ukuran_julur_depan_page3').html(data.bagian_depan);
            $('#jarak_sumbu12_page3').html(data.jsumbu1);
            $('#q_page3').html(data.ukq);
            $('#dimensi_panjang_page3').html(data.dimpanjang);
            $('#dimensi_lebar_page3').html(data.dimlebar);
            $('#dimensi_tinggi_page3').html(data.dimtinggi);
            $('#bahan_bak_page3').html(data.karoseri_bahan);
            $('#pemakaian_sumbu1_page3').html(data.psumbu1);
            $('#pemakaian_sumbu2_page3').html(data.psumbu2);
            $('#jbb_page3').html(data.kemjbb);
            //KANAN
            $('#berat_kosong_sumbu1_page3').html(data.bsumbu1);
            $('#berat_kosong_sumbu2_page3').html(data.bsumbu2);
            $('#berat_kosong_jumlah_page3').html(data.jumlah_sumbu);
            $('#orang_page3').html(data.karoseri_duduk);
            $('#barang_page3').html(data.kembarang);
            $('#jbi_page3').html(data.jbi);
            $('#mst_page3').html(data.mst);
        },
        error: function (data) {
            return false;
        }
    });
}

//function selectKecamatan() {
//    var kecamatan = $('#kecamatan_select :selected').val();
//    $.ajax({
//        url: 'Editbuku/SelectKecamatan',
//        type: 'POST',
//        data: {kecamatan: kecamatan},
//        success: function (msg) {
//            $("#kelurahan_select").html(msg);
//            $("#kelurahan_select").selectpicker('refresh');
//        },
//    });
//}
//
//function selectKecamatanBaru() {
//    var kecamatan = $('#kecamatan_select_baru :selected').val();
//    $.ajax({
//        url: 'Editbuku/SelectKecamatan',
//        type: 'POST',
//        data: {kecamatan: kecamatan},
//        success: function (msg) {
//            $("#kelurahan_select_baru").html(msg);
//            $("#kelurahan_select_baru").selectpicker('refresh');
//        },
//    });
//}
//
//function selectKelurahanFromKecamatan(kota) {
//    var kecamatan = $('#kecamatan_select :selected').val();
//    $.ajax({
//        url: 'Editbuku/SelectKelurahan',
//        type: 'POST',
//        data: {kecamatan: kecamatan},
//        success: function (msg) {
//            $("#kelurahan_select").html(msg).selectpicker('refresh');
//            $("#kelurahan_select").val(kota).selectpicker("refresh");
//        },
//    });
//}

/*
 * PROVINSI
 * KOTA
 * KECAMATAN
 * KELURAHAN
 */

//EDIT
function selectProvinsi() {
    var provinsi = $('#propinsi_select :selected').val();
    $.ajax({
        url: 'Editbuku/SelectProvinsi',
        type: 'POST',
        data: {provinsi: provinsi},
        success: function (msg) {
            $("#kota_select").html(msg).selectpicker('refresh');
            selectKota();
        },
    });
}

function selectKota() {
    var kota = $('#kota_select :selected').val();
    $.ajax({
        url: 'Editbuku/SelectKota',
        type: 'POST',
        data: {kota: kota},
        success: function (msg) {
            $("#kecamatan_select").html(msg).selectpicker('refresh');
            selectKecamatan();
        },
    });
}

function selectKecamatan() {
    var kecamatan = $('#kecamatan_select :selected').val();
    $.ajax({
        url: 'Editbuku/SelectKecamatan',
        type: 'POST',
        data: {kecamatan: kecamatan},
        success: function (msg) {
            $("#kelurahan_select").html(msg).selectpicker('refresh');
        },
    });
}
//-------------------------
//EDIT AFTER GET DATA
//-------------------------
function setSelectProvinsi(kota, kecamatan, kelurahan) {
    var provinsi = $('#propinsi_select :selected').val();
    $.ajax({
        url: 'Editbuku/SelectProvinsi',
        type: 'POST',
        data: {provinsi: provinsi},
        success: function (msg) {
            $("#kota_select").html(msg).selectpicker('refresh');
            $("#kota_select").val(kota).selectpicker('refresh');
            setSelectKota(kecamatan, kelurahan);
        },
    });
}

function setSelectKota(kecamatan, kelurahan) {
    var kota = $('#kota_select :selected').val();
    $.ajax({
        url: 'Editbuku/SelectKota',
        type: 'POST',
        data: {kota: kota},
        success: function (msg) {
            $("#kecamatan_select").html(msg).selectpicker('refresh');
            $("#kecamatan_select").val(kecamatan).selectpicker('refresh');
            setSelectKecamatan(kelurahan);
        },
    });
}

function setSelectKecamatan(kelurahan) {
    var kecamatan = $('#kecamatan_select :selected').val();
    $.ajax({
        url: 'Editbuku/SelectKecamatan',
        type: 'POST',
        data: {kecamatan: kecamatan},
        success: function (msg) {
            $("#kelurahan_select").html(msg).selectpicker('refresh');
            $("#kelurahan_select").val(kelurahan).selectpicker('refresh');
        },
    });
}

//BARU
function selectProvinsiBaru() {
    var provinsi = $('#propinsi_select_baru :selected').val();
    $.ajax({
        url: 'Editbuku/SelectProvinsi',
        type: 'POST',
        data: {provinsi: provinsi},
        success: function (msg) {
            $("#kota_select_baru").html(msg).selectpicker('refresh');
            selectKotaBaru();
        },
    });
}

function selectKotaBaru() {
    var kota = $('#kota_select_baru :selected').val();
    $.ajax({
        url: 'Editbuku/SelectKota',
        type: 'POST',
        data: {kota: kota},
        success: function (msg) {
            $("#kecamatan_select_baru").html(msg).selectpicker('refresh');
            selectKecamatanBaru();
        },
    });
}

function selectKecamatanBaru() {
    var kecamatan = $('#kecamatan_select_baru :selected').val();
    $.ajax({
        url: 'Editbuku/SelectKecamatan',
        type: 'POST',
        data: {kecamatan: kecamatan},
        success: function (msg) {
            $("#kelurahan_select_baru").html(msg).selectpicker('refresh');
        },
    });
}