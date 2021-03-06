<?php
	function init_errors($fields){
		$errors = array();
		foreach($fields as $fieldname) {
			$errors[$fieldname]=NULL;
		}
		return $errors;
	}
	
	function unset_null(&$array){
		foreach($array as $key=>$value){
				if(is_null($value)) unset($array[$key]);//elimin valorile nule
				}
	}
		
	function check_required_fields($fields){
		$errors=init_errors($fields);
		foreach($fields as $fieldname) {
			if (!isset($_POST[$fieldname])||(empty($_POST[$fieldname]) && !is_numeric($_POST[$fieldname]))) {
				$errors[$fieldname] ="required";
			}
		}
		unset_null($errors);//elimin valorile nule
		return $errors;
	}
	
	function check_fields_with_pattern($fields){
		$errors=init_errors(array_keys($fields));
		foreach($fields as $fieldname => $pattern ) {
			if (!preg_match($pattern,$_POST[$fieldname])) { 
				$errors[$fieldname] = " is not valid"; 
				}
		}
		unset_null($errors);//elimin valorile nule
		return $errors;
	}
	
	function display_error($errors){
		echo '<div class="error">';
		foreach($errors as $field=>$error){
			if(!is_null($error)){
				echo "{$field}: {$error} !";
				echo "<br />";
				}
			}
		echo '</div>';
		}	
?>