<?php include 'header.php' ?>
    <body class="artist-body">
        <div class="container-fluid">
            <div class="row">
                <?php include 'nav.php' ?>
                <div style="margin-top:13vh;"></div>
                <div class="col-sm-12">
                    <h2 class="artist-headline">FEATURED ARTISTS</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 search-bar">
                    <form class="search">
                      <input type="search" name="artist-search" placeholder="Search for an artist...">
                      <input type="submit" name="submit" value="Search">
                    </form>
                </div>    
            </div>

            <div class="row artistwrapper">
            	<div class="col-sm-6 artist-box-img">
            		<img class="img-responsive" src="img/wavves.jpg">
            	</div>

            	<div class="col-sm-6 artist-box">
            		<div class="artist-info">
	            		<h3>Wavves</h3>
	            		<p>Lorem ipsum dolor sit amet bla bla bla what up</p>
	            		<p>Rock</p>
	            		<p class="label-name">Labrador</p>          		
            		</div>

            		<div class="social">
	            		<a href="#" target="_blank"><i class="fa fa-spotify" aria-hidden="true"></i></a>
	            		<a href="#" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
	            		<a href="#" target="_blank"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>	
            		</div>  
            		

            	</div>
            </div>
                             
        <?php
        include 'footer.php';
        ?>
        </div>