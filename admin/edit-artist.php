<?php
$id = $_GET['id'];
$mid = $id;
//Update
if (isset($_POST["edit"])){
    $label = filter_input(INPUT_POST, 'label');
    $genre = filter_input(INPUT_POST, 'genre');
    $b_name = filter_input(INPUT_POST, 'band_name');
    $b_text = filter_input(INPUT_POST, 'band_text');

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
    }else{
        require_once '../dbcon.php';
        $sql = "UPDATE music SET band_name=?, text=?, fk_musicgenre_id=?, fk_label_id=? WHERE music_id = $mid";
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ssii', $b_name, $b_text, $genre, $label);
        $stmt->execute();
        header('Location: artist');
    }
}
include 'header.php';
include 'nav.php';
require_once '../dbcon.php';
    $stmt = $link->prepare("SELECT band_name, text, fk_musicgenre_id, fk_label_id FROM music WHERE music_id = $id");
    $stmt->execute();
    $stmt->bind_result($b_name, $b_text, $lid, $gid);
    while($stmt->fetch()) {	
        
    }
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Edit artist</h1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <?php echo $error; ?>
                <select name="label" class="form-control">
                <option value="<?= $lid ?>">Label</option>
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
                <option value="<?= $gid ?>">Music genre</option>
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
                <input class="btn btn-default" name="edit" type="submit" value="Edit artist">
            </form>  
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>