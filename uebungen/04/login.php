<?php

session_start();


print_r($_POST);
$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);

if(($username=="user") && ($password=="pass")) {
    $_SESSION['validlogin'] = true;
} else {
    $_SESSION['validlogin'] = false;
}
header("Location: reportbug/reportbug.php");
?>
