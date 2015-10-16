<?php
	include 'includes/db_connect.php';
	session_start();

	$list_id = ($_POST['list_id']);

	$stmt = $db_connect->stmt_init();
	$deleteItems = "DELETE FROM items WHERE list_id = '$list_id'";


	$deleteList = "DELETE FROM lists WHERE list_id = '$list_id'";

	//tar bort alla items som tillhör en lista med visst id
	if($stmt->prepare($deleteItems)) { 
		$stmt->execute();	
	}

	//tar bort den aktuella listan
	if($stmt->prepare($deleteList)) { 
		$stmt->execute();
	}
	
?>