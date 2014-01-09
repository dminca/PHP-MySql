
<html>
<!--
c) Creati scriptul dir3.php  care va deschide folderul img si va afisa in browser imaginile la dimensiune 100x100.
-->
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php
	$dir='img';
	$d=opendir($dir) or die('Eroare!');//deschid directorul
	//echo 'Continutul directorului '.$dir.':<br />';
	$extensions=array('jpg','jpeg','png');	
	while ($f = readdir($d)) {
		$caleCompleta=$dir.'/'.$f;
		//echo $caleCompleta;
		$p=pathinfo($caleCompleta);
		if(is_file($caleCompleta) && in_array($p['extension'],$extensions))
			echo '<img src="'.$caleCompleta.'" alt="nu e poza" width="100" height="100"/>';
	}
 
	closedir($d);
?>
 </body>
</html>