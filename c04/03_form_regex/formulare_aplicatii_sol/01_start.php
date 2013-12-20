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
		.flabel{
			width:150px;display:inline-block;
			}
	</style>
</head>
<body>

<?php #functii

/*
    $name - va fi numele elementului respectiv.
    $elementData - apare la majoritatea elementelor si este o valoare (sau un array) cu ce a completat sau a ales utilizatorul in/din campul respectiv. Prin urmare este informatia ce vine de la utilizator, se transmite prin POST sau GET la reincarcarea formularului, si este folosita pentru a repopula elementul respectiv cu informatie. Pentru ca $formData este in general POST sau GET, valoarea acestui parametru provine din $formData["nume_element"]. Pe baza acestui element se genereaza elementele cu checked="checked" (bifate) sau optiunile cu selected="selected".
	 $initData - apare la grupuri de butoane radio, casete de validare sau element de tip select; este un array pe baza caruia se construieste grupul 	    
    $params - un string cu atribute optionale de tip html ce pot fi inserate in interiorul elementului respectiv (in interiorul tagului de inceput).

*/

function form_input($name, $elementData = '', $type = 'text', $params = '') {
	echo "<input type= \"$type\" name= \"$name\"";    
   echo " value = \"$elementData\"";

   if ($params != '') {
      echo ' ' . $params;
    }
   echo " />";
} // end form_input

function form_textarea($name, $elementData = '', $params = '')
{
	echo "<textarea name=\"$name\" $params>";
 	echo $elementData;
	echo "</textarea>";
} // end form_textarea

function form_radio($name,array $initData, $elementData = NULL){
	foreach($initData as $k=>$v){
		echo "<input type=\"radio\" name=\"$name\" value=\"$k\"";
		if(strcasecmp($elementData,$k)==0) echo ' checked="checked"';
		echo 	"/>$v";	
		}	
} // end form_radio

function form_select($name,array $initData, $elementData = NULL){
	//start select
	echo "<select name=\"$name\">";
	//elemente option
	foreach($initData as $k=>$v){
		echo "<option value=\"$k\"";
		if(strcasecmp($elementData,$k)==0) echo ' selected="selected"';
		echo 	">$v</option>";	
		}
	// end select
	echo "</select>";
} // end form_select

function form_ck($name,array $initData, array $elementData = NULL){
	foreach($initData as $k=>$v){
		echo "<input type=\"checkbox\" name=\"$name"."[]"."\" value=\"$k\"";
		if(is_array($elementData)&& in_array($k,$elementData)) echo ' checked="checked"';
		echo 	"/>$v";	
		}	
} // end form_ck
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
	$cursuri		= isset($_POST['cursuri'])?$_POST['cursuri']:array();	
	
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
		$erori[] = '<p class="error">campul cursuri neselctat</p>';
		}		
		
	
	//print_r($erori); //pt debug
	if(is_array($erori) && count($erori)!=0) {//daca am erori, le afisez
		echo implode('', $erori);
		}else{//daca nu am erori, afisez datele din formular
		echo "<p class=\"message\">Nume: $nume</p>";
		echo "<p class=\"message\">Prenume: $prenume</p>";
		echo "<p class=\"message\">Calificativ: $calificativ</p>";
		echo "<p class=\"message\">Limba de predare: $limba</p>";
		echo "<p class=\"message\">Cursuri dorite: ".implode(', ',$cursuri)."</p>";
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
<label class="flabel">Nume:</label>
<?php form_input('nume', $nume, 'text', 'size ="25" maxlength ="50"'); ?>
</p>
<p>
<label class="flabel">Prenume: </label>
<?php form_input('prenume', $prenume, 'text', 'size ="25" maxlength ="50"'); ?>
</p>
<p>
<label class="flabel">Calificativ:</label>
<?php
	$array = array('fb'=>'foarte bine','b'=>'bine','s'=>'satisfacator');
	form_radio('calificativ', $array, $calificativ);
?>
</p>
<p>
<label class="flabel">Limba de predare:</label>
<?php
	$array = array(''=>'Selectati','en'=>'engleza','ro'=>'romana');
	form_select('limba', $array, $limba);
?>
</p>
<p>
<label class="flabel">Cursuri dorite:</label>
<?php
	$array	= array('pyton'=>'Pyton','java'=>'Java','c'=>'C');
	form_ck('cursuri', $array, $cursuri);
?>
</p>
<p>
<label class="flabel">Mesaj:</label> 
<?php form_textarea('mesaj', $mesaj, 'rows="10" cols="30"'); ?>
</p>
</fieldset>
<?php form_input('btnSubmit', 'Trimite', 'submit'); ?>
</form>
</body>
</html>