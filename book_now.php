<?php
session_start();
include 'connection.php';
$l_name=$_POST['name'];
// echo "name";
// echo $l_name;
$email=$_POST['email'];
// echo "email";
// echo $email;
$mobile=$_POST['mobile'];
// echo "mobile";
// echo $mobile;
$cid=$_POST['cid'];
// echo "cid";
// echo $cid;
$chin=$_POST['checkin'];
// echo "checkin";
// echo $chin;
$chout=$_POST['checkout'];
// echo "checkout";
// echo $chout;
$type=$_POST['type'];
// echo "type";
// echo $type;
$no_of_rooms=$_POST['no_of_rooms'];
// echo "noofrooms";
// echo $no_of_rooms;
$total=$_POST['total'];
// echo "total";
// echo $total;
$days=$_POST['days'];
$child=$_POST['child'];
$adults=$_POST['adults']
?>

<?php include_once './partials/header.php' ?>
<style>
body{
overflow-x: hidden;
}
</style>
	<!-- Hero Section Begin -->
	<section class="hero-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="hero-text">
						<h1>Sona A Luxury Hotel</h1>
						<p>Here are the best hotel booking sites, including recommendations for international
							travel and for finding low-priced hotel rooms.</p>
						<a href="#" class="primary-btn">Discover Now</a>
					</div>
				</div>
				
			</div>
		</div>
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
			<div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
			<div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
		</div>
	</section>
    <div class="col-xl-7 col-lg-9 ">
					<div class="booking-form">
						<h3>Booking Your Hotel</h3>
						<form action="check_availibility.php" method="POST" id="bookingform">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="check-date">
								<label for="name">Name</label>
								<input type="text" class="" id="name" name="name" value="<?php echo $l_name;?>" readonly>
							</div>
                        </div>
                        <div class="col-md-6">
                            <div class="check-date">
								<label for="name">Mobile</label>
								<input type="number" class="" id="name" name="name" value="<?php echo $mobile;?>" readonly>
							</div>
                        </div>
                        </div>
                            <div class="check-date">
								<label for="name">Email</label>
								<input type="email" class="" id="email" name="email" value="<?php echo $email?>" readonly>
							</div>
                            <div class="row">
                            <div class="col-md-6">
							<div class="check-date">
								<label for="checkin_date">Check In:</label>
								<input type="date" class="" id="checkin_date" name="checkin" value="<?php echo $chin?>" readonly>
							</div>
                            </div>
                            <div class="col-md-6">
							<div class="check-date">
								<label for="checkout_date">Check Out:</label>
								<input type="date" class="" id="checkout_date" name="checkout" value="<?php echo $chout?>" readonly>
							</div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                             <div class="select-option">
                                <label for="no_of_child">No Of Child:</label>
                                <input type="number" name="no_of_child" id="no_of_child" value="<?php echo $child; ?>"class="form-control" readonly>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="select-option">
                                <label for="no_of_adult">No Of Adult:</label>
                                <input type="number" name="no_of_adult" id="no_of_adult" value="<?php echo $adults; ?>"class="form-control" readonly>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
							<div class="select-option">
								<label for="types">TYPES:</label>
                                <?php
                                $type_sql="SELECT `r_type_name` FROM `room_type` WHERE `room_type_id`=".$type;
								$type_result= mysqli_query($conn, $type_sql);
                                $row=mysqli_fetch_array($type_result);
                                ?>
								<input type="text" name="type" id="type"  value="<?php echo $row['r_type_name'] ;?>" class="form-control" readonly>
							</div>
                            </div>
                            <div class="col-md-6">
							<div class="select-option">
								<label for="room">Room:</label>
								<input type="number" name="no_of_rooms" id="rooms" value="<?php echo $no_of_rooms; ?>"class="form-control" readonly>
							</div>
                            </div>
                            </div>
                            <div class="select-option">
								<label for="room">Total Payment:</label>
								<input type="number" name="total" id="total" value="<?php echo $total;?>"class="form-control" readonly>
							</div>
                            <input type="number" name="cid" id="cid" value="<?php echo $cid;?>"class="form-control" hidden>
							<a class="btn btn-warning" id="pay_now" style="color:white" onclick="paynow();">Pay Now</a>
                            <a class="btn btn-primary"  id="pay_later" style="color:white" onclick="paylater();">Pay At Counter</a>

						</form>
					</div>
				</div>

<?php include_once('partials/footer.php') ?>

<!-- Search model Begin -->
<!-- <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div> -->
<!-- Search model end -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script>
function paylater() {
    document.getElementById("bookingform").action="paylater.php";
    document.getElementById("bookingform").submit();
  }
  function paynow() {
    document.getElementById("bookingform").action="paynow.php";
    document.getElementById("bookingform").submit();
  }
</script>
</body>

</html>