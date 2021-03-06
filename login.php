<?php

include 'connection.php';
session_start();
error_reporting(1);

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM clients WHERE c_e_mail='$email' AND c_password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		if ($row['c_otp_verification_status'] == '1') {
			$_SESSION['email'] = $row['c_e_mail'];
		} else {
			echo "<script>if (window.confirm('Please confirm to verify the email first & then login.')){window.location.href='verification.php?email=$email';}</script>";
		}
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login Form</title>
</head>

<body>
	<div class="row">
		<div class="containers col-md-6 container-fluid">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				</div>
				<div class="input-group">
					<button name="submit" class="btn">Login</button>
				</div>
				<p class="login-register-text">Don't have an account? <a href="registration.php">Register Here</a>.</p>
			</form>
		</div>
	</div>
</body>

</html>