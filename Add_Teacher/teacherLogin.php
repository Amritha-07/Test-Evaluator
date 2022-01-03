<?php
session_start();

if(isset($_SESSION["error"])) {
	echo $_SESSION["error"];
	unset($_SESSION["error"]);
}

?>
<html>
<head>
	<title>TEACHER LOGIN</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>   	
       	tr, td{
       		padding: 15px;
       	}
       	.jumbotron {
    		background-color: #f4511e;
    		color: #fff;
    		font-family: Algerian;
    		padding: 30px;
  		}
    </style>
</head>
<body>
<div class="jumbotron text-center">
<h1>TEACHER LOGIN</h1>			
</div>

<form action="teacherLoginAction.php" method="POST">
	<table class="table-hover">
		<tr>
			<td>USER NAME : </td>
			<td><input type="text" name="uname" required></td>
		</tr>
		<tr>
			<td>PASSWORD : </td>
			<td><input type="text" name="password" required></td>
		</tr>
		<tr>
			<td><input type="submit"></td>
		</tr>
	</table>
</form>

</body>
</html>