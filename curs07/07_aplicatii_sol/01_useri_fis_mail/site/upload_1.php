<?php # Upload fisier
$page_title = 'Upload pentru un fisier';
include ('./lib/header.html');
?>

<h1>Upload pentru un fisier</h1>

<?php
# initializari
$max_file_size = 1024*20;//10KB
$mime_types = array('image/jpeg','image/gif','image/png');
$errors = array();

//erorile standard
$standard_errors[1] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini. ';
$standard_errors[2] = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ';
$standard_errors[3] = 'The uploaded file was only partially uploaded.';
$standard_errors[4] = 'No file was uploaded. ';
$standard_errors[5] = 'Missing a temporary folder';
$standard_errors[6] = 'Failed to write file to disk.';
$standard_errors[7] = 'File upload stopped by extension.';

if(isset($_POST['upload'])){ // s-a transmis formularul
	# afisez continutul lui $_FILES
	 // echo '<pre>'. var_export($_FILES, true).'</pre>'; //pt debug	
	if(isset($_FILES['fisier'])) { // s-a transmis fisierul
		
		# afisez datele fisierului - pt debug
		$file_data = $_FILES['fisier'];
		echo '<pre>'. var_export($_FILES, true).'</pre>'; //pt debug	
		
		# daca am erori, le memorez in $errors
		if($file_data['error'] > 0) { // am eroare la upload
			$error_no = $file_data['error'];
			$errors[] = "Eroare standard: ".$standard_errors[$error_no];
			} else{ // nu am eroare la upload
				# verific extensia
				if(!in_array($file_data['type'],$mime_types)) { // mime-type-ul fisierului nu este printre cele acceptate
					$errors[] = 'Verificati extensia fisierului. Se accepta numai '. implode(', ',$mime_types);
					}
				 }
			
		# daca nu am erori, mut fisierul
		if(empty($errors)) { 
						
				$upload_path = "../uploads";
				$tmp_name = $file_data['tmp_name']; // numele temporar al fisierului; e necesar la mutarea fisierului
				$file_info = pathinfo($file_data['name']);
				// print_r($file_info); //pt debug
				$file_name = md5($tmp_name); // numele fisierului dupa mutare; am ales o codificare a numelui temporar
				$file_ext = $file_info['extension']; // extensia fisierului
				
				$destination = $upload_path."/".$file_name.".".$file_ext;
				
				# daca nu am folderul destinatie, il creez; pp am drepturi de scriere
				if(!file_exists($upload_path)){ 
					mkdir($upload_path, 0777); // nu am verificat rezultatul pt a nu incarca codul
					}
				
				# mut fisierul	
				$ok =  @ move_uploaded_file($tmp_name,$destination); // $ok poate fi TRUE sau FALSE
				// var_dump($ok); // debug
				if($ok){ // functia a rulat si a returnat true => mutare cu succes
					echo "<h4>Fisier mutat cu succes in $upload_path</h4>";
					}else { // eroare la mutare
						$errors[] = 'Fisierul nu a putut fi mutat! Verificati drepturile pe foldderul destinatie!';
						}
				} // end nu am erori
				
			# am erori, le afisez 			
			if(!empty($errors)) {  // nu folosesc else pt if-ul anterior pt ca $errors se actualizeaza in if
					echo '<div class="error">';
					echo implode("<br />", $errors);
					echo '</div>';
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
