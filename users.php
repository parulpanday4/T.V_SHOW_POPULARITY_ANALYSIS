<?php 
session_start();
if($_SESSION['name']=='')
{
  session_destroy();
  header("Location:adminlogin.php");
  exit();
} 
include 'dbsele.php';
$qry="SELECT * FROM visitors";
$res=mysql_query($qry);
?>
<!DOCTYPE html>
<html>
<head>
	<title>USERS</title>
</head>
<body>
	<h2>users</h2>
	
<table  cellspacing="0" cellpadding="4" >
	<tr>
		<th>SN</th>
		<th>NAME</th>
		<th>E-MAIL</th>
		<th>GENDER</th>
	</tr>
	<?php 
	$i=1;
	while ($row=mysql_fetch_array($res,MYSQL_BOTH)) {
		 ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['name'] ;?></td>
		<td><?php echo $row['email'] ;?></td>
		<td><?php echo $row['gender'] ;?></td>
	</tr>
	<?php $i++;
		}
	?>
</table>
</div>
</body>

</html>