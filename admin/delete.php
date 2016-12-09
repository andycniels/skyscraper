<?php
$mid = $_GET['mid'];
$acid = $_GET['acid'];
$img = $_GET['img'];
$linkid = $_GET['linkid'];
$catid = $_GET ['catid'];
if(isset($_GET['mid'])){
    //Delete artist
    require_once '../dbcon.php';
    $stmt = $link->prepare("DELETE FROM music WHERE music_id = $mid");
    $stmt->execute();
    //Delete contact
    $stmt = $link->prepare("DELETE FROM artist_contact WHERE artist_contact_id = $acid");
    $stmt->execute();
    //If cat_id == 3 (the same as) it will delete link to soundcloud and youtube
    if ($catid == 3){
        $stmt = $link->prepare("DELETE FROM link WHERE soundcloud_id = $linkid");
        $stmt->execute(); 
    }
    //Delete img from folder
    $filename = "../img/artist/{$img}";
    unlink($filename);
    header('Location: artist');
}
?>