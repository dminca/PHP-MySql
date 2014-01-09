<?php
require ("includes/connection.php");
require_once ("includes/form_functions.php");

		
/*-- pastrarea datelor in formular; init $form_data pentru cazul in care formularul a fost afisat prima data-- */
$form_fields= array('idCategorie','denumire','descriere','pret','cantitate','um');
foreach($form_fields as $fieldname) {
	$form_data[$fieldname]='';
}
if(isset($_GET['idCategorie'])) $form_data['idCategorie']=$_GET['idCategorie'];//s-a selectat categ din care sa faca parte produsul adaugat

//pt lista de categ din formular
$query="SELECT id,denumire
						FROM categorii";//selectez datele
					$result=mysqli_query($connection,$query);
					while($row=mysqli_fetch_assoc($result)) {
						$key=$row['id'];	
					$init_data[$key]=$row['denumire'];
					}
					asort($init_data);
					
//daca am transmis id prin get, se va face operatie de update; altfel insert
if(isset($_GET['id'])){
	$id=$_GET['id'];//id-ul produsului
	$action="update";
	$query="SELECT * 
			FROM produse
			WHERE id='$id'
			LIMIT 1";//selectez datele
	$result=mysqli_query($connection,$query);
	if($result && mysqli_num_rows($result)==1){
		$form_data=mysqli_fetch_assoc($result);//efect: completarea formularului cu datele din bd
	}
	
	}else{
		$action="insert";
		}

if(isset($_POST['submit'])){
		
	/*-- pastrarea datelor in formular; actualizare $form_data dupa apasarea butonului-- */	
	$form_data=$_POST;
			
	/*--validare formular--*/ 
	
	//init errors; pentru un camp va fi semnalata o singura eroare
	$errors = init_errors($form_fields);
		
	//campuri obligatorii
	$required_fields = array('idCategorie','denumire','descriere','pret','cantitate','um');
	$required_fields_errors=check_required_fields($required_fields);
		
	//campuri cu format; a se vedea si descrierea campurilor in tabel, de ex dim
	$fields_with_pattern=array('denumire'=>'/^[a-zA-Z0-9\-\s\']{2,50}$/','descriere'=>'/^[a-zA-Z0-9\-\s\',\.]{2,255}$/',
	'pret'=>'/^(\+)?[0-9]{1,}\.?[0-9]{1,}$/','cantitate'=>'/^(\+)?[0-9]{1,}$/','um'=>'/^[a-zA-Z]{1,}$/');
	$fields_with_pattern_errors=check_fields_with_pattern($fields_with_pattern);
	
	$errors=$required_fields_errors+$fields_with_pattern_errors;//reuniune de array-uri; pt valori cu aceeasi cheie, se pastreaza valaorea din primul array
	
	/*--procesarea datelor sau afisare erorilor--*/
	//print_r($errors);
	if(!empty($errors)){//daca am erori, le afisez
	display_error($errors);
	}else{//daca nu am erori, procesez datele
		//$idCategorie=$_GET['idCategorie'];	
		$idCategorie=	trim($_POST['idCategorie']);
		$denumire=trim($_POST['denumire']);
		$descriere=trim($_POST['descriere']);
		$pret=trim($_POST['pret']);
		$cantitate=trim($_POST['cantitate']);
		$um=trim($_POST['um']);
				
		if($action=="insert"){
				//INSERT
				$query="INSERT INTO produse(idCategorie,denumire,descriere,pret,cantitate,um)
							VALUES({$idCategorie},'{$denumire}','{$descriere}',{$pret},{$cantitate},'{$um}')";
				//echo $query;
				$result=mysqli_query($connection,$query);
				
				//verific INSERT		
				if($result && mysqli_affected_rows($connection) ==1){
					echo "Insert Ok";
					Header("Location:view_produse.php");
					exit;
					}else{
						echo '<p>Insert nereusit!</p>';
						echo '<p>'. mysqli_error($connection).'</p>';
						}
				}//end INSERT
				
		if($action=="update"){
			//UPDATE
			$query="UPDATE produse	SET
						idCategorie={$idCategorie},
						denumire='{$denumire}',
						descriere='{$descriere}',
						pret={$pret},
						cantitate={$cantitate},
						um='{$um}'
						WHERE id={$id}";
						
			echo $query;
			$result = mysqli_query($connection,$query);
			if ($result && mysqli_affected_rows($connection)==1) {
						// Success
						echo "Update ok.";
						Header("Location:view_produse.php");
						exit;
					} else {
						// Failed
						echo '<p>Update nereusit!</p>';
						echo '<p>'. mysqli_error($connection).'</p>';
					}
			}//end UPDATE
	  		  
		}//end "nu am erori"
mysqli_close($connection);//inchid conexiunea cu baza de date	
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title></title>
</head>
<body>
<br /><br />
<form action="" method="post">
			<table>
				<tr>
					<td>Categorie:</td>
					<td><?php echo form_select('idCategorie', $type = 'single', $init_data,$form_data['idCategorie']);?></td>
				</tr>
				<tr>
					<td>Denumire:</td>
					<td><?php echo form_input('denumire', htmlentities($form_data['denumire']), 'text', 'maxlength="50"');?></td>
				</tr>
				<tr>
					<td>Descriere:</td>
					<td><?php echo form_textarea('descriere', 10, 30, htmlentities($form_data['descriere']));?></td>
				</tr>
				<tr>
					<td>Pret:</td>
					<td><?php echo form_input('pret', htmlentities($form_data['pret']), 'text', 'maxlength="11"');?></td>
				</tr>
				<tr>
					<td>Cantitate:</td>
					<td><?php echo form_input('cantitate', htmlentities($form_data['cantitate']), 'text', 'maxlength="11"');?></td>
				</tr>
				<tr>
					<td>UM:</td>
					<td><?php echo form_input('um', htmlentities($form_data['um']), 'text', 'maxlength="20"');?></td>
				</tr>
				<tr>
					<td><?php echo form_button('submit', 'Trimite', 'submit');?></td>
				</tr>
			</table>
</form>
<?php
//link catre scriptul de vizualizare
echo '<p><a href="view_produse.php">View produse</a></p>';
?>
</body>
</html>