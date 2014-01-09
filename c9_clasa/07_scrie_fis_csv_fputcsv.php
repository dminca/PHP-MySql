<?php
$emails = array(array('Ion Popa', 'ipopa@gmail.com'),array('Ana Stefanescu', 'astefanescu@gmail.com'),array('Mihai Cucu', 'mcucu@gmail.com'),
array('Mihaela Ion', 'mion@gmail.com')
);

$filename='emails.csv';

$fp=fopen($filename,'w' );//deschid fisierul pentru scriere; daca nu exista, va fi creat 
//var_dump($fp);
if(!$fp){
	die("Fisierul nu poate fi deschis");
	}
	
foreach($emails as $line){
	fputcsv($fp,$line,',','"');
	
	}

if(file_exists($filename)){
	echo "Fisierul $filename a fost creat!";
	}
fclose($fp);
?>