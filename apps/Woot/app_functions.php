<?php
//create Woot table
function createAppTable()
{
	mysql_select_db('webapp');
	
	mysql_query("CREATE TABLE IF NOT EXISTS Woot (
	ID INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (ID))")
		or die(mysql_error());
}
?>