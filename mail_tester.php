<?php
session_start();
include("include/config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["req_code"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'shankar.ve007@gmail.com';
    $mail->Password = 'xngivbzpabnojuah'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('shankar.ve007@gmail.com');

    $mail->addAddress($_POST["req_email"]);

    $mail->isHTML(true);

    $email = $_POST['req_email'];

    $_SESSION['req_email'] = $email;
    
    $query_req = "select * from user_details where email = '$email'";
    $res = mysqli_query($conn, $query_req);

    if (mysqli_num_rows($res) > 0){
        $rand_code_gen = rand(100000, 1000000);
        $_SESSION['random_code_gen'] = $rand_code_gen;
        $mail->Subject = "AQUA - Password reset verification code";
        $mail->Body = "The verification code is: ".$rand_code_gen;

        $mail->send();

        header("Location: sf-forgot-password-code.php");
    }

    else {
        echo '<script type="text/javascript">';
        echo 'window.addEventListener("load", () => {swal({ title: "Error!", text: "Account not registered with the university!", type: "error", confirmButtonText: "Okay" }, function(){window.location.replace("sf-forgot-password-email-details.php")})})';
        echo '</script>';
    }
}

?>
<html>
    <head>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    </head>
</html>