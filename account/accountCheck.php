<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];

    if($action == 'signin'){
        $params = array();
		$dataUn = $_POST['data'];
		$dataUn = trim($dataUn,"\"");
		$dataArr = parse_str($dataUn,$params);

        $email = $params['email'];
        $password = $params['password'];

        $sql_check = "SELECT * FROM users where email = '$email' AND password = '$password'";
        $result_email = mysqli_query($db,$sql_check);
        $row_num = mysqli_num_rows($result_email);

        if($row_num > 0){
            $_SESSION['user_login'] = $email;
            echo json_encode(array('status' => 1));
            
           
        }
        else{
            echo json_encode(array('status' => 0, 'msg' => 'E-mail or Password incorrect'));
        }
    }

    if($action == 'signup'){
        $params = array();
		$dataUn = $_POST['data'];
		$dataUn = trim($dataUn,"\"");
		$dataArr = parse_str($dataUn,$params);

        $name = $params['full-name'];
        $email = $params['email'];
        $phone = $params['phone'];
        $password = $params['password'];
        $dob = $params['dob'];
        $region = $params['country'];

        $sql_check = "SELECT * from users where email = '$email'";
        $result_check = mysqli_query($db,$sql_check);
        $row_num = mysqli_num_rows($result_check);

        if($row_num > 0){
            echo json_encode(array('status' => 0, 'msg' => 'E-mail already exist'));
        }
        else{
            $sql_insert = "INSERT INTO users(full_name,email,phone,password,DOB,region,status) VALUES 
            (
                '$name',
                '$email',
                '$phone',
                '$password',
                '$dob',
                '$region',
                1
            )
            ";
            mysqli_query($db,$sql_insert);
            $_SESSION['user_login'] = $email;
            echo json_encode(array('status' => 1));
        }
    }

    if($action == 'changePass'){
        $current = $_POST['old_pass'];
        $new = $_POST['new_pass'];
        
        $userdata = getUserData();
        $user_id = $userdata['user_id'];

        $sql_check = "SELECT * FROM users where user_id = $user_id AND password = '$current'";
        $result_check = mysqli_query($db,$sql_check);

        $rows_check = mysqli_num_rows($result_check);
        if($rows_check > 0){
            $sql_update = "UPDATE users SET password = '$new' WHERE user_id = $user_id";
            if(mysqli_query($db,$sql_update)){
                echo json_encode(array('status' => 1, 'msg' => 'Password changed successfuly'));
            }
        }
        else{
            echo json_encode(array('status' => 0, 'msg' => 'Your current password is incorrect.'));
        }
    }
}
?>