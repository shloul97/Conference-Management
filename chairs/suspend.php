<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $conf_id = $_SESSION['conf_id'];

    $action = $_POST['action'];
    if($action == 'suspend'){
        $user_id = $_POST['user_id'];
        $sql_update = "UPDATE user_role set role_status = 0 
        WHERE user_id = $user_id 
        AND role_id = 3 
        ";
        
    }

    if($action == 'active'){
        $user_id = $_POST['user_id'];
        $sql_update = "UPDATE user_role set role_status = 1 
        WHERE user_id = $user_id 
        AND role_id = 3 
        ";
       
    }

    if(mysqli_query($db,$sql_update)){
        echo json_encode(array('status' => 1));
    }
}
?>