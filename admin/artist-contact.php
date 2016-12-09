<?php
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Artist contact</h1>
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
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>