<?php
if (isset($_POST["artist"])){
    //make input ready
    $label = filter_input(INPUT_POST, 'label');
    $genre = filter_input(INPUT_POST, 'genre');
    $b_name = filter_input(INPUT_POST, 'band_name');
    $b_text = filter_input(INPUT_POST, 'band_text');
    $b_img = basename($_FILES["fileToUpload"]["name"]);
    $b_img = rand(1,9999999999) . '.' . end(explode(".",$_FILES["fileToUpload"]["name"]));
    $c_name = filter_input(INPUT_POST, 'contact_name');
    $c_phone = filter_input(INPUT_POST, 'contact_phone');
    $c_email = filter_input(INPUT_POST, 'contact_email');
    $yl = filter_input(INPUT_POST, 'youtube_link');
    $sl = filter_input(INPUT_POST, 'soundcloud_link');
    $ml = filter_input(INPUT_POST, 'music_link');
    
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
    }
    //validate the rest
    else if(empty($_POST["label"])){
        $error = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["genre"])){
        $error2 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["band_name"])){
        $error3 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["band_text"])){
        $error4 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["contact_name"])){
        $error6 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["contact_phone"])){
        $error7 = '<p style="color:red;">Must not be empty</p>';
    }
    else if (filter_var($c_email, FILTER_VALIDATE_EMAIL) === false) {
        $emailVal = "<p style='color:red;'>'$c_email' is not a valid email address</p>";
    }
    else if(empty($_POST["contact_email"])){
        $error8 = '<p style="color:red;">Must not be empty</p>';
    }else{
        //move img to folder
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        //insert into artist contact
        require_once '../dbcon.php';
        $sql = "INSERT INTO artist_contact (contact_name, phone, email) VALUES (?,?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('sss', $c_name, $c_phone, $c_email);
        $stmt->execute();
        //select last id so it can be used in the last insert
        $fk_artistcontact_id = (mysqli_insert_id($link));
        
        //insert into link
        $sql = "INSERT INTO link (y_url, s_url, m_url) VALUES (?,?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('sss', $sl, $yl, $ml);
        $stmt->execute();
        //select last id so it can be used in the last insert
        $fk_soundcloud_id = (mysqli_insert_id($link));
        
        //set fk_cat_id = 4 is = to artist in database
        $fk_cat_id = 4;
        //second insert into music
        $sql = "INSERT INTO `music` (band_name, img, text, fk_soundcloud_id, fk_musicgenre_id, fk_label_id, fk_artistcontact_id, fk_cat_id) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('ssssssss', $b_name, $b_img, $b_text, $fk_soundcloud_id, $genre, $label, $fk_artistcontact_id, $fk_cat_id);
        $stmt->execute();
        
        
        $created = ' was created';
        header('Location: artist');
    }
}
include 'header.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Add new artist</h1>
            <h3 style="color:green;"><?= $b_name . $created ?></h3>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <?php echo $error; ?>
                <select name="label" class="form-control">
                <option value="<?= $label ?>">Label</option>
                <?php
                    require_once '../dbcon.php';
                    $stmt = $link->prepare("SELECT label_id, label FROM labels");
                    $stmt->execute();
                    $stmt->bind_result($lid, $label);

                        while($stmt->fetch()) {
                            ?>
                    <option value="<?= $lid ?>"><?= $label ?></option>
                <?php
                    }
                ?>
                </select>
                <br>
                <?php echo $error2; ?>
                <select name="genre" class="form-control">
                <option value="<?= $genre ?>">Music genre</option>
                <?php
                    require_once '../dbcon.php';
                    $stmt = $link->prepare("SELECT genre_id, genre FROM music_genre");
                    $stmt->execute();
                    $stmt->bind_result($gid, $genre);

                        while($stmt->fetch()) {
                            ?>
                    <option value="<?= $gid ?>"><?= $genre ?></option>
                <?php
                    }
                ?>
                </select>
                <br>
                <?php echo $error3; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="band_name" value="<?= $b_name ?>" placeholder="Band name">
                </div>
                <?php echo $error4; ?>
                <div class="form-group">
                    <textarea class="form-control" name="band_text" placeholder="Description"><?= $b_text ?></textarea>
                </div>
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
                <?php echo $error6; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_name" value="<?= $c_name ?>" placeholder="Contact person">
                </div>
                <?php echo $error7; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_phone" value="<?= $c_phone ?>" placeholder="Contact phone">
                </div>
                <?php echo $emailVal; ?>
                <?php echo $error8; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_email" value="<?= $c_email ?>" placeholder="Contact email">
                </div>
                <p style="color:green;">Social media (fill at least one)</p>
                <div class="input-group">
                    <span class="input-group-addon">youtube.com/</span>
                    <input type="text" class="form-control" value="<?= $yl ?>" name="youtube_link" placeholder="YOUTUBE CHANNEL">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">soundcloud.com/</span>
                    <input type="text" class="form-control" value="<?= $sl ?>" name="soundcloud_link" placeholder="SOUNDCLOUD USERNAME">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="music_link" value="<?= $ml ?>" placeholder="Spotify link">
                </div>
                <input class="btn btn-default" name="artist" type="submit" value="Add artist">
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>