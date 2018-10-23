
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
		<title>Reg</title>
		
<style>


  
   body{
		   background: #292931;
		   
		  
		    }
 
    #simple_form{
		      text-align:center;
		      padding-top: 90px;
		  }
			  
		#simple_form h2{
			color:white;
		}	 
	
	}
	
	}
	#registration{
		width:50%;
		background-color:#292931;
		opacity:0.8;
		padding:50px 0px;
	}
	#button{
		padding:0px;
		border-radius:5px;
		width:350px;
		font-size:15px;

	}
	
	#butt{
		padding:10px;
		border-radius:5px;
		width:250px;
	    background-color:55acee;
		border:2px solid #01010c;
		font-size:18px;
		color:black;
		 font-size:18px;
		   text-align:center;
		   vertical-align:middle;
		   line-height:20px;
	}
	

	#but{
        color:white;
		font-size:18px;
	}
	
	


</style>
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

        <div id="simple_form">
		
           <form id="registration" method="POST">
		  <center> <h2>Register Here</h2></center>
		<input type="text" name="nm" id="button" placeholder="Enter your Name" required=""><br><br>
		<input type="text" name="email" id="button" placeholder="Enter your E-mail" required=""><br><br>
		<input type="password" name="pass" id="button" placeholder="Enter your Password" required=""><br><br>
		
		

			<input type="radio" name="gender" id="rd" value="male" ><span id="but">Male</span>
			<input type="radio" name="gender" id="rd" value="female"><span id="but">Female</span><br><br>
			<center><input type="submit" value="Register" id="butt" name="btn"><br><br>
			<button  id="butt"  onclick="parent.location='visitor_login.php'">Already Registered??</button></center>



           </form>
			</div>
		
	</body>
</html>

<?php
if(isset($_POST['btn']))
{
	 $Name=$_POST['nm'];
	 $Email=$_POST['email'];
	 $passw=$_POST['pass'];
	$gender=$_POST['gender'];
	$qry2="SELECT * FROM visitors WHERE email='$Email'";
	$res1=mysql_query($qry2);
	if((mysql_num_rows($res1))>0)
	{
		header("Location:visitor_login.php");
	}
	//session_start();
	$query="INSERT INTO visitors (name,email,password,gender) values ('$Name','$Email','$passw','$gender')";
	$res=mysql_query($query) or die ("error ".mysql_error());
	header("Location:visitor_login.php");
	
}
?>

