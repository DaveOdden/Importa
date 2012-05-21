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
<div id="dialog-overlay"></div>
		<h3>Monetrac</h3>
		<hr id="hr_adj"/>
		<div id="confirm" style="display:none;">
		 <div class="message">Are you sure you want to delete this category and all of its content?</div><br/>
		    <div class="buttons">
		        <span class="cancel button">No</span><span class="accept button">Yes</span>
		    </div>
		</div>
		<span id="controls">
		<a class="button" id="add_cat_btn">Add Category</a>
		<a id="edit_btn" class="button" onClick="$(this).hide(); $('#done_btn').css('visibility','visible'); $('#done_btn').show();">Edit Table</a>
		<a id="done_btn" class="button" onClick="$(this).hide(); $('#edit_btn').show();">Done Editing</a>
		</span>
		<h1 id="year">2012</h1>
			<table border="1" id="table">
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
			<tbody id="t_1">
				<?php include_once ("display_table_data.php"); ?>	
			</tbody>
			<tr>
				<td style="background-color: #d7ecd7;">TOTALS:</td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($jan_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($feb_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($march_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($april_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($may_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($june_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($july_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($aug_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($sept_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($oct_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($nov_total, 2, '.', ','); ?></td>
				<td class="cell" style="background-color: #eaf1ea"><?php echo number_format($dec_total, 2, '.', ','); ?></td>
			</tr>
			</table>
		<script type="text/javascript">
		$(document).ready(function () {
			
		$("#edit_btn").click(function() {
			//$(this).removeClass('edit');
				$('#table').addClass('sortable');
				$('<img src="../../img/icons/reorder.png" alt="move" width="20" height="20" class="handle" />').appendTo('.category');
				$('.handle').hide().animate({ width: 'show' });
				$('<a class="delete" onClick="window.value1 = this.parentNode.id; $(\'#confirm\').css(\'display\',\'block\'); $(\'#dialog-overlay\').css(\'display\',\'block\');" title="Delete Row">x</a>').appendTo('.category');
				
				$(".sortable tbody").each(
			    function(e) {
					//make table rows sortable  
				    $('.sortable tbody').sortable({  
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
							  
				            //SAVE SORT ORDER                      
				        }  
				    }).disableSelection();
				});
			});
			
		$("#done_btn").click(function() {
			//$(this).addClass('edit');
				$('.sortable').disableSelection();
				$('#table').removeClass('sortable');
				//$('.handle').slideToggle();
				$('.handle').remove();
				$('.delete').remove();
			});
			
			
		$("#add_cat_btn").click(function() {
			var dataString = 'add_cat';
			
			$.ajax({  
			  type: "POST",  
			  url: "ajax_processes.php",  
			  data: { 'add_cat': dataString },
			  cache: false,
			  success: function()
			        {
						$('#t_1').load('display_table_data.php');
			        }
			});  
			return false;
		});
		
		$(".accept").click(function() {
			var value = window.value1;
			
			$.ajax({  
			  type: "POST",  
			  url: "delete_table_data.php",  
			  data: { 'value': value },
			  success: function()
			        {
						$('#confirm').hide();
						$('#dialog-overlay').hide();
						$('#done_btn').hide(); $('#edit_btn').show();
						$('#t_1').load('display_table_data.php');
			        }
			}); 
			return false;
		});
	});
</script>
<?php include_once ("../../common/footer.php"); ?>