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
$cursuri		=array();

# daca a fost transmis formularul, procesez datele
if(isset($_POST['btnSubmit'])) {
	
	$erori 		= array();//init array-ul de erori
	
	//preiau datele in variabile simple
	$nume 			= trim($_POST['nume']);
	$prenume 		= trim($_POST['prenume']);
	$mesaj 			= trim($_POST['mesaj']);
	$calificativ 	= isset($_POST['calificativ'])?$_POST['calificativ']:'';	
	$limba 			= $_POST['limba'];
	$cursuri		= isset($_POST['cursuri'])?$_POST['cursuri']:'';	
	
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
		$erori[] = '<p class="error">campul mesaj necompletat</p>';
		}			
	
	//validez calificativ
	if(!$calificativ) {
		$erori[]='<p class="error">campul mesaj necompletat</p>';
		}	
	
	//validez limba
	if(!$limba) {
		$erori[] = '<p class="error">campul limba de predare neselctat</p>';
		}
		
	//validez cursuri
	if(!$cursuri) {
		$erori[] = '<p class="error">ampul cursuri neselctat</p>';
		}		
	//print_r($erori); //pt debug
	if(count($erori)!=0) {//daca am erori, le afisez
		echo implode('', $erori);
		}else{//daca nu am erori, afisez datele din formular
		echo "<p class=\"message\">nume: $nume <br /> prenume:$prenume </p>";
		echo "<p class=\"message\">calificativ: $calificativ</p>";
		echo "<p class=\"message\">limba de predare: $limba</p>";
		echo "<p class=\"message\">cursuri dorite:".implode(',',$cursuri)."</p>";
		echo "<p class=\"message\">mesaj:$mesaj</p>";
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
<input type="text" name="nume" value="<?php echo $nume ?>" />
</p>
<p>
<label style="width:150px;display:inline-block">Prenume: </label>
<input type="text" name="prenume" value="<?php echo $nume ?>" />
</p>
<p>
<label style="width:150px;display:inline-block">Calificativ:</label>
<input type="radio" name="calificativ" value="foarte bine"
<?php if(strcasecmp($calificativ,'foarte bine')==0) echo 'checked="checked"'?>
/>FB
<input type="radio" name="calificativ" value="bine" 
<?php if(strcasecmp($calificativ,'bine')==0) echo 'checked="checked"'?>
/>B
<input type="radio" name="calificativ" value="satisfacator" 
<?php if(strcasecmp($calificativ,'satisfacator')==0) echo 'checked="checked"'?>
/>S
</p>

<p>
<label style="width:150px;display:inline-block">Limba de predare:</label>
<select name="limba">
	<option value="">Selectati</option>
	<option value="en"
		<?php if(strcasecmp($limba,'en')==0) echo 'selected="selected"' ?>
	>Engleza</option>
	<option value="ro"
		<?php if(strcasecmp($limba,'ro')==0) echo 'selected="selected"' ?>
	>Romana</option>
</select>
</p>
<p>
<label style="width:150px;display:inline-block">Cursuri dorite:</label>
<input type="checkbox" name="cursuri[]" value="Python"
<?php if(is_array($cursuri)&& in_array("Python",$cursuri)) echo 'checked="checked"'?>
/>Python
<input type="checkbox" name="cursuri[]" value="Java" 
<?php if(is_array($cursuri)&& in_array("Java",$cursuri)) echo 'checked="checked"'?>
/>Java
<input type="checkbox" name="cursuri[]" value="C" 
<?php if(is_array($cursuri)&& in_array("C",$cursuri)) echo 'checked="checked"'?>
/>C
</p>
<p>
<label style="width:150px;display:inline-block">Mesaj:</label> 
<textarea name="mesaj"><?php echo $mesaj ?></textarea>
</p>
</fieldset>
<input type="submit" name="btnSubmit" value="Trimite" />
</form>
</body>
</html>