<?php
include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $c_f_name = $_POST['f_name'];
    $sql = "SELECT * FROM clients WHERE email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $date = date("Y-m-d");
        $sql = "UPDATE clients set c_f_name='$c_f_name' where email='" . $_SESSION['email'] . "'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Wow! User Profile Updation Completed.')</script>";
            // header("Location: index.php");
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }
}
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

$sql = "SELECT * FROM clients WHERE c_e_mail='" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moris Hostel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


</head>

<body style="background-color: #a5a4a42e;">
    <div class="container row justify-content-md-center">
        <div class="col-md-8" style="background-color: #fff;">
            <h2 class="">Profile</h2>
            <form action="" method="POST">
                <div class="col-12">
                    <div class="form-group">
                        <label for="uname">Name <sup class="red">*</sup></label>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Name" value="<?php echo $row['c_f_name']; ?>" required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <div class="controls">
                            <label for="email">E-mail <sup class="red">*</sup></label>
                            <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $row['c_e_mail']; ?>" readonly required>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-between">
                    <span><sup class="red">*</sup> <b>Note:</b> Required</span>
                    <input type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</body>
<html>