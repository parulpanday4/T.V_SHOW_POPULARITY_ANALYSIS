<?php 
		session_start();
        $_SESSION['email'];
   if($_SESSION['email']=="")
			{
				session_destroy();
				header("Location:visitor_login.php");
		}
	include 'dbsele.php';
 ?>
<html>
<head>


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

      <style>
	  

							 
							 
	            #container ul{
			                  
                              
			                  list-style:none;
							  }
	          #container ul li{
			                 
			                   background-color:white; 
			                   width:250px;
							   border:1px solid white;
							   height:50px;
							   line-height:50px;
							   text-align:center;
							   float:left;
							   color:black;
							   font-size:12px;
							   position:relative;
							  padding-right:40px;
							   }
			  #container ul li:hover{
			                   
                                background-color:red;
								
                                }	
			 #container ul li ul li{
				           font-size:20px;
						   text-decoration:none;
						   
			 }
              #container ul ul{display:none;}
              #container ul li:hover > ul{ display:block;}	
             #container ul ul ul {
                                   margin-left:210px; top:0px; position:absolute;
								   }		

                  .back{
                         padding-top:500px;
						 padding-left:1100px;
						 font-size:20px;
					
						 
						 }
				  
							   
							 
      </style>
<meta charset="utf-8">
<title>Visitor</title>
</head>

<body style="background:url(images/2.jpg)" >



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
						<li class="active"><a href="logout.php" data-nav-section="home"><span>Logout</span></a></li>
						
						
					</ul>
				</div>
			</nav>
	  </div>
	</header>
	<?php 
 				$qry6="SELECT *	 FROM category";
 				$res2=mysql_query($qry6);
 				?>
<div class="selection">
<form action="" method="POST">
 	Select Category : <select name="category">
 			<?php 
 				while($row2=mysql_fetch_array($res2,MYSQL_BOTH))
 				{
 			 ?>
 			 <option name="category" value="<?php echo $row2['category'] ?>" ><?php echo $row2['category'] ?></option>
 			 <?php } ?>
 	</select>
 	<div class="sub"><br><input type="submit" name="submit" value="GO" class="sub1"/></div>
 </form>
</div>

		
</body>
<style type="text/css">
	.selection{
		padding-top: 300px;
		padding-left: 530px;

	}
	.sub{
		padding-left: 80px;
		padding-top: 30px;
		font-size: 20px;
	
	}

	.sub1{
		border-radius: 2px 2px 2px 2px;
 	    background-color:blue;
 	    color:white;
 	    
		   }

</style>
</html>
<?php 
if (isset($_POST['submit'])) {
 	$cat=$_POST['category'];
 	$_SESSION['category']=$cat;
 	header("Location:videopage.php?category=$cat");
 	exit();
 } ?>