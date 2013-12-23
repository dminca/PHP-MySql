<?php # Upload fisier
$page_title = 'Upload pentru un fisier';
include ('./lib/header.html');
?>

<h1>Upload pentru un fisier</h1>

<?php
# initializari
$max_file_size = 1024*20;//20KB
$mime_types = array('image/jpeg','image/gif','image/png');//extensii acceptate
$errors = array();

if(isset($_POST['upload'])){ // s-a transmis formularul
	# afisez continutul lui $_FILES
	echo '<pre>'. var_export($_FILES, true).'</pre>'; //pt debug	
	// parcurg $_FILES
foreach ($_FILE as $value) {
	if(isset($_FILES['fisier'])) { // s-a transmis fisierul
		
		# afisez datele fisierului - pt debug
		$file_data = $_FILES['fisier'];
		//echo '<pre>'. var_export($file_data, true).'</pre>'; //pt debug	
		
		# daca am erori, le memorez in $errors
		if($file_data['error'] > 0) { // am eroare la upload
			$errors[] = "<p>Eroare la upload</p>";
			} else{ // nu am eroare la upload
				# verific extensia; daca mime type-ul fisierului nu este printre cele acceptate, memorez mesajul de eroare
				echo "Fisier incarcat cu succes";
				echo $file_data['type'];
				// daca $m_type se afla in array-ul $mime_types
				if(in_array($m_type, $mime_types)){ //extensie OK
					echo "<p>Extensie printre cele acceptate</p>";
				}else { // memorez eroare
					$errors[] = "<p>Eroare de extensie</p>";
				}
				// verific daca dimensiunea nu este prea mare
				$size = $file_data['size'];
				if($size <= $max_file_size) {
					echo "<p>Dimensiune OK</p>";
				} else { // eroare
					$errors[] = '<p>Fisierul este prea mare</p>';
				}
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
				$tmp_name = $file_data['tmp_name'];
				$destination = $upload_path.'/'."nou_".$file_data['name'];
				$ok =  @ move_uploaded_file($tmp_name,$destination); // $ok poate fi TRUE sau FALSE
				
				if($ok){ // functia a rulat si a returnat true => mutare cu succes
					// mesaj de ok
					echo "<p>Fisier mutat cu succes</p>";
					}else { // eroare la mutare
						// memorez eroarea in $errors
						$errors[] = "<p>Eroare la mutare</p>";
						}
				} // end nu am erori
				
			# am erori, le afisez 			
			if(!empty($errors)) {  // nu folosesc else pt if-ul anterior pt ca $errors se actualizeaza in if
				echo implode(',', $errors);
					} // end am erori, le afisez
		} // end if(isset($_FILES['fisier1']))
}
	
			
	} // end if(isset($_POST['upload']))
?>

<form class="form_settings" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo  $max_file_size ?>" />
	<fieldset style="padding:10px;">
		<legend>Alegeti un fisier imagine: </legend>
		<p>
		<label for="fisier">Fisier 1:</label>
	 	<input type="file" name="fisier1" id="fisier1" /> <br />
		</p> 
		<p>
		<label for="fisier">Fisier 2 :</label>
	 	<input type="file" name="fisie2" id="fisier2" /> <br />
		</p> 
		<p>
		<input class="submit" type="submit" name="upload" value="Upload" />
		</p>
	</fieldset>
</form>

<?php
include ('./lib/footer.html');
?>
