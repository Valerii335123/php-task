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
				// while($row = mysqli_fetch_row($rez)) {
				// 	echo($row[1]);
				// 	echo '<br>';

				// }

			}
			
		}
	}
	else echo 'error';
	}
}

  ?>


<form action="registration.php" method="POST">
	<input type="text" name="login">
	<br>
	<input type="password" name="pass">
	<br>
	<input type="password" name="confirmpass">
	<button type="submit">check</button>
</form>