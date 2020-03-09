<?php
session_start();
require_once "inc/db_conn.php";
/* var_dump($_POST);
echo '<hr>'; */
foreach($_POST as $key=>$val){
	if($val!=0||$val!=''){
	$sql="UPDATE `client` SET {$key}=:val WHERE id_cl=:id_cl;";
/* 		echo $sql;
		echo "<hr>";
		echo $val; */
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array('val'=>$val, id_cl=>$_GET['id_cl']));
	}
}
header('Location:settlement_reser.php?id_keyvh='.$_GET['id_keyvh'].'');