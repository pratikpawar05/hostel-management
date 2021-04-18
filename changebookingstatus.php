<?php
include 'connection.php';
$date=date('Y-m-d H:i:s');
//echo $date;
$sql="UPDATE `bookings` SET `status`='completed' WHERE B_CHECK_OUT_DATE<'$date' AND status='pending'";
if(mysqli_query($conn,$sql))
{
	echo "status channged successfully";
}
else{
	echo "something went wrong";
}
?>