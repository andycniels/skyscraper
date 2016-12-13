<div class="row our-partners text-center">
<!--            <div class="our-partners text-center">-->
               <h2 class="box-headline">our partners</h2>
                <div class="col-sm-4">
                    <img src="icons/GPMLogo.png" alt="">
                </div>
                <div class="col-sm-4">
                    <img src="icons/spotify-logo-horizontal-white-rgb.png" alt="">
                </div>
                <div class="col-sm-4">
                    <img src="icons/US_Listen_on_Apple_Music_Badge.svg" alt="">
                </div>
<!--            </div>-->
        </div>
        <div class="row footer">
            <div class="col-sm-6 no-padding">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2249.8341057495727!2d12.547419751450349!3d55.67448490540157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465253a06a917113%3A0x9d089c4343ef204a!2sGammel+Kongevej+85%2C+1610+K%C3%B8benhavn+V!5e0!3m2!1sda!2sdk!4v1481210728166" width="100%" height="400" frameborder="0" style="border:0; pointer-events:none;" allowfullscreen></iframe>
            </div>
            <div class="col-sm-6 no-padding">
                <div class="contact-info">
                    <h3 class="box-headline">contact info</h3>
                    <hr class="headline-underline" align="left">
                    <br>
                    <h3>Gammel Kongevej 85 <br>
                    1610 Copenhagen V <br><br>
                    <a href="mailto:howdy@skyscraper.dk"><span class="high-text">howdy&#64;skyscraper.dk</span></a></h3>
                </div>
            </div>
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
                $(".hero-btn").click(function(){
                    $("html, body").animate({
                        scrollTop: $(".contact-info").offset().top
                    }, 1000);
                });
            });
        </script>
    </body>
</html>
