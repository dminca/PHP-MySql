<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>4-1</title>
</head>

<body>
<?php
$persons = array(array('surname'=>'Steve', 'name'=>'Jobs', 'age'=>43, 'sex'=>'m'),
			array('surname'=>'Paul','name'=>'Pope', 'age'=>50, 'sex'=>'m'),
			array('surname'=>'John', 'name'=>'Doe', 'age'=>20, 'sex'=>'m'),
			array('surname'=>'Jane', 'name'=>'Jenson', 'age'=>23, 'sex'=>'f'),
			array('surname'=>'Chrome', 'name'=>'Google', 'age'=>19, 'sex'=>'m'),
			array('surname'=>'Doodle', 'name'=>'Dana', 'age'=>32, 'sex'=>'f'));
			
# print_r($persons); //pt debug

//trecem prin arrayul mare
	echo "<table border='1'>";
	foreach ($persons[0] as $key => $value) {
		  			echo "<th>$key</th>";
		  		}
		foreach ($persons as $person) {
		  		echo "<tr>";	  		
			foreach ($person as $key => $value) {
				echo "<td>$value </td>";
			}
			//trec la rand nou
			echo "</tr>";
		  	}  	
	echo "</table>";
?>

<?php # afisam varsta medie total


?>
</body>
</html>