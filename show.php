<html>
 <head>
  <meta charset="UTF-8">
  <title>Show</title>
 </head>
 <body>
<h1>Просмотр записей в базе данных</h1>

<?php
require 'connect.php';
 
/* Посылаем запрос серверу */ 
if ($result = mysqli_query($link, 'SELECT * FROM Users'))
{ 
	while( $row = mysqli_fetch_assoc($result) ){ 
		echo "<pre>"."(ID: ".$row['id'].")&#9;".
			$row['first_name']." ".
			$row['second_name']."&#9;Возраст: ".
			$row['age']."&#9;Дата рождения: ".
			$row['date_of_birth']."</pre>";
	}
    /* Освобождаем используемую память */ 
    mysqli_free_result($result); 
}
 
/* Закрываем соединение */ 
mysqli_close($link); 
?>

</body>
</html>
