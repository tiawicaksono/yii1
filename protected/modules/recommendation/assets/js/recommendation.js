$(document).ready(function () {
  $("#tgl_search")
    .datepicker({
      endDate: "today",
      format: "dd-M-yyyy",
      daysOfWeekDisabled: [0, 6],
      autoclose: true,
    })
    .on("changeDate", reloadListGrid);
  $("#tgl_surat_rekom").datepicker({
    endDate: "today",
    format: "dd-M-yyyy",
    daysOfWeekDisabled: [0, 7],
    autoclose: true,
  });
});

//==========================================================================

function reloadListGrid() {
  $("#rekomListGrid").datagrid("reload");
}

function selectProvinsi(pilihan) {
  var provinsi = $("#propinsi_" + pilihan + " :selected").val();
  $.ajax({
    url: "Rekom/SelectProvinsi",
    type: "POST",
    data: { provinsi: provinsi },
    success: function (msg) {
      $("#kota_" + pilihan)
        .html(msg)
        .selectpicker("refresh");
      selectKota();
    },
  });
}

function prosesRekom(value) {
  $.ajax({
    type: "POST",
    url: "Rekom/GetDetailDataRekom",
    data: { id_rekom: value },
    dataType: "JSON",
    beforeSend: function () {
      showlargeloader();
    },
    success: function (data) {
      hidelargeloader();
      $("html, body").animate({ scrollTop: 500 }, 500);
      $("#button_simpan").prop("disabled", false);
      $("#no_uji").val(data.no_uji);
      $("#no_kendaraan").val(data.no_kendaraan);
      $("#id_rekom").val(data.id_rekom);
      //MUTASI KELUAR
      if (data.mutasi_keluar == true) {
        $("#checkbox_mutke").iCheck("check");
      } else {
        $("#checkbox_mutke").iCheck("uncheck");
      }
      $("#nik_baru").val(data.nik_baru);
      $("#pemilik_baru").val(data.pemilik_baru);
      $("#alamat_baru").val(data.alamat_baru);
      $("#propinsi_mutke").val(data.id_provinsi_mutke);
      $("#propinsi_mutke").selectpicker("refresh");
      setSelectProvinsi(data.id_kota_mutke, "mutke");

      //MUTASI MASUK
      // if (data.mutasi_masuk == true) {
      //     $('#checkbox_mutmas').iCheck('check');
      // } else {
      //     $('#checkbox_mutmas').iCheck('uncheck');
      // }
      // $('#tgl_surat_rekom').datepicker('setDate', data.tgl_rekom_mutmasuk);
      // $('#no_surat_rekom').val(data.no_rekom_mutmasuk);
      // $('#propinsi_mutmas').val(data.id_provinsi_mutmas);
      // $("#propinsi_mutmas").selectpicker('refresh');
      // setSelectProvinsi(data.id_kota_mutke,'mutmas');

      //NUMPANG KELUAR
      if (data.numpang_keluar == true) {
        $("#checkbox_numke").iCheck("check");
      } else {
        $("#checkbox_numke").iCheck("uncheck");
      }
      $("#propinsi_numke").val(data.id_provinsi_numke);
      $("#propinsi_numke").selectpicker("refresh");
      setSelectProvinsi(data.id_kota_numke, "numke");

      //UBAH BENTUK
      if (data.ubah_bentuk == true) {
        $("#checkbox_ubah_bentuk").iCheck("check");
      } else {
        $("#checkbox_ubah_bentuk").iCheck("uncheck");
      }
      $("#keterangan_ubah_bentuk").val(data.ket_ubah_bentuk);

      //UBAH SIFAT
      // if (data.ubah_sifat == true) {
      //     $('#checkbox_ubah_sifat').iCheck('check');
      // } else {
      //     $('#checkbox_ubah_sifat').iCheck('uncheck');
      // }
      // $('#keterangan_ubah_sifat').val(data.ket_ubah_sifat);
    },
    error: function () {
      hidelargeloader();
      return false;
    },
  });
}

function submitFormRekom() {
  var data = $("#formRekom").serialize();
  $.ajax({
    type: "POST",
    url: "Rekom/SaveRekom",
    data: data,
    beforeSend: function () {
      showlargeloader();
    },
    success: function (data) {
      hidelargeloader();
    },
    error: function () {
      hidelargeloader();
      return false;
    },
  });
}

function setSelectProvinsi(kota, pilihan) {
  var provinsi = $("#propinsi_" + pilihan + " :selected").val();
  $.ajax({
    url: "Rekom/SelectProvinsi",
    type: "POST",
    data: { provinsi: provinsi },
    success: function (msg) {
      $("#kota_" + pilihan)
        .html(msg)
        .selectpicker("refresh");
      $("#kota_" + pilihan)
        .val(kota)
        .selectpicker("refresh");
    },
  });
}
