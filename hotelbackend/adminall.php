<?php
require'admin.php'; /*атрибуты авторизации админа*/
require"admin_menu.php";/*адмишная менюшка*/
session_start();
require_once "inc/db_conn.php";
		$stmt = $pdo->prepare("SELECT r.number, r.seats, r.type, r.price, r.id_room FROM room r WHERE r.id_b=:id_build;");
		$stmt->execute(array(id_build=>$_SESSION['id_build']));
		if($res=$stmt->fetchall())
		{
			echo "<table>
			<tr>
				<th>Номер</th>
				<th>Количество мест</th>
				<th>Уровень комфорта</th>
				<th>Цена за сутки</th>
				<th></th>
			</tr>";
	
			foreach ($res as $val)
			{
			 echo "<tr>
						<th>".$val['number']."</th>
						<th>".$val['seats']."</th>
						<th>".$val['type']."</th>
						<th>".$val['price']."</th>
						<th><a href='http://localhost/hotelbackend/delete_admin.php?id=".$val['id_room']." ' class='button'>изменить</a></th>
					</tr>";
			}
		}
	echo "</table>";

	
