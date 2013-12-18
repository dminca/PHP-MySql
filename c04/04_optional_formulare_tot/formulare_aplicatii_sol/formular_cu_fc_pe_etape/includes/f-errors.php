<?php
function displayErrors($errors){
	if(is_array($errors)) {
		$str_errors=implode('<br />',$errors);
		echo '<span style="color:red">'.$str_errors.'</span>';
	}else echo '';
}

function displayData($formFields){
	global $formData;
	foreach($formFields as $field){
		if(is_array($formData[$field])) {
			echo "$field :". implode(',',$formData[$field]).'<br />';
		}else {
			echo "$field :". $formData[$field].'<br />';
			}
	}
}
?>