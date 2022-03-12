<?php
//$baseUrl = Yii::app()->baseUrl;
//$cs = Yii::app()->getClientScript();
//$cs->registerCssFile($baseUrl . '/css/uploadfile.css');
//$cs->registerScriptFile($baseUrl . '/js/jquery.uploadfile.min.js', CClientScript::POS_END);
//$cs->registerScriptFile($baseUrl . '/js/uploadfile.js', CClientScript::POS_END);
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Welcome</h3>
    </div>
    <div class="box-body">
<!--        <div id="mulitplefileuploader">&nbsp;<i class="icon-plus icon-white"></i> Browse .csv Format&nbsp;</div>-->
        <form enctype="multipart/form-data" action="<?php echo $this->createUrl('/Site/ImportExcell');?>" method="POST">
            <input name="userfile" type="file" />
            <input type="submit" value="Send File" />
        </form>
    </div>
</div>