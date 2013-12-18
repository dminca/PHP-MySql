<?php #functii predefinite

// generare tablou cu arrayuri

//---------functie eronata------------
function createTable($array, $key, $value) {
echo "<table border='1'>";
foreach ($arrays[0] as $key => $value) {
	  			echo "<th>$key</th>";
	  		}
	foreach ($arrays as $array) {
	  		echo "<tr>";	  		
		foreach ($array as $key => $value) {
			echo "<td>$value </td>";
		}
		//trec la rand nou
		echo "</tr>";
	  	}  	
echo "</table>";
}
//------------sfarsit functie ---------------


?>

<?php
$persoane = array(8 => array(
	'username'=> 'ion',
	'email'=> 'ion@gmail.com',
	'varsta'=> 29),
9 => array(
	'username'=> 'maria',
	'email'=> 'maria@gmail.com',
	'varsta'=> 53),
10 => array(
	'username'=> 'gheo',
	'email'=> 'gheo@gmail.com',
	'varsta'=> 19),
11 => array(
	'username'=> 'pitri',
	'email'=> 'pitri@gmail.com',
	'varsta'=> 43));

# cod eronat...
createTable($persoane, $key, $value); # vezi cum am facut generarea tabelului o functie [in clasa]

?>