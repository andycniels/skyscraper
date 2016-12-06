<?php
$search = filter_input(INPUT_GET, 'search');
include 'header.php';
include 'nav.php';
?>
	
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; 
            echo $search;
            ?>
            <h1 class="page-header">Skyscraper Admin</h1>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>