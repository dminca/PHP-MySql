<?php # list_images.php - afisez lista fisierelor imagine dintr-un folder
$page_title = 'Lista imagini';
include ('./lib/header.html');
?>

<h1>Lista imaginilor dintr-un folder dat</h1>

<?php

// Setez timezone:
date_default_timezone_set ('Europe/Bucharest');

$dir = '../uploads'; // Definesc folderul de vazut.

if(!file_exists($dir)) {
	echo '<p class="error">Folderul '.$dir.' nu exista!</p>';
	
} else{
	echo "<h2>Imaginile din folderul $dir:</h2>
			<p>Click pe imagine pentru a o vedea.</p>
			<ul>";
	$files = @ scandir($dir); // Citesc toate imaginile intr-un array.
	
	// echo '<pre>'.var_export($files,true).'</pre>'; //pt debug

	// Afisez denumirea fiecarei imagini ca link
	foreach ($files as $image) {
	
		if (substr($image, 0, 1) != '.') { // Ignor orice incepe cu punct
		
			// Preiau dimensiunea imaginii in pixeli:
			$image_size = getimagesize ("$dir/$image");
			
			// Calculez dimensiunea imaginii in kilobyti:
			$file_size = round ( (filesize ("$dir/$image")) / 1024, 2) . "kb";
			
			// Determin data si ora la care a fost incarcata imaginea:
			$image_date = date("F d, Y H:i:s", filemtime("$dir/$image"));
			
			// Fac numele imaginii un URL "sigur":
			$image_name = urlencode($image);
			
			// Afisez informatia:
			
			# varianta aceasta functioneaza cand imaginile se afla intr-un folder in interiorul radacinii
			//echo "<li><a href=\"$dir/$image\">$image</a> $file_size ($image_date)</li>\n";
			
			# varianta aceasta este necesara cand imaginile se afla intr-un folder dinafara radacinii			
			echo "<li><a href=\"view_image.php?image=$image\">$image</a> $file_size ($image_date)</li>\n";
		
		} // End if.
	    
	} // End foreach.
} // End else - folderul exista

?>

</ul>
<?php
include ('./lib/footer.html');
?>