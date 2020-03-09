<?php
require_once "inc/function.php";
$day=3;
echo dateplus($day);
echo '<hr>';

$d='2020-12-22';
$d1='2020-12-30';
echo date_interval($d,$d1);
echo '<hr>';
?>

