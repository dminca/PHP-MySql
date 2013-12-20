<?php
include "connect.php";

$id = 10;
$sql = "UPDATE users SET nume='Stefan' WHERE id_user=$id";
//echo $sql;
$result= mysqli_query($link,$sql);
var_dump($result); 
if(!$result){
	echo "Eroare la UPDATE: ". mysqli_error($link);	
	}elseif( mysqli_affected_rows($link) >0) {
		echo "UPDATE ok";	
		}else{
			echo "Nu s-au modificat inregistrari. ". mysqli_error($link) ;			
			}
mysqli_close($link);
?>