<?php
/*Заселение в свободный номер из панели админа*/
/**/
session_start();
require_once "inc/db_conn.php";
require_once "inc/function.php";
$stmt=$pdo->prepare("UPDATE `room` SET `loading`=1 WHERE id_room=:id_room;");
$stmt->execute(array(id_room=>$_GET['id_room']));
?>

<form name='d_in' action='settlement.php?id_room=<?php echo $_GET['id_room']?> ' enctype='multipart/form-data' method='POST'>
			<p>
			<label>Дата выезда</label>
			<input type='date' name='d_out'	min='<?php echo tomorrow();?>'/>
			</p>
			<p>
			<hr>  
			<p>
			<input type = 'submit' name = 'submit' value='Заселение'/>
			</p>
			</form>
		</form>
<form name='number' action='settlement_cancel.php?id_room=<?php echo $_GET['id_room']?> ' enctype='multipart/form-data' method='POST'>
			<input type = 'submit' name = 'submit' value='cancel'/>
</form>
	
	