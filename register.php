<?php
include "conn.php";
include 'check.php';

$message = "";
$msg = 0;
if(isset($_POST['submit'])){
	$uname = $_POST['user'];
	$pword = md5($_POST['pass']);

	$q = mysql_query("SELECT UserType FROM users WHERE Username = '$uname' AND PassMd = '$pword'") or die(mysql_error());
	$num = mysql_num_rows($q);

	$msg = 1;
	if ($num == 1) {
		$rec = mysql_fetch_array($q);
		$type = $rec['UserType'];

		$_SESSION['user'] = $uname;
		$_SESSION['pass'] = $pword;
		$_SESSION['type'] = $type;

		if ($type == "admin") {
			header("Location: admin/index.php");
		} else {
			header("Location: home.php");
		}
	} else {
		session_destroy();
		$msg = 1;
		$message = "Username or Password is not valid.";
	}
}
else if (isset($_POST['sign'])) {
	$reg_user = $_POST['reg_username'];

	$q_user = mysql_query("SELECT Nr FROM users WHERE Username = '$reg_user'");

	$n = mysql_num_rows($q_user);

	if ($n > 0) {
		$msg = 1;
		$message = "The username you provided is not available. Choose another." . mysql_error();
	} else {
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$address = $_POST['address'];
		$reg_pass = $_POST['reg_pass'];
		$md_pass = md5($reg_pass);

		mysql_query("INSERT INTO users (FName, MName, LName, DoB, Gender, Height, Weight, Address, UserType, Username, Pass, PassMd) VALUES ('$fname', '$mname', '$lname', '$dob', '$gender','$height','$weight', '$address', 'user', '$reg_user', '$reg_pass', '$md_pass')");

		if (mysql_error()) {
			$msg = 1;
			$message = mysql_error();
		} else {
			$_SESSION['user'] = $reg_user;
			$_SESSION['pass'] = $md_pass;
			$_SESSION['type'] = "user";
			header("Location: home.php");
		}
	}
}
?>
<!doctype html>
<head>
  <title>Health Guide Portal</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/fullwidth.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
</head>
<body>

  <!-- Container -->
  <div id="container">
      <!-- Header ================================================== -->
      <header class="clearfix">
          <!-- Static navbar -->
          <div class="navbar navbar-default navbar-fixed-top">
              
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="index.php"><img alt="" src="img/logo.png"></a>
                  </div>
                  <div class="navbar-collapse collapse">
                      <ul class="nav navbar-nav navbar-right">
                          <li><a class="active" href="index.php">Home</a>
                          <li><a href="about.php">About HGP</a></li>
                          <li><a href="catalog.php?cat=Fruits">Fruits</a></li>
                          <li><a href="catalog.php?cat=Grains">Grains</a></li>
                          <li><a href="catalog.php?cat=Veges">Veges</a></li>
                          <li><a href="register.php">Check/Enroll</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </header>
		<!-- End Header -->

		<!-- content ================================================== -->
		<div id="content">

			<!-- Page Banner -->
			<div class="page-banner">
				<div class="container">
					<h2>Login/Registration Page</h2>
					<ul class="page-tree">
						<li><a href="index.php">Home</a></li>
					 <li><a href="register.php">Login/Register</a></li> 
					</ul>		
				</div>
			</div>                            
			
				<h3>Login</h3>
				<?php
				if ($msg == 1) {
					?>
					<div class="comment-form msg error"><?php echo $message; ?></div>
					<?php
				}
				?>
				<form class="comment-form" method="post">
				
                        	<input type="text" name="user" id="username" placeholder="Username" style="width: 29%; float: left; margin-left: 20px;" required autofocus/>
							<input type="password" name="pass" placeholder="Password" style="width: 29%; float: left; margin-left: 20px;" required/>
							<input type="submit" name="submit" value="login" style="width: 15%; float: left; margin-left: 20px; height: 55px;"/>
						</div>
					</div>
				</form>
			</div>			
				<h3>Register</h3>
				<form class="comment-form" method="post">		
								<label style="float:left; width: 100%;">Name:</label>
								<input type="text" name="fname" placeholder="First Name" style="width: 30%; float: left; margin-left: 20px;" required/>
								<input type="text" name="mname" placeholder="Middle Name" style="width: 30%; float: left; margin-left: 20px;" required/>
								<input type="text" name="lname" placeholder="Family Name" style="width: 29%; float: left; margin-left: 20px;" required/>
							</div>
							
								<label style="float:left; width: 100%;">Date of Birth:</label>
								<input type="text" name="dob" placeholder="yyyy-mm-dd" style="width: 90%; float: left; margin-left: 20px;" required/>
							</div>
							
								<label style="float:left; width: 100%;">Gender:</label>
								<select name="gender" style="width: 27%; float: left; margin-left: 20px; margin-top: 0px;">
									<option>Male</option>
									<option>Female</option>
								</select>
							</div>
                            
                            <div class="col-md-10">
													<label style="float:left; width: 100%;">Height (cm):</label>
													<input type="number" name="height" placeholder=""  required/>
												</div>
												<div class="col-md-10">
													<label style="float:left; width: 100%;">Current Weight (Kgs):</label>
													<input type="number" name="weight" placeholder=""  required/>
												</div>
							<div class="col-md-10">
								<label style="float:left; width: 100%;">Address:</label>
								<input type="text" name="address" placeholder="Address" style="width: 94%; float: left; margin-left: 20px;" required/>
							</div>
							<div class="col-md-10">
								<label style="float:left; width: 100%;">Desired Username:</label>
	                        	<input type="text" name="reg_username" id="reg_username" placeholder="Username" style="width: 94%; float: left; margin-left: 20px;" required/>
							</div>
							<div class="col-md-10">
								<label style="float:left; width: 100%;">Desired Password:</label>
								<input type="password" name="reg_pass" id="reg_pass" placeholder="Password" style="width: 94%; float: left; margin-left: 20px;" required/>
								<input type="submit" name="sign" value="sign up" style="width: 15%; height: 55px; margin-right: 3%;"/>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
			<?php
			include 'inc/footer.php';
			?>
</body>
</html>