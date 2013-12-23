<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php
	$a=array('img/pic1.jpg', 'img/pic2.jpg', 'img/pic3.jpg');
	$lista="<ul>";
	foreach($a as $val){
		$lista.="<li><img src=\"$val\" width=\"70\"/></li>";
		}
	$lista.="</ul>";
	
	echo $lista;

?>
</body>
</html>