function prosesValidChecked(urlAct, kondisi) {
  var rows = $("#validasiListGrid").datagrid("getChecked");
  var ids = [];
  for (var i = 0; i < rows.length; i++) {
    ids.push(rows[i].id_checkbox);
  }
  console.log(ids);
  if (rows.length > 0) {
    $.ajax({
      type: "POST",
      url: urlAct,
      data: { idArray: ids, kondisi: kondisi },
      beforeSend: function () {
        showlargeloader();
      },
      success: function (data) {
        hidelargeloader();
        prosesSearch();
      },
      error: function () {
        hidelargeloader();
        return false;
      },
    });
  } else {
    $.messager.alert("Warning", "You must select at least one item!", "error");
    return false;
  }
}

function prosesValid(urlAct, id, kondisi) {
  $.ajax({
    type: "POST",
    url: urlAct,
    data: { id: id, kondisi: kondisi },
    beforeSend: function () {
      showlargeloader();
    },
    success: function (data) {
      hidelargeloader();
      prosesSearch();
    },
    error: function () {
      hidelargeloader();
      return false;
    },
  });
}
