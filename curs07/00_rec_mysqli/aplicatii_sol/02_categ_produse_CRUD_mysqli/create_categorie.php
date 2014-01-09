<?php
require ("includes/connection.php");
require_once ("includes/form_functions.php");

		
/*-- pastrarea datelor in formular; init $form_data pentru cazul in care formularul a fost afisat prima data-- */
$form_fields= array('denumire');
foreach($form_fields as $fieldname) {
	$form_data[$fieldname]='';
}

//daca am transmis id prin get, se va face operatie de update; altfel insert
if(isset($_GET['id'])){
	$id=$_GET['id'];	
	$action="update";
	$query="SELECT * 
			FROM categorii
			WHERE id='$id'
			LIMIT 1";//selectez datele
	$result=mysqli_query($connection,$query);
	if($result && mysqli_num_rows($result)==1){
		$form_data=mysqli_fetch_assoc($result);
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
	$required_fields = array('denumire');
	$required_fields_errors=check_required_fields($required_fields);
		
	//campuri cu format
	$fields_with_pattern=array('denumire'=>'/^[a-zA-Z0-9\-\s\']{2,50}$/');
	$fields_with_pattern_errors=check_fields_with_pattern($fields_with_pattern);
	
	$errors=$required_fields_errors+$fields_with_pattern_errors;//reuniune de array-uri; pt valori cu aceeasi cheie, se pastreaza valaorea din primul array
	
	/*--procesarea datelor sau afisare erorilor--*/
	//print_r($errors);
	if(!empty($errors)){//daca am erori, le afisez
	display_error($errors);
	}else{//daca nu am erori, procesez datele
		$denumire=trim($_POST['denumire']);
				
		if($action=="insert"){
				//INSERT
				$query="INSERT INTO categorii(denumire)
							VALUES('{$denumire}')	";
				//echo $query;
				$result=mysqli_query($connection,$query);
				
				//verific INSERT		
				if($result && mysqli_affected_rows($connection) ==1){
					echo "Insert Ok";
					Header("Location:view_categorii.php");
					exit;
					}else{
						echo '<p>Insert nereusit!</p>';
						echo '<p>'. mysqli_error($connection).'</p>';
						}
				}//end INSERT
				
		if($action=="update"){
			//UPDATE
			$query="UPDATE categorii	SET
						denumire='{$denumire}'
						WHERE id={$id}";
						
			//echo $query;
			$result = mysqli_query($connection,$query);
			if ($result && mysqli_affected_rows($connection)==1) {
						// Success
						echo "Update ok.";
						Header("Location:view_categorii.php");
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
					<td>Denumire:</td>
					<td><?php echo form_input('denumire', htmlentities($form_data['denumire']), 'text', 'maxlength="50"');?></td>
				</tr>
				
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Submit" /></td>
				</tr>
			</table>
</form>
<?php
//link catre scriptul de adaugare
echo '<p><a href="view_categorii.php">View categorii</a></p>';
?>
</body>
</html>