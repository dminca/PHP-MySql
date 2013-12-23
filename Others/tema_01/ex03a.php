<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php
	$tabel="<table>";
	
		$tabel.="<tr>";
		for($j=1; $j<=10; $j++){
			$tabel.="<td>";
			for($k=1; $k<=10; $k++){
				$tabel.= $j."X".$k."=".($j*$k)."<br/>";
				}
			$tabel.="</td>";
			if($j%5==0 && $j<10){
			$tabel.="</tr><tr>";
			}
			}
		$tabel.="</tr>";
		
	$tabel.="</table>";
	
	echo $tabel;
	
?>
</body>
</html>