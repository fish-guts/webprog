<?php

session_start();

$sid = $_SESSION['validlogin'];

if($sid!=true) {
    header("Location ../index.php");
}

require_once("pdo.php");


$id = htmlspecialchars($_POST['id']);

$db = new db();
$db->delete_entry($id, $text);


header("Location: ../home.php");
?>