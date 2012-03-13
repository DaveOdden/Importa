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

?>