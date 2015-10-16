<?php
	include 'includes/db_connect.php';
	session_start();

	$item_id = ($_POST['item_id']);

	$stmt = $db_connect->stmt_init();
	$delete = "DELETE FROM items WHERE item_id = '$item_id' ";

	if($stmt->prepare($delete)) { 
		$stmt->execute();
	}
?>