<?php
require("constants.php");

// 1. Conexiunea cu baza de date 
$connection = @mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if (!$connection) {
	die("Eroare la conectare: " . mysqli_connect_error());
}

?>
