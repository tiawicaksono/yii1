<div class="table-responsive">
    <table class="table no-margin no-padding">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Taksi</th>
                <th>Alamat</th>
                <th style="text-align: center">Jml</th>
                <th>Penguji</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $today = date("Y-m-d");
            $date_today = strtotime($today);
            foreach ($schedule as $scheduleData):
                $date_jadwal = strtotime($scheduleData->schedule_date);
                if ($date_today > $date_jadwal)
                    $style = "background: #DEDEDE; text-decoration: line-through;";
                else
                    $style = "";
                ?>
                <tr style="<?php echo $style; ?>">
                    <td><?php echo date("d/m/Y", strtotime($scheduleData->schedule_date)); ?></td>
                    <td><?php echo $scheduleData->taxi; ?></td>
                    <td><?php echo $scheduleData->taxi_address; ?></td>
                    <td align="center">
                        <span class="badge bg-aqua" style="<?php echo $style; ?>"><?php echo $scheduleData->jumlah; ?></span>
                    </td>
                    <td>
                        <ul style="padding:0px">
                            <?php
                            $dataPenguji = array_map('intval', explode(';', $scheduleData->id_user));
                            foreach ($dataPenguji as $penguji):
                                $idPenguji = intval($penguji);
//                            $employeeName[] = TblEmployee::model()->findByPk($idPenguji)->employee_short_name;
                                echo "<li>" . TblUser::model()->findByPk($idPenguji)->username . "</li>";
                            endforeach;
//                        $long_string = implode(', ', $employeeName);
//                        echo $long_string;
//                        unset($employeeName);
                            ?>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div><!-- /.table-responsive -->