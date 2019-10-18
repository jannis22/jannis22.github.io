<?php 

session_start();

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}

//LOGOUT

if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}




?>