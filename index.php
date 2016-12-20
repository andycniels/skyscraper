        <?php include 'header.php'; 
require_once 'dbcon.php';
$stmt = $link->prepare("SELECT headline,
                               text,
                               img,
                               quote,
                               box_headline_one,
                               box_text_one,
                               box_headline_two,
                               box_text_two,
                               box_headline_three,
                               box_text_three 
                        FROM about");
    $stmt->execute();
    $stmt->bind_result($headline, 
                       $txt,
                       $img,
                       $quote,
                       $bh1,
                       $bt1,
                       $bh2,
                       $bt2,
                       $bh3,
                       $bt3
                      );
    while($stmt->fetch()) {	
    } 
?>
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
            <div class="col-sm-6 eq-height hidden-xs">
                <img class="img-responsive" src="img/<?= $img ?>" alt="skyscraper">
            </div>

            <div class="col-sm-6 eq-height">
                <h2><?= $headline ?></h2>
                <p><?= $txt ?></p>
            </div>
        </div>

        <div class="row row-eq-height front-row">
            <div class="col-sm-6 eq-height about">
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#who" aria-controls="who" role="tab" data-toggle="tab">
                            <?= $bh1 ?>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#mission" aria-controls="mission" role="tab" data-toggle="tab">
                            <?= $bh2 ?>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#goal" aria-controls="goal" role="tab" data-toggle="tab">
                            <?= $bh3 ?>
                        </a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="who">
                        <p><?= $bt1 ?></p>  
                    </div>
                    <div role="tabpanel" class="tab-pane" id="mission">                      
                        <p><?= $bt2 ?></p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="goal">
                        <p><?= $bt3 ?></p>
                    </div>
                  </div>

                </div>
            </div>  

            <div class="col-sm-6 eq-height quote">
            <div class="holder">
              <img class="quote-icon" src="icons/quote.png" alt="quote">
            	<p><?= $quote ?></p>
              <br>
              <p class="title"><span style="color: white;">JAKOB DEICHMANN</span><br>CEO @SKYSCRAPER</p>
              <img src="img/signature.png" class="signature" alt="signature">
              </div>
            </div>
        </div>
        <!-- main box info -->
        <div class="row our-work">
<!--           <div class="our-work">-->
                <h2 class="box-headline text-center">our work</h2>
                <div class="col-sm-3">
                    <img src="icons/power.svg" alt="power">
                    <p>digital disrupion</p>
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
        </div>
        <?php 
            include('footer.php');
        ?>
    </div>