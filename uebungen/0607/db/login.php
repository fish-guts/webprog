<?php

session_start();

require_once("pdo.php");



$user = htmlspecialchars($_POST['user']);
$pass = htmlspecialchars($_POST['password']);

$db = new db();
$ret = $db->login($user, md5($pass));
if ($ret == true) {
    $_SESSION['validlogin'] = true;
} else {
    $_SESSION['validlogin'] = false;
}

header("Location: ../home.php");
?>
