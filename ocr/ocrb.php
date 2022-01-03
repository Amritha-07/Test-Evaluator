<?php
if(isset($_FILES['image'])){
$file_name = $_FILES['image']['name'];
$file_tmp =$_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp,"images/".$file_name);
echo "<h3>Image Upload Success</h3>";
echo '<img src="images/'.$file_name.'" style="width:100%">';

shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "C:\\wamp64\\www\\pro\\images\\'.$file_name.'" out');

echo "<br><h3>OCR after reading</h3><br><pre>";

$myfile = fopen("out.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("out.txt"));
fclose($myfile);
echo "</pre>";
}
?>