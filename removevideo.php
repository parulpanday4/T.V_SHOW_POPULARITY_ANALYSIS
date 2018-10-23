<?php 
include 'dbsele.php';
session_start();
if($_SESSION['name']=='')
{
  session_destroy();
  header("Location:adminlogin.php");
}?>
<?php 
$qry1="SELECT * FROM videos";
$res=mysql_query($qry1);
$rowsnm=mysql_num_rows($res);
if($rowsnm<=0)
{
		$msg="NO VIDEO TO DELETE!!!!!!!!";
		echo "<script type='text/javascript'>";
		echo "alert('$msg');";
		echo "window.location='admindashboard.php'";
		echo "</script>";
		exit();
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>REMOVE VIDEOS</title>
	<link rel="shortcut icon" href="favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body style="background:url(img3.jpg)">

	<header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="index.php">TEllybuzz</a> 
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php" data-nav-section="home"><span>LOGOUT</span></a></li>
						
						
					</ul>
				</div>
			</nav>
	  </div>
	</header>
		<div class="vid">
			<table border="0px" style="margin:center">
				<tr>
					<th>SN</th>
					<th>Video</th>
					<th>Category</th>
					<th>Delete</th>
				</tr>
				<?php 
				$j=1;
				$qry6="SELECT * FROM videos";
				$res9=mysql_query($qry6);
				while($roww=mysql_fetch_array($res9,MYSQL_BOTH))
				{
					$id=$roww['sn'];
					?>
				<tr>
				<td><?php echo $j;
				$vid=$roww['name']; ?></td>	
				<td class="vidd"><video width="720" height="240">
					<source src="<?php echo "videos/$vid" ?>" type="">
				</video></td>
				<td><?php echo $roww['category'] ?></td>
				<?php echo"<td><a href ='delete.php?sn=$id'>"?><input type="button" value="Delete" /><?php echo "</a></td>";?>
				</tr>
				<?php $j++; } ?>
			</table>
		</div>
<div class="bck"><button  onclick="return (back1())">BACK</button></div>

</body>
<script type="text/javascript">
	function back1() {
		// body..
		window.history.back();
	}
</script>

<style type="text/css">
	   .vid{
	   	padding-left: 10px;
	   	padding-top: 70px;
	   }
	   .sub{
	   	padding-left: 100px;
	   	padding-top: 50px;

	   }
	   .bck{
	   	padding-left: 600px;
	   	padding-top: 40px;
	  

	   }
	   .vidd{
	   	height: 200px;
	   	width: 400px;
	   }
	</style>


</html>
<?php 
if (isset($_POST['submit'])) {

	$id=$_POST['video'];
	$qry2="DELETE FROM videos WHERE sn=$id";
	$res=mysql_query($qry2) or die(mysql_error());
	if(!$res){
		echo "error";
	}
	else{
		$msg="VIDEO DELETED!!!!!!!!";
		echo "<script type='text/javascript'>";
		echo "alert('$msg');";
		echo "window.location='admindashboard.php'";
		echo "</script>";
	}	

}
 ?>