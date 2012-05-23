<table border="1" id="table">
<tbody id="t_1">
	<tr>
		<th> </th>
		<th>Jan.</th>
		<th>Feb.</th>
		<th>March</th>
		<th>April</th>
		<th>May</th>
		<th>June</th>
		<th>July</th>
		<th>Aug.</th>
		<th>Sept.</th>
		<th>Oct.</th>
		<th>Nov.</th>
		<th>Dec.</th>
	</tr>
</tbody>

<tbody id="t_2">

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
	}
	
	//array of months
	$month_array = array("jan","feb","march","april", "may", "june", "july", "aug", "sept", "oct", "nov", "dec");
	$_SESSION['month_array'] = $month_array;
	
	//variable declaration	
	$x = 1;
	//pull db data
	$db_data = mysql_query("SELECT * FROM Monetrac WHERE username = '$username'");

	//if content resides in db
	if($info = mysql_fetch_array( $db_data )) 
	{
		//store categories into a string
		$user_cat_string = $info['user_categories'];
		$_SESSION['cat_a'] = $user_cat_string;
		//create an array of categories
		$exploded_array_category = explode('-',$user_cat_string );
		//get a category count
		$cat_count = count($exploded_array_category);
	}

	//while the category count is not at zero (function decrements the count of categories)
	while($cat_count != 0)
	{
		//write table row to screen
		echo '<tr>';
		//write each category to the screen
		echo '<td class="edit category" id="'.$x.'_0" style="background-color: #d7e2ec;">'.$exploded_array_category[$x-1] .'</td>';
	
		//loop through 12 times
		for($i=0;$i<12;$i++)
		{
			$c = $i + 1;
			//months array storage
			$month = $month_array[$i];
			//concatenating 
			$dynamic_month = "exploded_array_".$month;
			//storing the variable variable
			$array_temp = $$dynamic_month;
			//$x = the row in which the user clicked
			//$c = the column in which the user clicked
			//$array_temp[$x-1] = "exploded_array_" string concatenated with the month array (which loops through the 12 months)
			echo '<td class="edit cell" id="'.$x.'_'.$c.'">'.$array_temp[$x-1].'</td>';
			//$_SESSION['clicked_row'] = $x;
			//$_SESSION['clicked_column'] = $c;
		}

		$x++;
		$cat_count = $cat_count -  1;
		echo '</tr>';
}
include_once ("refresh_totals.php");

?>

</table>

<script type="text/javascript">
$(document).ready(function () {

	$('.edit').editable('http://localhost:8888/webapp/apps/Monetrac/save_table_data.php', {
         indicator: '<img src="loading.gif">',
         tooltip  : 'Click to edit',
		 name     : 'value',
		 id 	  : 'id',
		 cssclass : 'someclass',
		 onblur : 'cancel', 
		 callback: function(value, settings) {
			if ($(this).hasClass('cell')) {
				$('#data_table').remove();
				$('#t_1').remove();
				$('#t_2').remove();
				$('#t_3').remove();
				$('#year').after($("<span id='data_table'>").load("display_table_data.php"));
				//$("#table2").html($("#table2").load('refresh_totals.php')); 
				}
	   	   }
     });
});
</script>