<html>
<head>
	<title>STUDENT MARKS</title>
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
  		table, td{
			border: 2px solid black;
			padding: 15px;
			margin-top: 15px;
			margin-left: 15px
		}
    </style>
</head>
</html>

<?php
require("../config.php");
session_start();

if(!isset($_SESSION["sid"])) {
	header("Location: ./studentLogin.php");
}

$sid = $_SESSION["sid"];
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
echo "<div class='jumbotron text-center'><h1>Test ".$row["testname"]."</h1></div>";
$result = mysqli_query($conn, "SELECT * FROM questions WHERE tsid=$tsid");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($rows as $row) {
	$question=$row["question"];
	$qid=$row["qid"];
	$sql = "SELECT score FROM answers WHERE sid=$sid and qid=$qid";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	$score = $row["score"];
	echo "<table class='table-hover'><tr>";
	echo "<td>".$question."</td>";
	echo "<td>".$score."</td>";
	echo "</tr></table";
}
?>

<html>
<head>
</head>
<body>
	<a href="studentHome.php">STUDENT HOME</a>
	<a href="Marks.php">MARKS PAGE</a>
</body>
</html>





