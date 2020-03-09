<?php
require'admin.php'; /*атрибуты авторизации админа*/
require"admin_menu.php";/*адмишная менюшка*/
session_start();
require_once "inc/db_conn.php";
/* var_dump($_GET); */
$stmt=$pdo->prepare("SELECT k.password, k.id_keyvh, r.number, r.seats, r.type, k.d_in, k.d_out FROM room r INNER JOIN (keyvh k) ON r.id_room=k.id_room  WHERE k.id_keyvh=:id_keyvh;");
$stmt->execute(array(id_keyvh=>$_GET['id_keyvh']));
	if($res=$stmt->fetchall())
		{/* var_dump($res); */
		foreach($res as $key=>$val)
		{echo "<table>
			<tr>			
			<th><label>Номер брони:".$val['id_keyvh']."</label></th>
			<th></th>
			</tr>
			
			<tr>
			<th><label>Номер</label></th>
			<th>".$val['number']."</th>
			</tr>
			
			<tr>
			<th><label>Дата заезда</label></th>
			<th>".$val['d_in']."</th>
			</tr>
			
			<tr>
			<th><label>Дата выезда</label></th>
			<th>".$val['d_out']."</th>
			</tr> 
			<tr>
			<th><label>Код</label></th>
			<th>".$val['password']."</th>
			</tr>
		</table>
		";}		
		} 
		echo '<h2>Внесенные клиенты:</h2>';
$stmt1=$pdo->prepare("SELECT cl.id_cl, cl.surname, cl.name, cl.patronymics, cl.pasport, cl.email, cl.address, cl.phone, cl.master FROM client cl INNER JOIN (keyvh k, comb c) ON k.id_keyvh=c.id_keyvh and c.id_cl=cl.id_cl WHERE k.id_keyvh=:id_keyvh ;");
$stmt1->execute(array(id_keyvh=>$_GET['id_keyvh']));
		if($res=$stmt1->fetchall())
		{
			echo "<table>
			<tr>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Паспорт</th>
				<th>Email</th>
				<th>Адрес</th>
				<th>Телефон</th>
				<th>главный</th>
				<th></th>;
			</tr>";
			foreach($res as $key=>$val){
				echo "
				<form name='update' action='update.php?id_keyvh={$_GET['id_keyvh']}&id_cl={$val['id_cl']}' enctype='multipart/form-data' method='POST'>
				<tr>
				<th><input type='text' name='surname' placeholder='".$val['surname']."'</th>
				<th><input type='text' name='name' placeholder='".$val['name']."'</th>
				<th><input type='text' name='patronymics' placeholder='".$val['patronymics']."'</th>
				<th><input type='text' name='pasport' placeholder='".$val['pasport']."'</th>
				<th><input type='text' name='email' placeholder='".$val['email']."'</th>
				<th><input type='text' name='address' placeholder='".$val['address']."'</th>
				<th><input type='text' name='phone' placeholder='".$val['phone']."'</th>
				<th><input type='text' name='master' placeholder='".$val['master']."'</th>
				<th><input type = 'submit' name = '' value='Изменить'/></th>
				</tr>
				</form>";
				}
			echo "</table>";
		}
echo 
	"
	<h2>Добавление клиента</h2>
	
	<form name='add' action='add.php?id_keyvh={$_GET['id_keyvh']}' enctype='multipart/form-data' method='POST'>
	<table>
		<tr>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Паспорт</th>
				<th>Email</th>
				<th>Адрес</th>
				<th>Телефон</th>
				<th></th>
		</tr>
	<tr>
		<th><input type='text' name='surname' placeholder=''</th>
		<th><input type='text' name='name' placeholder=''</th>
		<th><input type='text' name='patronymics' placeholder=''</th>
		<th><input type='text' name='pasport' placeholder=''</th>
		<th><input type='text' name='email' placeholder=''</th>
		<th><input type='text' name='address' placeholder=''</th>
		<th><input type='text' name='phone' placeholder=''</th>
		<th>
		<input type = 'submit' name = '' value='Добавить'/>
		</th>	
	</tr>
	</table>
	</form>
	";
	echo "<a href='main.html' > Вернутся на главную </a>";
	
	