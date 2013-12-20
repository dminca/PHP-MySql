<!-- 
Cereri de tip POST. Procesarea formularelor
Deschideti fisierul c04_lucru/04_ex03.php si modificati-l astfel incat sa aibe 2 functionalitati:
1.Daca este incarcat fara parametrii din POST, afiseaza formularul.
2.Daca primeste o cerere POST se comporta diferit: proceseaza informatiile si afiseaza un mesaj. 

	Pentru aceasta parcurgeti urmatoarele etape:
1.Preluarea datelor din formular:
Daca pagina a primit o cerere de tip POST - if (isset($_POST['submit'])):
memorati datele din formular in variabile 
hobby si limbi_straine vor fi de tip array
pentru usurinta afisarii, le puteti transforma in stringuri folosind functia implode();
 ex: if (is_array($hobby)) {$hobby = implode(',', $hobby);  }
afisati un mesaj de multumire si datele completate de catre utilizator
2.Validarea datelor
Dupa preluarea datelor din formular in variabile:
verificati pentru fiecare camp daca:
a fost completat
respecta un format specific datelor acceptate pentru un astfel de camp – se pot folosi expresii regulate
daca au fost semnalate erori, se vor afisa; in caz contrar se va afisa mesajul de multumire si datele completate de catre utilizator
3.Pastrarea datelor in formular
se poate folosi un array $formData ce contine datele cu care populam formularul - va fi acelasi lucru cu $_POST
pentru elementele de tip input text se pastreaza valoarea cu ajutorul atributului value
pentru input checkbox si radio se pastreaza cu ajutorul atributului checked="checked"
pentru tagul select se pastreaza optiunile selectate cu atributul selected="selected" in cadrul tagurilor option
pentru tagul textarea se scrie textul ce trebuie pastrat intre tagul de inceput si cel de sfarsit
--> 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 	<head>
		<title>Formular</title> 	
 	</head>
 	<body>
		
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