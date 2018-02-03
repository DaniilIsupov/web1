<html>
 <head>
  <meta charset="UTF-8">
  <title>Add/Edit/Delete</title>
 </head>
 <body>
<h1>Добавление/Редактирование/Удаление записи</h1>
<form method="POST" action="">
	<label>ID:</label><br>
	<input type="text" name="id"><br>
	<label>Имя:</label><br>
	<input type="text" name="first_name"><br>
	<label>Фамилия:</label><br>
	<input type="text" name="second_name"><br>
	<label>Возраст:</label><br/>
	<input type="text" name="age"><br>
	<label>Дата рождения:</label><br>
	<input type="text" name="date_of_birth" value=""><br>
	<br>
	<input name="add" type="submit" value="Добавить"><br>
	<input name="edit" type="submit" value="Редактировать"><br>
	<input name="delete" type="submit" value="Удалить"><br>
</form>
<?php
require 'connect.php';

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$second_name = $_POST['second_name'];
$age = $_POST['age'];
$date_of_birth = $_POST['date_of_birth'];

if (isset($_POST['add'])){
	mysqli_query($link, "INSERT INTO Users(first_name, second_name, age, date_of_birth)".
		"VALUES('{$first_name}', '{$second_name}', '{$age}', '{$date_of_birth}');");
}
elseif (isset($_POST['edit'])){
	if (isset($_POST['first_name']))
		mysqli_query($link, "UPDATE Users SET first_name = '{$first_name}' WHERE id = '{$id}'");
	if (isset($_POST['second_name']))
		mysqli_query($link, "UPDATE Users SET second_name = '{$second_name}' WHERE id = '{$id}'");
	if (isset($_POST['age']))
		mysqli_query($link, "UPDATE Users SET age = '{$age}' WHERE id = '{$id}'");
	if (isset($_POST['date_of_birth']))
		mysqli_query($link, "UPDATE Users SET date_of_birth = '{$date_of_birth}' WHERE id = '{$id}'");
}
elseif (isset($_POST['delete'])){
	mysqli_query($link, "DELETE FROM Users WHERE id = '{$id}'");
}

/* Закрываем соединение */ 
mysqli_close($link); 
?>

</body>
</html>