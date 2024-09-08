<?php
include '../userdata.php';
include '../header.php';


if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 5){
       

       // $user_id = $userdata['user_id'];
        $submittedData = getAuthSub();


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
        
        
        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">

        <!-- JS FILES -->
        <script src="../JS/all.js"></script>
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12" style="padding: 0;">
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
            </div>
        </div>
        <div class="row main-row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="margin-top: 30px;">
                        <div class="content-box" style="width: 100%;">
                            <div class="form-box mb-3 center">
                                <h1>Select Paper</h1>
                            </div>
                            <div class="form-box">

                                <table class="table table-bordered">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th colspan="4">Conference Name</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Conference</th>
                                            <th>Title</th>
                                            <th>Score</th>
                                            <th>Result</th>
                                            
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i = 0;$i< count($submittedData) ; $i++){
                                                $score = '-';
                                                $result = '-';

                                                $final_result = getDeci($submittedData[$i]['sheet_id']);
                                                
                                                if(array_key_exists('sheet_result',$final_result[0])){
                                                    $score = $final_result[0]['score'];
                                                    $result = $final_result[0]['sheet_result'];
                                                    echo 'Hello';
                                                }
                                               
                                                echo '
                                                <tr>
                                                <th>'.($i+1).'</th>
                                                <td><span>'.$submittedData[$i]['acronym'].'</span></td>
                                                <td><a href="../paper/index.php?sheetId='.$submittedData[$i]['sheet_id'].'" class="link">'.$submittedData[$i]['sheet_title'].'</a></td>
                                                <td><span>'.$score.'</span></td>
                                                <td><span>'.$result.'</span></td>
                                                </tr>
                                                ';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>