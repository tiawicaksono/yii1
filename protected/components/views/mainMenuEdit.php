<ul class="sidebar-menu">
    <li class="header">MENU</li>
    <li>
        <?php echo CHtml::link("<i class='fa fa-home'></i> <span>Dashboard</span>", array('/site/home')) ?>
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
            <li <?php if (!empty($menu["sub_menu"][$dataMenu->menu_id])) echo "class = 'treeview'"; ?>>
                <?php
                $right = (!empty($menu["sub_menu"][$dataMenu->menu_id])) ? '<i class="fa fa-angle-left pull-right"></i>' : '';

                if (!empty($dataMenu->menu_parameter)) {
                    echo CHtml::link('<i class="fa ' . $dataMenu->menu_icon . '"></i> <span>' . $dataMenu->menu_label . '</span> ' . $right, array($dataMenu->menu_link, 'param' => $dataMenu->menu_parameter));
                } else {
                    echo CHtml::link('<i class="fa ' . $dataMenu->menu_icon . '"></i> <span>' . $dataMenu->menu_label . '</span> ' . $right, array($dataMenu->menu_link));
                }

                if (!empty($menu["sub_menu"][$dataMenu->menu_id])) {
                    $arrSubMenu = $menu["sub_menu"][$dataMenu->menu_id];
                    ?>
                    <ul class="treeview-menu">
                        <?php
                        foreach ($arrSubMenu as $dataSubMenu):
                            if ($dataSubMenu->menu_condition != NULL) {
                                $conditionSubMenu = $dataSubMenu->menu_condition;
                            } else {
                                if (!empty($dataSubMenu->menu_parameter)) {
                                    echo "<li>" . CHtml::link("<i class='fa fa-circle-o'></i>" . $dataSubMenu->menu_label, array($dataSubMenu->menu_link, 'param' => $dataSubMenu->menu_parameter)) . "</li>";
                                } else {
                                    echo "<li>" . CHtml::link("<i class='fa fa-circle-o'></i>" . $dataSubMenu->menu_label, array($dataSubMenu->menu_link)) . "</li>";
                                }
                                $conditionSubMenu = NULL;
                            }
                            $eval = sprintf("return(%s);", $conditionSubMenu);
                            if (eval($eval)) {
                                if (!empty($dataSubMenu->menu_parameter)) {
                                    echo "<li>" . CHtml::link("<i class='fa fa-circle-o'></i>" . $dataSubMenu->menu_label, array($dataSubMenu->menu_link, 'param' => $dataSubMenu->menu_parameter)) . "</li>";
                                } else {
                                    echo "<li>" . CHtml::link("<i class='fa fa-circle-o'></i>" . $dataSubMenu->menu_label, array($dataSubMenu->menu_link)) . "</li>";
                                }
                            }
                        endforeach;
                        ?>
                    </ul>
                <?php } ?>
            </li>
        <?php } ?>
        <?php
    endforeach;
    ?>
    <li>
        <?php echo CHtml::link("<i class='fa fa-keyboard-o'></i> <span>Ubah Password</span>", array('/site/FormChangePassword')) ?>
    </li>
</ul>