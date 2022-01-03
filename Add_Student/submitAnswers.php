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

if(!isset($_SESSION["sid"]) || !isset($_SESSION["tsid"])) {
	header("Location: ./studentHome.php");
}

$conn = mysqli_connect($svr,$usr,$pwd,$db);
$flag=0;
extract($_POST);
$sid=$_SESSION["sid"];
$tsid=$_SESSION["tsid"];
foreach ($_POST as $qid => $answer){
		if(is_numeric($qid)) {
			$sql = "select answer from questions where qid=$qid";
			$result = mysqli_query($conn, $sql);
			$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
			$answerKey = $row["answer"];
			$answerKeyWords = explode(" ", $answerKey);
			$answerWords = explode(" ", $answer);
			if($answerKeyWords == $answerWords){
				$c = 10;
			}
			else{
				$c = 0;
			}
			echo "$c\n";
			$sql = "INSERT INTO answers (aid , sid, qid, answer, score) VALUES (NULL, '$sid','$qid', '$answer', '$c')";
		}
	} 

if(!$conn->query($sql)) {
		$flag = 1;
	}

if($flag==1) {
	echo "<div class='jumbotron text-center'>Test Not Submitted</div>";
	echo "<h4>YOU HAVE ALREADY SUBMITTED THIS QUESTION";
	echo "<a href='./studentHome.php'>HOME</a>";
} else {
	echo "<div class='jumbotron text-center'>Test submitted.</div>";
	echo "<a href='./studentHome.php'>HOME</a>";
}


$conn->close();
?>