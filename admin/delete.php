<?php
$mid = $_GET['mid'];
$acid = $_GET['acid'];
$img = $_GET['img'];
$linkid = $_GET['linkid'];
$catid = $_GET ['catid'];
$userid = $_GET['userid'];
$role = $_GET['role'];
if (empty($mid . $acid . $img . $linkid . $catid . $userid . $role)) {
    header('Location: ../admin');
}
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
if(isset($_GET['userid'])){
    //If $role = 1 go away
    if ($role == 1){
        header('Location: ../admin'); 
    }else{
        //Delete user
        require_once '../dbcon.php';
        $stmt = $link->prepare("DELETE FROM user WHERE user_id = $userid");
        $stmt->execute();
        header('Location: user');
    }
}
?>