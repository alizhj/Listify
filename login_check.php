<?php
	include "includes/db_connect.php"; 
	session_start();
	

	//Om man har klickat på logga in knappen, kontrollera mot db
	if(isset($_POST["login"])) {
		//Initiering av variabler
		$stmt = $db_connect->stmt_init();
		$username = $_POST["username"];
		$password = $_POST["password"];

		$query = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";

		//Om queryn stämmer, utför frågan
		if($stmt->prepare($query)) {
		 	$stmt->execute();
		 	$stmt->store_result();

		 	//Om uppgifterna finns i en rad i db, skapa sessions
		 	if($stmt->num_rows == 1) {
		 		$_SESSION["logged_in"] = 'TRUE';
		 		$stmt->bind_result($user_id, $username, $password);
		 		mysqli_stmt_fetch($stmt);
		 		
		 		$_SESSION["user_id"] = $user_id;
		 		$_SESSION["username"] = $username;
		 		header("Location: dashboard.php");
		 	}
		 	else {
			header("Location: index.php?fail");
			}
		}
	}
	$db_connect->close();
?>