<?php
$filename='date.txt';
if(!file_exists($filename)){//verific existenta fisierului
	die("Fisierul $filename nu exista");
	}
//deschid fis, citesc cont, transmit catre browser, inchid fis cu readfile($filename);
readfile($filename);
?>