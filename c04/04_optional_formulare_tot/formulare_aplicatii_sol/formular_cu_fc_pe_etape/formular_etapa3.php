<!--
1.preluarea datelor
2.validarea datelor
3.pastrarea datelor in formular
+
4. functii pentru controalele formularului
+
5. compactarea codului pentru preluarea si validarea datelor;functii pentru afisarea erorilor si afisarea datelor
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 	<head>
		<title>Formular</title> 	
 	</head>
 	<body>
 	<?php
 		require_once('includes/f-forms.php');
 		/*--------------------
				initializari
				----------------------*/
				//folosesc $formData pt a prelua datele transmise prin formular
				$formData=$_POST;
				$formFields=array('nume','email','sex','hobby','limbi_straine','mesaj');
				
				$requiredFields=$formFields;//toate campurile sunt obligatorii
				$regexFields=array('nume'=>'/^[a-zA-Z\s\-\']{2,30}$/','email'=>'/^[a-zA-Z0-9\.\-_\+]+@[a-zA-Z0-9\-]+\.([a-zA-Z0-9\-]+\.)*[a-zA-Z]{2,3}$/');
				
				$erori=array();

				foreach($formFields as $field){
					if(!isset($formData[$field])) {
						$formData[$field]='';
						}					
					}
				/*--------------------
				daca am apasat butonul submit, 
				preiau datele din formular si le afisez
				----------------------*/				
				if(isset($formData['submit'])){
													
					/*
					--preluarea si validarea datelor; etapa anterioara--
					$nume=$formData['nume'];
					$email=$formData['email'];				
					$sex=$formData['sex'];
					$hobby=$formData['hobby'];
					$limbi_straine=$formData['limbi_straine'];
					$mesaj=$formData['mesaj'];
					
					//validarea datelor
					
					//validare nume					
					if(!$nume){
						$erori[]='Completeaza numele!';
						}					
					else{
						$pattern='/^[a-zA-Z\s\-\']{2,30}$/';
						if(!preg_match($pattern,$nume)){
							$erori[]='Nume invalid!';
							}	
						}					
					
					//validare email					
					if(!$email){
						$erori[]='Completeaza email!';
						}	
					else{
						$pattern='/^[a-zA-Z0-9\.\-_\+]+@[a-zA-Z0-9\-]+\.([a-zA-Z0-9\-]+\.)*[a-zA-Z]{2,3}$/';
						if(!preg_match($pattern,$email)){
							$erori[]='Email invalid!';
							}
						}	
							
					//validare sex					
					if(!$sex){
						$erori[]='Selecteaza sexul!';
						}					
					
					//validare hobby					
					if(!is_array($hobby)){
						$erori[]='Selecteaza cel putin un hobby!';
						}
					
					//validare limbi straine					
					if(!is_array($limbi_straine)){
						$erori[]='Selecteaza cel putin o limba straina!';
						}
					
					//validare mesaj					
					if(!$mesaj){
						$erori[]='Completeaza mesajul!';
						}
					*/
										
					//preluarea si validarea datelor
					foreach($formFields as $field){
						if(in_array($field,$requiredFields)) {//este camp obligatoriu
							if(!$formData[$field]){
								$erori[]='Completeaza '.$field.'!';
							}elseif(array_key_exists($field, $regexFields)) { //este camp cu format
								$pattern=$regexFields[$field];
								if(!preg_match($pattern,$formData[$field])){$erori[]='Campul '.$field.' nu este valid!';}	
								}
						}
					}	
							
					if(count($erori)>0){
						display_errors($erori);
						}
					else{
						//afisarea datelor
						display_data($formFields);
						
						/*
						--afisarea datelor; etapa anterioara--			
						if(is_array($hobby)){
							$hobby=implode(',',$hobby);
						}
					
				   	if(is_array($limbi_straine)){
							$limbi_straine=implode(',',$limbi_straine);
						}
					
						echo '<br /> Va multumim pentru completarea formularului!';
						echo '<br />Datele dv sunt:<br />';
						echo "Nume: $nume <br />";
						echo "Email: $email <br />";
						echo "Sex: $sex <br />";
						echo "Hobby: $hobby <br />";
						echo "Limbi straine: $limbi_straine <br />";
						echo "Mesaj: $mesaj <br />";
						*/
						}//end else if($erori)
					}//end if(isset($_POST['submit']))
					
		?>
			
			<form method="post" action="">
				
				<table style="background-color:grey; color:white">

					<tr>
						<th colspan="2">Completati datele de mai jos:</th>
					</tr>
					
					<tr>
							<!-- campul Nume -->
							<td>Nume:</td>		
							<td><?php echo form_input('nume', $formData['nume']);?></td>	
					</tr>			
					<tr>

							<!-- campul E-mail -->						
							<td>E-mail:</td>
							<td><?php echo form_input('email', $formData['email']);?></td>	
					</tr>
					<tr>
							<!-- campul Sex -->							
							<td>Sex: </td>	
							<td>
							<?php 
							$initData = array('Masculin' => 'M','Feminin' => 'F');
							echo form_radio('sex', $initData, $formData['sex']);
							?>
							</td>	
					</tr>

				 	<tr>
				 			<!-- Hobby -->	
							<td>Hobby:</td>
							<td>
							<?php 
							$initData = array('sport' => 'Sport','muzica' => 'Muzica','IT'=>'IT','pictura'=>'Pictura');
							echo form_ck('hobby', $initData, $formData['hobby']);
							?>
							</td>	
							 	
				 	</tr>
				 	<tr>
				 		<!-- Limbi straine -->	
				 		<td>Limbi straine:</td>
				 		<td>
				 		<?php 
				 		$initData = array('ro' => 'Romana','en' => 'Engleza','es'=>'Spaniola','de'=>'Germana');
				 		echo form_select('limbi_straine', 'multiple', $initData, $formData['limbi_straine']);
				 		?>
				 		</td>	
				 	</tr>
				 	<tr>
				 		<td>Mesaj:</td>
				 		<td>
				 		<?php echo form_textarea('mesaj', 20, 50, $formData['mesaj']);?>
				 		</td>
				 	</tr>
				 	
				 	<tr>
							<td></td>			 	
							<!-- Butonul Submit-->
							<td>
							<?php echo form_button('submit', 'Trimite');?>
							</td>
				 	</tr>
			</table>
			</form> 
			
 	</body>
</html>