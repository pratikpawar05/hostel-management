<?php

include_once 'connection.php';
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
	$type_of_registration = $_POST['type_of_registration'];
	$first_name = $_POST['f_name'];
	$last_name = $_POST['l_name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = md5($_POST['password']);
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$postal_code = $_POST['postal_code'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$nic = $_POST['nic'];
	$dob = $_POST['dob'];
	$date = date("Y-m-d");

	$sql = "SELECT * FROM clients WHERE c_e_mail='$email'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows==0) {
		
		$sql = "INSERT INTO clients (c_type,c_f_name, c_l_name,c_e_mail, c_password,c_address,c_gender,c_mobile,c_city,c_postal_code,c_country,c_dob,c_nic,c_created_at)
					VALUES ('$type_of_registration','$first_name','$last_name', '$email', '$password','$address ','$gender','$mobile','$city','$postal_code','$country','$dob','$nic','$date')";
		// print_r($sql);
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Wow! User Registration Completed.')</script>";
			$_SESSION['email'] = $email;
			// header("Location: login.php");
		} else {
			echo "<script>alert('Woops! Something Wrong Went.')</script>";
		}
	} else {
		echo "<script>alert('Woops! Email Already Exists.')</script>";
	}
}
if (isset($_SESSION['email'])) {
	header("Location: user.php");
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="css/flaticon.css" type="text/css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Registration</title>
</head>

<body>
	<div class="container">
		<div class="row" style="padding-left: 200px;padding-right: 200px;;">
			<div class="containers">
				<form action="" method="POST" class="login-email">
					<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" placeholder="First Name" name="f_name" value="" required pattern="[a-zA-Z]+" title="Please Enter First Name In Correct Format">
							</div>
							<div class="input-group">
								<input type="text" placeholder="Last Name" name="l_name" value="" required  pattern="[a-zA-Z]+" title="Please Enter Last Name In Correct Format">
							</div>
							<div class="input-group">
								<select id="type_of_registration" name="type_of_registration" class="form-control custom-select bg-white border-left-0 border-md select-box">
									<option value="">Enter Type Of Registration</option>
									<option value="Student">Student</option>
									<option value="International">International</option>
								</select>
							</div>
							<div class="input-group">
								<input type="text" placeholder="Enter Country" name="country" value="" required>
							</div>
							<div class="input-group">
								<input type="number" placeholder="Enter Mobile" name="mobile" value="" required>
							</div>
							<div class="input-group">
								<input type="date" placeholder="Enter DOB" name="dob" value="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<input type="email" placeholder="Email" name="email" value="" required>
							</div>
							<div class="input-group">
								<input type="password" placeholder="Password" name="password" value="" required>
							</div>
							<div class="input-group">
								<input type="text" placeholder="Enter NIC" name="nic" required pattern="[\w]{1,14}"  title="Please Enter NIC Upto 14 Digits Only">
							</div>
							<div class="input-group">
								<input type="number" placeholder="Enter Postal Code" name="postal_code" required>
							</div>
							<div class="input-group">
								<input type="text" placeholder="Enter City" name="city" value="" required>
							</div>
							<div class="input-group">
								<select id="gender" name="gender" class="form-control custom-select bg-white border-left-0 border-md select-box">
									<option value="">Enter Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Transgender">Transgender</option>
								</select>
							</div>

						</div>
						<div class="input-group">
								<input type="text" placeholder="Enter Address" name="address" value="" required>
							</div>
						<div class="input-group">
							<button name="submit" class="btn">Register</button>
						</div>
						<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
					</div>
				</form>
			</div>

		</div>
	</div>
</body>

</html>