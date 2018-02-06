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
		require_once 'connect.php';
		require_once 'handle.php';
		if (isset($_POST['add'])){
			add_record($link, $_POST);
		}
		elseif (isset($_POST['edit'])){			
			update_record($link,$_POST);
		}
		elseif (isset($_POST['delete'])){
			delete_record($link, $_POST);
		}
		
		mysqli_close($link); 
		?>
	</body>
</html>