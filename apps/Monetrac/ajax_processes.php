<?php

$con = mysql_connect('localhost', 'root', 'root');

if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("webapp", $con);
session_start();

$username = $_SESSION['SESS_USERNAME'];


if(isset($_POST['add_cat']))
{
	//mysql_select_db('webapp');
	
	$x = 1;
	$user_data = mysql_query("SELECT * FROM Monetrac WHERE username = '$username'");
	
	if($data = mysql_fetch_array( $user_data )) 
	{
		//save db data into a string
		$user_cat_string = $data['user_categories'];
		$user_data_jan = $data['user_data_jan'].'-';
		$user_data_feb = $data['user_data_feb'].'-';
		$user_data_march = $data['user_data_march'].'-';
		$user_data_april = $data['user_data_april'].'-';
		$user_data_may = $data['user_data_may'].'-';
		$user_data_june = $data['user_data_june'].'-';
		$user_data_july = $data['user_data_july'].'-';
		$user_data_aug = $data['user_data_aug'].'-';
		$user_data_sept = $data['user_data_sept'].'-';
		$user_data_oct = $data['user_data_oct'].'-';
		$user_data_nov = $data['user_data_nov'].'-';
		$user_data_dec = $data['user_data_dec'].'-';
		//create an array of the exploded db data
		$exploded_array_categories = explode('-',$user_cat_string );
		//calculate how many categories the user has and add 1
		$new_cat_count = count($exploded_array_categories)+1;
		//make the last array position into a new row
		$exploded_array_categories[$new_cat_count] = "Click to Edit";
		
		//loop through 12 times
		for($i=0;$i<12;$i++)
		{
			$t = $i + 1; //starts at 1
			//months array storage
			$month = $month_array[$i];
			//concatenating 
			$dynamic_month = "exploded_array_".$month;
			//storing the variable variable
			$array_temp = $$dynamic_month;
			//$x = the row in which the user clicked
			//$t = the column in which the user clicked
			//$array_temp[$x-1] = "exploded_array_" string concatenated with the month array (which loops through the 12 months)
			echo '<td class="edit cell" id="'.$x.'_'.$t.'">'.$array_temp[$x-1].'</td>';
		}
		
		//implode the array
		$imploded_categories = implode("-", $exploded_array_categories);
		//update the db with the new data
		mysql_query("UPDATE Monetrac
				SET user_categories = '$imploded_categories',
				user_data_jan = '$user_data_jan',
				user_data_feb = '$user_data_feb',
				user_data_march = '$user_data_march',
				user_data_april = '$user_data_april',
				user_data_may = '$user_data_may',
				user_data_june = '$user_data_june',
				user_data_july = '$user_data_july',
				user_data_aug = '$user_data_aug',
				user_data_sept = '$user_data_sept',
				user_data_oct = '$user_data_oct',
				user_data_nov = '$user_data_nov',
				user_data_dec = '$user_data_dec'
				WHERE username = '$username'");
				
	
	}
	else
	{
		mysql_query("INSERT INTO Monetrac
		(username, user_categories, user_data_jan, user_data_feb, user_data_march, user_data_april, user_data_may, user_data_june, user_data_july, user_data_aug, user_data_sept, user_data_oct, user_data_nov, user_data_dec)
	VALUES ('".$_SESSION['SESS_USERNAME']."', 'Click to Edit', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-')");
	
	
	}
}

?>