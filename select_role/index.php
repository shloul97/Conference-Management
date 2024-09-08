<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    $_SESSION['user_role'] = '';
    $_SESSION['conf_id'] = '';
    $_SESSION['track_id'] = '';

    $rolesData = getRoles();
    $roleArr = rolesArr();

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
 
         <!-- FONT AWESOME -->
         <script src="https://kit.fontawesome.com/ae8fff17f1.js" crossorigin="anonymous"></script>
         
         <!-- CSS FILES -->
         <link href="../CSS/style.css" rel="stylesheet">
 
         <!-- JS FILES -->
         <script src="../JS/all.js"></script>
         <script src="../JS/selectRole.js"></script>
 
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header() ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="margin-top: 30px;">
                    <?php
                        if($rolesData){
                                    echo '
                        <div class="content-box" style="width: 100%;">
                            <div class="form-box mb-3 center">
                                <h1>Please Select Role</h1>
                            </div>
                            <div class="form-box">
                           
                               
                                <table class="table table-bordered">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th>Conference</th>
                                            <th>Role</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>';

                                                //var_dump($rolesData);
                                                foreach ($rolesData as $item) {
                                                    $id = $item['conf_id'];
                                                    $outputArray[$id][] = $item; 
                                                }
                                                
                                                
                                                
    
                                                //$json_string = json_encode($outputArray, JSON_PRETTY_PRINT);
                                                
    
                                                foreach ($outputArray as $id => $items) {
                                                    echo '<tr>
                                                        <th class="conf-th">'.$items[0]['acronym'].'</th>
                                                        <td><table class="table" style="padding: 0; margin: 0;">
                                                        <tbody>';

                                                        /*$json = json_encode($outputArray[7], JSON_PRETTY_PRINT);
                                                        var_dump($items);*/
                                                    
                                                    
                                                   
                                                    
                                                    foreach ($items as $item) {
                                                        

                                                        
                                                        if($item['role_status'] == 0){
                                                            echo '
                                                            <tr><td><span class="suspended">'.$item['name'].' <i>(Suspended)</i></span></td></tr> 
                                                            ';
                                                        }
                                                        else{
                                                            echo '
                                                            <tr><td><a href="#" conf-id="'.$item['conf_id'].'" data-id="'.$item['role_id'].'" name="select-role" class="link btn-link">'.$item['name'].'</a>';
                                                            if($item['track_name'] != null){
                                                                echo ' ('.$item['track_name'].') ';
                                                            }
                                                            echo '</td></tr> 
                                                            ';
                                                        }
                                                        
                                                    }
                                                    echo '</tbody>
                                                    </table></td>
                                                    </tr>';
                                                }

                                            
                                            

                                            //echo $id;

                                        
                                            echo '
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>';

                        }

                        else{
                            echo '
                                <div class="content-box" style="width: 100%;">
                                    <div class="form-box mb-3 center">
                                        <h4>You Don\'t have any Roles.. </h4><a class="link" href="../create_conf">Create Conference</a>
                                    </div>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>