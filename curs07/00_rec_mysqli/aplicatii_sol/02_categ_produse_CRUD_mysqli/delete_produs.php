<?php
	require "includes/connection.php";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		}
	$query="DELETE FROM produse WHERE id=$id";
	$result = mysqli_query($connection,$query);
	if (mysqli_affected_rows($connection) == 1) {
		Header("Location:view_produse.php");
		exit;
			} else {
				// Stergere nereusita
				echo "<p>Delete failed.</p>";
				echo "<p>" . mysqli_error($connection) . "</p>";
				echo "<a href=\"view_produse.php\">View Produse</a>";
			}
	mysqli_close($connection);//inchid conexiunea cu baza de date	
?>