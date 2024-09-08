<?php 
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $params = array();
    $dataUn = $_POST['data'];
    $dataUn = trim($dataUn,"\"");
    $dataArr = parse_str($dataUn,$params);

    $conf_id = $_SESSION['conf_id'];
    

    $tracks = $params['tracks'];
    

    $sql_insert = "INSERT INTO tracks(conf_id,track_name, track_status) VALUES ";
    
    for($i = 0 ; $i < count($tracks);$i++){
        $track_name = $tracks[$i];
        if($i == (count($tracks)-1)){
            $sql_insert .= " ($conf_id,'$track_name', 1); "; 
        }
        else{
            $sql_insert .= " ($conf_id,'$track_name', 1), ";
        }
        
    }
    mysqli_query($db,$sql_insert);
}
?>