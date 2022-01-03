<?php
require("../config.php");
session_start();

if(!isset($_SESSION["tid"])) {
	header("Location: ./teacherLogin.php");
}

$tid = $_SESSION["tid"];
$conn = mysqli_connect($svr,$usr,$pwd,$db);

if(isset($_SESSION["tsid"]) && !isset($_POST["selectedTest"])) {
	$tsid = $_SESSION["tsid"];
} else {
	$testname = $_POST["selectedTest"];
	$result = mysqli_query($conn, "SELECT * FROM tests WHERE testname='$testname'");
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	$tsid = $row["tsid"];
	$_SESSION["tsid"]=$tsid;
}



$result = mysqli_query($conn, "SELECT * FROM tests WHERE tsid=$tsid");
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
echo "Test name: ".$row["testname"];

echo "<h1>Test questions</h1>";
$result = mysqli_query($conn, "SELECT * FROM questions WHERE tsid=$tsid");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "<table border=5>";
foreach($rows as $row) {
	echo 
		"<tr>".
			"<td>".$row["question"]."</td>".
			"<td>".$row["answer"]."</td>".
		"</tr>";
}
echo "</table>";

//ToDo disp tests;

echo "<a href='./newQuestion.php'>Add new question</a><br><br>";
echo "<a href='./teacherHome.php'>Home</a>";


$conn->close();

?>