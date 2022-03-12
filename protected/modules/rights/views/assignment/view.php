<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Assignments'),
);

Yii::app()->clientScript->registerScript('search', "var ajaxUpdateTimeout;
     var ajaxRequest;
     
    $('input#name').blur(function(){
        //console.log($('#filter-form').serialize());
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiGridView.update(
            // this is the id of the CListView
                'assigment-grid',
                {data: ajaxRequest}
            )
        },
    // this is the delay
    300);
    });
    $('select#company').change(function(){
        //console.log($('#filter-form').serialize());
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiGridView.update(
            // this is the id of the CListView
                'assigment-grid',
                {data: ajaxRequest}
            )
        },
    // this is the delay
    300);
    });
    "
);
echo CHtml::beginForm(CHtml::normalizeUrl(array('/rights/assignment/view')), 'get', array('id' => 'filter-form', 'class' => 'form-horizontal'));
$this->beginWidget('zii.widgets.CPortlet', array(
    'title' => "Filter Data",
));
?>
<br>
<!--<div class="control-group">
    <div class="control-label">
        <label class="control-label">Role</label>
    </div>
    <div class="controls">
        <?php 
//        $role = CHtml::listData(TblUserRole::model()->findAll(array('order' => 'role_id ASC')), 'role_id', 'role_name');
//        echo CHtml::dropDownList('role', '', $role, array('id' => 'role_id', 'empty' => '--SELECT--')); 
        ?>
    </div>
</div>
--><div class="control-group">
    <div class="control-label">
        <label class="control-label">Name</label>
    </div>
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'name',
            'source' => $this->createUrl('../other/autocomplete'),
            // additional javascript options for the autocomplete plugin
            'options' => array(
                'minLength' => '1',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;',
                'id' => 'name'
            ),
        ));
        ?>
        <?php // echo CHtml::textField('name', (isset($_GET['name'])) ? $_GET['name'] : '', array('id'=>'name')); ?>
    </div>
</div>
<?php
$this->endWidget();
//    . CHtml::submitButton('Search', array('name'=>''))
echo CHtml::endForm();
?>
<div id="assignments">
    <h2><?php echo Rights::t('core', 'Assignments'); ?></h2>
    <p>
        <?php echo Rights::t('core', 'Here you can view which permissions has been assigned to each user.'); ?>
    </p>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'assigment-grid',
        'dataProvider' => $dataProvider,
        'template' => "{items}\n{pager}",
        'emptyText' => Rights::t('core', 'No users found.'),
        'htmlOptions' => array('class' => 'grid-view assignment-table'),
        'columns' => array(
            array(
                'name' => 'name',
                'header' => Rights::t('core', 'Name'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'name-column'),
                'value' => '$data->getAssignmentNameLink()',
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Roles'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'role-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Tasks'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'task-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Operations'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'operation-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
            ),
        )
    ));
    ?>
</div>