<table class="table table-striped">
    <thead>
        <tr>
            <th class="center">
                <input type="checkbox" id="checkAllCis1" class="regular-checkbox"><label for="checkAllCis1"></label>
            </th>
            <th>PENGUJI</th>
            <th class="center">PRA</th>
            <th class="center">EMS</th>
            <th class="center">PL</th>
            <th class="center">LMP</th>
            <th class="center">REM</th>
            <!--<th class="center">GDG</th>-->
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($pengujicis1 as $cis1):
            ?>
            <tr>
                <th scope="row" class="center">
                    <input name="checkbox1[<?php echo $cis1->id_user; ?>]" type="checkbox" id="<?php echo $cis1->id_user; ?>" class="regular-checkbox checkbox-cis1">
                    <label for="<?php echo $cis1->id_user; ?>"></label>
                </th>
                <td>
                    <?php echo $cis1->username; ?>
                    <input type="hidden" value="<?php echo $cis1->id_user; ?>" name="id_user1[]">
                </td>
                <td class="center">
                    <input name="prauji1[<?php echo $cis1->id_user; ?>]" type="checkbox" id="prauji1-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis1->prauji == 'true' ? "checked" : ""; ?> />
                    <label for="prauji1-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="emisi1[<?php echo $cis1->id_user; ?>]" type="checkbox" id="emisi1-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis1->emisi == 'true' ? "checked" : ""; ?> />
                    <label for="emisi1-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="pitlift1[<?php echo $cis1->id_user; ?>]" type="checkbox" id="pitlift1-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis1->pitlift == 'true' ? "checked" : ""; ?> />
                    <label for="pitlift1-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="headlight1[<?php echo $cis1->id_user; ?>]" type="checkbox" id="headlight1-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis1->headlight == 'true' ? "checked" : ""; ?> />
                    <label for="headlight1-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="brake1[<?php echo $cis1->id_user; ?>]" type="checkbox" id="brake1-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis1->brake == 'true' ? "checked" : ""; ?> />
                    <label for="brake1-<?php echo $no; ?>"></label>
                </td>
<!--                <td class="center">
                    <input name="gandengan1[<?php // echo $cis1->id_user; ?>]" type="checkbox" id="gandengan1-<?php // echo $no; ?>" class="regular-checkbox" <?php // echo $cis1->gandengan == 'true' ? "checked" : ""; ?> />
                    <label for="gandengan1-<?php // echo $no; ?>"></label>
                </td>-->
            </tr>
            <?php
            $no++;
        endforeach;
        ?>
    </tbody>
</table>