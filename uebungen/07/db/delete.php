<!DOCTYPE html>
<?php
session_start();
$id = $_GET['id'];
?>

<html>
    <head>
        <title>Severin's Post Board!</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/style.css" type="text/css" media="all" />
    </head>
    <body>
        <h2 class="title">Sind Sie sicher????</h2>
        <a href="delete_post.php?id=<?php echo $id ?>">Yep</a> | <a href="../index.php">Neee</a>
    </body>
</html>