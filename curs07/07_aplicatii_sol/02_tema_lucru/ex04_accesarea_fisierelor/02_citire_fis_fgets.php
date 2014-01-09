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

//var_dump(filesize($filename));
if(filesize($filename)==0){
	echo "Fisierul este gol!";
	}else{//daca am date in fisier
		echo "<ol>Liniile citite din fisier:";
		while($line=fgets($fp)){
			echo "<li>$line</li>";
			}
		echo "</ol>";
		}

fclose($fp);
?>