<?php 
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $conf_id = $_SESSION['conf_id'];

    $sql_insertCFP = "INSERT INTO cfp(conf_id,cfp_status) VALUES ($conf_id,1)";
    if(mysqli_query($db,$sql_insertCFP)){
        $topics = $_POST['topics'];

        $sql_id = "SELECT * FROM cfp where conf_id = $conf_id";
        $result_id = mysqli_query($db,$sql_id);
        $row_id= mysqli_fetch_assoc($result_id);
        
        $cfp_id = $row_id['cfp_id'];

        $sql_insertTopic = "INSERT INTO cfp_topics(cfp_id,topic_name,topic_status) VALUES ";
        for($i = 0; $i < count($topics); $i++){

            $topic = $topics[$i];
            
            if($i == (count($topics)-1)){
                $sql_insertTopic .= " ($cfp_id,'$topic', 1); "; 
            }
            else{
                $sql_insertTopic .= " ($cfp_id,'$topic', 1), ";
            }
            

        }

        if(mysqli_query($db,$sql_insertTopic)){

            $desc_titleArr = $_POST['section-title'];
            $descArr = $_POST['desc-area'];

            $sql_insertDesc = "INSERT INTO cfp_desc(cfp_id,desc_key,desc_val,desc_status) VALUES ";

            for($i = 0; $i < count($desc_titleArr); $i++){

                $title = $desc_titleArr[$i];
                $desc = $descArr[$i];
    
                if($i == (count($desc_titleArr)-1)){
                    $sql_insertDesc .= " ($cfp_id,'$title','$desc', 1); "; 
                }
                else{
                    $sql_insertDesc .= " ($cfp_id,'$title','$desc', 1), "; 
                }
            }

            if(mysqli_query($db,$sql_insertDesc)){
                echo json_encode(array('status' => 1, 'msg' => 'All Done'));
            }



        }
    }
    else{
        echo json_encode(array('status' => 0, 'msg' => 'Conference has CFP'));
    }

}
?>