<?php
include '../connection.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
}
$facility_id = $_GET['facility_id'];

if ($_SESSION['staff_type_id'] == '3' || $_SESSION['staff_type_id'] == '9' || $facility_id == null) {
    header("Location: admin.php");
}


$sql = "SELECT * FROM facility where facility_id='$facility_id'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 0) {
    header("Location: admin.php");
}

$facility = mysqli_fetch_assoc($result);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['Assign']) {
        $rooms = $_POST["rooms"];
        $sql = "";
        foreach ($rooms as $key => $room_id) {
            $sql .= "INSERT INTO `facility-room` (`facility_id`,`room_id`) VALUES ('$facility_id','$room_id');";
        }
        if (mysqli_multi_query($conn, $sql)) {
            echo "<script>alert('New facilities assigned to roooms successfully.')</script>";
            echo "<script>window.location.href = 'facilities.php'</script>";
        } else {
            echo "<script>alert(Error while inserting a records!)";
        }
    } else if ($_POST['request'] == 'logout') {
        session_destroy();
        header("Location: login.php");
    }
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
    <style>
        .main-panel{
            height: 100%;
        }
        #facility-name,#rooms,#submit{
            font-size: 18px;
        }
        form{
            font-size: 20px;
        }
    </style>
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
                                <h5 class="card-title">Facilty Assignment</h5>
                                <form action="" method="POST">
                                    <input type="hidden" name="facility_id" value="<?php echo $facility['facility_id'] ?>">
                                    <div class="form-group">
                                        <label for="facility-name" class="form-input">Facility Name</label>
                                        <input type="text" class="form-control"  id="facility-name" value="<?php echo $facility['facility_name'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="rooms">Rooms</label>
                                        <select multiple class="form-control" id="rooms" name="rooms[]">
                                            <?php
                                            $sql = "SELECT * FROM rooms WHERE ROOM_ID NOT IN (SELECT  room_id FROM `facility-room` WHERE facility_id = '$facility_id')";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $data['ROOM_ID'] ?>"><?php echo $data['ROOM_ID'] . " - " . $data['ROOM_LEVEL'] ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control" id="submit" value="Submit" name="Assign">
                                    </div>
                                </form>
                            </div>
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
<script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

</html>