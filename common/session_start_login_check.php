<?php
session_start();
//if a session is not active, redirect to login
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