<?php
 
$filename='date.txt';
if(!file_exists($filename)){//verific existenta fisierului
	die("Fisierul $filename nu exista");
	}

$fp=@fopen($filename,'r' );//deschid fisierul pentru citire 
//var_dump($fp);
if(!$fp){
	die("Fisierul nu poate fi deschis");
	}

if(filesize($filename)==0){
	echo "Fisierul este gol!";
	}else{//daca am date in fisier
		$lines=file($filename);//$lines va fi un array care va avea drept valori liniile din fisier
		}

echo "<p>Liniile citite din fisier:</p>";
foreach ($lines as $no => $line) {
  echo ++$no;
  echo ' ';
  echo $line;
  echo '<br />'."\n";
}

fclose($fp); 
?>