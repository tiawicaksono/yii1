$(document).ready(function () {
    $('#ktkanan').numeric({decimal : false, negative : false});
    $('#ktkiri').numeric({decimal : false, negative : false});
    $('#devkanan').numeric({decimalPlaces : 2, negative : false});
    $('#devkiri').numeric({decimalPlaces : 2, negative : false});
});

function prosesSearchLampu() {
//    $('#lampuListGrid').datagrid('reload');
    $('#lampuListGrid').datagrid({
        url: 'Lampu/ListGrid',
        onBeforeLoad: function (params) {
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
}

function getInformationLampu() {
    var row = $("#lampuListGrid").datagrid('getSelected');
    var no_kendaraan = row.no_kendaraan;
    var no_uji = row.no_uji;
    var id_hasil_uji = row.id_hasil_uji;
    var posisi = row.posisi;
    var tahun = row.tahun;
    var no_antrian = row.numerator_hari;
    $('#no_kendaraan_lampu').val(no_kendaraan);
    $('#posisi_cis_lampu').val(posisi);
    $('#no_uji_lampu').val(no_uji);
    $('#id_hasil_uji_lampu').val(id_hasil_uji);
    $('#tahun_lampu').val(tahun);
    $('#no_antrian_lampu').val(no_antrian);
}

function reloadDataLampu(urlAct) {
    var tahun_kendaraan = $('#tahun_lampu').val();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {tahun_kendaraan: tahun_kendaraan},
        dataType: "JSON",
        success: function (data) {
            if(tahun_kendaraan != ''){
                $('#ktkanan').val(data.lampu_kanan);
                $('#ktkiri').val(data.lampu_kiri);
                $('#devkanan').val(data.dev_kanan);
                $('#devkiri').val(data.dev_kiri);
            }else{
                $('#ktkanan').val('');
                $('#ktkiri').val('');
                $('#devkanan').val('');
                $('#devkiri').val('');
            }
        }
    });
}

function prosesLampu(urlAct) {
    var id_hasil_uji = $('#id_hasil_uji_lampu').val();
    var posisi = $('#posisi_cis_lampu').val();
    var username = $('#username_lampu').val();
    
    if (id_hasil_uji != '') { 
        var kirim = '';
        var lm_kanan = $('#ktkanan').val();
        var lm_kiri = $('#ktkiri').val();
        if(lm_kanan > 20){
            lm_kanan = 20;
        }
        if(lm_kiri > 20){
            lm_kiri = 20;
        }
        kirim = lm_kanan + ',' + $('#devkanan').val() + ',' + lm_kiri + ',' + $('#devkiri').val();
        $.messager.defaults.ok = 'Ya';
        $.messager.defaults.cancel = 'Tidak';
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin memproses kendaraan berikut?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: urlAct,
                    data: {variabel: kirim, id_hasil_uji: id_hasil_uji, cis: posisi, username: username},
                    success: function (data) {
                        $('#id_hasil_uji_lampu').val('');
                        $('#no_kendaraan_lampu').val('');
                        $('#no_uji_lampu').val('');
                        $('#tahun_lampu').val('');
                        $('#no_antrian_lampu').val('');

                        $('#ktkanan').val('');
                        $('#devkanan').val('');
                        $('#ktkiri').val('');
                        $('#devkiri').val('');

                        prosesSearchLampu();
                        prosesSearchRem();
                    },
                    error: function () {
                        return false;
                    }
                });
            }
        });
    }else {
        alert('Data Kendaraan Belum Dipilih !');
    }
}