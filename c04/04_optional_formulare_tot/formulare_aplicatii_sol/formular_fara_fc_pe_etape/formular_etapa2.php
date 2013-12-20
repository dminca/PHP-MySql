<!-- 

1.Preluarea datelor din formular:
Daca pagina a primit o cerere de tip POST - if (isset($_POST['submit'])):
memorati datele din formular in variabile 
hobby si limbi_straine vor fi de tip array
pentru usurinta afisarii, le puteti transforma in stringuri folosind functia implode();
 ex: if (is_array($hobby)) {$hobby = implode(',', $hobby);  }
afisati un mesaj de multumire si datele completate de catre utilizator
--> 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 	<head>
		<title>Formular</title> 	
 	</head>
 	<body>
			<?php
				/*--------------------
				initializari
				----------------------*/
				//folosesc $formData pt a prelua datele transmise prin formular
				$formData=$_POST;
				$formFields=array('nume','email','sex','hobby','limbi_straine','mesaj');
				
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
					//preiau datele din $formData					
								
					$nume=$formData['nume'];
					$email=$formData['email'];				
					$sex=$formData['sex'];
					$hobby=$formData['hobby'];
					$limbi_straine=$formData['limbi_straine'];
					$mesaj=$formData['mesaj'];
					
					//afisarea datelor
					//pentru usurinta afisarii transform $hobby si $limbi_straine in stringuri
									
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
							<td><input type="text" name="nume" /> </td>		
					</tr>			
					<tr>

							<!-- campul E-mail -->						
							<td>E-mail:</td>
							<td><input type="text" name="email" /> 	</td>
					</tr>
					<tr>
							<!-- campul Sex -->							
							<td>Sex: </td>	
							<td>M<input type ="radio" name="sex" value="Masculin" /> F<input type ="radio" name="sex" value="Feminin"/></td>			
					</tr>

				 	<tr>
				 			<!-- Hobby -->	
							<td>Hobby:</td>
							<td>
								Sport:<input type="checkbox" name ="hobby[]" value="sport" />
								Muzica:<input type="checkbox" name ="hobby[]" value="muzica" />
								IT:<input type="checkbox" name ="hobby[]" value="IT" />
								Pictura:<input type="checkbox" name ="hobby[]" value="pictura" />

							</td>			 	
				 	</tr>
				 	<tr>
				 		<td>Limbi straine:</td>
				 		<td>
				 		<select name="limbi_straine[]" multiple="multiple">
    						<option value="ro">Romana</option>
    						<option value="en">Engleza</option>
    						<option value="es">Spaniola</option>
    						<option value="de">Germana</option>
						</select>
				 		</td>
				 	</tr>
				 	<tr>
				 		<td>Mesaj:</td>
				 		<td>
				 		<textarea name="mesaj"></textarea>
				 		</td>
				 	</tr>
				 	
				 	<tr>
							<td></td>			 	
							<!-- Butonul Submit si Reset -->
							<td>
							<input type="submit" name="submit" value="Trimite"/>&nbsp; 
							<input type="reset" name="reset" value="Anuleaza"/>
							</td>
				 	</tr>
			</table>
			</form> 
			
 	</body>
</html>