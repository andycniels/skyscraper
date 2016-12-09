<?php
if (isset($_POST["upload"])){
     //make input ready
    $img = basename($_FILES["fileToUpload"]["name"]);
    $img = boxone . '.' . end(explode(".",$_FILES["fileToUpload"]["name"]));
    
    //delete img from folder first
    unlink('../img/boxone.jpg');
    //upload img to folder
    $target_dir = "../img/";
    $target_file = $target_dir . $img;
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
        //upload to folder
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        header("Refresh:0");
    }
}
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Image upload</h1>
            <p>Add a new image to your frontpage in the about section.</p>
            <p>This is your current image</p>
            <img class="img-responsive" src="../img/boxone.jpg">
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
                    <input type="file" name="fileToUpload" id="fileToUpload" value="focus.jpg" onchange="readURL(this);">
                </div>
                <br>
                <input class="btn btn-default" name="upload" type="submit" value="upload">
            </form>
            <br>
            <p>The red border box shows where on the site you are editing</p>
            <img src="aboutimg/imgbox.jpg" width="400px" class="img-responsive">
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>