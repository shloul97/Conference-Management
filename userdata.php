<?php
include 'conn.php';


function getCfp($cfp_id){
    /*          RETURN CFP info BY cfp ID          */
    global $db;
    
    $sql_cfp = "SELECT * FROM cfp where cfp_id = $cfp_id";
    $result_cfp = mysqli_query($db,$sql_cfp);

    $row_cfp = mysqli_fetch_assoc($result_cfp);

    $cfp_id = $row_cfp['cfp_id'];
    $conf_id = $row_cfp['conf_id'];
    $cfp_status = $row_cfp['cfp_status'];
    
    $conf_info = getSelectedConf($conf_id);

    $desc = array();
    $sql_desc = "SELECT * FROM cfp_desc Where cfp_id = $cfp_id AND desc_status = 1";
    $result_desc = mysqli_query($db,$sql_desc);

    
    while($row_desc = mysqli_fetch_assoc($result_desc)){
        array_push($desc, array(
            'desc_key' => $row_desc['desc_key'],
            'desc_val' => $row_desc['desc_val']
        ));
    }

    $conf_info['desc'] = $desc;

    return $conf_info;

}

function getSelectedConf($conf_id){
    /*          RETURN Specific conference by conference ID           */

    global $db;
    if(function_exists('getUserData')){
        $userdata = getUserData();
        $user_id = $userdata['user_id'];
    }
    else{
        $user_id = '';
    }
    
    

    $sql_conf ="SELECT * from conference where conf_id = $conf_id";
    $result_conf = mysqli_query($db,$sql_conf);
    $row_conf = mysqli_fetch_assoc($result_conf);
    
    $confData = array(
        'conf_id' => $row_conf['conf_id'],
        'conf_name' => $row_conf['conf_name'],
        'acronym' => $row_conf['acronym'],
        'start_date' => $row_conf['start_date'],
        'end_date' => $row_conf['end_date'],
        'sub_deadline' => $row_conf['sub_deadline'],
        'sub_count' => $row_conf['sub_count'],
        'country' => $row_conf['country'],
        'city' => $row_conf['city'],
        'web_page' => $row_conf['web_page'],
        'primary_area' => $row_conf['primary_area'],
        'sec_area' => $row_conf['sec_area'],
        'area_note' => $row_conf['area_note'],
        'user_id' => $row_conf['user_id'],
        'contact_phone' => $row_conf['contact_phone'],
        'extra_info' => $row_conf['extra_info'],
        'created_date' => $row_conf['created_date'],
        'conf_status' => $row_conf['conf_status']
    );

    return $confData;

}

if(isset($_SESSION['user_login'])){
    $user_email = $_SESSION['user_login'];
    

    function getUserData(){
         /*          RETURN All USER INFOROMATION          */

        global $db;
        global $user_email;

        $sql_userdata = "SELECT * FROM users where email='$user_email'";
        $result_user = mysqli_query($db,$sql_userdata);

        $row = mysqli_fetch_assoc($result_user);

        $userdata = array(
            'user_id' => $row['user_id'],
            'full_name' => $row['full_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'dob' => $row['DOB'],
            'region' => $row['region'],
            'status' => $row['status']
        );

        return $userdata;
    }

    function getUserDataId($user_id){
        /*          RETURN All Specific USER INFOROMATION          */

       global $db;
       

       $sql_userdata = "SELECT * FROM users where user_id='$user_id'";
       $result_user = mysqli_query($db,$sql_userdata);

       $row = mysqli_fetch_assoc($result_user);

       $userdata = array(
           'user_id' => $row['user_id'],
           'email' => $row['email'],
           'phone' => $row['phone'],
           'dob' => $row['DOB'],
           'region' => $row['region'],
           'status' => $row['status']
       );

       return $userdata;
   }


    function getConf(){
        /*          RETURN All Conferences user have a role in it group by CONFERENCE          */

        global $db;
        $userdata = getUserData();
        $user_id = $userdata['user_id'];

        $sql_getConf = "SELECT conf.* FROM conference conf  
        INNER JOIN user_role usr ON usr.user_id = $user_id  
        AND conf.conf_id = usr.conf_id 
        GROUP BY conf.conf_id";

        $result_conf = mysqli_query($db,$sql_getConf);
        $confData = array();

        while($row_conf = mysqli_fetch_assoc($result_conf)){
            array_push($confData, array(
                'conf_id' => $row_conf['conf_id'],
                'conf_title' => $row_conf['conf_name']
            )); 
        }

        return $confData;
    }

    function getAuthSub(){
        /*          RETURN All Author paper by user ID           */

        global $db;
        $userdata = getUserData();
        $user_id = $userdata['user_id'];

        $sheetData = array();

        $sql_getSheet = "SELECT sh.*, conf.acronym, st.status_name FROM sheets sh 
        INNER JOIN conference conf 
        ON sh.conf_id = conf.conf_id AND sh.author_id = $user_id 
        JOIN sheet_status st 
        ON sh.sheet_status = st.status_id";

        $result_sheet = mysqli_query($db,$sql_getSheet);


        while($row_sheet = mysqli_fetch_assoc($result_sheet)){

            array_push($sheetData,array(
                'sheet_id' => $row_sheet['sheet_id'],
                'author_id' => $row_sheet['author_id'],
                'conf_id' => $row_sheet['conf_id'],
                'sheet_title' => $row_sheet['sheet_title'],
                'sheet_abstract' => $row_sheet['sheet_abstract'],
                'sheet_file' => $row_sheet['sheet_file'],
                'track_id' => $row_sheet['track_id'],
                'sheet_status' => $row_sheet['sheet_status'],
                'acronym' => $row_sheet['acronym'],
                'status_title' => $row_sheet['status_name']
            ));
        }

        return $sheetData;


    }


    function getRoles(){
        /*          RETURN All Roles when user login           */
        global $db;
        $userdata = getUserData();
        
        $user_id = $userdata['user_id'];

        $sql_role = "SELECT conf.*, roles.name,usrr.role_id,usrr.role_status, tr.track_name
        FROM conference conf
        INNER JOIN user_role usrr
        ON usrr.conf_id = conf.conf_id
        JOIN roles 
        ON usrr.role_id = roles.role_id 
        AND usrr.user_id = $user_id 
        AND conf_status = 1 
        LEFT JOIN tracks tr 
        ON usrr.track_id = tr.track_id";

        $roleData = array();

        $result_role = mysqli_query($db,$sql_role);

        while($row_role = mysqli_fetch_assoc($result_role)){
            array_push($roleData, array(
                'conf_id' => $row_role['conf_id'],
                'conf_name' => $row_role['conf_name'],
                'acronym' => $row_role['acronym'],
                'start_date' => $row_role['start_date'],
                'end_date' => $row_role['end_date'],
                'sub_deadline' => $row_role['sub_deadline'],
                'sub_count' => $row_role['sub_count'],
                'country' => $row_role['country'],
                'city' => $row_role['city'],
                'web_page' => $row_role['web_page'],
                'primary_area' => $row_role['primary_area'],
                'sec_area' => $row_role['sec_area'],
                'area_note' => $row_role['area_note'],
                'user_id' => $row_role['user_id'],
                'contact_phone' => $row_role['contact_phone'],
                'extra_info' => $row_role['extra_info'],
                'created_date' => $row_role['created_date'],
                'conf_status' => $row_role['conf_status'],
                'name' => $row_role['name'],
                'role_id' => $row_role['role_id'],
                'role_status' => $row_role['role_status'],
                'track_name' => $row_role['track_name']
            ));
        }
        
        return $roleData;
    }

    function rolesArr(){
        $rolesArr = array(
            1 => 'organizer',
            2 => 'superchair',
            3 => 'chair',
            4 => 'reviewer',
            5 => 'author',
        );

        return $rolesArr;
    }

    function getDeci($sheet_id = ''){
        /*          RETURN Paper Result By sheet ID          */
        global $db;

        $user_role = $_SESSION['user_role'];
        $conf_id = $_SESSION['conf_id'];
        

        if($sheet_id != ''){
            $sql_score = "SELECT sh.*,shr.chair_id,shr.total_score,shr.sheet_result FROM sheets sh  
                INNER JOIN sheet_result shr ON sh.sheet_id = $sheet_id AND sh.sheet_id = shr.sheet_id";
        }
        else{
            if($user_role = 2){
                $sql_score = "SELECT sh.*,shr.chair_id,shr.total_score,shr.sheet_result FROM sheets sh 
                INNER JOIN sheet_result shr ON sh.conf_id = $conf_id AND sh.sheet_id = shr.sheet_id";
            }
            if($user_role = 3){
                $track_id = $_SESSION['track_id'];
                
                $sql_score = "SELECT sh.*,shr.chair_id,shr.total_score,shr.sheet_result FROM sheets sh 
                INNER JOIN sheet_result shr ON sh.conf_id = $conf_id AND sh.track_id = $track_id AND sh.sheet_id = shr.sheet_id";
            }
            
        }

        $result_score = mysqli_query($db,$sql_score);

        $deciArr = array();
        $score_num = mysqli_num_rows($result_score);
        if($score_num > 0){
            while($row_score = mysqli_fetch_assoc($result_score)){
                array_push($deciArr, array(
                    'sheet_id' => $row_score['sheet_id'],
                    'score' => $row_score['total_score'],
                    'sheet_result' => $row_score['sheet_result']
                ));
            }
            
        }
        return $deciArr;
    }

    

    function getPaper($sheet_id = 'null'){
        /*          RETURN Specific OR ALL paper by sheet ID OR User Role          */

        global $db;
        $userdata = getUserData();
        $user_id = $userdata['user_id'];

        
        $track_id = $_SESSION['track_id'];
        $conf_id = $_SESSION['conf_id'];


        if($sheet_id != 'null'){
            $sql_getPaper = "SELECT sh.*,tr.track_name, us.full_name, shr.sheet_result FROM sheets sh 
            INNER JOIN tracks tr 
            ON sh.track_id = tr.track_id AND sh.sheet_id = $sheet_id 
            JOIN users us 
            ON sh.author_id = us.user_id 
            LEFT JOIN sheet_result shr 
            ON sh.sheet_id = shr.sheet_id ";

        }
        else{
            if(($_SESSION['user_role'] == 3 || $_SESSION['user_role'] == 4) && $track_id != ''){
                $sql_getPaper = "SELECT sh.*,tr.track_name, us.full_name, shr.sheet_result FROM sheets sh 
                INNER JOIN tracks tr 
                ON sh.track_id = tr.track_id 
                AND sh.track_id = $track_id 
                JOIN users us 
                ON sh.author_id = us.user_id 
                LEFT JOIN sheet_result shr 
                ON sh.sheet_id = shr.sheet_id";
            }

            if($_SESSION['user_role'] == 2 ){
                $sql_getPaper = "SELECT sh.*,tr.track_name, us.full_name, shr.sheet_result FROM sheets sh 
                INNER JOIN tracks tr 
                ON sh.track_id = tr.track_id 
                AND sh.conf_id = $conf_id 
                JOIN users us 
                ON sh.author_id = us.user_id 
                LEFT JOIN sheet_result shr 
                ON sh.sheet_id = shr.sheet_id";
            }
            
            
        }
        

        $result_paper = mysqli_query($db,$sql_getPaper);
        $num_row = mysqli_num_rows($result_paper);

        $paper = 'none';
        
        if($num_row > 0){
            if($num_row == 1){
                $paper_data = array();

                $paper = 'single';
                

                while($row_paper = mysqli_fetch_assoc($result_paper)){
                    

                    if($sheet_id == 'null'){
                        $sheet_id = $row_paper['sheet_id'];
                    }

                    $sql_keywords = "SELECT keyword FROM sheets_keywords where sheet_id = $sheet_id";
                    $result_keywords = mysqli_query($db,$sql_keywords);
        
                    $keywordArr = array();
                    $authArr = array();
        
                    while($row_key = mysqli_fetch_assoc($result_keywords)){
                        array_push($keywordArr,$row_key['keyword']);
                    }
        
                    $sql_auth = "SELECT * FROM sheet_authors WHERE sheet_id = $sheet_id";
                    $result_auth = mysqli_query($db,$sql_auth);
        
        
                    
                    
        
                    while($row_auth = mysqli_fetch_assoc($result_auth)){
                        array_push($authArr,array(
                            'fname' => $row_auth['auth_fname'],
                            'lname' => $row_auth['auth_lname'],
                            'email' => $row_auth['auth_email'],
                            'country' => $row_auth['auth_country'],
                            'aff' => $row_auth['auth_aff'],
                            'web' => $row_auth['auth_web']
                        ));
                    }
                    
                    $paper_data = array(
                        'sheet_id' => $row_paper['sheet_id'],
                        'author_id' => $row_paper['author_id'],
                        'conf_id' => $row_paper['conf_id'],
                        'sheet_title' => $row_paper['sheet_title'],
                        'sheet_abstract' => $row_paper['sheet_abstract'],
                        'sheet_file' => $row_paper['sheet_file'],
                        'track_id' => $row_paper['track_id'],
                        'sheet_status' => $row_paper['sheet_status'],
                        'submitted_date' => $row_paper['submitted_date'],
                        'track_id' => $row_paper['track_id'],
                        'track_name' => $row_paper['track_name'],
                        'user_name' => $row_paper['full_name'],
                        'keywords' => $keywordArr,
                        'authors' => $authArr,
                        'sheet_result' => $row_paper['sheet_result']
                    );

                    

                }
                $paper_data['data'] = $paper;
            }
            else{
                $paper_data = array();

                $paper = 'multiple';

                while($row_paper = mysqli_fetch_assoc($result_paper)){
                    
                    $sheet_id = $row_paper['sheet_id'];
                    

                    $sql_keywords = "SELECT keyword FROM sheets_keywords where sheet_id = $sheet_id";
                    $result_keywords = mysqli_query($db,$sql_keywords);
        
                    $keywordArr = array();
                    $authArr = array();
        
                    while($row_key = mysqli_fetch_assoc($result_keywords)){
                        array_push($keywordArr,$row_key['keyword']);
                    }
        
                    $sql_auth = "SELECT * FROM sheet_authors WHERE sheet_id = $sheet_id";
                    $result_auth = mysqli_query($db,$sql_auth);
                    $auth_rows = mysqli_num_rows($result_auth);
        
        
                    
                    if($auth_rows > 0){
                        while($row_auth = mysqli_fetch_assoc($result_auth)){
                            array_push($authArr,array(
                                'fname' => $row_auth['auth_fname'],
                                'lname' => $row_auth['auth_lname'],
                                'email' => $row_auth['auth_email'],
                                'country' => $row_auth['auth_country'],
                                'aff' => $row_auth['auth_aff'],
                                'web' => $row_auth['auth_web']
                            ));
                        }
                    }
                    else{
                        $authArr = array();
                    }
        
                    

                    
                    
                    array_push($paper_data, array(
                        'sheet_id' => $row_paper['sheet_id'],
                        'author_id' => $row_paper['author_id'],
                        'conf_id' => $row_paper['conf_id'],
                        'sheet_title' => $row_paper['sheet_title'],
                        'sheet_abstract' => $row_paper['sheet_abstract'],
                        'sheet_file' => $row_paper['sheet_file'],
                        'track_id' => $row_paper['track_id'],
                        'sheet_status' => $row_paper['sheet_status'],
                        'submitted_date' => $row_paper['submitted_date'],
                        'track_id' => $row_paper['track_id'],
                        'track_name' => $row_paper['track_name'],
                        'user_name' => $row_paper['full_name'],
                        'keywords' => $keywordArr,
                        'authors' => $authArr,
                        'sheet_result' => $row_paper['sheet_result']
                    ));

                }
                $paper_data['data'] = $paper;
            }
        }

        else{
            $paper_data = array();
        }

        
        $paper_data['data'] = $paper;


        return $paper_data;
    }
    
    
    function getPcs($role){
        /*          RETURN PC MEMBER FOR SHOW          */

        global $db;


        $conf_id = $_SESSION['conf_id'];
        $pcArr = array();

        
        if($role == 2){
            $sql_get = "SELECT usr.role_id,usr.role_status ,us.user_id,us.full_name,us.email,us.phone,us.region,us.status,tr.track_name FROM user_role usr 
            INNER JOIN users us 
            ON usr.user_id = us.user_id 
            AND usr.role_id = 4 
            AND conf_id = $conf_id 
            JOIN tracks tr 
            ON usr.track_id = tr.track_id ";
        }

        if($role == 3){
            $track_id = $_SESSION['track_id'];
            
            $sql_get = "SELECT usr.role_id,usr.role_status ,us.user_id,us.full_name,us.email,us.phone,us.region,us.status,tr.track_name FROM user_role usr 
            INNER JOIN users us 
            ON usr.user_id = us.user_id 
            AND usr.role_id = 4 
            AND conf_id = $conf_id 
            JOIN tracks tr 
            ON usr.track_id = tr.track_id 
            AND usr.track_id = $track_id";
            
            
            
        }


        $result_pcs = mysqli_query($db,$sql_get);

        

        while($row_pcs = mysqli_fetch_assoc($result_pcs)){
            array_push($pcArr,array(
                'user_id' => $row_pcs['user_id'],
                'role_id' => $row_pcs['role_id'],
                'full_name' => $row_pcs['full_name'],
                'email' => $row_pcs['email'],
                'phone' => $row_pcs['phone'],
                'region' => $row_pcs['region'],
                'status' => $row_pcs['status'],
                'track_name' => $row_pcs['track_name'],
                'role_status' => $row_pcs['role_status']
            ));
        }

        return $pcArr;
    }

    function getScore($sheet_id = null){
        /*          RETURN Sheet Score and reviewers count          */

        global $db;

        $sql_scoreGroup = "SELECT count(reviewer_id) as count, score 
        FROM sheet_reviewed 
        WHERE sheet_id = $sheet_id 
        GROUP BY score";
        $result_scoreGroup = mysqli_query($db,$sql_scoreGroup);

        $num_rows = mysqli_num_rows($result_scoreGroup);

        $group = array();

        if($num_rows > 0){
            while($row_scoreGroup = mysqli_fetch_assoc($result_scoreGroup)){
                array_push($group,array(
                    "count" => $row_scoreGroup['count'],
                    "score" => $row_scoreGroup['score']
                ));
            }

            
        }
        return $group;
        
    }


    

    function getChairs($role = 2){
        /*          RETURN PC MEMBER FOR SHOW          */

        global $db;


        $conf_id = $_SESSION['conf_id'];
        $pcArr = array();

        if($role != 2){
            return array('status' => 0);
        }
        if($role == 2){
            $sql_get = "SELECT usr.role_id,usr.role_status ,us.user_id,us.full_name,us.email,us.phone,us.region,us.status,tr.track_name FROM user_role usr 
            INNER JOIN users us 
            ON usr.user_id = us.user_id 
            AND usr.role_id = 3
            AND conf_id = $conf_id 
            JOIN tracks tr 
            ON usr.track_id = tr.track_id ";
        }


        $result_pcs = mysqli_query($db,$sql_get);

        

        while($row_pcs = mysqli_fetch_assoc($result_pcs)){
            array_push($pcArr,array(
                'user_id' => $row_pcs['user_id'],
                'role_id' => $row_pcs['role_id'],
                'full_name' => $row_pcs['full_name'],
                'email' => $row_pcs['email'],
                'phone' => $row_pcs['phone'],
                'region' => $row_pcs['region'],
                'status' => $row_pcs['status'],
                'track_name' => $row_pcs['track_name'],
                'role_status' => $row_pcs['role_status']
            ));
        }

        return $pcArr;
    }

    function getParticipants(){
        /*          RETURN All paricipants          */

        global $db;
        $conf_id = $_SESSION['conf_id'];

        $data = array();

        $sql_part = "SELECT usr.role_id,us.full_name,us.email,us.phone,us.region,r.name,tr.track_name as tr_name  
        FROM user_role usr 
        INNER JOIN users us 
        ON usr.user_id = us.user_id 
        JOIN roles r 
        ON usr.role_id = r.role_id 
        AND usr.conf_id = $conf_id 
        LEFT JOIN tracks tr 
        ON usr.track_id = tr.track_id";

        $result_part = mysqli_query($db,$sql_part);
        $part_rows = mysqli_num_rows($result_part);

        if($part_rows > 0){
            while($row_part = mysqli_fetch_assoc($result_part)){
                array_push($data,array(
                    'role_id' => $row_part['role_id'],
                    'full_name'=> $row_part['full_name'],
                    'email'=> $row_part['email'],
                    'phone'=> $row_part['phone'],
                    'region'=> $row_part['region'],
                    'name'=> $row_part['name'],
                    'track_name' => $row_part['tr_name']
                ));
            }

            return $data;
        }
    }


    
}

?>