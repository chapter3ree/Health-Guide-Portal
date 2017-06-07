<!doctype html>
<html lang="en" class="no-js">
<head>
	<title>Health Guide Portal</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
</head>
<body>
	<!-- Container -->
	<div id="container">
		<!-- Header================================================== -->
		<header class="clearfix">
			<!-- Static navbar -->
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="top-line">
					<div class="container">
                    </div>
				</div>                
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img alt="" src="img/logo.png"></a>
					</div>                    
					<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<title><?php echo $pageTitle; ?></title>
                          <li class="drop"><a class="active" href="index.php">Home</a>                            
                          <li><a href="about.php">About HGP</a></li>
                        <li class="Fruits<?php if ($section == "Fruits") { echo " on"; } ?>"><a href="catalog.php?cat=Fruits">Fruits</a></li>
                <li class="Veges<?php if ($section == "Veges") { echo " on"; } ?>"><a href="catalog.php?cat=Veges">Veges</a></li>
                <li class="Grains<?php if ($section == "Grains") { echo " on"; } ?>"><a href="catalog.php?cat=Grains">Grains</a></li>
                <li class="suggest<?php if ($section == "suggest") { echo " on"; } ?>"><a href="suggest.php">Suggest</a></li>
                        <li><a class="active" href="register.php">Check/Enroll</a></li>
                  </ul>                              
			</div>
			</div>
		</header>
<head>	
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="header">
		<div class="wrapper">
			<ul class="nav">
            </ul>
		</div>
	</div>
	<div id="content">
