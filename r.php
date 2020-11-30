<?php
$link=$_GET['l'];
include 'connect.php';

$sql="SELECT* FROM record WHERE link='$link'";
$r=mysqli_query($conn,$sql);
$rez=mysqli_fetch_row($r);

if($rez[3]) {
	
	print_r($rez);
	}
	else header('Location: home.php');
  ?>
