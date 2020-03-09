<?php
session_start();
require_once "inc/db_conn.php";
$stmt=$pdo->prepare("UPDATE `room` SET `loading`=0 WHERE id_room=:id_room;");
$stmt->execute(array(id_room=>$_GET['id_room']));
header('Location:adminall.php');