<?php
include 'connect.php';


if(isset($_POST)) {

	if(isset($_POST['login']) && isset($_POST['confirmpass']) && isset($_POST['pass'])){
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		// проверка пароля 1 большая буква 1 цифра не меньше 6 символов
				if(preg_match('/(?=.*[0-9])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/', $pass)) {
		if($_POST['pass']===$_POST['confirmpass']) {
			
			$sql="SELECT * FROM user where login='$login'";

			$rez=mysqli_query($conn,$sql);
					if($rez){
					$row = mysqli_fetch_row($rez);
					if(isset($row)) {
							echo "user in database";						
					}
					
					else {
					$sql="INSERT INTO `user`( `login`, `password`) VALUES ('$login','$pass')";
					mysqli_query($conn,$sql);
					echo "acount add successfully";
					}
				

			}
			
		}
	}
	else echo 'error';
	}
}
  ?>

<!DOCTYPE html>
<html>
<head>

<title>personal notebook</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	

</head>
<body class="bg-dark">
	<nav class="navbar navbar-dark bg-dark">
 		 <p class="h1 text-success">Registration</p>
	</nav>
	<div class="row ">
		<div class="col">
			<div class="mx-auto w-50 p-3 bg-dark text-white text-center">
				<form action="registration.php" method="POST">
					Login	
					<input class="form-control form-control-lg" type="text" name="login">
					<br>
					Password	
					<input class="form-control form-control-lg" type="password" name="pass">
					<br>
					Confirm password
					<input class="form-control form-control-lg" type="password" name="confirmpass">
					<br>
					<button class="btn btn-secondary btn-lg btn-block" type="submit">Registration</button>
				</form>
			</div>
		</div>
	</div>


<a href="index.html" class="btn btn-primary btn-lg ">
	go back
</a>



</body>
</html>
