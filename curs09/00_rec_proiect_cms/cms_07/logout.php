<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php") ?>
<?php
		logged_out();
		
		redirect_to("login.php?logout=1");
?>