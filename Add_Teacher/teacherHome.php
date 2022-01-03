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
</html>
<?php
require("../config.php");
session_start();

if(!isset($_SESSION["tid"])) {
	header("Location: ./teacherLogin.php");
}

$conn = mysqli_connect($svr,$usr,$pwd,$db);

extract($_SESSION);

$result = mysqli_query($conn,"SELECT * FROM teachers WHERE tid='$tid'");
$rows=mysqli_fetch_array($result, MYSQLI_ASSOC);
echo "<div class='jumbotron text-center'><h1>Welcome</h1>"."<h4>".$rows["username"]."</h4></div>";

echo "<h4>Your tests</h4>";
$result = mysqli_query($conn,"SELECT * FROM tests WHERE tid=$tid");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "<ol class='list-group'>";
foreach($rows as $row) {
	echo "<li class='list-group-item' onclick='manageTest(this)'>".$row["testname"]."</li>";
}
echo "</ol>";

//ToDo disp tests;

echo "<a href='./newTest.php'>CREATE NEW TEST</a>";


$conn->close();

?>
<html>
<head>
	<script src="../js/jquery-3.1.1.js"></script>
</head>
<body>

<form method="POST" action="manageTest.php">
<input type='hidden' name='selectedTest' id='selectedTest' value='' />
<input type='submit' style='display: none;' id='submitButton'/>
</form>
<a href="redirect.php">HOME</a>

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