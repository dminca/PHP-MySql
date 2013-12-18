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
# valori initiale, pentru prima afisare a formularului
$nume				='';
$prenume		='';
$mesaj			='';
$calificativ	='';
$limba			='';

# daca a fost transmis formularul, procesez datele
if(isset($_POST['btnSubmit'])) {
	
	$erori 		= array();//init array-ul de erori
	
	//preiau datele in variabile simple
	$nume 			= trim($_POST['nume']);
	$prenume 		= trim($_POST['prenume']);
	$mesaj			= trim($_POST['mesaj']);
	$calificativ	= isset($_POST['calificativ'])?$_POST['calificativ']:'';
	$limba 			= $_POST['limba'];	
	//validez nume
	if(!$nume) {
		$erori[] = '<p class="error">campul nume necompletat</p>';
		}
	//validez prenume
	if(!$prenume) {
		$erori[] = '<p class="error">campul prenume necompletat</p>';
		}
	//validez calificativ
	if(!$calificativ) {
		$erori[] = '<p class="error">campul calificativ neselectat</p>';
		}
	//validez limba
	if(!$limba) {
		$erori[] = '<p class="error">campul limba de predare neselectat</p>';
		}
	//validez mesaj
	if(!$mesaj) {
		$erori[] = '<p class="error">campul mesaj necompletat</p>';
		}
	
	//print_r($erori); //pt debug
	if(count($erori)!=0) {//daca am erori, le afisez
		echo implode('', $erori);
		}else{//daca nu am erori, afisez datele din formular
		echo "<p class=\"message\">Nume: $nume </p>";
		echo "<p class=\"message\">Prenume: $prenume </p>";
		echo "<p class=\"message\">Calificativ: $calificativ </p>";	
		echo "<p class=\"message\">Limba de predare: $limba </p>";	
		echo "<p class=\"message\">Mesaj: $mesaj </p>";
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
<input type="text" name="nume" value="<?php echo $nume; ?>" />
</p>
<p>
<label style="width:150px;display:inline-block">Prenume: </label>
<input type="text" name="prenume" value="<?php echo $prenume; ?>" />
</p>
<p>
<label style="width:150px;display:inline-block">Calificativ: </label>
<input type="radio" name="calificativ" value="foarte bine" 
<?php if($calificativ=='foarte bine') echo 'checked="checked"' ?> 
/>Foarte bine
<input type="radio" name="calificativ" value="bine" 
<?php if($calificativ=='bine') echo 'checked="checked"' ?> 
/>Bine
<input type="radio" name="calificativ" value="satisfacator" 
<?php if($calificativ=='satisfacator') echo 'checked="checked"' ?> 
/>Satisfacator
</p>
<p>
<label style="width:150px;display:inline-block">Limba de predare: </label>
<select name="limba">
	<option value="">Selectati</option>
	<option value="ro" <?php if($limba=='ro') echo 'selected="selected"'; ?>>Romana</option>
	<option value="en" <?php if($limba=='en') echo 'selected="selected"'; ?>>Engleza</option>
</select>
</p>
<p>
<label style="width:150px;display:inline-block">Mesaj: </label>
<textarea name="mesaj"><?php echo $mesaj; ?></textarea>
</p>
</fieldset>
<input type="submit" name="btnSubmit" value="Trimite" />
</form>
</body>
</html>