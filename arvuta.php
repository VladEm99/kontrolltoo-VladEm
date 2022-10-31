<?php
$today = date('Y-m-d H:i:s');
$now = time(); // текущее время
$end_date_str = strtotime("2023-06-01"); // конец учебного года
$end_date = date("2023-06-01 00:00:00"); // конец учебного года
$days_to = $end_date_str - $now; // получим разность дат в секундах
echo("Сегодня: ".$today.'<br>');
echo("Конец учебного года: ".$end_date.'<br>');
echo ("Осталось: ".floor($days_to/(60*60*24))." дней");
?>
