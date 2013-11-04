<!DOCTYPE html>
<?php
    session_start();
    require_once("post.php");
    $date = date('Y-m-d H:i:s');
?>
<html>
    <head>
        <title>Severin's Post Board!</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/style.css" type="text/css" media="all" />
    </head>
    <body>
        <h2 class="title">Post erstellen</h2>
        <form class="form" action="create_record.php" method="POST" enctype="multipart/form-data">
            <?php
                echo "<fieldset class=\"form\">";
                echo "<input type=\"hidden\"  name=\"created\" value=\"".$date."\" />";
                echo "<p>Titel</p>";
                echo "<input type=\"text\" name=\"title\" placeholder=\"Titel\" required=\"required\" /><br />";
                echo "<textarea name=\"content\" placeholder=\"Dein Text\" required=\"required\">&nbsp;</textarea>";
                echo "<br /><br /><input type=\"submit\" value=\"Speichern\" />";
                echo "</fieldset>";
                echo "<br />";
            ?>
        </form>
    </body>
</html>