<?php
require("../config.php");
session_start();

if(!isset($_SESSION["tid"]) || !isset($_SESSION["tsid"])) {
	header("Location: ./teacherHome.php");
}

if(isset($_SESSION["error"])) {
	echo $_SESSION["error"];
	unset($_SESSION["error"]);
}

?>

<html>
<head>
<style>
.heading{
	background-color: black;
	color: white;
	padding: 15px;
	text-align: center;
}
form{
	font-size: 20px;
	font-style: bold;
	font-family: arial;
}
</style>
</head>
<body>
<div class="heading">
<h1>Create new question</h1>			
</div>

<form action="newQuestionAction.php" method="POST">
Question: <input type="text" name="question" required><br><br>
Answer key: <input type="text" name="answer" required><br><br>
<input type="submit">
</form>

</body>
</html>