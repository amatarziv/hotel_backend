<?php
/*обработка авторизации*/
/* дописать везде $name=strip_tags($_POST['name'])*/
error_reporting(E_ERROR);// какая то типа как для компилятора  в конце заменить на 0
$error = array();
if(($_POST['resnum']!="")||(($_POST['password']!="")))
{
	if(($_POST['resnum']!='admin'))
	{  /*авторизация клиента*/
		require_once "inc/db_conn.php";
		$stmt = $pdo->prepare("SELECT cl.surname, k.id_keyvh FROM keyvh k INNER JOIN (comb c, client cl) ON k.id_keyvh=c.id_keyvh and c.id_cl=cl.id_cl WHERE k.id_keyvh=:resnum and k.password=:password and master=1 LIMIT 1");
		$stmt->execute(array(resnum=>$_POST['resnum'],
						'password'=>$_POST['password']));
		if($res=$stmt->fetch())
			{
			session_start();
			$_SESSION['resnum']=$res['id_keyvh'];
			$_SESSION['surname']=$res['surname'];
			header("Location:main.php");/* $messauthorization=""; */
			}else header("Location:main.php?messauthorization='Данные введены не верно'");/* $messauthorization="Данные введены не верно"; */
	}elseif(($_POST['resnum']=='admin')) /*авторизация админа*/
		{require_once "inc/db_conn.php";
		$stmt = $pdo->prepare("SELECT st.id_build, b.address, st.surname, st.name, profession FROM staff st INNER JOIN build b ON st.id_build=b.id_b WHERE st.password=:password");
		$stmt->execute(array('password'=>$_POST['password']));
		if($res=$stmt->fetch())
			{
			session_start();
			$_SESSION['address']=$res['address'];
			$_SESSION['surname']=$res['surname']. $res['name'];
			$_SESSION['admin']=1;
			$_SESSION['id_build']=$res['id_build'];			
			header("Location:adminall.php");
			}else header("Location:main.php?messauthorization='Данные введены не верно'");/* $messauthorization="Данные введены не верно"; */
		}
}else header("Location:main.php?messauthorization='Не все поля авторизации заполнены'");/* $messauthorization="Hе все поля авторизации заполнены"; */
/* header("Location:main.php?messauthorization={$messauthorization}"); */
/* header('Location: form_reservation.php?reservmess='.$reservmess.''); */
