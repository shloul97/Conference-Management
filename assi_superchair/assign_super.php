<?php

include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];

    if($action == 'self'){
        $userdata = getUserData();
        $user_id = $userdata['user_id'];
        $conf_id = $_SESSION['conf_id'];

        $sql_insert = "INSERT INTO user_role(conf_id,role_id,user_id,role_status) 
        VALUES ($conf_id,2,$user_id,1)";

        if(mysqli_query($db,$sql_insert)){
            echo json_encode(array('status' => 1));
        }
    }
}
?>