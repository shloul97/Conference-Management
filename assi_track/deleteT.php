<?php 
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $track_id = $_POST['track_id'];
    $action = $_POST['action'];

    if($action == 'delete'){
        $sql_delete = "UPDATE tracks set track_status = 0 where track_id = $track_id";
        if(mysqli_query($db,$sql_delete)){
            echo json_encode(array('status' => 1, 'msg' => 'track Deleted'));
        }
    }

    if($action == 'active'){
        $sql_delete = "UPDATE tracks set track_status = 1 where track_id = $track_id";
        if(mysqli_query($db,$sql_delete)){
            echo json_encode(array('status' => 1, 'msg' => 'track Deleted'));
        }
    }
}
?>