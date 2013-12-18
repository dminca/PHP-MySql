<?php # inregistrare utilizator
$page_title = 'Inregistrare';
include ('lib/header.html');
?>
<h1>Inregistraza utilizator</h1>

<?php # conectarea la baza de date; prelucrarea datelor
require ("lib/connect.php");

$id = 10;

/*------
		de scris codul
-------*/
// SELECT prin care preiau datele utilizatorului cu id-ul $id, 

// transform linia gasita in array-ul $row cu mysqli_fetch_assoc()

/* voi folosi acest array pentru initializarea lui $form_data*/

/* -- campurile formularului si atributele acestora --*/
$form_fields=  array( // fields
    'nume'        => array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z\-\s\']{2,20}$/'),
    'prenume'     => array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z\-\s\']{2,20}$/'),
    'email'     	=> array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z0-9\.\-_\+]+@[a-zA-Z0-9\-]+\.([a-zA-Z0-9\-]+\.)*[a-zA-Z]{2,3}$/'),
    'user'    		=> array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z\-0-9]{4,15}$/'),
    'parola'      => array('obligatoriu'=>true, 'regex'=>'/^[A-Za-z]+\d+.*$/'),
    );

/*-- pt. pastrarea datelor in formular, initializez $form_data pentru cazul in care formularul a fost afisat prima data-- */
foreach($form_fields as $field=>$atribute) {
	$form_data[$field]='';
	/*------
		de scris codul
-------*/
	// datele din formular vor fi cele selectate din bd pt utilizatorul cu id-ul $id
	//$form_data[$field]=$row[$field];
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
		$user=trim($form_data['user']);
		$parola=trim($form_data['parola']);
		$parola_criptata = md5($parola);//in bd voi memora parola criptata; pentru securitate, se mai poate atasa parolei un string si apoi se aplica alg de criptare
		$email=trim($form_data['email']);
		
		/*------
		de scris codul
		-------*/
		//UPDATE
		
		//memorez intr-o variabila, de ex $query, comanda UPDATE
		
		//o afisez cu echo si o testez in phpMyAdmin; daca e ok, trec mai departe
		
		//rulez interogarea folsind functia mysqli_query($dbc,$query); memorez rezultatul in $result; $result poate fi TRUE sau FALSE
		
		//daca a fost rulat insert-ul si a fost afectata o singura inregistrare (mysqli_affected_rows($dbc)==1), mesaj de succes, includ lib/footer.html, intrerup scriptul
		
		//altfel mesaj de nereusita + eventuala eroare de sistem - mysqli_error($dbc)
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
			<label for="user">User:</label>
			<input type="text" name="user" id="user" maxlength="30" value="<?php echo htmlentities($form_data['user']); ?>" />
			</p>				
			<p>
			<label for="parola">Parola:</label>
			<input type="password" name="parola" id="parola" maxlength="40" value="<?php echo htmlentities($form_data['parola']); ?>" />
			</p>
			<p>
			<input type="submit" name="submit" value="Inregistreaza" class="submit" />
			</p>			
	</form>

<?php
include ('lib/footer.html');
?>