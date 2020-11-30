<?php
$link=$_GET['l'];
include 'connect.php';

$sql="SELECT* FROM record WHERE link='$link'";
$r=mysqli_query($conn,$sql);
$rez=mysqli_fetch_row($r);

if($rez[3]) {
	
	//print_r($rez);
	}
	else header('Location: home.php');
  ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	
<table class="table">
	 <thead class="thead-dark">
	    <tr>
	    
	      <th scope="col" width="25%">title</th>
	      <th scope="col">text</th>
	      <th scope="col" width="10px">Active</th>
	      
	    </tr>
	  </thead>	




<?php
echo "<tr>";

	 	
	 	echo "<td>$rez[1]</td>";
	 	echo "<td>$rez[2]</td>";
	 	echo ($rez[3])?'<td>
	 		<p class="btn btn-success" >Active</p>
	 	</td>':'<td>
	 		<p class="btn btn-danger">Not Active</p>
	 	</td>';
	 	

	 	
?>



	</table>>