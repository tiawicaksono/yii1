$(document).ready(function () {
  $("#FORM_TGL_KONTROL").datepicker({
    startDate: "today",
    format: "dd/mm/yyyy",
    daysOfWeekDisabled: [0, 7],
    autoclose: true,
  });
  $("#FORM_NIK").focus();
});

//====REKOM dan PENDAFTARAN====
function prosesSearchDetailSb(urlAct, pilihan) {
  var nik = $("#FORM_NIK").val();
  $.ajax({
    url: urlAct,
    type: "POST",
    data: { nik: nik },
    dataType: "JSON",
    beforeSend: function () {
      $("#loading_stuk").show();
      $("#tidak_ada").hide();
    },
    success: function (data) {
      $("#loading_stuk").hide();
      if (data != 0) {
        $("#FORM_NIK").val(data.nik_pasien);
        $("#FORM_NAMA").val(data.nama_pasien);
        $("#FORM_ALAMAT").val(data.alamat_pasien);
        $("#FORM_ID_PASIEN").val(data.id_pasien);
      } else {
        $("#tidak_ada").show();
        $("#FORM_ID_PASIEN").val(0);
        $("#FORM_NAMA").val("");
        $("#FORM_ALAMAT").val("");
      }
    },
    error: function (data) {
      $("#tidak_ada").hide();
      $("#loading_stuk").hide();
      return false;
    },
  });
}

function pilihKategori(urlAct) {
  var pilih = $("#pilih_kategori option:selected").val();
  if (pilih == "0") {
    $("#div_update_tgl_kontrol").hide();
    $("#update_dokter").hide();
  } else {
    if (pilih == "update_select_tgl_kontrol") {
      $("#div_update_tgl_kontrol").show();
      $("#update_dokter").hide();
    } else {
      $("#div_update_tgl_kontrol").hide();
      $("#update_dokter").show();
      $.ajax({
        url: urlAct,
        type: "POST",
        data: { pilih: pilih },
        success: function (msg) {
          $("#update_dokter").html(msg);
        },
      });
    }
  }
}
function submitForm(urlAct, idForm) {
  var no_sb = $("#FORM_ID_KENDARAAN").val();
  var jenis_uji = $("#FORM_JENIS_PENGUJIAN").val();
  if (jenis_uji != 14) {
    if (no_sb != "") {
      prosesSubmit(urlAct, idForm);
    } else {
      $.messager.alert("Warning", "No Uji tidak dikenali", "error");
      return false;
    }
  } else {
    prosesSubmit(urlAct, idForm);
  }
}

function prosesSubmit(urlAct, idForm) {
  var jenis_pengujian = $("#FORM_JENIS_PENGUJIAN option:selected").val();
  //    var ganti_buku = $('#FORM_BUKU_UJI option:selected').val();
  $.ajax({
    url: urlAct,
    type: "POST",
    data: $("#" + idForm).serialize(),
    dataType: "JSON",
    beforeSend: function () {
      showlargeloader();
    },
    success: function (data) {
      hidelargeloader();
      if (data.ada == "true") {
        $("#" + idForm)[0].reset();
        $("#" + idForm).trigger("reset");
        $("fieldset").hide();
        $("#FORM_JENIS_PENGUJIAN").val(jenis_pengujian);
        $("#FORM_BUKU_UJI1").iCheck("check");
        $("#FORM_BUKU_UJI1").iCheck("update");

        $("#FORM_BUKU_UJI2").iCheck("uncheck");
        $("#FORM_BUKU_UJI2").iCheck("update");

        $("#FORM_BUKU_UJI3").iCheck("uncheck");
        $("#FORM_BUKU_UJI3").iCheck("update");

        $("#FORM_BUKU_UJI4").iCheck("uncheck");
        $("#FORM_BUKU_UJI4").iCheck("update");
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
        $("#FORM_DIKUASAKAN").val("true");
        $("fieldset").show();
        $("#FORM_BARU").val("");
        $("#FORM_NAMA_DIKUASAKAN").val(data.id_pengurus);
        $("#FORM_NAMA_DIKUASAKAN").selectpicker("refresh");
        $("#div_nama_baru").hide();
        $("#FORM_NO_KTP_DIKUASAKAN").val(data.no_ktp_dikuasakan);
        $("#FORM_ALAMAT_DIKUASAKAN").val(data.alamat_dikuasakan);
        $("#FORM_TGL_PENGUJIAN").datepicker("setDate", data.tgluji);
        $("#FORM_TGL_MATI_UJI").datepicker("setDate", data.tglmati);
        $("#FORM_ID_KENDARAAN").val("0");
        $("#FORM_NO_STUK").focus();
        $("#validasiListGrid").datagrid("reload");
      } else {
        $.messager.alert("Info", data.message, "info");
      }
      return false;
    },
    error: function () {
      hidelargeloader();
      return false;
    },
  });
}

function buttonReset(idForm) {
  $("#FORM_ID_PASIEN").val(0);
  $("#" + idForm)[0].reset();
  $("#" + idForm).trigger("reset");
}
