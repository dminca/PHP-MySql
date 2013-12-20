<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test la 4-1a</title>
</head>

<body>
<?php
$persons = array(array('surname'=>'Steve', 'name'=>'Jobs', 'age'=>43, 'sex'=>'m'),
			array('surname'=>'Paul','name'=>'Pope', 'age'=>50, 'sex'=>'m'),
			array('surname'=>'John', 'name'=>'Doe', 'age'=>20, 'sex'=>'m'),
			array('surname'=>'Jane', 'name'=>'Jenson', 'age'=>23, 'sex'=>'f'),
			array('surname'=>'Chrome', 'name'=>'Google', 'age'=>19, 'sex'=>'m'),
			array('surname'=>'Doodle', 'name'=>'Dana', 'age'=>32, 'sex'=>'f'));
			
# afisam varsta medie total
## testing no. 1
/*foreach($persons as $key=> $value) {
	//print_r($value);
	echo "<br/>";
	foreach($value as $key=>$person){
		//print_r($person);
		echo "<br/>";
		#ia sexul si-n functie de sex calculeaza media varstelor...
	}
}*/
##endof test 1

## testing no. 2
$varste = array(43, 50, 20, 23, 19, 32);

# calculam varsta medie totala
$medie = (array_sum($varste))/(count($varste));
echo "Media varstei totale este ".round($medie);

# calculam varsta medie femei
foreach($persons as $key => $value){
	print_r($value);
//	echo "<br/>$key";
	for($persons; $persons <=6;$persons++){
		echo $persons;
	}
}

?>
</body>
</html>
