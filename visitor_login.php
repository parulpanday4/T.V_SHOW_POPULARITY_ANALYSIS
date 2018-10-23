<?php
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
        body{
		   background: #292931;
		    }
		#login{
		   position: absolute;
		   top:20%;
		   left:35%;
		
		   }
		#login h2{
		   text-align:center;
		   color:white;
		   font-family:sans-serif;
		   font-size:50px;
		   }
		#login input{
		   display:block;
		   width:400px;
		   height:40px;
		   padding:10px;
		   font-size:14px;
		   font-family:sans-serif;
		   color:black;
		   background:rgba(0,0,0,0,3);
		   outline:none;
		   border:1px solid rgba(0,0,0,0,3);
		   border-radius:5px;
		   box-shadow:inset 0px -5px 45px rgba(100,100,100,0,2),0px 1px 1px rgba(255,255,255,0,2);
		   margin-bottom:10px;
		   
		   }
		#login #login-btn{
		   background:#55acee;
		   font-size:18px;
		   text-align:center;
		   vertical-align:middle;
		   line-height:20px;
		  }
</style>
</head>
<body>
		
   <header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="index.php">TellyBuzz</a> 
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php" data-nav-section="home"><span>Home</span></a></li>
						<li><a href="index.php" data-nav-section="services"><span>About Us</span></a></li>
						
						<li><a href="#" data-nav-section="team"><span>Team</span></a></li>
						
						
					</ul>
				</div>
			</nav>
	  </div>
	</header>
     
     <div id="login">
	 <form method="POST">
	   <h2>Sign In</h2>
	   <input type="text" id="username" name="email" placeholder="Enter Email"/>
	   <input type="password" id="password" name="pasw" placeholder="Enter Password"/>
	   <input type="submit" id="login-btn" name="btn" value="SIGN IN"/>
	   
	
	 </form>
	 </div>
</body>
</html>

<?php
if(isset($_POST['btn']))
{
	 $email=$_POST['email'];
	 $pass=$_POST['pasw'];
	$query="SELECT email,password FROM visitors where email='$email' AND password='$pass'";
	$res=mysql_query($query);
	if($row= mysql_fetch_array($res,MYSQL_BOTH))
    {
    	session_start();
        $_SESSION['email']=$email;
        header("Location:visitor_dash.php");
    }
else
    {
        
        header("Location:visitor_login.php");
    }
}
?>