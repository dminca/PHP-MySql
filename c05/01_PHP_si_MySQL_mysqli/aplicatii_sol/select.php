<?php
include "connect.php";

$sql = "SELECT * FROM users";
//echo $sql;
$result= mysqli_query($link,$sql);
//var_dump($result); 
//echo mysqli_num_rows($result);
//var_dump( mysqli_fetch_array($result));
if(!$result) {// eroare la SELECT
	echo "Eroare la select";
	}elseif(!mysqli_num_rows($link)) {// nu am niciun rand selectat
		echo "Nu am date";
		}else{// afisez datele selectate
		while($row = mysqli_fetch_array($result)){
			echo '<pre>'. var_export($row,true).'</pre><br />';
			}
		}
mysqli_close($link);
?>