<?php
if (isset($_POST["submit"])){
    
    
    
    $b_img = filter_input(INPUT_POST, 'fileToUpload');
    
    echo $b_img; 
   
    if(empty($_POST["fileToUpload"])){
        $error5 = '<p style="color:red;">Must not be empty</p>';
    }else{
        
        echo '*********';
    }
}
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">IMG</h1>
            
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <img class="input-thumb" id="thumbnail">
                    <?php echo $error5; ?>
                    <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
                </div>
                <input class="btn btn-default" name="submit" type="submit" value="Add artist">
            </form>
            
            
            
            
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>