<?php 
include 'dbsele.php';
session_start();
if($_SESSION['name']=='')
{
  session_destroy();
  header("Location:adminlogin.php");
}?>
<?php

$id =$_REQUEST['sn'];
$res=mysql_query("SELECT name from videos where sn='$id'");
$qrey=mysql_fetch_array($res,MYSQL_BOTH);
$vid=$qrey['name'];
mysql_query("DELETE FROM videos WHERE sn = '$id'")
	or die(mysql_error());  
unlink("videos/$vid");	
	
	header("Location: removevideo.php");

?>