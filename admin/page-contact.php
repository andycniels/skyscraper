<?php
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">Page contact</h1>
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="Street">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="zip and town">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="Phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>