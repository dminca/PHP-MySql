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
			<select name="imagine">
				<?php
				$a=array(1=>'img/pic1.jpg', 'img/pic2.jpg', 'img/pic3.jpg', 'img/pic4.jpg', 'img/pic5.jpg', 'img/pic6.jpg', 'img/pic7.jpg', 'img/pic8.jpg', 'img/pic9.jpg', 'img/pic10.jpg');
				$nr_imagini=count($a);
				for($i=1; $i<=$nr_imagini; $i++){
					echo "<option value=\"$i\">$i</option>";
					}
				?>
			</select>
	</fieldset>
	<input type="submit" value="Formeaza tabel" name="btn"/>
</form>	
<?php
	
	function tabel_imagini($nr_coloane){
		global $a;
		$tabel="<table><tr>";
		for($i=1; $i<=$nr_coloane; $i++){
			$tabel.="<td><img src=\"$a[$i]\" width=\"70\" height=\"60\"/></td>";
			}
		$tabel.="</tr></table>";
		return $tabel;
		}
	
if(isset($_GET['btn'])){
	$imagine=$_GET['imagine'];
	if(is_numeric($imagine)){
	echo tabel_imagini($imagine);
	}else{
		echo "Eroare";
	}
}

?>
</body>
</html>