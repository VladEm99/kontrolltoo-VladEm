<?php
$serverinimi="localhost";
$kasutaja="VladEm99";
$parool="12345";
$andmebaas="VladEm99";

$yhendus=new mysqli($serverinimi, $kasutaja, $parool, $andmebaas);

$yhendus->set_charset('UTF8');

?>