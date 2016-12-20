<?php
$title = basename($_SERVER['PHP_SELF'],'.php');
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
            }else{
                echo '- '.$title;
            }
            ?></title>
		<!-- Fonts fra: https://typekit.com -->
		<script src="https://use.typekit.net/tod5pae.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
        <!-- Fonts fra: google -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet">
		<!-- Bootstrap og admin css plus theme style -->
		<link rel="stylesheet" href="dist/css/style.css">
	</head>