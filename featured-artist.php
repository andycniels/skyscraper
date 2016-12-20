<?php 
//$search = filter_input(INPUT_GET, 'artist-search', FILTER_SANITIZE_STRING);
include 'header.php' 
?>
    <body class="artist-body">
        <div class="container-fluid">
            <div class="row">
                <?php include 'nav.php' ?>
                <div style="margin-top:13vh;"></div>
                <div class="col-sm-12">
                    <h1 class="artist-headline">FEATURED ARTISTS</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 search-bar">
                    <form class="search" action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                      <input type="search" name="artist-search" placeholder="Search for an artist...">
                      <input type="submit" name="name" value="Search">
                    </form>
                </div>    
            </div>
                <div class="row artistwrapper">
                    <div class="col-lg-3 col-xs-6 artist-box-img">
                        <img class="img-responsive" src="img/artist/1004043352.jpg" alt="img">
                        <div class="overlay artist-info">
                            <h3>band name</h3>
                            <p>text</p>
                            <p>genre</p>
                            <p class="label-name">label</p>          		
                        
                            <a href="#" target="_blank"><i class="fa fa-spotify" aria-hidden="true"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-spotify" aria-hidden="true"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-spotify" aria-hidden="true"></i></a>
                        </div>  
                    </div>
                </div>                
<?php
        include 'footer.php';
        ?>
        </div>