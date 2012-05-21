<?php
//create Journal table
function createAppTable()
{
	mysql_select_db('webapp');
	
	mysql_query("CREATE TABLE IF NOT EXISTS Monetrac (
	ID INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(32), 
	user_categories VARCHAR(32),
	user_data_jan VARCHAR(255),
	user_data_feb VARCHAR(255),
	user_data_march VARCHAR(255),
	user_data_april VARCHAR(255),
	user_data_may VARCHAR(255),
	user_data_june VARCHAR(255),
	user_data_july VARCHAR(255),
	user_data_aug VARCHAR(255),
	user_data_sept VARCHAR(255),
	user_data_oct VARCHAR(255),
	user_data_nov VARCHAR(255),
	user_data_dec VARCHAR(255),
	PRIMARY KEY (ID))")
		or die(mysql_error());
}

//echo $stringData = $_GET['add_cat']; 

//if the user clicks "Add Category" execute the following code


?>