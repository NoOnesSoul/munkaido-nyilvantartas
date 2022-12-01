<?php
require_once('functions.php');
require_once('objects.php');
$dateSplit = explode("-", $_POST['date']);
$selYear = $dateSplit[0];
$selMonth = $dateSplit[1];
if(isset($_POST['date'])) {
    $dateSplit = explode("-", $_POST['date']);
    $selYear = $dateSplit[0];
    $selMonth = $dateSplit[1];
    $dateSplit = explode("-", $_POST['date']);
    $selYear = $dateSplit[0];
    $selMonth = $dateSplit[1];
    $api = "https://szunetnapok.hu/api/azthitteditthagytamakulcsot/".$selYear."/";
    $json = file_get_contents($api);
    $jdad = json_decode($json, true);
    $_SESSION['specialdays'] = $jdad['days'];
    $_SESSION['workdays'] = 0;
    $_SESSION['workhours'] = 0;
}

?>
    <table style="border: 2px solid black;">
        <tr>
            <th rowspan="2" colspan="2" class="cell" style="padding: 10px;">
                dátum
            </th>
            <th class="theader" style="border-right-width: 2px;" colspan="4">​</th>
            <th class="theader" style="border-left-width: 2px;" colspan="4">​</th>
        </tr>
        <tr>
            <th class="theader">érkezés</th>
            <th class="theader">távozás</th>
            <th class="theader">aláírás</th>
            <th class="theader" style="border-right-width: 2px;">óra</th>
            
            <th class="theader" style="border-left-width: 2px;">érkezés</th>
            <th class="theader">távozás</th>
            <th class="theader">aláírás</th>
            <th class="theader">óra</th>
        </tr>
        <?php for($i=1; $i<= monthLength($selYear, $selMonth); $i++) {
        $day = new Day;
        $day->setDate($selYear, $selMonth, $i);
        $displaydate = str_replace("-", ".", $day->date);
        if($day->type != "pihenonap" && $day->type != "munkaszunetiNap" && $day->type != "athelyezettPihenonap") {
            $_SESSION['workdays']++;
            $_SESSION['workhours']+=8;
        }
        ?>
            <tr>
                <td class="<?=$day->type?>">
                    <?=$day->dayname?>
                </td>
                <td class="<?=$day->type?>" style="border-right: 2px solid black">
                    <?=$displaydate?>
                </td>
                <?php for($j=1;$j<=8; $j++) { ?>
                    <td class="<?=$day->type?>" <?php if($j == 4) echo "style='border-right: 2px solid black;'" ?>></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>