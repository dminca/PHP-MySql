<?php
include "connect.php";

$id = 24;
$sql = "DELETE FROM users WHERE id_user=$id";
//echo $sql;
$result= mysqli_query($link,$sql);
//var_dump($result); 
if(!$result){
	echo "Eroare la DELETE: ". mysqli_error($link);	
	}elseif( mysqli_affected_rows($link) >0) {
		echo "DELETE ok";	
		}else{
			echo "Nu s-au sters inregistrari. ". mysqli_error($link) ;			
			}
mysqli_close($link);
?>