<div id="left_nav" role="app_container">
	<ul class="app_nav" id="sortable">
		<?php
		$dbname="webapp";
		$tables = mysql_list_tables( $dbname );
		$username = $_SESSION['SESS_USERNAME'];

		$users_apps_str = mysql_query("SELECT username, users_apps FROM UserAccounts WHERE username = '$username'");
		while($info = mysql_fetch_array( $users_apps_str )) 
		{
			$users_apps_str = $info['users_apps'];
			$explodedArray = explode('-',$users_apps_str);
			$explodedArrayCount = count($explodedArray);
		}
			$c=0;
			
			if ('' != $users_apps_str['users_apps'])
			{
				while($c<$explodedArrayCount)
				{
					if(0 == count($explodedArray))
					{
						echo '<p>Go to the App Manager page to activate applications</p>';
					}
					if($_SERVER["PHP_SELF"] == '/webapp/appmanager.php')
					{
					echo '<li id="app_'.$explodedArray[$c].'"><a href="/webapp/apps/'.$explodedArray[$c].'/'.$explodedArray[$c].'.php" >'.$explodedArray[$c].'</a><img src="img/icons/reorder.png" alt="move" width="20" height="20" class="handle" /></li>';
					}
					else if($_SERVER["PHP_SELF"] != '/webapp/appmanager.php')
					{
					echo '<li><a href="/webapp/apps/'.$explodedArray[$c].'/'.$explodedArray[$c].'.php" >'.$explodedArray[$c].'</a></li>'; 
					}
					$c++;
				}
			}
		?>
	</ul>
	<?php
	if($_SERVER["PHP_SELF"] == '/webapp/appmanager.php')
	{
		?>
	<div id="upload_form">
		<form enctype="multipart/form-data" action="appmanager.php" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<h3>Upload an app</h3><input name="uploadedfile" type="file"/><br />
			<input type="submit" name="upload_file" value="Upload File" class="button_style green_btn" />
			<?php
		}
			?>
		</form>
	</div>
</div>
<div id="main_wrapper" role="main wrapper">
		<div id="main" role="main content">