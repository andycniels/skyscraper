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
include 'nav.php';
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
            <h1 class="page-header">Quote</h1>
            <p>Quibusdam ne eiusmod, probant esse nescius aut dolore commodo ita fidelissimae, 
								quibusdam iis anim. Nulla laborum incididunt, fore est ea elit doctrina. 
            </p>
            <form action="<?php REQUEST_FILENAME ?>" method="POST">
            <div class="form-group">
             <?php echo $error; ?>
				<textarea class="form-control" name="quote" placeholder="Text">
<?php echo $quote; ?></textarea>
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