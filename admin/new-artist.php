<?php
if (isset($_POST["artist"])){
    $label = filter_input(INPUT_POST, 'label');
    $genre = filter_input(INPUT_POST, 'genre');
    $b_name = filter_input(INPUT_POST, 'band_name');
    $b_text = filter_input(INPUT_POST, 'band_text');
    $b_img = filter_input(INPUT_POST, 'band_img');
    $c_name = filter_input(INPUT_POST, 'contact_name');
    $c_phone = filter_input(INPUT_POST, 'contact_phone');
    $c_email = filter_input(INPUT_POST, 'contact_email');
   
    if(empty($_POST["label"])){
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
    else if(empty($_POST["band_img"])){
        $error5 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["contact_name"])){
        $error6 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["contact_phone"])){
        $error7 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["contact_email"])){
        $error8 = '<p style="color:red;">Must not be empty</p>';
    }else{
        //first insert into artist contact
        require_once '../dbcon.php';
        $sql = "INSERT INTO artist_contact (contact_name, phone, email) VALUES (?,?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('sss', $c_name, $c_phone, $c_email);
        $stmt->execute();
        
        //select last id so it can be used in the next insert
        $fk_artistcontact_id = (mysqli_insert_id($link));
        //set fk_cat_id = 4 is = to artist in database
        $fk_cat_id = 4;
        //set fk_soundcloud_id to 0
        $fk_soundcloud_id == 0;
        //second insert into music
        require_once '../dbcon.php';
        $sql = "INSERT INTO `music` (band_name, img, text, fk_soundcloud_id, fk_musicgenre_id, fk_label_id, fk_artistcontact_id, fk_cat_id) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $link->prepare($sql);                 
        $stmt->bind_param('ssssssss', $b_name, $b_img, $b_text, $fk_soundcloud_id, $genre, $label, $fk_artistcontact_id, $fk_cat_id);
        $stmt->execute(); 
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
            <h1 class="page-header">Add new artist</h1>
            <form action="<?php REQUEST_FILENAME ?>" method="POST">
                <?php echo $error; ?>
                <select name="label" class="form-control">
                <option value="">Label</option>
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
                <option value="">Music genre</option>
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
                    <input type="text" class="form-control" name="band_name" placeholder="Band name">
                </div>
                <?php echo $error4; ?>
                <div class="form-group">
                    <textarea class="form-control" name="band_text" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <img class="input-thumb" id="thumbnail">
                    <?php echo $error5; ?>
                    <input type="file" name="band_img" id="exampleInputFile" onchange="readURL(this);">
                </div>
                <br>
                <?php echo $error6; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_name" placeholder="Contact person">
                </div>
                <?php echo $error7; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_phone" placeholder="Contact phone">
                </div>
                <?php echo $error8; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_email" placeholder="Contact email">
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