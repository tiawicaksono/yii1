<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Ubah Password</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="col-md-6">
            <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'formChangePassword')); ?>
            <div class="form-group">
                <label for="new_password" class="col-lg-3 col-md-6 control-label">New Password</label>
                <div class="col-lg-6 col-md-6">
                    <?php
                    echo CHtml::hiddenField('employee_id', Yii::app()->user->getId(), array('class' => 'form-control'));
                    echo CHtml::passwordField('new_password', '', array('class' => 'form-control'));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 col-md-6 control-label">&nbsp;</label>
                <div class="col-lg-6 col-md-6">
                    <button type="button" class="btn btn-primary" onclick="submitForm('<?php echo $this->createUrl('default/ChangePassword'); ?>')">Ubah Password</button>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
        </div>
    </div>
</div>
<script>
    function submitForm(urlAct) {
        var data = $("#formChangePassword").serialize();
        $.ajax({
            type: 'POST',
            url: urlAct,
            data: data,
            beforeSend: function () {
                showlargeloader();
            },
            success: function (data) {
                hidelargeloader();
                $('#formChangePassword')[0].reset();
                $('#formChangePassword').trigger("reset");
            },
            error: function () {
                hidelargeloader();
                return false;
            }
        });
    }
    
    $(document).on("keypress", '#formChangePassword', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            submitForm('<?php echo $this->createUrl('default/ChangePassword'); ?>');
            return false;
        }
    });
</script>