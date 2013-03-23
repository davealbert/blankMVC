<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

        <?php if (isset($count)): ?>
            Inpatients : <?= $count ?>
        <?php endif ?>
            <table border="1" cellspacing="1">
            <?php
            $first = TRUE;
            while ($row = $result->row()) {
                echo "<tr>";
                if ($first) {

                    foreach ($row as $key => $val) {
                        echo "<td><b>$key</b>";
                    }
                    echo "</tr><tr>";
                    $first = FALSE;
                }
                foreach ($row as $k => $v) {
                    if ($k == 'TableID') {
                        echo '<td><a href="javasctipt:return(false);" onclick="select100(\'',$v,'\')">*</a> | <a href="javasctipt:return(false);" onclick="',$tabcol,'(\'', $v, '\')">', $v, '</a>';
                    } else {
                        echo "<td>$v";
                    }
                }
                //echo "<tr><td>{$row->Name}<td> {$row->RoomID}<td> {$row->BedID}<td> {$row->FinancialClassName}<td> {$row->ReasonForVisit}</tr>";
                echo "</tr>";
            }
            ?>
        </table>
