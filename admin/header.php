<!-- http://getbootstrap.com -->
<!-- Bootstrap Theme fra  https://github.com/puikinsh/gentelella/releases  -->
<!-- Genre liste til music_genre fandt vi på; http://www.vfront.org/albums.sql  -->
<!-- img thump til img upload; http://jsbin.com/hajoqexoku/edit?html,js,output  -->



<?php
//jeg tager url'en som jeg er på og vælger det sidste, fjerner .php
$title = basename($_SERVER['PHP_SELF'],'.php');
// her lave jeg - og til mellemrum
$title = str_replace('-', ' ', $title);
?>
<!DOCTYPE html>
<html lang="da">
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Skyscraper 
            <?php 
            if ($title == 'index') {
                echo '';
            }else{
                echo '- '.$title;
            }
            ?>
        </title>
		<!-- Fonts fra: https://typekit.com -->
		<script src="https://use.typekit.net/tod5pae.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<!-- Bootstrap og admin css plus theme style -->
		<link rel="stylesheet" href="../dist/css/admin.css">
	</head>
    