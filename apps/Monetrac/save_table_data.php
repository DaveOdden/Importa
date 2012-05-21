<?php
$con = mysql_connect('localhost', 'root', 'root');

if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("webapp", $con);
session_start();

$username = $_SESSION['SESS_USERNAME'];
$passed_data = $_POST['value'];
$table_field = $_POST['id'];
$needle = 'id';
$index_number = substr($table_field, 0, 1);
$row_num = $index_number;
$index_number = $index_number - 1;

$username = $_SESSION['SESS_USERNAME'];
$db_data = mysql_query("SELECT * FROM Monetrac WHERE username = '$username'");

if($info = mysql_fetch_array( $db_data )) 
{
	//Categories
	$user_cat_string = $info['user_categories'];
	$exploded_category = explode('-',$user_cat_string );
	
	//January
	$user_data_jan_string = $info['user_data_jan'];
	$exploded_array_jan = explode('-',$user_data_jan_string );
	//February
	$user_data_feb_string = $info['user_data_feb'];
	$exploded_array_feb = explode('-',$user_data_feb_string );
	//March
	$user_data_march_string = $info['user_data_march'];
	$exploded_array_march = explode('-',$user_data_march_string );
	//April
	$user_data_april_string = $info['user_data_april'];
	$exploded_array_april = explode('-',$user_data_april_string );
	//May
	$user_data_may_string = $info['user_data_may'];
	$exploded_array_may = explode('-',$user_data_may_string );
	//June
	$user_data_june_string = $info['user_data_june'];
	$exploded_array_june = explode('-',$user_data_june_string );
	//July
	$user_data_july_string = $info['user_data_july'];
	$exploded_array_july = explode('-',$user_data_july_string );
	//August
	$user_data_aug_string = $info['user_data_aug'];
	$exploded_array_aug = explode('-',$user_data_aug_string );
	//September
	$user_data_sept_string = $info['user_data_sept'];
	$exploded_array_sept = explode('-',$user_data_sept_string );
	//October
	$user_data_oct_string = $info['user_data_oct'];
	$exploded_array_oct = explode('-',$user_data_oct_string );
	//Novemeber
	$user_data_nov_string = $info['user_data_nov'];
	$exploded_array_nov = explode('-',$user_data_nov_string );
	//December
	$user_data_dec_string = $info['user_data_dec'];
	$exploded_array_dec = explode('-',$user_data_dec_string );
}

$username = mysql_query("SELECT username FROM Monetrac WHERE username = '$username'"); 

while($infos = mysql_fetch_array( $username ))
{
	$username = $infos['username'];
}

//Cateogry Data
if (preg_match("/_0/", $table_field))
{
	//bring in the existing array
	$exploded_category[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_category = implode("-", $exploded_category);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories)
			VALUES ('".$_SESSION['SESS_USERNAME']."', '".$imploded_category."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_categories = '$imploded_category'
			WHERE username = '$username'");
		echo $passed_data;
	}
}

//January Data
if (preg_match("/_1/", $table_field) && 3 == strlen($table_field))
{
	//bring in the existing array
	$exploded_array_jan[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_jan = implode("-", $exploded_array_jan);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_data_jan)
			VALUES ('".$_SESSION['SESS_USERNAME']."','".$imploded_array_jan."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_jan = '$imploded_array_jan'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//February Data
if (preg_match("/_2/", $table_field))
{
	//bring in the existing array
	$exploded_array_feb[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_feb = implode("-", $exploded_array_feb);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_feb)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_feb."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_feb = '$imploded_array_feb'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//March Data
if (preg_match("/_3/", $table_field))
{
	//bring in the existing array
	$exploded_array_march[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_march = implode("-", $exploded_array_march);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_march)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_march."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_march = '$imploded_array_march'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//April Data
if (preg_match("/_4/", $table_field))
{
	//bring in the existing array
	$exploded_array_april[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_april = implode("-", $exploded_array_april);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_april)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_april."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_april = '$imploded_array_april'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//May Data
if (preg_match("/_5/", $table_field))
{
	//bring in the existing array
	$exploded_array_may[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_may = implode("-", $exploded_array_may);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_may)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_may."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_may = '$imploded_array_may'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//June Data
if (preg_match("/_6/", $table_field))
{
	//bring in the existing array
	$exploded_array_june[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_june = implode("-", $exploded_array_june);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_june)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_june."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_june = '$imploded_array_june'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//July Data
if (preg_match("/_7/", $table_field))
{
	//bring in the existing array
	$exploded_array_july[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_july = implode("-", $exploded_array_july);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_july)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_july."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_july = '$imploded_array_july'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//August Data
if (preg_match("/_8/", $table_field))
{
	//bring in the existing array
	$exploded_array_aug[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_aug = implode("-", $exploded_array_aug);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_aug)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_aug."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_aug = '$imploded_array_aug'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//September Data
if (preg_match("/_9/", $table_field))
{
	//bring in the existing array
	$exploded_array_sept[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_sept = implode("-", $exploded_array_sept);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_sept)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_sept."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_sept = '$imploded_array_sept'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//October Data
if (preg_match("/_10/", $table_field))
{
	//bring in the existing array
	$exploded_array_oct[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_oct = implode("-", $exploded_array_oct);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_oct)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_oct."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_oct = '$imploded_array_oct'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//November Data
if (preg_match("/_11/", $table_field))
{
	//bring in the existing array
	$exploded_array_nov[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_nov = implode("-", $exploded_array_nov);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_nov)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_nov."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_nov = '$imploded_array_nov'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}

//December Data
if (preg_match("/_12/", $table_field))
{
	//bring in the existing array
	$exploded_array_dec[$index_number] = $passed_data;

	//implode the array of the edited month
	$imploded_array_dec = implode("-", $exploded_array_dec);
	
	//Is there already data for that user?
	if (strpos($username,$needle) !== false)
	{
	mysql_query("INSERT INTO Monetrac (username, user_categories, user_data_dec)
			VALUES ('".$_SESSION['SESS_USERNAME']."', 'test', '".$imploded_array_dec."')");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
	else
	{
	mysql_query("UPDATE Monetrac
			SET user_data_dec = '$imploded_array_dec'
			WHERE username = '$username'");
		echo preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $passed_data);
	}
}
?>