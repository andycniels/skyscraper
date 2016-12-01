<?php
include 'header.php';
include 'nav.php';
?>
<!-- page content -->
<div class="right_col main_place" role="main">
    <div class="row">
        <div class="col-md-8 col-lg-push-2">
            <h1 class="page-header">Artist</h1>
            <p>Edit or delete artists.</p>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Band name</th>
                    <th>Contact person</th>
                    <th>Contact phone</th>
                    <th>Contact email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>Possumus exercitation</td>
                    <td>
                        <p>John Madsen</p>
                    </td>
                    <td>
                        <p>38492938</p>
                    </td>
                    <td>
                        <p>email@hej.com</p>
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