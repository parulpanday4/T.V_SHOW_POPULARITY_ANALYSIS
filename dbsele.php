<?php
$connectdb=mysql_connect('localhost','root','');
if(!$connectdb)
{
	echo "error connection database";
}

$dbset=mysql_select_db("rating");
if(!$dbset)
{
	echo "erro selecting data base".mysql_error();
}



?>