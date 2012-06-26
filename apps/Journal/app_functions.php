<?php
//create Journal table
function createAppTable()
{
	mysql_select_db('webapp');
	
	mysql_query("CREATE TABLE IF NOT EXISTS Journal (
	entryID INT NOT NULL AUTO_INCREMENT,
	usersname VARCHAR(255), 
	entry_title VARCHAR(255),
	entry_content VARCHAR(255),
	entry_timestamp VARCHAR(32),
	PRIMARY KEY (entryID))")
		or die(mysql_error());
}

//display or sort customer table
function displayJournalEntries()
{
	$username = $_SESSION['SESS_USERNAME'];
	$nameResult = mysql_query("SELECT * FROM Journal WHERE usersname = '$username' ORDER BY entryID DESC");
	
	echo "<ul class='entry'>";
		while($info = mysql_fetch_array( $nameResult )) 
		{
		echo "<li>";
			echo "<span class='entry_count'>".$num."</span>";
 			echo "<h3 class='entry_title'>".$info['entry_title']."</h3>";
			echo "<p class='entry_timestamp'>".$info['entry_timestamp'].'</p>';
			echo "<p class='entry_content'>".$info['entry_content']."</p><br/>";
		echo "</li>";
		}
	echo "</ul>";
}

function displaySidebar()
{
	$username = $_SESSION['SESS_USERNAME'];
	$result = mysql_query("SELECT entry_title FROM Journal WHERE usersname = '$username' ORDER BY entryID DESC");
	//$num=mysql_num_rows($result);

	echo "<ul class='entry_title_sidebar'>";
		while($info = mysql_fetch_array( $result )) 
		{
			echo "<li>";
	 		echo "<a class='entry_title_2'>".$info['entry_title']."</a><br/>";
			echo "</li>";
		}
	echo "</ul>";
}

?>