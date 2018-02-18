<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION["is_auth"])) {
    $_SESSION["is_auth"] = false;
}
if (isset($_POST["sign_in"])) {
    if (isset($_POST["inputLogin"]) && isset($_POST["inputPassword"])) {
        $login = $_POST["inputLogin"];
        $password = $_POST["inputPassword"];
        $count = $mysqli->query("SELECT * FROM `registered_users` WHERE `login` = '$login' AND `password` = '$password'");
        if (mysqli_num_rows($count) > 0) {
            $_SESSION["is_auth"] = true;
        }
    }
} else if (isset($_POST["sign_up"])) {
    if (isset($_POST["inputLogin"]) && isset($_POST["inputPassword"]) && isset($_POST["inputEmail"])) {
        $mysqli->query("INSERT INTO registered_users(login, password, email)" .
            "VALUES('{$_POST['inputLogin']}','{$_POST['inputPassword']}','{$_POST['inputEmail']}');");
    }
}
