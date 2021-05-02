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
$bid=$_GET['bid'];
//echo $bid;

if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
}
if ($_SESSION['staff_type_id'] != '1' && $_SESSION['staff_type_id'] != '2' ) {
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">BOOKING SUMARY:</h5>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0" id="bookings">
                                        <?php
                                        $sql="SELECT b.B_CHECK_IN_DATE,b.B_CHECK_OUT_DATE,b.NUM_OF_ADULT,b.NUM_OF_CHILD,b.ROOM_ID,P.PAYMENT_ID,P.PAYMENT_STATUS,p.PAYMENT_AMOUNT FROM `bookings` AS b INNER JOIN `payment` AS p ON b.B_ID=p.B_ID Where b.B_ID='$bid'";
                                            $result=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_array($result);
                                        ?>
                                        <thead>
                                      <tr>
                                        <th>field name</th>
                                        <th>field value</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Booking Id</td>
                                        <td><?php echo $bid;?></td>
                                      </tr>
                                      <tr>
                                        <td>Room Id</td>
                                        <td><?php echo $row['ROOM_ID'];?></td>
                                      </tr>
                                      <tr>
                                        <td>Check In Date</td>
                                        <td><?php echo $row['B_CHECK_IN_DATE'];?></td>
                                      </tr>
                                      <tr>
                                        <td>Check Out Date</td>
                                        <td><?php echo $row['B_CHECK_OUT_DATE'];?></td>
                                      </tr>
                                      <tr>
                                        <td>No of child</td>
                                        <td><?php echo $row['NUM_OF_CHILD'];?></td>
                                      </tr>
                                      <tr>
                                        <td>No of adult</td>
                                        <td><?php echo $row['NUM_OF_ADULT'];?></td>
                                      </tr>
                                      <tr>
                                        <td>Total Payment</td>
                                        <td><?php echo $row['PAYMENT_AMOUNT'];?></td>
                                      </tr>
                                      <tr>
                                        <td>Payment Id</td>
                                        <td><?php echo $row['PAYMENT_ID'];?></td>
                                      </tr>
                                      <tr>
                                        <td>Payment Status</td>
                                        <td><?php echo $row['PAYMENT_STATUS'];?></td>
                                      </tr>
                                    </tbody>
                                    </table>
                                    <ul class="pagination pagination-rounded justify-content-end mb-0 mt-2">
                                    </ul>
                                </div>
                                <!-- Table component end -->
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
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