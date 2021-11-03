<!DOCTYPE html>
<html>
<head>
	<title>Index page</title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
session_start();

include 'database.php';

 $limit=3;
 $page=$_GET['page'];
 $offset=($page -1)* $limit;

// $select="SELECT * FROM users";
$sql="SELECT * FROM signup LIMIT {$offset},{$limit}";
$query=mysqli_query($conn,$sql);

 if(mysqli_num_rows($query)>0) 
 {
 ?>
 <table class="table table-hover table-striped table-bordered">
 	<thead class="thead-dark">
 		<tr>
 			<th scope="col">Name</th>
 			<th scope="col">Email</th>
 			<th scope="col">Mobile</th>
 			<th scope="col">Password</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php
 		$i=0;
 		while($row=mysqli_fetch_array($query))
 		 {
          
 		?>
         <tr>
         	<td><?php echo $row["name"];?></td>
         	<td><?php echo $row["email"];?></td>
         	<td><?php echo $row["mobile"];?></td>
         	<td><?php echo $row["password"];?></td>
         </tr>

         <?php
         $i++;
         }
         ?>
 	</tbody>
 </table>
 <?php
	# close }
	}

	// ....
	 $sql1="SELECT * FROM signup";
	 $result1=mysqli_query($conn,$sql1) or die("failed");
	 if (mysqli_num_rows($result1)>0) 
	 {
	 	$totalrecords =mysqli_num_rows($result1);
	 	$page= ceil($totalrecords / $limit);
	 	echo '<ul class="pagination admin-pagination">';
	 	?>
	 		
	 	<?php
	 	echo '<div class="container col-2">';
	 	for ($i=1; $i<$page+1;$i++)
	 	 { 
	 	 echo '<button><li><a href="index.php?page='.$i.'">'.$i.'</a></li></button>';
	 	}
	 	echo '</div>';
	 	echo '</ul>';
	 }
 
?>

</body>
</html>