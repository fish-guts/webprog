<!DOCTYPE html>
<?php

    session_start();
    if(isset($_SESSION['validlogin'])) {
        if($_SESSION['validlogin']==false) {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=loginpage.php">';             
            exit();
        }
    }
    include_once("inc/blog.php");
   
?>

<html>
<head>
    <title>Severin's Blog</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
</head>
<body>
<h2 class="title"> Severin's Blog </h2>
<form class="form" action="create.php" method="POST" enctype="multipart/form-data">
<? 
    if(count(scandir("data")>0)) {
    show_entries($count);
    } else {
        echo "<fieldset class=\"form\"><legend>Einträge</legend><p class=\"form\">Hier gibts noch nichts zu sehen</p></fieldset><br />";
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
    <input type="submit" value="Eintrag speichern" />
                
</fieldset>
                

</form>
    

   
</body>
