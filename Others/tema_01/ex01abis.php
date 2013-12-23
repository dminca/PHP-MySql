<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
	
<?php
	$tabel = "<table border=\"1\" style=\"border-collapse:collapse; width:80px;\">";
	$tabel.="<tr>";
	for($j=1; $j<=20; $j++){
			$tabel.= "<td>".(5*$j)."</td>";
			if($j%2==0 && $j<20){
			$tabel.="</tr><tr>";
			}
			}
	$tabel.= "</tr>";
		
	$tabel.="</table>";
	
	echo $tabel;
?>
</body>
</html>