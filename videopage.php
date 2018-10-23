 <?php 
		session_start();
       $user= $_SESSION['email'];
   if($_SESSION['email']=="")
			{
				session_destroy();
				header("Location:visitor_login.php");
		}
	include 'dbsele.php';
	//$cat=$_REQUEST['category'];
  $cat=$_SESSION['category'];
	$res=mysql_query("SELECT id from visitors where email='$user'");
	$ro=mysql_fetch_array($res,MYSQL_BOTH);
	$uid=$ro['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>VIDEO PAGE</title> 


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
<style type="text/css">

p{
  margin  : 0 0 1.5em;
  padding : 0;
}

p a{
  color           : #9c3;
  text-decoration : none;
}

.starRating:not(old){
  display        : inline-block;
  width          : 7.5em;
  height         : 1.5em;
  overflow       : hidden;
  vertical-align : bottom;
}

.starRating:not(old) > input{
  margin-right : -100%;
  opacity      : 0;
}

.starRating:not(old) > label{
  display         : block;
  float           : right;
  position        : relative;
  background      : url('images/star-off.svg');
  background-size : contain;
}

.starRating:not(old) > label:before{
  content         : '';
  display         : block;
  width           : 1.5em;
  height          : 1.5em;
  background      : url('images/star-on.svg');
  background-size : contain;
  opacity         : 0;
  transition      : opacity 0.2s linear;
}

.starRating:not(old) > label:hover:before,
.starRating:not(old) > label:hover ~ label:before,
.starRating:not(:hover) > :checked ~ label:before{
  opacity : 1;
}

	</style>				 
                    
</head>
<body style="background-image: url(images/3.jpg);" >
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

<h4>Video Of Category <?php echo '$cat' ?></h4><br>

<a href="visitor_dash.php"><center>Click to Choose another Category</center></a>
	<?php 
	$qry="SELECT * FROM videos WHERE category='$cat'";
	$res=mysql_query($qry);
	$k=1;
	$numrows=mysql_num_rows($res);
	if($numrows<=0)
	{
		$msg3="NO VIDEO  EXIST !!!!!!!!";
		echo "<script type='text/javascript'>";
		echo "alert('$msg3');";
		echo "window.location='visitor_dash.php'";
		echo "</script>";
	}

	 ?>
	 <h2>Video Of Category : <?php echo $cat."   (Click on video to Play)"."<br>"?></h2>
   <?php
   // no of videos per page
   $novpp=1;
   // no of pages we need
   $nop=ceil($numrows/$novpp);

   // checking which page nmbr is currently on
   if(!isset($_GET['page']))
   {
    $page=1;
   }
   else{
    $page = $_GET['page'];
   }
   //determine the sql limit  starting num for res
   $pagerefrst=($page-1)*$novpp;
   //limit the retrival data
   $qry2="SELECT * FROM videos WHERE category='$cat' LIMIT $pagerefrst , $novpp ";
   $resu=mysql_query($qry2);
   while ($ro1w=mysql_fetch_array($resu,MYSQL_BOTH))
  {
    $id=$ro1w['sn'];
    $vid=$ro1w['name'];
    

  ?>
  <video id="myVideo" onclick="playVid();" style="border: none solid white;" height="350px" width="700px">
  <source src="<?php echo "videos/$vid"; ?>" type="">
</video><br><br>
<?php 
  echo "<br>";
  $rates=mysql_query("SELECT avgrate FROM videos WHERE sn='$id'");
  $ro9=mysql_fetch_array($rates,MYSQL_BOTH);
  $k=0;
  $rt=$ro9['avgrate'];
  ?>
  Current rate of This Video is : <?php for($k=0;$k<$rt;$k++) 
  { 
    echo " " ?>
      <img src="images/star-on.svg" />
  <?php 
    }
  ?>
<p>
      Please Rate:
      <form method="POST" action="<?php echo "videopage.php?page=$page&category=&cat" ; ?>">
        <span class="starRating">
        <input id="rating5" type="radio" name="rating" value="5">
        <label for="rating5">5</label>
        <input id="rating4" type="radio" name="rating" value="4">
        <label for="rating4">4</label>
        <input id="rating3" type="radio" name="rating" value="3">
        <label for="rating3">3</label>
        <input id="rating2" type="radio" name="rating" value="2">
        <label for="rating2">2</label>
        <input id="rating1" type="radio" name="rating" value="1" checked>
        <label for="rating1">1</label>
      </span>
       <input  type="submit" name="sub" value="SUBMIT RATE" style="height: 20px; width: 120px; font-size: 10px; border-color: red; color: black;">
    </form>
    </p>
  <?php
  // while loop end
   }
   //display the links to the page
   echo "Next video - ";
   for($page=1;$page<=$nop;$page++)
    {
      echo "<a href='videopage.php?page=$page&category=$cat'>  "."  ". $page ."</a>";
    }

	 ?>
	 

   <script type="text/javascript">
  var vid = document.getElementById("myVideo");
  function playVid() 
 { 
    vid.play();
    <?php
    $chkif=mysql_query("SELECT * from uservote where uid='$uid' AND vidid='$id'");
            $rwfnd=mysql_num_rows($chkif);
            if($rwfnd>0)
            {}
          else
          {
            mysql_query("INSERT INTO uservote (uid,vidid) values ('$uid','$id')");
            mysql_query("UPDATE videos SET views=(views+1) WHERE sn='$id' ");
          }
    ?> 
  }
</script>
</html>
<?php
if (isset($_POST['sub'])) 
	{
    // user given rate on this current 
    $rate=$_POST['rating'];
             //chking if user already view

          	$chkif=mysql_query("SELECT * from uservote where uid='$uid' AND vidid='$id'");
          	$rwfnd=mysql_num_rows($chkif);
          	if($rwfnd>0)
         	{
          		// if user is updating rate
        		$updtrt=mysql_query("SELECT rate from uservote WHERE uid='$uid' and vidid='$id' ");
        		$roew=mysql_fetch_array($updtrt,MYSQL_BOTH);
        		$lastrt=$roew['rate'];
        		if($lastrt==0 || $lastrt=='')
        		{
        			mysql_query("UPDATE videos SET ttl_visit=ttl_visit+1 WHERE sn='$id' ");
              mysql_query("UPDATE videos SET total_star= total_star+ '$rate' WHERE sn='$id' ");	
        		}
            else
            {
        		  mysql_query("UPDATE videos SET total_star= total_star - $lastrt WHERE sn='$id' ");
              mysql_query("UPDATE videos SET total_star= total_star+ $rate WHERE sn='$id' ");
        		}
        		mysql_query("UPDATE uservote SET rate=$rate WHERE uid='$uid' and vidid='$id' ");
        		$getavrg=mysql_query("SELECT total_star,ttl_visit FROM videos WHERE sn='$id' ");
        		$getting=mysql_fetch_array($getavrg,MYSQL_BOTH);

        		$ttlstr=$getting['total_star'];
        		$ttlppl=$getting['ttl_visit'];
        		// calculating new avrage
        		$avgrate=(int)($ttlstr/$ttlppl);
        		// updating new avrage
        		mysql_query("UPDATE videos set avgrate=$avgrate WHERE sn='$id' ");
         	}
          mysql_query("DELETE FROM uservote WHERE vidid=0");
          $_SESSION['category']=$cat;
          $pag1e = $_SERVER['PHP_SELF'];
          //end if 
          sleep(1);
  }
?>