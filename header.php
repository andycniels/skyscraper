<!-- http://getbootstrap.com -->
<!-- Bootstrap Theme fra  https://github.com/puikinsh/gentelella/releases  -->
<!-- Genre liste til music_genre fandt vi på; http://www.vfront.org/albums.sql  -->
<!-- img thump til img upload; http://jsbin.com/hajoqexoku/edit?html,js,output  -->
<?php
//make a limit som database..
function custom_echo($x, $length){
            if(strlen($x)<=$length){
                echo $x;
            }else{
                $y=substr($x,0,$length) . '...';
                echo $y;
            }
        }
?>
<!DOCTYPE html>
<html lang="da">
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<!-- Fonts fra: https://typekit.com -->
		<script src="https://use.typekit.net/tod5pae.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
        <!-- Fonts fra: google -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet">
		<!-- Bootstrap og admin css plus theme style -->
		<link rel="stylesheet" href="dist/css/style.css">
	</head>