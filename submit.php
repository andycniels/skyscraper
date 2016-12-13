<!DOCTYPE html>
<html>
    <head>
        <title>Submit your demo</title>
        <link rel="stylesheet" href="dist/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet">
    </head>
    <body class="submit-body">
        <div class="row row-eq-height">
            <div class="col-sm-6 eq-height">
                <img src="img/man-bass.jpg" class="img-responsive">
            </div>

            <div class="col-sm-6 eq-height">
                <div class="submit-info">
                    <h2>WE BUILD ARTISTS</h2>
                    <p><span style="color: #51a4b9">WE ARE DEDICATED</span> TO NEW AND INSPIRING ARTISTS<span style="color: #51a4b9">.</span> WE'D LOVE TO HEAR FROM YOU<span style="color: #51a4b9">.</span> SUBMIT YOUR DEMO BELOW<span style="color: #51a4b9">.</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 submit-wrapper">
                <h2>WE'D LOVE TO HEAR FROM YOU</h2>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="demo-submit">
                    <div class="form-group">
                        <input type="text" class="form-control" name="band_name" placeholder="ARTIST NAME">
                    </div>
                    <div class="wrap-info">
                    <div class="form-group contact_info">
                        <input type="text" class="form-control" name="contact_name" placeholder="CONTACT NAME">
                    </div>
                    <div class="form-group contact_info">
                        <input type="email" class="form-control" name="contact_email" placeholder="CONTACT EMAIL">
                    </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="phone_number" placeholder="PHONE">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">youtube.com/channel/</span>
                        <input type="text" class="form-control" name="youtube_link" placeholder="YOUTUBE CHANNEL">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">soundcloud.com/</span>
                        <input type="text" class="form-control" name="soundcloud_link" placeholder="SOUNDCLOUD USERNAME">
                    </div>
                    <div class="form-group">
                    <select class="form-control">
                      <option>Genre</option>
                      <option>Pop</option>
                      <option>Rock</option>
                      <option>Pop rock</option>
                      <option>Rock pop</option>
                    </select>
                    </div>                   
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="band_name" placeholder="DESCRIPTION"></textarea>
                    </div>
                    <div class="form-group">
                    <img class="input-thumb" id="thumbnail">
                    <input type="file" name="fileToUpload" id="fileToUpload" value="focus.jpg" onchange="readURL(this);">
                    <label class="label-an" for="fileToUpload"><i class="fa fa-upload" aria-hidden="true"></i>Choose an image</label>
                </div>
                    <div class="form-group">
                        <input class="btn btn-default" name="artist" type="submit" value="Add artist">
                    </div>

                </form>
            </div>
        </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
            <script src="dist/js/gsap.js"></script>
        <?php 
            include 'footer.php';
        ?>
