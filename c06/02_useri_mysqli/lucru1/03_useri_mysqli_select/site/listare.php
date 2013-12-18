<?php # listare utilizatori
$page_title = 'Listare';
include ('lib/header.html');
?>

<h1>Lista utilizatori</h1>

<?php # conectarea la baza de date; prelucrarea datelor
require ("lib/connect.php");

//SELECT

//memorez intr-o variabila, de ex $query, comanda SELECT
		
//o afisez cu echo si o testez in phpMyAdmin; daca e ok, trec mai departe
		
//rulez interogarea folsind functia mysqli_query($dbc,$query); memorez rezultatul in $result; $result este FALSE in caz de SELECT nereusit

// daca interogarea a rulat cu succes, afisez rezultatul

	// determin numarul de inregistrari rezultate - mysqli_num_rows($result)
	
	// daca am inregistrari, 
			//afisez numarul de utilizatori			
			//afisez inregistrarile sub forma de tabel - pot folosi functiile din common/table_functions
	//altfel mesaj ca nu am utilizatori

// altfel mesaj cu eroarea de sistem mysqli_error($dbc)

	
mysqli_close($dbc);//inchid conexiunea cu baza de date

?>
	
<?php
include ('lib/footer.html');
?>