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
<h3 id="app_name"><a href="http://localhost:8888/webapp/apps/Journal/Journal.php">Journal</a> > [Title]</h3>
<hr id="hr_adj"/>
	<?php displaySinglePost(); ?>
<?php include_once ("../../common/footer.php"); ?>