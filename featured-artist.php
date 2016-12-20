<?php 
$search = filter_input(INPUT_GET, 'artist-search', FILTER_SANITIZE_STRING);
include 'header.php'; 
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
            <?php
            if (empty($search)){
            require_once 'dbcon.php';
            $stmt = $link->prepare("SELECT m.music_id,
                                           m.band_name, 
                                           m.img, 
                                           m.text, 
                                           m.fk_musicgenre_id, 
                                           m.fk_label_id,  
                                           m.fk_cat_id,
                                           m.fk_soundcloud_id,
                                           l.label_id,
                                           l.label,
                                           g.genre_id,
                                           g.genre,
                                           s.soundcloud_id,
                                           s.s_url,
                                           s.y_url,
                                           s.m_url                    
                                    FROM music m, labels l, music_genre g, link s            
                                    WHERE m.fk_musicgenre_id = g.genre_id
                                    AND m.fk_label_id = l.label_id           
                                    AND m.fk_soundcloud_id = s.soundcloud_id
                                    ORDER BY m.music_id DESC
                                    ");
                $stmt->execute();
                $stmt->bind_result($mid, $bn, $img, $text, $fkmid, $fklid, $fkcid, $fklink,
                                   $lid, $label,
                                   $gid, $genre,
                                   $sid, $s, $y, $m
                                  );
                
                    while($stmt->fetch()) {
            ?>
            
                <div class="row col-md-6 col-lg-4 artist">
                    <div class="artist-info">
                        <div class="col-xs-12">
                            <h3 class="artist-name"><?= $bn ?></h3>
                            <p><?= substr($text,0,150); ?></p>
                        </div>
                        <div class="col-xs-6">
                            <p class="album-name"><?= $label ?></p>
                            <p class="services"><?= $genre ?></p>
                        </div>
                        <div class="col-xs-6 social">
                            <?php
                                if (!empty($m)) {
                                    echo "<a href='$m' target='_blank'><i class='fa fa-spotify' aria-hidden='true'></i></a>";
                                }
                                if (!empty($s)) {
                                    echo "<a href='https://soundcloud.com/$s' target='_blank'><i class='fa fa-soundcloud' aria-hidden='true'></i></a>";
                                }
                                if (!empty($y)) {
                                    echo "<a href='https://youtube.com/$y' target='_blank'><i class='fa fa-youtube' aria-hidden='true'></i></a>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="center-cropped" 
                        style="background-image: url('img/artist/<?= $img ?>');">
                    </div>
                </div>
            
        
        <?php
                    }
        }else{
            require_once 'dbcon.php';
            $stmt = $link->prepare("SELECT m.music_id,
                                           m.band_name, 
                                           m.img, 
                                           m.text, 
                                           m.fk_musicgenre_id, 
                                           m.fk_label_id,  
                                           m.fk_cat_id,
                                           m.fk_soundcloud_id,
                                           l.label_id,
                                           l.label,
                                           g.genre_id,
                                           g.genre,
                                           s.soundcloud_id,
                                           s.s_url,
                                           s.y_url,
                                           s.m_url                    
                                    FROM music m, labels l, music_genre g, link s            
                                    WHERE m.fk_musicgenre_id = g.genre_id
                                    AND m.fk_label_id = l.label_id           
                                    AND m.fk_soundcloud_id = s.soundcloud_id
                                    AND m.band_name COLLATE UTF8_GENERAL_CI LIKE '%$search%'
                                    ");
                $stmt->execute();
                $stmt->bind_result($mid, $bn, $img, $text, $fkmid, $fklid, $fkcid, $fklink,
                                   $lid, $label,
                                   $gid, $genre,
                                   $sid, $s, $y, $m
                                  );
                
                    while($stmt->fetch()) {
            ?>
            
                <div class="row col-md-6 col-lg-4 artist">
                    <div class="artist-info">
                        <div class="col-xs-12">
                            <h3 class="artist-name"><?= $bn ?></h3>
                            <p><?= substr($text,0,150); ?></p>
                        </div>
                        <div class="col-xs-6">
                            <p class="album-name"><?= $label ?></p>
                            <p class="services"><?= $genre ?></p>
                        </div>
                        <div class="col-xs-6 social">
                            <?php
                                if (!empty($m)) {
                                    echo "<a href='$m' target='_blank'><i class='fa fa-spotify' aria-hidden='true'></i></a>";
                                }
                                if (!empty($s)) {
                                    echo "<a href='https://soundcloud.com/$s' target='_blank'><i class='fa fa-soundcloud' aria-hidden='true'></i></a>";
                                }
                                if (!empty($y)) {
                                    echo "<a href='https://youtube.com/$y' target='_blank'><i class='fa fa-youtube' aria-hidden='true'></i></a>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="center-cropped" 
                        style="background-image: url('img/artist/<?= $img ?>');">
                    </div>
                </div>
            
        
        <?php
            }
        }   
        ?>       
        </div>    
        <?php
        include 'footer.php';
        ?>
            </div>