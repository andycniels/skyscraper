<!-- index no follow! -->
<?php
session_start();
if (!isset($_SESSION['id'])){
    ?> <script> window.location.replace('admin/../') </script> <?php
}
//add new user
if (isset($_POST["SIGNUP"])){
    $name = filter_input(INPUT_POST, 'name');
    $user_name = filter_input(INPUT_POST, 'uname');
    $pwd = filter_input(INPUT_POST, 'pwd');
    //password hash
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    // tjekker for tomme felter.
    if(empty($name)||empty($user_name)||empty($pwd)){
        $msg = '<p style="color:red;">Please fill out all the fields</p>';
    }
    //email val
    else if (filter_var($user_name, FILTER_VALIDATE_EMAIL) === false) {
        $emailVal = "<p style='color:red;'>'$user_name' is not a valid email address</p>";
    }else{
        //if email is in the database   
        require_once 'dbcon.php';
        $stmt = $link->prepare("SELECT user_name FROM user WHERE user_name = '$user_name'");
        $stmt->execute();
        $stmt->bind_result($un);
            while($stmt->fetch()) {	
        }
        $a = array($un, $user_name);
        if(count(array_unique($a)) == 1){
            $msg = 'Email er den samme som i database';
        }else {
            //Add new user to database 
            $sql = 'INSERT INTO USER (name, user_name, password) VALUES (?,?,?)';
            $stmt = $link->prepare($sql);        
            $stmt->bind_param('sss',$name,$user_name,$pwd);
            $stmt->execute();
            //besked til brugeren hvis det er korrekt oprettet..
            ?> <script> window.location.replace('admin/') </script> <?php
        }
    }   
}
?>
<html lang="da">
	<head>
        <meta name="robots" content="noindex">
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<!-- Fonts fra: https://typekit.com -->
		<script src="https://use.typekit.net/tod5pae.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<!-- Bootstrap og admin css plus theme style -->
		<link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="hero-header">
            <div class="hero-container">
        <!--<div class="logo">
                <img src="img/logo-blue-whitline.png" alt="">
            </div>-->
            <h1>SKYSCRAPER</h1>
            <h2>Add new user</h2>
            <br>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <?php echo $msg; ?>
        <?php echo $emailVal; ?>
        <input type="text" name="name" placeholder="Full name"><br><br>
        <input type="text" name="uname" placeholder="Email"><br><br>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <input class="btn btn-info" name="SIGNUP" type="submit" value="Opret bruger">   
    </form>
</div>
        </div>
    </div>
</div>
<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="dist/js/bootstrap.min.js"></script>
        <!-- Show a thumbnail above the file input -->
        <script>
        //Thumbnail placeholder
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumbnail')
                        .attr('src', e.target.result)
                        .width(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
        
        <!-- Hero button jump to section -->
        <script>
            $(document).ready(function(){
                $(".hero-btn").click(function(){
                    $("html, body").animate({
                        scrollTop: $(".contact-info").offset().top
                    }, 1000);
                });
            });
        </script>
	</body>
</html>