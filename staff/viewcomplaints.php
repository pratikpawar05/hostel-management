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
function removeStaff($conn)
{
    $email = $_POST['email'];
    $sql = "DELETE FROM `hostel_management`.`staffs` WHERE (`s_e_mail`= '$email')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Okay! Succesfully Removed New Staff.')</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['request']) {
        case 'logout':
            session_destroy();
            header("Location: login.php");
            break;
        case 'Completed':
            $cid = $_POST['cid'];
            $sid = $staff;
            //echo $email;
            $sql = "UPDATE `complaints` SET `status` = 'completed',`Staff_Id`='$sid' WHERE (`Complaint_Id`= '$cid')";
            $result = mysqli_query($conn, $sql);
            print_r($result);
            break;
        default:
            # code...
            break;
    }
}
if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
}
if ($_SESSION['staff_type_id'] != '9') {
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
                                <h5 class="card-title">Complaints</h5>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0" id="pendingcomplaints">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Complaint DESC</th>
                                                <th>Complaint Type</th>
                                                <th>Complaint Date</th>
                                                <th>Update Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT * FROM `complaints` where status='pending'";
                                            $result = mysqli_query($conn, $sql);
                                            $i=1;
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <th><?php echo $i;?></th>
                                                    <td><?php echo $data['Complaint_Desc'] ?></td>
                                                    <td><?php echo $data['Complaint_type'] ?></td>
                                                    <td><?php echo $data['Complaint_date'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="cid" value="<?php echo $data['Complaint_Id'] ?>">
                                                            <input type="submit" class="btn btn-success" name="request" value="Completed">
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php 
                                            $i++;
                                        } ?>
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
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All Resolved Complaints</h5>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table id="completedcomplaints" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Complaint DESC</th>
                                                <th>Complaint Type</th>
                                                <th>Complaint Date</th>
                                                <th>Staff_Id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `complaints` where status='completed'";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <th><?php echo $i;?></th>
                                                    <td><?php echo $data['Complaint_Desc'] ?></td>
                                                    <td><?php echo $data['Complaint_type'] ?></td>
                                                    <td><?php echo $data['Complaint_date'] ?></td>
                                                    <td><?php echo $data['Staff_Id'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <ul class="pagination pagination-rounded justify-content-end mb-0 mt-2">
                                    </ul>
                                </div>
                                <!-- Table component end -->
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
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
        $('#pendingcomplaints').DataTable();
        $('#completedcomplaints').DataTable();
    });
</script>

</html>