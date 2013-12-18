<title>Adding Details link to arrays</title>
<?php
$carti = array(
array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=> 4, 'an'=>2003),
array('titlu'=>'Ion', 'autor'=>'Liviu Rebreanu', 'exemplare'=> 5, 'an'=>2006),
array('titlu'=>'Morometii', 'autor'=>'Marin Preda', 'exemplare'=>10, 'an'=>1987),
array('titlu'=>'Povesti', 'autor'=>'Ion Creanga', 'exemplare'=> 3, 'an'=>2003),
array('titlu'=>'Poezii', 'autor'=>'Mihai Eminescu', 'exemplare'=>45, 'an'=>1990),
array('titlu'=>'Hronicul si cantecul varstelor', 'autor'=>'Lucian Blaga', 'exemplare'=>4,'an'=>2003),
);

function afis_carte($array, $k) {
	$carte= $array[$k];
	//start tabel
	echo "<table border='1'>";

	//antet tabel
	echo "<tr>";
	foreach ($carte as $key => $value) {
		echo "<th>$key</th>";
	}
	echo "</tr>";
	//linia de date
	echo "<tr>";
	foreach ($carte as $value) {
		echo "<td>$value</td>";
	}
	echo "</tr>";
	//end tabel
	echo "</table>";
}

function afis_carti($array){
	// start tabel
	echo "<table border='1'>";

	// antet tabel
	echo "<tr>
		<th>Titlu</th>
		<th>Autor</th>
		<th>Detalii</th>
	</tr>";

	// linii de date
	foreach ($array as $key => $value) {
		echo "<tr>";
		echo "<td>".$value['titlu']."</td><td>".$value['autor']."</td>";
		// adaug coloana Detalii
		echo "<td><a href=\"1.php?id=$key\">Detalii</a></td>";
		echo "</tr>";
	}

	// end tabel
	echo "</table>";
	//echo "<a href=\"http://localhost/Web2/curs04/lucru\">Go back DUDE!</a>";
}

/*
------------------
*/

//scriptul principal
if(isset($_GET['id'])) { //am id transmis prin GET, afisez cartea
$key = $_GET['id'];
afis_carte($carti, $key);
echo "<a href=\"http://localhost/Web2/curs04/lucru/1.php\">Go back DUDE!</a>";
} else { //afisez toate cartile
afis_carti($carti);
echo "<a href=\"http://localhost/Web2/curs04/lucru\">Go back DUDE!</a>";
}

?>