<?php
require("includes/functions.php");
dbConnect();
dbCheck();

$username =$_SESSION['SESS_USERNAME'];

if (isset($_POST['list']))
	{
		$list = $_POST['list'];
		$output = array();
		$list = parse_str($list, $output);
		print_r($output);
		
		$newList = implode("-", $output['app']);
		
		mysql_query("UPDATE UserAccounts SET users_apps = '$newList' WHERE username = '$username'");
	}
?>