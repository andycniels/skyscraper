<?php
// tjekker om der er klikket på login
if (isset($_POST["LOGIN"])){
    
    $un = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
    $pwd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    if(empty($un)){
        $error = '<p style="color:red;">Udfyld en korrekt email</p>';
    }
    else if(empty($pwd)){
        $error2 = '<p style="color:red;">Skriv et password</p>';
    }else{
    
    
    require_once 'dbcon.php';
    $sql = "SELECT user_id, user_name, password FROM user WHERE user_name=?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('s',$un);
    $stmt->execute();

    $stmt->bind_result($id, $user_name, $pwdHash);
    //hvis logget ind kommer man til hemmelig side
    if($stmt->fetch()){		
        $pwd = $pwd;
        $pwdHash = $pwdHash;
        if(password_verify($pwd,$pwdHash)){
            session_start();
            $_SESSION['id'] = $id;
            ?> <script> window.location.replace('admin/') </script> <?php
        }
        if(!password_verify($pwd,$pwdHash)){
            echo '<p style="color:red;">Wrong password, try again</p>';
        }
    }

    }
}
?>
<!DOCTYPE html>
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
            <h2>Log in</h2>
            <br>
            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <?= $error ?>
            <input type="text" name="user_name" value="<?= $un ?>" placeholder="Email"><br><br>
            <?= $error2 ?>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input class="btn btn-info" name="LOGIN" type="submit" value="LOGIN">   
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
