<?php
//create Facebook table
function createAppTable()
{
	mysql_select_db('webapp');
	
	mysql_query("CREATE TABLE IF NOT EXISTS Facebook (
	ID INT NOT NULL AUTO_INCREMENT,
	usersname VARCHAR(32),
	password VARCHAR(32),
	PRIMARY KEY (ID))")
		or die(mysql_error());
}

echo 'pop up sluts';
?>