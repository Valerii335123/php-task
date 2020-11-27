<?php
session_start();
include 'connect.php';
$id=$_GET['id'];

$sql="SELECT* FROM record WHERE id='$id'";
$r=mysqli_query($conn,$sql);
$rez=mysqli_fetch_row($r);



  ?>




  <form method="POST" action="update.php">
  	<input type="hidden" name="id" value="<?php echo $rez[0];?>">
  	<input type="text" name="title" value="<?php echo $rez[1];?>">
  	<textarea name="text"><?php echo $rez[2];?></textarea>
  	<input type="checkbox" name="isActive" <?php if($rez[3]) echo 'checked'?>>
  	<button type="submit">update</button>
  </form>