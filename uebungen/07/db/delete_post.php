<?php

require_once("post.php");

$id = $_GET['id'];

$post = new post($id);
$post->delete();
header("Location: ../indexd.php");

?>