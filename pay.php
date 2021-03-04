<?php
session_start();
include 'connection.php';
include 'razorpay/Razorpay.php';

use Razorpay\Api\Api;
//  curl -u rzp_test_UuqopNwEkHsRf5:jjpRUMAWVRjuOeNABjbKUPSN \-X POST https://api.razorpay.com/v1/payment_links/ \-H 'Content-type: application/json' \-d '{  "amount": 1000,  "currency": "INR",  "accept_partial": true,  "first_min_partial_amount": 100,  "expire_by": 1691097057,  "reference_id": "TS1989",  "description": "Payment for policy no #23456",  "customer": {    "name": "Gaurav Kumar",    "contact": "+919999999999",    "email": "gaurav.kumar@example.com"  },  "notify": {    "sms": true,    "email": true  },  "reminder_enable": true,  "notes": {    "policy_name": "Jeevan Bima"  },  "callback_url": "https://example-callback-url.com/",  "callback_method": "get"}'
//  curl -u rzp_test_UuqopNwEkHsRf5:jjpRUMAWVRjuOeNABjbKUPSN \
// -X POST https://api.razorpay.com/v1/invoices/ \
// -H 'Content-type: application/json' \
// -d '{
//   "customer": {
//     "name": "vinayakgodse",
//     "email": "vinayakgodse@gmail.com",
//     "contact": "7028589303"
//   },
//   "type": "link",
//   "view_less": 1,
//   "amount": 1000,
//   "currency": "INR",
//   "description": "Payment Link for this purpose - cvb.",
//   "receipt": "10000",
//   "reminder_enable": true,
//   "sms_notify": 1,
//   "email_notify": 1,
//   "expire_by": 1793630556,
//   "callback_url": "https://example-callback-url.com/",
//   "callback_method": "get"
// }'
$cid=$_POST['cid'];
$type=$_POST['type'];
$no_of_rooms=$_POST['no_of_rooms'];
$total=$_POST['total'];
$no_of_adult=$_POST['no_of_adult'];
$no_of_child=$_POST['no_of_child'];
$checkin=$_POST['checkin'];
$checkout=$_POST['checkout'];
    
$keyId='rzp_test_UuqopNwEkHsRf5';
$secretKey='jjpRUMAWVRjuOeNABjbKUPSN';
$api=new Api($keyId,$secretKey);

$Customer_Name=$_POST['name'];
$Customer_Email=$_POST['email'];
$Customer_ContactNo=$_POST['mobile'];
$PAY_AMT=$total*100;

$order  = $api->order->create(array(
  'receipt'         => rand(1000,9999).'ORD',
  'amount'          => $PAY_AMT,
  'payment_capture' =>  1,
  'currency'        => 'INR',
)
);
?>
<meta name="viewport" charset="width=device-width">
<form action="success.php" method="POST"> 
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId ?>" // Enter the Key ID generated from the Dashboard
    data-amount="<?php echo $order->amount; ?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    data-currency="INR"
    data-order_id="<?php echo $order->id; ?>"//This is a sample Order ID. Pass the `id` obtained in the response of the previous step.
    data-buttontext="Pay Now"
    data-name="Sona Hostel"
    data-description="For payment"
    data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT09ayt6ooaKk7qpmM6tpHvP7E_-9ENyH1s-g&usqp=CAU"
    data-prefill.name="<?php echo $Customer_Name; ?>"
    data-prefill.email="<?php echo $Customer_Email; ?>"
    data-prefill.contact="<?php echo $Customer_ContactNo; ?>"
    data-theme.color="#f77a14"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
<input type="text" name="cid" value="<?php echo $cid;?>" hidden>
<input type="text" name="type" value="<?php echo $type;?>" hidden>
<input type="text" name="no_of_rooms" value="<?php echo $no_of_rooms;?>" hidden>
<input type="text" name="total" value="<?php echo $total;?>" hidden>
<input type="text" name="no_of_adult" value="<?php echo $no_of_adult;?>" hidden>
<input type="text" name="no_of_child" value="<?php echo $no_of_child;?>" hidden>
<input type="text" name="checkin" value="<?php echo $checkin;?>" hidden>
<input type="text" name="checkout" value="<?php echo $checkout;?>" hidden>
</form>
<script >
	document.getElementsByClassName('razorpay-payment-button')[0].click();
	document.getElementsByClassName('razorpay-payment-button')[0].style.display="none";

</script>