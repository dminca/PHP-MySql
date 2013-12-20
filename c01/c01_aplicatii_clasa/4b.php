<?php
function tabel($array){
	foreach ($array as $key => $value) {
		echo "
		<tr>
			<td>$key</td><td>$value</td>
		</tr>";
	}

}// end function

//script principal
$carti = array('Mara' => 'I Slavici', 'Ion'=> 'L. Rebreanu');

// start tabel + antet
echo "<table border='1'>
		<tr>
			<th>Titlu</th><th>Autor</th>
		</tr>";

//liniile de date
tabel($carti);

//end table
echo "</table>";
?>