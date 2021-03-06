<?php
require_once 'dbcon.php';
$stmt = $link->prepare("SELECT street, town, email FROM page_contact");
    $stmt->execute();
    $stmt->bind_result($s, $t, $e);
    while($stmt->fetch()) {	
    }
?>
                <div class="row row-footer contact-info">
                    <div class="col-sm-4 info-box">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p><?= $s ?></p>
                        <p><?= $t ?></p>
                    </div>
                    <a href="mailto:<?= $e ?>">
                    <div class="col-sm-4 info-box">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p><?= $e ?></p>  
                    </div>
                    </a>
                    <a href="https://www.linkedin.com/company/2863556?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A2863556%2Cidx%3A2-1-2%2CtarId%3A1482159143974%2Ctas%3Askyscraper%20corp" target="_blank">
                        <div class="col-sm-4 info-box">
                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            <p>Linkedin</p>
                        </div>
                    </a>
                </div>        
            <div class="row footer-bottom">
                <div class="col-sm-12 footer-info">
                    <iframe src="http://mapbuildr.com/frame/hafz7n" width="100%"></iframe>
                </div>
            </div>      
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="dist/js/bootstrap.min.js"></script>
        <!-- Show a thumbnail above the file input -->
        <script>
        //Thumbnail placeholder
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumbnail')
                        .attr('src', e.target.result)
                        .width(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
        
        <!-- Hero button jump to section -->
        <script>
            $(document).ready(function(){
                $(".down").click(function(){
                    $("html, body").animate({
                        scrollTop: $(".row-eq-height").offset().top
                    }, 1000);
                });
            });
        </script>
        <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script src="dist/js/gsap.js"></script>
    </body>
</html>
<!-- http://getbootstrap.com -->
<!-- Bootstrap Theme fra  https://github.com/puikinsh/gentelella/releases  -->
<!-- Genre liste til music_genre fandt vi på; http://www.vfront.org/albums.sql  -->
<!-- img thump til img upload; http://jsbin.com/hajoqexoku/edit?html,js,output  -->