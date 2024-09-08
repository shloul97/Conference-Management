<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];
    if($action == 'createConf'){
        $params = array();
        $dataUn = $_POST['data'];
        $dataUn = trim($dataUn,"\"");
        $dataArr = parse_str($dataUn,$params);

        $userdata = getUserData();

        $name = $params['conf-title'];
        $acronym =$params['conf-acronym'];
        $web = $params['web-page'];
        $city = $params['city'];
        $country = $params['country'];
        $sub_count = $params['sub-num'];
        $start = $params['f-day'];
        $end = $params['l-day'];
        $deadline = $params['s-deadline'];
        $area1 = $params['p-area'];
        $area2 = $params['s-area'];
        $areanote = $params['note'];
        $contact = $params['or-phone'];
        $extranote = $params['extra_note'];
        $user_id = $userdata['user_id'];


        $sql_insert = "INSERT INTO conference(conf_name,acronym,web_page,city,country,sub_count,start_date,
        end_date,sub_deadline,primary_area,sec_area,area_note,contact_phone,extra_info,user_id,conf_status) VALUES 
        (
            '$name',
            '$acronym',
            '$web',
            '$city',
            '$country',
            '$sub_count',
            '$start',
            '$end',
            '$deadline',
            '$area1',
            '$area2',
            '$areanote',
            '$contact',
            '$extranote',
            '$user_id',
            0
        )";
        if(mysqli_query($db,$sql_insert)){
            $sql_id = "SELECT conf_id from conference where  user_id = $user_id order by conf_id desc";
            $result_id = mysqli_query($db,$sql_id);
            $row_id = mysqli_fetch_assoc($result_id);

            $conf_id = $row_id['conf_id'];

            $sql_role = "INSERT INTO user_role(user_id,conf_id,role_id) VALUES ($user_id,$conf_id,1)";
            if(mysqli_query($db,$sql_role)){
                echo json_encode(array('status' => 1));
            }
            
        }

    }
    
}

?>