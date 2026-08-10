<?php
	//This file provides the information for accessing the the database and connecting to MySQL.
	//First, we define the constants: #1
	Define ('DB_USER', 'root'); //
	Define ('DB_PASSWORD', 'Infinite.257'); //type the password you created
	Define ('DB_HOST', 'localhost');
	Define ('DB_NAME', 'distant_db');
	//Next we assign the database connection to a variable that we will call $dbcon: #2
	try
	{
		$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		mysqli_set_charset ($dbcon, 'utf8'); //#4
		print "You are now connected to distant_db database.";
		//more code will go here later
	}
	catch(Exception $e) //We finally handle any problems here #3 
	{
		//print "An Exception occured. Message: " . $e->getMessage();
		print "The system is busy please try later";
	}
	catch(Error $e)
	{
		//print "An Error occured. Message: " . $e->getMessage();
		print "The system is busy please try later";
	}
?>
