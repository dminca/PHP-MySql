<?php # stergere utilizator
$page_title = 'Sterge utilizator';
include ('lib/header.html');
?>

<h1>Administrare utilizatori</h1>

<?php # conectarea la baza de date; prelucrarea datelor
require ("lib/connect.php");

// daca s-a transmis id prin GET si este numar, il memorez in $id
// altfel mesaj si intrerup scriptul - include "lib/footer.html";exit();

//daca am ajuns aici, am un id numeric

	//memorez in $query interogarea de stergere
	
	//rulez interogarea cu mysqli_query($dbc,$query) si memorez rezultatul in $result
	
	//daca $result true si am sters exact o linie (mysqli_affected_rows($dbc) == 1)
		// redirectez catre listare.php pentru a vedea instant efectul stergerii - Header("Location:listare.php");
		// intrerup scriptul - exit();
	//altfel mesaj de stergere nereusita - mysqli_error($dbc)

mysqli_close($dbc);//inchid conexiunea cu baza de date	
?>

<?php
include ('lib/footer.html');
?>