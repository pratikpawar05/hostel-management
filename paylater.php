<?php
session_start();
include 'connection.php';
$cid=$_POST['cid'];
// echo "cid";
// echo $cid;
// $chin=$_POST['checkin'];
// // echo "checkin";
// // echo $chin;
// $d=date_create($chin);
// $chi=date_format($d,"Y-m-d");
// $b=date_format($d,"d");
// $chout=$_POST['checkout'];
// // echo "checkout";
// // echo $chout;
// $g=date_create($chout);
// $cho=date_format($g,"Y-m-d");
// $f= date_format($g,"d");
$type=$_POST['type'];
// echo "type";
// echo $type;
$no_of_rooms=$_POST['no_of_rooms'];
// echo "noofrooms";
// echo $no_of_rooms;
$total=$_POST['total'];
// echo "total";
// echo $total;
$no_of_adult=$_POST['no_of_adult'];
// echo "no_of_adult";
// echo $no_of_adult;
$no_of_child=$_POST['no_of_child'];
// echo "no_of_child";
// echo $no_of_child;
$bid=date("Hisdmy");
	$checkin=mysqli_real_escape_string($conn, htmlspecialchars($_POST['checkin']));
    $a=date_create($checkin);
    $chi=date_format($a,"Y-m-d 01:00:00");
  	$checkout=mysqli_real_escape_string($conn, htmlspecialchars($_POST['checkout']));
    $b=date_create($checkout);
    $cho=date_format($b,"Y-m-d");
    //$cho1 = date('Y-m-d', strtotime($cho .' -1 day'));
    //echo $cho1;
    //echo $cho;
  	// $type=mysqli_real_escape_string($conn, htmlspecialchars($_POST['type']));
   //  echo $type;
    $get_typeid= mysqli_query($conn,"SELECT `room_type_id` FROM `room_type` WHERE r_type_name='$type'");
    while($row1=mysqli_fetch_array($get_typeid))
     {
       $type_id=$row1['room_type_id'];
       // echo $type_id;
     }
  	 $get_data = mysqli_query($conn,"SELECT * FROM `rooms` where `ROOM_ID` NOT in (SELECT `ROOM_ID` FROM `bookings` WHERE ((B_CHECK_IN_DATE <= '$chi' AND B_CHECK_OUT_DATE <= '$cho') AND (B_CHECK_OUT_DATE >= '$chi' AND B_CHECK_OUT_DATE >= '$cho')) OR (B_CHECK_IN_DATE BETWEEN '$chi' AND '$cho' OR B_CHECK_OUT_DATE BETWEEN '$chi' AND '$cho')) AND ROOM_TYPE_ID='$type_id'");
    // $row=mysqli_fetch_array($get_data);
    //  print_r($get_data);
    //  while($row=mysqli_fetch_array($get_data))
    //  {
    //    print_r($row);
    //  }
  	 // print_r($get_data);
     if(mysqli_num_rows($get_data) > 0) {
      	while ($row = mysqli_fetch_assoc($get_data)) {
      		$i=1;
      		$rn=$row['ROOM_ID'];
      	$insert="INSERT INTO `bookings`(`B_ID`, `B_CHECK_IN_DATE`, `B_CHECK_OUT_DATE`, `NUM_OF_ADULT`, `NUM_OF_CHILD`, `C_ID`, `ROOM_ID`) VALUES ('$bid','$checkin','$checkout','$no_of_adult','$no_of_child','$cid','$rn')";
      	$sql_insert=mysqli_query($conn,$insert);
      	if($sql_insert)
      	{
      
?>
		<!DOCTYPE html>
<html lang="en">
<head>
  <title>Booking successfull</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row container-fluid">
<div class="col-md-8 container-fluid">
	<div class="alert alert-success" role="alert">
  <h4 class="alert-heading text-center">booking successful</h4>
</div>
<h2>BOOKING SUMARY:</h2>
  <table class="table table-bordered table-hover">
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
        <td><?php echo $rn;?></td>
      </tr>
      <tr>
        <td>Check In Date</td>
        <td><?php echo $checkin;?></td>
      </tr>
      <tr>
        <td>Check Out Date</td>
        <td><?php echo $checkout;?></td>
      </tr>
      <tr>
        <td>No of child</td>
        <td><?php echo $no_of_child;?></td>
      </tr>
      <tr>
        <td>No of adult</td>
        <td><?php echo $no_of_adult;?></td>
      </tr>
      <tr>
        <td>Room Type</td>
        <td><?php echo $type;?></td>
      </tr>
      <tr>
        <td>Total Payment</td>
        <td><?php echo $total;?></td>
      </tr>
      <tr>
        <td>Payment Status</td>
        <td>Unpaid</td>
      </tr>
    </tbody>
  </table>
  <a href="./" class="btn btn-danger">Back to Home</a>
  </div>
</div>

</body>
</html>

<?php
      		
      	}
      	else{
      		?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>connection error</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row container-fluid">
<div class="col-md-8 container-fluid">
	<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading text-center">Connection Error,Please try again later!</h4>
</div>
  <a href="./" class="btn btn-danger">Back to Home</a>
  </div>
</div>

</body>
</html>
<?php
      	}
      	if($i==1)
      	{
      		break;
      	}
      }
}
else
{
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
  <title>Room Unavailable</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <style type="text/css">
          .contain{
            margin-top: 10%;
          }
  </style>
</head>
<body>
<div class="row contain">
<div class="col-md-4 container-fluid ">   
      <center><img src="img/ta.png" width="70%" height="50%"></center>
      <br>
      <center><a href="./" class="btn btn-danger">Back to Home</a></center>
</div>	
</div>
</div>	
</body>
</html>
<?php
}


?>