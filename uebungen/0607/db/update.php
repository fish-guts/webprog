<?php

session_start();
$sid = $_SESSION['validlogin'];

if($sid!=true) {
    header("Location ../index.php");
}

require_once("pdo.php");


$button = htmlspecialchars($_POST['1']);
$id = htmlspecialchars($_POST['id']);
$text = htmlspecialchars($_POST['text'.$id]);

print_r($_POST);

$db = new db();
if($button=="Speichern") {
    $db->save_entry($id, $text);
} else {
    $db->complete_entry($id);
}

header("Location: ../home.php");
?>