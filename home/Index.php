<?php
include '../userdata.php';
include '../header.php';
?>

<!DOCTYPE html>
<html>
    <head>



       <!-- jQuery -->
       <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- JS FILES -->
        <script src="../JS/all.js"></script>
        

        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">


        

        



        
    </head>
    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>
    <body>
        <div class="row" style="width: 100%; margin: 0; padding: 0;">
            <div class="col-sm-12 center">
                <div class="row ">
                    <div class="col-sm-12 main-img-div main-home-intro">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="row margined">
                                    <div class="col-md-3">
                                        <div class="side-img-div">
                                            <img src="../images/home/logo-home.png"  class="side-img"/>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="trans-content margined center-div " style="text-align: left;">
                                            <h1 class="white">Sign up now and unlock the full potential of seamless event management! </h1>
                                            <div class="center">
                                                <a class="btn btn-warning" style="margin-top: 15px;"><b>Sign Up!</b></a>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row margined" >
                                    <div class="col-md-3">
                                        <div class="side-img-div">
                                            <img src="../images/home/createconf-home.png"  class="side-img"/>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="trans-content margined center-div ">
                                            <h1 class="white">Lead your conference with confidence.
                                                All-in-one platform, your complete solution</h1>
                                            <a class="btn btn-warning" style="margin-top: 15px;"><b>Create a Conference</b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="trans-content margined center-div ">
                                            <h1 class="white">Lead your conference with confidence.
                                                All-in-one platform, your complete solution</h1>
                                            <a class="btn btn-warning" style="margin-top: 15px;"><b>Create a Conference</b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-md-3"></div>                            
                        </div>
                    </div>
                </div>

                <div class="row"  id="service-id" data-aos="fade-up"  data-aos-duration="200" name="content-div" style="margin-top: 30px; margin-bottom: 15px;">
                    <div class="col-md-12 center">
                        <h1 class="main-h1">Services we provide</h1>
                    </div>
                </div>
                <div class="row home-content-row" data-aos="fade-right" data-aos-duration="600" id="content-1" name="content-div" >
                    <div class="col-md-4 home-content-col home-img-col-left" >
                        <div class="img-inverse-left">
                            <div class="home-content-box" data-aos="fade-right" data-aos-duration="1500">
                                <img src="../images/home/manage.png" height="520" width="500" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 home-content-col">
                        <div class="home-content-box">
                            <h1>Conference management System</h1>
                            <p>From managing program committees to publishing proceedings,
                                our Eventia system has got you covered.
                                </p>
                        </div>
                    </div>
                </div>
                <div class="row home-content-row" data-aos="fade-right" data-aos-duration="600" name="content-div">
                    
                    <div class="col-md-8 home-content-col">
                        <div class="home-content-box">
                            <h1>Conference management System</h1>
                            <p>From managing program committees to publishing proceedings,
                                our Eventia system has got you covered.
                                </p>
                        </div>
                    </div>
                    <div class="col-md-4 home-content-col home-img-col-right">
                        <div class="img-inverse-right">
                            <div class="home-content-box"  data-aos="fade-right" data-aos-duration="1500">
                                <img src="../images/home/register.png" height="520" width="500" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row home-content-row"  data-aos="fade-right" name="content-div" >
                    <div class="col-md-4 home-content-col home-img-col-left">
                        <div class="img-inverse-left">
                            <div class="home-content-box"  data-aos="fade-right" data-aos-duration="1500">
                                <img src="../images/home/submit.png" height="520" width="500" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 home-content-col">
                        <div class="home-content-box">
                            <h1>Conference management System</h1>
                            <p>From managing program committees to publishing proceedings,
                                our Eventia system has got you covered.
                                </p>
                        </div>
                    </div>
                </div>
                <div class="row home-content-row" data-aos="fade-right" data-aos-duration="600" name="content-div">
                    
                    <div class="col-md-8 home-content-col">
                        <div class="home-content-box">
                            <h1>Conference management System</h1>
                            <p>From managing program committees to publishing proceedings,
                                our Eventia system has got you covered.
                                </p>
                        </div>
                    </div>
                    <div class="col-md-4 home-content-col home-img-col-right">
                        <div class="img-inverse-right">
                            <div class="home-content-box"  data-aos="fade-right" data-aos-duration="1500">
                                <img src="../images/home/search.png" height="520" width="500" />
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </body>
    <footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

    </footer>

    <script>
        AOS.init();
    </script>
</html>
