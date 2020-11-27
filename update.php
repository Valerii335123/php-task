<?php
session_start();
include 'connect.php';
if(isset($_POST)) {
	//echo $_POST['isActive'];
	$title=$_POST['title'];
	$text=$_POST['text'];
	$id=$_POST['id'];
	if($_POST['isActive']=='on')
		 $active=1;
	else $active=0;
// запрос на оновление даных
	$update="UPDATE `record` SET `title`='$title',`text`='$text',active='$active' WHERE id='$id'";

	$rez = mysqli_query($conn,$update);
			if ($rez) {
				echo "good";
			}
			else echo "non";


} 
 ?>


 <a href="home.php"> go Home</a>