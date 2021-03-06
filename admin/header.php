<?php
ob_start();
session_start();
if (!isset($_SESSION['id'])){
    ?> <script> window.location.replace('../') </script> <?php
}
$sid = $_SESSION['id'];
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
            }else{
                echo '- '.$title;
            }
            ?>
        </title>
        <meta name="description" content="WE ARE DEDICATED TO NEW AND INSPIRING ARTISTS. WE'D LOVE TO HEAR FROM YOU. SUBMIT YOUR DEMO BELOW.">
        <meta name="keywords" content="Youtube, Soundcloud, Spotify, DIGITAL DISRUPION, DEVELOPMENT, MARKETING, B2B">
        <meta name="JAKOB DEICHMANN" content="Skyscraper">
		<!-- Fonts fra: https://typekit.com -->
		<script src="https://use.typekit.net/tod5pae.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<!-- Bootstrap og admin css plus theme style -->
		<link rel="stylesheet" href="../dist/css/admin.css">
	</head>
<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="../admin/" class="site_title">
							<img src="../icons/logo-black-wht-line_RGB.png" alt="" height="40px">
							<span>Skyscraper</span>
							</a>
						</div>
						<div class="clearfix"></div>
						<br />
						<!-- sidebar menu -->
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<ul class="nav side-menu">
									<li>
										<a><i class="fa fa-info-circle" aria-hidden="true"></i> About <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="about-image">Image upload (box 1)</a></li>
											<li><a href="about-description">Short description (box 2)</a></li>
											<li><a href="main-about">Main about (box 3)</a></li>
											<li><a href="quote">Quote (box 4)</a></li>
										</ul>
									</li>
									
									<li>
										<a><i class="fa fa-id-card-o" aria-hidden="true"></i> Artists <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="new-artist">Add new</a></li>
											<li><a href="artist">Artists (edit and delete)</a></li>
										</ul>
									</li>
                                    <li>
										<a><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="page-contact">Page Contact</a></li>
											<li><a href="artist-contact">Artist Contact</a></li>
										</ul>
									</li>
                                    <li>
										<a><i class="fa fa-user-o" aria-hidden="true"></i> User <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="../user">Add new user</a></li>
											<li><a href="user">Delete user</a></li>
										</ul>
									</li>
                                    <li>
										<a href="Adminmanual.pdf" target="_blank"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Admin manual</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- /sidebar menu -->
					</div>
				</div>
				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<nav class="" role="navigation">
							<div class="nav toggle hidden-lg hidden-md">
								<a id="menu_toggle"><i class="fa fa-bars"></i></a>
							</div>
							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <?php
                                        //name from user
                                        require_once '../dbcon.php';
                                        $stmt = $link->prepare("SELECT name FROM `user` WHERE user_id = $sid");
                                            $stmt->execute();
                                            $stmt->bind_result($name);
                                            while($stmt->fetch()) {	
                                            }
                                        ?>
										
										<p class="profile-name"><?= $name ?></p>
										<span class=" fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li><a class="test" href="../"><i class="fa fa-home pull-right" aria-hidden="true"></i> Go to homepage</a></li>
										<li><a href="destroy" name="LOGOUT" type="submit" value="LOGOUT"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
									</ul>
								</li>
								<li role="presentation">
									<a href="demo" class="dropdown-toggle info-number">
									Talent inbox
                                    <?php
                                    require_once '../dbcon.php';
                                    $stmt = $link->prepare("SELECT COUNT(music_id) FROM music WHERE fk_cat_id = 3;");
                                    $stmt->execute();
                                    $stmt->bind_result($mid);
                                        while($stmt->fetch()) {    
                                        }
                                    ?>
									<span class="badge bg-green"><?= $mid ?></span>
									</a>
								</li>
                                <li role="presentation">
									<a data-toggle="collapse" data-target="#search_toggle" class="dropdown-toggle info-number">
									<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->