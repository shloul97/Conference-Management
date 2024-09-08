<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $conf_id = $_SESSION['conf_id'];
    $sql_tracks = "SELECT * FROM tracks where conf_id = $conf_id";
    $result_tracks = mysqli_query($db,$sql_tracks);

    $num_rows = mysqli_num_rows($result_tracks);

    

    $tracks_name = array();
    
    if($num_rows > 0){
        $status = array('status' => 1);
        array_push($tracks_name,$status);
        
        while($row_tracks = mysqli_fetch_assoc($result_tracks)){
            $trackData = array(
                'track_id' => $row_tracks['track_id'],
                'track_name' => $row_tracks['track_name'],
                'track_status' => $row_tracks['track_status']
            );
            array_push($tracks_name,$trackData);
        }
        
        echo json_encode($tracks_name);
    }
    else {
        $status = array('status' => 0);
        array_push($tracks_name,$status);
        echo json_encode($tracks_name);
    }
    
}

?>