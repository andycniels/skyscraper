<?php
$mid = $_GET['mid'];
$id = $mid;
$imgurl = $_GET['img'];
if (empty($mid . $imgurl)) {
    //header('Location: ../admin');
}
//edit
if (isset($_POST["edit"])){
    //make input ready
    $b_img = basename($_FILES["fileToUpload"]["name"]);
    $b_img = rand(1,9999999999) . '.' . end(explode(".",$_FILES["fileToUpload"]["name"]));
    
    //upload img to folder
    $target_dir = "../img/artist/";
    $target_file = $target_dir . $b_img;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); 
    //img validation
    //if empty
    if(empty(basename($_FILES["fileToUpload"]["name"]))){
        $img_error = '<p style="color:red;">Must not be empty</p>';
    }
    //Check if image file is a actual image or fake image  
    else if($check == false) {
        //File is an image;
        $img_error2 = '<p style="color:red;">File is not an image.</p>';
        $uploadOk = 0;
    }
    // Check if file already exists
    else if (file_exists($target_file)) {
        $img_error3 = '<p style="color:red;">File already exists.</p>';
        $uploadOk = 0;
    }
    // Check file size
    else if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $img_error4 = '<p style="color:red;">Your file is too large. max 0,5 GB</p>';
        $uploadOk = 0;
    }
    // Allow certain file formats
    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        $img_error5 = '<p style="color:red;">Only jpg, jpeg, png files are allowed.</p>';
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $img_error6 = '<p style="color:red;">Your Image was not uploaded, try again.</p>';
    // if everything is ok, try to upload file
    }else{
        //delete img from folder first
        $filename = "../img/artist/{$imgurl}";
        unlink($filename);
        //move new img to folder
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        require_once '../dbcon.php';
        $sql = "UPDATE music SET img=? WHERE music_id = $id";
        $stmt = $link->prepare($sql);
        $stmt->bind_param('s', $b_img);
        $stmt->execute();
        header('Location: artist');
    }
}
include 'header.php';
include 'nav.php';
require_once '../dbcon.php';
$stmt = $link->prepare("SELECT img FROM music WHERE music_id = $id");
    $stmt->execute();
    $stmt->bind_result($img);
    while($stmt->fetch()) {	
    }
?>
	
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Edit artist image</h1>
            <img src="../img/artist/<?= $img ?>" width="400px" class='img-responsive'>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <?php echo $img_error; ?>
                <?php echo $img_error2; ?>
                <?php echo $img_error3; ?>
                <?php echo $img_error4; ?>
                <?php echo $img_error5; ?>
                <?php echo $img_error6; ?>
                <?php echo $img_error7; ?>
                <div class="form-group">
                    <img class="input-thumb" id="thumbnail">
                    <input type="file" name="fileToUpload" id="fileToUpload" value="<?= $img ?>" onchange="readURL(this);">
                </div>
                <br>
                <input class="btn btn-default" name="edit" type="submit" value="Add artist">
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>