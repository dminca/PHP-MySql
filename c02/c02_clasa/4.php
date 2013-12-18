<?php #declarare functii
function select($name, $array) { //parametrii formali

  			//elem option
  			foreach ($array as $key => $value) {
  				echo "<input type='checkbox' name='$name' value='$value'><span style='background-color:$value;'>$key</span>"; 
  			}
}


function checkbox($name, $array) { //parametrii formali
  			//generez checkbox
  			foreach ($array as $key => $culorip) {
  				echo "<input type='checkbox' name='$name"."[]'"." value='$culorip'><span style='background-color:$culorip;width: 50px;height: 50px;'>$key</span>"; 
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
print_r($_GET); #pt debug

 //preluarea si prelucrarea datelor din formular
if (isset($_GET['btn'],$_GET['culorip'])) { //daca s-a apasat butonul
	//preiau datele in variabile simple
	$culorip = $_GET['culorip'];
	echo "<br/>Culorile selectate:";
	print_r($culorip);

	//generez patratele colorate pe baza arrayului $culorip
	foreach ($culorip as $value) {
		echo "<div style='background-color:$value;width: 50px;height: 50px;'></div>"; 
	}
}
 ?>
  	<form action="" method="get">
  		<fieldset>
  			<legend>Alegeti culorile</legend>
  			<label>Fundal:</label>
  			<?php #generez select pt fundal
  			checkbox('culorip',$culori);
  			
  			?>
  			<br/>			
  		</fieldset>
  			<input type="submit" name="btn" value="Click me!"/>
  	</form>  	
 </body>
</html>