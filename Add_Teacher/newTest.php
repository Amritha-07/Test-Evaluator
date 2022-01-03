<?php
require("../config.php");
session_start();

if(!isset($_SESSION["tid"])) {
	header("Location: ./teacherLogin.php");
}

if(isset($_SESSION["error"])) {
	echo $_SESSION["error"];
	unset($_SESSION["error"]);
}

?>


<body>
</style>
</head>
<body><html>
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
<div class="jumbotron text-center">
<h1>Create new test</h1>			
</div>

<form action="newTestAction.php" method="POST">
	<table class="table-hover">
		<tr>
			<td>Test name: <input type="text" name="testname" pattern="[a-zA-Z0-9 ]+" required></td>
		</tr>
		<tr>
			<td><input type="submit"></td>
		</tr>
	</table>
</form>

</body>
</html>