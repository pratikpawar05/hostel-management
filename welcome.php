<?php

include 'connection.php';
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
    session_destroy();
    header("Location: index.php");
}
if (!isset($_SESSION['email'])) {
    unset($_SESSION['email']);
    header("Location: index.php");
}

$sql = "SELECT name FROM users WHERE email='" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
echo "Welcome, " . $row['name'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>

</head>

<body>
    <form action="" method="POST" class="login-email">
        <button name="submit" class="btn">Logout</button>
    </form>
</body>

</html>