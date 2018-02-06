<?php
$link = mysqli_connect(
	'127.0.0.1','root','','Films_db');

if (!$link) { 
	echo "Код ошибки: ".mysqli_connect_error(); 
	exit; 
}
?>