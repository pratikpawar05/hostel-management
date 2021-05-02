<?php
include '../connection.php';
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');
session_start();
$semail=$_SESSION['staff'];
$sql_staff="SELECT `s_id` FROM `staffs` WHERE s_e_mail='$semail'";
$result_staff=mysqli_query($conn,$sql_staff);
$staff_id=mysqli_fetch_assoc($result_staff);
$staff=$staff_id['s_id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['request']) {
        case 'logout':
            session_destroy();
            header("Location: login.php");
            break;
        default:
            # code...
            break;
    }
}
if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
}
if ($_SESSION['staff_type_id'] != '1') {
    header("Location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moris Hostel</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="wrapper ">
        <?php include_once '../partials/sidebar.php' ?>
        <div class="main-panel">
            <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Report geneation</h5>
              </div>
              <div class="card-body">
                <form action="reportgenerationdetails.php" method="POST">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="check-date">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="" id="start_date" name="start_date" required>
                            </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="check-date">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="" id="end_date" name="end_date" required>
                            </div>
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="update ml-auto mr-auto">
                      <input type="submit" name="request" value="Genrate Report" class="btn btn-primary btn-round">
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
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        $('#bookings').DataTable();
    });
</script>

</html>