<?php
/* get_header(); */
error_reporting(0);
session_start();
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
		<?php
			require"form_number_search.php";
			if($_GET['search']!="")
			{
				echo $_GET['search'];
				unset($_GET['search']);
			}		
		?>    
		</div>
		<hr>
		<div>
		<a href='form_reservation.php' > Бронирование </a>
		</div>
	</body>
	

