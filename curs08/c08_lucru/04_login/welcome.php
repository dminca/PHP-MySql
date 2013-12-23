<?php
require("includes/connection.php");

function get_name()
{
  global $connection; // conexiunea la baza de date trebuie existe in interiorul functiei. deci importata cu global;
	
	//returneaza numele userului cu id-ul 	$_SESSION['uid']
  
}

function is_logged()
{
	//daca exista  $_SESSION['uid'] returneaza 1, altfel 0
  
}

//(re)pornesc sesiunea
//daca este logat, $name = numele extras din baza de date altfel $name=''	
	
	
?>

<html>
<head>
	<title></title>
</head>
<body>
<h3>Bine-ai venit<?php echo  $name ?>!</h3>

<br /><br />

<?php 
//daca este logat, link catre logout.php; altfel link catre login.php
 ?>
</body>
</html>