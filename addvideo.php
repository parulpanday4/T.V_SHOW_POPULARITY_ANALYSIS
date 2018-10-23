<?php 
include 'dbsele.php';
session_start();
if($_SESSION['name']=='')
{
  session_destroy();
  header("Location:adminlogin.php");
}
?>
 <?php 
if(isset($_POST['submit']))
{
	$filenm=$_FILES['vdo']['name'];
	$cat=$_POST['category'];


	$target_dir="videos/";

	$targetfile=$target_dir . basename($_FILES["vdo"]["name"]);

	$videotype=pathinfo($targetfile,PATHINFO_EXTENSION);

	$extarray=array("mp4","MP4");

	if(in_array($videotype,$extarray))
	{
		
		echo $chk1=copy($_FILES['vdo']['tmp_name'],$target_dir.$filenm);
		if(!$chk1)
		{ ?>
			<script type="text/javascript">
				alert("can't upload video");
			</script>

		<?php 
		}
		else
		{
			$qry="INSERT INTO videos (category,name) VALUES ('$cat','".$filenm."')";
		$chk=mysql_query($qry);
			
			?>
		<script type="text/javascript">
			alert("VIDEO UPLOADED SUCCESSFULLY!!!!!");
			window.location="admindashboard.php";
		</script>

		<?php 
		}
	}
}
  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php 
 				$qry6="SELECT *	 FROM category";
 				$res2=mysql_query($qry6);
 				?>
 	<title>add video</title>

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
 <body style="background:url(images/project-1.jpg)">

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
						<li class="active"><a href="logout.php" data-nav-section="home"><span>LOGOUT</span></a></li>
						<li class="active"><a href="admindashboard.php" data-nav-section="home"><span>BACK</span></a></li>
						
						
					</ul>
				</div>
			</nav>
	  </div>
	</header>
 <form action="" method="POST" enctype="multipart/form-data">
 	
   <div class="cat">
 	CATEGORY: <select name="category">
 			<?php 
 				while($row2=mysql_fetch_array($res2,MYSQL_BOTH))
 				{
 			 ?>
 			 <option name="category" value="<?php echo $row2['category'] ?>" ><?php echo $row2['category'] ?></option>
 			 <?php } ?>
 	</select><br/><br/>
 	        
 	SELECT VIDEO:<input type="file" name="vdo" />
             
 </div><br/>
               <div class="sub">
                  	<br><input type="submit" name="submit" class="sub1" />

               </div>
 
</form>

 

 <style>
 .cat{
 	padding-top: 200px;
 	padding-left: 550px;
 }
 
 .sub{
 	
 	padding-left: 600px;
 
 }
 .sub1{
 	border-radius: 2px 2px 2px 2px;
 	background-color:blue;
 	color:white;

 }

</style>
 </body>
 </html>
