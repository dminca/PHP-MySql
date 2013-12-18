<?php # listare utilizatori
$page_title = 'Listare';
include ('lib/header.html');
?>

<h1>Lista utilizatori</h1>

<?php # conectarea la baza de date; prelucrarea datelor
require ("lib/connect.php");

//SELECT
$query = "SELECT CONCAT( nume, ' ', prenume ) AS `nume` , DATE_FORMAT( data_adaugarii, '%D %M %Y' ) AS `data`
			FROM users
			ORDER BY data_adaugarii";
//echo $query; // pt debug
$result = @ mysqli_query($dbc,$query); // rulez interogarea

// verific SELECT		
if($result){ // daca interogarea a rulat cu succes, afisez rezultatul
	
	// determin numarul de inregistrari rezultate
	$num=mysqli_num_rows($result);
	
	if($num>0){ // am inregistrari, le afises sub forma de tabel
		// Afisez numarul de utilizatori
		echo "<h4>Exista $num utilizatori inregistrati.</h4>\n";
	 	
	 	// Afisez datele sub forma de tabel
		
		// start tabel si antet tabel		 	
	 	echo '<table><tr><th>Nume si prenume</th><th>Data adaugarii</th></tr>';

		// pentru fiecare inregistrare rezultata, generez o linie de tabel			
		while($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			foreach($row as $field => $val){
				echo "<td>$val</td>";					
				}
			echo "</tr>";
			}
			
		// end tabel
		echo "</table>";
		} else { // SELECT ok, dar nu am inregistrari
			echo '<p class="error">Nu exista utilizatori inregistrati!</p>';
			}		
	
	}else{ // interogarea nu a rulat cu succes
		
		echo '<p class="error">'. mysqli_error($dbc).'</p>';
		}
	
mysqli_close($dbc);//inchid conexiunea cu baza de date

?>
	
<?php
include ('lib/footer.html');
?>