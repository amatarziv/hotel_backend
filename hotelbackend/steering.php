<?php


/*файл не нужен*/




/*обработчик кнопок*/
/* var_dump($_POST['submit']);
echo "<hr>";

foreach($_POST as $key=>$value){
	if (!$value)
	{
		echo "поле $key не заполнено"."<hr>";
		header('location:/main.php');
	}
} */
switch ($_POST['submit1']||$_POST['submit2']){
	case "ВХОД": 
		{
			session_start();
			$_SESSION['number']='a305';
			$_SESSION['surname']="Сидоров";
		}break;
	
	case "ПОИСК":
		{
			require "search_free.php";
		}break;
	
	case "Бронирование": 
		{
			require "reservation.php";
		}break;
	
	case "ВЫХОД":
		{
		session_destroy();
		}break;
}
header("Location:main.php");
?>