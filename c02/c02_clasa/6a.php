<?php
function sortCarti($carti, $array) {
	$carti=array(
array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003),
array('titlu'=>'Ion', 'autor'=>'Liviu Rebreanu', 'exemplare'=>5, 'an'=>2006),
array('titlu'=>'Morometii', 'autor'=>'Marin Preda', 'exemplare'=>10, 'an'=>1987),
array('titlu'=>'Povesti', 'autor'=>'Ion Creanga', 'exemplare'=>3, 'an'=>2003),
array('titlu'=>'Poezii', 'autor'=>'Mihai Eminescu', 'exemplare'=>45, 'an'=>1990),
array('titlu'=>'Hronicul si cantecul varstelor','autor'=>'Lucian
Blaga','exemplare'=>4,'an'=>2003),
);

echo "<table border='1'>";
foreach ($carti[0] as $key => $value) {
	  			echo "<th>$key</th>";
	  		}
	foreach ($carti as $carte) {
	  		echo "<tr>";	  		
		foreach ($carte as $key => $value) {
			echo "<td>$value </td>";
		}
		//trec la rand nou
		echo "</tr>";
	  	}  	
echo "</table>";
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
 <head> 
 	<title> </title> 
 </head>
 <body>
  	<?php #scriptul principal
  	$carti=array(
array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003),
array('titlu'=>'Ion', 'autor'=>'Liviu Rebreanu', 'exemplare'=>5, 'an'=>2006),
array('titlu'=>'Morometii', 'autor'=>'Marin Preda', 'exemplare'=>10, 'an'=>1987),
array('titlu'=>'Povesti', 'autor'=>'Ion Creanga', 'exemplare'=>3, 'an'=>2003),
array('titlu'=>'Poezii', 'autor'=>'Mihai Eminescu', 'exemplare'=>45, 'an'=>1990),
array('titlu'=>'Hronicul si cantecul varstelor','autor'=>'Lucian
Blaga','exemplare'=>4,'an'=>2003),
);

echo "<table border='1'>";
foreach ($carti[0] as $key => $value) {
	  			echo "<th>$key</th>";
	  		}
	foreach ($carti as $carte) {
	  		echo "<tr>";	  		
		foreach ($carte as $key => $value) {
			echo "<td>$value </td>";
		}
		//trec la rand nou
		echo "</tr>";
	  	}  	
echo "</table>";
  	?>
  	
 </body>
</html>