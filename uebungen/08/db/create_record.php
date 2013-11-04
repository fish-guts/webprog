<?php

session_start();

require_once("post.php");



$post = new post();


$post->setTitle($_POST['title']);
$post->setContent($_POST['content']);
$post->setCreated($_POST['created']);

$post->insert();

header("Location: ../index.php");

?>

