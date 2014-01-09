<?php # administrare utilizatori
$page_title = 'Administrare';
include ('lib/header.html');
?>

<h1>Administrare utilizatori</h1>

<?php # conectarea la baza de date; prelucrarea datelor
require ("common/table_functions.php"); // pentru functiile de generare a tabelului
require ("lib/connect.php");

//SELECT
$query = "SELECT id_user, CONCAT( nume, ' ', prenume ) AS `nume` , email, user, DATE_FORMAT( data_adaugarii, '%D %M %Y' ) AS `data`
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
		
		// start tabel 
		echo table_start();
		
		//	antet tabel
		$row = mysqli_fetch_assoc($result); // prima inregistrare; folosesc cheile pentru generarea antetului
		
		$tds = array('Edit'=>'','Delete'=>'');
		$row = $row + $tds; //adaug prin reuniune noi coloane
		echo table_header($row);
		
		mysqli_data_seek($result, 0); // duc pointerul pe prima inregistrare
		
		// pentru fiecare inregistrare rezultata, generez o linie de tabel			
		 while($row=mysqli_fetch_assoc($result)){
		 	$tds = array('Edit'=>'<a href="edit_user.php?id='.$row['id_user'].'">Edit</a>',
							 'Delete'=>'<a href="delete_user.php?id='.$row['id_user'].'">Delete</a>',		 	
		 	);
			$row = $row + $tds; //adaug prin reuniune noi coloane
		 	
			echo table_row($row); // afisez linia tabelului
			} ;
			
		// end tabel
		echo table_end();
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