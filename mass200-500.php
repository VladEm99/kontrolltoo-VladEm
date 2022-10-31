<?php
require_once ('conf.php');
global $yhendus;

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
    <a href="AndmetTabelist.php">Sorditud vanuse jargi</a>
    <a href="https://github.com/VladEm99/laululeht-main-V1">Git HUB</a>
</nav>
<br>

<table class="zigzag">
    <tr>
        <th>Kustutamine</th>
        <th>Veisenimi</th>
        <th>Mass</th>
        <th>Vanus</th>
        <th>Pilt</th>


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
