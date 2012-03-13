<?php
session_start();
//if a session is active, proceed to 
if (!isset($_SESSION['SESS_USERNAME']))
{
	?>
	<script type="text/javascript">
	<!--
	window.location = "login.php"
	//-->
	</script>
	<?php
}
?>
<?php include_once "common/header.php"; ?>
<?php require "common/app_nav.php"; ?>
			<h3>Settings</h3>
<?php include_once "common/footer.php"; ?>