<?php
session_start();
try {
	require_once "inc/db_conn.php";
	/* unset($_POST); */
	$pdo->beginTransaction();
	$stmt=$pdo->prepare("INSERT INTO `keyvh`(`d_in`, `d_out`, `id_room`, `password`) VALUES (curdate(), :d_out, :id_room, :password);");
	$stmt->execute(array('d_out'=>$_POST['d_out'],id_room=>$_GET['id_room'], 'password'=>(string)rand(0,9999)));
	$stmt1=$pdo->query("SELECT @id_keyvh:=max(id_keyvh)from `keyvh`;");
	$id_keyvh = $stmt1->fetchColumn();
	$pdo->commit();
} catch (Exception $e) {
  $pdo->rollBack();
  echo "Ошибка: " . $e->getMessage();
}
$stmt=$pdo->prepare("UPDATE `room` SET `loading`=0 WHERE id_room=:id_room;");
$stmt->execute(array(id_room=>$_GET['id_room']));
header('Location: settlement_reser.php?id_keyvh='.$id_keyvh.''); 