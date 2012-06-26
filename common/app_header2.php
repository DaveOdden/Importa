<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php $info = pathinfo($_SERVER['PHP_SELF']); echo basename($_SERVER['PHP_SELF'],'.'.$info['extension']); ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=0.9">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="app_style.css">

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 <script>window.jQuery || document.write('<script src="../../js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
 <script>window.jQuery || document.write('<script src="../../js/libs/jquery-ui-1.8.18.custom.min.js"><\/script>')</script>

  <!-- <script src="js/libs/modernizr-2.5.3.min.js"></script> -->
 <script src="../../js/libs/jquery.ui.touch-punch.min.js"></script>
 <script src="../../js/libs/modernizr-2.5.3.min.js"></script>
 <script src="../../js/libs/jedit.js"></script>
 <script src="../../js/jquery.accordion.js"></script>
</head>
<body>
	
<?php
require("../../includes/functions.php");
dbConnect();
dbCheck();
?>

<div id="wrapper">
  <header id="top_bar">
	<div id="menu" class="mobile_btn">Menu</div>
	<h1><a href="http://localhost:8888/webapp/login.php" title="Importa - Home" class="logo">Importa</a></h1>
	<div id="dropdown_menu_btn" class="mobile_btn">Opt.</div>
	
	<div id="dropdown_options">
		<div id="nav">
			<?php
			//if a session is active, proceed to 
			if (!isset($_SESSION['SESS_USERNAME']))
			{
			?>
			<ul>											<li><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			<li><a id="login_btn" href="#">Log-In</a></li>
			<li id="signup_li"><a id="signup_btn" href="#">Sign Up</a></li>
			</ul>
			
			<div id="login_container">
				<span id="unicode_char">&#9650;</span>
				<div id="modal_bg">
					<div id="modal_content">
						<form action="login.php?loginAttempt=true" method="POST">
							<div>Username</div><input type="text" name="username" class="input"/><br />
							<div>Password</div><input type="password" name="password" class="input"/><br />
							<input type="submit" name="submit" value="Login" id="submit_btn"/>
						</form>
					</div> <!-- modal content -->
				</div> <!-- modal bg -->
			</div> <!-- login container -->
		</div> <!-- nav -->
			
			<div id="signup_container">
				<span id="unicode_char_2">&#9650;</span>
				<div id="modal_bg">
					<div id="modal_content">
						<form action="login.php#login_form" method="POST">
							Choose Username&nbsp;<input type=text name="username" class="input"><br/><br/>
							Choose Password&nbsp;&nbsp;&nbsp;<input type=password name="pass" class="input"><br/><br/>
							Verify Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=password name="pass2" class="input"><br/><br/>
							<input type=submit name="new_user_submit" value="Create Account" id="register_btn">
						</form> 
					</div> <!-- modal content -->
				</div> <!-- modal bg -->
			</div> <!-- signup container -->
			<?php
			}
			else if (isset($_SESSION['SESS_USERNAME']))
			{
			?>
			<ul>
				<li><img src="img/icons/tool_manager_icon.png" width="28px" style="margin-right: 3px;"><a class="loggedin_nav" href="http://localhost:8888/webapp/appmanager.php">App Manager</a></li>
				<li><img src="img/icons/settings_icon.png" width="28px"><a href="http://localhost:8888/webapp/settings.php">Settings</a></li>
				<li><img src="img/icons/logout_icon.png" width="28px"><a href="http://localhost:8888/webapp/common/logout.php">Log-Out</a></li>
			<ul>
			<?php
			}
			?>
      </div> <!-- drop down options -->
  </header> <!-- top bar -->
<noscript>This site just doesn't work, period, without JavaScript</noscript>