<?php/*отображает два поля для авторизации и кнопку обработки*/
?>
<div>
			<form name="form_authorization" action="authorization_processing.php" enctype="multipart/form-data" method="POST">
			<p>
			<!-- <label>Логин</label> -->
			<input type="textarea" name="resnum" placeholder="номер брони">
			</p>
			<p>
			<!-- <label>пароль</label> -->
			<input type="text" name="password" placeholder="password">
			</p>
			<p>
			<input type = "submit" name = "submit1" value="ВХОД"/>
			</p>
			</form>

</div>
<hr>
