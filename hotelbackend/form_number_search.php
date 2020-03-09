<form name="serch" action="search_free.php" enctype="multipart/form-data" method="POST">
			 <p>
			 <select name="City">
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
			<input type="date" name="d_out" 	min='<?php echo tomorrow();?>'>
			</p>
			<p>
			<select name="seats">
			<option value="">Число гостей</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select></p>
			</p>
			<p>
			 <select name="type">
			  <option>Уровень номеров</option>
			  <option value="standart">Standart</option>
			  <option value="luxe">Luxe</option>
			  </select>
			 </p>
			<hr>  
			<p>
			<input type = "submit" name = "submit" value="ПОИСК"/>
			</p>
</form>