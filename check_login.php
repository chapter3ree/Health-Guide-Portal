<?php

if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	
	$s=mysql_query("SELECT UserType FROM users WHERE Username ='$username' AND PassMd ='$password'");
	$count=mysql_num_rows($s);
	
	if($count==1){
		$q = mysql_fetch_array($s);

		$u = $q['UserType'];

		if ($q == "admin") {
			header("Location: admin/index.php");
		}
	}
}
else{
	session_destroy();

	header("Location: register.php");
}
