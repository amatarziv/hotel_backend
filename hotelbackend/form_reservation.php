<?php
require_once "inc/function.php";
?>
<body>
	<div>
	<?php
	
		if(empty($_SESSION['admin']))
		{
			if(empty($_SESSION['surname']))
			{
				require "form_authorization.php";	
			}else {require "show_authorization.php"; 
			echo "<a href='personal_area.php' > Личный кабинет </a>";}
		}else require"admin.php";
		if($_GET['messauthorization']!="")
			{
				echo $_GET['messauthorization'];
			}
		?>
		</div>
	
		<div>

<form name="reservation" action="reservation.php" enctype="multipart/form-data" method="POST">
			 <p>
			 <select name="City" required>
			  <option value="">Город</option>
			  <option value="3">Минск</option>
			  <option value="2">Брест</option>
			  <option value="1">Витебск</option>
			 </select>
			 </p>
 			<p>
			<label>Дата заезда</label>
			<input type="date" name="d_in" min='<?php echo date('Y-m-d');?>'>
			</p>
			<p>
			<label>Дата выезда</label>
			<input type="date" name="d_out" min='<?php echo tomorrow();?>'>
			</p>
			<p>
			<select name="seats" required>
			<option value="">Число гостей</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select></p>
			</p>
			<p>
			 <select name="type" required>
			  <option value="">Уровень номеров</option>
			  <option value="standart">Standart</option>
			  <option value="luxe">Luxe</option>
			  </select>
			 </p>
			<p>
			<!-- <label>Фамилия</label> -->
			<input type="textarea" name="surname" placeholder="Фамилия">
			</p>
			<p>
			<!-- <label>Имя</label> -->
			<input type="textarea" name="name" placeholder="Имя">
			</p>
			<p>
			<!-- <label>Отчество</label> -->
			<input type="textarea" name="patronymics" placeholder="Отчество">
			</p>
			<p>
			<!-- <label>Отчество</label> -->
			<input type="textarea" name="phone" placeholder="Номер телефона '+123 45 6789101')">
			</p>
			<p>
			<!-- <label>Email</label> -->
			<input type="textarea" name="email" placeholder="Email">
			</p>
			<hr>  
			<p>
			<input type = "submit" name = "submit" value="Бронирование"/>
			</p>
			</form>
			
			<?php
			if($_GET['reservmess']){
			echo "<p>"."{$_GET['reservmess']}"."<p>";
			unset($_GET['reservmess']);
			}
			?>
			 
		</div>
	</body>
	
