<?php 
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $role_id = $_POST['role_id'];
    $conf_id = $_POST['conf_id'];

    $roles_id = rolesArr();

    $userdata = getUserData();
    $user_id = $userdata['user_id'];

    $sql_check = "SELECT * FROM user_role 
    WHERE user_id = $user_id 
    AND role_id = $role_id 
    AND conf_id = $conf_id";
    $result_check = mysqli_query($db,$sql_check);
    
    $num_check = mysqli_num_rows($result_check);
    $row_roles = mysqli_fetch_assoc($result_check);

    $track_id = $row_roles['track_id'];

    if($num_check > 0){
        $_SESSION['user_role'] = $role_id;
        $_SESSION['conf_id'] = $conf_id;
        if($track_id){
            $_SESSION['track_id'] = $track_id;
        }
        else{
            $_SESSION['track_id'] = '';
        }
        echo json_encode(array('status' => 1, 'msg' => $roles_id[$role_id])); 
    }
    else{
        echo json_encode(array('status' => 0, 'msg' => 'Access Denied'));
    }
}
?>