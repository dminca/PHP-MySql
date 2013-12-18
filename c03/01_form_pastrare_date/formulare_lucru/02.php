<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<title>Formular</title>
	<style type="text/css">
		.error{
			color:red;			
			}
		.error:before{
			content: "Eroare: ";
			}
		.message{
			color:blue;			
			}
	</style>
</head>
<body>

<?php
$nume = '';
$prenume = '';
$mesaj = ''; //adaugat
$calificativ = '';//adaugat
$cursuri = array(); //adaugat

# daca a fost transmis formularul, procesez datele
if(isset($_POST['btnSubmit'])) {
	
	$erori 		= array();//init array-ul de erori
	
	//preiau datele in variabile simple
	$nume 			= trim($_POST['nume']);
	$prenume 		= trim($_POST['prenume']);
	$mesaj			= trim($_POST['mesaj']); //adaugat
	$calificativ 	= isset($_POST['calificativ'])?$_POST['calificativ']:''; //adaugat
	$cursuri 		= isset($_POST['cursuri'])?$_POST['cursuri']: array(); //adaugat
	//validez nume
	if(!$nume) {
		$erori[] = '<p class="error">campul nume necompletat</p>';
		}
	//validez prenume
	if(!$prenume) {
		$erori[] = '<p class="error">campul prenume necompletat</p>';
		}

	//validez mesaj
	if(!$mesaj) {
		$erori[] = '<p class="error">campul mesaj necompletat</p>'; //adaugat
		}

	//validez calificativ
	if(!$calificativ) {
		$erori[] = '<p class="error">campul calificativ neselectat</p>'; //adaugat
		}

	//validez cursuri
	if(!$cursuri) {
		$erori[] = '<p class="error">campul cursuri neselectat</p>'; //adaugat
		}
	
	//print_r($erori); //pt debug
	if(count($erori)!=0) {//daca am erori, le afisez
		echo implode('', $erori);
		}else{//daca nu am erori, afisez datele din formular
		echo "<p class=\"message\">Nume: $nume </p>";
		echo "<p class=\"message\">Prenume: $prenume </p>";
		echo "<p class=\"message\">Mesaj: $mesaj </p>"; //adaugat
		echo "<p class=\"message\">Calificativ: $calificativ </p>"; 
		echo "<p class=\"message\">Cursuri: ".implode(",", $cursuri)." </p>";
		}
	}//end if(isset($_POST['btnSubmit']))
	
//daca nu a fost transmis formularul, il afisez pentru completarea campurilor
//$_SERVER['PHP_SELF'] = numele scriptului curent
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<fieldset style="width:50%">
<legend>Completati datele:</legend>
<p>
<label style="width:150px;display:inline-block">Nume:</label>
<input type="text" name="nume" value="<?php
echo $nume;
?>" />
</p>
<p>
<label style="width:150px;display:inline-block">Prenume: </label>
<input type="text" name="prenume" value="<?php
echo $prenume;
?>" />
</p>
<p>
<label>Limba predare</label>
<select name="Limba">
	<option value="en">en</option>
	<option value="ro">ro</option>
	<option value="fr">fr</option>
</select>
</p>
<p>
<label style="width:150px;display:inline-block">Calificativ: </label>
<?php
$array = array('foarte bine', 'bine', 'satisfacator');
//generez grupul de butoane radio

foreach ($array as $value) {
	echo "<input type='radio' name='calificativ' value='$value'";
	if ($calificativ == $value) 
		echo "checked='checked'";
	echo "/>$value";
}

?>
<!--
<input type="radio" name="calificativ" value="foarte bine" <?php
if (strcasecmp($calificativ, 'foarte bine')==0) {
 	echo "checked='checked'";
 } //adaugat
?>
/>FB

<input type="radio" name="calificativ" value="bine" <?php
if (strcasecmp($calificativ, 'bine')==0) {
 	echo "checked='checked'";
 } //adaugat
?>/>BINE
<input type="radio" name="calificativ" value="satisfacator" <?php
if (strcasecmp($calificativ, 'satisfacator')==0) {
 	echo "checked='checked'";
 } //adaugat
?>/>SATISFACATOR 
</p>
-->

<p>
<label style="width:150px;display:inline-block">Cursuri dorite: </label>
<?php
$array2 = array('Python', 'Java', 'C');
//generez grupul de casete de validare

foreach ($array2 as $value) {
	echo "<input type='checkbox' name='cursuri[]' value='$value'";
	if (is_array($array2)&& in_array($value, $cursuri)) {
		echo "checked='checked'";
	}
	echo "/>$value";	
}
?>
<!--
<input type="checkbox" name="cursuri[]" value="Python" 
<?php
if (is_array($cursuri) && in_array('Python', $cursuri)) {
	echo "checked='checked'";
}
?>
/>Python
<input type="checkbox" name="cursuri[]" value="Java" 
<?php
if (is_array($cursuri) && in_array('Java', $cursuri)) {
	echo "checked='checked'";
}
?>
/>Java
<input type="checkbox" name="cursuri[]" value="C" 
<?php
if (is_array($cursuri) && in_array('C', $cursuri)) {
	echo "checked='checked'";
}
?>

/>C
-->
</p>
<p>
<label style="width:150px;display:inline-block">Mesaj: </label>
<textarea name="mesaj"><?php
echo $mesaj; //adaugat
?></textarea>
</p>
</fieldset>
<input type="submit" name="btnSubmit" value="Trimite" />
</form>
</body>
</html>