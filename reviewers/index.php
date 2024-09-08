<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 3)){
        $role_id = $_SESSION['user_role'];
        $pcs = getPcs($role_id);
        //var_dump($pcs);
        
    }
    else{
        header('Location: ../denied');
    }
}
else{
    header('Location: ../account');
}

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
        
        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">
        

        <!-- JS FILES-->
        <script src="../JS/all.js"></script>
        <script src="../JS/pcShow.js"></script>
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12" style="padding: 0;">
                <div class="header-control">
                    <?php echo roleHeader(); ?>
                </div>
            </div>
        </div>
        <div class="row main-row">
            <div class="col-md-12">
                
                <!-- END OF SEARCH TABLE ROW-->
                
                <div class="row">
                    <div class="col-md-12 " style="padding: 12px; margin-top: 25px;">
                        <div class="cfp-table-div">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr style="text-align: center;" ><th colspan="8" class="cfp-table"><h2>Reviewer (PC Members)</h2></th></tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Reviewer Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Region</th>
                                        <th>Track</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        for($i = 0;$i < count($pcs) ;$i++){
                                            echo'<tr>
                                                    <th>'.($i+1).'</th>
                                                    <td>'.$pcs[$i]['full_name'].'</td>
                                                    <td>'.$pcs[$i]['email'].'</td>
                                                    <td>'.$pcs[$i]['phone'].'</td>
                                                    <td>'.$pcs[$i]['region'].'</td>
                                                    <td>'.$pcs[$i]['track_name'].'</td>';

                                                    if($pcs[$i]['role_status'] == 0){
                                                        echo '<td><button name="role-action" data-id="'.$pcs[$i]['user_id'].'" data-value="active" class="btn btn-success">Active</button></td>';
                                                    }else{
                                                        echo '<td><button name="role-action" data-id="'.$pcs[$i]['user_id'].'" data-value="suspend" class="btn btn-danger">Suspend</button></td>';
                                                    }
                                                    
                                                echo '</tr>
                                            ';

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
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>