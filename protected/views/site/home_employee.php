<?php $baseUrl = Yii::app()->theme->baseUrl; ?>
<ul class="users-list clearfix">
    <?php
    foreach ($dataEmployee as $employee):
        ?>
        <li>
            <a data-toggle="tooltip" title="<?php echo $employee->employee_name; ?>">
                <img src="<?php echo $baseUrl; ?>/dist/img/<?php echo $employee->gender . '.png'; ?>">
                <span class="users-list-name"><?php echo $employee->employee_name; ?></span>
            </a>
            <span class="users-list-date">Today</span>
        </li>
    <?php endforeach; ?>
</ul><!-- /.users-list -->