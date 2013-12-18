<?php 

$note = array('nota1' => 10,
			'nota2' => 8,
			'nota3' => 5 );

$pondere = array('pond_nota1' => 10/100,
				'pond_nota2' => 40/100,
				'pond_nota3' => 50/100 );

foreach ($note as $key => $value) {
	if (is_numeric ($value)) {
		#echo "Numarul '{$key}' este valid. <br/>";
		$media = (($note['nota1'])*($pondere['pond_nota1']))+(($note['nota2'])*($pondere['pond_nota2']))+(($note['nota3'])*($pondere['pond_nota3']));
		echo "Media este ". $media.'<br/>';
	} else {
		echo "Numarul '{$key}' NU este valid. <br/>";
	}
}

#### TESTING
# echo $note['nota1'];
# echo $pondere['pond_nota1'];
#### endof test

#$media = (($note['nota1'])*($pondere['pond_nota1']))+(($note['nota2'])*($pondere['pond_nota2']))+(($note['nota3'])*($pondere['pond_nota3']));

#echo "Media este ". $media;
?>