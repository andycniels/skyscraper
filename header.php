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
        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="57x57" href="icons/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="icons/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="icons/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="icons/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="icons/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="icons/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="icons/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="icons/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="icons/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="icons/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="icons/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon/favicon-16x16.png">
        <link rel="manifest" href="icons/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="icons/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#303030">
	</head>