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
<?php include_once "common/header.php"; ?>
<!-- Page Heading -->
<?php
if (isset($_REQUEST["success"]))
{
	successMsg('Your application has been uploaded!');
}
if (isset($_REQUEST["failed"]))
{
	errorMsg('Upload a zip!');
}
?>
<!-- jQuery Sortable-->
<script type="text/javascript">
$(document).ready(function() { 
//set <ul id="sortable"></ul> to be sortable
  $("#sortable").sortable({ 
    handle : '.handle',
	//when list item is dropped, pass data to list.php
	update: function(event, ui) {
		var data = $("#sortable").sortable('serialize');
		console.log(data);
		$.post("includes/list.php", { list: data },function (o) {
			console.log(o);
		},'json' );
	 }
  }); 
}); 
</script>
<!-- User's application navigation & DB info -->
<?php include_once "common/app_nav.php"; ?>
<?php
	$dbname="webapp";
	$tables = mysql_list_tables( $dbname );
	$num_rows = mysql_num_rows($tables);
?>
<h3>Available Apps (<?php echo $num_rows-2; ?>)</h3>
<hr/>
<div id="available_app_container">
	<?php
	$users_apps_str = mysql_query("SELECT username, users_apps FROM UserAccounts WHERE username = '$username'");
	while($info = mysql_fetch_array( $users_apps_str )) 
	{
		$users_apps_str = $info['users_apps'];
		$explodedArray = explode('-',$users_apps_str);
	}
	$i=0;
	$count = 0;
	while( $app = mysql_fetch_row( $tables ) )
	{
		if ("UserAccounts" != $app[0] && "UserSessions" != $app[0])
		{
			echo '<div class="avail_app_wrapper">';
			echo '<div class="placeholder"></div>';
			echo '<h3>'.$app[0].'</h3><p class="app_desc">Curabitur blandit tempus porttitor. Donec ullamcorper nulla non metus auctor fringilla. Donec id elit.</p>';
			if(!array_diff($app, $explodedArray))
			{
			echo '<a href="appmanager.php?action=deactivate&app='.$app[0].'" class="deactivate_app_text">deactivate app</a>';
			}
			else if(array_diff($app, $explodedArray))
			{
			echo '<a href="appmanager.php?app='.$app[0].'" class="activate_app_text">activate app</a>';
			}
			echo '</div>';
		//echo '<hr class="app_hr"/>'; 
		$count++;
		}
	}
	?>
</div>
<?php
//Deactivate App
if (isset($_GET["action"]) && isset($_GET["app"]) )
{
	deactivateApp();
}
//Activate App
if (isset($_GET["app"]) && (!isset($_GET["action"])))
{
	activateApp();
}
if (isset($_POST['upload_file']))
{
	//Result is "uploads/filename.extension"
	$target_path = "apps/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	
	//if the move was successful, unzip, read app_functions.php and create the app table
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	 $zip = new ZipArchive;
     $res = $zip->open($target_path);
     if ($res === TRUE) {
        $zip->extractTo(apps);
		$path_parts = pathinfo($target_path);
		$app_functions_path = 'apps/'.$path_parts['filename'].'/app_functions.php';
		include ($app_functions_path);
		createAppTable();
        $zip->close();
		?>

		<script type="text/javascript">
	    <!--
	    window.location = "appmanager.php?success"
	    //-->
	    </script>

		<?php
     } else {
         ?>

		<script type="text/javascript">
	    <!--
	    window.location = "appmanager.php?failed"
	    //-->
	    </script>

		<?php
     }
	    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
	    " has been uploaded";
	} else{
	    ?>

		<script type="text/javascript">
	    <!--
	    window.location = "appmanager.php?failed"
	    //-->
	    </script>

		<?php
	}
}
?>
<?php include_once "common/footer.php"; ?>