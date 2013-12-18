<?php #declarare functii
function select($name, $array) { //parametrii formali

  			//elem option
  			foreach ($array as $key => $value) {
  				echo "<input type='radio' name='$name' value='$value'><span style='background-color:$value;'>$key</span>"; 
  			}
}

?>



<!DOCTYPE HTML>
<html lang="en-US">
 <head> 
 	<title> </title> 
 </head>
 <body>
 <?php #scriptul principal
 $culori=array('rosu'=>'#ff0000','verde'=>'#00ff00','albastru'=>'#0000ff','magenta'=>'#FF00FF','maron'
=>'#800000');
 //print_r($_GET); #pt debug

 //preluarea si prelucrarea datelor din formular
if (isset($_GET['btn'])) { //daca s-a apasat butonul
	//preiau datele in variabile simple
	$fundal = $_GET['fundal'];
	$text = $_GET['text'];
	echo "<p style='background-color:$fundal;color:$text'>O LA LAAAA!</p>";
}
 ?>
  	<form action="" method="get">
  		<fieldset>
  			<legend>Alegeti culorile</legend>
  			<label>Fundal:</label>
  			<?php #generez select pt fundal
  			select('fundal',$culori);
  			
  			?>
  			<br/>
  			<label>Text:</label>
  			<?php #generez select pt text
  			select('text',$culori);

  			?>  			
  		</fieldset>
  			<input type="submit" name="btn" value="Click me!"/>
  	</form>  	
 </body>
</html>