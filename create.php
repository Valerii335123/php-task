<?php
session_start();

include 'connect.php';

echo $_SESSION['login'];
$id=$_SESSION['id'];
$t=true;
if(isset($_POST))
{
	//echo $_POST['text'];
	if(isset($_POST['title']) && isset($_POST['text'])) {
			$title=$_POST['title'];
			$text=$_POST['text'];

			//добавление записи в базу 
			//яктивная по умолчанию
			//нежно создавать link поле
   $sql ="INSERT INTO `record`( `title`, `text`, `active`, `idUser` ) VALUES ('$title','$text','$t','$id')"; 
   mysqli_query($conn,$sql);
   		
   		}

}

 ?>


 <form method="post" action="create.php">
 	<input type="text" name="title" max="255">
 	<br>
 	<textarea name="text" maxlength="1024"></textarea>
 	<button type="submit">Create</button>
 </form>