<?php
$id = $_GET['id'];

//Update
if (isset($_POST["edit"])){
    $b_name = filter_input(INPUT_POST, 'band_name');
    $b_text = filter_input(INPUT_POST, 'band_text');

    if(empty($_POST["band_name"])){
        $error = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["band_text"])){
        $error1 = '<p style="color:red;">Must not be empty</p>';
    }else{
        require_once '../dbcon.php';
        $sql = "UPDATE music SET band_name=?, text=? WHERE music_id = $id";
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ss', $b_name, $b_text);
        $stmt->execute();
        header('Location: artist');
    }
}
include 'header.php';
include 'nav.php';
require_once '../dbcon.php';
    $stmt = $link->prepare("SELECT band_name, text FROM music WHERE music_id = $id");
    $stmt->execute();
    $stmt->bind_result($b_name, $b_text);
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
                <div class="form-group">
                    <input type="text" class="form-control" name="band_name" value="<?= $b_name ?>" placeholder="Band name">
                </div>
                <?php echo $error1; ?>
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