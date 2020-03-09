<?php
session_start();
require_once "inc/db_conn.php";

	$pdo->query("SELECT @id_cl:=cl.id_cl FROM client cl INNER JOIN (keyvh k, comb c)on k.id_keyvh=c.id_keyvh and c.id_cl=cl.id_cl WHERE k.id_keyvh=".$_GET['id_keyvh'].";");
	$pdo->query("DELETE FROM `comb` WHERE id_keyvh=".$_GET['id_keyvh'].";");
	$pdo->query("DELETE FROM `client` WHERE id_cl=@id_cl;");
	$pdo->query("DELETE FROM `keyvh` WHERE id_keyvh=".$_GET['id_keyvh'].";");

	unset($_GET['id_keyvh']);

if(empty($_SESSION['admin']))
{		
	header ("Location:session_exit.php");
}else header ("Location:reserv.php");
?>
		