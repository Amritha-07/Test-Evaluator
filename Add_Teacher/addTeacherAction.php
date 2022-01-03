<html>
<head>
	<title>TEACHER REGISTER</title>
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
$sql = "INSERT INTO teachers (tid , teacher_id, teacher_name , username, password, subject, phone_number) VALUES (NULL, '$teacher_id','$tname','$uname','$password','$subject','$phone_no')";

if($conn->query($sql)) {
	header("Location: http://localhost/projectCIT/success.php");
} 
else {
	$_SESSION["error"]="<h3 font-family='Haettenschweiler'>USERNAME OR ID ALREADY TAKEN!</h3>";
	header("Location: http://localhost/projectCIT/Add_Teacher/addTeacher.php");
}


$conn->close();
?>

