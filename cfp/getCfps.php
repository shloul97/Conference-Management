<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];



    // All cfps
    if($action == 'all'){
        $sql_cfp = "SELECT cfp.cfp_id,conf.* FROM cfp 
        INNER JOIN conference conf 
        ON cfp.conf_id = conf.conf_id 
        AND cfp.cfp_status = 1";
        $result_cfp = mysqli_query($db,$sql_cfp);

        $dataArr = array();

        


        while($row_cfp = mysqli_fetch_assoc($result_cfp)){
            $cfp_id = $row_cfp['cfp_id'];
            $topics = array();

            $sql_topics = "SELECT * FROM cfp_topics WHERE cfp_id = $cfp_id AND topic_status = 1";
            $result_topics = mysqli_query($db,$sql_topics);
            while($row_topics = mysqli_fetch_assoc($result_topics)){
                array_push($topics,$row_topics['topic_name']);
            }
            array_push($dataArr, array(
                'cfp_id' => $row_cfp['cfp_id'],
                'conf_id' => $row_cfp['conf_id'],
                'conf_name' => $row_cfp['conf_name'],
                'acronym' => $row_cfp['acronym'],
                'start_date' => $row_cfp['start_date'],
                'end_date' => $row_cfp['end_date'],
                'sub_deadline' => $row_cfp['sub_deadline'],
                'sub_count' => $row_cfp['sub_count'],
                'country' => $row_cfp['country'],
                'city' => $row_cfp['city'],
                'web_page' => $row_cfp['web_page'],
                'primary_area' => $row_cfp['primary_area'],
                'sec_area' => $row_cfp['sec_area'],
                'area_note' => $row_cfp['area_note'],
                'user_id' => $row_cfp['user_id'],
                'contact_phone' => $row_cfp['contact_phone'],
                'extra_info' => $row_cfp['extra_info'],
                'created_date' => $row_cfp['created_date'],
                'conf_status' => $row_cfp['conf_status'],
                'topics' => $topics

            ));
        }
        echo json_encode($dataArr);

    }
    if($action == 'search'){

        $conf_name = $_POST['conf-name'];
        $country = $_POST['country'];
        $major = $_POST['major'];

        $conf_name = trim($conf_name);

        $sql_cfp = "SELECT cfp.cfp_id,conf.* FROM cfp 
        INNER JOIN conference conf 
        ON cfp.conf_id = conf.conf_id ";

        if($conf_name != ''){
            $sql_cfp .= "AND (conf.conf_name LIKE '%$conf_name%' OR conf.acronym LIKE '%$conf_name%') ";
        }

        if($country != ''){
            $sql_cfp .= "AND conf.country = '$country' ";
        }

        if($major != ''){
            $sql_cfp .= "AND conf.primary_area = '$major' ";
        }


        $sql_cfp .= "AND cfp.cfp_status = 1";

        $result_cfp = mysqli_query($db,$sql_cfp);

        $dataArr = array();


        while($row_cfp = mysqli_fetch_assoc($result_cfp)){
            $cfp_id = $row_cfp['cfp_id'];
            $topics = array();

            $sql_topics = "SELECT * FROM cfp_topics WHERE cfp_id = $cfp_id AND topic_status = 1";
            $result_topics = mysqli_query($db,$sql_topics);
            while($row_topics = mysqli_fetch_assoc($result_topics)){
                array_push($topics,$row_topics['topic_name']);
            }
            array_push($dataArr, array(
                'cfp_id' => $row_cfp['cfp_id'],
                'conf_id' => $row_cfp['conf_id'],
                'conf_name' => $row_cfp['conf_name'],
                'acronym' => $row_cfp['acronym'],
                'start_date' => $row_cfp['start_date'],
                'end_date' => $row_cfp['end_date'],
                'sub_deadline' => $row_cfp['sub_deadline'],
                'sub_count' => $row_cfp['sub_count'],
                'country' => $row_cfp['country'],
                'city' => $row_cfp['city'],
                'web_page' => $row_cfp['web_page'],
                'primary_area' => $row_cfp['primary_area'],
                'sec_area' => $row_cfp['sec_area'],
                'area_note' => $row_cfp['area_note'],
                'user_id' => $row_cfp['user_id'],
                'contact_phone' => $row_cfp['contact_phone'],
                'extra_info' => $row_cfp['extra_info'],
                'created_date' => $row_cfp['created_date'],
                'conf_status' => $row_cfp['conf_status'],
                'topics' => $topics

            ));
        }

        echo json_encode($dataArr);
        //echo $sql_cfp;



    }
    
}
?>