<?php

session_start();


$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);

if(($username=="user") && ($password=="pass")) {
    $_SESSION['validlogin'] = true;
} else {
    $_SESSION['validlogin'] = false;
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=loginpage.php?loginfailed">'; 
}
?>
