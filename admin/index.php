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
                if (!empty($search)) {
                ?>
                <h3>Artists</h3>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Img</th>
                        <th>Band name</th>
                        <th>Label</th>
                        <th>Genre</th>
                        <th>Edit artist details</th>
                        <th>Edit artist category</th>
                        <th>Edit artist image</th>
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
                                               
                                               AND m.band_name COLLATE UTF8_GENERAL_CI LIKE '%$search%'
                                        ");
                $stmt->execute();
                $stmt->bind_result($mid, $bn, $img, $text, $fkmid, $fklid, $fkacid, $fkcid,
                                   $lid, $label,
                                   $gid, $genre
                                  );
                
                while($stmt->fetch()) {
                ?>
                    <tr>
                        <td><img src="../img/artist/<?= $img ?>" class='img-responsive'></td>
                        <td><?= $bn ?></td>
                        <td><?= $label ?></td>
                        <td><?= $genre ?></td>
                        <td><a href="edit-artist?id=<?= $mid ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a href="edit-artist-cat?id=<?= $mid ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a href="edit?img=<?= $mid ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a href="edit?acid=<?= $fkacid ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a href="delete?mid=<?= $mid ?>&acid=<?= $fkacid ?>&img=<?= $img ?>" onclick="return confirm('Are you sure you want to delete -<?= $bn ?>- and the contact info?');" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                <?php
                }
                ?>
                </table>
                <h3>Artist contact order by artist</h3>
                <table class="table table-striped table-hover">
                <tr>
                    <th>Band name</th>
                    <th>Contact person</th>
                    <th>Contact phone</th>
                    <th>Contact email</th>
                </tr>
                <?php
                require_once '../dbcon.php';
                $stmt = $link->prepare("SELECT a.artist_contact_id, 
                                               a.contact_name, 
                                               a.phone, 
                                               a.email, 
                                               m.band_name,
                                               m.fk_artistcontact_id
                                                   
                                               FROM artist_contact a, music m
                                               WHERE m.fk_artistcontact_id = a.artist_contact_id
                                               AND m.band_name COLLATE UTF8_GENERAL_CI LIKE '%$search%'
                                               ");
                $stmt->execute();
                $stmt->bind_result($acid, $cn, $p, $e, $bn, $fkid);
                
                while($stmt->fetch()) {
                ?>
                <tr>
                    <td><?= $bn ?></td>
                    <td><?= $cn ?></td>
                    <td><a href="tel:<?= $p ?>"><?= $p ?></a></td>
                    <td><a href="mailto:<?= $e ?>" target="_top"><?= $e ?></a></td>
                </tr>
                <?php
                }
                ?>
                </table>
                <h3>Artist contact order by contact name</h3>
                <table class="table table-striped table-hover">
                <tr>
                    <th>Band name</th>
                    <th>Contact person</th>
                    <th>Contact phone</th>
                    <th>Contact email</th>
                </tr>
                <?php
                require_once '../dbcon.php';
                $stmt = $link->prepare("SELECT a.artist_contact_id, 
                                               a.contact_name, 
                                               a.phone, 
                                               a.email, 
                                               m.band_name,
                                               m.fk_artistcontact_id
                                                   
                                               FROM artist_contact a, music m
                                               WHERE m.fk_artistcontact_id = a.artist_contact_id
                                               AND a.contact_name COLLATE UTF8_GENERAL_CI LIKE '%$search%'
                                               ");
                $stmt->execute();
                $stmt->bind_result($acid, $cn, $p, $e, $bn, $fkid);
                
                while($stmt->fetch()) {
                ?>
                <tr>
                    <td><?= $bn ?></td>
                    <td><?= $cn ?></td>
                    <td><a href="tel:<?= $p ?>"><?= $p ?></a></td>
                    <td><a href="mailto:<?= $e ?>" target="_top"><?= $e ?></a></td>
                </tr>
                <?php
                }
                ?>
                </table>
                <?php    
                }else{
                    ?>
                    <div class="intro">
                        <h6>Welcome to</h6>
                        <h5>SKYSCRAPER</h1>
                        <h6>Admin page</h2>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>