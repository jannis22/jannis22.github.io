<?php 

session_start();

if(isset($_POST['n']) && $_POST['n'] != "") {
    $_SESSION['user'] = $_POST['n'];
    header("Location: seite_2.php");
    exit;
}


?>