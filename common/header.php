<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><!-- $page_name--></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=0.9">
  <link rel="stylesheet" href="css/style.css">

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-ui-1.8.18.custom.min.js"><\/script>')</script>
 <script src="js/libs/jquery.ui.touch-punch.min.js"></script>

 <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
	
<?php
require("includes/functions.php");
dbConnect();
dbCheck();
?>

<div id="wrapper">
  <header id="top_bar">
			<h1>Importa</h1>
		<div id="nav">
			<ul>
				<?php
				//if a session is active, proceed to 
				if (!isset($_SESSION['SESS_USERNAME']))
				{
				?>
				<li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
				<li><a href="user_registration.php">Sign Up</a></li>
				<li><a href="common/logout.php" >Log-In</a></li>
				<?php
				}
				else if (isset($_SESSION['SESS_USERNAME']))
				{
				?>
				<li><a href="appmanager.php">App Manager</a></li>
				<li><a href="settings.php">Settings</a></li>
				<li><a href="common/logout.php" >Log-Out</a></li>
				<?php
				}
				?>
			</ul>
		</div>
  </header>
<noscript>This site just doesn't work, period, without JavaScript</noscript>