<?php

$con = mysql_connect('localhost', 'root', 'root');

if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("webapp", $con);
session_start();

$username = $_SESSION['SESS_USERNAME'];
$user_data = mysql_query("SELECT * FROM Monetrac WHERE username = '$username'");
	
	if($info = mysql_fetch_array( $user_data )) 
	{
		//Categories
		$user_cat_string = $info['user_categories'];
		$exploded_array_category = explode('-',$user_cat_string );
	
			//REFACTOR
	
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
	
		$cat_count = count($exploded_array_jan);
		for($x=0;$x<$cat_count;$x++)
		{
			//REFACTOR
			$jan_total += $exploded_array_jan[$x];
			$feb_total += $exploded_array_feb[$x];
			$march_total += $exploded_array_march[$x];
			$april_total += $exploded_array_april[$x];
			$may_total += $exploded_array_may[$x];
			$june_total += $exploded_array_june[$x];
			$july_total += $exploded_array_july[$x];
			$aug_total += $exploded_array_aug[$x];
			$sept_total += $exploded_array_sept[$x];
			$oct_total += $exploded_array_oct[$x];
			$nov_total += $exploded_array_nov[$x];
			$dec_total += $exploded_array_dec[$x];
		}

		echo '<tr id="totals2">';
		echo '<td style="background-color: #d7ecd7;">TOTALS:</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($jan_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($feb_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($march_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($april_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($may_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($june_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($july_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($aug_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($sept_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($oct_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($nov_total, 2, '.', ',') .'</td>';
		echo '<td class="cell" style="background-color: #eaf1ea">'. number_format($dec_total, 2, '.', ',') .'</td>';
		echo '</tr>';
		
	}

?>