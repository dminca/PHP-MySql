<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
	
<form action="" method="get">
	<fieldset>
		<label>Numar coloane</label>
			<input type="text" name="nr_coloane" value=""/>
		<label>Numar linii</label>
			<input type="text" name="nr_linii" value=""/>
	</fieldset>
	<input type="submit" value="Formeaza tabel" name="btn"/>
</form>	
	
<?php
	
function tabel($nr_coloane, $nr_linii) {														
	$tabel = "<table border=\"1\" style=\"border-collapse:collapse;\"><tr>";
	for($j=1; $j<=($nr_coloane*$nr_linii); $j++){
			$tabel.= "<td style=\" width:50px;\">".(5*$j)."</td>";
			if($j%$nr_coloane==0){
			$tabel.="</tr><tr>";
			}
			}
	$tabel.= "</tr></table>";
	return $tabel;
	
	}
	
if(isset($_GET['btn']))	{
	$nr_coloane=$_GET['nr_coloane'];
	$nr_linii=$_GET['nr_linii'];

	if(is_numeric($nr_coloane)&&is_numeric($nr_linii)){
		echo tabel($nr_coloane, $nr_linii);
	}else{
		echo "Eroare";
		}
}
	
?>
</body>
</html>