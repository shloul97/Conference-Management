<?php 
include '../userdata.php';
include '../header.php';

if(isset($_GET['cfpId'])){
    $cfp_id = $_GET['cfpId'];
    $cfp_info = getCfp($cfp_id);
    $conf_id = $cfp_info['conf_id'];
    $json = json_encode($cfp_info, JSON_PRETTY_PRINT);
    //var_dump($json);

    $superchair = false;

    if(isset($_SESSION['user_login'])){

        if(isset($_SESSION['user_role']) 
        && $_SESSION['user_role'] == 2 
        && $_SESSION['conf_id'] = $conf_id){
            $superchair = true;
        }
    }
    
}

?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        <!-- FONT AWESOME-->
        <script src="https://kit.fontawesome.com/ae8fff17f1.js" crossorigin="anonymous"></script>
        
        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">
        <link href="../CSS/confCfp.css" rel="stylesheet">
        
        

        <!-- JS FILES-->
        <script src="../JS/all.js"></script>
        <script src="../JS/cfpConf.js"></script>
        
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12" style="padding: 0;">
                <div class="row main-row">
                    <div class="col-md-12 cfp-ident-col" >
                        <div class="row">
                            <div class="col-md-4 cfp-ident">
                                <div class="cfp-img-div">
                                    <div class="cfp-img-div-sec">
                                        <img src="../images/cfp-test1.jpg"  class="cfp-img"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8" style="margin-top: 30px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1><?php echo $cfp_info['acronym'] ?></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="secondary"><?php echo $cfp_info['conf_name'] ?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="par-secondary"><?php echo $cfp_info['primary_area'] ?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="par-secondary"><?php echo $cfp_info['city'].', '.$cfp_info['country'].', '.$cfp_info['start_date'];  ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="row main-row">
                    <div class="col-md-12" style="padding: 0;">
                        <button class="btn btn-warning btn-addlist"><span style="margin-right: 10px;"><i class="fa-solid fa-plus"></i></span>Add To MyList</button>
                    </div>
                </div>

                <div class="row main-row">
                    <div class="col-md-12" style="margin-top: 20px;">
                        <table class="table table-bordered">
                            <tbody>
                                <tr><th style="width: 300px;">Conference website:</th><td><a href="<?php echo $cfp_info['web_page']; ?>" class="link">Click Here !</a></td></tr>
                                <tr><th>Submission Link:</th><td><a href="../submit_paper?confId=<?php echo $cfp_info['conf_id'];?>" class="link">Click Here !</a></td></tr>
                                <tr><th>Submission deadline: </th><td><span><?php echo $cfp_info['sub_deadline'];?></span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <?php
                
                if($superchair){
                    echo '
                    <div class="row main-row">
                        <div class="col-md-12" style="text-align: center;">
                            <a href="#" class="link" id="insert-section-btn"><span style="margin-right: 10px;"><i class="fa-solid fa-circle-plus"></i></span>Add New Section</a>
                        </div>
                    </div>
                    ';
                }
                ?>
                
                <!-- DECRIPTION ROW -->

                <?php 
                $desc = $cfp_info['desc'];

                for($i = 0 ;$i < count($desc); $i++){
                    echo '
                        <div class="row main-row" >
                        <div class="col-md-6" style="margin-top: 50px; padding: 20px;">
                            <div class="subject">
                                <h2>'.$desc[$i]['desc_key'].'</h2>
                            </div>
                            <hr>
                            <div class="content">
                                '.$desc[$i]['desc_val'].'
                            </div>
                            
                        </div>
                    </div>
                    <hr>
                    ';
                }
                    
                ?>
                <!-- FOR TESTING ONLY ------------------------------------------------------
                    <div class="row main-row" >
                    <div class="col-md-6" style="margin-top: 50px; padding: 20px;">
                        <div class="subject">
                            <h2>Description</h2>
                        </div>
                        <hr>
                        <div class="content">
                            <p>Join us at InnovateX Conference 2024, where visionaries, thought leaders, and industry experts converge to explore the cutting edge of innovation and shape the future. This dynamic two-day event is a unique opportunity to engage with the latest trends, collaborate with like-minded professionals, and gain invaluable insights to propel your organization forward.</p>
                            <h3>Key Highlights:</h3>
                            <ol>
                                <li><b>Inspiring Keynote Speakers:</b> Renowned experts from diverse industries will share their insights on emerging technologies, disruptive trends, and the strategies that drive success in today's fast-paced world.</li>
                                <li><b>Interactive Workshops:</b> Dive deep into hands-on workshops led by industry pioneers. Gain practical skills and actionable knowledge in areas such as artificial intelligence, blockchain, sustainability, and more.</li>
                                <li><b>Networking Opportunities:</b> Connect with professionals, entrepreneurs, and innovators during dedicated networking sessions. Forge new partnerships, exchange ideas, and build lasting relationships with individuals who share your passion for innovation.</li>
                                <li><b>Panel Discussions:</b> Engage in thought-provoking discussions led by panels of experts. Explore the challenges and opportunities presented by the latest advancements in technology, business, and society.</li>
                                <li><b>Tech Showcase:</b> Discover the latest products and services at our tech showcase, where leading companies and startups will exhibit their innovations. Experience firsthand the technologies that are shaping the future.</li>
                                <li><b>Start-Up Pitch Competition:</b> Witness the next generation of innovators as they pitch their groundbreaking ideas to a panel of industry judges. Cheer for your favorites and see who will be crowned the InnovateX Start-Up of the Year.</li>
                                <li><b>Global Perspectives:</b> Gain a global perspective on innovation with speakers and attendees from around the world. Learn how different regions are addressing common challenges and adapting to the rapidly changing landscape.</li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <hr>-->
                <!-- END DECRIPTION ROW -->

                <!-- END CONTENT COL-->
            </div>
        </div>


        <div class="overlay">

        </div>
        <?php if($superchair){
            echo'
                <div class="addSection">
                    <form action="#" method="POST" id="add-section-form">
                        <div class="success-div mb-3" id="success-insert" style="display:none;">
                            
                        </div>
                        <div style="text-align:right;">
                            <span style="padding: 15px;" id="close-insertion"><i class="fa-solid fa-xmark fa-2xl" style="color: #ff0000;"></i></span>
                        </div>
                        <input type="hidden" name="cfp-id" value="<?php echo $cfp_id; ?>" />
                        <div class="center">
                            <h1 class="h3 mb-3 fw-normal">Add New Description Section</h1>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="desc-key" class="form-control mb-2" id="desc-key" placeholder="">
                            <label for="desc-key">Description Key</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" name="desc-area" style="height: 200px;" class="form-control mb-2" id="desc-area" placeholder=""></textarea>
                            <label for="desc-area">Description:</label>
                        </div>
                        <div class="form-floating center">
                            <button type="submit" name="submit-btn" style="width: 50%;" class="btn btn-warning" id="desc-submit-btn" placeholder="">Submit</button>
                        </div>
                    </form>
                 </div>
            ';
        }
        ?>
        
    </body>


<footer class="text-center text-white" style="background-color: #0a4275;" id="footer">

</footer>
</html>