<html>
<head>
	<title>STUDENT HOME</title>
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
</html>
<?php
require("../config.php");
session_start();

if(!isset($_SESSION["sid"])) {
	header("Location: ./studentLogin.php");
}
$conn = mysqli_connect($svr,$usr,$pwd,$db);
$sid=$_SESSION["sid"];
extract($_SESSION);

$result = mysqli_query($conn,"SELECT * FROM students WHERE sid='$sid'");
$rows=mysqli_fetch_array($result, MYSQLI_ASSOC);
echo "<div class='jumbotron text-center'><h1>Welcome</h1>"."<h4>".$rows["username"]."</h4></div>";

echo "<h4>Your Marks</h4>";
$result = mysqli_query($conn,"SELECT * FROM tests");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "<ol class='list-group'>";
foreach($rows as $row) {
	echo "<li class='list-group-item' onclick='manageTest(this)'>".$row["testname"]."</li>";
}
echo "</ol>";
?>

<a href="studentHome.php">STUDENT HOME</a>
<html>
<body>
<form method="POST" action="testMarks.php">
<input type='hidden' name='selectedTest' id='selectedTest' value='' />
<input type='submit' style='display: none;' id='submitButton'/>
</form>
<script>

var manageTest = function(e) {
	var selectedTest = $(e).text();
	$('#selectedTest').val(selectedTest);
	//$('#selectedTest').submit();
	$("#submitButton").click();
};

</script>
</body>
</html>