<?php
/* $_GET['day']=100; */
require'admin.php'; /*атрибуты авторизации админа*/
require"admin_menu.php";/*адмишная менюшка*/
session_start();
//echo $_POST['day'];
require_once "inc/function.php";
if((empty($_POST['day']))||($_POST['day']<=0)){
	$day=dateplus(1);
}else $day=dateplus($_POST['day']);
//echo $day;
?>
<div>
			<form name="num_free" action='num_free.php' enctype="multipart/form-data" method="POST">
			<p>
			<!-- <label>Логин</label> -->
			<input type="textarea" name="day" placeholder="количество дней">
			</p>
			<p>
			<input type = "submit" name = "submit" value="Поиск свободных"/>
			</p>
			</form>

</div>
<?php
		require_once "inc/db_conn.php";
		$stmt = $pdo->prepare("SELECT r.id_room, r.number,r.seats,r.type, r.price FROM room r inner join build b on b.id_b=r.id_b WHERE b.id_b = :City and r.loading!=1 and r.id_room NOT IN(SELECT id_room FROM keyvh where d_in <=:d_out and d_out>=curdate()) ORDER BY r.number;");
		$stmt->execute(array(City=>(int)$_SESSION['id_build'],'d_out'=>$day));
		if($res=$stmt->fetchAll())
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
						<th><a href='http://hotelbackend/settlement_free.php?id_room=".$val['id_room']." ' class='button'>Заселение</a></th>
					</tr>";
			}
		}
	echo "</table>";
