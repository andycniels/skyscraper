<?php
//Update contact info on main page
if (isset($_POST["contact"])){
    $street = filter_input(INPUT_POST, 'street');
    $town = filter_input(INPUT_POST, 'town');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    
    if(empty($_POST["street"])){
        $error = '<p style="color:red;">Street name must not be empty</p>';
    }
    else if(empty($_POST["town"])){
        $error2 = '<p style="color:red;">Zip & town must not be empty</p>';
    }
    else if(empty($_POST["phone"])){
        $error3 = '<p style="color:red;">Phone nr. must not be empty</p>';
    }
    else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $emailVal = "<p style='color:red;'>'$email' is not a valid email address</p>";
    }
    else if(empty($_POST["email"])){
        $error4 = '<p style="color:red;">Email must not be empty</p>';
    }else{
        require_once '../dbcon.php';
        $sql = 'UPDATE page_contact SET street=?,town=?,phone=?,email=? WHERE page_contact_id=1';
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ssss', $street, $town, $phone, $email);
        $stmt->execute();
        header("Refresh:0");
    }
}
include 'header.php';
require_once '../dbcon.php';
$stmt = $link->prepare("SELECT street, town, phone, email FROM `page_contact`");
    $stmt->execute();
    $stmt->bind_result($street, $town, $phone, $email);
    while($stmt->fetch()) {	
    }
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Page contact</h1>
            <p>Update Contact info here..</p>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-group">
                    <?php echo $error; ?>
                    <input type="text" class="form-control" name="street" value="<?= $street ?>" placeholder="Street">
                </div>
                <div class="form-group">
                    <?php echo $error2; ?>
                    <input type="text" class="form-control" name="town" value="<?= $town ?>" placeholder="zip and town">
                </div>
                <div class="form-group">
                    <?php echo $error3; ?>
                    <?php echo $phoneVal; ?>
                    <input type="text" class="form-control" name="phone" value="<?= $phone ?>" placeholder="Phone">
                </div>
                <div class="form-group">
                    <?php echo $error4; ?>
                    <?php echo $emailVal; ?>
                    <input type="text" class="form-control" name="email" value="<?= $email ?>" placeholder="Email">
                </div>
                <input class="btn btn-default" name="contact" type="submit" value="Update">
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>