<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', ''); //CHANGE PASSWORD HERE!
	define('DB_NAME', 'distant_db');
	try {
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	} catch(Error $e) {
		echo "An error occurred.<br>";
		echo "Message: " . $e -> getMessage() . ".<br>";
		echo "The system is busy, please try again later.";
	}

	$dbHost     = "localhost";
	$dbUsername = "root";
	$dbPassword = ""; //CHANGE PASSWORD HERE!
	$dbName     = "distant_db";

	$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}
?>