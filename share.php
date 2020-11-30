<?php
session_start(); 
include 'connect.php';

$id = $_SESSION['id'];
if(!$id){
	header('Location: index.html');
}

$id=$_GET['id'];

$sql="SELECT* FROM record WHERE id='$id'";
$r=mysqli_query($conn,$sql);
$rez=mysqli_fetch_row($r);

$link="php-task/r.php?l=$rez[5]";
echo $link;
 ?>