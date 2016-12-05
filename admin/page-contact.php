<?php
//Update contact info on main page
if (isset($_POST["contact"])){
    $street = filter_input(INPUT_POST, 'street');
    $town = filter_input(INPUT_POST, 'town');
    $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
    $email = filter_input(INPUT_POST, 'email');
    
    if (filter_var($phone, FILTER_VALIDATE_INT) === false) {
        $phoneVal = '<p style="color:red;">Not a real number</p>';
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $emailVal = "<p style='color:red;'>'$email' is not a valid email address</p>";
    }
    if(empty($_POST["street"])){
        $error = '<p style="color:red;">Street name must not be empty</p>';
    }
    else if(empty($_POST["town"])){
        $error2 = '<p style="color:red;">Zip & town must not be empty</p>';
    }
    else if(empty($_POST["phone"])){
        $error3 = '<p style="color:red;">Phone nr. must not be empty</p>';
    }
    else if(empty($_POST["email"])){
        $error4 = '<p style="color:red;">Email must not be empty</p>';
    }else{
        echo $street;
        echo $town;
        echo $phone;
        echo $email;
    }
}
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">Page contact</h1>
            <p>Update Contact info here..</p>
            <form action="<?php REQUEST_FILENAME ?>" method="POST">
                <div class="form-group">
                    <?php echo $error; ?>
                    <input type="text" class="form-control" name="street" placeholder="Street">
                </div>
                <div class="form-group">
                    <?php echo $error2; ?>
                    <input type="text" class="form-control" name="town" placeholder="zip and town">
                </div>
                <div class="form-group">
                    <?php echo $error3; ?>
                    <?php echo $phoneVal; ?>
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <?php echo $error4; ?>
                    <?php echo $emailVal; ?>
                    <input type="text" class="form-control" name="email" placeholder="Email">
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