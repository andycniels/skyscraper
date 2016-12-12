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
            echo 'det virker';
            ?> <script> window.location.replace('admin/') </script> <?php
        }
        if(!password_verify($pwd,$pwdHash)){
            echo '<p style="color:red;">Wrong password, try again</p>';
        }
    }

    }
}
?>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
    <?= $error ?>
    <input type="text" name="user_name" value="<?= $un ?>" placeholder="Email"><br><br>
    <?= $error2 ?>
    <input type="password" name="password" placeholder="Password"><br><br>
    <input class="btn btn-info" name="LOGIN" type="submit" value="LOGIN">   
</form>