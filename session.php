<?php
require_once 'connect.php';
session_start();

function fix_string($mysqli, $string)
{
    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    return $mysqli->real_escape_string($string);
}

if (!isset($_SESSION["is_auth"])) {
    $_SESSION["is_auth"] = false;
}
if (isset($_POST["sign_in"])) {
    if (isset($_POST["inputLogin"]) && isset($_POST["inputPassword"])) {
        if (!preg_match("#^[A-Za-z0-9]$#", $_POST["inputLogin"]) &&
            !preg_match("#^[A-Za-z0-9]$#", $_POST["inputPassword"])) {
            $login = fix_string($mysqli, $_POST["inputLogin"]);
            $password = md5($_POST['inputPassword']);
            $count = $mysqli->query("SELECT * FROM `registered_users` WHERE `login` = '$login' AND `password` = '$password'");
            if (mysqli_num_rows($count) > 0) {
                $_SESSION["is_auth"] = true;
                $_SESSION["login"] = $login;
            }
        } else {
            echo '<div class="alert alert-warning">' . '<strong>Warning!</strong>' . ' Incorrectly entered data' . '</div>';
        }
    }
} else if (isset($_POST["sign_up"])) {
    if (isset($_POST["inputLogin"]) && isset($_POST["inputPassword"]) && isset($_POST["inputEmail"])) {
        if (!preg_match("/[^(\w)|(\@)|(\.)|(\-)]/", $_POST["inputEmail"]) &&
            !preg_match("#^[A-Za-z0-9]$#", $_POST["inputLogin"]) &&
            !preg_match("#^[A-Za-z0-9]$#", $_POST["inputPassword"])) {
            $login = fix_string($mysqli, $_POST['inputLogin']);
            $password = md5($_POST['inputPassword']);
            $email = fix_string($mysqli, $_POST['inputEmail']);
            $mysqli->query("INSERT INTO registered_users(login, password, email)" .
                "VALUES('$login', '$password','$email');");
        } else {
            echo '<div class="alert alert-warning">' . '<strong>Warning!</strong>' . 'incorrectly entered data' . '</div>';
        }
    }
} else if (isset($_POST["log_out"])) {
    $_SESSION = array();
    $_SESSION["is_auth"] = false;
    session_destroy();
}
