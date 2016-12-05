<?php
//Update
if (isset($_POST["about"])){
    $headline = filter_input(INPUT_POST, 'headline');
    $text = filter_input(INPUT_POST, 'text');

    if(empty($_POST["headline"])){
        $error = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["text"])){
        $error2 = '<p style="color:red;">Must not be empty</p>';
    }else{
        require_once '../dbcon.php';
        $sql = 'UPDATE about SET headline=?,text=? WHERE about_id=1';
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ss', $headline, $text);
        $stmt->execute();
        header("Refresh:0");
    }
}
include 'header.php';
include 'nav.php';
//select headline og tekst fra about
require_once '../dbcon.php';
$stmt = $link->prepare("SELECT headline, text FROM `about`");
    $stmt->execute();
    $stmt->bind_result($headline, $nam);
    while($stmt->fetch()) {	
    }
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">Short description</h1>
            <p>Quibusdam ne eiusmod, probant esse nescius aut dolore commodo ita fidelissimae, 
                quibusdam iis anim. Nulla laborum incididunt, fore est ea elit doctrina. 
            </p>
            <form action="<?php REQUEST_FILENAME ?>" method="POST">
                <div class="form-group">
                    <?php echo $error; ?>
                    <input type="text" class="form-control" name="headline" value="<?php echo $headline; ?>" placeholder="Headline">
                </div>
                <div class="form-group">
                    <?php echo $error2; ?>
                    <textarea class="form-control" name="text" placeholder="Text"><?php echo $nam; ?></textarea>
                </div>
                <input class="btn btn-default" name="about" type="submit" value="Update">
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>