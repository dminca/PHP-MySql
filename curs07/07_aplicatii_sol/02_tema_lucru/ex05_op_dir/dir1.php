
<html>
<!--
1.Creati scriptul dir1.php care va deschide folderul img si va afisa continutul acestuia
$d=opendir($dir); - deschide directorul $dir
readdir($d); - citeste o intrare - un fisier, un director, sau fisierele speciale '.' si '..'; returneaza numele intrarii sau FALSE daca s-a ajuns la final
-->
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php
	
	$dir='img';
	$d=opendir($dir) or die('Eroare!');//deschid directorul
	echo 'Continutul directorului '.$dir.':<br />';	
	while ($f = readdir($d)) {
  		echo $f;
  		echo '<br />';
	}
 
	closedir($d);
?>
 </body>
</html>