<?php
	$_SESSION['SESS_USERNAME'] = 'error';
	session_start();
	session_unset(); 
	session_destroy();
	mysql_close($conn);

if ($_SESSION['SESS_USERNAME'] = 'daveodden')
{
	?>
<script type="text/javascript">
<!--
window.location = "../login.php"
//-->
</script>
<?php

}

?>