<?php
require("constants.php");

// 1. Conexiunea cu serverul MySQL si selectarea bazei de date folosind  extensia mysqli
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if (!$connection) {
	die("Database connection failed: " . mysqli_connect_error());
}

?>
