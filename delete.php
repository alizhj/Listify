<?php
	require('db_connect.php');
	$item_id = strip_tags($_POST['item_id']);

	$stmt = $db_connect->stmt_init();
	$delete_row="DELETE FROM items WHERE id='$item_id'";
	$result = $db_connect -> query($delete_row);	
?>