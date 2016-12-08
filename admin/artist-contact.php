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
                    $stmt = $link->prepare("SELECT contact_name, phone, email FROM artist_contact");
                    $stmt->execute();
                    $stmt->bind_result($cn, $p, $e);
                
                        while($stmt->fetch()) {
                        ?>
                    <tr>
                    <td>name</td>
                    <td><?= $cn ?></td>
                        <td><a href="tel:<?= $p ?> "><?= $p ?></a></td>
                    <td><?= $e ?></td>
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