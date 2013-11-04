<?php

session_start();

require_once("post.php");



$post = new post($_POST['id']);


$post->setTitle($_POST['title']);
$post->setContent($_POST['content']);
$post->setCreated($_POST['created']);

$post->save();

header("Location: ../index.php");

?>

