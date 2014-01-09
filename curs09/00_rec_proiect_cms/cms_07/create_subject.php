<?php require_once("includes/session.php"); ?>
<?php session_set(); ?>

<?php require("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/form_functions.php") ?>

<?php	
find_selected_page($sel_subj,$sel_page);
if(isset($_GET['subj']) && is_null($sel_subj)){//daca s-a completat un query string subj= val care nu este intreg nenul
	redirect_to("content.php");
	}
?>

<?php
/*-- pastrarea datelor in formular; init $form_data pentru cazul in care formularul a fost afisat prima data-- */
$form_fields= array('menu_name', 'position', 'visible');
foreach($form_fields as $fieldname) {
	$form_data[$fieldname]='';
}

//daca am selectat subiect, se va face operatie de update; altfel insert
if(isset($_GET['subj'])){
		$action='update';
		$form_data=get_subject_by_id($sel_subj['id']);//pt completarea formularului la update cu datele din bd
		}else{
			$action='insert';
			}

if(isset($_POST['submit'])){
	
	/*-- pastrarea datelor in formular; actualizare $form_data dupa apasarea butonului-- */	
	$form_data=$_POST;
			
	/*--validare formular--*/ 
	//init errors; pentru un camp va fi semnalata o singura eroare
	$errors = init_errors($form_fields);
		
	//campuri obligatorii
	$required_fields = array('menu_name','position','visible');
	$required_fields_errors=check_required_fields($required_fields);
		
	//campuri cu format
	$fields_with_pattern=array('menu_name'=>'/^[a-zA-Z\-\s\' " 0-9]{2,30}$/');
	$fields_with_pattern_errors=check_fields_with_pattern($fields_with_pattern);
	
	$errors=$required_fields_errors+$fields_with_pattern_errors;//reuniune de array-uri; pt valori cu aceeasi cheie, se pastreaza valaorea din primul array
	
	/*--procesarea datelor sau afisare erorilor--*/
	if(empty($errors)){//daca nu am erori, procesez datele
		$menu_name = mysql_prep($_POST['menu_name']);
		$position = mysql_prep($_POST['position']);
		$visible = mysql_prep($_POST['visible']);
		
		if($action=='insert'){//nu am selectat subiect, fac insert
				//INSERT
				$query="INSERT INTO subjects (menu_name, position, visible) VALUES ('{$menu_name}', {$position}, {$visible})";
				}else{
				//UPDATE
				$id = $sel_subj['id'];
				$query = "UPDATE subjects SET menu_name = '{$menu_name}',position = {$position},visible = {$visible} WHERE id = {$id}";
				}
				$result=mysqli_query($connection,$query);
				confirm_query($result);
				if(mysqli_affected_rows($connection)==1)	{
					redirect_to("content.php");
					}
					  		  
		}//end "nu am erori"
}
?>

<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php	navigation($sel_subj,$sel_page);?>
			<br />
			<a href="create_subject.php">+ Add a new subject</a>
		</td>
		<td id="page">
			<?php
			if(!empty($errors)){//daca am erori, le afisez
				display_error($errors);
				}
			?>
			<h2><?php if(is_null($sel_subj)) {echo 'Add Subject';} else {echo 'Edit Subject';} ?></h2>
			<form action="" method="post">
				<p>Subject name: 
					<input type="text" name="menu_name" value="<?php echo htmlentities($form_data['menu_name']); ?>" id="menu_name" />
				</p>
				<p>Position: 
					<select name="position">
						<?php
							$subject_set = get_all_subjects();
							$subject_count = mysqli_num_rows($subject_set);
							// $subject_count + 1 pt ca se adauga un subiect
							for($count=1; $count <= $subject_count+1; $count++) {
								echo "<option value=\"{$count}\"";
								if(isset($form_data['position']) && $form_data['position']==$count){ 
									echo ' selected="selected"';
									}
								echo ">{$count}</option>";
							}
						?>
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0" <?php if(isset($form_data['visible'])&& $form_data['visible']==0) echo 'checked="checked"'; ?> /> No
					&nbsp;
					<input type="radio" name="visible" value="1" <?php if(isset($form_data['visible'])&& $form_data['visible']==1)	echo 'checked="checked"'; ?> /> Yes
				</p>
				<input type="submit" name="submit" value="<?php if(is_null($sel_subj)) {echo 'Add Subject';} else {echo 'Edit Subject';} ?>" />
				&nbsp;&nbsp;
				<a href="delete_subject.php?subj=<?php echo urlencode($sel_subj['id']); ?>" onclick="return confirm('Are you sure?');">Delete Subject</a>
			</form>
			<br />
			<p><a href="content.php">Cancel</a></p>
			<hr /><br />
			<br />
			<a href="create_page.php?subj=<?php echo urlencode($sel_subj['id']); ?>">+ Add a new page</a>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
