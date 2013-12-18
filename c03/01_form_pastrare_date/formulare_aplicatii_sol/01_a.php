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

# daca a fost transmis formularul, procesez datele
if(isset($_POST['btnSubmit'])) {
	
	$erori 		= array();//init array-ul de erori
	
	//preiau datele in variabile simple
	$nume 			= trim($_POST['nume']);
	$prenume 		= trim($_POST['prenume']);
	
	//validez nume
	if(!$nume) {
		$erori[] = '<p class="error">campul nume necompletat</p>';
		}
	//validez prenume
	if(!$prenume) {
		$erori[] = '<p class="error">campul prenume necompletat</p>';
		}
	
	//print_r($erori); //pt debug
	if(count($erori)!=0) {//daca am erori, le afisez
		echo implode('', $erori);
		}else{//daca nu am erori, afisez datele din formular
		echo "<p class=\"message\">Nume: $nume </p>";
		echo "<p class=\"message\">Prenume: $prenume </p>";
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
<input type="text" name="nume" value="" />
</p>
<p>
<label style="width:150px;display:inline-block">Prenume: </label>
<input type="text" name="prenume" value="" />
</p>
</fieldset>
<input type="submit" name="btnSubmit" value="Trimite" />
</form>
</body>
</html>