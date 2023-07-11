<?php
require_once('functions.php');
$dateSplit = explode("-", $_POST['date']);
$selYear = $dateSplit[0];
$selMonth = $dateSplit[1];

$monthnames = array(
    "01" => "Január",
    "02" => "Február",
    "03" => "Március",
    "04" => "Április",
    "05" => "Május",
    "06" => "Június",
    "07" => "Július",
    "08" => "Augusztus",
    "09" => "Szeptember",
    "10" => "Október",
    "11" => "November",
    "12" => "December"
);

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munkaidő Nyilvántartás</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="paper">
        <div class="paperheader">
            <?=$selYear?>
            <br />
            <?=$monthnames[$selMonth]?>
        </div>
        <div class="signatures">
            Munkáltató neve:<b>................................</b>
            <br />
            Szervezeti egység:<b>.............................</b>
        </div>
        <div class="explanations" style="border: 0px;">
            <?php include('explanations.html');?>
        </div>
        <div class="title">
            MUNKAIDŐ NYILVÁNTARTÁS
        </div>
        <center><div class="calendar">
            <?php include('tables.php'); ?>
        </div></center>
        <div class="monthInfos">
            <p>naptári napok száma:</p> <p><?=monthLength($selYear, $selMonth)?></p>
            <p>munkanapok száma:</p> <p><?=$_SESSION['workdays']?></p>
            <p style="padding-left: 20%;"><?=$_SESSION['workhours']?> óra</p>
        </div>
        <div class="signs">
            <table>
                <tr>
                    <td rowspan="6" style="position: relative; padding-right: 20px;"><p style="position: relative; top: -55px;">Jelölések:</p></td>
                    <td>SZ</td><td>szabadság</td>
                </tr>
                <tr>
                    <td>B</td><td>betegség</td>
                </tr>
                <tr>
                    <td>TSZ</td><td>tanulmányi szabadság</td>
                </tr>
                <tr>
                    <td>KI</td><td>kiküldetés</td>
                </tr>
                <tr>
                    <td>FN</td><td>fizetés nélküli szabadság</td>
                </tr>
                <tr>
                    <td>RM</td><td>rendkívüli munkaidő</td>
                </tr>
            </table>
        </div>
        <div class="footerSignature">
            <b>____________________________</b>
            <br />
            vezető aláírása
        </div>
    </div>
</body>
</html>
