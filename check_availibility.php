<?php
include 'connect.php';
$date=date("Y-m-d");
// PHP code to find the number of days 
// between two given dates 
  
// Function to find the difference  
// between two dates. 
function dateDiffInDays($date1, $date2)  
{ 
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 
  
// Start date 
$date1 = $_POST['checkin']; 
  
// End date 
$date2 = $_POST['checkout']; 
  
// Function call to find date difference 
$dateDiff = dateDiffInDays($date1, $date2); 
//echo $dateDiff;
  if($_POST['checkin']<$_POST['checkout']&&$_POST['checkin']>=$date&&$_POST['no_of_rooms']>0)
  {
  	$checkin=mysqli_real_escape_string($conn, htmlspecialchars($_POST['checkin']));
    $a=date_create($checkin);
    $chi=date_format($a,"Y-m-d 01:00:00");
  	$checkout=mysqli_real_escape_string($conn, htmlspecialchars($_POST['checkout']));
    $b=date_create($checkout);
    $cho=date_format($b,"Y-m-d");
    //$cho1 = date('Y-m-d', strtotime($cho .' -1 day'));
    //echo $cho1;
    //echo $cho;
  	$type=mysqli_real_escape_string($conn, htmlspecialchars($_POST['type']));
  	$no_of_rooms=mysqli_real_escape_string($conn, htmlspecialchars($_POST['no_of_rooms']));
  	 $get_data = mysqli_query($conn,"SELECT * FROM `rooms52` where `room_no` NOT in (SELECT `room_no` FROM `booking` WHERE ((checkin_date <= '$chi' AND checkin_date <= '$cho') AND (checkout_date >= '$chi' AND checkout_date >= '$cho')) OR (checkin_date BETWEEN '$chi' AND '$cho' OR checkout_date BETWEEN '$chi' AND '$cho')) AND type='$type'");
  	if(mysqli_num_rows($get_data) > 0) {
      if(mysqli_num_rows($get_data) >= $no_of_rooms){
       $get_prize= mysqli_query($conn,"SELECT `price`FROM `rooms52` WHERE `type`='$type' LIMIT 1");
       while ($row = mysqli_fetch_assoc($get_prize)) {
          $price=$row['price'];
          //echo $rn;
          //echo $price;
          
        }
        $total=$price*$dateDiff*$no_of_rooms;
        //echo $total;
        $pri=$price*$dateDiff;
    }
}
  }
?>