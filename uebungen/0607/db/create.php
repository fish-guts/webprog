<?php

session_start();

$sid = $_SESSION['validlogin'];

if($sid!=true) {
    header("Location ../index.php");
}


require_once("pdo.php");


$username = $_SESSION['username'];
$title = $_POST['title'];
$text = $_POST['text'];

$db = new db();
$db->create_entry($username,$title,$text);


print_r($_POST);
print_r($_SESSION);

header("Location: ../home.php");
?>