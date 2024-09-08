<?php 
include '../userdata.php';


if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != ''){
        
            $conf_id = $_SESSION['conf_id'];
            $track_id = $_SESSION['track_id'];



            $paperData = getPaper();
            

            $json = json_encode($paperData, JSON_PRETTY_PRINT);

            if($paperData){
                $dataCheck = true;
                //var_dump($json);
            }
            else{
                $dataCheck = false;
            }
            //echo $track_id;
    }
    else{
        header('Location: ../denied');
    }
}
else{
    header('Location: ../account');
}


?>