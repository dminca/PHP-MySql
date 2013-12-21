<?php # formular de contact
$page_title = 'Contact';
include ('lib/header.html');
?>
<h1>Contactati-ne completand formularul de mai jos</h1>

<?php # prelucrarea datelor

/* -- campurile formularului si atributele acestora --*/
$form_fields=  array( // fields
    'nume'        => array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z\-\s\']{2,20}$/'),
    'prenume'     => array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z\-\s\']{2,20}$/'),
    'email'     	=> array('obligatoriu'=>true, 'regex'=>'/^[a-zA-Z0-9\.\-_\+]+@[a-zA-Z0-9\-]+\.([a-zA-Z0-9\-]+\.)*[a-zA-Z]{2,3}$/'),
    'mesaj'    	=> array('obligatoriu'=>true, 'regex'=>''),
    );

/*-- pt. pastrarea datelor in formular, initializez $form_data pentru cazul in care formularul a fost afisat prima data-- */
$form_data = array();

foreach($form_fields as $field=>$atribute) {
	$form_data[$field]='';
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
		$mesaj=htmlentities(trim($form_data['mesaj']));
		
		//trimit mail
		$to = 'catalina.enescu@yahoo.com';
		$subject = "Mesaj de la $prenume $nume";
		$message = wordwrap($mesaj, 70, "\r\n");
		$headers = "From: $email";
		$ok = mail($to, $subject, $message, $headers);
		if($ok){ // functia a fost apelata cu succes; nu inseamna neaparat ca mailul a fost trimis
			echo "Mailul dvs. a fost trimis cu succes.";
			include ('lib/footer.html');
			exit();
			} else{
				echo '<p class="error">Probleme cu functia mail(). Verificati daca exista un server de mail!</p>';
				include ('lib/footer.html');
				exit();
				}
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
			<label for="mesaj">Mesaj:</label>
			<textarea name="mesaj" id="mesaj"><?php echo htmlentities($form_data['mesaj']); ?></textarea>
			</p>
			<p>
			<input type="submit" name="submit" value="Trimite" class="submit" />
			</p>			
	</form>

<?php
include ('lib/footer.html');
?>