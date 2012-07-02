<?php
//create Journal table
function createAppTable()
{
	mysql_select_db('webapp');
	
	mysql_query("CREATE TABLE IF NOT EXISTS Journal (
	entryID INT NOT NULL AUTO_INCREMENT,
	usersname VARCHAR(255), 
	entry_title VARCHAR(255),
	entry_content TEXT(15000),
	entry_timestamp VARCHAR(32),
	PRIMARY KEY (entryID))")
		or die(mysql_error());
}

//display or sort customer table
function displayJournalEntries()
{
	$username = $_SESSION['SESS_USERNAME'];
	$nameResult = mysql_query("SELECT * FROM Journal WHERE usersname = '$username' ORDER BY entryID DESC");
	$num=mysql_num_rows($nameResult);
	
	echo "<ul class='entry'>";
		while($info = mysql_fetch_array( $nameResult )) 
		{
		echo "<li><a href='single_post.php?id=".$num."'>";
			echo "<span class='entry_count'>".$num."</span>";
 			echo "<h3 class='entry_title'>".$info['entry_title']."</h3>";
			echo "<img src='imgs/trash.png' class='delete_post' />";
			echo "<p class='entry_timestamp'>".$info['entry_timestamp'].'</p>';
			echo "<p class='entry_content'>".$info['entry_content']."</p><br/>";
		echo "</a></li>";
		$num = $num -1;
		}
	echo "</ul>";
}

function displaySidebar()
{
	$username = $_SESSION['SESS_USERNAME'];
	$result = mysql_query("SELECT entry_title FROM Journal WHERE usersname = '$username' ORDER BY entryID DESC");
	//$num=mysql_num_rows($result);

	echo "<ul class='entry_title_sidebar'>";
	echo "<hr>";
		while($info = mysql_fetch_array( $result )) 
		{
			echo "<li>";
	 		echo "<a class='entry_title_2'>".$info['entry_title']."</a><br/>";
			echo "</li><hr/>";
		}
	echo "</ul>";
}

//display or sort customer table
function displaySinglePost()
{
	$username = $_SESSION['SESS_USERNAME'];
	$passed_id = $_GET['id'];
	$dbResult = mysql_query("SELECT * FROM Journal WHERE usersname = '$username' && entryID = '$passed_id' ORDER BY entryID DESC");
	$num = mysql_num_rows($dbResult);
	
	$info = mysql_fetch_array( $dbResult );
	
	echo "<h3 id='app_name'><a href='http://localhost:8888/webapp/apps/Journal/Journal.php'>Journal</a> > ".$info['entry_title']."</h3>";
	echo "<hr id='hr_adj'/>";
	
	echo "<ul class='entry' id='single_post_container'>";
		echo "<li>";
 			echo "<h3 class='entry_title'>".$info['entry_title']."</h3>";
			echo "<img src='imgs/trash.png' class='delete_post' />";
			echo "<p class='entry_timestamp'>".$info['entry_timestamp'].'</p>';
			echo "<p class='entry_content single_content'>".$info['entry_content']."</p><br/>";
		echo "</li>";
	echo "</ul>";
}

?>