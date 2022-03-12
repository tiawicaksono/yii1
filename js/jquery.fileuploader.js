$(document).ready(function () {

    // enable fileuploader plugin
    $('input[name="files"]').fileuploader({
        addMore: true,
        limit: 4,
        extensions: ['jpg', 'jpeg', 'png'],
        editor: {
            // editor cropper
            cropper: {
                // cropper ratio
                // example: null
                // example: '1:1'
                // example: '16:9'
                // you can also write your own
                ratio: '16:9',

                // cropper minWidth in pixels
                // size is adjusted with the image natural width
                minWidth: 600,

                // cropper minHeight in pixels
                // size is adjusted with the image natural height
                minHeight: 600,

                // cropper maxWidth in pixels
                // size is adjusted with the image natural width
                maxWidth: 600,

                // cropper maxHeight in pixels
                // size is adjusted with the image natural height
                maxHeight: 600,

                // show cropper grid
                showGrid: true
            },

            // editor on save quality (0 - 100)
            // only for client-side resizing
            quality: 100,

            // editor on save maxWidth in pixels
            // only for client-side resizing
            maxWidth: 600,

            // editor on save maxHeight in pixels
            // only for client-size resizing
            maxHeight: 600,

            // Callback fired after saving the image in editor
            onSave: function (blobOrDataUrl, item, listEl, parentEl, newInputEl, inputEl) {
                // callback will go here
            }
        }
    });

});