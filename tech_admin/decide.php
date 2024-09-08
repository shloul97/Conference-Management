<?php
include '../conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];

    if($action == 'approve'){
        $conf_id = $_POST['conf_id'];
        $sql_decide = "UPDATE conference set conf_status = 1 where conf_id = $conf_id";
        mysqli_query($db,$sql_decide);
    }
    if($action == 'reject'){
        $conf_id = $_POST['conf_id'];
        $sql_decide = "UPDATE conference set conf_status = 2 where conf_id = $conf_id";
        mysqli_query($db,$sql_decide);
    }
}
?>