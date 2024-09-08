<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['sheet-action'];

    $userdata = getUserData();
    $user_id = $userdata['user_id'];

    $score = $_POST['score'];
    $feedback = $_POST['feedback'];
    $sheet_id = $_POST['sheet-id'];

    if($action == 'new-review'){
        $sql_insert = "INSERT INTO sheet_reviewed(sheet_id,reviewer_id,score,feedback) VALUES 
        (
            $sheet_id,
            $user_id,
            $score,
            '$feedback'
        )";
 
    }
    if($action == "modify"){
        $sql_insert = "UPDATE sheet_reviewed set score = $score , feedback = '$feedback' 
        WHERE reviewer_id = $user_id AND sheet_id = $sheet_id";

    }

    if(mysqli_query($db,$sql_insert)){
        echo json_encode(array('status' => 1, 'msg' => 'review submitted'));
    }
}
?>