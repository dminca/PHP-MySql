<?php # Upload fisier
$page_title = 'Upload pentru un fisier';
include ('./lib/header.html');
?>

<h1>Upload pentru un fisier</h1>

<?php
# initializari
$max_file_size = 1024*20;//20KB
$errors = array();

if(isset($_POST['upload'])){ // s-a transmis formularul
	# afisez continutul lui $_FILES
	 // echo '<pre>'. var_export($_FILES, true).'</pre>'; //pt debug	
	if(isset($_FILES['fisier'])) { // s-a transmis fisierul
		
		# afisez datele fisierului - pt debug
		$file_data = $_FILES['fisier'];
		echo '<pre>'. var_export($_FILES, true).'</pre>'; //pt debug	
		
		# daca am erori, le memorez in $errors
		if($file_data['error'] > 0) { // am eroare la upload
			
			} else{ // nu am eroare la upload
				# verific extensia; daca mime type-ul fisierului nu este printre cele acceptate, memorez mesajul de eroare
				
				 }
			
		# daca nu am erori, mut fisierul cu move_uploaded_file($tmp_name,$destination); $destination = $upload_path."/".$file_name;
		# $file_name - numele fisierului dupa mutare; ; poate fi $file_data['name'] sau se poate codifica cu md5() de ex. $file_data['tmp_name']
		if(empty($errors)) { 
						
				$upload_path = "../uploads";
				
				# daca nu am folderul destinatie, il creez; pp am drepturi de scriere
				if(!file_exists($upload_path)){ 
					mkdir($upload_path, 0777); // nu am verificat rezultatul pt a nu incarca codul
					}
				
				# mut fisierul	
				$ok = false;
				// setez $tmp_name, $destination
				// $ok =  @ move_uploaded_file($tmp_name,$destination); // $ok poate fi TRUE sau FALSE
				
				if($ok){ // functia a rulat si a returnat true => mutare cu succes
					// mesaj de ok
					}else { // eroare la mutare
						// memorez eroarea in $errors
						}
				} // end nu am erori
				
			# am erori, le afisez 			
			if(!empty($errors)) {  // nu folosesc else pt if-ul anterior pt ca $errors se actualizeaza in if
					} // end am erori, le afisez
		} // end if(isset($_FILES['fisier1']))
			
	} // end if(isset($_POST['upload']))
?>

<form class="form_settings" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo  $max_file_size ?>" />
	<fieldset style="padding:10px;">
		<legend>Alegeti un fisier imagine: </legend>
		<p>
		<label for="fisier">Fisier :</label>
	 	<input type="file" name="fisier" id="fisier" /> <br />
		</p> 
		<p>
		<input class="submit" type="submit" name="upload" value="Upload" />
		</p>
	</fieldset>
</form>

<?php
include ('./lib/footer.html');
?>
