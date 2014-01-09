<?php require("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/form_functions.php") ?>

<?php	
find_selected_page($sel_subj,$sel_page);
if(isset($_GET['page']) && is_null($sel_page)){//daca s-a completat un query string page= val care nu este intreg nenul
	redirect_to("content.php");
	}
?>

<?php
/*-- pastrarea datelor in formular; init $form_data pentru cazul in care formularul a fost afisat prima data-- */
$form_fields= array('menu_name', 'position', 'visible','content');
foreach($form_fields as $fieldname) {
	$form_data[$fieldname]='';
}

//daca am selectat subiect, se va face operatie de update; altfel insert
if(isset($_GET['page'])){
		$action='update';
		$form_data=get_page_by_id($sel_page['id']);//pt completarea formularului la update cu datele din bd
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
	$required_fields = array('menu_name','position','visible','content');
	$required_fields_errors=check_required_fields($required_fields);
		
	//campuri cu format
	$fields_with_pattern=array('menu_name'=>'/^[a-zA-Z\-\s\' " 0-9]{2,30}$/');
	$fields_with_pattern_errors=check_fields_with_pattern($fields_with_pattern);
	
	$errors=$required_fields_errors+$fields_with_pattern_errors;//reuniune de array-uri; pt valori cu aceeasi cheie, se pastreaza valaorea din primul array
	
	/*--procesarea datelor sau afisare erorilor--*/
	if(empty($errors)){//daca nu am erori, procesez datele
		$subject_id = mysql_prep($_GET['subj']);
		$menu_name = mysql_prep($_POST['menu_name']);
		$position = mysql_prep($_POST['position']);
		$visible = mysql_prep($_POST['visible']);
		$content = mysql_prep($_POST['content']);
		//$content = mysqli_real_escape_string($connection,$_POST['content']);
		//$content = $_POST['content'];
		echo $content;
		
		if($action=='insert'){//nu am selectat subiect, fac insert
				//INSERT
				$query="INSERT INTO pages (menu_name, position, visible, content, subject_id) VALUES ('{$menu_name}', {$position}, {$visible},'{$content}',{$subject_id})";
				}else{
				//UPDATE
				$id = $sel_page['id'];
				$query = "UPDATE pages SET menu_name = '{$menu_name}',position = {$position},visible = {$visible},content='{$content}' WHERE id = {$id}";
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
		
		</td>
		<td id="page">
			<?php
			if(!empty($errors)){//daca am erori, le afisez
				display_error($errors);
				}
			?>
			<h2><?php if(is_null($sel_page)) {echo 'Add Page';} else {echo 'Edit Page';} ?></h2>
			<form action="" method="post">
				<p>Subject name: 
					<input type="text" name="menu_name" value="<?php echo htmlentities($form_data['menu_name']); ?>" id="menu_name" />
				</p>
				<p>Position: 
					<select name="position">
						<?php
							if($action=="insert"){
								$page_set = get_pages_for_subject($sel_subj['id']);
								$page_count = mysqli_num_rows($page_set)+1;
							}else{
								$page_set = get_pages_for_subject($sel_page['subject_id']);
								$page_count = mysqli_num_rows($page_set);
								}
							// $page_count + 1 pt ca se adauga un subiect
							for($count=1; $count <= $page_count; $count++) {
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
				<p>Content:<br />
				<textarea name="content" rows="20" cols="80"><?php echo htmlentities($form_data['content']); ?></textarea>
				</p>
				<input type="submit" name="submit" value="<?php if(is_null($sel_page)) {echo 'Add Page';} else {echo 'Edit Page';} ?>" />
				&nbsp;&nbsp;
				<a href="delete_page.php?page=<?php echo urlencode($sel_page['id']); ?>" onclick="return confirm('Are you sure?');">Delete Page</a>
			</form>
			<br />
			<a href="content.php">Cancel</a>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
