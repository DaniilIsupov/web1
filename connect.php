<?php

$mysqli = new mysqli(
	'127.0.0.1',
	'root',
	'',
	'Users_db');
if ($mysqli->connect_error) {
	die('Connection error, code  (' . $mysqli->connect_errno . ') '
			. $mysqli->connect_error);
}
?>