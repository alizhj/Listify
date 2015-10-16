<?php 
	include "includes/db_connect.php"; 
?>

<?php 
	
	//Skapar variabler med $_POST
	$username = $_POST["new_username"];
	$password = $_POST["new_password"];
	$registrate = $_POST["registrate"];
	
	if(isset($username) && isset($password) && isset($registrate)) {
		$stmt = $db_connect->stmt_init();
		
		//lägger till användare i databasen
		$sql= "INSERT INTO users (user_name, password)
		VALUES ('$username', '$password')";

		if($stmt->prepare($sql)) {
			$stmt->execute();
			echo "Record successfully inserted";
			header("Location: index.php?registrated");
		}
		else
		{
		echo "There is some problem in inserting record";
		}
	}

?>

