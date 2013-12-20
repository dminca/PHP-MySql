<?php
$a="Hello World" ; //variabila globala
$b="Lorem ipsum";
function salut(){

	global $b;
	$a="Salut cititorule"; // variabila locala
	$b="WOZAAAA!!!!"; // variabila locala
}

//script principal
salut();
echo "a=$a"; echo "<br/> b=$b";

?>