<!DOCTYPE HTML>
<html>
 <head>
  <title> </title>
 </head>
 <body>
<fieldset>
	<form method="get" action="">
	<label>Cate coloane?:</label><input type="text" name="nr_coloane"/><br/><br/>
	<label>Cate randuri?:</label><input type="text" name="nr_linii"/><br/>
	<input style="border-radius: 20% 20%; background: #A8C15C; color: #fff" type="submit" name="btn" value="Launch !"/>
	</form>
</fieldset>

<?php
if (isset($_GET['btn'])) { // defining the parameters
	$nr_coloane = $_GET['nr_coloane'];
	$nr_linii = $_GET['nr_linii'];
	if (is_numeric($nr_coloane)&&is_numeric($nr_linii)) { // checking if it's numeric or not..
		echo "La...";
		tabel($nr_coloane,$nr_linii); // if we got the params and it's numeric, call the function
		echo "<br><p>...beri, cate degete vezi?";
	} else {
		echo "Nu ati introdus nimic";
	}

}

?>
<?php
	function tabel($nr_coloane, $nr_linii){
	/*
	=====DATA BOX======
	*/
	$numero = 1; // numbering starts from
	$start = 5; // divided with
	#---------end

	/*
	====START CODE====
	*/
	echo "<table border='1'>"; // open Table
	 
	for($tr=1;$tr<=$nr_linii;$tr++){      
	     echo "<tr>"; // deschid TR

	        for($td=1;$td<=$nr_coloane;$td++){ // deschid TD
	        	echo "<td>".($numero++)*$start."</td>";
	        }
	    echo "</tr>"; // inchid TR
	}
	 
	echo "</table>";  // inchid table & bye!
	#end code
	}
?>
 </body>
</html>
