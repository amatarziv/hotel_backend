<?php
/* error_reporting(E_ERROR);
$error = array(); */
$search="";
foreach($_POST as $key=>$value){
	if (!$value)
	{
	  $search="Не все поля для поиска заполнены";
	  break;
	}
}
if($search=="")
{
		require_once "inc/db_conn.php";
		$stmt = $pdo->prepare("SELECT r.id_room FROM room r inner join build b on b.id_b=r.id_b WHERE `seats`= :seats and `type`= :type and b.id_b = :City and r.loading!=1 and r.id_room NOT IN(SELECT id_room FROM keyvh where d_in <= :d_out and d_out >= :d_in) LIMIT 1;");
		$stmt->execute(array(seats=>(int)$_POST['seats'],'type'=>$_POST['type'],City=>(int)$_POST['City'],'d_out'=>$_POST['d_out'],'d_in'=>$_POST['d_in']));
		if($stmt->fetchColumn()){
			$search="Свободные номера есть";
		}else $search="Сожалеем, но на данны момент свободных номеров нет";
}
header('Location: main.php?search='.$search.'');