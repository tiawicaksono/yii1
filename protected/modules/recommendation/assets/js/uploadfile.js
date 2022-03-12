$(document).ready(function () {
    $(".fileuploader").uploadFile({
        url: "/invoice/Default/uploadTemplate",
        dragDrop: false,
        fileName: "myfile",
        allowedTypes: "csv",
        returnType: "json",
        dynamicFormData: function () {
//            var data = $('#INVOICEFORM').serialize();
//            return data;
        },
        onSuccess: function (files, data, xhr) {
            
        }
    });
});