<?php
	include "includes/header.php"; 
?>

<div class="background"></div>
<div class="header">
	<h1>.listor</h1>
</div>

<!-- formulär för att lägga till nya listor -->
<div id="add_new_list">
	<input type="text" name="new-list" placeholder="skapa lista" />
	<button class="buttoms" id="buttonlist">skapa</button>
</div><!-- #add_new_list -->

<div class="clearfix"></div>

<div id="lists">
	<ul>
		<?php 

		$user_id= $_SESSION['user_id'];
		//hämtar listor som tillhör aktuell användare i databasen
		$query = "SELECT * FROM lists WHERE user_id = '$user_id'";

        $stmt = $db_connect->stmt_init();
		$result = $db_connect->query($query);
		$stmt->prepare($query);
		$stmt->execute();
	    
	    $numrows = mysqli_num_rows($result); 
	    if($numrows > 0) {  
        	while($row=$result->fetch_assoc()){

				echo "<li><a href='show_list.php?id={$row['list_id']}'>{$row['list_name']}</a></li>";
				
        	}
        }

	    ?>
	</ul>
</div><!-- #lists -->

<!-- knapp för att kunna logga ut -->
<button class="buttoms" id="logout">logga ut</button>

<?php
	include "includes/footer.php"; 
?>