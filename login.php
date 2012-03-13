<?php require "common/header.php"; ?>
<?php include_once "common/app_nav.php"; ?>
<form action="login.php?loginAttempt=true" method="POST">
Username&nbsp;<input type=text name=username>
Password&nbsp;<input type=password name=password>
<input type=submit name=submit value="Log In">
<br/>
<br/>
No Login? <a href="login.php">Register</a>
</form>
<br/><br/>
<form action="login.php" method="POST">
Choose Username&nbsp;<input type=text name="username"><br/>
Choose Password&nbsp;<input type=password name="pass"><br/>
Verify Password&nbsp;<input type=password name="pass2"><br/>
<input type=submit name="new_user_submit" value="Create Profile">
</form>
<?php

if('http://localhost:8888/webapp/login.php' != $_SERVER['HTTP_REFERER'] && 'http://localhost:8888/webapp/common/logout.php' != $_SERVER['HTTP_REFERER'])
{
$_SESSION['SESS_PAGE'] = $_SERVER['HTTP_REFERER'];
}

if(isset($_REQUEST['loginAttempt']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string(md5($_POST['password']));
	$query = mysql_query("SELECT * FROM UserAccounts WHERE username='$username' AND password='$password'");
	$total = mysql_num_rows($query);
	if($total > 0)
	{
		session_start();
		$_SESSION['SESS_USERNAME'] = $username;
		
		if(isset($_SESSION['SESS_PAGE']))
		{
		?>
		    <script type="text/javascript">
			<!--
			window.location = "appmanager.php"
			//-->
			</script>
		<?php	
		}
		else
		{
		?>
		    <script type="text/javascript">
			<!--
			window.location = "index.php"
			//-->
			</script>
		<?php
		}
	}
	else
	{
		errorMsg('Username or password does not match what we have on file');
	}
}

//This code runs if the form has been submitted
if (isset($_POST['new_user_submit']))
{
	//form validation: empty fields
	if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] )
	{
 		die(errorMsg('You did not complete all of the required fields'));
 	}
	
	//grabbing username from user
	if (!get_magic_quotes_gpc())
	{
 		$_POST['username'] = addslashes($_POST['username']);
 	}

 $usercheck = $_POST['username'];
 
 //checks for a username match
 $check = mysql_query("SELECT username FROM UserAccounts WHERE username = '$usercheck'") 
	or die(errorMsg('Cannot connect to the database.. : /'));
 $check2 = mysql_num_rows($check);
 
 //form validation: if username exists
 if ($check2 != 0)
 {
	die(errorMsg('Sorry, the username '.$_POST['username'].' is already in use.'));
 }
 
 //form validation: password match
 if ($_POST['pass'] != $_POST['pass2'])
 {
	die(errorMsg('Your passwords did not match. '));
 }

$_POST['pass'] = md5($_POST['pass']);

 	if (!get_magic_quotes_gpc())
	{
 		$_POST['pass'] = addslashes($_POST['pass']);
 		$_POST['username'] = addslashes($_POST['username']);
 	}
		{
		$insert = "INSERT INTO UserAccounts (username, password, users_apps)
					VALUES ('".$_POST['username']."', '".$_POST['pass']."', '".''."')";
		
		$_SESSION['SESS_USERNAME'] = $_POST['username'];
		$add_member = mysql_query($insert);
		?>
		    <script type="text/javascript">
			<!--
			window.location = "index.php?newUser"
			//-->
			</script>
		<?php
		}
	}
	?>
<?php include_once "common/footer.php"; ?>