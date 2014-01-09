<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
//ne asigursm ca valaorea preluata prin GET este nr intreg
if (!is_numeric($_GET['page']) || intval($_GET['page']) == 0) {
		redirect_to('content.php');
	}

$id=$_GET['page'];
if ($page = get_page_by_id($id)) {//numai daca exista pagina cu id-ul $id, se face stergerea; pt securitate - vezi sql injection
	$query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($connection,$query);
	if (mysqli_affected_rows($connection) == 1) {
			redirect_to("content.php");
		} else{
			echo "<p>Stergerea a esuat." . mysqli_error($connection) . "</p>";
			}
}
?>

<?php mysqli_close($connection); ?>