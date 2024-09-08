<?php
include '../userdata.php';
include '../header.php';




if(isset($_SESSION['user_login'])){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2){
        $conf_id = $_SESSION['conf_id'];
        $confArr = getSelectedConf($conf_id);
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

        <meta charset="UTF-8">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/ae8fff17f1.js" crossorigin="anonymous"></script>
        
        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">

        <!-- JS FILES -->
        <script src="../JS/all.js"></script>
        <script src="../JS/createCFP.js"></script>


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
                    <div class="col-md-12" style="padding-top: 12px;">
                        <div class="content-box" style="width: 100%;">
                            <form action="#" method="POST" id="cfp-create">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="success-div mb-3" style="display:none;">
                                            <span id="success-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <?php
                                                                    //var_dump($confArr);
                                                                    $conf_title = $confArr['conf_name'];
                                                                    $conf_acronym = $confArr['acronym'];
                                                                    echo '
                                                                    <h2>'.$conf_acronym.'</h2
                                                                    <h4>'.$conf_title.'</h4>
                                                                    ';
                                                                
                                                                ?>
                                                            
                                                    </div>
                                                </div>
                                                <!--<div class="row">
                                                    <div class="col-md=12">
                                                        <div class="form-floating">
                                                            <select name="conf-select" id="conf-select" class="form-control">
                                                                <option value=""></option>
                                                                

                                                            </select>
                                                            <label for="conf-select">Select:</label> 
                                                        </div>
                                                    </div>
                                                </div>-->
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <h2>Topics:</h2>
                                            </div>
                                        </div>
                                        <div id="topic-div">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <input class="form-control" name="topics[]" input-id="topics" placeholder="Topic"  />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <input class="form-control" name="topics[]" input-id="topics" placeholder="Topic" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <input class="form-control" name="topics[]" input-id="topics" placeholder="Topic" />
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <a class="btn "  id="addT"><span style="margin-right: 10px;"><i class="fa-solid fa-circle-plus"></i></span>Insert topic</a>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <b>Description about your conference:</b>
                                            </div>
                                        </div>
                                        <div id="desc-div">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <input class="form-control" name="section-title[]" input-id="topics" id="section-title" placeholder="Section Title" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <textarea class="form-control " style="height: 185px;" name="desc-area[]" input-id="topics" id="desc-area" placeholder="Description" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <a class="btn "  id="addD"><span style="margin-right: 10px;"><i class="fa-solid fa-circle-plus"></i></span>Add New Description Section</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row" style="text-align: center;">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-warning " id="topic-submit" style="width: 50%;" >Create CFP</button>
                                            </div>
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