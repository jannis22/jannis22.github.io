<?php
//php/counter.inc.php


function getCounter($tpl){//Filename

    if(!file_exists("log/nr.txt")){
        file_put_contents("log/nr.txt",'0');
    }
    
    $nr = file_get_contents("log/nr.txt");

    
    if(!isset($_COOKIE['counter'])){
    $nr++;
    file_put_contents("log/nr.txt",$nr);
    setcookie("counter","counter", time()+30);
    }

    echo time();
    $templ = file_get_contents("tpl/".$tpl);
    
    $templ = str_replace("#zahl#",$nr,$templ);
        
    echo $templ;
    

}
?>