<?php
session_start();

include 'connect.php';

$login = $_SESSION['login'];
$id=$_SESSION['id'];
$t=true;
if(isset($_POST))
{
	//echo $_POST['text'];
	if(isset($_POST['title']) && isset($_POST['text'])) {
			$title=$_POST['title'];
			$text=wordwrap($_POST['text'],15,"\n");

			//добавление записи в базу 
			//яктивная по умолчанию
			//нужно создавать link поле
   $sql ="INSERT INTO `record`( `title`, `text`, `active`, `idUser` ) VALUES ('$title','$text','$t','$id')"; 
   mysqli_query($conn,$sql);
   		
   		}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	
</head>
<body class="bg-dark">


	<nav class="navbar navbar-dark bg-dark">

	  <a class="navbar-brand" href="home.php"> Home </a>
	  <p class="h1 text-success"><?php echo $login; ?></p>
	  <a class="nav-link active " href="logout.php" >Logout</a>
		    
	</nav>


	<div class="row ">
		<div class="col">
			<div class="mx-auto w-75 p-3 bg-dark text-white text-center">

				 <form method="post" action="create.php">
				 Title	<input class="form-control form-control-lg" type="text" name="title" maxlength="255" >
				 	<br>
				 	<textarea class="form-control form-control-lg" name="text" maxlength="1024" ></textarea>
				 	<br>
				 	<button class="btn btn-secondary btn-lg btn-block type="submit">Create</button>
				 </form>


	</div>
		</div>
			</div>





</body>
</html>
