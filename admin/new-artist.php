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
                <option value="">Label</option>
                <?php
                    require_once '../dbcon.php';
                    $stmt = $link->prepare("SELECT label_id, label FROM labels");
                    $stmt->execute();
                    $stmt->bind_result($lid, $label);

                        while($stmt->fetch()) {
                            ?>
                    <option value="<?= $lid ?>"><?= $label ?></option>
                <?php
                    }
                ?>
                </select>
                <br>
                <select class="form-control">
                <option value="">Music genre</option>
                <?php
                    require_once '../dbcon.php';
                    $stmt = $link->prepare("SELECT genre_id, genre FROM music_genre");
                    $stmt->execute();
                    $stmt->bind_result($gid, $genre);

                        while($stmt->fetch()) {
                            ?>
                    <option value="<?= $gid ?>"><?= $genre ?></option>
                <?php
                    }
                ?>
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