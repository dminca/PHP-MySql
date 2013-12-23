<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<form method="get" action="">
	<fieldeset>
	<label>Numar celule</label>
		<select name="nr_celule">
			<?php
			for($i=1; $i<=10; $i++){
			echo "<option value=\"$i\">$i</option>";
			}
			?>
		</select>
	<label>Numar coloane</label>
		<select name="nr_coloane">
			<?php
			for($i=1; $i<=10; $i++){
			echo "<option value=\"$i\">$i</option>";
			}
			?>
		</select>
	</fieldset>
	<input type="submit" value="Formeaza tabel" name="btn"/>
	
</form>
<?php

function tabel($n, $nr_coloane){
	$tabel="<table>";
	$tabel.="<tr>";
	for($j=1; $j<=$n; $j++){
		$tabel.="<td>";
		for($k=1; $k<=10; $k++){
			$tabel.= $j."X".$k."=".($j*$k)."<br/>";
				}
		$tabel.="</td>";
		if($j%$nr_coloane==0 && $j<$n){
			$tabel.="</tr><tr>";
			}
		}
		$tabel.="</tr>";
		$tabel.="</table>";
		return $tabel;
		}
        
function cmmdc($a, $b){
    while($b>0)
{
	$r=$a%$b;
    $a=$b;
    $b=$r;
}
$cmmdc=$a;
return $cmmdc;
}


if(isset($_GET['btn'])){
$n=$_GET['nr_celule'];
$nr_coloane=$_GET['nr_coloane'];
if($n%$nr_coloane==0){
echo tabel($n, $nr_coloane);
}else{
    $d=cmmdc($n, $nr_coloane);
    echo tabel($n, $d);

}
}
	
  
  
   
?>
</body>
</html>