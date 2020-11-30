<?php
session_start();
include 'connect.php';
$id = $_SESSION['id'];

if(!$id){
	header('Location: index.html');
}

$id=$_GET['id'];
$a=$_GET['active'];
$active=($a)?0:1;
$update="UPDATE `record` SET active='$active' WHERE id='$id'";

	$rez = mysqli_query($conn,$update); 
	header('Location: home.php');
 ?>