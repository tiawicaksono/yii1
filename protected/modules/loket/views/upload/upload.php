<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl . '/css/uploadfile.css');
$cs->registerScriptFile($baseUrl . '/js/uploadfile/jquery.uploadfile.min.js', CClientScript::POS_END);
?>
<div class="row">
    <div class="col-lg-8 col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Upload Absen</h3>
            </div>
            <div class="box-body">
                <div class="col-lg-4 col-md-6">
                    <div id="fileuploader">Upload Nilai</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Keterangan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ol>
                    <li><small> Pastikan file nilai diperoleh dari hasil download template</small></li> 
                    <li><small> Upload nilai bisa secara langsung, tidak harus satu persatu</small></li> 
                    <li><small> Jika file nilai tersebut sudah pernah diupload, maka secara otomatis akan meng-update nilai yang sebelumnya</small></li> 
                </ol>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#fileuploader").uploadFile({
            url: "<?php echo $this->createUrl('upload/ReadUpload2'); ?>",
            fileName: "myfile",
            onSuccess: function (files, data, xhr) {
                setTimeout(function () {
                    $('.ajax-file-upload-statusbar').remove();
                }, 2000);
                return false;
            },
            onError: function (files, data, xhr) {
//                setTimeout(function () {
//                    $('.ajax-file-upload-statusbar').remove();
//                }, 2000);
            },
        });

    });
</script>