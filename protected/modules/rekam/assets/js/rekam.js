$(document).ready(function () {
  $(".alwaysInteger").numeric({ decimal: false, negative: false });
  $("#A4").numeric({ decimal: false, negative: false });
  $("#tgl_search")
    .datepicker({
      endDate: "today",
      format: "dd-M-yyyy",
      daysOfWeekDisabled: [0, 7],
      autoclose: true,
    })
    .on("changeDate", prosesSearch);
});

function prosesSearch() {
  $("#validasiListGrid").datagrid("reload");
}

$(document).on("keypress", "#text_category", function (e) {
  var code = e.keyCode || e.which;
  if (code == 13) {
    prosesSearch();
    return false;
  }
});

function getInformationPasien() {
  var row = $("#validasiListGrid").datagrid("getSelected");
  var nik = row.nik_pasien;
  var nama = row.nama_pasien;
  var id_rekam_medis = row.id_rekam_medis;
  $("#nik_pasien").val(nik);
  $("#nama_pasien").val(nama);
  $("#id_rekam_medis").val(id_rekam_medis);
}

function clickSubmit(urlAct) {
  var kode = new Array();
  var inken = new Array();
  var obatObatan = new Array();
  var kirim = "";
  var aktifitas = "";
  var id_rekam_medis = $("#id_rekam_medis").val();
  var id_dokter = $("#id_dokter").val();
  // alert($("#jnsbody").val());
  if (id_rekam_medis != "") {
    // DATA TUBUH
    if ($("#A1").is(":checked")) {
      kode[1] = "A1";
    }
    if ($("#A2").is(":checked")) {
      kode[2] = "A2";
    }
    $(".rowCheckOrText")
      .find(".class_checkbox")
      .each(function () {
        if ($(this).checked) {
          kode.push($(this).prop("id") + ",");
        }
      });

    $(".rowCheckOrText")
      .find(".class_text")
      .each(function () {
        inken.push($(this).prop("id") + "~" + $(this).val());
      });

    // inken[1] = "A3" + "~" + $("#A3").val();
    // inken[2] = "A4" + "~" + $("#A4").val();
    //----------------------------------------------------
    // DATA OBAT
    $(".rowObat")
      .find(".valueObat")
      .each(function () {
        obatObatan.push($(this).prop("id") + "~" + $(this).val());
      });
    // String yang harus dikirim sebagai variabel inputan
    // for (i = 1; i < kode.length; i++) {
    //   if (kode[i] != null) {
    //     kirim = kirim + kode[i] + ",";
    //   }
    // }
    kirim = kode + "#" + inken + "#" + obatObatan;
    $.messager.defaults.ok = "Ya";
    $.messager.defaults.cancel = "Tidak";
    $.messager.confirm(
      "Confirm",
      "Apakah anda yakin ingin memproses data medis pasien tersebut?",
      function (r) {
        if (r) {
          prosesSubmit(urlAct, id_rekam_medis, kirim, id_dokter);
        }
      }
    );
  } else {
    alert("Pasien Belum Dipilih !");
  }
}

function prosesSubmit(urlAct, id_rekam_medis, kirim, id_dokter) {
  $.ajax({
    type: "POST",
    url: urlAct,
    data: {
      id_rekam_medis: id_rekam_medis,
      variabel: kirim,
      id_dokter: id_dokter,
    },
    success: function (data) {
      $("#id_rekam_medis").val("");
      $("#nik_pasien").val("");
      $("#nama_pasien").val("");

      $("#A1").iCheck("uncheck");
      $("#A2").iCheck("uncheck");
      //----------------------------------------------------
      $("#A3").val("");
      $("#A4").val("");
      $(".valueObat").val("");
      prosesSearch();
    },
    error: function () {
      return false;
    },
  });
}
