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

	foreach ($carti as $carte) {
	  		//print_r($carte);
		foreach ($carte as $key => $value) {
			echo "$key: $value <br/>";
		}
		//trec la rand nou
		echo "<br/>";
	  	}  	
  	?>
  	
 </body>
</html>