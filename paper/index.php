<?php
include '../userdata.php';
include '../header.php';


if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != ''){

        if(isset($_GET['sheetId'])){
            
            $userdata = getUserData();
            $user_id = $userdata['user_id'];
            $sheet_id = $_GET['sheetId'];

            $paperData = getPaper($sheet_id);
            $reviewer = false;

            $visor = false;

            if($_SESSION['user_role'] == 4 && (isset($_SESSION['track_id']) 
            && $_SESSION['track_id'] == $paperData['track_id'])){
                $reviewer = true;
            }
            if(($_SESSION['user_role'] == 4 && (isset($_SESSION['track_id']) 
            && $_SESSION['track_id'] != $paperData['track_id'])) 
            || ($_SESSION['user_role'] == 3 
            && (isset($_SESSION['track_id']) 
            && $_SESSION['track_id'] != $paperData['track_id']))){
                header('Location: ../denied');
            }

            if($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 3){
                $visor = true;
            }

            

        // $user_id = $userdata['user_id'];
            

        }
        else{
            header('Location: ../denied');
        }
    }
    else{
        header('Location: ../denied');
    }
}
else{
    header('Location: ../account');
}

?>
<!DOCTYPE html>
<html>
    <head>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
        <!-- FONT AWESOME-->
        <script src="https://kit.fontawesome.com/ae8fff17f1.js" crossorigin="anonymous"></script>

        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">

        <!-- JS FILES -->
        <script src="../JS/all.js"></script>
        <script src="../JS/paper.js"></script>
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12" style="padding: 0;">
                <div class="header-control">
                    <?php echo roleHeader(); ?>
                </div>
            </div>
        </div>
        <div class="row main-row">
            <!--<div class="col-md-12" style="padding: 0;">
                <div class="header-control">
                    <div>
                        <a href="../author" class="btn btn-light btn-header-control">Home</a>
                    </div>
                    <div>
                        <a href="../submitted" class="btn btn-light btn-header-control">Submitted</a>
                    </div>
                    <div>
                        <a href="../cfp" class="btn btn-light btn-header-control">CFPs</a>
                    </div>
                   
                    <div>
                        <a href="../select_role" class="btn btn-light btn-header-control">Role</a>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="row main-row">
            <div class="col-md-12">
                <div class="row mb-3"> 
                    <!-- Paper DIV -->
                    <?php
                    echo '
                    <div class="col-md-6" style="margin-top: 30px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box" style="width: 100%;">
                                    <div class="form-box mb-3 center">
                                        <h1>Paper: </h1>
                                    </div>
                                    <div class="form-box">

                                        <table class="table table-bordered">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th colspan="4">Sheet Data</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>'.$paperData['sheet_title'].'</td>
                                                </tr>
                                                <tr>
                                                    <th>Abstract</th>
                                                    <td>'.$paperData['sheet_abstract'].'</td>
                                                </tr>
                                                <tr>
                                                    <th>Track</th>
                                                    <td>'.$paperData['track_name'].'</td>
                                                </tr>
                                                <tr>
                                                    <th>Keyword</th>
                                                    <td>'; 

                                                    echo '<div class="list-group">';
                                                    
                                                    for($i = 0; $i < count($paperData['keywords']);$i++){
                                                        echo '<a href="#" class="list-group-item list-group-item-action">'.$paperData['keywords'][$i].'</a>';
                                                    }
                                                    
                                                    echo '</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Submitted Date</th>
                                                    <td>'.$paperData['submitted_date'].'</td>
                                                </tr>
                                                <tr>
                                                    <th>Prmary Author</th>
                                                    <td>'.$paperData['user_name'].'</td>
                                                </tr>
                                                <tr>
                                                    <th>Sheet File</th>
                                                    <td>
                                                        <a href="'.$paperData['sheet_file'].'" attributes-list><span style="margin-right: 10px; color: red;"><i class="fa-solid fa-file-pdf"></i></span>File</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Paper DIV -->';

                        ?>
                    </div>
                    
                    <?php 
                    
                    if($reviewer){

                        $sql_checkRev = "SELECT * FROM sheet_reviewed WHERE sheet_id = $sheet_id 
                        AND reviewer_id = $user_id";
                        $result_check = mysqli_query($db,$sql_checkRev);
                        $row_numcheck = mysqli_num_rows($result_check);
                        

                        
                        echo '
                        <!-- PC DIV -->
                            <div class="col-md-6" style="margin-top: 30px;">
                                <!-- PC BOX -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-box" style="width: 100%;">
                                            <div class="form-box mb-3 center">
                                                <h1>PC: </h1>
                                            </div>';
                                            if($row_numcheck > 0){
                                                $row_check = mysqli_fetch_assoc($result_check);
                                                echo '
                                                <div class="success-div">
                                                    <span>Your review submitted you can modify it</span>
                                                </div>';

                                                echo '
                                                <div class="dropdown-form">
                                                    <div>
                                                        <span id="show-reviewed">
                                                        <b>Show your review</b>
                                                        <i class="fa-solid fa-arrow-down" id="slider-arrow-review"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-box" style="display:none;" id="review-div">
                                                    <table class="table table-bordered">
                                                        <thead style="text-align: center;">
                                                            <tr>
                                                                <th colspan="4">PC review</th>
                                                            </tr>
                                                            <tr>
                                                                
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr><th>Score</th>
                                                        <td>'.
                                                        $row_check['score']
                                                        .'</td></tr>
                                                        <tr>
                                                        <th>Feedback</th>
                                                        <td>'.
                                                        $row_check['feedback']
                                                        .'</td></tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                ';

                                                
                                                
                                            }

                                            

                                            echo '
                                            <div class="dropdown-form">
                                                <div>
                                                    <span id="show-review-form">
                                                    <b>Review Form</b>
                                                    <i class="fa-solid fa-arrow-down" id="slider-arrow"></i>
                                                    </span>
                                                </div>

                                            </div>';
                                            echo '<form action="#" method="POST" id="pc-form" style="display:none;">
                                                <div class="form-box">
                                                    <table class="table table-bordered">
                                                        <thead style="text-align: center;">
                                                            <tr>
                                                                <th colspan="4">PC review</th>
                                                            </tr>
                                                            <tr>
                                                                
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>Score</th>
                                                                <td>
                                                                    <input type="hidden" name="sheet-id" value="'.$sheet_id.'" />';
                                                                    if($row_numcheck > 0){
                                                                        echo '
                                                                            <input type="hidden" name="sheet-action" value="modify" />
                                                                        ';

                                                                    }
                                                                    else{
                                                                        echo '
                                                                            <input type="hidden" name="sheet-action" value="new-review" />
                                                                        ';
                                                                    }
                                                                    echo '
                                                                    <div>
                                                                        <input type="radio" class="form-check-input mr-2" value="-1" id="-1" name="score" />
                                                                        <label class="form-check-label ml-3" for="-1">-1</label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" class="form-check-input" value="0" id="0" name="score" />
                                                                        <label class="form-check-label" for="0">0</label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" class="form-check-input" value="1" id="1" name="score" />
                                                                        <label class="form-check-label" for="1">1</label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" class="form-check-input" value="2" id="2" name="score" />
                                                                        <label class="form-check-label" for="2">2</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Feedback</th>
                                                                <td>
                                                                    <label class="form-check-label" for="feedback">Your Review feedback</label>
                                                                    <textarea class="form-control" name="feedback" id="feedback" style="height: 200px;"></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr style="text-align: center;">
                                                                <th colspan="2"><button type="submit" class="btn btn-warning" style="width: 50%;" id="submit-review">Submit</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- PC END -->
                        ';
                        
                    }
                    ?>
                    
                </div>

                <!-- AUTHORS DIV -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box" style="width: 100%;">
                                    <div class="form-box mb-3 center">
                                        <h1>Authors: </h1>
                                    </div>
                                    <div class="form-box">
                                        <table class="table table-bordered">
                                            <thead style="text-align: center;" >
                                                <tr class="">
                                                    <th colspan="6">Authors Info.</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>E-mail</th>
                                                    <th>Country</th>
                                                    <th>Affilation</th>
                                                    <th>Web Page</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            //$json_data = json_encode($paperData, JSON_PRETTY_PRINT);
                                            //var_dump($json_data);
                                            
                                            for($i = 0; $i < count($paperData['authors']);$i++){

                                                echo '
                                                <tr>
                                                    <td>'.($i+1).'</td>                                              
                                                    <td>'.$paperData['authors'][$i]['fname'].' '.$paperData['authors'][$i]['lname'].'</td>                                                                                               
                                                    <td>'.$paperData['authors'][$i]['email'].'</td>                                                                                                 
                                                    <td>+'.$paperData['authors'][$i]['country'].'</td>                                       
                                                    <td>'.$paperData['authors'][$i]['aff'].'</td>
                                                    <td>'.$paperData['authors'][$i]['web'].'</td>
                                                </tr>
                                                ';
                                            }
                                            
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviewed DIV -->
                <?php 
                if($visor){
                    echo '<div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box" style="width: 100%;">
                                    <div class="form-box mb-3 center">
                                        <h1>Reviews: </h1>
                                    </div>
                                    <div class="form-box">
                                        <table class="table table-bordered">
                                            <thead style="text-align: center;">
                                                
                                                <tr>
                                                    <th>#</th>
                                                    <th>PC ID</th>
                                                    <th>PC E-mail</th>
                                                    <th>PC NAME</th>
                                                    <th>SCORE</th>
                                                    <th>Feedback</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                             
                            $sql_review ="SELECT us.user_id,us.full_name,us.email,rev.score,rev.feedback 
                            FROM sheet_reviewed rev 
                            INNER JOIN users us 
                            ON rev.reviewer_id = us.user_id 
                            AND rev.sheet_id = $sheet_id";
                            $result_review = mysqli_query($db,$sql_review);
                            $rev_numRows = mysqli_num_rows($result_review);

                            if($rev_numRows > 0){
                                $s = 1;
                                while($row_rev = mysqli_fetch_assoc($result_review)){
                                    
                                    echo '
                                    <tr>
                                        <td>'.($s).'</td>                                              
                                        <td>'.$row_rev['user_id'].'</td>                                                                                               
                                        <td>'.$row_rev['email'].'</td>                                                                                                 
                                        <td>'.$row_rev['full_name'].'</td>                                       
                                        <td>'.$row_rev['score'].'</td>
                                        <td>'.$row_rev['feedback'].'</td>
                                    </tr>
                                    ';
                                    $s++;
                                }
                            }
                            echo'</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Reviewed DIV -->';
                                        }
                                        ?>

            </div>
        </div>
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>