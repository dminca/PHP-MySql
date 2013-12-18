<?php
include "includes/header.htm";
#preluarea si prelucrarea datelor din formular
//print_r($_GET); //pt debug
if(isset($_GET['btn'])){
	if(!empty($_GET['nume'])){
		$nume=$_GET['nume'];
	} else {
		$nume = NULL;
		echo "<p>Completati campul nume</p>";
	}	
	$nume = $_GET['nume'];
	$prenume = $_GET['prenume'];
	$email= $_GET['email'];
	$comentariu=$_GET['comentariu'];

	echo "<p>Multumesc <strong>$nume $prenume</strong> pentru mesaju <em>$comentariu</em>.</p>
	<p>Iti vom raspunde la <strong>$email</strong>";
}
?>

<form method="get" action="">
		<fieldset>
			<legend>Completati datele:</legend>
			<label>Nume:</label><input type="text" name="nume" value=""/><br/>
			<label>Prenume:</label><input type="text" name="prenume" value=""/><br/>
			<label>Email:</label><input type="text" name="email" value=""/><br/>
			<label>Comentariu:</label><textarea name="comentariu"></textarea><br/>
		</fieldset>  		
			<input type="submit" name="btn" value="Trimite"/>
  	</form>
<?php
include "includes/footer.htm";
?>