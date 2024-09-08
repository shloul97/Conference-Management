<?php 
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $uploadOk = 1;


    $userdata = getUserData();

    $conf_id = $_POST['confId'];
    $track_id = $_POST['track-select'];
    $user_id = $userdata['user_id'];
    $title = $_POST['submissin-title'];
    $abstract = $_POST['abstract'];


    //Paper File
    $file = $_FILES['paper'];
    //var_dump($_POST);
    $target_dir = "../papers_file/".$conf_id."/";
    $target_file = $target_dir . $conf_id . $user_id .$title[0].$title[1].$title[2] . '.pdf';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //echo $file["error"];

    

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if($uploadOk == 1){
        if(!is_dir($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        if (move_uploaded_file($file["tmp_name"], $target_file)) {	

            	
            $sql_insertSheet = "INSERT INTO sheets(author_id,conf_id,sheet_title,sheet_abstract,sheet_file,track_id,sheet_status) VALUES 
            (
                $user_id,
                $conf_id,
                '$title',
                '$abstract',
                '$target_file',
                $track_id,
                1
            )";
            if(mysqli_query($db,$sql_insertSheet)){
                $sql_getId = "SELECT sheet_id FROM sheets where author_id = $user_id and conf_id = $conf_id order by sheet_id desc";
                $result_id = mysqli_query($db,$sql_getId);
                $row_id = mysqli_fetch_assoc($result_id);
                $sheet_id = $row_id['sheet_id'];

                $authors_fname = $_POST['fname'];
                $authors_lname = $_POST['lname'];
                $authors_email = $_POST['email'];
                $authors_country = $_POST['author-country'];
                $authors_affi = $_POST['affiliation'];
                $authors_web = $_POST['webpage'];

	

                $sql_authors = "INSERT INTO sheet_authors(auth_fname,auth_lname,auth_email,auth_country,auth_aff,auth_web,sheet_id) VALUES ";

                for($i = 0;$i< count($authors_email);$i++){

                    $fname = $authors_fname[$i];
                    $lname = $authors_lname[$i];
                    $email = $authors_email[$i];
                    $country = $authors_country[$i];
                    $affi = $authors_affi[$i];
                    $web = $authors_web[$i];

                    if($i == (count($authors_email) - 1)){
                        $sql_authors.= "(
                            '$fname',
                            '$lname',
                            '$email',
                            '$country',
                            '$affi',
                            '$web',
                            $sheet_id
                        );";
                    }else{
                        $sql_authors.= "(
                            '$fname',
                            '$lname',
                            '$email',
                            '$country',
                            '$affi',
                            '$web',
                            $sheet_id
                        ),";
                    }
                }
                if(mysqli_query($db,$sql_authors)){
                    $keyowrds = $_POST['keywords'];
                    $keyowrdsArr = explode(",", $keyowrds);
                    //var_dump($keyowrdsArr);
                    
                    $sql_keyword = "INSERT INTO sheets_keywords(sheet_id,keyword) VALUES "; 
                    for($i = 0; $i < count($keyowrdsArr) ; $i++){
                        $keyowrd = trim($keyowrdsArr[$i]);
                        if($i == (count($keyowrdsArr) - 1)){
                            $sql_keyword .= "(
                                $sheet_id,
                                '$keyowrd'
                            );";
                        }else{
                            $sql_keyword .= "(
                                $sheet_id,
                                '$keyowrd'
                            ),";
                        }
                    }

                    if(mysqli_query($db,$sql_keyword)){
                        	
                        $sql_role = "INSERT INTO user_role(user_id,conf_id,role_id,track_id,role_status) VALUES 
                        (
                            $user_id,
                            $conf_id,
                            5,
                            $track_id,
                            1
                        )";

                        mysqli_query($db,$sql_role);
                        echo json_encode(array('response' => 1, 'msg' => 'Your sheet submitted'));
                    }
                }
            }

            //echo "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.";
        }
        else{
            echo $file["error"];
        }
    }


   

}


?>