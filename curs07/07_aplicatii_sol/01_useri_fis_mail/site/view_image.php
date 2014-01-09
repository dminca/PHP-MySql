<?php
// Aceasta pagina afiseaza o imagine dintr-un folder dat

$dir = "../uploads";

$name = FALSE; // Variabila semafor:

// Verific daca am transmis numele unei imagini prin GET:
if (isset($_GET['image'])) {
	//echo $_GET['image'];
	
	// Verific daca am extensia unui fisier imagine:
	$ext = strtolower ( substr ($_GET['image'], -4));
	
	if (($ext == '.jpg') OR ($ext == 'jpeg') OR ($ext == '.png')) {

		// Calea completa catre imagine :
		$image = $dir."/{$_GET['image']}";

		// Verific daca imaginea exista si este un fisier:
		if (file_exists ($image) && (is_file($image))) {
			
			// Preiau numele imaginii:
			$name = $_GET['image'];	
			
		} // End if file_exists().

	} // End if $ext.

} // End if isset($_GET['image'])

// Daca a aparut o problema, folosesc o imagine implicita:
if (!$name) {
	$image = 'images/unavailable.png';	
	$name = 'unavailable.png';
}

// Preiau informatiile imaginii:
$info = getimagesize($image); // dimensiunea imaginii in pixeli, mime-type-ul
$fs = filesize($image); // dimensiunea fisierului in bytes

// Trimit informatia continuta de fisier:
header ("Content-Type: {$info['mime']}\n"); // tipul fisierului
header ("Content-Disposition: inline; filename=\"$name\"\n"); // numele fisierului
header ("Content-Length: $fs\n"); // dimensiunea fisierului

// Afisez imaginea:
readfile ($image); 
?>