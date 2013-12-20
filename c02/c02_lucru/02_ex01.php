<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Titlul pagina</title>
</head>
<body>
<?php 
	$culori=array(' '=>'','rosu'=>'#ff0000','verde'=>'#00ff00','albastru'=>'#0000ff','magenta'=>'#FF00FF','maron'=>'#800000');
	ksort($culori);
	# prelucrarea datelor din formular
	print_r($_GET); // pt debug
	
	// daca s-a apasat butonul, preiau datele din formular si le memorez invariabile simple
	if(isset($_GET['submit'])){
			$fundal = !empty($_GET['fundal'])?$_GET['fundal']:NULL;//daca am selectat, memorez valoarea, altfel NULL
			$text = !empty($_GET['text'])?$_GET['text']:NULL;
						
			//	daca am date, afisez informatiile transmise prin formular, altfel mesaj
			if($fundal && $text){
				echo "<p style=\"background-color:$fundal ; color:$text ; padding:10px;\">Uite ce a iesit!</p>";
				}else{
					echo "<p>Completati/selectati datele din formular!</p>";
					}
	}// end if isset
?>

<form action="" method="get">
	<fieldset style="width:50%">
		<legend>Alegeti culorile:</legend>
		<p>
			<label style="width:100px;display:inline-block">Fundal:
				<?php
				//start select
				echo "<select name=\"fundal\">";
				//elemente option
				foreach($culori as $key=>$value){
					echo "<option style=\"background-color:$value\" value=\"$value\">$key</option>";
					}
				//end select
				echo "</select>";								
				?>
			</label>
			<label style="width:100px;display:inline-block">Text:
				<?php
				//start select
				echo '<select name="text">';
				//elemente option
				foreach($culori as $key=>$value){
					echo "<option style=\"background-color:$value\" value=\"$value\">$key</option>";
					}
				//end select
				echo "</select>";								
				?>
			</label>
		</p>	
	</fieldset>	
	<p><input type="submit" name="submit" value="Trimite!"/></p>
</form>
</body>
</html>