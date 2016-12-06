<?php
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Image upload</h1>
            <p>Quibusdam ne eiusmod, probant esse nescius aut dolore commodo ita fidelissimae, 
                quibusdam iis anim. Nulla laborum incididunt, fore est ea elit doctrina. 
            </p>
            <img class="img-responsive" src="http://placehold.it/300x300">
            <form>
                <div class="form-group">
                    <img class="input-thumb" id="thumbnail">
                    <input type='file' onchange="readURL(this);" />
                </div>
                <br>
                <button type="submit" class="btn btn-default">Upload</button>
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>