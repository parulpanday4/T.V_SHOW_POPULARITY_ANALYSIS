<?php 
session_start();
if($_SESSION['name']=='')
{
  session_destroy();
  header("Location:adminlogin.php");
  exit();
} 
include 'dbsele.php';
$qry="SELECT * FROM videos ORDER BY avgrate";
$res=mysql_query($qry);
?>
<!DOCTYPE html>
<html>
<head>
	<title>videos data</title>
	<style type="text/css">
    .table{
         height:500px;
         width:500px;
     }
 </style>

</head>
<body >
	
	
<table cellpadding="5">
	<tr>
		
		<th>VIDEO</th>
		<th>CATEGORY</th>
		<th>RATINGS</th>
		
	</tr>
	<?php 
	$i=1;
	while ($row=mysql_fetch_array($res,MYSQL_BOTH)) {
		 ?>
	<tr>
		<td>
			<div class="vid">
				<div class="videoss"><video src="<?php echo "videos/".$row['name'] ?>" height="300px" width="300x" controls></video></div>
		</td>
		<td><?php echo $row['category'] ?></td>
		<td><?php $rt=$row['avgrate'] ?><?php for($i=0;$i<$rt;$i++) {?>
			<img src="images/rate.jpg" />
			<?php }?></td>
		</div>
	</tr>
	<?php $i++;
		}
	?>
</table>


<style>
.vid{
  height: 300px;
  width: 100%;
}
.videoss{
	height:auto;
	width: 300px;
	object-fit:fill;
}

</style>


</body>
</html>