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
		<div id="confirm_header">Hey Wait!</div>
		 <div class="message">Are you sure you want to delete this category and all of its content?</div><br/>
		    <div class="buttons">
		        <span class="cancel button">No</span><span class="accept button">Yes</span>
		    </div>
		</div>
		<span id="controls">
		<a class="button" id="add_cat_btn">Add Category</a>
		<a id="edit_btn" class="button" onClick="$(this).hide(); $('#done_btn').css('visibility','visible'); $('#done_btn').show();">Sort & Delete Items</a>
		<a id="done_btn" class="button" onClick="$(this).hide(); $('#edit_btn').show();">Done Editing</a>
		</span>
		<h1 id="year">2012</h1>
			<?php include_once ("display_table_data.php"); ?>
		
		<script type="text/javascript">
		$(document).ready(function () {
			
			
		$("#edit_btn").click(function() {
			//$(this).removeClass('edit');
				$(".sortable #t_2").sortable( "enable" );
				$('#table').addClass('sortable');
				$('.category').addClass('hand_class');
				$('<img src="../../img/icons/reorder.png" alt="move" width="20" height="20" class="handle" />').appendTo('.category');
				$('.handle').hide().animate({ width: 'show' });
				$('<a class="delete" onClick="window.value1 = this.parentNode.id; $(\'#confirm\').css(\'display\',\'block\'); $(\'#dialog-overlay\').css(\'display\',\'block\');" title="Delete Row">x</a>').appendTo('.category');
				
				$(".sortable #t_2").each(
			    function(e) {
					//make table rows sortable  
				    $('.sortable #t_2').sortable({  
				        start: function (event, ui) {  
							//var rowsInitialPosition = ui.item.index();
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
				            var data = $('.sortable').sortable('serialize');
							
							alert("New position: " + ui.item.index());
							//alert(data);
							
							$.ajax({  
							  type: "POST",  
							  url: "store_row_order.php", 
							  data: { 'cat' : data },
						 	  success: function(event, ui)
							        {
								//alert('done');
							        }
							}); 
							return false;                 
				        }  
				    })
				});
			});
			
		$("#done_btn").click(function() {
				//$('.sortable #t_2').disableSelection();
				$(".sortable #t_2").sortable( "disable" );
				$('#table').removeClass('sortable');
				$('.category').removeClass('hand_class');
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
						$('#data_table').remove();
						$('#t_1').remove();
						$('#t_2').remove();
						$('#t_3').remove();
						$('#year').after($("<span id='data_table'>").load("display_table_data.php"));
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
						$('#data_table').remove();
						$('#t_1').remove();
						$('#t_2').remove();
						$('#t_3').remove();
						$('#year').after($("<span id='data_table'>").load("display_table_data.php"));
						//$('#t_1').load('display_table_data.php');
			        }
			}); 
			return false;
		});
		
		$(".cancel").click(function() {
			$('#confirm').css('display','none');
			$('#dialog-overlay').css('display','none');
		});
	});
</script>
<?php include_once ("../../common/footer.php"); ?>