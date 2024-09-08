<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $track_id = $_SESSION['track_id'];

    $userdata = getUserData();
    $user_id = $userdata['user_id'];

    $comment = $_POST['comment'];

    $sql_papers = "SELECT sh.sheet_id,sh.track_id, avg(shr.score) as avg_sh FROM sheets sh 
    INNER JOIN sheet_reviewed shr 
    ON sh.track_id = $track_id 
    AND sh.sheet_id = shr.sheet_id 
    GROUP BY sh.sheet_id";

    $result_papers = mysqli_query($db,$sql_papers);
    

    while($row_papers = mysqli_fetch_assoc($result_papers)){
        
        $sheet_id = $row_papers['sheet_id'];
        $avg = $row_papers['avg_sh'];
        $avgTwo = number_format($avg,2);
        $sh_result = '';
        
        if($avg >= -1 && $avg < 0){
            $sh_result = 'Rejected';

        }
        if($avg >= 0 && $avg < 0.5){
            $sh_result = 'Weakly Rejected';
        }
        if($avg >= 0.5 && $avg < 1){
            $sh_result = 'Weakly Accepted';
        }
        if($avg >= 1 && $avg <= 2){
            $sh_result = 'Accepted';
        }
        
        $sql_insert = "INSERT INTO sheet_result(sheet_id,chair_id,total_score,sheet_result,chair_note) 
        VALUES (
            $sheet_id,
            $user_id,
            $avgTwo,
            '$sh_result',
            '$comment'
        )";
        if(mysqli_query($db,$sql_insert)){
            echo json_encode(array('status' => 1));
        }
    }

}

?>