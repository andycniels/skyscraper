<?php
//Update
if (isset($_POST["about"])){ 
    $quote = filter_input(INPUT_POST, 'quote');

    if(empty($_POST["quote"])){
        $error = '<p style="color:red;">Must not be empty</p>';
    }else{
        require_once '../dbcon.php';
        $sql = 'UPDATE about SET quote=? WHERE about_id=1';
        $stmt = $link->prepare($sql);
        $stmt->bind_param('s', $quote);
        $stmt->execute();
        header("Refresh:0");
    }
}
include 'header.php';
require_once '../dbcon.php';
$stmt = $link->prepare("SELECT quote FROM `about`");
    $stmt->execute();
    $stmt->bind_result($quote);
    while($stmt->fetch()) {	
    }

?>


<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Quote</h1>
            <p>Edit the quote box in the about section</p>
            <p style="color:red;">Max 350 characters...</p>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
             <?php echo $error; ?>
				<textarea class="form-control" name="quote" placeholder="Text">
<?php echo $quote; ?></textarea>
            </div>
				 <input class="btn btn-default" name="about" type="submit" value="Update">
            </form>
            <br>
            <p>The red border box shows where on the site you are editing</p>
            <img src="aboutimg/quotebox.jpg" width="400px" class="img-responsive">
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>