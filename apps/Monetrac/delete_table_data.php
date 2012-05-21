<?php
$con = mysql_connect('localhost', 'root', 'root');

if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("webapp", $con);
session_start();

$username = $_SESSION['SESS_USERNAME'];
$table_field = $_POST['value'];

$needle = 'id';
$index_number = substr($table_field, 0, 1);
$row_num = $index_number;
$index = $index_number - 1;

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

	$username = $info['username'];

	$month_array = array("jan","feb","march","april", "may", "june", "july", "aug", "sept", "oct", "nov", "dec");

	unset($exploded_category[$index]);
	$imploded_cat = implode("-", $exploded_category);
	
	unset($exploded_array_jan[$index]);
	$imploded_jan = implode("-", $exploded_array_jan);
	
	unset($exploded_array_feb[$index]);
	$imploded_feb = implode("-", $exploded_array_feb);
	
	unset($exploded_array_march[$index]);
	$imploded_march = implode("-", $exploded_array_march);
	
	unset($exploded_array_april[$index]);
	$imploded_april = implode("-", $exploded_array_april);
	
	unset($exploded_array_may[$index]);
	$imploded_may = implode("-", $exploded_array_may);
	
	unset($exploded_array_june[$index]);
	$imploded_june = implode("-", $exploded_array_june);
	
	unset($exploded_array_july[$index]);
	$imploded_july = implode("-", $exploded_array_july);
	
	unset($exploded_array_aug[$index]);
	$imploded_aug = implode("-", $exploded_array_aug);
	
	unset($exploded_array_sept[$index]);
	$imploded_sept = implode("-", $exploded_array_sept);
	
	unset($exploded_array_oct[$index]);
	$imploded_oct = implode("-", $exploded_array_oct);
	
	unset($exploded_array_nov[$index]);
	$imploded_nov = implode("-", $exploded_array_nov);
	
	unset($exploded_array_dec[$index]);
	$imploded_dec = implode("-", $exploded_array_dec);
	
	mysql_query("UPDATE Monetrac
			SET user_categories = '$imploded_cat',
			user_data_jan = '$imploded_jan',	
			user_data_feb = '$imploded_feb',
			user_data_march = '$imploded_march',
			user_data_april = '$imploded_april',
			user_data_may = '$imploded_may',
			user_data_june = '$imploded_june',
			user_data_july = '$imploded_july',
			user_data_aug = '$imploded_aug',
			user_data_sept = '$imploded_sept',
			user_data_oct = '$imploded_oct',
			user_data_nov = '$imploded_nov',
			user_data_dec = '$imploded_dec'								
			WHERE username = '$username'");
}
?>