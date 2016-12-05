<?php
//insert into tab1
if (isset($_POST["tab1"])){
    $bh = filter_input(INPUT_POST, 'bh');
    $bt = filter_input(INPUT_POST, 'bt');
    
    if(empty($_POST["bh"])){
        $error = '<p style="color:red;">Headline must not be empty</p>';
    }
    else if(empty($_POST["bt"])){
        $error = '<p style="color:red;">Text box must not be empty</p>';
    }else{
        require_once '../dbcon.php';
        $sql = 'UPDATE about SET box_headline_one=?,box_text_one=? WHERE about_id=1';
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ss', $bh, $bt);
        $stmt->execute();
        header("Refresh:0");
    }
}
//insert into tab2
if (isset($_POST["tab2"])){
    $bh = filter_input(INPUT_POST, 'bh');
    $bt = filter_input(INPUT_POST, 'bt');
    
    if(empty($_POST["bh"])){
        $error = '<p style="color:red;">Headline must not be empty</p>';
    }
    else if(empty($_POST["bt"])){
        $error = '<p style="color:red;">Text box must not be empty</p>';
    }else{
        require_once '../dbcon.php';
        $sql = 'UPDATE about SET box_headline_two=?,box_text_two=? WHERE about_id=1';
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ss', $bh, $bt);
        $stmt->execute();
        header("Refresh:0");
    }
}
//insert into tab3
if (isset($_POST["tab3"])){
    $bh = filter_input(INPUT_POST, 'bh');
    $bt = filter_input(INPUT_POST, 'bt');
    
    if(empty($_POST["bh"])){
        $error = '<p style="color:red;">Headline must not be empty</p>';
    }
    else if(empty($_POST["bt"])){
        $error = '<p style="color:red;">Text box must not be empty</p>';
    }else{
        require_once '../dbcon.php';
        $sql = 'UPDATE about SET box_headline_three=?,box_text_three=? WHERE about_id=1';
        $stmt = $link->prepare($sql);
        $stmt->bind_param('ss', $bh, $bt);
        $stmt->execute();
        header("Refresh:0");
    }
}
include 'header.php';
include 'nav.php';
//select headline and text from box 1,2,3
require_once '../dbcon.php';
$stmt = $link->prepare("SELECT box_headline_one,
                               box_text_one,
                               box_headline_two,
                               box_text_two,
                               box_headline_three,
                               box_text_three
                        FROM `about`");
    $stmt->execute();
    $stmt->bind_result($bh1,$bt1,$bh2,$bt2,$bh3,$bt3);
    while($stmt->fetch()) {	
    }
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">Main about</h1>
            <p>Quibusdam ne eiusmod, probant esse nescius aut dolore commodo ita fidelissimae, 
                quibusdam iis anim. Nulla laborum incididunt, fore est ea elit doctrina. 
            </p>
            <!-- Nav tabs -->
            <?php echo $error; ?>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo $bh1 ?></a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $bh2 ?></a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?php echo $bh3 ?></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Tab 1-->
                <div role="tabpanel" class="tab-pane active" id="home">
                    <form action="<?php REQUEST_FILENAME ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="bh" value="<?php echo $bh1 ?>" placeholder="Headline">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="bt" placeholder="Text"><?php echo $bt1 ?></textarea>
                        </div>
                        <input class="btn btn-default" name="tab1" type="submit" value="Update - <?php echo $bh1 ?>">
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <form action="<?php REQUEST_FILENAME ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="bh" value="<?php echo $bh2 ?>" placeholder="Headline">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="bt" placeholder="Text"><?php echo $bt2 ?></textarea>
                        </div>
                        <input class="btn btn-default" name="tab2" type="submit" value="Update - <?php echo $bh2 ?>">
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                    <form action="<?php REQUEST_FILENAME ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="bh" value="<?php echo $bh3 ?>" placeholder="Headline">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="bt" placeholder="Text"><?php echo $bt3 ?></textarea>
                        </div>
                        <input class="btn btn-default" name="tab3" type="submit" value="Update - <?php echo $bh3 ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>