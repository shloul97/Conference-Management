<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $cfp_id = $_POST['cfp-id'];
    $desc_key = $_POST['desc-key'];
    $desc_val = $_POST['desc-area'];


    $sql_descInsert = "INSERT INTO cfp_desc(cfp_id,desc_key,desc_val,desc_status) VALUES (
        $cfp_id,
        '$desc_key',
        '$desc_val',
        1
    )";

    if(mysqli_query($db,$sql_descInsert)){
        echo json_encode(array('status' => 1));
    }
}

?>