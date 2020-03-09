<?php
/*отображение элементов авторизации*/
session_start();
/* echo $_SESSION['admin']; */
?>

<div>
    <form name="show_authorization" action="session_exit.php" enctype="multipart/form-data" method="POST">
	<label>Адрес: <?php echo $_SESSION['address']?></label>
	</br>
	<label>Администратор: <?php echo $_SESSION['surname']?></label>
	<p>
	<input type = "submit" name = "submit" value="ВЫХОД"/>
	</p>
	<div>
	</form>
	<a href='adminall.php'>Главнадминская</a>
	</div>
</div>
