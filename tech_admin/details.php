<?php
include '../conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $conf_id = $_POST['conf_id'];

    $sql_conf = "SELECT * FROM conference where conf_id = $conf_id";
    $result = mysqli_query($db,$sql_conf);

    $row_conf = mysqli_fetch_assoc($result);

    $data = array(
        'status' => 1,
        'conf_id' => $row_conf['conf_id'],
        'conf_name' => $row_conf['conf_name'],
        'acronym' => $row_conf['acronym'],
        'start_date'=> $row_conf['start_date'],
        'end_date'=> $row_conf['end_date'],
        'sub_deadline'=> $row_conf['sub_deadline'],
        'sub_count'=> $row_conf['sub_count'],
        'country'=> $row_conf['country'],
        'city'=> $row_conf['city'],
        'web_page'=> $row_conf['web_page'],
        'primary_area'=> $row_conf['primary_area'],
        'sec_area'=> $row_conf['sec_area'],
        'area_note'=> $row_conf['area_note'],
        'user_id'=> $row_conf['user_id'],
        'contact_phone'=> $row_conf['contact_phone'],
        'created_date'=> $row_conf['created_date'],
        'conf_status' => $row_conf['conf_status']
    );

    if($data){
        echo json_encode($data);
    }
}

?>