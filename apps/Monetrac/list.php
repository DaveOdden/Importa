<?php
require("../../functions.php");
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
		
		mysql_query("UPDATE Monetrac SET users_categories = '$newList' WHERE username = '$username'");
	}
?>