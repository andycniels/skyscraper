<?php
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">Add new artist</h1>
            <form>
                <select class="form-control">
                    <option>Vælg label</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="Band name">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="text" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Band image</label>
                    <input type="file" id="exampleInputFile"
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="Contact person">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="Contact phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="headline" placeholder="Contact email">
                </div>
                <button type="submit" class="btn btn-default">Add band</button>
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>