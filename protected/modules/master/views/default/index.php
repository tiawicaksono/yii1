<?php
$path = $this->module->assetsUrl;
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($path . '/js/master.js', CClientScript::POS_END);
//$cs->registerScriptFile($baseUrl . '/js/jQuery.print.js', CClientScript::POS_END);
?>
<div class="row">
    <section class="col-lg-6 col-md-12 no-padding">
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">.:: KATEGORI OBAT</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'forminputpenguji')); ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="col-lg-12 no-padding" style="margin-bottom: 10px;">
                                <?php
                                echo CHtml::hiddenField('id_penguji', '');
                                echo CHtml::textField('nrp', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: NRP'));
                                echo CHtml::textArea('penguji', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: NAMA PENGUJI'));
                                ?>
                                <label>
                                    <input id="ttd" name="ttd" type="checkbox" class="flat-red"> Tandatangan?
                                </label>
                            </div>
                            <div class="col-lg-12 no-padding">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-warning" onclick="save('penguji', '<?php echo $this->createUrl('Default/SavePenguji'); ?>', 'new')">NEW</button>
                                    <button type="button" class="btn btn-primary" onclick="save('penguji', '<?php echo $this->createUrl('Default/SavePenguji'); ?>', 'update')">UPDATE</button>
                                </div>
                            </div>
                        </div>
                        <?php echo CHtml::endForm(); ?>
                        <div class="col-lg-8 col-md-12">
                            <?php echo CHtml::textField('penguji_search', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: SEARCH PENGUJI')); ?>
                            <table id="pengujiListGrid"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">.:: DISTRIBUTOR</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'forminputuser')); ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="col-lg-12 no-padding" style="margin-bottom: 10px;">
                                <?php
                                echo CHtml::hiddenField('id_user', '0', array('class' => 'form-control'));
                                echo CHtml::textField('username', '', array('class' => 'form-control', 'placeholder' => '.:: USERNAME'));
                                echo CHtml::passwordField('password', '', array('class' => 'form-control', 'placeholder' => '.:: PASSWORD'));
                                echo CHtml::dropDownList('hak_akses', '', array(
                                    'admin' => 'Admin',
                                    'loket' => 'Loket',
                                    'penguji' => 'Penguji',
                                ), array('class' => 'form-control'));
                                ?>
                            </div>
                            <div class="col-lg-12 no-padding">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-warning" onclick="saveUser('<?php echo $this->createUrl('Default/SaveUser'); ?>', 'new')">NEW</button>
                                    <button type="button" class="btn btn-primary" onclick="saveUser('<?php echo $this->createUrl('Default/SaveUser'); ?>', 'update')">UPDATE</button>
                                </div>
                            </div>
                        </div>
                        <?php echo CHtml::endForm(); ?>
                        <div class="col-lg-8 col-md-12">
                            <?php echo CHtml::textField('user_search', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: SEARCH USER')); ?>
                            <table id="userListGrid"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-6 col-md-12 no-padding">
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">.:: OBAT</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'forminputuser')); ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="col-lg-12 no-padding" style="margin-bottom: 10px;">
                                <?php
                                echo CHtml::hiddenField('id_user', '0', array('class' => 'form-control'));
                                echo CHtml::textField('username', '', array('class' => 'form-control', 'placeholder' => '.:: USERNAME'));
                                echo CHtml::passwordField('password', '', array('class' => 'form-control', 'placeholder' => '.:: PASSWORD'));
                                echo CHtml::dropDownList('hak_akses', '', array(
                                    'admin' => 'Admin',
                                    'loket' => 'Loket',
                                    'penguji' => 'Penguji',
                                ), array('class' => 'form-control'));
                                ?>
                            </div>
                            <div class="col-lg-12 no-padding">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-warning" onclick="saveUser('<?php echo $this->createUrl('Default/SaveUser'); ?>', 'new')">NEW</button>
                                    <button type="button" class="btn btn-primary" onclick="saveUser('<?php echo $this->createUrl('Default/SaveUser'); ?>', 'update')">UPDATE</button>
                                </div>
                            </div>
                        </div>
                        <?php echo CHtml::endForm(); ?>
                        <div class="col-lg-8 col-md-12">
                            <?php echo CHtml::textField('user_search', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: SEARCH USER')); ?>
                            <table id="userListGrid"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">.:: DISTRIBUTOR OBAT</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'forminputkaroseri')); ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="col-lg-12 no-padding" style="margin-bottom: 10px;">
                                <?php
                                echo CHtml::hiddenField('id_karoseri', '');
                                echo CHtml::textArea('karoseri', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: INPUT JENIS KAROSERI'));
                                ?>
                            </div>
                            <div class="col-lg-12 no-padding">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-warning" onclick="save('karoseri', '<?php echo $this->createUrl('Default/SaveKaroseri'); ?>', 'new')">NEW</button>
                                    <button type="button" class="btn btn-primary" onclick="save('karoseri', '<?php echo $this->createUrl('Default/SaveKaroseri'); ?>', 'update')">UPDATE</button>
                                </div>
                            </div>
                        </div>
                        <?php echo CHtml::endForm(); ?>
                        <div class="col-lg-6 col-md-12">
                            <?php echo CHtml::textField('karoseri_search', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: SEARCH JENIS KAROSERI')); ?>
                            <table id="karoseriListGrid"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">.:: Bahan Utama</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php echo CHtml::beginForm('', 'post', array('class' => 'form-horizontal', 'id' => 'forminputbahan')); ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="col-lg-12 no-padding" style="margin-bottom: 10px;">
                                <?php
                                echo CHtml::hiddenField('id_bahan', '');
                                echo CHtml::textArea('bahan', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: INPUT BAHAN UTAMA'));
                                ?>
                            </div>
                            <div class="col-lg-12 no-padding">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-warning" onclick="save('bahan', '<?php echo $this->createUrl('Default/SaveBahan'); ?>', 'new')">NEW</button>
                                    <button type="button" class="btn btn-primary" onclick="save('bahan', '<?php echo $this->createUrl('Default/SaveBahan'); ?>', 'update')">UPDATE</button>
                                </div>
                            </div>
                        </div>
                        <?php echo CHtml::endForm(); ?>
                        <div class="col-lg-6 col-md-12">
                            <?php echo CHtml::textField('bahan_search', '', array('class' => 'form-control text-besar', 'placeholder' => '.:: SEARCH BAHAN UTAMA')); ?>
                            <table id="bahanListGrid"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $('#userListGrid').datagrid({
        url: '<?php echo $this->createUrl('default/UserListGrid'); ?>',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 10, 20],
        columns: [
            [{
                    field: 'id_user',
                    title: '',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatButtonDelete
                },
                {
                    field: 'iduser',
                    title: '',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatButtonEdit
                },
                {
                    field: 'user_name',
                    title: 'Username',
                    width: 120,
                    halign: 'center',
                    align: 'left',
                    sortable: true
                },
                {
                    field: 'itemname',
                    title: 'Hak Akses',
                    width: 120,
                    halign: 'center'
                },
            ]
        ],
        onBeforeLoad: function(params) {
            params.user = $('#user_search').val();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });

    $('#pengujiListGrid').datagrid({
        url: '<?php echo $this->createUrl('default/PengujiListGrid'); ?>',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 10, 20],
        columns: [
            [{
                    field: 'id_namapenguji',
                    title: '',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatButtonDelete
                },
                {
                    field: 'id_nama_penguji',
                    title: '',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatButtonEdit
                },
                {
                    field: 'nrp',
                    title: 'NRP',
                    width: 130,
                    halign: 'center',
                    align: 'left'
                },
                {
                    field: 'nama_penguji',
                    title: 'Nama',
                    width: 200,
                    halign: 'center',
                    sortable: true
                },
            ]
        ],
        onBeforeLoad: function(params) {
            params.penguji = $('#penguji_search').val();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });

    $('#komersilListGrid').datagrid({
        url: '<?php echo $this->createUrl('default/komersilListGrid'); ?>',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 10, 20],
        columns: [
            [{
                    field: 'id_komersil',
                    title: '',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatButtonEdit
                },
                {
                    field: 'komersil',
                    title: 'Nama Komersil',
                    width: 220,
                    sortable: false
                },
            ]
        ],
        onBeforeLoad: function(params) {
            params.komersil = $('#komersil_search').val();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });

    $('#karoseriListGrid').datagrid({
        url: '<?php echo $this->createUrl('default/karoseriListGrid'); ?>',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 10, 20],
        columns: [
            [{
                    field: 'id_karoseri',
                    title: '',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatButtonEdit
                },
                {
                    field: 'karoseri',
                    title: 'Jenis Karoseri',
                    width: 220,
                    sortable: false
                },
            ]
        ],
        onBeforeLoad: function(params) {
            params.karoseri = $('#karoseri_search').val();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });

    $('#bahanListGrid').datagrid({
        url: '<?php echo $this->createUrl('default/bahanListGrid'); ?>',
        rownumbers: true,
        singleSelect: true,
        pagination: true,
        selectOnCheck: false,
        checkOnSelect: true,
        collapsible: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 10, 20],
        columns: [
            [{
                    field: 'id_bahan',
                    title: '',
                    width: 50,
                    halign: 'center',
                    align: 'center',
                    formatter: formatButtonEdit
                },
                {
                    field: 'bahan',
                    title: 'Bahan Utama',
                    width: 220,
                    sortable: false
                },
            ]
        ],
        onBeforeLoad: function(params) {
            params.bahan = $('#bahan_search').val();
        },
        onLoadError: function() {
            return false;
        },
        onLoadSuccess: function() {}
    });

    function formatButtonDelete(value) {
        var explode = value.split('|');
        var id = explode[0];
        var pilihan = explode[1];
        var itemname = explode[2];
        var urlAct;
        if (pilihan == 'penguji') {
            urlAct = '<?php echo $this->createUrl('default/DeletePenguji'); ?>';
            var button = '<button type="button" class="btn btn-danger" onclick="buttonDeletePenguji(\'' + id + '\', \'' + urlAct + '\')"><span class="glyphicon glyphicon-trash"></span></button>';
        } else if (pilihan == 'user') {
            urlAct = '<?php echo $this->createUrl('default/DeleteUser'); ?>';
            var button = '<button type="button" class="btn btn-danger" onclick="buttonDelete(\'' + id + '\', \'' + itemname + '\', \'' + urlAct + '\')"><span class="glyphicon glyphicon-trash"></span></button>';
        }

        return button;
    }

    function formatButtonEdit(value) {
        var explode = value.split('|');
        var id = explode[0];
        var pilihan = explode[1];
        var urlAct;
        if (pilihan == 'penguji') {
            urlAct = '<?php echo $this->createUrl('default/GetDetailEditPenguji'); ?>'
        } else if (pilihan == 'komersil') {
            urlAct = '<?php echo $this->createUrl('default/GetDetailEditKomersil'); ?>'
        } else if (pilihan == 'karoseri') {
            urlAct = '<?php echo $this->createUrl('default/GetDetailEditKaroseri'); ?>'
        } else if (pilihan == 'bahan') {
            urlAct = '<?php echo $this->createUrl('default/GetDetailEditBahan'); ?>'
        } else if (pilihan == 'user') {
            urlAct = '<?php echo $this->createUrl('default/GetDetailEditUser'); ?>'
        }
        var button = '<button type="button" class="btn btn-info" onclick="buttonEdit(\'' + id + '\', \'' + pilihan + '\', \'' + urlAct + '\')"><span class="glyphicon glyphicon-pencil"></span></button>';
        return button;
    }
</script>