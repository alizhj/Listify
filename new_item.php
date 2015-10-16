<?php 
	include "includes/db_connect.php"; 
	session_start();

	$new_item = $_POST['new_item'];
	$list_id = $_POST['list_id'];
	$user_id = $_SESSION['user_id'];


	$stmt = $db_connect->stmt_init();
	$insert_row = "INSERT INTO items (item_name, list_id, user_id) 
					VALUES ('$new_item', '$list_id', '$user_id')";

	$result = $db_connect -> query($insert_row);
	echo $db_connect->insert_id;

?>

