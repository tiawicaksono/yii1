<table class="table table-striped">
    <thead>
        <tr>
            <th class="center">
                <input type="checkbox" id="checkAllCis2" class="regular-checkbox"><label for="checkAllCis2"></label>
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
        foreach ($pengujicis2 as $cis2):
            ?>
            <tr>
                <th scope="row" class="center">
                    <input name="checkbox2[<?php echo $cis2->id_user; ?>]" type="checkbox" id="<?php echo $cis2->id_user; ?>" class="regular-checkbox checkbox-cis2">
                    <label for="<?php echo $cis2->id_user; ?>"></label>
                </th>
                <td>
                    <?php echo $cis2->username; ?>
                    <input type="hidden" value="<?php echo $cis2->id_user; ?>" name="id_user2[]">
                </td>
                <td class="center">
                    <input name="prauji2[<?php echo $cis2->id_user; ?>]" type="checkbox" id="prauji2-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis2->prauji == 'true' ? "checked" : ""; ?> /><label for="prauji2-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="emisi2[<?php echo $cis2->id_user; ?>]" type="checkbox" id="emisi2-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis2->emisi == 'true' ? "checked" : ""; ?> /><label for="emisi2-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="pitlift2[<?php echo $cis2->id_user; ?>]" type="checkbox" id="pitlift2-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis2->pitlift == 'true' ? "checked" : ""; ?> /><label for="pitlift2-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="headlight2[<?php echo $cis2->id_user; ?>]" type="checkbox" id="headlight2-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis2->headlight == 'true' ? "checked" : ""; ?> /><label for="headlight2-<?php echo $no; ?>"></label>
                </td>
                <td class="center">
                    <input name="brake2[<?php echo $cis2->id_user; ?>]" type="checkbox" id="brake2-<?php echo $no; ?>" class="regular-checkbox" <?php echo $cis2->brake == 'true' ? "checked" : ""; ?> /><label for="brake2-<?php echo $no; ?>"></label>
                </td>
<!--                <td class="center">
                    <input name="gandengan2[<?php // echo $cis2->id_user; ?>]" type="checkbox" id="gandengan2-<?php // echo $no; ?>" class="regular-checkbox" <?php // echo $cis2->gandengan == 'true' ? "checked" : ""; ?> /><label for="gandengan2-<?php // echo $no; ?>"></label>
                </td>-->
            </tr>
            <?php
            $no++;
        endforeach;
        ?>
    </tbody>
</table>