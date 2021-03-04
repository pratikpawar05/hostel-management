<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Sona Template">
	<meta name="keywords" content="Sona, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Moris Hostel</title>

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


</head>

<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->



	<!-- Header Section Begin -->
	<header class="header-section">
		<div class="top-nav">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<ul class="tn-left">
							<li><i class="fa fa-phone"></i> (230) 57928496 </li>
							<li><i class="fa fa-envelope"></i> info.morishostel@gmail.com</li>
						</ul>
					</div>
					<div class="col-lg-6">
						<div class="tn-right">
							<div class="top-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-tripadvisor"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</div>
							<a href="#" class="bk-btn">Booking Now</a>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-item">
			<div class="">
				<div class="row">
					<div class="col-lg-2">
						<div class="logo">
							<a href="./index.php">
								<img src="img/logo.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="nav-menu">
							<nav class="mainmenu">
								<ul>

									<li><a href="./rooms.php">Rooms</a></li>

									<li> <a href="./pages.html">Pages</a>
										<ul class="dropdown">
											<li><a href="./room-details.html">Room Details</a></li>
											<li><a href="./blog-details.html">Blog Details</a></li>
											<li><a href="#">Family Room</a></li>
											<li><a href="#">Premium Room</a></li>
										</ul>
									</li>
									<li><a href="./about-us.html">About Us</a></li>
									<li><a href="./contact.html">Contact</a></li>
									<?php
									if (isset($_SESSION['email'])) {
										$sql = "SELECT c_f_name,c_l_name FROM clients WHERE c_e_mail='" . $_SESSION['email'] . "'";
										$result = mysqli_query($conn, $sql);
										$row = mysqli_fetch_assoc($result);
										echo "<li><a href='user.php'>Welcome, " . $row['c_f_name'] . " " . $row['c_l_name'] . "</a></li>";
										echo "<li><form action='' method='POST'>";
										echo "<button type='submit' class='btn btn-danger'>Logout</button>";
										echo "</form></li>";
									} else {
										echo "<li><a href='registration.php'>Register Now</a></li>";
										echo "<li><a href='login.php'>Sign in</a></li>";
									} ?>
								</ul>
							</nav>
							<div class="nav-right search-switch">
								<i class="icon_search"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header End -->