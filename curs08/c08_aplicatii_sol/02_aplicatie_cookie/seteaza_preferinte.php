<?php
ob_start();
?>
<html>
<!--
I.Creati scriptul seteaza_preferinte.php in care:

1.Creati un formular prin care utilizatorului i se prezinta un meniu derulant din care poate selecta culoarea de fundal si un altul pentru a selecta culoarea fontului. Meniul afiseaza culorile in forma textuala, dar valorile sunt coduri hexa de culoare. Puteti folosi urmatorul array: $culori=array('#ffffff'=>'Alb','#00cc00'=>'Verde','#0000ff'=>'Albastru','#cc0000'=>'Rosu','#000000'=>'Negru');
2.Declarati variabila fanion care sa indice daca au fost expediate cookie-urile:
$cookies=FALSE;
3.Daca formularul a fost trimis;
creati cookie-urile 'bg_color' si 'font_color', fiecare avand drept valoare culoarea corespunzatoare preluata din formular
veti folosi functia setcookie($name, $value)
dupa expedierea formularului, se expediaza cookie-urile, deci veti atribui valoarea TRUE variabilei $cookies
4.Daca au fost expediate cookie-urile ($cookies==TRUE), transmiteti un mesaj corespunzator.
5.Incarcati scriptul pe server si verificati in browser ca au fost tranmise cookie-urile (Firefox v. 1.9: Tools -> Page Info -> View Cookies)
-->
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php
//cookie-urile trebuie trimise din server catre client inaintea oricarei alte informatii

$culori=array('#ffffff'=>'Alb','#00cc00'=>'Verde','#0000ff'=>'Albastru','#cc0000'=>'Rosu','#000000'=>'Negru');
$cookies=FALSE;

if(isset($_POST['submit'])){
	//creez cookie-urile
	$bg_color=$_POST['bg_color'];
	$font_color=$_POST['font_color'];
	
	setcookie('bg_color',$bg_color,time()+60*60);
	setcookie('font_color',$font_color,time()+60*60);
	
	$cookies=TRUE;
		
	}//end if(isset($_POST['submit']))
if($cookies){
	echo 'Setarile dvs. au fost preluate. Click <a href="vezi_preferinte.php"> aici </a> pentru a reveni la pagina principala';
	}

?>


<p>Setati preferintele dvs:</p>
<form action="" method="post">
	<label for="bg_color">Culoare  de fundal</label>
	<select name="bg_color" id="bg_color">
		<option value="" selected="selected">Culoarea de fundal</option>		
		<?php 
			foreach($culori as $cod=>$culoare){
				echo "<option value=\"$cod\"";
				if(isset($_POST['bg_color']) && $_POST['bg_color']==$cod) echo 'selected=\"selected\"';
				echo ">$culoare</option>";
				}
		?>	
	</select>
	
	<label for="font_color">Culoarea fontului</label>
	<select name="font_color" id="font_color">
		<option value="" selected="selected">Culoarea fontului</option>
		<?php 
			foreach($culori as $cod=>$culoare){
				echo "<option value=\"$cod\"";
				if(isset($_POST['font_color']) && $_POST['font_color']==$cod) echo 'selected=\"selected\"';
				echo ">$culoare</option>";
				}
		?>	
	</select>
	<input type="submit" name="submit" value="Seteaza preferintele!" />
</form>
</body>
</html>

<?php
ob_end_flush();
?>