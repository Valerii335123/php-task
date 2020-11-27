<?php
session_start();

include 'connect.php';

$login = $_POST['login'];
$pass = $_POST['pass'];







$sql="SELECT * from user";
//вибір з бази
$result=$conn->query($sql);
if($result)
	//зчитую по одному записі та перевіряю чи є такий користавач
while ($r=mysqli_fetch_row($result)) 
{
		
	 if($r[1]==$login && $r[2]==$pass)
	{

		//створююю сесію
	 	$_SESSION['login']=$r[1];
	 	$_SESSION['id']=$r[0];
	
//перенаправлення
header("Location: home.php");
}

}

echo "<a href='index.html'>Login or pass not right</a>";



 ?>