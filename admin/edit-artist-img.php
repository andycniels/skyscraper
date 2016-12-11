<?php
$acid = $_GET['acid'];
$mid = $_GET['mid'];
$img = $_GET['img'];
if (empty($acid . $mid . $img)) {
    header('Location: ../admin');
}
include 'header.php';
include 'nav.php';
?>
	
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Edit <?= $mid ?></h1>
            <?php
            //artist contact
            if(isset($_GET['acid'])){
                echo 'Dette er artist contact id <br>';
                echo $acid;  
            }
            //artist info
            if(isset($_GET['mid'])){
                echo 'Dette er Band id <br>';
                echo $mid;  
            }
            //artist image
            if(isset($_GET['img'])){
                echo 'Dette er artist img edit <br>';
                echo $img;  
            }
            ?>   
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>