<link rel="stylesheet" href="style.css">
<?php
require_once ('conf.php');
global $yhendus;

// tabeli andmete lisamine
if(!empty($_REQUEST["uusnimi"."uusmass"."uusvanus"])){

    $kask=$yhendus->prepare("INSERT INTO veised(veisenimi, mass, vanus) VALUES (?, ?, ?");
    $kask->bind_param('s', $_REQUEST["uusnimi"."uusmass"."uusvanus"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

//kustutamine
if(isset($_REQUEST['kustuta'])) {
    $kask = $yhendus->prepare("DELETE FROM veised Where id=?");
    $kask->bind_param('s', $_REQUEST['kustuta']);
    $kask->execute();
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Laulude adminleht</title>
    <link rel="stylesheet" type="text/css" href="style-admin.css">
</head>
<body>
<h1>Veisede andmet</h1>
<nav>
    <a href="AndmetTabelist.php">Sorditud vanuse jargi</a>
    <a href="mass200-500.php">Sorditud vanuse jargi</a>
    <a href="AndmeteLisamine.php">Lisa andmet tabelisse</a>
    <a href="arvuta.php">Õppepäeva Kalkulaator</a>
    <a href="https://github.com/VladEm99/kontrolltoo-VladEm">Git HUB</a>
</nav>

<br>

<h2>Veise lisamine</h2>
<form action="?" method="post">
    <label for="nimi">Lisa</label>
    <input type="text" name="uusnimi" id="nimi" placeholder="veisenimi">
    <input type="number" name="uusmass" id="nimi" placeholder="mass">
    <input type="number" name="uusvanus" id="nimi" placeholder="vanus">
    <input type="submit" value="Ok">
</form>

<br>

<table class="zigzag">
    <tr>
        <th>Kustutamine</th>
        <th>Veisenimi</th>
        <th>Mass</th>
        <th>Vanus</th>


    </tr>
    <?php
    // tabeli sisu näitamine
    $kask=$yhendus->prepare('SELECT id, veisenimi, mass, vanus FROM veised WHERE mass >= 200 and mass <= 500');
    $kask->bind_result($id, $veisenimi, $mass, $vanus);
    $kask->execute();
    while($kask->fetch()){
        $seisund="Peidetud";
        $param="naitamine";
        $tekst="Näita";

        echo "<tr>";
        echo "<td><a href='?kustuta=$id'>Kustuta</a></td>";
        echo "<td>".htmlspecialchars($veisenimi)."</td>";
        echo "<td>$mass</td>";
        echo "<td>$vanus</td>";
        echo "<td></td>";
        echo "</tr>";



        echo "</tr>";
    }


    ?>

</table>
</body>
<?php
$yhendus->close();
?>
</html>

