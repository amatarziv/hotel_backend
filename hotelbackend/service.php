<div>
<form name="serch" action="number_search.php" enctype="multipart/form-data" method="POST">
<p>
<?php
require "inc/db_conn.php";
$sql = 'SELECT * from service';
foreach ($pdo->query($sql) as $row) {
    
	echo "<input type='radio' name='".$row['id_serv']."' value='".$row['id_serv']."' '/>'".$row['descr']."' <br />";
	echo '<hr>';
	
}
?>
</p>
</form>
</div>


