<?php
	include "includes/header.php"; 
?>
<div class="background"></div>


<div class="header">
	<?php
	if(isset($_GET['id'])) {
		$list_id = $_GET['id'];
		$user_id = $_SESSION['user_id'];

		//hämtar namnet på listan från databasen
		$listname = "SELECT * FROM lists WHERE list_id = '$list_id'";

		$stmt1 = $db_connect->stmt_init();
		$result1 = $db_connect->query($listname);
		echo mysqli_error($db_connect);
		$stmt1->prepare($listname);
		$stmt1->execute();

	    $row1=$result1->fetch_assoc();
		echo "<h1>.{$row1['list_name']}</h1>";
		$stmt1->close();
			
	    ?>
</div>

<!-- formulär för att lägga till nya objekt-->
<div id="add_new_item" autocomplete="off">
	<input type="text" name="new-item" placeholder="skapa objekt" />
	<input type="hidden" name="list_id" value="<? echo "{$row1['list_id']}"?>">
	<button class="buttoms" id="buttonitem">skapa</button>
</div><!-- #add_new_item -->

<div class="clearfix"></div>


<div id="items">
    <ul>
    	<?	
    	//hämtar objekt till specifikt list id från databasen
		$query =  "SELECT items.*, lists.*
				FROM items
				LEFT JOIN lists ON items.list_id = lists.list_id
				WHERE lists.list_id = '$list_id' AND lists.user_id = '$user_id'
				ORDER BY items.item_id
				DESC";		

		$stmt = $db_connect->stmt_init();
		$result = $db_connect->query($query);
		echo mysqli_error($db_connect);
		$stmt->prepare($query);
		$stmt->execute();
		
	    while($row=$result->fetch_assoc()){

			echo "<li><span>{$row['item_name']}</span><i id='{$row['item_id']}' class='fa fa-times'></i></li>";
			
    	}
    	?>
	</ul>
	
	
	<?
	}
	?>

	<!-- knappar för att ta bort lista och gå tillbaka till listsidan()dashboard -->
	<button class="delete_list buttoms" id="<? echo "{$row1['list_id']}" ?>">radera lista</button><br>
	<button class="back buttoms">till listor</button>
</div><!-- #items -->

<?php
	include "includes/footer.php"; 
?>