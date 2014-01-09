<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php session_set(); ?>
<?php confirm_logged_in(); ?>

<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<a href="index.php">Inapoi la zona publica</a>
		</td>
		<td id="page">
			<h2>Zona de administrare</h2>
			<p>Bine ai venit in zona de administrare, <?php echo $_SESSION['username']; ?>.</p>
			<ul>
				<li><a href="content.php">Administreaza continut</a></li>
				<li><a href="create_user.php">Adauga user</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>
