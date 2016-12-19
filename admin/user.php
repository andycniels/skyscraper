<?php
include 'header.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Delete user</h1>
            <a href="artist"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go back</a>
            <br>
           
                <table class="table table-striped table-hover">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
                    <?php
                    require_once '../dbcon.php';
                    $stmt = $link->prepare("SELECT user_id, name, user_name, role FROM user WHERE role = 0");
                    $stmt->execute();
                    $stmt->bind_result($user_id, $name, $user_name, $role);
                    while($stmt->fetch()) {	
                    ?>
                    <tr>
                        <td><?= $name ?></td>    
                        <td><?= $user_name ?></td>    
                        <td><a href="delete?userid=<?= $user_id ?>&role=<?= $role ?>" onclick="return confirm('Are you sure you want to delete -<?= $name ?>- ?');" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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