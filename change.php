<?php
session_start();
include 'connect.php';

$id = $_SESSION['id'];
if(!$id){
	header('Location: index.html');
}

$id=$_GET['id'];
$login=$_SESSION['login'];
$sql="SELECT* FROM record WHERE id='$id'";
$r=mysqli_query($conn,$sql);
$rez=mysqli_fetch_row($r);



  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
			<div class="mx-auto w-50 p-3 bg-dark text-white text-center">


				  <form method="POST" action="update.php">
				  	<input type="hidden" name="id" value="<?php echo $rez[0];?>">
				  	Title
				  	 <input class="form-control form-control-lg" type="text" name="title" value="<?php echo $rez[1];?>">
				  	Text 
				  	<textarea class="form-control form-control-lg" name="text"><?php echo $rez[2];?></textarea>
				  	Active 
				  	<input class="form-control form-control-lg" type="checkbox" name="isActive" <?php if($rez[3]) echo 'checked'?>>
				  	<br>
				  	<button class="btn btn-secondary btn-lg btn-block" type="submit">update</button>
				  </form>


	</div>
		</div>
			</div>







</body>
</html>
