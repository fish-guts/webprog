<!DOCTYPE html>
<?php
session_start();
require_once("db/post.php");
require_once("db/db.php")
?>

<html>
    <head>
        <title>Severin's Post Board!</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
    </head>
    <body>
        <h2 class="title">Posts</h2>
        <a class="form" href="db/create.php">Neuer Post</a> <br /><br />
        <form class="form" method="post" action="db/search.php">
        <p>Suchen: </p> 
        <select name="search">
            <option name="id">Id</option>
            <option name="title">Titel</option>
            <option name="created">Creation Date</option>
            <option name="content">Text</option>
        </select>
        <input type="text" placeholder="Suchbegriff" name="searchfield" />
        <input type="submit" value="Suchen" />
        </form>
          
        <form class="form" action="db/login.php" method="POST" enctype="multipart/form-data">
            <?php
            $db = new db;
            $list = $db->load();
            foreach ($list as $row) {
                $id = $row['id'];
                echo "<fieldset class=\"form\">";
                echo "<legend>" . $row['title'] . "</legend>";
                echo "<p>Created: " . $row['created'] . "</p>";
                echo "<textarea readonly=\"readonly\">" . $row['content'] . "</textarea>";
                echo "<p><a href=\"db/update.php?id=". $id ."\">Bearbeiten</a>";
                echo " | ";
                echo "<a href=\"db/delete.php?id=". $id ."\">Löschen</a></p>";
                echo "</fieldset>";
                echo "<br />";
            }
            ?>
        </form>
    </body>
</html>