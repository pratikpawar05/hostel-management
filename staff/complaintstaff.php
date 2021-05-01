<?php
include '../connection.php';
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');
session_start();
function removeStaff($conn)
{
    $email = $_POST['email'];
    $sql = "DELETE FROM `staffs` WHERE (`s_e_mail`= '$email')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Okay! Succesfully Removed New Staff.')</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['request']) {
        case 'logout':
            session_destroy();
            header("Location: login.php");
            break;
        case 'Accept':
            $email = trim($_POST['email']);
            echo $email;
            $sql = "UPDATE `staffs` SET `s_status` = '1' WHERE (`s_e_mail`= '$email')";
            $result = mysqli_query($conn, $sql);
            print_r($result);
            break;
        case 'Decline':
            removeStaff($conn);
            break;
        case 'Remove':
            removeStaff($conn);
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Room Staff Approval</h5>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0" id="futureStaff">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Request</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT * FROM staffs inner join staff_type on staffs.s_type_id=staff_type.s_type_id where staffs.s_type_id='9' and staffs.s_status='0'";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $data['s_f_name'] ?></td>
                                                    <td><?php echo $data['s_l_name'] ?></td>
                                                    <td><?php echo $data['s_e_mail'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="email" value="<?php echo $data['s_e_mail'] ?>">
                                                            <input type="submit" class="btn btn-success" name="request" value="Accept">
                                                        </form>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="email" value="<?php echo $data['s_e_mail'] ?>">
                                                            <input type="submit" class="btn btn-danger" name="request" value="Decline">
                                                        </form>
                                                    </td>
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
                </div> <!-- end col -->
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All Room Staff</h5>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table id="currentStaff" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Joined Date</th>
                                                <th>Remove Staff</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM staffs inner join staff_type on staffs.s_type_id=staff_type.s_type_id where staffs.s_type_id='9' and staffs.s_status='1'";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $data['s_f_name'] ?></td>
                                                    <td><?php echo $data['s_l_name'] ?></td>
                                                    <td><?php echo $data['s_e_mail'] ?></td>
                                                    <td><?php echo $data['s_created_at'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="email" value="<?php echo $data['s_e_mail'] ?>">
                                                            <input type="submit" class="btn btn-danger" name="request" value="Remove">
                                                        </form>
                                                    </td>
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
        $('#currentStaff').DataTable();
        $('#futureStaff').DataTable();
    });
</script>

</html>