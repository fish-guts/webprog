<!DOCTYPE html>
<?php

    session_start();
    if(isset($_GET['loginfailed'])) {
        echo "<p style=\"color:red;font-family:Arial;font-size:14pt;font-weight:bold\">Anmeldung fehlgeschlagen!</p>";
    }

?>

<html>
<head>
    <title>Submit us your Bug!</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
</head>
<body>
    <h2 class="title">Bitte melde dich an</h2>
    <form class="form" action="login.php" method="POST" enctype="multipart/form-data">
        <fieldset class="form">
            <legend>Login</legend>
            <p class="web">
                <input type="text" name="user" id="user" placeholder="Benutzername" required/>
                <label for="web">Benutzername</label> 
                <br />
                <input type="password" name="password" id="password" placeholder="Passwort" required/>
                <label for="web">Passwort</label>   
                <br /><br />
                 <p class="submit">
                    <input class="submit" type="submit" value="Login" />
                 </p>
            </p>
        </fieldset>
    </form>
</body>
