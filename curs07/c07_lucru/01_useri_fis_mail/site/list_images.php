<?php # list_images.php - afisez lista fisierelor imagine dintr-un folder
$page_title = 'Lista imagini';
include ('./lib/header.html');
?>

<h1>Lista imaginilor dintr-un folder dat</h1>

<?php

// Setez timezone:
date_default_timezone_set ('Europe/Bucharest');

$dir = '../uploads'; // Definesc folderul de vazut.

if(!file_exists($dir)) { // daca folderul nu exista
	// mesaj de eroare
	echo "Folderul nu exista!";
	
} else{ //folderul exista, afisez lista de imagini
	
	// start ul
	echo "<ul>";
	$files = array();
	
	// Memorez toate imaginile intr-un array $files (functia scandir($dir))
	$files = scandir($dir);
	//secho '<pre>'.var_export($files,true).'</pre>'; //pt debug

	// Parcurg cu foreach $files si afisez denumirea fiecarei imagini ca link
	foreach ($files as $image) {
	
		if (substr($image, 0, 1) != '.') { // Ignor orice incepe cu punct
		
			// Calculez dimensiunea imaginii in kb: filesize ("$dir/$image") returneaza dimensiunea in bytes
			$size = filesize("$dir/$image");			
			// Determin data si ora la care a fost incarcata imaginea: date("F d, Y H:i:s", filemtime("$dir/$image"))
			
						// Afisez li sub forma de link
			$date = filemtime("$dir/$image");
			echo "<li><a href=\"$dir/$image\">$image ($size, $date)</a></li>";
					
		} // End if.
	    
	} // End foreach.
} // End else - folderul exista

// End ul
echo "</ul>";
?>


<?php
include ('./lib/footer.html');
?>