<?php
include '../connection.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

function deleteMealType($conn, $id)
{
    $sql = "DELETE FROM `meal` WHERE (`meal_id` = '$id')";
    $result = mysqli_query($conn, $sql);
    if ($result)  echo "<script>alert('Okay! Succesfully Deleted Meal Type From System.')</script>";
}
function deleteMealItem($conn, $id)
{
    $sql = "DELETE FROM `meal` WHERE (`meal_id` = '$id')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Okay! Succesfully Deleted Meal Item From System.')</script>";
}
function addMealItem($conn)
{
    $mealName = $_POST['meal_name'];
    $mealPrice = $_POST['meal_price'];
    $mealType = $_POST['meal_type'];
    $sql = "INSERT INTO `meal`(`meal_name`,`meal_price`,`meal_type_id`)VALUES('$mealName','$mealPrice','$mealType')";
    $result = mysqli_query($conn, $sql);
    if ($result) echo "<script>alert('Okay! Succesfully Added Meal Item.')</script>";
    else {
        $err = mysqli_error_list($conn);
        if ($err[0]['errno'] == 1062) {
            echo "<script>alert('Duplicate entry given please correct it!')</script>";
            return;
        }
    }
}
function editMealItem($conn, $id)
{
    $mealName = $_POST['meal_name'];
    $mealPrice = $_POST['meal_price'];
    $mealType = $_POST['meal_type'];
    $sql = "UPDATE `meal` SET `meal_name` = '$mealName', `meal_price` = '$mealPrice',`meal_type_id` = '$mealType' WHERE `meal_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) echo "<script>alert('Okay! Succesfully Edited Meal Item.')</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['meals'] == 'Delete') {
        deleteMealItem($conn, $_POST['id']);
    } else if ($_POST['meals'] == 'Edit') {
        editMealItem($conn, $_POST['id']);
    } else if ($_POST['meals'] == 'Add') {
        addMealItem($conn);
    } else if ($_POST['meal_type'] == 'Delete') {
        deleteMealType($conn, $_POST['id']);
    }
    else if ($_POST['request'] == 'logout') {
        session_destroy();
        header("Location: login.php");
    }
}

if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
}

if ($_SESSION['staff_type_id'] == '2') {
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
                                <h5 class="card-title">Meals</h5>
                                <button type="button" class="btn btn-info meal_add">Add</button>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-hover mb-0" id="futureStaff">
                                        <thead>
                                            <tr>
                                                <th>Meal Name</th>
                                                <th>Meal Price</th>
                                                <th>Meal Type</th>
                                                <th>Edit/Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT m.meal_price,m.meal_id,m.meal_type_id,m.meal_name,mt.meal_type_name FROM meal m inner join meal_type mt on m.meal_type_id=mt.meal_type_id";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $data['meal_name'] ?></td>
                                                    <td><?php echo $data['meal_price'] ?></td>
                                                    <td><?php echo $data['meal_type_name'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" class="id" name="id" value="<?php echo $data['meal_id'] ?>">
                                                            <input type="hidden" class="meal_type_id" name="meal_type_id" value="<?php echo $data['meal_type_id'] ?>">
                                                            <input type="submit" class="btn btn-success meal_edit" name="request" value="Edit">
                                                            <input type="submit" class="btn btn-danger" name="meals" value="Delete">
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
                <div class="modal fade" id="meal-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Meals</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" action="">
                                    <input type="hidden" name="id" id="meal_id">
                                    <select name="meal_type" class="form-control" id="meal-type">
                                        <?php $sql = "SELECT * FROM meal_type;";
                                        $result = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?php echo $data['meal_type_id']; ?>"><?php echo $data['meal_type_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="text" class="form-control" id="meal_name" name="meal_name" placeholder="Enter Meal Name">
                                    <input type="number" class="form-control" id="meal_price" name="meal_price" placeholder="Enter Meal Price">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" name="meals" value="Edit">Save</button>
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
                                <h5 class="card-title">Meal Types</h5>
                                <!-- Table component -->
                                <div class="table-responsive">
                                    <table id="currentStaff" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Meal Type Name</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM meal_type;";
                                            $result = mysqli_query($conn, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $data['meal_type_name'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $data['meal_type_id'] ?>">
                                                            <input type="submit" class="btn btn-danger" name="meal_type" value="Delete">
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
<script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
<script src="../assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        $('#currentStaff').DataTable();
        $('#futureStaff').DataTable();
    });
    $('.meal_edit').on('click', (e) => {
        e.preventDefault();
        let tds = $(e.target).parent().parent().parent().children('td');
        let id = $(e.target).siblings('.id')[0];
        let meal_type_id = $(e.target).siblings('.meal_type_id')[0];
        meal_type_id = $(meal_type_id).val();
        $('#meal-modal #meal-type').val(meal_type_id).attr("selected", "selected");;
        $('#meal-modal #meal_id').val($(id).val());
        $('#meal-modal #meal_name').val(tds[0].textContent);
        $('#meal-modal #meal_price').val(tds[1].textContent);
        $('#meal-modal #meal_type').val(tds[2].textContent);
        $('#meal-modal .text-right button').attr('value', 'Edit');
        $('#meal-modal').modal('toggle');
    });
    $('.meal_add').on('click', (e) => {
        $('#meal-modal .text-right button').attr('value', 'Add');
        $('#meal-modal').modal('toggle');
    });
</script>

</html>