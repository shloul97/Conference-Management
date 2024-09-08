<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1){
        $conf_id = $_SESSION['conf_id'];
        $superchair_check = true;
        //echo $conf_id;

        $userdata = getUserData();
        $user_id = $userdata['user_id'];


        $sql_check = "SELECT * FROM user_role where user_id = $user_id AND conf_id = $conf_id AND role_id = 2";
        $result_check = mysqli_query($db,$sql_check);

        $check_rows = mysqli_num_rows($result_check);
        if($check_rows > 0){
            $superchair_check = false;
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
        

        <!-- JS FILES-->
        <script src="../JS/all.js"></script>
        <script src="../JS/assig_super.js"></script>

        
        
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
                        <form action="#" method="POST" id="chair-ass-form">                        
                            <div class="content-box" style="width: 100%;">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="center">
                                            <h1 class="h3 mb-3 fw-normal">Assign Super Chair</h1>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control mb-2" id="email" placeholder="name@example.com" required>
                                            <label for="email">Email address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating center">
                                            <button class="btn btn-warning" type="submit" id="self-super-btn" style="width: 50%;">Invite</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <?php
                if($superchair_check){
                    echo '
                    <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="margin-top: 30px;">
                                           
                            <div class="content-box" style="width: 100%;">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="center">
                                            <h1 class="h3 mb-3 fw-normal">Set Yourself as a Super Chair</h1>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating center">
                                            <button class="btn btn-warning" type="submit" id="self-super-btn" style="width: 50%;">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        
                    </div>
                    <div class="col-md-3"></div>
                    </div>
                    ';
                }
                ?>
                


            </div>
        </div>
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>