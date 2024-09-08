<?php
include 'getPapers.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 3 || $_SESSION['user_role'] == 2)){
        $conf_id = $_SESSION['conf_id'];
        //echo $conf_id;
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
        

        <!-- JS FILES-->
        <script src="../JS/all.js"></script>
        
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
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-12" style="margin-top: 30px;">
                        <div class="row">
                            <!-- TABLE 1 START-->
                            <div class="col-md-6 search-tbody" style="padding-top: 12px;">
                                <form>
                                    <!--<div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="track-group" checked />
                                        <label class="form-check-label" for="track-group" >Group Paper By Track</label>
                                    </div>-->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="author-group" checked />
                                        <label class="form-check-label" for="author-group">Show Paper Authors</label>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 search-tbody" style="padding-top: 12px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Decision</th>
                                            <th>Number of Papers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Accept</td>
                                            <td>45</td>
                                        </tr>
                                        <tr>
                                            <td>Weak Accept</td>
                                            <td>6</td>
                                        </tr>
                                        <tr>
                                            <td>No Decision</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Weak Reject</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>Reject</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- TABLE 1 END-->
                        </div>
                    </div>
                </div>
                <!-- END OF SEARCH TABLE ROW-->
                
                <div class="row">
                    <div class="col-md-12 " style="padding: 12px; margin-top: 25px;">
                        <div class="cfp-table-div">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr style="text-align: center;" ><th colspan="8" class="cfp-table"><h2>Papers</h2></th></tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Authors</th>
                                        <th>Title</th>
                                        <th>Track</th>
                                        <th>Scores</th>
                                        <th>Avg.</th>
                                        <th>Decision</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        if($paperData['data'] == 'multiple'){
                                            
                                            for($i =0; $i< (count($paperData) - 1);$i++){
                                                
                                                echo'<tr>
                                                    <th>1</th>
                                                    <td>';
                                                    for($j = 0;$j < count($paperData[$i]['authors']) ; $j++){
                                                        echo $paperData[$i]['authors'][$j]['fname'] .' '.$paperData[$i]['authors'][$j]['lname']. ' , ';

                                                    }

                                                    
                                                    echo 
                                                    '</td>
                                                    <td><a class="link" href="../paper/index.php?sheetId='.$paperData[$i]['sheet_id'].'">'.$paperData[$i]['sheet_title'].'</a></td>
                                                    <td>Track name</td>';

                                                    $groupScore = getScore($paperData[$i]['sheet_id']);
                                                    $avgBool = false;
                                                    if($groupScore){
                                                        //var_dump($groupScore);
                                                        $multiply = 0;
                                                        $sum = 0;
                                                        $counter = 0;
                                                        echo'
                                                        <td>';
                                                        for($x = 0; $x < count($groupScore);$x++){
                                                            $multiply = $groupScore[$x]['score'] * $groupScore[$x]['count'];
                                                            $counter += $groupScore[$x]['count'];
                                                            echo ''.$groupScore[$x]['score'].'<span class="small-span">('.$groupScore[$x]['count'].')</span>';
                                                            $sum +=$multiply;
                                                        }
                                                        $avg = ($sum / $counter);
                                                        $avg = number_format($avg,2);
                                                        $avgBool = true;
                                                        //-1<span class="small-span">(2)</span>
                                                        echo '</td>';    
                                                    }
                                                    else{
                                                        echo'
                                                    <td>-</td>';    
                                                    }
                                                    
                                                    if($avgBool){
                                                        echo '<td>'.$avg.'</td>';
                                                    }
                                                    else{
                                                        echo '<td>-</td>';
                                                    }
                                                    /*$final_result = getDeci($paperData[0]['sheet_id']);

                                                    if(array_key_exists('sheet_result',$final_result[$i])){
                                                        echo '<td>'.$final_result[$i]['sheet_result'].'</td>';
                                                    }
                                                    else{
                                                        echo '<td>-</td>';
                                                    }*/
                                                    echo'
                                                    <td>'.$paperData[$i]['sheet_result'].'</td>
                                                </tr>
                                            ';

                                            }
                                        }
                                        else if($paperData['data'] == 'single'){
                                           
                                            echo'<tr>
                                                    <th>1</th>
                                                    <td>';
                                                    for($j = 0;$j < count($paperData['authors']) ; $j++){
                                                        echo $paperData['authors'][$j]['fname'] .' '.$paperData['authors'][$j]['lname']. ' , ';

                                                    }
                                                    $groupScore = getScore($paperData['sheet_id']);
                                                    echo 
                                                    '</td>
                                                    <td><a class="link" href="../paper/index.php?sheetId='.$paperData['sheet_id'].'">'.$paperData['sheet_title'].'</a></td>
                                                    <td>Track name</td>';
                                                    $groupScore = getScore($paperData['sheet_id']);
                                                    $avgBool = false;
                                                    if(!empty($groupScore)){

                                                        $multiply = 0;
                                                        $sum = 0;
                                                        $counter = 0;
                                                        
                                                        echo'
                                                        <td>';
                                                        for($x = 0; $x < count($groupScore);$x++){
                                                            $multiply = $groupScore[$x]['score'] * $groupScore[$x]['count'];
                                                            $counter += $groupScore[$x]['count'];
                                                            echo ''.$groupScore[$x]['score'].'<span class="small-span">('.$groupScore[$x]['count'].')</span>';
                                                            $sum +=$multiply;
                                                        }
                                                        $avg = ($sum / $counter);
                                                        $avg = number_format($avg,2);
                                                        $avgBool = true;
                                                        
                                                        
                                                        
                                                        //-1<span class="small-span">(2)</span>
                                                        echo '</td>';    
                                                    }
                                                    else{
                                                        echo'
                                                    <td>-</td>';    
                                                    }


                                                    
                                                    if($avgBool){
                                                        echo '<td>'.$avg.'</td>';
                                                    }
                                                    else{
                                                        echo '<td>-</td>';
                                                    }
                                                    /*$final_result = getDeci($paperData['sheet_id']);
                                                    //var_dump($final_result);
                                                    if(!array_key_exists('sheet_result',$final_result[0])){
                                                        echo '<td>-</td>';
                                                    }
                                                    else{
                                                        
                                                        echo '<td>'.$final_result['sheet_result'].'</td>';
                                                    }*/
                                                   echo '
                                                    <td>'.$paperData['sheet_result'].'</td>
                                                </tr>
                                            ';

                                        }
                                        
                                    
                                    ?>
                                </tbody>
                            </table>
                                                   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="pagination-div">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                <span class="page-link">
                                    2
                                </span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>