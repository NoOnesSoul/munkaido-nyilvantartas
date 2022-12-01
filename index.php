<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munkaidő Nyilvántartás</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2><a href="./hasznalat.html">Használati útmutató</a></h2>
    <center>
        <h1>Add meg az évet és hónapot</h1>
        <form method="post" action="dokumentum.php">
            <input class="dateSelect" type="month" name="date" required><br />
            <input class="submit" type="submit" name="submit" value="Mehet">
        </form>
    </center>
</body>
</html>