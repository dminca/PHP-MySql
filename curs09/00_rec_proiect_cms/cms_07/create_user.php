<?php require_once("includes/session.php"); ?>
<?php session_set(); ?>

<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/form_functions.php") ?>
<?php
	include_once("includes/form_functions.php");
	
	// START PROCESARE FORMULAR

	/*-- pastrarea datelor in formular; init $form_data pentru cazul in care formularul a fost afisat prima data-- */
	$form_fields= array('username', 'password');
	foreach($form_fields as $fieldname) {
		$form_data[$fieldname]='';
	}
		
	if (isset($_POST['submit'])) { // Formularul a fost transmis
		/*-- pastrarea datelor in formular; actualizare $form_data dupa apasarea butonului-- */	
		$form_data=$_POST;
				
		/*--validare formular--*/ 
		//init errors; pentru un camp va fi semnalata o singura eroare
		$errors = init_errors($form_fields);
			
		//campuri obligatorii
		$required_fields = array('username', 'password');
		$required_fields_errors=check_required_fields($required_fields);
			
		//campuri cu format
		$fields_with_pattern=array('username'=>'/^[a-zA-Z\-\s\' " 0-9]{2,30}$/','password'=>'/^[a-zA-Z\-\s\' " 0-9]{2,30}$/');
		$fields_with_pattern_errors=check_fields_with_pattern($fields_with_pattern);
		
		$errors=$required_fields_errors+$fields_with_pattern_errors;//reuniune de array-uri; pt valori cu aceeasi cheie, se pastreaza valaorea din primul array
	
		/*--procesarea datelor sau afisare erorilor--*/
		if(empty($errors)){//daca nu am erori, procesez datele
			$username = mysql_prep($_POST['username']);
			$password = mysql_prep($_POST['password']);
			$hashed_password = md5($password);
			
			$query = "INSERT INTO users (
							username, hashed_password
						) VALUES (
							'{$username}', '{$hashed_password}'
						)";
			$result = mysqli_query($connection,$query);
			//echo $query;
			if ($result) {
				$message = "Utilizatorul a fost creat cu succes.";
				foreach($form_fields as $fieldname) {$form_data[$fieldname]='';}
			} else {
				$message = "Utilizatorul nu a putut fi creat.";
				$message .= "<br />" . mysqli_error($connection);
			}	
		}
		}
?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<a href="staff.php">Inapoi la meniu</a>
		</td>
		<td id="page">
			
			<h2>Creeaza utilizator</h2>
			<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
			<?php if (!empty($errors)) { display_error($errors); } ?>
			<form action="" method="post">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" maxlength="30" value="<?php echo htmlentities($form_data['username']); ?>" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($form_data['password']); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Create user" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>