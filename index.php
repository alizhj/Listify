<?php include "includes/db_connect.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Listan</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1", minimal-ui />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="wrapper">
		<div class="header">
			<h1>.Listify</h1>
			<?php
			if(isset($_GET["fail"])) {
				echo "<p class='error'>Fel lösenord el användarnamn</p>";
			}
			if(isset($_GET["loggedout"])) {
				echo "<p class='error'>du är nu utloggad</p>";
			}
			if(isset($_GET["registrated"])) {
				echo "<p class='error'>du är nu registrerad</p>";
			}
			?>	
		</div>
		
		<div class="boxar">
			<div id="box1">Logga in</div>
			<div id="box2">Ny användare</div>
		
			<!-- formulär för att logga in på sidan -->
			<form id="login-form" method="post" action="login_check.php">
				<label for="username" >Användare:</label><br>
				<input type="text" name="username" ><br>
				<label for="password">Lösenord: </label><br>
				<input type="password" name="password" ><br><br>
				<input class="buttoms" type="submit" name="login" value="logga in">
			</form><br>
			
			<!-- forumlär för att registrera sig som användare -->
			<form id="registrate-form" method="post" action="register_user.php">
				<label for="username">Användarnamn: </label><br>
				<input type="text" name="new_username" ><br>
				<label for="password">Lösenord: </label><br>
				<input type="password" name="new_password" ><br><br>
				<input class="buttoms" type="submit" name="registrate" value="registrera">
			</form>
		</div><!-- #boxar -->
	</div><!-- #wrapper -->

<?php
	include "includes/footer.php"; 
?>