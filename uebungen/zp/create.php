<?php
require_once("inc/blog.php");

$title = htmlspecialchars($_POST["title"]);
$entry = htmlspecialchars($_POST["entry"]);
$date = date("Ymd");

create_entry($title,$entry,$date);

header("Location: index.php");


?>