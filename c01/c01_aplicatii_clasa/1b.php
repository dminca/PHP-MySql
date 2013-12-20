<?php
$pers = array('Nicu Jean','Ion Ion', 'Gheo Chao');

//start lista
echo '<ol style="color: blue">';

//generez li-uri
$nr=count($pers);
for ($i=0; $i < $nr; $i++) { 
	echo "<li>".strtoupper($pers[$i])."</li>";
}

//end lista
echo "</ol>";

?>