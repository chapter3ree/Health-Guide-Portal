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
      
                  <ul>                     
                      <li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300">
                         
                          <img alt="" src="img/1.gif" >


                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- End slider -->

      <!-- content  ================================================== -->
      <div id="content">

        
          <div class="welcome-box">
              <div class="container">
                  <h1>Hello And Welcome to The <span>Health Guide Portal</span></h1>
                  <p>Check, Plan and Track your BMI</p>
              </div>
          </div>

          
          <div class="services-box">
              <div class="container">
                  <div class="row">

                      <div class="col-md-4">
                          <div class="services-post">
                              <a class="services-icon1" href="#"><i class="fa fa-cogs"></i></a>
                              <div class="services-post-content">
                                  <h4><a href="catalog.php?cat=Grains">Grains</a></h4>
                                  <p>Health Guide Portal is a web app that let you check on your Health</p>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="services-post">
                              <a class="services-icon2" href="#"><i class="fa fa-desktop"></i></a>
                              <div class="services-post-content">
                                  <h4><a href="catalog.php?cat=Fruits">Fruits</a></h4>
                                  <p>Health Guide Portal suggests meals suitable for certain times.</p>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="services-post">
                              <a class="services-icon3" href="#"><i class="fa fa-book"></i></a>
                              <div class="services-post-content">
                                  <h4><a href="catalog.php?cat=Veges">Veges</a></h4>
                                  <p>With the help of Health Guide Portal you can easily track your Health</p>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
              <img class="shadow-image" alt="" src="img/shadow.png">
          </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
       <?php
       $pageTitle = "Personal Media Library";
$section = null;

 ?>
		<div class="section catalog random">

			<div class="wrapper">

				<h2>May we suggest something?</h2>

        <ul class="items">
            <?php
            $random = array_rand($catalog,4);
            foreach ($random as $id) {
                echo get_item_html($id,$catalog[$id]);
            }
            ?>							
				</ul>

			</div>

		</div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	   
     
   
                      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"></a>
                      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"></a>
    </div>
</div>
          </div>

          
      <?php
	  
      include 'inc/footer.php';
      ?>
<!-- End footer -->
  </div>
<!-- End Container -->

</body>
</html>