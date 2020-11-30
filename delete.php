<?php 
session_start();

$id = $_SESSION['id'];
if(!$id){
	header('Location: index.html');
}

include 'connect.php';
$id = $_GET['id'];

$sql="SELECT* FROM `record` where id='$id'";

$r=mysqli_query($conn,$sql);
if($r)
$rez=mysqli_fetch_row($r);

if($rez[3]=='0') {
	//print_r($rez);
$delete="DELETE FROM `record` WHERE id='$id'";

$conn->query($delete);
header('Location: home.php');  
}
else echo "record is active";

 ?>