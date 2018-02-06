<?php
$link = mysqli_connect(
	'test.site',	/* Хост, к которому мы подключаемся */ 
	'root',			/* Имя пользователя */ 
	'1234',			/* Используемый пароль */ 
	'test_DB');		/* База данных для запросов по умолчанию */ 

if (!$link) { 
	echo "Код ошибки: ".mysqli_connect_error(); 
	exit; 
}
?>