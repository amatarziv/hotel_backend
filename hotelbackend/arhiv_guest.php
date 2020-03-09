<?php
require'admin.php'; /*атрибуты авторизации админа*/
require"admin_menu.php";/*адмишная менюшка*/
session_start();
require_once "inc/db_conn.php";
		$stmt = $pdo->prepare("SELECT r.number, k.id_keyvh, cl.id_cl, cl.surname, cl.name, cl.patronymics, cl.phone, cl.email,k.d_in, k.d_out FROM room r INNER JOIN (keyvh k, comb c, client cl) on r.id_room=k.id_room and k.id_keyvh=c.id_keyvh and c.id_cl=cl.id_cl WHERE r.id_b=:id_build and k.d_out<=curdate() GROUP BY k.d_in;");
		$stmt->execute(array(id_build=>$_SESSION['id_build']));
		if($res=$stmt->fetchall())
		{
			echo "<table>
			<tr>
				<th>Номер</th>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Телефон</th>
				<th>Электронная почта</th>
				<th>Дата заезда</th>
				<th>Дата выезда</th>
			</tr>";
	
			foreach ($res as $val)
			{
			 echo "<tr>
						<th>".$val['number']."</th>
						<th>".$val['surname']."</th>
						<th>".$val['name']."</th>
						<th>".$val['patronymics']."</th>
						<th>".$val['phone']."</th>
						<th>".$val['email']."</th>
						<th>".$val['d_in']."</th>
						<th>".$val['d_out']."</th>
					</tr>";
			}
		}
	echo "</table>";
