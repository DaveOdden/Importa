<?php
$con = mysql_connect('localhost', 'root', 'root');

if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("webapp", $con);
session_start();

$username = $_SESSION['SESS_USERNAME'];
$update = $_POST['cat'];


mysql_query("UPDATE Monetrac
SET user_categories = 'blow-ducks-fir'
WHERE username = '$username'");
?>