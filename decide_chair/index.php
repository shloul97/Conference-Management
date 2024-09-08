<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3){
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
        <script src="../JS/decideChair.js"></script>

        
        
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
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="margin-top: 30px;">
                        <div class="content-box" style="width: 100%;">
                            <form action="#" method="POST" id="decide-form">
                                <div class="row mb-3">
                                    <div class="col-md-12" style="text-align: center;">
                                        <h2>This form is to submit the final result of the papers </h2>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12" style="text-align: center;">
                                        <p>*This form will shows when deadline end*</p>
                                        <p>*After submitting the form, all paper scores in this track will be stored in the database*</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12" >
                                        <label for="comment">Chair Comment</label>
                                        <textarea name="comment" class="form-control" id="comment"></textarea>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center;">
                                        <button type="submit" class="btn btn-warning" id="decide-button" style="width: 50%;">Submit</button>
                                    </div>
                                </div>
                               
                            </form>

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