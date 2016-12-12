<?php

session_start();

        //besked string til brugeren
$msg =""; 
if (isset($_POST["SIGNUP"]))
{
    
    $name = $_POST ['name'];
    $user_name = $_POST ['uname'];
    $pwd = $_POST ['pwd'];
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

        // tjekker for tomme felter.
    if(empty($name)||empty($user_name)||empty($pwd)){
        $msg = 'Udfyld venligst alle felter';
    }else{
   
        
        echo $name . $user_name . $pwd;
       
       
        //Sikre mod SQL injection     
       /* require_once 'dbcon.php';
        $sql = 'INSERT INTO USER (name, uname, pwd) VALUES (?,?,?)';
        $stmt = $link->prepare($sql);        
    $stmt->bind_param('sss',$name,$user_name,$pwdHash);
        $stmt->execute();
        //besked til brugeren hvis det er korrekt oprettet..
        $msg = 'Bruger er nu oprettet';*/
    }


   
}
        // tjekker om der er klikket på login
if (isset($_POST["LOGIN"])){
    
    $uname = $_POST ['user_name'];
    $pwd = $_POST ['pwd'];
    //echo 'Du er nu logget ind!';
    //echo $uname.' '.$pwd;
     require_once 'dbcon.php';
    $sql = "SELECT id, name, user_name, pwd FROM USER WHERE user_name=?";
    
    $stmt = $link->prepare($sql);
    
    $stmt->bind_param('s',$user_name);
    
    $stmt->execute();

    $stmt->bind_result($id, $user_name, $pwdHash);
    //hvis logget ind kommer man til hemmelig side
    if($stmt->fetch()){		
        $pwd = $pwd;
        $pwdHash = $pwdHash;
        if(password_verify($pwd,$pwdHash)){
            $_SESSION['uid'] = $id;
            
            header('Location: admin.php');
        }else{
            //besked hvis login er forkert.
            echo 'Login Failed!';
        }
    }

}


?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
  

    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="text" name="uname" placeholder="Email"><br><br>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <input class="btn btn-info" name="SIGNUP" type="submit" value="Opret bruger">   
    </form>
    <br><br>
      <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="user_name" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input class="btn btn-info" name="LOGIN" type="submit" value="LOGIN">   
    </form>
    
    <p>
    <?php echo $msg; ?>
    </p>
</body>
</html>
