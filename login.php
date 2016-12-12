<?php

if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $password = $_POST['password'];

  // Escape string for user input
  $username = mysqli_real_escape_string($db, $username);
  $password = mysqli_real_escape_string($db, $password);
  // Strip tags


  $password = md5($password);

  // checking for empty fields
  if(empty($username) || empty($password)){

    $error = "please fill out both fields";

  } else {

    $query = $db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $row = mysqli_num_rows($query);

    if($row === 1){
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['login'] = 1;
      header("Location: profile.php");
    } else {

      $error = "user not found";

    }

  }

}
