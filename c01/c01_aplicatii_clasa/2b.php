<?php
echo "Astazi este ".date('d M Y').". ";
	
	$luna_curenta=date('m');
	$zi_curenta = date('d');
	$an_curent = date('Y');
$nr_zi=date("z", mktime(0,0,0,$luna_curenta,$zi_curenta,$an_curent));

echo "Este ziua cu numarul $nr_zi.";

	$luna_finala=12;
	$zi_finala=31;
$nr_final=date("z", mktime(0,0,0,$luna_finala,$zi_finala,$an_curent));

$final = $nr_final-$nr_zi;

echo "Mai sunt $final pana la moarte!";

?>