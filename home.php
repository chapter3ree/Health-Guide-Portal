<?php
include 'conn.php';
include 'check_login.php';

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$msg = 0;

if (isset($_POST['submit'])) {
	$efname = $_POST['fname'];
	$emname = $_POST['mname'];
	$elname = $_POST['lname'];
	$eaddress = $_POST['address'];
	$egender = $_POST['gender'];
	$edob = $_POST['dob'];
	$eheight = $_POST['height'];
	$eweight = $_POST['weight'];

	mysql_query("UPDATE users SET FName = '$efname', MName = '$emname', LName = '$elname', Address = '$eaddress', DoB = '$edob', Gender = '$egender', Height = '$eheight', Weight = '$eweight' WHERE Username = '$user' AND PassMd = '$pass'");

	if (mysql_error()) {
		$msg = 1;
		$message = mysql_error();
	} else {
		$msg = 2;
		$message = "Your Personal Information had been updated.";
	}
}

$q = mysql_query("SELECT * FROM users WHERE Username = '$user' AND PassMd = '$pass'");
$r = mysql_fetch_array($q);

$dob = $r['DoB'];
$height = $r['Height'];
$weight = $r['Weight'];
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
                         <li><a href="home.php">Profile</a>
                          <li><a class="active" href="security.php">Account</a></li>
                          <li><a href="plans.php">Plans</a></li>
                          <li><a href="logout.php">Logout</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </header>
		<!-- End Header -->

		<!-- content 	================================================== -->
		<div id="content">
			<div class="page-banner">
				<div class="container">
					<h2>Welcome <?php echo $r['FName']. " " .$r['LName']; ?></h2>
					<ul class="page-tree">
						<li><a href="#">Home</a></li>
					</ul>		
				</div>
			</div>
			<!-- blog-box Banner -->
			<div class="blog-box with-sidebar">
				<div class="container">
					<div class="row">
					<h4 >Profile</h4>
					<hr>
					<?php
					if ($msg == 1) {
						?>
						<div class="comment-form msg error"><?php echo $message; ?></div>
						<?php
					}
					else if ($msg == 2){
						?>
						<div class="comment-form msg Success"><?php echo $message; ?></div>
						<?php
					}
					?>
					<div class="tabs-widget widget">
						<ul class="tab-links">
							<li style="width: 25%;"><a class="tab-link1 active" href="#"> View</a></li>
							<li style="width: 25%;"><a class="tab-link2" href="#"> Update</a></li>
							<li><a class="tab-link3"> &nbsp;</a></li>
						</ul>
						<div class="tab-box">
							<div class="tab-content active">
								<div class="leave-comment">
									<h3>View Personal Information</h3>
									<form class="comment-form" method="post">
										<div class="row">
											<div class="col-md-10">
												<div class="col-md-10">
													<label style="float:left; width: 100%;">Name:</label>
													<p style="font-size: 16px; margin-left: 5%;">
														<?php
														echo $r['FName']. " " .$r['MName']. " " .$r['LName'];
														?>
													</p>
												</div>
												<div class="col-md-10">
													<label style="float:left; width: 100%;">Address:</label>
													<p style="font-size: 16px; margin-left: 5%;">
														<?php
														echo $r['Address'];
														?>
													</p>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Birth:</label>
													<p style="font-size: 16px; margin-left: 5%;">
														<?php
														echo date("M d, Y", strtotime($dob));
														?>
													</p>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Age:</label>
													<p style="font-size: 16px; margin-left: 5%;">
														<?php

														$birthdate = new DateTime($dob);
														$today   = new DateTime('today');
														$age = $birthdate->diff($today)->y;

														echo $age;
														?>
													</p>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Gender:</label>
													<p style="font-size: 16px; margin-left: 5%;">
														<?php
														echo $r['Gender'];
														?>
													</p>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Weight:</label>
													<p style="font-size: 16px; margin-left: 5%;">
														<?php
														if ($weight == "") {
															echo "Not yet defined.";
														} else {
															echo $weight. " kgs";
														}
														?>
													</p>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Height:</label>
													<p style="font-size: 16px; margin-left: 5%;">
														<?php
														if ($height == "") {
															echo "Not yet defined.";
														} else {
															echo $height. " cm";
														}
														?>
													</p>
												</div>
											
                                            </div>
                                            <div><h1>BMI</h1>
                                            <?php
											
											$bmi = ($weight / ($height * $height)) * 10000;
											echo "<h3>".$bmi."</h3>";
											
											if($bmi <= 18.5){
												echo "<h3 style='color:#252525;'>Weight Status:</h3> Underweight";
											}
											else if($bmi >= 18.6 && $bmi <= 24.9){
												echo "<h3 style='color:#252525;'>Weight Status:</h3> Normal";
											}
											
											else if($bmi >= 25.0 && $bmi <= 29.9){
												echo "<h3 style='color:#252525;'>Weight Status:</h3> Overweight";
											}
											else if($bmi >= 30){
												echo "<h3 style='color:#252525;'>Weight Status:</h3> Obese";
																							}
											else{
											echo "No data Yet";	
											}
											?>                                            
                                            </div>
										</div>
									</form>
								</div>
							</div>
							<div class="tab-content">
								<div class="leave-comment">
									<h3>Update Personal Information</h3>
									<form class="comment-form" method="post">
										<div class="row">
											<div class="col-md-10">
												<div class="col-md-10">
													<label style="float:left; width: 100%;">Name:</label>
													<input type="text" name="fname" placeholder="First Name" style="width: 30%; float: left; margin-left: 20px;" value="<?php echo $r['FName']; ?>" required/>
													<input type="text" name="mname" placeholder="Middle Name" style="width: 30%; float: left; margin-left: 20px;" value="<?php echo $r['MName']; ?>" required/>
													<input type="text" name="lname" placeholder="Family Name" style="width: 29%; float: left; margin-left: 20px;" value="<?php echo $r['LName']; ?>" required/>
												</div>
												<div class="col-md-10">
													<label style="float:left; width: 100%;">Address:</label>
													<input type="text" name="address" placeholder="Address" style="width: 94%; float: left; margin-left: 20px;" value="<?php echo $r['Address']; ?>" required/>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Gender:</label>
													<select name="gender" style="width: 87%; float: left; margin-left: 20px; margin-top: 0px;">
														<option><?php echo $r['Gender']; ?></option>
														<option>Male</option>
														<option>Female</option>
													</select>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Date of Birth:</label>
													<input type="text" name="dob" placeholder="yyyy-mm-dd" style="width: 90%; float: left; margin-left: 20px;" value="<?php echo $dob; ?>" required/>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Height (cm):</label>
													<input type="text" name="height" placeholder="Height" style="width: 90%; float: left; margin-left: 20px;" value="<?php echo $height; ?>" required/>
												</div>
												<div class="col-md-5">
													<label style="float:left; width: 100%;">Weight (kgs):</label>
													<input type="text" name="weight" placeholder="Weight" style="width: 90%; float: left; margin-left: 20px;" value="<?php echo $weight; ?>" required/>
												</div>
												<div class="col-md-10">
													<input type="reset" value="Reset" style="width: 15%; height: 55px; margin-right: 3%;"/>
													<input type="submit" name="submit" value="Update" style="width: 15%; height: 55px; margin-right: 3%;"/>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<!-- End content -->
        
		<!-- footer ================================================== -->
			<?php
			include 'inc/footer.php';
			?>
		<!-- End footer -->
	</div>
	<!-- End Container -->

</body>
</html>