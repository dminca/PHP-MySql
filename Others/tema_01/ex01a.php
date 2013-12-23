<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
	
<?php
	$tabel = "<table border=\"1\" style=\"border-collapse:collapse; width:80px;\">";
	for($i=1; $i<=10; $i++){
		$tabel.="<tr>";
		$tabel.= "<td>".(($i*2-1)*5)."</td><td>".($i*2*5)."</td>";
		$tabel.= "</tr>";
		}
	$tabel.="</table>";
	
	echo $tabel;
?>
</body>
</html>