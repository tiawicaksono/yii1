$(document).ready(function () {
    //FOR UPLOAD TEMP:ATE CSV dan IBM CONFIGURATOR
    var settings = {
        url: "/invoice/Default/uploadTemplate",
        dragDrop: false,
        fileName: "myfile",
        allowedTypes: "csv",
        returnType: "json",
        dynamicFormData: function () {
            var data = $('#INVOICEFORM').serialize();
            return data;
        },
        onSuccess: function (files, data, xhr) {
            var sub_total = data.subTotal;
            var num_rows = data.numRows;

            if (num_rows == 0) {
                $('#FORM_INVOICE_FOR option:not(:selected)').attr('disabled', false);
                $('#FORM_COMPANY_ID option:not(:selected)').attr('disabled', false);
                $('#itemListGrid').datagrid('loadData', {"total": 0, "rows": []});
            } else {
                $('#FORM_INVOICE_FOR option:not(:selected)').attr('disabled', true);
                $('#FORM_COMPANY_ID option:not(:selected)').attr('disabled', true);
                reloadItemsGrid('/invoice/Default/ReloadListItemsJson','itemListGrid');
            }

            $('#FORM_SUB_TOTAL').val(sub_total);

            $('#btnAddItems').attr('disabled', false);
            $('#btnUpdateItems').attr('disabled', false);
            $('#btnRefreshItems').attr('disabled', false);
            $('#btnDeleteItems').attr('disabled', false);
            //====================================================
            $('#btnAddPayment').attr('disabled', false);
            $('#btnRefreshPayment').attr('disabled', false);
            $('#btnDeletePayment').attr('disabled', false);
            $('#btnUndoDeletePayment').attr('disabled', false);
        }
    }
    var uploadObj = $("#mulitplefileuploader").uploadFile(settings);
});