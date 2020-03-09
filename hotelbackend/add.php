<?php
try {
	require_once "inc/db_conn.php";
	$pdo->beginTransaction();
	$stmt = $pdo->prepare("INSERT INTO `client`(`surname`, `name`, `patronymics`, `pasport`, `address`, `phone`, `email`) VALUES (:surname, :name, :patronymics, :pasport, :address, :phone, :email);");
	$stmt->execute(array('surname'=>$_POST['surname'], 'name'=>$_POST['name'], 'patronymics'=>$_POST['patronymics'], 'pasport'=>$_POST['pasport'], 'address'=>$_POST['address'], 'phone'=>$_POST['phone'], 'email'=>$_POST['email']));
	$stmt1=$pdo->query("SELECT @id_cl:=max(id_cl)from `client`;");
	$stmt2=$pdo->prepare("INSERT INTO `comb` (`id_keyvh`, id_cl) VALUES (:id_keyvh, @id_cl);");
	$stmt2->execute(array(id_keyvh=>$_GET['id_keyvh']));
	$pdo->commit();
} catch (Exception $e) {
  $pdo->rollBack();
  echo "Ошибка: " . $e->getMessage();
}
header('Location:settlement_reser.php?id_keyvh='.$_GET['id_keyvh'].'');