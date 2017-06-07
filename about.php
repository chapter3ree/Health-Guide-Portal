<?php
include "conn.php";
include 'check.php';
include("inc/data.php");
include("inc/functions.php");
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
      <!-- Header
          ================================================== -->
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

			<!-- Page Banner --><!-- blog-box Banner -->
			<div class="blog-box with-sidebar">
				<div class="container">
					<div class="row">

						
				
				</div>
			</div>

		</div>
		<!-- End content -->


	<!-- footer ================================================== -->
    <footer>
      <?php
      include 'inc/footer.php';
      ?>
	</footer>
	<!-- End footer -->
	</div>
	<!-- End Container -->

</body>
</html>