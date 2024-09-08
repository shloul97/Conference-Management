<?php
require_once("../header.php");

session_start();

if(isset($_SESSION['user_login'])){
    header('Location: ../select_role');
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
        
        <!-- JS FILES -->
        <script src="../JS/all.js"></script>
        <script src="../JS/account.js"></script>

        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">
        <link href="../CSS/account.css" rel="stylesheet">
        
       
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>
    <body>
        <div class="row" style="padding: 0; margin: 0;">
        <div class="col-12">

            <div class="row" style="margin-top: 25px;">
                <div class="col-4"></div>
                <div class="col-4">
                    
                    <div class="content-box" style="width: 100%;" >
                        <div class="account-choose mb-3">
                            <button class="btn btn-light" id="login-form-dis">Sign In</button>
                            <button class="btn btn-light" id="reg-form-dis">Sign Up</button>
                        </div>
                        <div class="warn-msg-div mb-3" id="error-div" style="display:none;">
                            <span class="danger-msg" id="error-msg"></span>
                        </div>
                        <form action="#" method="POST" id="login-form" >
                            <div class="center">
                                <h1 class="h3 mb-3 fw-normal">Sign In</h1>
                            </div>
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control mb-2" id="email" placeholder="name@example.com">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-check text-start my-3">
                                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                                </label>
                            </div>
                            <!--<button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>-->
                            <button  type="submit" class="btn btn-primary w-100 py-2">Sign In</button>
                            </form>

                            <form action="#" method="POST" id="reg-form" style="display: none;">
                                <div class="center">
                                <h1 class="h3 mb-3 fw-normal">Sign up</h1>
                                </div>
                                <div class="form-floating">
                                    <input type="text" name="full-name" class="form-control mb-2" id="full-name" placeholder="Full Name (ex. John Doe)">
                                    <label for="full-name">Full Name</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control mb-2" id="reg-email" placeholder="E-mail">
                                    <label for="reg-email">E-mail</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" name="phone" class="form-control mb-2" id="phone" placeholder="Phone (Ex. +962 77 8877 812)">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="form-floating">
                                    <select name="country" class="form-control mb-2" id="country">
                                        <option value="" selected>Select Country</option>
                                        <option value="JO">Jordan</option>
                                        <option value="SU">Saudi Arabia</option>
                                        <option value="KW">Kuwait</option>
                                    </select>
                                    <label for="country">Country</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control mb-2" id="reg-password" placeholder="Password">
                                    <label for="reg-password">Password</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="conf-pass" class="form-control mb-2" id="reg-conf-pass" placeholder="Confirm Password">
                                    <label for="reg-conf-pass">Confirm Password</label>
                                </div>
                                <div class="form-floating">
                                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Date Of Birth">
                                    <label for="dob">Date of birth</label>
                                </div>
                                
                                <button class="btn btn-primary w-100 py-2 my-3" type="submit">Sign Up</button>
                                
                                </form>
                    </div> 

                      
                </div>
                <div class="col-4"></div>
            </div>

        </div>
        </div>
    </body>

    <footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

    </footer>
</html>