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
   
    
    echo $c_name;
    echo $c_phone;
    echo $c_email;
    echo $label;
    echo $genre;
    echo $b_name;
    echo $b_text;
    echo $b_img;
    
    
    
}
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">Add new artist</h1>
            <form action="<?php REQUEST_FILENAME ?>" method="POST">
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
                <div class="form-group">
                    <input type="text" class="form-control" name="band_name" placeholder="Band name">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="band_text" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Band image</label>
                    <input type="file" name="band_img" id="exampleInputFile"
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_name" placeholder="Contact person">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_phone" placeholder="Contact phone">
                </div>
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