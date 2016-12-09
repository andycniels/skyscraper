<?php
$mid = $_GET['mid'];
$acid = $_GET['acid'];
$img = $_GET['img'];
if(isset($_GET['mid'])){
    //Delete artist
    require_once '../dbcon.php';
    $stmt = $link->prepare("DELETE FROM music WHERE music_id = $mid");
    $stmt->execute();
    //Delete contact
    $stmt = $link->prepare("DELETE FROM artist_contact WHERE artist_contact_id = $acid");
    $stmt->execute();
    //Delete img from folder
    $filename = "../img/artist/{$img}";
    unlink($filename);
    header('Location: artist');
}
?>