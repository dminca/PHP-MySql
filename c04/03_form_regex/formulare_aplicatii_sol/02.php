
<?php $title = 'Formular'; ?>

<?php
include "includes/header.php";
require_once "includes/form_functions.php";
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
		}else{
			$pattern='/^[a-zA-Z\s\-\']{2,30}$/';
			if(!preg_match($pattern,$nume)){
				$erori[]='<p class="error">Nume invalid!</p>';
				}				
			}
	//validez prenume
	if(!$prenume) {
		$erori[] = '<p class="error">campul prenume necompletat</p>';
		}else{
			$pattern='/^[a-zA-Z\s\-\']{2,30}$/';
			if(!preg_match($pattern,$prenume)){
				$erori[]='<p class="error">Prenume invalid!</p>';
				}				
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

<?php
include "includes/footer.php";
?>