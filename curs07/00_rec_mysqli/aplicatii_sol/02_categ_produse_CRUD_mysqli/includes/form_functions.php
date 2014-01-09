<?php
	
/*
    $name - va fi numele elementului respectiv.
    $value - apare la generarea unui element de tip checkbox sau buton, si este informatia atributului value a campului respectiv
    $elementData - apare la majoritatea elementelor si este o valoare (sau un array) cu ce a completat sau a ales utilizatorul in/din campul respectiv. Prin urmare este informatia ce vine de la utilizator, se transmite prin POST sau GET la reincarcarea formularului, si este folosita pentru a repopula elementul respectiv cu informatie. Pentru ca $formData este in general POST sau GET, valoarea acestui parametru provine din $formData["nume_element"]. Pe baza acestui element se genereaza elementele cu checked="checked" (bifate) sau optiunile cu selected="selected".
    $params - un string cu atribute optionale de tip html ce pot fi inserate in interiorul elementului respectiv (in interiorul tagului de inceput).

*/
// input (text or password) field
function form_input($name, $elementData = '', $type = 'text', $params = '') {
    $field = '<input type="' . $type . '" id ="'.$name.'" name="' . $name . '"';
    $elementData = trim($elementData);
    $field .= ' value="'.$elementData.'" ';

    if ($params != '') {
      $field .= ' ' . $params;
    }
    $field .= ' />';

    return $field;
} /// form_input

// password field
function form_pass($name, $elementData = '', $params = '') {
  $field = form_input($name, $elementData,  'password', $params);

    return $field;
}

//un grup de butoane radio
/* 
initData va avea urmatoarea forma:

$initData = array(
'Masculin' => 'M',
'Feminin' => 'F'
...)
si cheile vor fi valorile asociate butoanelor radio, iar valorile array-ului vor fi etichetele
*/

function form_radio($name, $initData, $elementData = null, $params = '')
{
  if (!is_array($initData)) return '';
	
	$fields='';
  foreach ($initData as $k=>$v) {

    $checked = false;

    if ($elementData == $k) {
		$checked = true;
      }
    
      if ($checked) {
	$ck_str = ' checked="checked" ';
      } else {
	$ck_str = '';
      }

    $fields .= '<label>'.$v.'</label><input type="radio" name="'.$name.'" value="'. $k .'" '.$params.' '. $ck_str .' />';
  }
 
  return $fields;

} /// form_radio()

// checkbox fields
//un grup de casete de validare
/* 
initData va avea urmatoarea forma:

$initData = array(
'en' => 'English',
'ro' => 'Romana',
'de' => 'Deutsch',
...)
si cheile vor fi valorile asociate casetelor de validare, iar valorile array-ului vor fi etichetele
*/
function form_ck($name, $initData, $elementData = null, $params = '')
{
  if (!is_array($initData)) return '';
	
	$fields='';
  foreach ($initData as $k=>$v) {

    $checked = false;

    if(is_array($elementData) && in_array($k, $elementData)) {
	  $checked = true;
	  }
    
    if ($checked) {
		$ck_str = ' checked="checked" ';
      } else {
		$ck_str = '';
      }

  $fields.= '<label>'.$v.'</label><input type="checkbox" name="'.$name.'[]" value="'.$k.'" '.$params.' '.$ck_str.' />';
	}
  return $fields;

} /// form_ck()


//un camp de tip select
/* 
initData va avea urmatoarea forma:

$initData = array(
'en' => 'English',
'ro' => 'Romana',
'de' => 'Deutsch',
...)
si cheile vor fi valorile elementelor option, iar valorile array-ului vor fi afisate pentru fiecare optiune
*/

function form_select($name, $type = 'single', $initData, $elementData = null, $params = '')
{
  if (!is_array($initData)) return '';

  if ($type == 'multiple') {
    $name .= '[]';
    $params .= ' multiple = "multiple" ';
  }

  $field = '<select name="'.$name.'" id="'.$name.'"  '.$params.'>';

  foreach ($initData as $k => $v) {

    $selected = false;

    if ($type == 'single') {
      if ($elementData == $k) {
	$selected = true;
      }
    } elseif ($type == 'multiple') {
      if (is_array($elementData) && in_array($k, $elementData)) {
	  $selected = true;
	}
    }

      if ($selected) {
	$str_selected = ' selected="selected" ';
      } else {
	$str_selected = '';
      }

    $field .= '<option value="'.$k.'" '.$str_selected.'>'.$v.'</option>';
  }

  $field .= '</select>';

  return $field;

} /// form_select()

function form_textarea($name, $rows, $cols, $elementData = '', $params = '')
{
  $field = '<textarea name="'.$name.'" id="'.$name.'" rows="'.$rows.'" cols="'.$cols.'" '.$params.'>';
  $field .= $elementData;
  $field .= '</textarea>';


  return $field;
}


function form_button($name, $value, $type="submit", $params = '')
{
  $field = '<input type="'.$type.'" name="'.$name.'" value="'.$value.'" '.$params.'>';
  return $field;
}
//end functii pt controale

//functii erori
function display_errors($errors){
	if(is_array($errors)) {
		$str_errors=implode('<br />',$errors);
		echo '<span style="color:red">'.$str_errors.'</span>';
	}else echo '';
}

function display_data($formFields){
	global $formData;
	foreach($formFields as $field){
		if(is_array($formData[$field])) {
			echo "$field :". implode(',',$formData[$field]).'<br />';
		}else {
			echo "$field :". $formData[$field].'<br />';
			}
	}
}
	
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
			if (!isset($_POST[$fieldname])||empty($_POST[$fieldname])) {
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
		echo '<div style="color:red;">';
		foreach($errors as $field=>$error){
			if(!is_null($error)){
				echo "{$field}: {$error} !";
				echo "<br />";
				}
			}
		echo '</div>';
		}	
?>
