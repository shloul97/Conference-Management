<?php

include '../userdata.php';
include '../header.php';

$sql_getConf = "SELECT * FROM conference";
$result_conf = mysqli_query($db,$sql_getConf);


?>
<!DOCTYPE html>
<html>
    <head>



        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- FONT AWESOME-->
        <script src="https://kit.fontawesome.com/ae8fff17f1.js" crossorigin="anonymous"></script>
        
        <!-- JS FILES -->
        <script src="../JS/all.js"></script>
        <script src="../JS/confAdmin.js"></script>
        

        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">
        
        
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-12" style="margin-top: 30px;">
                        <div class="row">
                            <!-- TABLE 1 START-->
                            <div class="col-md-12" style="text-align: center;">
                                <h1>Conferences View</h1>
                            </div>
                            <!-- TABLE 1 END-->
                        </div>
                    </div>
                </div>
                <!-- END OF SEARCH TABLE ROW-->
                
                <div class="row">
                    <div class="col-md-12 " style="padding: 12px; margin-top: 25px;">
                        <div class="cfp-table-div">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr style="text-align: center;" ><th colspan="10" class="cfp-table"><h2>Conferences</h2></th></tr>
                                    <tr>
                                        <th>Acronym</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Primary Area</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Submission deadline</th>
                                        <th>Submission count</th>
                                        <th>Details</th>
                                        <th>Approve?</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while($row_conf = mysqli_fetch_assoc($result_conf)){
                                        echo '<tr>
                                        <td><a class="link" href="../conf_cfp">'.$row_conf['acronym'].'</a></td>
                                        <td>'.$row_conf['conf_name'].'</td>
                                        <td>'.$row_conf['city'].', '.$row_conf['country'].'</td>
                                        <td>'.$row_conf['primary_area'].'</td>
                                        <td>'.$row_conf['start_date'].'</td>
                                        <td>'.$row_conf['end_date'].'</td>
                                        <td>'.$row_conf['sub_deadline'].'</td>
                                        <td>15</td>
                                        <td><a href="#" data-id="'.$row_conf['conf_id'].'" name="conf-details">More Details...</a></td>
                                        <td>
                                            <button class="btn btn-warning" name="approve-btn" data-id="'.$row_conf['conf_id'].'">Approve</button>
                                            <button class="btn btn-danger" name="reject-btn" data-id="'.$row_conf['conf_id'].'">Reject</button>
                                        </td>
                                        </tr>';
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                                                   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="pagination-div">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                <span class="page-link">
                                    2
                                </span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay">

        </div>

        <div class="details" id="conf_deta">
            
        </div>
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>