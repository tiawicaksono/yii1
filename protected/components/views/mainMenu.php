<ul class="nav navbar-nav">
    <li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php //echo CHtml::link("<i class='fa fa-home'></i> <span>Dashboard</span>", array('/site/home')) ?>
    </li>
    <?php
    foreach ($menu['menu'] as $dataMenu) :
        $conditionMenu = $dataMenu->menu_condition;
        if ($conditionMenu != NULL) {
            $conditionMenu = $dataMenu->menu_condition;
        } else {
            $conditionMenu = NULL;
        }
        $evalMenu = sprintf("return(%s);", $conditionMenu);
        if (eval($evalMenu)) {
            ?>
            <li <?php if (!empty($menu["sub_menu"][$dataMenu->menu_id])) echo "class = 'dropdown'"; ?>>
                <?php
                $right = (!empty($menu["sub_menu"][$dataMenu->menu_id])) ? ' <span class="caret"></span>' : '';

                if (!empty($menu["sub_menu"][$dataMenu->menu_id])) {
                    if (!empty($dataMenu->menu_parameter)) {
                        echo CHtml::link($dataMenu->menu_label . $right, array($dataMenu->menu_link, 'param' => $dataMenu->menu_parameter), array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'));
                    } else {
                        echo CHtml::link($dataMenu->menu_label . $right, array($dataMenu->menu_link), array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'));
                    }
                } else {
                    echo CHtml::link($dataMenu->menu_label . $right, array($dataMenu->menu_link));
                }

                if (!empty($menu["sub_menu"][$dataMenu->menu_id])) {
                    $arrSubMenu = $menu["sub_menu"][$dataMenu->menu_id];
                    ?>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        foreach ($arrSubMenu as $dataSubMenu):
                            if ($dataSubMenu->menu_condition != NULL) {
                                $conditionSubMenu = $dataSubMenu->menu_condition;
                            } else {
                                if (!empty($dataSubMenu->menu_parameter)) {
                                    echo "<li>" . CHtml::link($dataSubMenu->menu_label, array($dataSubMenu->menu_link, 'param' => $dataSubMenu->menu_parameter)) . "</li>";
                                } else {
                                    echo "<li>" . CHtml::link($dataSubMenu->menu_label, array($dataSubMenu->menu_link)) . "</li>";
                                }
                                $conditionSubMenu = NULL;
                            }
                            $eval = sprintf("return(%s);", $conditionSubMenu);
                            if (eval($eval)) {
                                if (!empty($dataSubMenu->menu_parameter)) {
//                                    echo "<li>" . CHtml::link("<i class='fa fa-circle-o'></i>" . $dataSubMenu->menu_label, array($dataSubMenu->menu_link, 'param' => $dataSubMenu->menu_parameter)) . "</li>";
                                    echo "<li>" . CHtml::link($dataSubMenu->menu_label, array($dataSubMenu->menu_link, 'param' => $dataSubMenu->menu_parameter)) . "</li>";
                                } else {
                                    echo "<li>" . CHtml::link($dataSubMenu->menu_label, array($dataSubMenu->menu_link)) . "</li>";
                                }
                            }
                        endforeach;
                        ?>
                    </ul>
                <?php } ?>
            </li>
            <?php
        }
    endforeach;
    ?>
    <li>
        <?php echo CHtml::link("<i class='fa fa-keyboard-o'></i> Ubah Password", array('/site/FormChangePassword')) ?>
    </li>
</ul>