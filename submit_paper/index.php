<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['user_login'])){
    if(isset($_GET['confId'])){
        $conf_id = $_GET['confId'];
    
        $sql_tracks = "SELECT track_name,track_id FROM tracks where conf_id = $conf_id";
        $result_tracks = mysqli_query($db,$sql_tracks);
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

        <!-- CSS FILES-->
        <link href="../CSS/style.css" rel="stylesheet">

        <!-- JS FILES-->
        <script src="../JS/all.js"></script>
        <script src="../JS/submitPaper.js"></script>
        
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" style="padding-top: 12px;">
                        <div class="content-box" style="width: 100%;">
                            <form action="#" method="POST" id="sheet-form">
                                <div class="row">
                                    <?php echo '<input type="hidden" name="confId" value="'.$conf_id.'" />'; ?>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <b>Select Track</b>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <select name="track-select" class="form-control" required>
                                                    <option value="">Select Track</option>
                                                    <?php 
                                                    while($row_tracks = mysqli_fetch_assoc($result_tracks)){
                                                        echo '<option value="'.$row_tracks['track_id'].'">'.$row_tracks['track_name'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <h2>Authors:</h2>
                                            </div>
                                        </div>
                                        <!-- Author Area-->
                                        <div class="autors-div">
                                            <div class="content-box mb-2" style="width: 50%;">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input class="form-control" name="fname[]" id="fname" placeholder="First Name" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input class="form-control" name="lname[]" id="lname" placeholder="Last Name" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input class="form-control" name="email[]" id="email" placeholder="E-mail" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <select class="form-control" name="author-country[]" required>
                                                            <option value="">Select Country</option>
                                                            <option value="JO">Jordan</option>
                                                            <option value="EG">Egypt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input class="form-control" name="affiliation[]" id="affiliation" placeholder="affiliation" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input class="form-control" name="webpage[]" id="webpage" placeholder="Webpage" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Author Area -->
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <a class="btn" href="#" id="insert-author"><span style="margin-right: 10px;"><i class="fa-solid fa-circle-plus"></i></span>Insert New Author</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <b>Title & Abstract:</b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <input class="form-control" name="submissin-title" id="submissin-title" placeholder="Title" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <textarea class="form-control"  name="abstract" id="abstract" placeholder="Abstract" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <h2>Keywords:</h2><br>
                                                <span><b>Keywords Separated by comma (,),</b> You should specify at least three keywords</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <input type="text" class="form-control"  name="keywords" id="keywords" placeholder="Keywords" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <h2>Paper:</h2><br>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2">
                                                <label for="paper" class="form-label">The submission must be in PDF format (file extension *.pdf)</label>
                                                <input class="form-control form-control-lg" id="paper" type="file" name="paper" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <h4>Ready ?</h4>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-warning" style="width: 100%;">Submit</button>
                                            </div>
                                            <div class="col-md-2"></div>
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