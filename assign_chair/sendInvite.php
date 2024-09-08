<?php 

include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $track_id = $_POST['track'];

    $conf_id = $_SESSION['conf_id'];
    $userdata = getUserData();
    $confdata = getSelectedConf($conf_id);

    $username = $userdata['full_name'];

    $token = bin2hex(random_bytes(16));

    $subject = 'Lead the Way: Chair Role Invitation';

    $to = $email;

    $msg = '<!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #ffffff;
                padding: 20px;
                border: 1px solid #dddddd;
                border-radius: 5px;
            }
            .header {
                background-color: #F6BE00;
                color: black;
                padding: 10px 0;
                text-align: center;
                border-radius: 5px 5px 0 0;
            }
            .content {
                padding: 20px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                margin: 20px 0;
                background-color: #F6BE00;
                color: black;
                text-decoration: none;
                border-radius: 5px;
            }
            .footer {
                text-align: center;
                padding: 10px 0;
                color: #777777;
                font-size: 12px;
            }
            .header img {
                max-width: 150px;
                height: auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            
            <div class="header">     
                <h1>Invitation for Chair</h1>
            </div>
            <div class="content">
                <p>Dear ,</p>
                <p>We are delighted to extend an invitation for you to serve as the Chair for the upcoming <b>'.$confdata['acronym'].'</b>, which will be held on <b>'.$confdata['start_date'].'</b> at <b>'.$confdata['city'].' '.$confdata['country'].'</b>.</p>
                <h2>Position Details</h2>
                <p>Role: Chair</p>
                <p>Start Date: '.$confdata['start_date'].'</p>
                <p>Please click the button below to confirm your acceptance and start the onboarding process:</p>
                <a href="https://www.bee-conf.com/acceptance/index.php?token='.$token.'&invite=chair" class="button">Accept Offer</a>
                <p>If you have any questions, please feel free to reach out to us at <b>webmaste@bee-conf.com</b>.</p>
                <p>We look forward to welcoming you to the team!</p>
                <p>Best regards,</p>
                <p>'.$username.'</p>
                <p>Superchair</p>
                <p>'.$confdata['acronym'].'</p>
            </div>
            <div class="footer">
                <p>[Company Name] | [Company Address] | [Company Contact Information]</p>
            </div>
        </div>
    </body>
    </html>
    ';

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: Bee Conferences <webmaster@bee-conf.com>';

    	
	

    if(mail($to, $subject, $msg, implode("\r\n", $headers))){
        $sql_token = "INSERT INTO invite_token(token,conf_id,track_id,role_id,token_status) VALUES 
        (
            '$token',
            $conf_id,
            $track_id,
            3,
            1
        )";
        if(mysqli_query($db,$sql_token)){
            echo json_encode(array('status' => 1));
        }

    }


}
?>