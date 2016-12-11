<?php
$acid = $_GET['acid'];
if (empty($acid)) {
    header('Location: ../admin');
}
//Update
if (isset($_POST["edit"])){
    $cname = filter_input(INPUT_POST, 'contact_name');
    $cphone = filter_input(INPUT_POST, 'contact_phone');
    $cemail = filter_input(INPUT_POST, 'contact_email');
    
    if(empty($_POST["contact_name"])){
        $error = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["contact_phone"])){
        $error2 = '<p style="color:red;">Must not be empty</p>';
    }
    else if(empty($_POST["contact_email"])){
        $error3 = '<p style="color:red;">Must not be empty</p>';
    }
    else if (filter_var($cemail, FILTER_VALIDATE_EMAIL) === false) {
        $emailVal = "<p style='color:red;'>'$cemail' is not a valid email address</p>";
    }else{
        require_once '../dbcon.php';
        $sql = "UPDATE artist_contact SET contact_name=?, phone=?, email=? WHERE artist_contact_id = $acid";
        $stmt = $link->prepare($sql);
        $stmt->bind_param('sss', $cname, $cphone, $cemail);
        $stmt->execute();
        header('Location: artist');
    }
}
include 'header.php';
include 'nav.php';
require_once '../dbcon.php';
$stmt = $link->prepare("SELECT contact_name, phone, email FROM `artist_contact` WHERE artist_contact_id = $acid");
    $stmt->execute();
    $stmt->bind_result($name, $phone, $email);
    while($stmt->fetch()) {	
    }
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Edit artist contact</h1>
            <a href="artist"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go back</a>
            <br>
            <br>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <?php echo $error; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_name" value="<?= $name ?>" placeholder="Contact person">
                </div>
                <?php echo $error2; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_phone" value="<?= $phone ?>" placeholder="Contact phone">
                </div>
                <?php echo $emailVal; ?>
                <?php echo $error3; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_email" value="<?= $email ?>" placeholder="Contact email">
                </div>
                <input class="btn btn-default" name="edit" type="submit" value="Edit contact">
            </form>  
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>