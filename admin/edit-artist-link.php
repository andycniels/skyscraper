<?php
$lid = $_GET['id'];
if (empty($lid)) {
    header('Location: ../admin');
}
//Update
if (isset($_POST["edit"])){
    $yl = filter_input(INPUT_POST, 'youtube_link');
    $sl = filter_input(INPUT_POST, 'soundcloud_link');
    $ml = filter_input(INPUT_POST, 'music_link');
    
    require_once '../dbcon.php';
    $sql = "UPDATE link SET s_url=?, y_url=?, m_url=? WHERE soundcloud_id = $lid";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('sss', $yl, $sl, $ml);
    $stmt->execute();
    header('Location: artist');
}
include 'header.php';
require_once '../dbcon.php';
    $stmt = $link->prepare("SELECT s_url, y_url, m_url FROM link WHERE soundcloud_id = $lid");
    $stmt->execute();
    $stmt->bind_result($su, $yu, $mu);
    while($stmt->fetch()) {	
    }
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Edit Social media</h1>
            <a href="artist"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go back</a>
            <br>
            <br>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="input-group">
                    <span class="input-group-addon">youtube.com/</span>
                    <input type="text" class="form-control" value="<?= $su ?>" name="youtube_link" placeholder="YOUTUBE CHANNEL">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">soundcloud.com/</span>
                    <input type="text" class="form-control" value="<?= $yu ?>" name="soundcloud_link" placeholder="SOUNDCLOUD USERNAME">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="music_link" value="<?= $mu ?>" placeholder="Spotify link">
                </div>
                <input class="btn btn-default" name="edit" type="submit" value="Edit contact">
            </form>  
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>