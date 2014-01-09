
<html>
<!--
Creati scriptul dir2.php  care va deschide folderul img si va afisa, pentru fiecare intrare, valoarea returnata de functia pathinfo()
mixed pathinfo ( string $path ) - functia primeste o cale catre un fisier, si returneaza intr-un array componentele ei. -->
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
		echo '<strong>Date despre '.$f.':<br /></strong>';
  		$pathinfo=pathinfo($f);
  		print_r($pathinfo);
  		echo '<br /><br />';
	}
 
	closedir($d);
?>
 </body>
</html>