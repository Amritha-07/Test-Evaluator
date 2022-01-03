<html>
<head>
	<title>TEACHER REGISTER</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
</html>
<?php
require('../config.php');
session_start();

$conn = new mysqli($svr, $usr, $pwd, $db);
extract($_POST);

$uname = stripslashes($uname);
$password = stripslashes($password);
$uname = mysqli_real_escape_string($conn, $uname);
$password = mysqli_real_escape_string($conn, $password);

$sql = "select tid from teachers where username='$uname' and password='$password'";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

//If username and password exist in our database then create a session.
//Otherwise echo error.

if(mysqli_num_rows($result)==1) {

	$_SESSION['tid'] = $row["tid"]; // Initializing Session
	header("location: teacherHome.php"); // Redirecting To Other Page

} else {
	$_SESSION["error"]="<h3 font-family='Haettenschweiler'>USERNAME OR PASSWORD IS WRONG!</h3>";
	header("location: ./teacherLogin.php");
}


$conn->close();
?>

<html>
<head>
	<title>TEACHER LOGIN</title>
</head>
</html>

