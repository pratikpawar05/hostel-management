<?php
include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
function updateProfile($conn)
{
  $type_of_registration = $_POST['type_of_registration'];
  $first_name = $_POST['f_name'];
  $last_name = $_POST['l_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  // $password = md5($_POST['password']);
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $postal_code = $_POST['postal_code'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  // $nic = $_POST['nic'];
  $date = date("Y-m-d");
  $sql = "UPDATE clients SET `c_type`='$type_of_registration',`c_f_name`='$first_name', `c_l_name`='$last_name',`c_address`='$address',`c_gender`='$gender',`c_mobile`='$mobile',`c_city`='$city',`c_postal_code`='$postal_code',`c_country`='$country' where `c_e_mail`='$email'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script>alert('Wow! User Profile Updation Completed.')</script>";
  } else {
    echo "<script>alert('Woops! Something Wrong Went.')</script>";
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  switch ($_POST['request']) {
    case 'logout':
      # code...
      session_destroy();
      header("Location: index.php");
      break;
    case 'Update Profile':
      # code...
      updateProfile($conn);
      break;
    default:
      # code...
      break;
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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
            <?php echo $row['c_f_name']." ".$row['c_l_name']; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <!-- <li>
            <a href="./dashboard.html">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li> -->
          <li class="">
            <a href="./index.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="">
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="">
            <form action="" method="post">
              <input type="submit" class="form-control" name="request" value="logout">
            </form>
          </li>
        </ul>
      </div>
    </div>
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
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button> -->
          <!-- <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div> -->
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="./assets/img/damir-bosnjak.jpg" alt="...">
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
                        <label>Type of Registration</label>
                        <select id="type_of_registration" name="type_of_registration" class="form-control custom-select bg-white border-left-0 border-md select-box">
                          <option value="">Enter Type Of Registration</option>
                          <option value="Student" <?php if ($row['c_type'] == "Student") {
                                                    echo "Selected";
                                                  } ?>>Student</option>
                          <option value="International" <?php if ($row['c_type'] == "International") {
                                                          echo "Selected";
                                                        } ?>>International</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['c_e_mail']; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label for="">Gender</label>
                        <select id="gender" name="gender" class="form-control custom-select bg-white border-left-0 border-md select-box">
                          <option value="">Enter Gender</option>
                          <option value="Male" <?php if ($row['c_gender'] == "Male") {
                                                  echo "Selected";
                                                } ?>>Male</option>
                          <option value="Female" <?php if ($row['c_gender'] == "Female") {
                                                    echo "Selected";
                                                  } ?>>Female</option>
                          <option value="Transgender" <?php if ($row['c_gender'] == "Transgender") {
                                                        echo "Selected";
                                                      } ?>>Transgender</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control" placeholder="Company" value="<?php echo $row['c_f_name']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control" placeholder="Last Name" value="<?php echo $row['c_l_name']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>DOB </label>
                        <input type="text" class="form-control" value="<?php echo $row['c_dob']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Mobile </label>
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile No" value="<?php echo $row['c_mobile']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Nic </label>
                        <input type="number" name="nic" class="form-control" placeholder="NIC" value="<?php echo $row['c_nic']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Home Address" value="<?php echo $row['c_address']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $row['c_city']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $row['c_country']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" value="<?php echo $row['c_postal_code']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <input type="submit" name="request" value="Update Profile" class="btn btn-primary btn-round">
                      <!-- <button type="submit"  class="btn btn-primary btn-round">Update Profile</button> -->
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
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
</body>

</html>