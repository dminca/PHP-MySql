<?php # listare utilizatori
$page_title = 'Listare';
include ('lib/header.html');
?>

<h1>Lista utilizatori</h1>

<?php # conectarea la baza de date; prelucrarea datelor
require ("lib/connect.php");

//memorez SELECT-ul in $query

//echo $query; // pt debug

// rulez interogarea cu mysqli_query($dbc,$query) si memorez rezultatul in $result

// daca interogarea a rulat cu succes ($result nu este FALSE), afisez rezultatul
		// determin numarul de inregistrari rezultate cu mysqli_num_rows($result)
		// daca am inregistrari
				// afisez numarul acestora
				// parcurg inregistrarile folosind mysqli_fetch_assoc($result) si afisez sub forma de tabel
		// altfel mesaj 
// altfel afisez eroarea cu mysqli_error($dbc)

mysqli_close($dbc);//inchid conexiunea cu baza de date

?>
	
<?php
include ('lib/footer.html');
?>