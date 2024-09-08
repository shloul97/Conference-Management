<?php 
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    
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
        <script src="../JS/createConf.js"></script>

        
        
        
        
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
        <input type="hidden" id="page_name" name="page_name" value="create_conf" />
        <div class="row" style="margin-top: 15px; padding: 0; margin-left: 0; margin-right: 0;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box" style="width: 100%; padding: 15px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="center" style="width: 100%;">
                                    <h1>Create Conference</h1>
                                </div>
                            </div>
                        </div>
                        
                        
                        <form action="#" method="POST" id="create-conf">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-content">
                                        <h3>Title and acronym:</h3>
                                        <label for="conf-title">Conference Title:<span class="red">*</span></label>
                                        <input class="form-control mb-1" type="text" id="conf-title" name="conf-title" required />
                                        <label for="conf-acronym">Acronym<span class="red">*</span>:</label>
                                        <input class="form-control mb-1" type="text" id="conf-acronym" name="conf-acronym" required />
                                    </div>

                                    <div class="form-content my-3">
                                        <h3>Conference information:</h3>
                                        <label for="web-page">Web page:<br><span><i>Default is none</i></span></label>
                                        <input class="form-control mb-1" type="text" id="web-page" name="web-page" value="none" required />
                                        <label for="city">City<span class="red">*</span>:</label>
                                        <input class="form-control mb-1" type="text" id="city" name="city" required />

                                        <label for="country">Country/region<span class="red">*</span>:</label>
                                        <select class="form-control" id="country" name="country">
                                            <option value="none">Select Country</option>
                                            <option value="JO">Jordan</option>
                                            <option value="EG">Egypt</option>
                                            <option value="US">United States</option>
                                            <option value="UK">United Kingdom</option>
                                            <option value="IN">India</option>
                                        </select>
                                        <label for="sub-num">Estimated number of submissions<span class="red">*</span>:</label>
                                        <input class="form-control mb-1" type="number" id="sub-num" name="sub-num" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-content">
                                        <h3>Dates:</h3>
                                        <label for="f-day">First Day:<span class="red">*</span></label>
                                        <input class="form-control mb-1" type="date" id="f-day" name="f-day" required />
                                        <label for="l-day">Last Day<span class="red">*</span>:</label>
                                        <input class="form-control mb-1" type="date" id="l-day" name="l-day" required />
                                        <label for="s-deadline">Submission Deadline<span class="red">*</span>:</label>
                                        <input class="form-control mb-1" type="date" id="s-deadline" name="s-deadline" required />
                                    </div>

                                    <div class="form-content my-3">
                                        <h3>Research areas:</h3>
                                        <label for="p-area">Primary Area<span class="red">*</span>:</label>
                                        <input class="form-control mb-1" type="text" id="p-area" name="p-area"  required />
                                        <label for="s-area">Secondary Area:</label>
                                        <input class="form-control mb-1" type="text" id="s-area" name="s-area" />
                                        <label for="note">Note Area:</label>
                                        <textarea class="form-control mb-1" type="text" id="note" name="note"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-content">
                                        <h3>Oragnizer:</h3>
                                        <label for="or-phone">Contact phone number<span class="red">*</span>:</label>
                                        <input class="form-control mb-1" type="text" id="or-phone" name="or-phone"  required />
                                    </div>

                                    <div class="form-content my-3">
                                        <h3>Other information:</h3>
                                        <label for="note">Any other information:</label>
                                        <textarea class="form-control mb-1" type="text" id="extra_note" name="extra_note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="center-div center">
                                    <p><i>By submit your form you agree all <a href="#" class="link">terms of service</a></i></p>
                                    <button type="submit" id="conf-request" class="btn btn-warning" style="height: 60px; width: 220px;"><b>Submit</b></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>

        </div>
    </body>
    <footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

    </footer>

</html>