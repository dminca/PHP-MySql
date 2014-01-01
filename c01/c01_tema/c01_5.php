<?php

/**
 * @author Andrei M.
 * @copyright 2014
 */

include('lib/culori.php');

//print_r($trueColors); # debug

echo "Tabloul afisat cu foreach: ";
	echo "<br />";		
	foreach($trueColors as $cheie=>$valoare){
		echo "$cheie: $valoare";
		echo "<br />";
	}
    
// afisez culorile in lista de selectie
$bgSelect = "<select>
                <label>BG Colors: </label>";
// code here
    

$bgSelect.="</select>";
#end


$txtSelect="<select>
                <label>Txt Colors: </label>";
// code here
    

$txtSelect.="</select>";
#end
?>
<!-- Decoy text: -->

<span style="background-color: ; color: ">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>

<input type="submit" name="btn" value="Change colors"/>