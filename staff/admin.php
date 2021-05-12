<?php
include '../connection.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

function updateProfile($conn)
{
    # code...
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];

    $sql = "UPDATE staffs SET `s_f_name`='$first_name', `s_l_name`='$last_name' where `s_e_mail`='$email'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Wow! User Profile Updation Completed.')</script>";
    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }
}
function changePassword($conn)
{
    if ($_POST['password'] != $_POST['confirmpassword']) {
        echo "<script>alert('Password & Confirm Password Didnt Match.');</script>";
        echo "<script>window.location.href ='admin.php'</script>";
    }
    // if(strlen($_POST['password'])<8){
    //     echo "<script>alert('Password Length is too small. Minimum 5 characters');</script>";
    //     echo "<script>window.location.href ='admin.php'</script>";
    // }
    $email = $_SESSION['staff'];
    $password = md5($_POST['password']);
    $sql = "UPDATE staffs SET `s_password`='$password' where `s_e_mail`='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Wow! Password Changed.')</script>";
    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['request']) {
        case 'logout':
            session_destroy();
            header("Location: login.php");
            break;
        case 'Update Profile':
            updateProfile($conn);
            break;
        case 'Change Password':
            changePassword($conn);
            break;
        default:
            break;
    }
}
if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Morris Hostel
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <style>
        form i {
            cursor: pointer;
            margin-left: -30px;
            margin-top: 10px;
        }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <?php include_once '../partials/sidebar.php' ?>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Moris Hostel</a>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="../assets/img/damir-bosnjak.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="./assets/img/mike.jpg" alt="...">
                                        <h5 class="title">Chet Faker</h5>
                                    </a>
                                    <p class="description">
                                        @chetfaker
                                    </p>
                                </div>
                                <p class="description text-center">
                                    "I like the way you work it <br>
                                    No diggity <br>
                                    I wanna bag it up"
                                </p>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="button-container">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                            <h5>12<br><small>Files</small></h5>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                            <h5>2GB<br><small>Used</small></h5>
                                        </div>
                                        <div class="col-lg-3 mr-auto">
                                            <h5>24,6$<br><small>Spent</small></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row">

                                        <div class="col-md-5 px-1">
                                            <div class="form-group">
                                                <label>Position</label>
                                                <input type="text" class="form-control" value="<?php echo $row['s_type_name']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['s_e_mail']; ?>" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="f_name" class="form-control" placeholder="Company" value="<?php echo $row['s_f_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="l_name" class="form-control" placeholder="Last Name" value="<?php echo $row['s_l_name']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="update ml-auto mr-auto">
                                            <input type="submit" name="request" value="Update Profile" class="btn btn-primary btn-round">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title">Change Password</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-12 pl-1">
                                            <div class="form-group" style="display: flex;">
                                                <input type="password" id="password" name="password" class="form-control togglePassword" placeholder="Enter New Password!">
                                                <i class="far fa-eye" id="togglePassword"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pl-1">
                                            <div class="form-group" style="display: flex;">
                                                <input type="password" id="confirmPassword" name="confirmpassword" class="form-control" placeholder="Confirm New Password!">
                                                <i class="far fa-eye" id="toggleConfirmPassword"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="update ml-auto mr-auto">
                                            <input type="submit" name="request" value="Change Password" class="btn btn-primary btn-round">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');

        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const confirmPassword = document.querySelector('#confirmPassword');
        toggleConfirmPassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>