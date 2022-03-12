<script>
    function captureCamera(){
        $.ajax({
            url: 'Default/SaveCaptures',
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                $("#img_belakang").attr('src', 'data:image/jpeg;base64,' + data.img_belakang);
            },
            error: function () {
                alert('Gagal Capture');
                return false;
            }
        });
    }
</script>
<!--<img id="imgr1" width="320" height="240"/>
<img id="imgr2" width="320" height="240"/>
<img id="imgr3" width="320" height="240"/>-->
<img id="img_belakang" width="320" height="240"/>
<button type="button" class="btn btn-primary" onclick="captureCamera()"><i class="fa fa-camera" aria-hidden="true"></i> Capture</button>