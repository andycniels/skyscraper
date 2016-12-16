<?php
include 'header.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">New demos</h1>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Band name</th>
                        <th>
                            Description
                            <p style="visibility: hidden;">pppppppppppppppppppppppp</p>
                        </th>
                        <th>Genre</th>
                        <th>Link</th>
                        <th>Contact person</th>
                        <th>Contact phone</th>
                        <th>Contact email</th>
                        <th>Add to artists</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                require_once '../dbcon.php';
                $stmt = $link->prepare("SELECT m.music_id, 
                                               m.band_name, 
                                               m.img, 
                                               m.text, 
                                               m.fk_soundcloud_id,
                                               m.fk_musicgenre_id,
                                               m.fk_artistcontact_id, 
                                               m.fk_cat_id,
                                               
                                               g.genre_id,
                                               g.genre,
                                               
                                               a.artist_contact_id, 
                                               a.contact_name, 
                                               a.phone, 
                                               a.email,
                                               
                                               l.soundcloud_id,
                                               l.s_url,
                                               l.y_url
                                               
                                               FROM music m, music_genre g, artist_contact a, link l
                                               WHERE m.fk_musicgenre_id = g.genre_id
                                               AND m.fk_artistcontact_id = a.artist_contact_id
                                               AND m.fk_soundcloud_id = l.soundcloud_id
                                               AND fk_cat_id = 3
                                               ORDER BY m.music_id DESC
                                        ");
                $stmt->execute();
                $stmt->bind_result($mid, $bn, $img, $text, $fklinkid, $fkmid, $fkacid, $fkcid,
                                   $gid, $genre,
                                   $artistcid, $acn, $acp, $ace,
                                   $linkid, $s, $y
                                  );
                
                while($stmt->fetch()) {
                ?>
                <tr>
                    <td><?= $bn ?></td>
                    <td><?= $text ?></td>
                    <td><?= $genre ?></td>
                    <td>
                    <?php
                    if (!empty($y)) {
                        echo "<a href='https://www.youtube.com/$y' target='_blank'><img src='../icons/yticon.png'></a>";
                    }
                    if (!empty($s)) {
                        echo "<a href='https://soundcloud.com/$s' target='_blank'><img src='../icons/scicon.png'></a>";
                    }
                    ?>
                    </td>
                    <td><?= $acn ?></td>
                    <td><?= $acp ?></td>
                    <td><?= $ace ?></td>
                    <td><a href="edit-demo?mid=<?= $mid ?>&linkid=<?= $linkid ?>&catid=<?= $fkcid ?>" onclick="return confirm('Are you sure you want to add -<?= $bn ?>- to your artist list? this will display this artist on the front page');" ><i class="fa fa-heart-o" aria-hidden="true"></i></a></td>
                    
                    <td><a href="delete?mid=<?= $mid ?>&acid=<?= $fkacid ?>&img=<?= $img ?>&linkid=<?= $linkid ?>&catid=<?= $fkcid ?>" onclick="return confirm('Are you sure you want to delete -<?= $bn ?>- ? This will delete; the artist, the contact and music link');" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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