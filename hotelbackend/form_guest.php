<?php/*форма отправления данных бронирования доступна со странички сайта*/
?>
<div>
		<form name="guest_form" action="guest_form.php" enctype="multipart/form-data" method="POST">
			<p>
			<!--<label>Фамилия</label>-->
			<input type="text" name="surname" placeholder="Фамилия">
			</p>
			<p>
			<!-- <label>Имя</label> -->
			<input type="text" name="name" placeholder="Имя">
			</p>
			<p>
			<!-- <label>Отчество</label> -->
			<input type="text" name="patronymics" placeholder="Отчество">
			</p>
			<p>
			<!-- <label>Паспорт</label> -->
			<input type="text" name="pasport" placeholder="Паспорт">
			</p>
			<p>
			<!-- <label>Адрес</label> -->
			<input type="textarea" name="address" placeholder="Адрес">
			</p>
			<p>
			<!-- <label>Телефон</label> -->
			<input type="text" name="phone" placeholder="Телефон">
			</p>
			<hr>  
			<p>
			<input type = "submit" name = "submit" value="отправить"/>
			</p>
</div>





