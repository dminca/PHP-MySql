<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php
	$a=array(1=>'img/pic1.jpg', 'img/pic2.jpg', 'img/pic3.jpg', 'img/pic4.jpg', 'img/pic5.jpg', 'img/pic6.jpg', 'img/pic7.jpg', 'img/pic8.jpg', 'img/pic9.jpg', 'img/pic10.jpg');
	$tabel="<table><tr>";
	$nr_coloane=10;
	for($i=1; $i<=$nr_coloane; $i++){
		$tabel.="<td><img src=\"$a[$i]\" width=\"70\"/></td>";
		}
	$tabel.="</tr></table>";
	
	echo $tabel;

?>
</body>
</html>