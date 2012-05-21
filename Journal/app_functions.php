<?php
//create Journal table
function createAppTable()
{
	mysql_select_db('webapp');
	
	mysql_query("CREATE TABLE IF NOT EXISTS Journal (
	entryID INT NOT NULL AUTO_INCREMENT,
	usersname VARCHAR(32), 
	entry_title VARCHAR(32),
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
	//$num=mysql_num_rows($result);

	while($info = mysql_fetch_array( $nameResult )) 
	{	
	echo "<ul class\"entry\">";
		echo "<li>";
	 		echo "<h3 class=\"entry_title\">".$info['entry_title']."</h3>";
			echo "<p class=\"entry_timestamp\">".$info['entry_timestamp']."</p>";
			echo "<p class=\"entry_content\">".$info['entry_content']."</p>";
		echo "</li>";
	echo "</ul>";
	}
}

?>