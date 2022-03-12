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
            $('#FORMINPUT')[0].reset();
            $('#FORMINPUT').trigger("reset");
//            $.messager.alert('Info', 'process is successful ', 'info');
        },
        error: function () {
            hidelargeloader();
            return false;
        }
    });
}