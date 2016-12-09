<?php
include 'header.php';
include 'nav.php';
$y = 'UCDlQwv99CovKafGvxyaiNDA';
$s = 'bigbabydram';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">New demos</h1>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Band name</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Contact person</th>
                        <th>Contact phone</th>
                        <th>Contact email</th>
                        <th>Add to artists</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <td>Possumus exercitation</td>
                        <td>Eu nam duis possumus, ad fore litteris distinguantur te officia si voluptate ex 
                            minim voluptatibus deserunt velit ullamco. Eu quo noster legam magna ubi iis iis 
                            enim cillum noster, nam fugiat sempiternum, doctrina multos esse eu quem ea 
                            expetendis malis appellat excepteur iis singulis noster si commodo voluptatibus, 
                            e ab exercitation an incurreret do offendit. Magna ea vidisse a quorum, id sint 
                            occaecat reprehenderit, singulis de dolore officia, quorum mentitum qui 
                            sempiternum. Incididunt non sint hic veniam nescius de tractavissent. Litteris 
                            eram doctrina mentitum, ingeniis exquisitaque id vidisse, laborum consectetur o 
                            mandaremus de quae pariatur id deserunt. Litteris aliqua elit non culpa, minim 
                            consequat sempiternum o cernantur dolor amet consequat aute, est dolore aute 
                            culpa singulis. Eu quid quis ex incididunt.
                        </td>
                        <td>
                            <a href="https://www.youtube.com/channel/<?= $y ?>" target="_blank"><img src="../icons/yticon.png"></a>
                            <a href="https://soundcloud.com/<?= $s ?>" target="_blank"><img src="../icons/scicon.png"></a>
                        </td>
                        <td>
                            <p>John Madsen</p>
                        </td>
                        <td>
                            <p>38492938</p>
                        </td>
                        <td>
                            <p>email@hej.com</p>
                        </td>
                        <td><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                </table>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';                    
?>