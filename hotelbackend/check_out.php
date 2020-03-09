<?php
require'admin.php'; /*атрибуты авторизации админа*/
require"admin_menu.php";/*адмишная менюшка*/
require_once "inc/function.php";
session_start();
require_once "inc/db_conn.php";
		$stmt = $pdo->prepare("UPDATE `keyvh` SET `d_out`= curdate() WHERE `id_keyvh`=:id_keyvh;");
		$stmt->execute(array(id_keyvh=>$_GET['id_keyvh']));
		$stmt1=$pdo->query("SELECT k.d_in, k.d_out, r.price FROM room r INNER JOIN keyvh k ON r.id_room=k.id_room WHERE k.id_keyvh=".$_GET['id_keyvh'].";");
while ($row = $stmt1->fetch())
{
	$day=date_interval($row['d_in'],$row['d_out']);
    echo "Дата заезда:  ".$row['d_in'] . "<br>";
	echo "Дата выезда:  ".$row['d_out'] . "<br>";
	echo "Стоимость проживания:  ".$row['price'] . "BYN/сут.<br>";
	echo "Количество дней проживания:  ".$day."<br>";
	echo "Стоимость ИТОГО:  ".$row['price']*$day . "BYN<br>";
}
		