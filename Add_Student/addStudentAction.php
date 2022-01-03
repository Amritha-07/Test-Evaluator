<html>
<head>
	<title>STUDENT REGISTER</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
</html>
<?php
session_start();
$svr="localhost";
$usr="root";
$pwd="root";
$db="description";
$conn = new mysqli($svr, $usr, $pwd, $db);
extract($_POST);
$sql = "INSERT INTO students (sid , roll_no, sname, username, password, class, section, age, phone_number) VALUES (NULL, '$roll_no','$name', '$uname', '$password', '$class','$section','$age','$phone_no')";

if($conn->query($sql)) {
	header("Location: http://localhost/projectCIT/success.php");
} 
else {
	$_SESSION["error"]="<h4 font-family='Haettenschweiler'>USERNAME OR ROLLNUMBER ALREADY TAKEN!</h4>";
	header("Location: http://localhost/projectCIT/Add_Student/addStudent.php");
	
	exit();
}

$conn->close();
?>

<html>
<head>
	<title>STUDENT REGISTER</title>
</head>
</html>
