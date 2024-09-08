<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1 ){
        $role_id = $_SESSION['user_role'];
        $pcs = getParticipants();
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


        <meta name="viewport" content="width=device-width, initial-scale=1.0">



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
        <script src="../JS/participant.js"></script>
        
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
                            <?php 
                            
                            foreach ($pcs as $item) {
                                $id = $item['role_id'];
                                $outputArray[$id][] = $item;
                                
                            }

                            /*$json = json_encode($outputArray,JSON_PRETTY_PRINT);
                            var_dump($json);*/

                            $x = 0;

                            foreach($outputArray as $id => $item[$x]){
                                /*$json = json_encode($item[$x],JSON_PRETTY_PRINT);
                                var_dump($json);*/

                                echo '
                                <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr style="text-align: center;" ><th colspan="8" class="cfp-table"><h2>'.$item[$x][0]['name'].'</h2></th></tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Region</th>
                                        <th>Track</th>
                                        
                                    </tr>
                                </thead>
                                    <tbody>';
                                $c = 1;
                                foreach($item[$x] as $info){
                                    echo '
                                        <tr>
                                        <td>'.$c.'</td>
                                        <td>'.$info['full_name'].'</td>
                                        <td>'.$info['email'].'</td>
                                        <td>'.$info['phone'].'</td>
                                        <td>'.$info['region'].'</td>
                                        <td>'.$info['track_name'].'</td>
                                        </tr>
                                    ';
                                    $c++;
                                }                                      
  
                                echo '</tbody>
                                </table>
                                ';
                                $x++;
                            }
                            
                            ?>
                            
                                                   
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