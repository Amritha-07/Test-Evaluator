<html>
<head>
	<title>TEACHER HOME</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
    	.jumbotron {
    		background-color: #f4511e;
    		color: #fff;
    		font-family: Algerian;
    		padding: 30px;
  		}
    </style>
</head>
<?php
require("../config.php");
session_start();

if(!isset($_SESSION["tid"])) {
	header("Location: ./teacherLogin.php");
}

$conn = mysqli_connect($svr,$usr,$pwd,$db);

extract($_POST);
$tid=$_SESSION["tid"];

$sql = "INSERT INTO tests values (NULL, '$testname', $tid)";

if($conn->query($sql)) {
	echo "<div class='jumbotron text-center'><h1>New Test Created</h1></div>";
	echo "<a href='./teacherHome.php'>TEACHER HOME</a>";
} 
else {
	echo "failed";
	$_SESSION["error"]="Something went wrong";
	header("Location: ./newTest.php");
}


$conn->close();
?>