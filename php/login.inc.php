<?php 

session_start();

if(isset($_POST['n']) && $_POST['n'] != "") {
    $_SESSION['user'] = $_POST['n'];
    header("Location: menue.php");
    exit;
}

if(isset($_SESSION['user'])) {
    header("Location: menue.php");
}


?>