<?php
//php/log.inc.php
    
    
function setLog(){
    $txt = date("d/M/Y:H:i:s")." - ";
    
    $txt .= $_SERVER["REMOTE_ADDR"]." - ";
    
    $txt .= $_SERVER["REQUEST_METHOD"]." - ";
    
    $txt .= basename ($_SERVER["PHP_SELF"])." - ";
    
    $txt .= $_SERVER["SERVER_PROTOCOL"]." - ";
    
    $txt .= http_response_code()." - ";

    $txt .= filesize(basename($_SERVER["PHP_SELF"]))." - ";
    
    $txt .= $_SERVER["HTTP_USER_AGENT"]." - ";

    if(isset($_SERVER["HTTP_REFERER"])){
        $txt .= $_SERVER["HTTP_REFERER"]." - ";
    }
}

setLog();
    
?>