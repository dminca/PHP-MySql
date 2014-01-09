
<html>

<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php
	
	$dir='img';
	$d=opendir($dir) or die('Eroare!');//deschid directorul
	while ($f = readdir($d)) {
  		echo $f;
  		echo '<br />';
	}
 
closedir($d);


	
?>
 </body>
</html>