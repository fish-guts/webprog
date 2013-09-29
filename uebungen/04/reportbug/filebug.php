<?php

$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['upload']['name']);
echo '<pre>';
foreach ($_FILES["upload"]["name"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["upload"]["tmp_name"][$key];
        $name = $_FILES["upload"]["name"][$key];
        move_uploaded_file($tmp_name, "$name");
        echo "all okay";
    }
}
print_r($_FILES);

print_r($_POST);

?>
