<?php
include 'header.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Artist</h1>
            <p>View, edit or delete artists.</p>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Img</th>
                    <th>Band name</th>
                    <th>Label</th>
                    <th>Genre</th>
                    <th>Edit band details</th>
                    <th>Edit band category</th>
                    <th>Edit band image</th>
                    <th>Edit artist contact info</th>
                    <th>Delete band and contact</th>
                </tr>
                <?php
                require_once '../dbcon.php';
                $stmt = $link->prepare("SELECT m.music_id, 
                                               m.band_name, 
                                               m.img, 
                                               m.text, 
                                               m.fk_musicgenre_id, 
                                               m.fk_label_id, 
                                               m.fk_artistcontact_id, 
                                               m.fk_cat_id,
                                               l.label_id,
                                               l.label,
                                               g.genre_id,
                                               g.genre
                                               
                                               FROM music m, labels l, music_genre g 
                                               WHERE m.fk_musicgenre_id = g.genre_id
                                               AND m.fk_label_id = l.label_id
                                               AND fk_cat_id = 4
                                               ORDER BY m.music_id DESC
                                        ");
                $stmt->execute();
                $stmt->bind_result($mid, $bn, $img, $text, $fkmid, $fklid, $fkacid, $fkcid,
                                   $lid, $label,
                                   $gid, $genre
                                  );
                
                while($stmt->fetch()) {
                ?>
                <tr>
                    <td><img src="../img/artist/<?= $img ?>" width="300px" class='img-responsive'></td>
                    <td><?= $bn ?></td>
                    <td><?= $label ?></td>
                    <td><?= $genre ?></td>
                    <td><a href="edit-artist?id=<?= $mid ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a href="edit-artist-cat?id=<?= $mid ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a href="edit-artist-img?mid=<?= $mid ?>&img=<?= $img ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a href="edit-artist-contact?acid=<?= $fkacid ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a href="delete?mid=<?= $mid ?>&acid=<?= $fkacid ?>&img=<?= $img ?>" onclick="return confirm('Are you sure you want to delete -<?= $bn ?>- and the contact info?');" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>