<?php
include '../connection.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

function addFacility($conn)
{
    $facility_name = trim($_POST['facility-name']);

    $sql = "INSERT INTO `facility`(`facility_name`) VALUES ('$facility_name')";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Succesfully Added Facility In The System.')</script>";
    else {
        $err = mysqli_error_list($conn);
        if ($err[0]['errno'] == 1062) {
            echo "<script>alert('Duplicate entry given please correct it!')</script>";
            return;
        }
    }
}
function editFacility($conn, $id)
{
    $facility_name = trim($_POST['facility-name']);
    $sql = "UPDATE `facility` SET `facility_name`='$facility_name' WHERE `facility_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Succesfully Edited Facility From The System.')</script>";
    else print_r(mysqli_error_list($conn));
}
function deleteFacility($conn, $id)
{
    $sql = "DELETE FROM `facility` WHERE (`facility_id`= '$id')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Okay! Succesfully Deleted Facility From System.')</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['facility_delete']) {
        deleteFacility($conn, $_POST['facility_id']);
    } else if ($_POST['edit_facility']) {
        editFacility($conn, $_POST['facility_id']);
    } else if ($_POST['add_facility']) {
        addFacility($conn);
    } else if ($_POST['facility_assigned_delete']) {
        $facility_assigned_id = $_POST['facility-assigned-id'];
        $sql = "DELETE FROM `facility-room` WHERE `id`='$facility_assigned_id'";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Okay! Succesfully Deleted Facilities Of Room From System.')</script>";
    } else if ($_POST['request'] == 'logout') {
        session_destroy();
        header("Location: login.php");
    }
}
if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
}
if ($_SESSION['staff_type_id'] == '3') {
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
                                <h5 class="card-title">Facilities</h5>
                                <button type="button" class="btn btn-info facility_add">Add</button>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0" id="futureStaff">
                                        <thead>
                                            <tr>
                                                <th>Facility Name</th>
                                                <th>Assign To Rooms</th>
                                                <th>Edit/Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT * FROM facility";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $data['facility_name'] ?></td>
                                                    <td>
                                                        <a href="./facilityassign.php?facility_id=<?php echo $data['facility_id'] ?>" class="btn btn-info">Assign</a>
                                                    </td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" class="facility_id" name="facility_id" value="<?php echo $data['facility_id'] ?>">
                                                            <input type="submit" class="btn btn-success facility_edit" value="Edit">
                                                            <input type="submit" class="btn btn-danger" name="facility_delete" value="Delete">
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
                <!-- Modal -->
                <div class="modal fade" id="facility-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Facility</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" action="">
                                    <input type="hidden" name="facility_id" id="facility_id">
                                    <input type="text" class="form-control" name="facility-name" id="facility-name" placeholder="Enter Facility Name">

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" name="edit_facility" value="edit">Save</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal ends-->
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Facilities Assigned</h5>
                                <!-- <button type="button" class="btn btn-info room_type_add">Add</button> -->
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table id="currentStaff" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Facility Name</th>
                                                <th>Room No</th>
                                                <th>Room Level</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT fr.id,rooms.room_id,rooms.room_level,facility.facility_name FROM `facility-room` AS fr INNER JOIN facility ON fr.facility_id = facility.facility_id INNER JOIN rooms ON fr.room_id = rooms.room_id";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td> <?php echo $data['facility_name']; ?> </td>
                                                    <td> <?php echo $data['room_id']; ?> </td>
                                                    <td> <?php echo $data['room_level']; ?> </td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" class="facility-assigned-id" name="facility-assigned-id" value="<?php echo $data['id'] ?>">
                                                            <input type="submit" class="btn btn-danger" name="facility_assigned_delete" value="Delete">
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
                <!-- Modal -->
                <div class="modal fade" id="facility-assigned-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Facilities Assigned</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" action="">
                                    <input type="hidden" class="facility_id" name="facility_id">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" name="add" value="Save">Save</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal ends-->
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
<script>
    $(document).ready(function() {
        $('#currentStaff').DataTable();
        $('#futureStaff').DataTable();
    });

    $('.facility_edit').on('click', (e) => {
        e.preventDefault();
        let tds = $(e.target).parent().parent().parent().children('td');
        $('#facility-modal #facility-name').val(tds[0].textContent);
        let id = $(e.target).siblings('.facility_id')[0];
        $("#facility-modal #facility_id").val($(id).val());
        $('#facility-modal .text-right button').attr('name', 'edit_facility');
        $('#facility-modal').modal('toggle');
    });

    $('.facility_add').on('click', (e) => {
        e.preventDefault();
        $('#facility-modal #facility-name').val('');
        $('#facility-modal .text-right button').attr('name', 'add_facility');
        $('#facility-modal').modal('toggle');
    });

    $('.facility_assigned').on('click', (e) => {
        e.preventDefault();
        // $('#facility-assigned-modal #r_type_name').removeAttr('readonly');
        // $('#facility-assigned-modal .text-right button').attr('name', 'facility_assigned');
        $('#facility-assigned-modal').modal('toggle');
    })
</script>

</html>