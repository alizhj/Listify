<?php
	include "includes/db_connect.php"; 
	session_start();
	if(isset($_POST["login"])){
		$_SESSION["logged_in"] = "TRUE";
	} 
	else if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == "TRUE") {
		// redan inloggad, allt ok

	} 
	else {
		// försöker komma åt sidan utan att vara inloggad
		// skicka till login-sidan
		$_SESSION["logged_in"] = "FALSE";
		header("Location: index.php?fail");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>My lists</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1", minimal-ui/>
		<link rel="stylesheet" href="css/style.css">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>