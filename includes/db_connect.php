<?php
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "mylist");

	// define("DB_HOST", "mylist-206034.mysql.binero.se");
	// define("DB_USER", "206034_cg19967");
	// define("DB_PASS", "drug6bAx");
	// define("DB_NAME", "206034-mylist");

	$db_connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//Kontrollerar att den finns någon anslutning till db
	if($db_connect->connect_errno) {
		echo "Det gick inte att ansluta till databasen " . $db_connect->connect_error;
		exit();
	}
	
	$db_connect->set_charset("utf8");
?>