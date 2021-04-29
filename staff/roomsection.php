<?php
include '../connection.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

function editRoomType($conn, $id)
{
    $room_desc = $_POST['room_desc'];
    $r_type_name = $_POST['r_type_name'];
    $room_size = $_POST['room_size'];
    $max_occupancy = $_POST['max_occupancy'];
    $daily_rate = $_POST['daily_rate'];
    $monthly_rate = $daily_rate * 28;
    $no_of_beds = $_POST['no_of_beds'];
    $sql = "UPDATE `room_type` SET `room_size` = '$room_size',`room_desc` = \"$room_desc\" ,`no_of_beds` = '$no_of_beds', `max_occupancy` = '$max_occupancy',`daily_rate` = '$daily_rate',`r_type_name` = '$r_type_name',`monthly_rate` = '$monthly_rate' WHERE `room_type_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Okay! Succesfully Edited Room Type From System.')</script>";
    else echo "<script>alert('Internal Error Occured!')</script>";
}
function addRoomType($conn)
{
    $room_desc = $_POST['room_desc'];
    $r_type_name = trim($_POST['r_type_name']);
    $room_size = $_POST['room_size'];
    $max_occupancy = $_POST['max_occupancy'];
    $daily_rate = $_POST['daily_rate'];
    $monthly_rate = $daily_rate * 28;
    $no_of_beds = $_POST['no_of_beds'];

    $sql = "INSERT INTO `room_type`(`room_size`,`no_of_beds`,`max_occupancy`,`daily_rate`,`room_desc`,`r_type_name`,`monthly_rate`) VALUES ('$room_size','$no_of_beds','$max_occupancy','$daily_rate','$room_desc','$r_type_name','$monthly_rate')";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Okay! Succesfully Added Room Type From System.')</script>";
    else {
        $err = mysqli_error_list($conn);
        if ($err[0]['errno'] == 1062) {
            echo "<script>alert('Duplicate entry given please correct it!')</script>";
            return;
        }
    }
}
function deleteRoomType($conn, $id)
{
    $sql = "DELETE FROM `room_type` WHERE (`room_type_id`= '$id')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Okay! Succesfully Deleted Room Type From System.')</script>";
}
function addRoom($conn)
{
    $room_level= $_POST['room-level'];
    $room_status = $_POST['room-status'];
    $room_type_id = $_POST['room-type-id'];
    $sql = "INSERT INTO `rooms`(`ROOM_LEVEL`,`ROOM_STATUS`,`ROOM_TYPE_ID`)VALUES('$room_level','$room_status','$room_type_id')";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Okay! Succesfully Added Room.')</script>";
    else echo "<script>alert('Internal Error Occured!')</script>";
}

function editRoom($conn, $id)
{
    $room_status = $_POST['room-status'];
    $room_type_id = $_POST['room-type-id'];
    $room_id = $_POST['room_id'];
    $sql = "UPDATE `rooms` SET `ROOM_STATUS`='$room_status',`ROOM_TYPE_ID`='$room_type_id' WHERE ROOM_ID='$room_id'";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Okay! Succesfully Updated Room Status.')</script>";
    else print_r(mysqli_error_list($conn));
}
function deleteRoom($conn, $id)
{
    $sql = "DELETE FROM `rooms` WHERE (`ROOM_ID`= '$id')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Okay! Succesfully Deleted Room From System.')</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['room'] == 'Delete') {
        deleteRoom($conn, $_POST['room_id']);
    } else if ($_POST['room_type'] == 'Delete') {
        deleteRoomType($conn, $_POST['room_type_id']);
    } else if ($_POST['edit_room_type']) {
        // print_r($_POST);
        editRoomType($conn, $_POST['room_type_id']);
    } else if ($_POST['add_room_type']) {
        // print_r($_POST);
        addRoomType($conn);
    } else if ($_POST['edit_room']) {
        editRoom($conn, $_POST['room_id']);
    } else if ($_POST['add_room']) {
        addRoom($conn);
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
                                <h5 class="card-title">Rooms</h5>
                                <button type="button" class="btn btn-info room_add">Add</button>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0" id="futureStaff">
                                        <thead>
                                            <tr>
                                                <th>Room Level</th>
                                                <th>Room Status</th>
                                                <th>Room Type</th>
                                                <th>Edit/Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT * FROM rooms r inner join room_type rt on r.room_type_id=rt.room_type_id;";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                   <td><?php echo $data['ROOM_LEVEL'] ?></td>
                                                   <td><?php echo $data['ROOM_STATUS'] ?></td>
                                                   <td room_type="<?php echo $data['room_type_id'] ?>"><?php echo $data['r_type_name'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" class="room_id" name="room_id" value="<?php echo $data['ROOM_ID'] ?>">
                                                            <input type="submit" class="btn btn-success room_edit" value="Edit">
                                                            <!-- <input type="submit" class="btn btn-danger" name="room" value="Delete"> -->
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
                <div class="modal fade" id="room-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Room</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" action="">
                                    <input type="hidden" name="room_id" id="room_id">
                                    <input type="hidden" required class="form-control" name="room-level" id="room-level" placeholder="Enter Room Level">
                                    <select name="room-status" class="form-control" id="room-status">
                                        <option value="Not Available">Not Available</option>
                                        <option value="Available">Available</option>
                                    </select>
                                    <select name="room-type-id" class="form-control" id="room-type">
                                        <?php $sql = "SELECT * FROM room_type;";
                                        $result = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?php echo $data['room_type_id'] ?>"><?php echo $data['r_type_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" name="edit_room" value="edit">Save</button>
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
                                <h5 class="card-title">Room Types</h5>
                                <button type="button" class="btn btn-info room_type_add">Add</button>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table id="currentStaff" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Room Type Name</th>
                                                <th>Room Description</th>
                                                <th>Room Size</th>
                                                <th>Max Occupancy</th>
                                                <th>Number Of Beds</th>
                                                <th>Daily Rate</th>
                                                <th>Monthly Rate</th>
                                                <th>Edit/Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM room_type;";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $data['r_type_name'] ?></td>
                                                    <td><?php echo $data['room_desc'] ?></td>
                                                    <td><?php echo $data['room_size'] ?></td>
                                                    <td><?php echo $data['max_occupancy'] ?></td>
                                                    <td><?php echo $data['no_of_beds'] ?></td>
                                                    <td><?php echo $data['daily_rate'] ?></td>
                                                    <td><?php echo $data['monthly_rate'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" class="room_type_id" name="room_type_id" value="<?php echo $data['room_type_id'] ?>">
                                                            <input type="submit" class="btn btn-success room_type_edit" name="room_type" value="Edit">
                                                            <input type="submit" class="btn btn-danger" name="room_type" value="Delete">
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
                <div class="modal fade" id="room-type-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Room Types</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" action="">
                                    <input type="hidden" required class="room_type_id" name="room_type_id">
                                    <input type="text" required class="form-control" id="r_type_name" name="r_type_name" placeholder="Enter Room Type Name" readonly>
                                    <input type="text" required class="form-control" id="room_desc" name="room_desc" placeholder="Enter Room Description">
                                    <input type="text" required class="form-control" id="room_size" name="room_size" placeholder="Enter Room Size">
                                    <input type="number" required class="form-control" id="max_occupancy" name="max_occupancy" placeholder="Enter Max Occupancy">
                                    <input type="number" required class="form-control" id="no_of_beds" name="no_of_beds" placeholder="Enter No Of Beds">
                                    <input type="number" required class="form-control" id="daily_rate" name="daily_rate" placeholder="Enter Daily Rate Of Room">
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

    $('.room_edit').on('click', (e) => {
        e.preventDefault();
        let tds = $(e.target).parent().parent().parent().children('td');
        $('#room-modal #room-level').attr('type', 'hidden');
        let id = $(e.target).siblings('.room_id')[0];
        $("#room-modal #room_id").val($(id).val());
        $("#room-modal #room-status").val(tds[1].textContent).attr("selected", "selected");
        $('#room-modal #room-type').val(tds[2].attributes.room_type.value);
        $('#room-modal .text-right button').attr('name', 'edit_room');
        $('#room-modal').modal('toggle');
        // $('#room-modal #room-level').val(tds[0].textContent);
    });
    $('.room_add').on('click', (e) => {
        e.preventDefault();
        $('#room-modal #room-level').attr('type', 'text');
        $('#room-modal .text-right button').attr('name', 'add_room');
        $('#room-modal').modal('toggle');
    });
    $('.room_type_edit').on('click', (e) => {
        e.preventDefault();
        let tds = $(e.target).parent().parent().parent().children('td');
        let id = $(e.target).siblings('.room_type_id')[0];
        $('#room-type-modal .room_type_id').val($(id).val());
        $('#room-type-modal #r_type_name').val(tds[0].textContent);
        $('#room-type-modal #room_desc').val(tds[1].textContent);
        $('#room-type-modal #room_size').val(tds[2].textContent);
        $('#room-type-modal #max_occupancy').val(tds[3].textContent);
        $('#room-type-modal #no_of_beds').val(tds[4].textContent);
        $('#room-type-modal #daily_rate').val(tds[5].textContent);
        $('#room-type-modal .text-right button').attr('name', 'edit_room_type');
        $('#room-type-modal').modal('toggle');
    });
    $('.room_type_add').on('click', (e) => {
        e.preventDefault();
        $('#room-type-modal .room_type_id').val("");
        $('#room-type-modal #r_type_name').val("");
        $('#room-type-modal #room_desc').val("");
        $('#room-type-modal #room_size').val("");
        $('#room-type-modal #max_occupancy').val("");
        $('#room-type-modal #no_of_beds').val("");
        $('#room-type-modal #daily_rate').val("");
        $('#room-type-modal #r_type_name').removeAttr('readonly');
        $('#room-type-modal .text-right button').attr('name', 'add_room_type');
        $('#room-type-modal').modal('toggle');
    })
</script>

</html>