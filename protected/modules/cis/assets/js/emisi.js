$(document).ready(function () {
    $('#emdiesel').numeric({decimalPlaces: 2, negative: false});
    $('#emco').numeric({decimalPlaces: 2, negative: false});
    $('#emhc').numeric({decimal: false, negative: false});
});

function prosesSearchEmisi() {
//    $('#emisiListGrid').datagrid('reload');
    $('#emisiListGrid').datagrid({
        url: 'Emisi/ListGrid',
        onBeforeLoad: function (params) {
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
}

function getInformationEmisi() {
    var row = $("#emisiListGrid").datagrid('getSelected');
    var no_kendaraan = row.no_kendaraan;
    var no_uji = row.no_uji;
    var id_hasil_uji = row.id_hasil_uji;
    var tahun = row.tahun;
    var bahan_bakar = row.bahan_bakar;
    var no_antrian = row.numerator_hari;
    $('#no_kendaraan_emisi').val(no_kendaraan);
    $('#no_uji_emisi').val(no_uji);
    $('#id_hasil_uji_emisi').val(id_hasil_uji);
    $('#tahun_emisi').val(tahun);
    $('#bahan_bakar_emisi').val(bahan_bakar);
    $('#no_antrian_emisi').val(no_antrian);
    if (bahan_bakar.replace(/ /g,"") == 'SOLAR') {
        $('#emdiesel').prop('readonly', false);
        $('#emco').prop('readonly', true);
        $('#emhc').prop('readonly', true);
        $('#emdiesel').val('');
        $('#emco').val(0);
        $('#emhc').val(0);
    } else if (bahan_bakar.replace(/ /g,"") == 'BENSIN') {
        $('#emdiesel').prop('readonly', true);
        $('#emco').prop('readonly', false);
        $('#emhc').prop('readonly', false);
        $('#emdiesel').val(0);
        $('#emco').val('');
        $('#emhc').val('');
    } else {
        $('#emdiesel').prop('readonly', true);
        $('#emco').prop('readonly', true);
        $('#emhc').prop('readonly', true);
        $('#emdiesel').val(0);
        $('#emco').val(0);
        $('#emhc').val(0);
    }

}

function reloadDataEmisi(urlAct) {
    var tahun_kendaraan = $('#tahun_emisi').val();
    var bahan_bakar = $('#bahan_bakar_emisi').val();
    $.ajax({
        type: 'POST',
        url: urlAct,
        data: {tahun_kendaraan: tahun_kendaraan},
        dataType: "JSON",
        success: function (data) {
            if (bahan_bakar.replace(/ /g,"") == 'SOLAR') {
                $('#emdiesel').val(data.solar);
                $('#emdiesel').focus();
                $('#emco').val(0);
                $('#emhc').val(0);
                $('#emdiesel').prop('readonly', false);
                $('#emco').prop('readonly', true);
                $('#emhc').prop('readonly', true);
            } else if (bahan_bakar.replace(/ /g,"") == 'BENSIN') {
                $('#emdiesel').val(0);
                $('#emco').val(data.ems_co);
                $('#emhc').val(data.ems_hc);
                $('#emco').focus();
                $('#emdiesel').prop('readonly', true);
                $('#emco').prop('readonly', false);
                $('#emhc').prop('readonly', false);
            } else {
                $('#emdiesel').prop('readonly', true);
                $('#emco').prop('readonly', true);
                $('#emhc').prop('readonly', true);
                $('#emdiesel').val('');
                $('#emco').val('');
                $('#emhc').val('');
            }
        }
    });
}

function prosesEmisi(urlAct) {
    var id_hasil_uji = $('#id_hasil_uji_emisi').val();
    var posisi = $('#posisi_cis_emisi').val();
    var username = $('#username_emisi').val();

    if (id_hasil_uji != '') {
        var diesel = $('#emdiesel').val();
        var mesin_co = $('#emco').val();
        var mesin_hc = $('#emhc').val();
        var kirim = diesel + ',' + mesin_co + ',' + mesin_hc;
        $.messager.defaults.ok = 'Ya';
        $.messager.defaults.cancel = 'Tidak';
        $.messager.confirm('Confirm', 'Apakah anda yakin ingin memproses kendaraan berikut?', function (r) {
            if (r) {
                $.ajax({
                    type: 'POST',
                    url: urlAct,
                    data: {variabel: kirim, id_hasil_uji: id_hasil_uji, cis: posisi, username: username},
                    success: function (data) {
                        $('#id_hasil_uji_emisi').val('');
                        $('#no_kendaraan_emisi').val('');
                        $('#no_uji_emisi').val('');
                        $('#bahan_bakar_emisi').val('');
                        $('#tahun_emisi').val('');
                        $('#no_antrian_emisi').val('');
                        prosesSearchEmisi();

                        $('#emdiesel').val('');
                        $('#emco').val('');
                        $('#emhc').val('');
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