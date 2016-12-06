<?php
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <?php include 'search.php'; ?>
            <h1 class="page-header">Artist</h1>
            <p>View, edit or delete artists.</p>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Img</th>
                    <th>Band name</th>
                    <th>Description</th>
                    <th>Label</th>
                    <th>Genre</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>
                        <img src="../img/jakob_d.jpg";>
                    </td>
                    <td>
                        <p>Jazz band</p>
                    </td>
                    <td>
                        <p>Appellat enim ita eiusmod praesentibus. Eram iis nescius, multos laboris ad 
                            senserit. Nam esse exquisitaque, se nam sunt quid fugiat, excepteur summis 
                            voluptate mandaremus quo ad in quae minim quem. Possumus non eiusmod, est illum 
                            malis ita appellat ne anim arbitror a occaecat hic iudicem enim offendit 
                            senserit.</p>
                    </td>
                    <td>
                        <p>Skyscraper</p>
                    </td>
                    <td>
                        <p>pop</p>
                    </td>
                    <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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