<?php 
if (isset($_POST["send"])){
    $bn = filter_input(INPUT_POST, 'band_name', FILTER_SANITIZE_STRING);
    $cn = filter_input(INPUT_POST, 'contact_name', FILTER_SANITIZE_STRING);
    $ce = filter_input(INPUT_POST, 'contact_email', FILTER_SANITIZE_STRING);
    $pn = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING);
    $yl = filter_input(INPUT_POST, 'youtube_link', FILTER_SANITIZE_STRING);
    $sl = filter_input(INPUT_POST, 'soundcloud_link', FILTER_SANITIZE_STRING);
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    $img = basename($_FILES["fileToUpload"]["name"]);
    $img = rand(1,9999999999) . '.' . end(explode(".",$_FILES["fileToUpload"]["name"]));
    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
    
    //upload img to folder
    $target_dir = "img/artist/";
    $target_file = $target_dir . $img;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); 
    
    //Validate
    if (empty($bn)) {
        $error = '<p style="color:red;">Must not be empty</p>';
    }
    if (empty($cn)) {
        $error2 = '<p style="color:red;">Must not be empty</p>';
    }
    if (empty($ce)) {
        $error3 = '<p style="color:red;">Must not be empty</p>';
    }
    if (empty($pn)) {
        $error4 = '<p style="color:red;">Must not be empty</p>';
    }
    if (empty($genre)) {
        $error5 = '<p style="color:red;">Must not be empty</p>';
    }
    if (empty($text)) {
        $error6 = '<p style="color:red;">Must not be empty</p>';
    }
    //img validation
    else if(empty(basename($_FILES["fileToUpload"]["name"]))){
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
    //Allow certain file formats
    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        $img_error5 = '<p style="color:red;">Only jpg, jpeg, png files are allowed.</p>';
        $uploadOk = 0;
    }
    // Check file size
    else if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $img_error4 = '<p style="color:red;">Your file is too large. max 0,5 GB</p>';
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $img_error6 = '<p style="color:red;">Your Image was not uploaded, try again.</p>';
    // if everything is ok, try to upload file
    }else{
        //move img to folder
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        //insert into artist contact
        require_once 'dbcon.php';
        $sql = "INSERT INTO artist_contact (contact_name, phone, email) VALUES (?,?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('sss', $cn, $pn, $ce);
        $stmt->execute();
        //select last id so it can be used in the next insert
        $fk_artistcontact_id = (mysqli_insert_id($link));
        
        //insert into link
        $sql = "INSERT INTO link (s_url, y_url) VALUES (?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('ss', $sl, $yl);
        $stmt->execute();
        //select last id so it can be used in the next insert
        $fk_soundcloud_id = (mysqli_insert_id($link));
        
        //set fk_cat_id = 3 always to demo admin site
        $fk_cat_id = 3;
        $label = 1;
        //second insert into music
        $sql = "INSERT INTO `music` (band_name, img, text, fk_soundcloud_id, fk_musicgenre_id, fk_label_id, fk_artistcontact_id, fk_cat_id) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('ssssssss', $bn, $img, $text, $fk_soundcloud_id, $genre, $label, $fk_artistcontact_id, $fk_cat_id);
        $stmt->execute();
        $created = ' was created';
        header('Location: succes');
    }
}
include 'header.php' 
?>
<body class="submit-body">
    <?php 
        include'nav.php';
    ?>
    <div class="container-fluid">
        <div style="margin-top:8vh;"></div>
    <div class="row row-eq-height">

        <div class="col-sm-6 eq-height">
            <img src="img/man-bass.jpg" class="img-responsive">
        </div>

        <div class="col-sm-6 eq-height">
            <div class="submit-info">
                <h2>WE BUILD ARTISTS</h2>
                <p><span style="color: #51a4b9">WE ARE DEDICATED</span> TO NEW AND INSPIRING ARTISTS<span style="color: #51a4b9">.</span> WE'D LOVE TO HEAR FROM YOU<span style="color: #51a4b9">.</span> SUBMIT YOUR DEMO BELOW<span style="color: #51a4b9">.</span>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 submit-wrapper">
            <h2>WE'D <span style="color: #51a4b9">LOVE</span> TO <span style="color: #51a4b9">HEAR</span> FROM YOU</h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="demo-submit">
                <div class="form-group">
                    <?= $error ?>
                    <input type="text" class="form-control" value="<?= $bn ?>" name="band_name" placeholder="ARTIST NAME*">
                </div>
                <div class="wrap-info">
                    <div class="form-group contact_info">
                        <?= $error2 ?>
                        <input type="text" class="form-control" value="<?= $cn ?>" name="contact_name" placeholder="CONTACT NAME*">
                    </div>
                    <div class="form-group contact_info">
                         <?= $error3 ?>
                        <input type="email" class="form-control" value="<?= $ce ?>" name="contact_email" placeholder="CONTACT EMAIL*">
                    </div>
                </div>

                <div class="form-group">
                    <?= $error4 ?>
                    <input type="text" class="form-control" value="<?= $pn ?>" name="phone_number" placeholder="PHONE*">
                </div>

                <div class="input-group">
                    <span class="input-group-addon">youtube.com/</span>
                    <input type="text" class="form-control" value="<?= $yl ?>" name="youtube_link" placeholder="YOUTUBE CHANNEL">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">soundcloud.com/</span>
                    <input type="text" class="form-control" value="<?= $sl ?>" name="soundcloud_link" placeholder="SOUNDCLOUD USERNAME">
                </div>
                <div class="form-group">
                    <?= $error5 ?>
                    <select name="genre" class="form-control">
                        <option value="<?= $genre ?>">Music genre*</option>
                        <?php
                            require_once 'dbcon.php';
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
                </div>
                <div class="form-group">
                    <?= $error6 ?>
                    <textarea class="form-control" name="text" placeholder="DESCRIPTION*"><?= $text ?></textarea>
                </div>
                <div class="form-group">
                    <?php echo $img_error; ?>
                    <?php echo $img_error2; ?>
                    <?php echo $img_error3; ?>
                    <?php echo $img_error4; ?>
                    <?php echo $img_error5; ?>
                    <?php echo $img_error6; ?>
                    <?php echo $img_error7; ?>
                    <img class="input-thumb" id="thumbnail">
                    <input type="file" name="fileToUpload" id="fileToUpload" value="focus.jpg" onchange="readURL(this);">
                    <label class="label-an" name="fileToUpload" id="fileToUpload" for="fileToUpload"><i class="fa fa-upload" aria-hidden="true"></i>Choose an image</label>
                </div>
                <div class="form-group">
                    <input class="btn-an" name="send" type="submit" value="Send">
                </div>

            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

      </div>