<!-- index no follow! -->
<?php
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
            $msg = 'Bruger er nu oprettet';
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
    <?php echo $msg; ?>
    <?php echo $emailVal; ?>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="name" placeholder="Full name"><br><br>
        <input type="text" name="uname" placeholder="Email"><br><br>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <input class="btn btn-info" name="SIGNUP" type="submit" value="Opret bruger">   
    </form>
</body>
</html>