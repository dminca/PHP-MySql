<?php
include "classCursant.php";
$filename='cursanti.csv';

$fp=fopen($filename,'r' );//deschid fisierul pentru scriere; daca nu exista, va fi creat 
//var_dump($fp);
if(!$fp){
	die("Fisierul nu poate fi deschis");
	}
$cursanti = array();	
while($line=fgetcsv($fp,',')){
	//print_r($line);
	$c = new Cursant($line[0], $line[1], $line[2]);
    
    //adaug obiectul $cursant la arrayul $cursanti
    $cursanti[] = $c;
	}

//afisez numarul cursantilor
echo "Numar cursanti: ".Cursant::getNr();

// parcurg $cursanti si afisez lista cursantilor

foreach($cursanti as $c){
    echo $c -> getNume()." ".$c->getPrenume()." ".$c->getEmail()."<br/>";
}
fclose($fp);
?>