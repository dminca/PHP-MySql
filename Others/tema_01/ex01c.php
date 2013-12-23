<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
	
<?php
	
function tabel($nr_coloane, $nr_linii) {														
	$tabel = "<table border=\"1\" style=\"border-collapse:collapse;\"><tr>";
	for($j=1; $j<=($nr_coloane*$nr_linii); $j++){
			$tabel.= "<td style=\" width:50px;\">".(5*$j)."</td>";
			if($j%$nr_coloane==0 && $j<($nr_coloane*$nr_linii)){
			$tabel.="</tr><tr>";
			}
			}
	$tabel.= "</tr></table>";
	return $tabel;
	
	}
	
echo tabel(2, 10);	
	
?>
</body>
</html>