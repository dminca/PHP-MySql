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

<?php #functii
function form_radio($name,$array, $element =NULL){
	foreach($array as $k=>$v){
		echo "<input type=\"radio\" name=\"$name\" value=\"$k\"";
		if(strcasecmp($element,$k)==0) echo ' checked="checked"';
		echo 	"/>$v";	
		}	
	}

function form_select($name,$array, $element =NULL){
	//start select
	echo "<select name=\"$name\">";
	//elemente option
	foreach($array as $k=>$v){
		echo "<option value=\"$k\"";
		if(strcasecmp($element,$k)==0) echo ' selected="selected"';
		echo 	">$v</option>";	
		}
	// end select
	echo "</select>";
	}

function form_checkbox($name,$array, $element =NULL){
	foreach($array as $k=>$v){
		echo "<input type=\"checkbox\" name=\"$name"."[]"."\" value=\"$v\"";
		if(is_array($element)&& in_array($v,$element)) echo ' checked="checked"';
		echo 	"/>$v";	
		}	
	}
	
?>
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
		echo "<p class=\"message\">Nume: $nume</p>";
		echo "<p class=\"message\">Prenume: $prenume</p>";
		echo "<p class=\"message\">Calificativ: $calificativ</p>";
		echo "<p class=\"message\">Limba de predare: $limba</p>";
		echo "<p class=\"message\">Cursuri dorite:".implode(',',$cursuri)."</p>";
		echo "<p class=\"message\">Mesaj:$mesaj</p>";
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
<?php
	$array = array('fb'=>'foarte bine','b'=>'bine','s'=>'satisfacator');
	form_radio('calificativ', $array, $calificativ);
?>
</p>

<p>
<label style="width:150px;display:inline-block">Limba de predare:</label>
<?php
	$array = array(''=>'Selectati','en'=>'engleza','ro'=>'romana');
	form_select('limba', $array, $limba);
?>
</p>
<p>
<label style="width:150px;display:inline-block">Cursuri dorite:</label>
<?php
	$array	= array('Pyton','Java','C');
	form_checkbox('cursuri', $array, $cursuri);
?>
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