<html>
	<head>
		<meta charset="UTF-8">
		<title>Show</title>
	</head>
	<body>
		<h1>Просмотр записей в базе данных</h1>
		
		<?php
		require 'connect.php';
		?>

		<table border = "1" align = "center" cellspacing = "0" cellpadding = "25">
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Возраст</th>
				<th>Дата рождения</th>
			</tr>
				<?php
				$result = mysqli_query($link, "SELECT * FROM Users");
				while ($row = mysqli_fetch_row($result))
				{
					echo "<tr>";
					foreach($row as $cell) 
						echo "<td>".$cell."</td>";
					echo "</tr>";
				}
				?>
		</table>
		<?php

		/* close connection */
		mysqli_close($link); 
		?>
	</body>
</html>
