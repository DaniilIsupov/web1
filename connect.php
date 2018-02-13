<?php
/** 
 *подключение базы данных
 */

$link = mysqli_connect(
	'127.0.0.1',
	'root',
	'',
	'Users_db');
/**
 * проверка подключения к базе данных
 */
if (!$link) { 
	echo "Код ошибки: ".mysqli_connect_error(); 
	exit; 
}
?>