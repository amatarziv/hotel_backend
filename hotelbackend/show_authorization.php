<?php
/*отображение элементов авторизации*/
?>
<div>
    <form name="show_authorization" action="session_exit.php" enctype="multipart/form-data" method="POST">
	<label>Номер брони: <?php echo $_SESSION['resnum']?></label>
	</br>
	<label>Фамилия: <?php echo $_SESSION['surname']?></label>
	<p>
	<input type = "submit" name = "submit" value="ВЫХОД"/>
	</p>
</div>


