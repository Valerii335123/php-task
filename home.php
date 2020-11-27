<?php 
session_start();

include 'connect.php';
$id = $_SESSION['id'];
$login=$_SESSION['login'];
if(!$id){
	header('Location: index.html');
}

$sql="SELECT * FROM record WHERE idUser='$id'";

 $rez=mysqli_query($conn,$sql);

 //количество записей
$numrows = mysqli_num_rows($rez);
//лимит вывода
$limit=3;
//количество страниц всего
$totalpages=ceil($numrows / $limit);




//получаю текущую страницу
if(isset($_GET['page'])) {
	$page=$_GET['page'];
}
else $page=1;



$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

$nextlink = ($page < $totalpages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $totalpages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';


$rowpages=$page*$limit;

$offset = ($page - 1)  * $limit;


    $start = $offset + 1;
    $end = min(($offset + $limit), $numrows);


$sql="SELECT * FROM record WHERE idUser='$id' LIMIT $offset,$limit";
echo $offset;
echo $rowpages;
$rez=mysqli_query($conn,$sql);

  
 ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	

<nav class="navbar navbar-dark bg-dark">

  <a class="navbar-brand" href="home.php"> Home </a>
  <p class="h1 text-success"><?php echo $login; ?></p>
  <a class="nav-link active " href="logout.php" >Logout</a>
	    
</nav>

 <a href="create.php" class="btn btn-success">Create new record</a>
<table class="table">
 <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">text</th>
      <th scope="col">Active</th>
      <th scope="col">delete</th>
      <th scope="col">change</th>
      <th scope="col">Share</th>
    </tr>
  </thead>	

 <?php
 if($rez)
 while ($r=mysqli_fetch_row($rez)) {
 	echo "<tr>";
 	echo "<th scope='row' >$r[0]</th>";
 	echo "<td>$r[1]</td>";
 	echo "<td>$r[2]</td>";
 	echo "<td>$r[3]</td>";

 	echo '<td>
 		<a class="btn btn-danger" href="delete.php?id='.$r[0].'" >delete</a>
 	</td>';

 	echo '<td>
  		<a class="btn btn-warning" href="change.php?id='.$r[0].'">change</a>
  	</td>';

  	echo '<td>
  		<a class="btn btn-primary" href="share.php?id='.$r[0].'">change</a>
  	</td>';



 	
 // 			echo '<a href="delete.php?id='.$r[0].'" >delete</a> ';
 // 			echo ' <a href="change.php?id='.$r[0].'">change</a>';
 // 			echo '<br>';
 } 
echo  "</table>";

 echo '<div ><p>', $prevlink, ' Page ', $page, ' of ', $totalpages, ' pages, displaying ', $start, '-', $end, ' of ', $numrows, ' results ', $nextlink, ' </p></div>';
   ?>




