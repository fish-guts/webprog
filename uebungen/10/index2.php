<!DOCTYPE html>
<?php
    session_start();
?>

<html>
    <head>
        <title>Some Canton Stuff!</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
    </head>
    <body>
        <h2 class="title">Kennzeichenfinder</h2>
        <form class="form" action="resolver.php" method="POST" enctype="multipart/form-data">
            <fieldset class="form">
                <legend>Finde einen Kanton anhand des Kennzeichens</legend>
                <p>Gebe ein Kennzeichen ein: </p>
                <input type="text" name="plate" />
            </fieldset>
        </form>
    </body>
</html>