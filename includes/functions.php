<?php

//--------------------------------
//FUNCTIONS
//--------------------------------

//connection to the database
function dbConnect()
{
	$con = mysql_connect('localhost', 'root', 'root');
	
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}
}

//check to see if a UserAccounts database exists and create one if it does not
function dbCheck()
{
	@mysql_query("CREATE DATABASE IF NOT EXISTS webapp DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
	
	mysql_select_db('webapp');
	session_start();
	
	if(!mysql_num_rows( mysql_query("SHOW TABLES LIKE 'UserAccounts'")))
	{
		echo "creating tables. reload page to reconnect";
		$currentSession = $_SESSION['currentSession'];

		mysql_query("CREATE TABLE UserAccounts(
		ID INT NOT NULL AUTO_INCREMENT,
		username VARCHAR(40), 
		password VARCHAR(32),
		users_apps VARCHAR(255),
		PRIMARY KEY (ID))")
		 or die(mysql_error());
	}
	//else
		//echo "success! tables exist";
		
	if(!mysql_num_rows(mysql_query("SHOW TABLES LIKE 'UserSessions'")))
	{
		echo "creating tables. reload page to reconnect";
		$currentSession = $_SESSION['currentSession'];

		mysql_query("CREATE TABLE UserSessions(
		sessionID INT NOT NULL AUTO_INCREMENT,
		userName VARCHAR(32), 
		password VARCHAR(32),
		DATETIME INT(10),
		PRIMARY KEY (sessionID))")
		 or die(mysql_error());
	}
	//else
		//echo "success! tables exist<br/>";
}

//create Recent Site Activity tables
function createRecentSiteActivityTables()
{
	mysql_query("CREATE TABLE IF NOT EXISTS RecentSiteActivity(
	orderID INT NOT NULL AUTO_INCREMENT,
	customerName VARCHAR(32), 
	action VARCHAR(32),
	currentDate VARCHAR(32),
	time INT(10),
	location VARCHAR(32),
	user VARCHAR(32),
	PRIMARY KEY (orderID))");
}

//log user activity
function activityLog()
{
	if (isset($_SESSION['SESS_USERNAME']))
	{
		createRecentSiteActivityTables();
	
		mysql_query("INSERT INTO RecentSiteActivity (customerName, action, currentDate, location, user)
					VALUES ('".$_POST['customer_name']."', '".$_SESSION['action']."', '".date("F j, Y, g:i a")."', '".$_SESSION['location']."', '".$_SESSION['SESS_USERNAME']."')");
	}
}

function activateApp()
{
	// 1.store query string app=[appname] 2.store username 3.store users app list
	$app_tobe_activated = $_GET["app"];
	$username = $_SESSION['SESS_USERNAME'];	
	$users_apps_str = mysql_query("SELECT username, users_apps FROM UserAccounts WHERE username = '$username'");
	
	while($info = mysql_fetch_array( $users_apps_str )) 
	{
		$users_apps_str = $info['users_apps'];
	}
	
	//if the user doesn't have any apps
	//result: "app" instead of "-app" (deliniator)
	if('' == $users_apps_str)
	{
		$users_apps_str = $app_tobe_activated;
		mysql_query("UPDATE UserAccounts SET users_apps = '$users_apps_str' WHERE username = '$username'");
	}
	else if('' != $users_apps_str)
	{
		$users_apps_str = $users_apps_str."-".$app_tobe_activated;
		mysql_query("UPDATE UserAccounts SET users_apps = '$users_apps_str' WHERE username = '$username'");
	}
	?>

	    <script type="text/javascript">
		<!--
		window.location = "appmanager.php"
		//-->
		</script>

	<?php
}

function deactivateApp()
{
	$username = $_SESSION['SESS_USERNAME'];	
	$users_apps_str = mysql_query("SELECT username, users_apps FROM UserAccounts WHERE username = '$username'");

	if($info = mysql_fetch_array( $users_apps_str )) 
	{
		$users_apps_str = $info['users_apps'];
		$explodedArray = explode('-',$users_apps_str);
		$arrayCount = count($explodedArray);

		$i = 0;
		$x = 1;
		
		while ($x <= $arrayCount)
		{
		  if ($explodedArray[$i] == $_GET["app"])
		  {
			unset($explodedArray[$i]);
			//$explodedArray = array_values($explodedArray);
			//var_dump($explodedArray);
		  }
		$i++;
		$x++;
		}
		$implodedArray = implode("-", $explodedArray);
	}
	mysql_query("UPDATE UserAccounts SET users_apps = '$implodedArray' WHERE username = '$username'");
	?>

	    <script type="text/javascript">
		<!--
		window.location = "appmanager.php"
		//-->
		</script>

	<?php
}

function successMsg($msg)
{
	echo '<div class="success">Success! '.$msg.'</div>';
}

function errorMsg($msg)
{
	echo '<div class="errorMsg">Error! '.$msg.'</div>';
}

//closing the open connections
function closeConnections()
{
	mysql_close($conn);
	session_destroy();
}
?>