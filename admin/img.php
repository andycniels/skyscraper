<?php


if(isset($_POST['submit'])){ //hvis der er trykket på knappen med name=addArticle skal den køre dette script
    
    
    $img = basename($_FILES["fileToUpload"]["name"]);
    
    $img = rand(1,9999999999999999999999) . '.' . end(explode(".",$_FILES["fileToUpload"]["name"]));
    
    //upload billede til mappe
    $target_dir = "../img/artist/";
    
    $target_file = $target_dir . $img;
    
    
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image :) - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image :(";
            $uploadOk = 0;
        }

    // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    
    echo $img .'<br>';
 }



include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">IMG</h1>    
            <form action="#" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>