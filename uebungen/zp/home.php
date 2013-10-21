<!DOCTYPE html>
<?php
include("inc/blog.php");
$inifile = "sys/blogcount.ini";  // hier lege ich die Anzahl Beiträge ab 
$count =  file_get_contents($inifile);

?>
<html>
<head>
    <title>Severin's Blog</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
</head>
<h2 class="title"> Severin's Blog </h2>
<form class="form" action="verify.php" method="POST" enctype="multipart/form-data">
<? if($count>0) {
    show_entries($count);
}
?>
<fieldset class="form">
    <legend>Neuer Eintrag</legend>
    <input type="text" name="title" placeholder="Titel" />
    <br />
    <p>Dein Eintrag</p>
    <p class="text">
                    <textarea name="entry" placeholder="Dein Eintrag" required/></textarea>
                </p>
                
</fieldset>
                

</form>
    

<body>