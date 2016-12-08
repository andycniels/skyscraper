<?php
$acid = $_GET['acid'];
$mid = $_GET['mid'];
$img = $_GET['img'];


if(isset($_GET['acid'])){
    echo 'Dette er artist contact id <br>';
    echo $acid;  
}

if(isset($_GET['mid'])){
    echo 'Dette er Band id <br>';
    echo $mid;  
}

if(isset($_GET['img'])){
    echo 'Dette er artist img edit <br>';
    echo $img;  
}

?>