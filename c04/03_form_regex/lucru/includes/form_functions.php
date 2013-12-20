<?php #functii

/*
    $name - va fi numele elementului respectiv.
    $elementData - apare la majoritatea elementelor si este o valoare (sau un array) cu ce a completat sau a ales utilizatorul in/din campul respectiv. Prin urmare este informatia ce vine de la utilizator, se transmite prin POST sau GET la reincarcarea formularului, si este folosita pentru a repopula elementul respectiv cu informatie. Pentru ca $formData este in general POST sau GET, valoarea acestui parametru provine din $formData["nume_element"]. Pe baza acestui element se genereaza elementele cu checked="checked" (bifate) sau optiunile cu selected="selected".
	 $initData - apare la grupuri de butoane radio, casete de validare sau element de tip select; este un array pe baza caruia se construieste grupul 	    
    $params - un string cu atribute optionale de tip html ce pot fi inserate in interiorul elementului respectiv (in interiorul tagului de inceput).

*/

function form_input($name, $elementData = '', $type = 'text', $params = '') {
	echo "<input type= \"$type\" name= \"$name\"";    
   echo " value = \"$elementData\"";

   if ($params != '') {
      echo ' ' . $params;
    }
   echo " />";
} // end form_input

function form_textarea($name, $elementData = '', $params = '')
{
	echo "<textarea name=\"$name\" $params>";
 	echo $elementData;
	echo "</textarea>";
} // end form_textarea

function form_radio($name,array $initData, $elementData = NULL){
	foreach($initData as $k=>$v){
		echo "<input type=\"radio\" name=\"$name\" value=\"$k\"";
		if(strcasecmp($elementData,$k)==0) echo ' checked="checked"';
		echo 	"/>$v";	
		}	
} // end form_radio

function form_select($name,array $initData, $elementData = NULL){
	//start select
	echo "<select name=\"$name\">";
	//elemente option
	foreach($initData as $k=>$v){
		echo "<option value=\"$k\"";
		if(strcasecmp($elementData,$k)==0) echo ' selected="selected"';
		echo 	">$v</option>";	
		}
	// end select
	echo "</select>";
} // end form_select

function form_ck($name,array $initData, array $elementData = NULL){
	foreach($initData as $k=>$v){
		echo "<input type=\"checkbox\" name=\"$name"."[]"."\" value=\"$k\"";
		if(is_array($elementData)&& in_array($k,$elementData)) echo ' checked="checked"';
		echo 	"/>$v";	
		}	
} // end form_ck
?>