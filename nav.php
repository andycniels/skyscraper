<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="dist/css/style.css">
    <style>
        .top-nav-bar{
            height: 60px;
            padding: 4% 0 0;
        }
        .burger {
            float: right;
        }
        nav{
            border-bottom: 2px solid black;
        }
        .nav ul{
            padding: 0;
        }
        .nav ul li{
            list-style: none;
            text-align: center; 
            margin: 12% 0;
        }
        .nav ul li a {
            padding: 6% 15%;
            font-size: 1.4em;
            
        }
        .social{
            text-align: center;
        }
        .social ul{
            padding: 0;
        }
        .social ul li{
            list-style: none;
            display: inline-block;
            margin:5% 0;
        }
        .social ul li a {
            padding: 9% 30%;
            font-size: 2em;
        }
        .social .fa{
            margin: 0;
        }
        
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="top-nav-bar col-xs-12 col-sm-2">
               <div class="col-xs-2 col-sm-4">
                   <img class="img-responsive brand-logo" src="icons/logo-blk-whitline.png">
               </div>
                <div class="col-xs-2 hidden-sm hidden-md hidden-lg burger">
                   <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>    
            <nav class="col-xs-12 col-sm-10">
                <div class="nav">
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">FEATURED ARTIST</a></li>
                        <li><a href="#">SUBMIT DEMO</a></li>
                    </ul>
                </div>    
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
