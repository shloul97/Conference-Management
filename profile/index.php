<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role'])){
        
        
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
        <link href="../CSS/profile.css" rel="stylesheet">
        

        <!-- JS FILES-->
        <script src="../JS/all.js"></script>
        <script src="../JS/profile.js"></script>
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12">
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-3" >
                        <div class="row ">
                            <div class="col-md-12" >
                                <div class="profile-select-div" >
                                    <a href="#" class="btn btn-light" data-id="info-div" name="select-form" ><h3>Information</h3></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-md-12" >
                                <div class="profile-select-div" >
                                    <a href="#" class="btn btn-light" data-id="password-div" name="select-form"><h3>Security</h3></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6" >
                        <div class="row mb-3" id="info-div" style="display: none;">
                            <div class="col-md-12">                   
                                <div class="content-box" style="width: 100%;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table border-less info-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>Moayad Shloul</td>
                                                    </tr>
                                                    <tr>
                                                        <th>E-mail:</th>
                                                        <td>shloul97@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone:</th>
                                                        <td>+962778804242</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date Of Birth:</th>
                                                        <td>12/02/1997</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Region:</th>
                                                        <td>JO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row" id="password-div" style="display: none;">
                            <div class="col-md-12">
                                <form action="#" method="POST" id="change-pass-form">                        
                                    <div class="content-box" style="width: 100%;">
                                        <div class="row mb-3">
                                            <div class="col-md-12">                                                
                                                <div class="warn-msg-div" id="warn-msg-div">
                                                    <span id="warn-msg"></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="center">
                                                    <h1 class="h3 mb-3 fw-normal">Change Password </h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" name="old-pass" id="old-pass" placeholder="Current Password" required />                                                       
                                                    <label for="old-pass">Current Password</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="password" name="new-pass" class="form-control mb-2" id="new-pass" placeholder="New Password" required />
                                                    <label for="new-pass">New Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="password" name="conf-pass" class="form-control mb-2" id="conf-pass" placeholder="Confirm Password" required />
                                                    <label for="conf-pass">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-floating center">
                                                    <button class="btn btn-warning" type="submit" id="change-pass-submit" style="width: 50%;">Change</button>
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </form>
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