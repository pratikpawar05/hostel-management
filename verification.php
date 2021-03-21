<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
function OtpGenerator()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $otp = '';
    for ($i = 0; $i < 5; $i++) {
        $otp .= $characters[rand(0, strlen($characters))];
    }
    return $otp;
}

if (isset($_SESSION['email'])) {
    header("Location: user.php");
}
if (!$_GET['email']) {
    header("Location: registration.php");
}
function sendMail($email, $otp)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username   = "morishostel@gmail.com";
    $mail->Password   = "MorisHostel01";
    //Set who the message is to be sent from
    $mail->From = "icanpratikpawar@gmail.com";
    //From email address and name
    $mail->FromName = "Moris Hostel";
    //Set who the message is to be sent to
    $mail->addAddress($email);
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    //Set the subject line
    $mail->Subject = "MorisHostel Email Verification";
    $mail->Body = "<p>otp for verification:</p><i> $otp </i>";
    $mail->AltBody = "This is the plain text version of the email content";
    try {
        $mail->send();
        echo "<script>alert('Sent the otp succesfully.')</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error=> $mail->ErrorInfo')</script>";
    }
}
function otpVerified($conn, $sql)
{
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Successfully verified");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    }
}
function verifyOtp($conn, $email, $otp)
{
    $sql = "SELECT * FROM clients WHERE c_e_mail='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['c_otp_verification_status'] == '1') {
            header("Location: login.php");
        }
        if ($otp == $row['c_otp']) {
            $sql = "UPDATE `clients` SET `c_otp_verification_status` = '1' WHERE c_e_mail='$email'";
            otpVerified($conn, $sql);
        } else {
            echo "<script>alert('Woops! Otp Didnt Match Try Again.')</script>";
        }
    } else {
        header("Location: registration.php");
    }
}
$email = $_GET['email'];
// validate verification.php
$sql = "SELECT * FROM clients WHERE c_e_mail='$email'";
$result = mysqli_query($conn, $sql);
// validation on registration
if ($result->num_rows == 0) {
    header("Location: registration.php");
} else {
    $status = mysqli_fetch_assoc($result)['c_otp_verification_status'];
    if ($status == '1') header("Location: login.php");
}
// ends validate verification.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['request']) {
        case "Submit":
            verifyOtp($conn, $email, $_POST['otp']);
            break;
        case "Resend":
            $email = $_POST['email'];
            $otp = OtpGenerator();
            $sql = "UPDATE `clients` SET `c_otp` = '$otp' WHERE c_e_mail='$email'";
            mysqli_query($conn, $sql);
            sendMail($email, $otp);
            break;
        default:
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Verification</title>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center container">

            <div class="card py-5 px-3">
                <div class="card-title">
                    <p class="login-text" style="font-size: 2rem; font-weight: 800;">User Verification</p>
                </div>
                <div class="card-body">
                    <span class="mobile-text">Enter the code we just send on your Email address <b class="text-danger"><?php echo $_GET['email'] ?></b></span>
                    <form action="" method="post">
                        <div class="d-flex flex-row mt-5"><input type="text" name="otp" class="form-control"></div>
                        <input type="submit" name="request" value="Submit" class="d-flex flex-row btn btn-info">
                    </form>
                    <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span>
                        <form action="" method="post">
                            <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
                            <input type="submit" class="font-weight-bold text-danger cursor form-control btn" name="request" value="Resend">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>