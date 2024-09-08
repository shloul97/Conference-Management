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

        <!-- CSS FILES -->
        <link href="../CSS/style.css" rel="stylesheet">

        <!-- JS FILES -->
        <script src="../JS/all.js"></script>
        <script src="../JS/cfps.js"></script>
        
    </head>

    <header class="p-3" id="header">
        <?php echo get_header(); ?>
    </header>

    <body>
        <div class="row main-row">
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-12" style="margin-top: 30px;">
                        <div class="row">
                            <!-- TABLE 1 START-->
                            <div class="col-md-2"></div>
                            <div class="col-md-8 search-tbody" style="padding-top: 12px;">
                                <form action="#" method="post" id="search-form">
                                    <table class="table table-borderless ">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;" colspan="3"><h2>CFP Filter</h2></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control mb-2" name="conf-name" id="conf-name" placeholder="Conference Name" />
                                                </td>
                                                <td>
                                                    <select class="form-control mb-3" name="country" id="select-country">
                                                        <option value="">Select Country</option>
                                                        <option value="IN">India</option>
                                                        <option value="US">United States</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="EG">Egypt</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control mb-3" name="major" id="major">
                                                        <?php
                                                        $sql_major = "SELECT primary_area from conference group by primary_area";
                                                        $result_major = mysqli_query($db,$sql_major);
                                                        echo '<option value="">Select Major</option>';
                                                        while($row_major = mysqli_fetch_assoc($result_major)){
                                                            echo '<option value="'.$row_major['primary_area'].'">'.$row_major['primary_area'].'</option>';
                                                        }
                                                        ?>
                                                       
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: center;">
                                                    <button type="submit" class="btn btn-warning" style="width: 50%;">Apply Filter</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="col-md-2"></div>
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
                                    <!--<tr style="text-align: center;" >
                                        <th colspan="6" class="cfp-table">
                                            <h2>CFP</h2>
                                        </th>
                                    </tr>-->
                                    <tr class="cfp-header">
                                        <th>Acronym</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Submission deadline</th>
                                        <th>Start date</th>
                                        <th>Topics</th>
                                    </tr>
                                </thead>
                                <tbody id="table-cfp">
                                  
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