<?php
$mid = $_GET['mid'];
$linkid = $_GET['linkid'];
$catid = $_GET ['catid'];
if (empty($mid . $acid . $img . $linkid . $catid)) {
    header('Location: ../admin');
}
if(isset($_GET['mid'])){  
    require_once '../dbcon.php';
    //If cat_id == 3 (the same as) it will delete link to soundcloud and youtube
    if ($catid == 3){
        $stmt = $link->prepare("DELETE FROM link WHERE soundcloud_id = $linkid");
        $stmt->execute(); 
    }
    $label = 1;
    $cat = 4;
    $sql = "UPDATE music SET fk_cat_id=?, fk_label_id=? WHERE music_id = $mid;";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('ii', $cat, $label);
    $stmt->execute();
    header('Location: artist');
}
?>