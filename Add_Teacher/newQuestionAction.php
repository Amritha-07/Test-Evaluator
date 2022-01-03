<?php
require("../config.php");
session_start();

if(!isset($_SESSION["tid"]) || !isset($_SESSION["tsid"])) {
	header("Location: ./teacherHome.php");
}

$conn = mysqli_connect($svr,$usr,$pwd,$db);

extract($_POST);
$tid=$_SESSION["tid"];
$tsid=$_SESSION["tsid"];

$sql = "INSERT INTO questions values (NULL, $tsid, $tid, '$question', '$answer')";

if($conn->query($sql)) {
	echo "New question created.<br>";
	echo "<a href='./manageTest.php'>Go back.</a>";
} 
else {
	echo "failed";
	$_SESSION["error"]="Something went wrong";
	header("Location: ./newQuestion.php");
}


$conn->close();
?>