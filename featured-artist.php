<?php include 'header.php' ?>
    <body class="artist-body">
        <div class="container-fluid">
            <div class="row">
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
                <div class="col-sm-6 artist">
                    <div class="overlay">    
                    </div>
                    <div class="artist-info">
                            <h3 class="artist-name">Bishop Allen</h3>
                            <p class="album-name">Charm School</p>
                            <p class="services">Editing/Marketing/Sales</p>
                        </div>
                    <img src="img/bishop.jpg" alt="gramofon streaming device" class="img-responsive">
                </div>
                <div class="col-sm-6 artist">
                    <div class="overlay">
                    </div>
                    <div class="artist-info">
                            <h3 class="artist-name">The Shins</h3>
                            <p class="album-name">Port Of Morrow</p>
                            <p class="services">Editing/Marketing/Sales</p>
                        </div>
                    <img src="img/shins.jpg" alt="gramofon streaming device" class="img-responsive">
                </div>
            
                <div class="col-sm-6 artist">
                    <div class="overlay">
                    </div>
                        <div class="artist-info">
                            <h3 class="artist-name">Foo Fighters</h3>
                            <p class="album-name">Echoes, Silence, Patience &amp; Grace</p>
                            <p class="services">Editing/Marketing/Sales</p>
                        </div>
                    <img src="img/foo.jpg" alt="gramofon streaming device" class="img-responsive">
                </div>

                <div class="col-sm-6 artist">
                    <div class="overlay">
                    </div>
                    <div class="artist-info">
                            <h3 class="artist-name">Wavves</h3>
                            <p class="album-name">V</p>
                            <p class="services">Editing/Marketing/Sales</p>
                        </div>
                    <img src="img/wavves.jpg" alt="gramofon streaming device" class="img-responsive">
                </div>
            </div>
            
        </div>
        <?php
        include 'footer.php';
        ?>