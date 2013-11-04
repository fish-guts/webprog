<!DOCTYPE html>
<?php
    session_start();
    require_once("post.php");
?>
<html>
    <head>
        <title>Severin's Post Board!</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/style.css" type="text/css" media="all" />
    </head>
    <body>
        <h2 class="title">Posts</h2>
        <form class="form" action="save_record.php" method="POST" enctype="multipart/form-data">
            <?php
            $post = new post($_GET['id']);
            $row = $post->findById($post->getId());
            $post->setContent($row[3]);
            $post->setTitle($row[2]);
            $post->setCreated($row[1]);
                echo "<fieldset class=\"form\">";
                echo "<input type=\"hidden\"  name=\"id\" value=\"".$row[0]."\" />";
                echo "<input type=\"hidden\"  name=\"created\" value=\"".$row[1]."\" />";
                echo "<input type=\"hidden\"  name=\"title\" value=\"".$row[2]."\" />";
                echo "<p>Titel</p>";
                echo "<input type=\"text\" name=\"title\" value=\"" . $post->getTitle()."\">";
                echo "<p>Created: " . $post->getCreated() . "</p>";
                echo "<textarea name=\"content\">" . $post->getContent() . "</textarea>";
                echo "<br /><br /><input type=\"submit\" value=\"Speichern\" />";
                echo "</fieldset>";
                echo "<br />";
            ?>
        </form>
    </body>
</html>