<!-- 
03_ex01 - regex
Creati un formular care perimte introducerea a doua texte:
 modelul expresiei regulate si sirul care este verificat. Scriptul isi va transmite apoi aceste valori lui insusi si va raporta daca sirul corespunde cu modelul.
 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title></title>

</head>
<body>


<?php
/*--------------------
	initializari
	----------------------*/
	//folosesc $formData pt a prelua datele transmise prin formular
	$formData=$_POST;
	$formFields=array('pattern','string');
	
	$erori=array();

	foreach($formFields as $field){
		if(!isset($formData[$field])) {
			$formData[$field]='';
			}					
		}
	
	/*--------------------
	daca am apasat butonul submit, 
	preiau datele din formular si le afisez
	----------------------*/				
	if(isset($formData['submit'])){
		//preiau datele din $formData					
					
		$pattern=trim($_POST['pattern']);
		$string=trim($_POST['string']);		
		
	
		//validez datele
		if(!$pattern){
			$erori[]='Completati sirul Pattern!';
		}
		
		if(!$string){
			$erori[]='Completati sirul string!';
		}
		
		if(count($erori)>0){
			echo implode('<br />',$erori);
			}else{//prelucrez datele
				//verific daca formatul din $string respecta regula impusa de $pattern
				if(preg_match($pattern, $string, $matches)){
					echo '<strong>'. htmlspecialchars($string).'</strong> respecta formatul impus de regex!';
					//htmlspecialchars($string) se fol. pentru a afisa codul HTML (fara sa fie interpretat de catre browser)
					}
				else{
					echo '<strong>'.$string.'</strong> nu respecta formatul impus de regex!';
					}
			}//end else if($erori)
	}//end if(isset($_POST['submit']))
		
?>

<form action="" method="post">
	<table>
		<tr>
				<td colspan="2">
				<p style="color:red">Pentru Pattern specificati si caracterele delimitatoare; ex: /^[a-zA-Z\s\-\']{2,30}$/</p>
				</td>
	 	</tr>
		<tr>
				<td>Pattern:</td>		
				<td><input type="text" name="pattern" value="<?php echo $formData['pattern']; ?>" size="60" /></td>		
		</tr>			
		<tr>
				<td>String:</td>
				<td><input type="text" name="string" value="<?php echo $formData['string']; ?>" size="60"/></td>
		</tr>
		<tr>
				<td colspan="2">
				<input type="submit" name="submit" value="Verifica"/>
				</td>
	 	</tr>
	</table>
</form>
</body>
</html>