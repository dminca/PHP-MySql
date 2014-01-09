<?php # editare utilizator
$page_title = 'Inregistrare';
include ('lib/header.html');
?>
<h1>Editare utilizator</h1>

<?php # conectarea la baza de date; prelucrarea datelor
require ("lib/connect.php");

// preiau id-ul transmis prin GET
if(isset($_GET['id']) && is_numeric($_GET['id'])){ // daca s-a transmis id prin GET
	$id=$_GET['id'];
	}else { // Nu am id valid, intrerup scriptul.
	echo '<p class="error">Aceasta pagina a fost accesata din greseala.</p>';
	include ('lib/footer.html'); 
	exit();
	}

// am id => preiau datele utilizatorului selectat, afisez formularul cu datele utilizatorului selectat, modific date, fac UPDATE
$query = "SELECT id_user, nume, prenume, email
				FROM users
				WHERE id_user = $id
				LIMIT 1 ";
$result = @ mysqli_query($dbc, $query);

if($result && mysqli_num_rows($result) == 1) { // am gasit utilizatorul
	$row = mysqli_fetch_assoc($result);
}else{ // Nu am gasit utilizatorul, intrerup scriptul.
	echo '<p class="error">Nu exista utilizatorul.</p>';
	echo '<p class="error">'. mysqli_error($dbc).'</p>';
	include ('lib/footer.html'); 
	exit();
	}
	
/* -- campurile formularului si atributele acestora --*/
$form_fields=  array( // fields
    'nume'        => array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z\-\s\']{2,20}$/'),
    'prenume'     => array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z\-\s\']{2,20}$/'),
    'email'     	=> array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z0-9\.\-_\+]+@[a-zA-Z0-9\-]+\.([a-zA-Z0-9\-]+\.)*[a-zA-Z]{2,3}$/'),
    );

/*-- pt. pastrarea datelor in formular, initializez $form_data cu datele utilizatorului -- */
foreach($form_fields as $field=>$atribute) {
	$form_data[$field]=$row[$field];
}

if(isset($_POST['submit'])){
		
	/*-- pastrarea datelor in formular; actualizare $form_data dupa apasarea butonului-- */	
	$form_data=$_POST;
			
	/*--validare formular--*/ 
	
	//init errors; pentru un camp va fi semnalata o singura eroare
	$errors = array();
		
	//verific campurile obligatorii si campuri cu format
	foreach($form_fields as $field=>$atribute) {
		
		if(isset($atribute['obligatoriu']) && $atribute['obligatoriu'] === true) {//campul este obligatoriu
			if (!isset($form_data[$field]) || empty($form_data[$field])) {
				$errors[] ="Campul $field trebuie completat";
			}
		}
		
		if(isset($atribute['regex']) && !empty($atribute['regex']) && is_string($atribute['regex'])) {//campul are un format impus
			if($form_data[$field] && !preg_match($atribute['regex'],$form_data[$field])) {
					$errors[] = "Campul $field nu este valid";
					}
			}
		}//end foreach

	
	/*--procesarea datelor sau afisare erorilor--*/
	//print_r($errors);
	if(!empty($errors)){//daca am erori, le afisez
		echo '<div class="error">';
		echo implode("<br />", $errors);
		echo '</div>';
	}else{//daca nu am erori, procesez datele
		$nume=trim($form_data['nume']);
		$prenume=trim($form_data['prenume']);
		$email=trim($form_data['email']);
		
		//UPDATE
		// memorez UPDATE-ul in $query

		// echo $query;//pt debug
		
		// rulez interogarea cu mysqli_query($dbc,$query) si memorez rezultatul in $result; $result va fi TRUE sau FALSE
				
		//verific UPDATE		
		// daca $result este TRUE si a fost inserata exact o inregistrare (mysqli_affected_rows($dbc)==1)
				// afisez mesaj de INSERT ok
				// intrerup scriptul: include ('lib/footer.html');exit();
		// altfel INSERT nereusit; afisez eroarea cu mysqli_error($dbc)
		
		//end INSERT
		//end UPDATE
		mysqli_close($dbc);//inchid conexiunea cu baza de date
		}//end "nu am erori"
		
}

?>
	<form action="" method="post" class="form_settings">
			<p>
			<label for="nume">Nume:</label>
			<input type="text" name="nume" id="nume" maxlength="30" value="<?php echo htmlentities($form_data['nume']); ?>" />
			</p>
			<p>
			<label for="prenume">Prenume:</label>
			<input type="text" name="prenume" id="prenume" maxlength="30" value="<?php echo htmlentities($form_data['prenume']); ?>" />
			</p>
			<p>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" maxlength="60" value="<?php echo htmlentities($form_data['email']); ?>" />
			</p>
			<p>
			<input type="submit" name="submit" value="Modifica" class="submit" />
			</p>			
	</form>

<?php
include ('lib/footer.html');
?>