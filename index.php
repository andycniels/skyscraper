<?php include 'header.php' ?>
<body>
    <div class="container-fluid">
       <header>
            <div class="row">
                <div class="hero-header">
                        <?php include 'nav.php' ?>
                    <div class="hero-container">
                        <h2><span class="text-left">WE ARE</span></h2>
                        <h1>SKYSCRAPER</h1>
                        <h2>AND WE <span class="high-text">BUILD ARTISTS</span></h2>
                        <a href="#" class="btn btn-outline-inverse btn-lg hero-btn">CONTACT</a>
                        <div class="circle-down">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="row row-eq-height">
            <div class="col-sm-6 eq-height">
                <img class="img-responsive" src="img/boxone.jpg">
            </div>

            <div class="col-sm-6 eq-height">
                <h2>ABOUT</h2>
                <p><span style="color: #51a4b9">SKYSCRAPER</span> IS A RECORD LABEL AND DIGITAL MUSIC DISTRIBUTOR<span style="color: #51a4b9">,</span> PIONEERING THE MUSIC INDUSTRY INTO THE DIGITAL AGE<span style="color: #51a4b9">.</span></p>
            </div>
        </div>

        <div class="row row-eq-height">
            <div class="col-sm-6">

            </div>

            <div class="col-sm-6">

            </div>
        </div>
        <!-- main box info -->
        <div class="row our-work">
<!--           <div class="our-work">-->
                <h2 class="box-headline text-center">our work</h2>
                <div class="col-sm-3">
                    <img src="icons/power.svg" alt="power">
                    <p>digital disruption</p>
                </div>
                <div class="col-sm-3">
                    <img src="icons/setting.svg" alt="cog">
                    <p>bp development</p>
                </div>
                <div class="col-sm-3">
                    <img src="icons/marketing.svg" alt="certficate">
                    <p>marketing</p>
                </div>
                <div class="col-sm-3">
                    <img src="icons/wallet.svg" alt="wallet">
                    <p>sales and distribution</p>
                </div>
<!--            </div>-->
        </div>
        <?php 
            include('footer.php');
        ?>