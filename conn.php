<?php
session_start();
localtime();
$hostname="localhost";
$user="root";
$password="";
$database="dbnutcal";

if (!($con_db=mysql_connect($hostname,$user,$password))){
die("Can't connect to database!");
}
else{
	if(!( mysql_select_db("$database",$con_db))){
die("Can't connect to database!");

	}
}

date_default_timezone_set('Asia/Manila');