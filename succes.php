<?php
header("Refresh:5; url=index");
?>
<!DOCTYPE html>
<html lang="da">
	<head>
        <meta name="robots" content="noindex">
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<!-- Fonts fra: https://typekit.com -->
		<script src="https://use.typekit.net/tod5pae.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<!-- Bootstrap og admin css plus theme style -->
		<link rel="stylesheet" href="dist/css/style.css">
    </head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="hero-header">
            <div class="hero-container">
            <h1>Thank you!</h1>
                <br>
                <br>
            <h2>We can't wait to see, what you have sent us :-)</h2>
            <br>               
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
