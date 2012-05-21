<?php include_once ("app_functions.php"); ?>
<?php include_once ("../../common/app_header.php"); ?>

<?php
session_start();
//if a session is active, proceed to 
if (!isset($_SESSION['SESS_USERNAME']))
{
	?>
	<script type="text/javascript">
	<!--
	window.location = "../../login.php"
	//-->
	</script>
	<?php
}

?>
<?php require ("../../common/app_nav.php"); ?>
		<h3>Monetrac</h3>
		<hr id="hr_adj"/>
		<table border="1">
		<?php
		
		$username = $_SESSION['SESS_USERNAME'];
		//if the user clicks "Add Category" execute the following code
		if(isset($_GET['add_cat']))
		{
			$user_data = mysql_query("SELECT * FROM Monetrac WHERE username = '$username'");
			
			if($data = mysql_fetch_array( $user_data )) 
			{
				//save db data into a string
				$user_cat_string = $data['user_categories'];
				//create an array of the exploded db data
				$exploded_array_categories = explode('-',$user_cat_string );
				//calculate how many categories the user has and add 1
				$new_cat_count = count($exploded_array_categories)+1;
				//make the last array position into a new row
				$exploded_array_categories[$new_cat_count] = "Click to Edit";	
				//implode the array
				$imploded_categories = implode("-", $exploded_array_categories);
				//update the db with the new data
				mysql_query("UPDATE Monetrac
						SET user_categories = '$imploded_categories'
						WHERE username = '$username'");
			}
			?>

			    <script type="text/javascript">
				<!--
				window.location = "monetrac.php"
				//-->
				</script>

			<?php
		}
		
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
		}
		//array of months
		$month_array = array("jan","feb","march","april", "may", "june", "july", "aug", "sept", "oct", "nov", "dec");
			
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
			echo '<tbody><tr>';
			//write each category to the screen
			echo '<td class="category" id="'.$x.'_0" style="background-color: #d7e2ec;"><img src="../../img/icons/reorder.png" alt="move" width="20" height="20" class="handle" />'.$exploded_array_category[$x-1] .'</td>';
			
			//loop through 12 times
			for($i=0;$i<12;$i++)
			{
				$t = $i + 1;
				//months array storage
				$month = $month_array[$i];
				//concatenating 
				$dynamic_month = "exploded_array_".$month;
				//storing the variable variable
				$array_temp = $$dynamic_month;
				//$x = the row in which the user clicked
				//$t = the column in which the user clicked
				//$array_temp[$x-1] = "exploded_array_" string concatenated with the month array (which loops through the 12 months)
				//CREATING A VARIABLE ON THE FLY!!!
				echo '<td class="" id="'.$x.'_'.$t.'">$ '.$array_temp[$x-1].'</td>';
			}

			$x++;
			$cat_count = $cat_count -  1;
			echo '</tr></tbody>';
		}
		?>
		<tr style="border-right: 1px white">
			<td><a href="?add_cat" class="add_cat">Add Category</a></td>
		<tr/>
		<tr>
			<td style="background-color: #d7ecd7;">TOTALS:</td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($jan_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($feb_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($march_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($april_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($may_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($june_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($july_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($aug_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($sept_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($oct_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($nov_total, 2, '.', ','); ?></td>
			<td style="background-color: #eaf1ea"><?php echo "$".number_format($dec_total, 2, '.', ','); ?></td>
		</tr>
		</table>
		<?php
		$x = 0;
		$user_data = mysql_query("SELECT * FROM Monetrac WHERE username = '$username'");
		
		if($info = mysql_fetch_array( $user_data )) 
		{
			//Categories
			$user_cat_string = $info['user_categories'];
			$exploded_array_category = explode('-',$user_cat_string );
			$cat_count = count($exploded_array_category);
		}

		//while the category count is not at zero (function decrements the count of categories)
		while($cat_count != 0)
		{
			//write table row to screen
			?>
			<table id="sortable">
			<tbody><tr>
			
			<td class="category"><img src="../../img/icons/reorder.png" alt="move" width="20" height="20" class="handle" /><?php echo $exploded_array_category[$x] ?></td>
			<?php
			$x++;
			$cat_count = $cat_count - 1;
		}
			?>
			</tr>
			</tbody>
		</table>
		<?php
		
		$user_cat_string = $_SESSION['cat_a'];
		//create an array of categories
		$exploded_array_category  = explode('-',$user_cat_string );
		$cat_count = count($exploded_array_category);
		echo '<br/>';
		for($i=0;$i<$cat_count;$i++)
		{
		echo '<p style="margin-left: 50px">'.$exploded_array_category[$i].':</p>';
		}
		?>
		<script type="text/javascript">
		$(document).ready(function () {
		
			//make table rows sortable  
			    $('#sortable tbody').sortable({  
			        start: function (event, ui) {  
			            //fix firefox position issue when dragging.  
			            if (navigator.userAgent.toLowerCase().match(/firefox/) && ui.helper !== undefined) {  
			                ui.helper.css('position', 'absolute').css('margin-top', $(window).scrollTop());  
			                //wire up event that changes the margin whenever the window scrolls.  
			                $(window).bind('scroll.sortableplaylist', function () {  
			                    ui.helper.css('position', 'absolute').css('margin-top', $(window).scrollTop());  
			                });  
			            }  
			        },  
			        beforeStop: function (event, ui) {  
			            //undo the firefox fix.  
			            if (navigator.userAgent.toLowerCase().match(/firefox/) && ui.offset !== undefined) {  
			                $(window).unbind('scroll.sortableplaylist');  
			                ui.helper.css('margin-top', 0);  
			            }  
			        },  
			
			
			        helper: function (e, ui) {  
			            ui.children().each(function () {  
			                $(this).width($(this).width());  
			            });  
			            return ui;  
			        },  
			        scroll: true,  
			        stop: function (event, ui) {  
			            //SAVE YOUR SORT ORDER                      
			        }  
			    }).disableSelection();
			
			
			$('.edit').editable('http://localhost:8888/webapp/apps/Monetrac/save_table_data.php', {
			         indicator: 'Saving',
			         tooltip  : 'Click to edit',
					 name     : 'value',
					 id 	  : 'id',
					 cssclass : 'someclass'
			     }); 
		});
		</script>
<?php include_once ("../../common/footer.php"); ?>