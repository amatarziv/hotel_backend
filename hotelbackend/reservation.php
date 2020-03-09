<?php
/*бронирование номера*/
//var_dump($_POST);

try { 
require_once "inc/db_conn.php"; 
  $pdo->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION
					/* PDO::ATTR_PERSISTENT => true */);/*установка атрибута постоянного соединения*/

  $pdo->beginTransaction();
		/*поиск id_room свободного номера на время заезда*/
		$stmt = $pdo->prepare("SELECT @id_room:=r.id_room FROM room r inner join build b on b.id_b=r.id_b WHERE `seats`= :seats and `type`= :type and b.id_b = :City and r.loading!=1 and id_room NOT IN(SELECT id_room FROM keyvh where d_in <= :d_out and d_out >= :d_in) LIMIT 1;");
		$stmt->execute(array(seats=>(int)$_POST['seats'],
							'type'=>$_POST['type'],
							City=>(int)$_POST['City'],
							'd_out'=>$_POST['d_out'],
							'd_in'=>$_POST['d_in']));
		/*внесение данных в таблицу `keyvh`*/
		$stmt1 = $pdo->prepare("INSERT INTO `keyvh`(`d_in`, `d_out`, `id_room`, `password`) VALUES (:d_in,:d_out,@id_room,:pass);");
		$stmt1->execute(array('d_in'=>$_POST['d_in'],
						'd_out'=>$_POST['d_out'],
						'pass'=>(string)rand(0,9999)));
		/*внесение данных в таблицу `client`*/
		$stmt2=$pdo->prepare("INSERT INTO `client`(`surname`, `name`, `patronymics`, `phone`, `email`,`master`) VALUES (:surname, :name, :patronymics, :phone, :email,1);");
		$stmt2->execute(array('surname'=>$_POST['surname'],
							'name'=>$_POST['name'],
							'patronymics'=>$_POST['patronymics'],
							'phone'=>$_POST['phone'],
							'email'=>$_POST['email']));
		/*нахождение последнего id_keyvh*/
		$stmt3=$pdo->query("SELECT @id_keyvh:=max(id_keyvh)from `keyvh`;");
		//$stmt3->execute();
		/*нахождение последнего id_cl*/
		$stmt4=$pdo->query("SELECT @id_cl:=max(id_cl)from `client`;");
		//$stmt4->execute();
		/*заполнение таблицы comb*/
		$stmt5=$pdo->query("INSERT INTO `comb`(id_keyvh, id_cl) VALUES(@id_keyvh,@id_cl);");
		//$stmt5->execute();
		$pdo->commit();
  
} catch (Exception $e) {
  $pdo->rollBack();
  echo "Ошибка: " . $e->getMessage();
}
/*запрос данных для отправки клиенту по почте*/
		$stmt = $pdo->prepare("SELECT b.address,r.seats, r.type, r.price, k.id_keyvh, k.password, k.d_in, k.d_out, cl.surname, cl.email FROM build b  inner join (room r, keyvh k, comb c, client cl) on b.id_b=r.id_b and r.id_room=k.id_room and k.id_keyvh=c.id_keyvh and c.id_cl=cl.id_cl WHERE k.d_in=:d_in AND k.d_out=:d_out AND cl.surname=:surname AND cl.name=:name AND cl.patronymics=:patronymics");
		$stmt->execute(array('surname'=>$_POST['surname'],
							'name'=>$_POST['name'],
							'patronymics'=>$_POST['patronymics'],
							'd_in'=>$_POST['d_in'],
							'd_out'=>$_POST['d_out']));
		if($var=$stmt->fetch()){
			
								$to = $var['email']; 
								// тема письма
								$subject = 'Уведомление о бронировании номера';
								// текст письма
								$message = "Вы забронировали номер в отеле `VojageHotel`.
								 На фамилию '{$var['surname']}'.
								 Адрес гостиницы:'{$var['address']}' 
								 '{$var['seats']}'х местный номер
								 уровень комфорта - '{$var['type']}'
								 цена номера в сутки - '{$var['price']}' BYN
								 дата заезда - '{$var['d_in']}'
								 дата выезда - '{$var['d_out']}' 
								 При необходимости, отмену бронирования можно осуществить по телефону отеля, либо из личного кабинета на сайте отеля,  номер брони - '{$var['id_keyvh']}', пароль - '{$var['password']}'
								 С уважением ";
								// Дополнительные заголовки
								$headers = 'Уважаемому клиенту';
								// Отправляем
								mail($to, $subject, $message, $headers);
								$reservmess="Бронирование прошло успешно, данные о бронировании высланы вам на электронную почту указанную в форме бронирования";
		}else $reservmess="Сожалеем, но бронирование не состоялось. Пожайлуста, повторите процесс бронирования еще раз";
header('Location: form_reservation.php?reservmess='.$reservmess.'');





