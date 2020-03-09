
<?php
/* require_once "inc/db_conn.php";
require_once "inc/function.php"; */

echo "вы зашли на свою страничку";
/* foreach($_POST as $key=>$value){
	if (!$value)
	{
		echo "поле $key не заполнено"."<hr>";
		break;
	}
	$allowed = array("surname","name","patronymics","pasport","address","phone"); // allowed fields
	$sql = "INSERT INTO client SET ".pdoSet($allowed,$values);
	$stm = $pdo->prepare($sql);
	$stm->execute($values); */



















/* $surname=$_POST['surname'];
$name=$_POST['name'];
$patronymics=$_POST['patronymics'];
$pasport=$_POST['pasport'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$password=$_POST['password'];
echo $surname."<hr>";
echo $name."<hr>";
echo $patronymics. '<hr>';
echo $pasport. '<hr>';
echo $address. '<hr>';
echo $phone. '<hr>';
echo $password. '<hr>';
 error_reporting(E_ERROR);// какая то типа как для компилятора
$error = array();
var_dump($_POST);
require "inc/db_conn.php";
$stmt = $pdo->prepare("INSERT INTO `client` (`surname`,`name`,`patronymics`,`pasport`,`address`,`phone`) VALUES(':surname', ':name', ':patronymics', ':pasport', ':address', ':phone')");
$stmt->bindParam("surname", $surname);
$stmt->bindParam("name", $name);
$stmt->bindParam("patronymics", $patronymics);
$stmt->bindParam("pasport", $pasport);
$stmt->bindParam("address", $address);
$stmt->bindParam("phone",$phone);
$stmt->bindValue(7, $password);
var_dump($stmt);
$stmt->execute();
header('location:/main.html'); */
?>
													