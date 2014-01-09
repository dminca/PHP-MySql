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
	}else{
		$txt=fread($fp,filesize($filename));
		echo "<p>Continutul fisierului:</p>";
		echo $txt;
		}

fclose($fp);
?>