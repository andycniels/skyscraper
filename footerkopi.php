
                <div class="row row-footer">
                    <div class="col-sm-4 info-box">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Gammel Kongevej 85, CPH</p>
                    </div>

                    <div class="col-sm-4 info-box">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p>howdy@skyscraper.dk</p>
                    </div>

                    <div class="col-sm-4 info-box">
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                        <p>@skyscraper</p>
                    </div>
                </div>        
            <div class="row footer-bottom">
                <div class="col-sm-12 footer-info">
                    <iframe src="http://mapbuildr.com/frame/hafz7n" frameborder="0" height="100%" width="100%"></iframe>
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
        <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script src="dist/js/gsap.js"></script>
    </body>
</html>


