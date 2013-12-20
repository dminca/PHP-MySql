<?php
/*
sortarea unui tablou multidimensional
*/
$carti=array(
					array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003),
					array('titlu'=>'Ion', 'autor'=>'Liviu Rebreanu', 'exemplare'=>5, 'an'=>2006),
					array('titlu'=>'Morometii', 'autor'=>'Marin Preda', 'exemplare'=>10, 'an'=>1987),
					array('titlu'=>'Povesti', 'autor'=>'Ion Creanga', 'exemplare'=>3, 'an'=>2003),
					array('titlu'=>'Poezii', 'autor'=>'Mihai Eminescu', 'exemplare'=>45, 'an'=>1990),
					array('titlu'=>'Hronicul si cantecul varstelor', 'autor'=>'Lucian Blaga', 'exemplare'=>4, 'an'=>2003),
			
			);

//varianta 1
function sort_autor($a,$b){
	return strcasecmp($a['autor'],$b['autor']);
	}
	
function sort_array(&$array){
	usort($array,'sort_autor');
}

//varianta 2
function my_sort($field){
	return function($a,$b) use($field){
		return strcasecmp($a[$field],$b[$field]);
		}; 
	}
	
function sort_array1(&$array,$field){
	usort($array,my_sort($field));
}

//varianta 3
function sort_array2(&$array,$field){
	usort($array,function($a,$b) use($field) {
		return strcasecmp($a[$field],$b[$field]);
		});
}

//sort_array($carti);

sort_array1($carti,'autor');

//sort_array2($carti,'autor');
echo '<pre>'.var_export($carti,true).'</pre>';

?>