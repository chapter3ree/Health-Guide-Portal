<?php
include 'conn.php';
include 'check_login.php';

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$msg = 0;

if (isset($_POST['submit'])) {
	$epass = md5($_POST['pass']);

	if ($epass != $pass) {
		$msg = 1;
		$message = "The current password you provided is not correct.";
	} else {
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];

		if ($pass1 != $_POST['pass2']) {
			$msg = 1;
			$message = "The new passwords you provided did not match.";
		} else {
			$email = $_POST['email'];
			$pass2 = md5($pass2);

			mysql_query("UPDATE users SET Pass = '$pass1', PassMd = '$pass2', Email = '$email' WHERE Username = '$user' AND PassMd = '$pass'");

			if (mysql_error()) {
				$msg = 1;
				$message = mysql_error();
			} else {
				$msg = 2;
				$message = "Your Security Information had been updated.";
			}
		}	
	}
}

$q = mysql_query("SELECT FName, LName, Email FROM users WHERE Username = '$user' AND PassMd = '$pass'");
$r = mysql_fetch_array($q);

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
        
		<!-- content ================================================== -->
		<div id="content">
			<div class="page-banner">
				<div class="container">
					<h2>Welcome <?php echo $r['FName']. " " .$r['LName']; ?></h2>
					<ul class="page-tree">
						<li><a href="#">Security</a></li>
					</ul>		
				</div>
			</div>
			<!-- blog-box Banner -->
			<div class="blog-box with-sidebar">
				<div class="container">
					<div class="row">
					<h4 >Security Information</h4>
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
					<div class="leave-comment">
						<h3>Update Security Information</h3>
						<form class="comment-form" method="post">
							<div class="row">
								<div class="col-md-10">
									<div class="col-md-10">
										<label style="float:left; width: 100%;">Username:</label>
										<input type="text" style="width: 94%; float: left; margin-left: 20px;" value="<?php echo $user; ?>" disabled/>
									</div>
									<div class="col-md-10">
										<label style="float:left; width: 100%;">Password:</label>
										<input type="password" name="pass" placeholder="Current Password" style="width: 94%; float: left; margin-left: 20px;" required/>
									</div>
									<div class="col-md-10">
										<label style="float:left; width: 100%;">Email:</label>
										<input type="email" name="email" placeholder="Email Address" style="width: 94%; float: left; margin-left: 20px;"/>
									</div>
									<div class="col-md-10">
										<label style="float:left; width: 100%;">New Password:</label>
										<input type="password" name="pass1" placeholder="New password" style="width: 94%; float: left; margin-left: 20px;"/>
									</div>
									<div class="col-md-10">
										<label style="float:left; width: 100%;">Retype Password:</label>
										<input type="password" name="pass2" placeholder="Confirm new password" style="width: 94%; float: left; margin-left: 20px;" required/>
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