<?php 
	include "includes/db_connect.php"; 
	session_start();

	$list = strip_tags($_POST['list']);
	$user_id = $_SESSION["user_id"];


	$stmt = $db_connect->stmt_init();

	//lägger till ny lista med aktuell användare i databasen
	$insert_row = "INSERT INTO lists (list_name, user_id) 
					VALUES ('$list', '$user_id')";
	$result = $db_connect -> query($insert_row);

	echo $db_connect->insert_id;

?>

