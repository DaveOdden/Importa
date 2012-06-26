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

//if the submit button has been clicked
if (isset($_POST['submit_entry']))
{
	$username = $_SESSION['SESS_USERNAME'];
	{
	//insert form fields into Journal table for active user
	mysql_query("INSERT INTO Journal (usersname, entry_title, entry_content, entry_timestamp)
				VALUES ('".$username."', '".$_POST['entry_title']."', '".$_POST['entry_content']."', '".date("F j, Y, g:i a")."')");
	}
	?>
	    <script type="text/javascript">
		<!--
		window.location = "Journal.php?success"
		//-->
		</script>
    <?php
	}
?>
<?php require ("../../common/app_nav.php"); ?>
		<h3 id="app_name">Journal</h3>
		<?php
		if (isset($_REQUEST["success"]))
		{
			successMsg('Congrats! Your entry has been stored.');
		}
		?>
		<button id="opener" class="button_style blue_btn" onClick="javascript:newEntry()">Write New Entry</button>
		<hr id="hr_adj"/>
		<div id="dialog-overlay"></div>
		<div id="dialog-box">
		    <div class="dialog-content">
		        <div id="journal_form_container" title="New Journal Entry">
					<form id="journal_form" action="journal.php" method="POST">
						<input type="text" class="text_box subject_line" name="entry_title" value="Journal Entry Title"
							onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/><br /><br />
						<textarea rows="10" cols="30" class="text_box" name="entry_content"
							onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">Journal Entry Content</textarea>
						<input type="submit" class="button_style green_btn" name="submit_entry" value="Submit Entry">
						<input type="button" class="button_style red_btn" name="cancel" value="Cancel">
					</form>
				</div>
	
		    </div>
		</div>		
		<div id="journal_entry_container">
			<?php displayJournalEntries(); ?>
		</div>
		<div id="post_sidebar">
			<h3 id="archive_titles">Entry Archive</h3>
			<?php displaySidebar(); ?>
		</div>
		<script type="text/javascript">
		$(document).ready(function () {

		    // if user clicked on button, the overlay layer or the dialogbox, close the dialog  
		    $('.button, .red_btn, #dialog-overlay').click(function () {     
		        $('#dialog-overlay, #dialog-box').hide().animate({opacity: 0}, 100 ); 
		        return false;
		    });

		    // if user resize the window, call the same function again
		    // to make sure the overlay fills the screen and dialogbox aligned to center    
		    $(window).resize(function () {     
		        //only do it if the dialog box is not hidden
		        if (!$('#dialog-box').is(':hidden')) popup();       
		    });  
		});

		//Popup dialog
		function newEntry(message) {

		    // get the screen height and width  
		    var maskHeight = $(document).height();  
		    var maskWidth = $(window).width();

		    // calculate the values for center alignment
		    var dialogTop =  '-20px';//(maskHeight/2) - ($('#dialog-box').height());  
		    var dialogLeft = (maskWidth/2) - ($('#dialog-box').width()/2); 

		    // assign values to the overlay and dialog box
		    $('#dialog-overlay').css({height:maskHeight, width:maskWidth}).show().animate({opacity: 0.5}, 100 );
		    $('#dialog-box').css({top:dialogTop, left:dialogLeft}).show().animate({opacity: 1}, 200 );

		    // display the message
		    $('#dialog-message').html(message);

		}
		</script>
<?php include_once ("../../common/footer.php"); ?>